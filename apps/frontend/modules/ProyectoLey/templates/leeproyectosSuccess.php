<h1>Listado de Proyectos ley</h1>
<?php
    require_once(substr($_SERVER['SCRIPT_FILENAME'], 0, strlen($_SERVER['SCRIPT_NAME'])*(-1))."/scripts/simple_html_dom.php");

    $sil_url = 'http://sil.senado.cl/cgi-bin/';
    $fechas_url = $sil_url.'sil_ultproy.pl';
    $proyectos_url = $sil_url.'sil_proyectos.pl?';
    $autores_url = $sil_url.'sil_autores.pl?';

    $desde = "30/04/2010";
    $hasta = "07/05/2010";
    $arrayMeses = Array("", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

    $fechas_html = str_get_html(file_get_contents_curl($fechas_url,$desde,$hasta));
    $num=0;
    foreach($fechas_html->find('td[class="TEXTpais"]') as $nro)
    {
        $nro_boletin = trim(str_replace("&nbsp;","",$nro->plaintext));
        $proyectos_html = file_get_html($proyectos_url.$nro_boletin);
        $titulo = $proyectos_html->find('span[class="TEXTpais"]');
        $titulo = $titulo[0]->plaintext;
        $sub_etapa=null;
        $ley="NULL";
        $ley_bcn=null;
        $decreto="NULL";
        $decreto_bcn=null;
        $fecha_publicacion="NULL";
        $id_materia = $this->getMateria($nro_boletin);
    }
    //echo $this->getMateria("123");

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