<?php
  //semanas regionales y distritales
  $regionales = array(array('03/29/2010','04/02/2010'),array('04/26/2010','04/30/2010'),array('05/24/2010','05/28/2010'),array('06/21/2010','06/25/2010'),array('07/19/2010','07/23/2010'),array('08/23/2010','08/27/2010'),array('09/20/2010','09/24/2010'),array('10/18/2010','10/22/2010'),array('11/22/2010','11/26/2010'),array('12/27/2010','12/31/2010'),array('01/24/2011','01/28/2011'));
  
  $offset=(date("w")-1); 
  if ($offset<0) $offset=6; 
  if ($offset>=5) $offset-=7; 
  $dias=array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado","Domingo");
  $lunes = date("m/d/Y", mktime(0,0,0,date('m'), date('d')-$offset, date('Y') )); 
  $viernes = date("m/d/Y", mktime(0,0,0,date('m'), date('d')-$offset+4, date('Y') ));
?>

  
<?php $nodistrial=true; ?>

<?php foreach ($regionales as $regional) if ($lunes == $regional[0] && $viernes == $regional[1] && $i==0): ?>
  <?php $nodistrial=false; ?>
  <div class="sesion_destacada m_distrital">

    <h2>Semana distrital</h2>
    <p>Una semana al mes no hay registro de lo que hacen los parlamentarios por la semana distrital. Ayúdanos a verificar si es que ellos realmente van a sus regiones a conocer los problemas de sus electores y cumplir con su deber. Envíanos lo que sepas del senador de tu circunscripción o del diputado de tu distrito para fiscalizar a nuestras autoridades. Su sueldo sale del bolsillo de todos y su trabajo es gracias a nuestro sufragio.</p>
  </div>
  
<?php endif; ?>


<?php if ($nodistrial): ?>
  
  <div class="sesion_destacada m_<?php echo $debate->getProyectoLey()->getIdMateria() ?>">
    <h2><a href="<?php echo url_for('ProyectoLey/show?id_proyecto_ley='.$debate->getIdProyectoLey()) ?>"><?php echo $debate->getDestacadoTitulo() ?></a></h2>
    <p><?php echo $debate->getDestacadoTexto() ?></p>
  </div>

<?php endif; ?>

