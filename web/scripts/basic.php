<?php
require('simple_html_dom.php');
require("class/cnx.php");
require("class/controlador.php");

$coneccion = coneccion();
$o = new Controlador();

$sil_url = 'http://sil.senado.cl/cgi-bin/';
$fechas_url = $sil_url.'sil_ultproy.pl';
$proyectos_url = $sil_url.'sil_proyectos.pl?';
$autores_url = $sil_url.'sil_autores.pl?';

$array = array('Boletín','Título','Fecha de Ingreso','Iniciativa','Cámara de origen','Etapa','Subetapa','Tipo de proyecto','Urgencia actual');
$arrayMeses = Array("", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
extract($_POST);

$fechas_html = str_get_html(file_get_contents_curl($fechas_url,$desde,$hasta));

$num=0;
foreach($fechas_html->find('td[class="TEXTpais"]') as $nro)
{
    $nro_boletin = trim(str_replace("&nbsp;","",$nro->plaintext));

    $html = file_get_html($proyectos_url.$nro_boletin);
    $value=htmlentities($html->find('tr', 1)->plaintext);
    $value=str_replace("&amp;", "&", $value);
    foreach($html->find('a') as $e)
    {
        if(strstr($e->onclick,'MM_openBrWindow') == TRUE)
        {
            $leytext= array_pop(array_reverse(explode("'",substr($e->onclick,17))));
            $data=array_pop(array_reverse(explode("&",substr($e->onclick,49+strlen(array_pop(explode("?",array_pop(array_reverse(explode("=",$e->onclick))))))))));
        }
    }
    $v=null;
    $i=0;
    foreach($array as $a){
        $v[$i]=strrpos($value, htmlentities(utf8_decode($a)));
        $i++;
    }
    sort($v);
    $v[]='';
    for($c=0; $c<$i; $c++){
        $x=$c+1;
        $cal=$v[$x]-$v[$c];
        if($c<8)
            $dato=substr($value, $v[$c], $cal);
        else
            $dato=substr($value, $v[$c]);
        $res=explode(":",$dato);
        $contenido=@trim(str_replace("&nbsp;","",trim($res[1])));

        if(strstr($res[0],'Bolet&iacute;n') == TRUE){
            $nro_boletin = $contenido;
        }
        if(strstr($res[0],'T&iacute;tulo') == TRUE){
            $titulo = $contenido;
        }

        if(strstr($res[0],'Fecha de Ingreso') != FALSE)
        {
            $fechaText = $contenido;
            $fechaArray =  explode(' ', $fechaText);
            for($j=1; $j<=12; $j++)
            {
                if($arrayMeses[$j]==substr($fechaArray[3], 0, -1))
                {
                    (strlen($j)==1) ? $mes = "0".$j : $mes = $j;
                        break;
                }
            }
            if($fechaArray[1]<10)
                $fechaArray[1]="0".$fechaArray[1];
            $fecha_ingreso = $fechaArray[4]."-".$mes."-".$fechaArray[1];
            $desdeY = explode("/",$desde);
        }
        if (strstr($res[0],'Iniciativa') != FALSE)
            $iniciativa = $contenido;
        if (strstr($res[0],'Tipo de proyecto') != FALSE)
            $tipo = $contenido;
        if (strstr($res[0],'C&aacute;mara de origen') != FALSE)
            $camara_origen = $contenido;
        if (strstr($res[0],'Urgencia actual') != FALSE)
            $urgencia = $contenido;
        if (strstr($res[0],'Etapa') != FALSE)
        {
            $etapa = $contenido;
            if(strstr($etapa,'Tramitaci&oacute;n terminada') != FALSE)
            {
                if (substr_count($leytext, "?idLey=")==1)   // Ley
                {
                    $ley=$data;
                    $etapa=trim(substr($etapa, 0,strlen(strstr($etapa, 'Ley'))));
                    $ley_bcn = $leytext;
                    $fecha_publicacion = substr($ley_bcn,strpos($ley_bcn,"&idVersion")+11);
                }
                else if(substr_count($leytext, "?idNorma=")) // Decreto
                {
                    $decreto=$data;
                    $etapa=trim(substr($etapa, 0,strlen(strstr($etapa, 'D.S.'))));
                    $decreto_bcn = $leytext;
                    $fecha_publicacion = substr($decreto_bcn,strpos($decreto_bcn,"&idVersion")+11);
                }
            }
        }
        if (strstr($res[0],'Subetapa') != FALSE)
            $sub_etapa = $contenido;
        if (strstr($res[0],'Refundido con') != FALSE)
            $refundido = trim($val->next_sibling()->plaintext); //falta insertar a BBDD
    }
    $id_proyecto_sil = $html->find('a', -1)->href;
    $id_proyecto_sil = substr($id_proyecto_sil,strpos($id_proyecto_sil,"?")+1);
    $id_proyecto_sil = str_replace(",","",$id_proyecto_sil);

    $qry="SELECT if(count(*)=0,0,1) value1 FROM ProyectoLey WHERE nro_boletin='$nro_boletin'";
    $o->setQry($qry);
    if(strlen($ley)==0)
        $ley=0;
    if(strlen($decreto)==0)
        $decreto=0;
    if($o->selectQ()==0)
    {
        $qry = "INSERT INTO
                    ProyectoLey
                    (
                        nro_boletin,
                        titulo,
                        fecha_ingreso,
                        iniciativa,
                        tipo,
                        camara_origen,
                        urgencia,
                        etapa,
                        sub_etapa,
                        ley,
                        ley_bcn,
                        decreto,
                        decreto_bcn,
                        fecha_publicacion,
                        nro_interno,
                        created_at,
                        updated_at
                    ) VALUES (
                        '$nro_boletin',
                        '$titulo',
                        '$fecha_ingreso',
                        '$iniciativa',
                        '$tipo',
                        '$camara_origen',
                        '$urgencia',
                        '$etapa',
                        '$sub_etapa',
                        $ley,
                        '$ley_bcn',
                        $decreto,
                        '$decreto_bcn',
                        '$fecha_publicacion',
                        $id_proyecto_sil,
                        NOW(),
                        NOW()
                    )";
        $o->setQry(html_entity_decode($qry));
        $o->execute();

	echo $qry;

        $select="SELECT id_proyecto_ley value1 FROM ProyectoLey
                        WHERE nro_boletin='$nro_boletin' AND fecha_ingreso='$fecha_ingreso' ORDER BY id_proyecto_ley DESC LIMIT 1";
        $o->setQry($select);
        $idProyectoLey = $o->selectQ();

        $autores_html = file_get_html($autores_url.$id_proyecto_sil);
        foreach($autores_html->find('span[class="TEXTarticulo"]') as $autor)
        {
            $autor = str_replace("&nbsp;","",$autor->plaintext);
            $autor = explode(",",$autor);
            $nombre = trim($autor[1]);
            $apellidos = trim($autor[0]);

            $qry = "SELECT if(count(id_autor)>0,id_autor,0) value1 FROM Autor WHERE nombre='$nombre' AND apellidos='$apellidos'";
            $o->setQry($qry);
            $idAutor = $o->selectQ();
            if($idAutor>0)
            {
                //echo "<br>Autor ya existe: [".$idAutor."] ".$apellidos.", ".$nombre;
            }
            else
            {
                /* INSERT AUTOR */
                $qry = "INSERT INTO Autor (nombre, apellidos, created_at, updated_at) VALUES ('$nombre', '$apellidos', NOW(), NOW())";
                //echo "<br><br><strong>".$sql."</strong><br>";
                $o->setQry(html_entity_decode($qry));
                $o->execute();

                $qry = "SELECT id_autor value1 FROM Autor WHERE nombre='$nombre' AND apellidos='$apellidos' ORDER BY id_autor DESC LIMIT 1";
                $o->setQry($qry);
                $idAutor = $o->selectQ();

                //echo "<br>Creado nuevo autor: [".$idAutor."] ".$apellidos.", ".$nombre;
            }

            // busca si existe el la relacion Proyecto - autor
            $qry="SELECT if(count(id_autor)>0,1,0) value1 FROM AutorProyectoLey WHERE id_autor=$idAutor AND id_proyecto_ley=$idProyectoLey LIMIT 1";
            $o->setQry($qry);
            $value=$o->selectQ();
            if($value>0)
            {
              //echo "<br>Ya existe la relación autor: $idAutor proyecto: $idProyectoLey";
            }
            else
            {
                /* INSERT AUTOR-PROYECTO-LEY*/
                $sql = "INSERT INTO AutorProyectoLey (id_autor, id_proyecto_ley) VALUES ($idAutor, $idProyectoLey)";
                //echo "<br><br><strong>".$sql."</strong><br>";
                $o->setQry(html_entity_decode($qry));
                $o->execute();

                //echo "<br>Creada la relación autor: ".$idAutor." proyecto: ".$idProyectoLey;
            }
        }
        $html->clear();
        unset($html);
        $autores_html->clear();
        unset($autores_html);
        $num++;
        echo "<br>Proyecto de Ley <i>#$nro_boletin</i> --> <span style='color:green;'>Acaba de agregarse exitosamente en 'Area de Administración'.</span><br>";
    }
    else
    {
        echo "<br>Proyecto de Ley <i>#$nro_boletin</i> --> <span style='color:red;'>No se agregó en este momento, este ya se encontraba disponible en 'Area de Administración'.</span><br>";
    }
    echo "<hr />";

}
function file_get_contents_curl($url,$desde,$hasta)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "desde=".$desde."&hasta=".$hasta."&buscar=%3E%3E+Buscar");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}
?>
