<?php
  use_stylesheet('demopage.css');
  use_stylesheet('balance.css');
  use_javascript('jquery.min.js');

  if (isset($_POST["var1"])) $var1 = $_POST["var1"]; else $var1=null; //proyectos
  if (isset($_POST["var2"])) $var2 = $_POST["var2"]; else $var2=null; //año
  if (isset($_POST["var3"])) $var3 = $_POST["var3"]; else $var3=null; //autor
  if (isset($_POST["var4"])) $var4 = $_POST["var4"]; else $var4=null; //cámara
  if (isset($_POST["var5"])) $var5 = $_POST["var5"]; else $var5=null; //materia
  if (isset($_POST["var6"])) $var6 = $_POST["var6"]; else $var6=null; //estado

  //default ingresados del 2010
  if ($var1==null) $var1='Ingresados';

  $v=array();  
  $v = countVars($var2,2,$v);
  $v = countVars($var3,3,$v);
  $v = countVars($var4,4,$v);
  $v = countVars($var5,5,$v);
  $v = countVars($var6,6,$v);
  
  $a2=0;
  for ($i=2; $i<7; $i++){
    if ($v[$i] == 2) $a2++;
  }
  
  if ($a2==0){
    //selecciona var2
    $var2[0]=2006;
    $var2[1]=2007;
    $var2[2]=2008;
    $var2[3]=2009;
    $var2[4]=2010;
    //selecciona var3
    $var3[0]='Mensaje';
    $var3[1]='Moción';
  }
  else if ($a2==1){
    //selecciona primera variable sin seleccionar
    for ($i=2; $i<7; $i++){
      if ($v[$i] == 0){
        switch ($i){
        case 2:
          //selecciona var2
          $var2[0]=2006;
          $var2[1]=2007;
          $var2[2]=2008;
          $var2[3]=2009;
          $var2[4]=2010;       
          break;
        case 3:
          //selecciona var3
          $var3[0]='Mensaje';
          $var3[1]='Moción';
          break;
        case 4:
          //selecciona var4
          $var4[0]='C.Diputados';
          $var4[1]='Senado';    
          break;
        case 5:
          //selecciona var5
          $var5[0]='Defensa';
          $var5[1]='Hacienda, Economía, Impuesto y Empresas';
          $var5[2]='Relaciones Exteriores';
          $var5[3]='Administrativo, Regionalización, Zonas Extremas y Asuntos Indígenas';
          $var5[4]='Salud';
          $var5[5]='Medio Ambiente, Recursos Naturales y Derechos Animales';
          $var5[6]='Obras Públicas, Vivienda, Telecomunicaciones y Transporte';
          $var5[7]='Trabajo y Protección Social';
          $var5[8]='Educación, Deportes y Cultura';
          $var5[9]='Transparencia y Probidad';
          $var5[10]='Participación y Elecciones';
          $var5[11]='Familia';
          $var5[12]='Seguridad';
          $var5[13]='Derechos Fundamentales, Nacionalidad, Ciudadanía';
          $var5[14]='Reconstrucción Terremoto';
          break;
        case 6:
          //selecciona var6
          $var6[0]='1';
          $var6[1]='2';
          $var6[2]='3';
          $var6[3]='4';
          $var6[4]='5';
          break;
        }
        break;
      }
    }
  }
  
  function countVars($var,$pos,$v){
    if ($var==null) $v[$pos]=0;
    else if (count($var)==1) $v[$pos]=1;
    else if (count($var)>1) $v[$pos]=2;
    return $v;
  }
    
  function printVar($var){
    for ($i=0; $i<count($var); $i++){
      echo $i.':'.$var[$i].'<br>';
    }
  }

  function printSelected($var,$val){
    if (isSelected($var,$val)) echo "checked";
  }

  function isSelected($var,$val){
    for ($i=0; $i<count($var); $i++){
      if ($var[$i] == $val){
        return true;
      }
    }
    return false;
  }
