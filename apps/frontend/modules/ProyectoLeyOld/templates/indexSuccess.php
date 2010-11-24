<?php 
  use_stylesheet('visualize.jQuery.css');
  use_stylesheet('demopage.css');
  use_javascript('jquery.min.js');
  use_javascript('visualize.jQuery.js');
  use_javascript('visualize.js');
?>

<!--[if IE 7]><?php use_javascript('excanvas.compiled.js') ?><![endif]-->

<?php slot('breadbrumb') ?>
  <li class="actual">> El baúl de los Proyectos</li>
<?php end_slot() ?>

<h1 class="grafico">El baúl de los proyectos</h1>

<p class="desc">En esta sección encontrarás qué ha ocurrido con los proyectos de ley que han ingresado a nuestro Congreso Nacional entre 1990 y el 10 de marzo de 2010.</p>

<h2 class="desc-title">Proyectos de ley presentados</h2>
<p class="desc">Desde 1990 han ingresado a nuestro Parlamento <?php echo $proyecto_ley->countProyectos(1990,2010,0) ?> proyectos de ley. Entérate de la cantidad de proyectos de ley presentados en cada período legislativo.</p>
<div id="piechart"></div>

<p class="fuente">Gráfico: elaboración propia, Fuente: Sistema de Tramitación de Proyectos del Congreso Nacional (SIL)</p>

<h2 class="desc-title">Proyectos de ley presentados según el estado de tramitación en que se encuentran</h2>
<p class="desc">Conoce y compara en qué fase de la tramitación se encuentran actualmente los proyectos de ley que han ingresado al Congreso, por período legislativo.</p>
<div id="barchart"></div>

<p class="fuente">Gráfico: elaboración propia, Fuente: Sistema de Tramitación de Proyectos del Congreso Nacional (SIL)</p>

<h2 class="desc-title">Historial de los proyectos que ingresaron hasta el 10 de marzo del 2010</h2>
<p class="desc">Pincha los valores en cada estado de tramitación y podrás ver el listado de los proyectos de ley que se encuentran en el estado de tramitación que te interesa. Selecciona un proyecto y revisa su historia y su paso por el Congreso Nacional.</p>

