<!--[if IE 7]><?php use_javascript('excanvas.compiled.js') ?><![endif]-->

<?php 
  use_stylesheet('visualize.css');
  use_stylesheet('visualize-light.css');
	use_javascript('visualize2.jQuery.js');
	use_javascript('visualize-balance.js');

  $arr2 = array('2006'=>'2006','2007'=>'2007','2008'=>'2008','2009'=>'2009','2010'=>'2010');
  $arr3 = array('Presidente'=>'Mensaje','Parlamento'=>'Moción');
  $arr4 = array('Diputados'=>'C.Diputados','Senado'=>'Senado');
  $arr5 = array('Defensa'=>array(1),'Hacienda, Economía, Impuesto y Empresas'=>array(2,3,4,5),'Relaciones Exteriores'=>array(6),'Administrativo, Regionalización, Zonas Extremas y Asuntos Indígenas'=>array(7,8,9,10),'Salud'=>array(11),'Medio Ambiente, Recursos Naturales y Derechos Animales'=>array(12,13,14),'Obras Públicas, Vivienda, Telecomunicaciones y Transporte'=>array(15,16,17,18),'Trabajo y Protección Social'=>array(19,20),'Educación, Deportes y Cultura'=>array(21,22,23),'Transparencia y Probidad'=>array(24,25),'Participación y Elecciones'=>array(26,27),'Familia'=>array(28),'Seguridad'=>array(29),'Derechos Fundamentales, Nacionalidad, Ciudadanía'=>array(30,31),'Reconstrucción Terremoto'=>array(32));
  $arr6 = array(1=>'Publicados', 2=>'Rechazados, Inconstitucionales, Inadmisibles', 3=>'En tramitación', 4=>'Retirados', 5=>'Archivados, Solicitud de archivos');

  //define que variables se muestra en el gráfico
  //$x = posición de la variable x
  //$y = posición de la variable y
  $xvar = $yvar = null;
  if ($var2 != null && count($var2) > 1){  //año
    $xvar = $var2;
    $x = 2;
    if ($var3 != null && count($var3) == 2){
      $yvar = $arr3;
      $y = 3;
    }
    else if ($var4 != null && count($var4) == 2){
      $yvar = $arr4;
      $y = 4;
    }
    else if ($var5 != null && count($var5) > 1){
      $yvar = $var5;
      $y = 5;
    }
    else if ($var6 != null && count($var6) > 1){
      $yvar = $var6;
      $y = 6;
    }
  }
  else if ($var3 != null && count($var3) == 2){  //autor
    $xvar = $arr3;
    $x = 3;
    if ($var4 != null && count($var4) == 2){
      $yvar = $arr4;
      $y = 4;
    }
    else if ($var5 != null && count($var5) > 1){
      $yvar = $var5;
      $y = 5;
    }
    else if ($var6 != null && count($var6) > 1){
      $yvar = $var6;
      $y = 6;
    }
  }
  else if ($var4 != null && count($var4) == 2){  //cámara
    $xvar = $arr4;
    $x = 4;
    if ($var5 != null && count($var5) > 1){
      $yvar = $var5;
      $y = 5;
    }
    else if ($var6 != null && count($var6) > 1){
      $yvar = $var6;
      $y = 6;
    }
  }
  else if ($var5 != null && count($var5) > 1){ //materia
    $yvar = $var5;
    $y = 5;
    if ($var6 != null && count($var6) > 1){
      $xvar = $var6;
      $x = 6;
    }
  }
  if ($xvar == null){
    $var2[0]=2006;
    $var2[1]=2007;
    $var2[2]=2008;
    $var2[3]=2009;
    $var2[4]=2010;
    $xvar = $var2;
    $x = 2;
  }
  if ($yvar == null){
    $var3[0]='Mensaje';
    $var3[1]='Moción';
    $yvar = $arr3;
    $y = 3;
  }
?>

<table id="tb_datos">
	<caption>Balance particular: 
	  <?php
	    //título
	    echo $var1." en "; 
	    foreach ($var2 as $i=>$year) { 
	      if ($i>0) echo ', ';
	      echo $year; 
	    }
	    if (count($var3)==1) echo "; ".$var3[0]; 
	    if (count($var4)==1) echo "; ".$var4[0]; 
	    if (count($var5)>0) { 
	      echo "; Materias: "; 
	      foreach ($var5 as $i=>$materia) { 
	        if ($i>0) echo ', '; echo $materia; 
	      }
	    }
	    if (count($var6)>0) { 
	      echo "; Estados de tramitación: "; 
	      foreach ($var6 as $i=>$estado) {
	        if ($i>0) echo ', '; echo $estado; 
	      }
	    }
	  ?></caption>
	<thead>
		<tr>
			<td></td>
			<?php foreach ($xvar as $xkey=>$xval): ?>
  			<th scope="col"><?php if ($x==3 || $x==4) echo $xkey; else if ($x==6) echo $arr6[$xval]; else echo $xval; ?></th>
			<?php endforeach; ?>
		</tr>
	</thead>
	<tbody>
	  <?php $i=0; foreach ($yvar as $ykey=>$yval): ?>
  		<tr class="<?php $i++; echo fmod($i, 2) ? 'even' : 'odd'; ?>">
		    <th scope="row"><?php if ($y==3 || $y==4) echo $ykey; else if ($y==6) echo $arr6[$yval]; else echo $yval; ?></th>
	      <?php foreach ($xvar as $xkey=>$xval): ?>
		      <td>
		        <?php
  	          $valores = array($var1,null,null,null,null,null);
		          $valores[$x-1] = $xval;
		          if ($y==5) $valores[$y-1] = $arr5[$yval]; else $valores[$y-1] = $yval;
		          if ($x != 2 && $y != 2 && count($var2)==1) $valores[1] = $var2[0];
		          if ($x != 3 && $y != 3 && count($var3)==1) $valores[2] = $var3[0];
		          if ($x != 4 && $y != 4 && count($var4)==1) $valores[3] = $var4[0];
		          if ($x != 5 && $y != 5 && count($var5)>0){
		            foreach ($var5 as $v){
		              $v5[] = $arr5[$v];
		            }
		            $valores[4] = $v5;
		          }
		          if ($x != 6 && $y != 6 && count($var6)==1) $valores[5] = $var6[0];
  			      echo '<a href="javascript:document.hiddenForm.submit()">'.$proyecto->countBalance($valores[0],$valores[1],$valores[2],$valores[3],$valores[4],$valores[5]).'</a>';
		        ?>
		      </td>
		    <?php endforeach; ?>
  		</tr>
 	  <?php endforeach; ?>
	</tbody>
</table>

<form name="hiddenForm" method="POST" action="<?php echo url_for('ProyectoLey/balancelist') ?>">
<input type="hidden" name="var1" value="<?php echo $var1; ?>">
<input type="hidden" name="var2" value="<?php if ($var2 != null) foreach ($var2 as $i=>$var) echo ($i>0) ? ','.$var : $var; ?>">
<input type="hidden" name="var3" value="<?php if ($var3 != null) foreach ($var3 as $i=>$var) echo ($i>0) ? ','.$var : $var; ?>">
<input type="hidden" name="var4" value="<?php if ($var4 != null) foreach ($var4 as $i=>$var) echo ($i>0) ? ','.$var : $var; ?>">
<input type="hidden" name="var5" value="<?php if ($var5 != null) foreach ($var5 as $i=>$var) echo ($i>0) ? ','.$var : $var; ?>">
<input type="hidden" name="var6" value="<?php if ($var6 != null) foreach ($var6 as $i=>$var) echo ($i>0) ? ','.$var : $var; ?>">
</form>

