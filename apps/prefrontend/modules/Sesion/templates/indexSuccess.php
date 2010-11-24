<?php
  use_stylesheet('analisis.css');
  //semanas regionales y distritales
  $regionales = array(array('03/29/2010','04/02/2010'),array('04/26/2010','04/30/2010'),array('05/24/2010','05/28/2010'),array('06/21/2010','06/25/2010'),array('07/19/2010','07/23/2010'),array('08/23/2010','08/27/2010'),array('09/20/2010','09/24/2010'),array('10/18/2010','10/22/2010'),array('11/22/2010','11/26/2010'),array('12/27/2010','12/31/2010'),array('01/24/2011','01/28/2011'));
?>
<?php slot('breadbrumb') ?>
  <li class="actual">&gt; Análisis legislativo</li>
<?php end_slot() ?>

<img src="/images/banner_proyectos.png" class="border-naranjo"><br>
<div id="sessiones">

  <div class="session_scroll">
  
    <?php $offset=(date("w")-1); if ($offset<0) $offset=6; if ($offset>=5) $offset-=7; $dias=array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado","Domingo"); ?>
    <?php for ($i=0; $i<8; $i++): ?>
      <?php $lunes = date("m/d/Y", mktime(0,0,0,date('m'), date('d')-$offset-$i*7, date('Y') )); $viernes = date("m/d/Y", mktime(0,0,0,date('m'), date('d')-$offset+4-$i*7, date('Y') )); ?>
    <div class="session<?php if ($i!=0) echo '_ex' ?>">
      <table class="tb_sessiones">
        <tr><td>
          <div class="sessiones_head">
            <table class="tb_sessiones_head">
              <thead>
                <tr class="titulos_sessiones">
                  <th>Semana del <?php $l=explode("/",$lunes); echo date("d/m/Y", mktime(0,0,0,$l[0], $l[1], $l[2])).' al '; $v=explode("/",$viernes); echo date("d/m/Y", mktime(0,0,0,$v[0], $v[1], $v[2])); ?></th>
                </tr>
              </thead>
            </table>
          </div>
        </tr></td>
        
        <tr><td>
          <div class="sessiones_body">
            <table class="tb_sessiones_body">
              <tbody class="scrollContent">
                <?php foreach ($regionales as $regional) if ($lunes == $regional[0] && $viernes == $regional[1]) { echo '<tr><td><img src="/images/semana_distrital.png" align="left"><p>Semana distrital y regional.</p><p><a href="http://www.votainteligente.cl/index.php?option=com_content&view=article&id=1407:ultimos-debates&catid=109:debate-parlam">"Porque los ciudadanos no sabemos lo que hacen los parlamentarios en sus semanas distritales, envianos tu reporte de sus actividades en regiones".</a></td></tr>'; break; } ?>
                <?php $mas = false; $num=0; foreach ($sesions as $j=>$sesion): ?>
                  <?php if (strtotime($sesion->getFecha()) >= strtotime($lunes) && strtotime($sesion->getFecha()) <= strtotime($viernes)): ?>
                    <tr><td><?php echo $dias[$sesion->getDateTimeObject('fecha')->format('w')].', '.$sesion->getDateTimeObject('fecha')->format('d/m').' - '.$sesion->getCamara(); ?></td></tr>
                    <?php foreach ($sesion->getProyectoLey() as $proyecto): ?>
                      <?php if (count($proyecto->getDebates($proyecto->getIdProyectoLey()))>0): ?>
                        <tr class="<?php echo fmod($num, 2) ? 'even' : 'odd'; $num++; ?>"><td><a href="<?php echo url_for('ProyectoLey/show?id_proyecto_ley='.$proyecto->getIdProyectoLey()) ?>"><img src="/images/ley.png" align="left"/></a><a href="<?php echo url_for('ProyectoLey/show?id_proyecto_ley='.$proyecto->getIdProyectoLey()) ?>"><?php echo ($proyecto->getTituloSesion() != null) ? $proyecto->getTituloSesion() : ucfirst(strtolower($proyecto->getTitulo())) ?></a></td></tr>
                      <?php else: ?>
                        <?php $mas = true; ?>
                      <?php endif; ?>
                    <?php endforeach; ?>
                    <?php if ($num==0): ?><tr class="even"><td>No se seleccionaron proyectos de la tabla para analizar. Revisa abajo "otros proyectos".</td></tr><?php endif; ?>
                  <?php endif; ?>
                <?php endforeach; ?>
                <?php if ($mas): ?><tr class="mas"><td><a href="<?php echo url_for('Sesion/'.$i); ?>"><img src="/images/proyectos_otros.png"></a></td></tr><?php endif; ?>
              </tbody>
            </table>
          </div>
        </tr></td>
      </table>
    </div>
    <?php endfor; ?>

  </div>
</div>

<div id="sesiones_destacadas">
  <?php foreach ($debates as $i=>$debate): ?>
    <?php include_partial('Sesion/destacado', array('debate' => $debate, 'i' => $i)) ?>
  <?php endforeach; ?>
</div>