?>

<?php slot('breadbrumb') ?>
  <li class="actual">> Balance particular 2006-2010</li>
<?php end_slot() ?>

<h1 class="grafico">Balance particular 2006-2010</h1>

<div id="barchart">
</div>

Elija los varibles que quieres ver en el gráfico.

<form action="<?php url_for('ProyectoLey/balance') ?>" method="POST">
<table id="tb_balance_form">
  <thead>
    <tr class="balance_titulos">
      <th>Proyectos</td>
      <th>Año</td>
      <th>Autor</td>
      <th>Cámara origen</td>
      <th class="col_var5" colspan="2">Materia</td>
      <th class="col_var6">Estado de Tramitación</td>
    </tr>
  </thead>  
  <tbody>
  <tr>
    <td class="col_var1">
      <p><input type="radio" name="var1" value="Ingresados" <?php if ($var1=='Ingresados') echo 'checked' ?>>Ingresados</input></p>
      <p><input type="radio" name="var1" value="Publicados" <?php if ($var1=='Publicados') echo 'checked' ?>>Publicados</input></p>
    </td>
    <td class="col_var2">
      <p><input type="checkbox" name="var2[]" value="2006" <?php printSelected($var2,2006) ?>>2006</input></p>
      <p><input type="checkbox" name="var2[]" value="2007" <?php printSelected($var2,2007) ?>>2007</input></p>
      <p><input type="checkbox" name="var2[]" value="2008" <?php printSelected($var2,2008) ?>>2008</input></p>
      <p><input type="checkbox" name="var2[]" value="2009" <?php printSelected($var2,2009) ?>>2009</input></p>
      <p><input type="checkbox" name="var2[]" value="2010" <?php printSelected($var2,2010) ?>>2010</input></p>
    </td>
    <td class="col_var3">
      <p><input type="checkbox" name="var3[]" value="Mensaje" <?php printSelected($var3,'Mensaje') ?>>Presidente</input></p>
      <p><input type="checkbox" name="var3[]" value="Moción" <?php printSelected($var3,'Moción') ?>>Diputados y Senadores</input></p>
    </td>
    <td class="col_var4">
      <p><input type="checkbox" name="var4[]" id="var41" value="C.Diputados" <?php printSelected($var4,'C.Diputados') ?>>Diputados</input></p>
      <p><input type="checkbox" name="var4[]" id="var42" value="Senado" <?php printSelected($var4,'Senado') ?>>Senado</input></p>
    </td>
    <td class="col_var5">
      <p><input type="checkbox" name="var5[]" value="Defensa" title="Defensa" <?php printSelected($var5,'Defensa') ?>>Defensa</input></p>
      <p><input type="checkbox" name="var5[]" value="Hacienda, Economía, Impuesto y Empresas" title="Hacienda, Economía, Impuesto y Empresas" <?php printSelected($var5,'Hacienda, Economía, Impuesto y Empresas') ?>>Hacienda, Economía, Impuesto y Empresas</input></p>
      <p><input type="checkbox" name="var5[]" value="Relaciones Exteriores" title="Relaciones Exteriores" <?php printSelected($var5,'Relaciones Exteriores') ?>>Relaciones Exteriores</input></p>
      <p><input type="checkbox" name="var5[]" value="Administrativo, Regionalización, Zonas Extremas y Asuntos Indígenas" title="Administrativo, Regionalización, Zonas Extremas y Asuntos Indígenas" <?php printSelected($var5,'Administrativo, Regionalización, Zonas Extremas y Asuntos Indígenas') ?>>Administrativo, Regionalización, Zonas Extremas y Asuntos Indígenas</input></p>
      <p><input type="checkbox" name="var5[]" value="Salud" title="Salud" <?php printSelected($var5,'Salud') ?>>Salud</input></p>
      <p><input type="checkbox" name="var5[]" value="Medio Ambiente, Recursos Naturales y Derechos Animales" title="Medio Ambiente, Recursos Naturales y Derechos Animales" <?php printSelected($var5,'Medio Ambiente, Recursos Naturales y Derechos Animales') ?>>Medio Ambiente, Recursos Naturales y Derechos Animales</input></p>
      <p><input type="checkbox" name="var5[]" value="Obras Públicas, Vivienda, Telecomunicaciones y Transporte" title="Obras Públicas, Vivienda, Telecomunicaciones y Transporte" <?php printSelected($var5,'Obras Públicas, Vivienda, Telecomunicaciones y Transporte') ?>>Obras Públicas, Vivienda, Telecomunicaciones y Transporte</input></p>
    </td>
    <td class="col_var5">
      <p><input type="checkbox" name="var5[]" value="Trabajo y Protección Social" title="Trabajo y Protección Social" <?php printSelected($var5,'Trabajo y Protección Social') ?>>Trabajo y Protección Social</input></p>
      <p><input type="checkbox" name="var5[]" value="Educación, Deportes y Cultura" title="Educación, Deportes y Cultura" <?php printSelected($var5,'Educación, Deportes y Cultura') ?>>Educación, Deportes y Cultura</input></p>
      <p><input type="checkbox" name="var5[]" value="Transparencia y Probidad" title="Transparencia y Probidad" <?php printSelected($var5,'Transparencia y Probidad') ?>>Transparencia y Probidad</input></p>
      <p><input type="checkbox" name="var5[]" value="Participación y Elecciones" title="Participación y Elecciones" <?php printSelected($var5,'Participación y Elecciones') ?>>Participación y Elecciones</input></p>
      <p><input type="checkbox" name="var5[]" value="Familia" title="Familia" <?php printSelected($var5,'Familia') ?>>Familia</input></p>
      <p><input type="checkbox" name="var5[]" value="Seguridad" title="Seguridad" <?php printSelected($var5,'Seguridad') ?>>Seguridad</input></p>
      <p><input type="checkbox" name="var5[]" value="Derechos Fundamentales, Nacionalidad, Ciudadanía" title="Derechos Fundamentales, Nacionalidad, Ciudadanía" <?php printSelected($var5,'Derechos Fundamentales, Nacionalidad, Ciudadanía') ?>>Derechos Fundamentales, Nacionalidad, Ciudadanía</input></p>
      <p><input type="checkbox" name="var5[]" value="Reconstrucción Terremoto" title="Reconstrucción Terremoto" <?php printSelected($var5,'Reconstrucción Terremoto') ?>>Reconstrucción Terremoto</input></p>
    </td>
    <td class="col_var6">
      <p><input type="checkbox" name="var6[]" value="1" title="Publicados" <?php printSelected($var6,1) ?>>Publicados</input></p>
      <p><input type="checkbox" name="var6[]" value="2" title="Rechazados, Inconstitucionales, Inadmisibles" <?php printSelected($var6,2) ?>>Rechazados, Inconstitucionales, Inadmisibles</input></p>
      <p><input type="checkbox" name="var6[]" value="3" title="En tramitación" <?php printSelected($var6,3) ?>>En tramitación</input></p>
      <p><input type="checkbox" name="var6[]" value="4" title="Retirados" <?php printSelected($var6,4) ?>>Retirados</input></p>
      <p><input type="checkbox" name="var6[]" value="5" title="Archivados, Solicitud de archivos" <?php printSelected($var6,5) ?>>Archivados, Solicitud de archivos</input></p>
    </td>
  </tr>
  </tbody>
</table>
<p><input type="submit" value="Filtra">
</form>

<!-- partial _detalle para mostrar detalles del proyectoLey -->
<?php include_partial('ProyectoLey/balancechart', array('proyecto'=>$proyecto_ley, 'var1'=>$var1, 'var2'=>$var2, 'var3'=>$var3, 'var4'=>$var4, 'var5'=>$var5, 'var6'=>$var6 ))
 ?>