<table id="tb_balance">
  <caption>Proyectos presentados entre 1990-2010</caption>
  <thead>
    <tr>
      <td class="borde">Periodo de ingreso</td>
      <th>Publicado</th>
      <th>Rechazado<br>Inconstitucional<br>Inadmisible</th>
      <th>En tramitación</th>
      <th>Retirado</th>
      <th>Archivado<br>Solicitud de archivo</th>
    </tr>
  </thead>
  <tbody>
    <tr class='odd'>
      <th class='borde-top'>1990-1994</th>
      <?php 
        echo "<td><a href=".url_for('ProyectoLey/situacion?etapa=1&start=1990&end=1994&act=0').">".$proyecto_ley->countProyectos(1990,1994,1)."</a></td>";
        echo "<td><a href=".url_for('ProyectoLey/situacion?etapa=2&start=1990&end=1994&act=0').">".$proyecto_ley->countProyectos(1990,1994,2)."</a></td>";
        echo "<td><a href=".url_for('ProyectoLey/situacion?etapa=3&start=1990&end=1994&act=0').">".$proyecto_ley->countProyectos(1990,1994,3)."</a></td>";
        echo "<td><a href=".url_for('ProyectoLey/situacion?etapa=4&start=1990&end=1994&act=0').">".$proyecto_ley->countProyectos(1990,1994,4)."</a></td>";
        echo "<td><a href=".url_for('ProyectoLey/situacion?etapa=5&start=1990&end=1994&act=0').">".$proyecto_ley->countProyectos(1990,1994,5)."</a></td>";
      ?>
    </tr>
    <tr class='even'>
      <th class='borde-middle'>1994-1998</th>
      <?php 
        echo "<td><a href=".url_for('ProyectoLey/situacion?etapa=1&start=1994&end=1998&act=0').">".$proyecto_ley->countProyectos(1994,1998,1)."</a></td>";
        echo "<td><a href=".url_for('ProyectoLey/situacion?etapa=2&start=1994&end=1998&act=0').">".$proyecto_ley->countProyectos(1994,1998,2)."</a></td>";
        echo "<td><a href=".url_for('ProyectoLey/situacion?etapa=3&start=1994&end=1998&act=0').">".$proyecto_ley->countProyectos(1994,1998,3)."</a></td>";
        echo "<td><a href=".url_for('ProyectoLey/situacion?etapa=4&start=1994&end=1998&act=0').">".$proyecto_ley->countProyectos(1994,1998,4)."</a></td>";
        echo "<td><a href=".url_for('ProyectoLey/situacion?etapa=5&start=1994&end=1998&act=0').">".$proyecto_ley->countProyectos(1994,1998,5)."</a></td>";
      ?>
    </tr>
    <tr class='odd'>
      <th class='borde-middle'>1998-2002</th>
      <?php 
        echo "<td><a href=".url_for('ProyectoLey/situacion?etapa=1&start=1998&end=2002&act=0').">".$proyecto_ley->countProyectos(1998,2002,1)."</a></td>";
        echo "<td><a href=".url_for('ProyectoLey/situacion?etapa=2&start=1998&end=2002&act=0').">".$proyecto_ley->countProyectos(1998,2002,2)."</a></td>";
        echo "<td><a href=".url_for('ProyectoLey/situacion?etapa=3&start=1998&end=2002&act=0').">".$proyecto_ley->countProyectos(1998,2002,3)."</a></td>";
        echo "<td><a href=".url_for('ProyectoLey/situacion?etapa=4&start=1998&end=2002&act=0').">".$proyecto_ley->countProyectos(1998,2002,4)."</a></td>";
        echo "<td><a href=".url_for('ProyectoLey/situacion?etapa=5&start=1998&end=2002&act=0').">".$proyecto_ley->countProyectos(1998,2002,5)."</a></td>";
      ?>
    </tr>
    <tr class='even'>
      <th class='borde-middle'>2002-2006</th>
      <?php 
        echo "<td><a href=".url_for('ProyectoLey/situacion?etapa=1&start=2002&end=2006&act=0').">".$proyecto_ley->countProyectos(2002,2006,1)."</a></td>";
        echo "<td><a href=".url_for('ProyectoLey/situacion?etapa=2&start=2002&end=2006&act=0').">".$proyecto_ley->countProyectos(2002,2006,2)."</a></td>";
        echo "<td><a href=".url_for('ProyectoLey/situacion?etapa=3&start=2002&end=2006&act=0').">".$proyecto_ley->countProyectos(2002,2006,3)."</a></td>";
        echo "<td><a href=".url_for('ProyectoLey/situacion?etapa=4&start=2002&end=2006&act=0').">".$proyecto_ley->countProyectos(2002,2006,4)."</a></td>";
        echo "<td><a href=".url_for('ProyectoLey/situacion?etapa=5&start=2002&end=2006&act=0').">".$proyecto_ley->countProyectos(2002,2006,5)."</a></td>";
      ?>
    </tr>
    <tr class='odd'>
      <th class='borde-bottom'>2006-2010</th>
      <?php 
        echo "<td><a href=".url_for('ProyectoLey/situacion?etapa=1&start=2006&end=2010&act=0').">".$proyecto_ley->countProyectos(2006,2010,1)."</a></td>";
        echo "<td><a href=".url_for('ProyectoLey/situacion?etapa=2&start=2006&end=2010&act=0').">".$proyecto_ley->countProyectos(2006,2010,2)."</a></td>";
        echo "<td><a href=".url_for('ProyectoLey/situacion?etapa=3&start=2006&end=2010&act=0').">".$proyecto_ley->countProyectos(2006,2010,3)."</a></td>";
        echo "<td><a href=".url_for('ProyectoLey/situacion?etapa=4&start=2006&end=2010&act=0').">".$proyecto_ley->countProyectos(2006,2010,4)."</a></td>";
        echo "<td><a href=".url_for('ProyectoLey/situacion?etapa=5&start=2006&end=2010&act=0').">".$proyecto_ley->countProyectos(2006,2010,5)."</a></td>";
      ?>
    </tr>
  </tbody>
</table>

<table id="tb_balance_total">
    <tr>
      <th>Total</th>
      <?php 
        echo "<td><a href=".url_for('ProyectoLey/situacion?etapa=1&start=1990&end=2010&act=0').">".$proyecto_ley->countProyectos(1990,2010,1)."</a></td>";
        echo "<td><a href=".url_for('ProyectoLey/situacion?etapa=2&start=1990&end=2010&act=0').">".$proyecto_ley->countProyectos(1990,2010,2)."</a></td>";
        echo "<td><a href=".url_for('ProyectoLey/situacion?etapa=3&start=1990&end=2010&act=0').">".$proyecto_ley->countProyectos(1990,2010,3)."</a></td>";
        echo "<td><a href=".url_for('ProyectoLey/situacion?etapa=4&start=1990&end=2010&act=0').">".$proyecto_ley->countProyectos(1990,2010,4)."</a></td>";
        echo "<td><a href=".url_for('ProyectoLey/situacion?etapa=5&start=1990&end=2010&act=0').">".$proyecto_ley->countProyectos(1990,2010,5)."</a></td>";
      ?>
    </tr>
  </tbody>
</table>

<p class="suma">Total proyectos ingresados: <a href="<?php echo url_for('ProyectoLey/situacion?etapa=0&start=1990&end=2010&act=0') ?>"><?php echo $proyecto_ley->countProyectos(1990,2010,0) ?></a></p>
