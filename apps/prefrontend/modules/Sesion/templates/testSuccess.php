<?php
  use_stylesheet('jcarousel.css');
  use_javascript('jquery.min.js'); 
  use_javascript('jquery-carousel.js'); 
  use_javascript('ui/jcarousellite.min.js'); 

  //semanas regionales y distritales
  $regionales = array(array('03/29/2010','04/02/2010'),array('04/26/2010','04/30/2010'),array('05/24/2010','05/28/2010'),array('06/21/2010','06/25/2010'),array('07/19/2010','07/23/2010'),array('08/23/2010','08/27/2010'),array('09/20/2010','09/24/2010'),array('10/18/2010','10/22/2010'),array('11/22/2010','11/26/2010'),array('12/27/2010','12/31/2010'),array('01/24/2011','01/28/2011'));
?>

<?php $offset=(date("w")-1); if ($offset<0) $offset=6; if ($offset>=5) $offset-=7; $dias=array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado","Domingo"); ?>
<?php $lunes = date("m/d/Y", mktime(0,0,0,date('m'), date('d')-$offset, date('Y') )); $viernes = date("m/d/Y", mktime(0,0,0,date('m'), date('d')-$offset+4, date('Y') )); ?>

<div class="carousel_header">Semana del <?php $l=explode("/",$lunes); echo date("d/m/Y", mktime(0,0,0,$l[0], $l[1], $l[2])).' al '; $v=explode("/",$viernes); echo date("d/m/Y", mktime(0,0,0,$v[0], $v[1], $v[2])); ?></div>

<div id="jCarouselLiteDemo">
  <div class="carousel main">
    <div class="jCarouselLite">
      <ul>
        <?php foreach ($regionales as $regional) if ($lunes == $regional[0] && $viernes == $regional[1]) { echo '<li><img src="/images/semana_distrital.png" align="left"><br>Semana distrital y regional.<br><a href="http://www.votainteligente.cl/index.php?option=com_content&view=article&id=1407:ultimos-debates&catid=109:debate-parlam">"Porque los ciudadanos no sabemos lo que hacen los parlamentarios en sus semanas distritales, envianos tu reporte de sus actividades en regiones".</a></li>'; break; } ?>
        <?php $num=0; foreach ($sesions as $j=>$sesion): ?>
          <?php if (strtotime($sesion->getFecha()) >= strtotime($lunes) && strtotime($sesion->getFecha()) <= strtotime($viernes)): ?>
            
            <?php foreach ($sesion->getProyectoLey() as $proyecto): ?>
              <?php if (count($proyecto->getDebates($proyecto->getIdProyectoLey()))>0): ?>
                <li>
                  <?php echo $dias[$sesion->getDateTimeObject('fecha')->format('w')].', '.$sesion->getDateTimeObject('fecha')->format('d/m').' - '.$sesion->getCamara(); ?><br>
                  <a href="<?php $num++; echo url_for('ProyectoLey/show?id_proyecto_ley='.$proyecto->getIdProyectoLey()) ?>"><img src="/images/ley.png" align="left"/></a>
                  <a href="<?php echo url_for('ProyectoLey/show?id_proyecto_ley='.$proyecto->getIdProyectoLey()) ?>"><?php echo ($proyecto->getTituloSesion() != null) ? $proyecto->getTituloSesion() : ucfirst(strtolower($proyecto->getTitulo())) ?></a>
                </li>
              <?php endif; ?>
            <?php endforeach; ?>
            <?php if ($num==0): ?><li>No se seleccionaron proyectos de la tabla para analizar. </li><?php endif; ?>
          <?php endif; ?>
        <?php endforeach; ?>
      </ul>
    </div>
    <a href="#" class="prev"></a>
    <a href="#" class="next"></a>
    <div class="clear"></div> 
  </div>  
</div>
