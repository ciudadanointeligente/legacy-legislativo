<?php 
  use_stylesheet('jcarousel.css');
  use_stylesheet('bubbletip.css');
  use_javascript('jquery.min.js'); 
  use_javascript('jquery-parl-busc.js');
  use_javascript('jquery-carousel.js'); 
  use_javascript('ui/jcarousellite.min.js'); 
  use_javascript('ui/jbubbletip.js');
  use_stylesheet('analisis.css');
?>

<!--[if IE 7]><?php use_stylesheet('bubbletip-IE.css') ?><![endif]-->

<!-- columna izquierda -->
<div class="homelegis" style="margin-right: 10px;" ><img src="/images/home/conoce.png" alt="conoce tu congreso"  /> <span class="orange clearfix">Conoce tu parlamento</span>
  <div class="menulegis" >
    <div class="marcoboton"><a class="boton" href="http://votainteligente.cl/index.php?option=com_content&view=article&id=1189&Itemid=104" onclick="this.blur();"><span class="icono"><img src="http://www.votainteligente.cl/images/stories/apps-bts/ic-escanos.png" /></span><span class="txtbts"><div class="textbot, tdtextoboton"><br>Cambio en el equipo: conoce tu parlamento</div></span></a>
    </div>
	  <div class="marcoboton"><a class="boton" href="http://www.votainteligente.cl/index.php?option=com_content&amp;view=article&amp;id=1248&amp;catid=101:guia-congreso&amp;Itemid=120"><span class="icono"> <img alt="ic-guia" src="http://www.votainteligente.cl/images/stories/apps-bts/ic-guia.png" height="92" width="46" /></span> <span class="txtbts"><div class="textbot, tdtextoboton">Guía Congreso Nacional: ¿Alguna duda?</div></span></a>
    </div>
 	  <div class="marcoboton"><a id="baul_btn" class="boton" onclick="this.blur();" href="<?php echo url_for('ProyectoLey/index') ?>"><span class="icono"> <img src="/images/home/baul.png" height="92" width="46" /></span> <div id="tip_baul" style="display:none;">Encuentra aqui el balance histórico<br>sobre los Proyectos de Ley</div> <span class="txtbts"><div class="textbot, tdtextoboton"><br>El baúl de los proyectos</div></span></a>
    </div>
  </div>

  <div class="bottomlegis">
    <div id="jCarouselLiteDemo">
      <div class="carousel main">
        <div class="jCarouselLite">
          <ul>
          <li><a href="http://votainteligente.cl/index.php?option=com_content&view=article&id=1173&catid=101:guia-congreso&Itemid=120#requisitos">¿Puede ser parlamentario una persona que no haya estudiado una carrera profesional?</a></li>
          <li><a href="http://votainteligente.cl/index.php?option=com_content&view=article&id=1174&catid=101:guia-congreso&Itemid=120">¿Puede realizarse una sesión y se pueden tomar acuerdos cuando en la sesión asisten sólo algunos parlamentarios?</a></li>
          <li><a href="http://votainteligente.cl/index.php?option=com_content&view=article&id=1178&catid=101:guia-congreso&Itemid=120#leytrans"> ¿Se encuentra el Congreso obligado a la ley de transparencia y acceso a la información?</a></li>
           <li><a href="http://votainteligente.cl/index.php?option=com_content&view=article&id=1176&catid=101:guia-congreso&Itemid=120"> ¿Pueden los ciudadanos presentar proyectos de ley?</a></li>
           <li><a href="http://votainteligente.cl/index.php?option=com_content&view=article&id=1177&catid=101:guia-congreso&Itemid=120#vacantes">¿Qué ocurre si tu parlamentario deja su cargo antes de tiempo, quién lo reemplazará? </a></li>
           <li><a href="http://votainteligente.cl/index.php?option=com_content&view=article&id=1176&catid=101:guia-congreso&Itemid=120#sancion">¿Qué ocurre si un proyecto de ley es aprobado por  una de las cámaras y rechazado por la otra?</a></li>
          </ul>
        </div>
        <a href="#" class="prev"></a>
        <a href="#" class="next"></a>
        <div class="clear"></div> 
      </div>  
    </div>
  </div>
</div>

<!-- columna centro -->
<div class="homelegis" style="margin-right: 10px;"  ><img src="/images/home/endiscusion.png" alt="proyectos en discusión actualmente"" /> <span class="orange clearfix">Monitoreo de proyectos en discusión</span>
  <div class="menulegis" >
    <div class="marcoboton"><a id="disc_btn" class="boton" href="<?php echo url_for('Sesion/index') ?>" onclick="this.blur();"><span class="icono"> <img src="/images/home/discusion_proyectos.png" /></span> <div id="tip_disc" style="display:none;">Revisa los proyectos<br>que se están discutiendo</div> <span class="txtbts"><div class="textbot, tdtextoboton">¿Qué proyectos se están discutiendo en sala?</div></span></a>
    </div>
  </div>
  
  <div class="bottomlegis">
     <?php if (count($debates)>0) include_partial('Sesion/destacado', array('debate' => $debates[0], 'i' => '0')) ?>
  </div>
</div>

<!-- columna derecha -->
  <div class="homelegis"><img src="/images/home/perfiles.png" alt="Perfiles de los parlamentarios"  /> <span class="orange clearfix">Perfiles</span>
    <div class="menulegis" >
      <div class="marcoboton"><a id="parl_btn" class="boton" href="<?php echo url_for('Parlamentario/index') ?>" onclick="this.blur();"><span class="icono"> <img src="/images/home/bt_perfiles.png" /></span> <div id="tip_parl" style="display:none;">Revisa quiénes componen<br>el Congreso Nacional</div> <span class="txtbts"><div class="textbot, tdtextoboton"><br>Diputados y Senadores</div></span></a>
    </div>
    <div class="marcoboton"><a class="boton" href="<?php echo url_for('Partido/index') ?>" onclick="this.blur();"><span class="icono"> <img src="/images/home/bt_partidos.png" /></span> <span class="txtbts"><div class="textbot, tdtextoboton"><br>Partidos políticos</div></span></a>
    </div> <br/>
  </div>
  <div class="bottomlegis">  

    <div id="buscador">
      <h1>Buscador de Perfiles</h1>

      <form action="<?php echo url_for('Parlamentario/index') ?>" method="post">
        <div class="buscador_parlamentario">
          <input type="radio" name="senador_diputado" value="D" checked>Diputado
          <input type="radio" name="senador_diputado" value="S">Senador<br>
        </div>

        <div class="buscador_partido">
          <select name="partido_comuna" id="partido_comuna" size="1">
            <option value="0" selected>Buscar por</option>
            <option value="Partido">Partido</option>
            <option value="Comuna">Comuna</option>
          </select>

          <select name="partido" id="partido" size="1">
            <option value="0" selected>-elije-</option>
            <?php foreach ($partidos as $p): ?>
              <?php echo '<option value="'.$p->getSigla().'">'.$p->getSigla().'</option>';  ?>
            <?php endforeach; ?>
          </select>

          <select name="comuna" id="comuna" size="1">
            <option value="0" selected>-elije-</option>
            <?php foreach ($comunas as $c): ?>
              <?php echo '<option value="'.$c->getIdComuna().'">'.$c->getNombre().'</option>';  ?>
            <?php endforeach; ?>
          </select>

          <input type="submit" value="Buscar">
        </div>

        <div class="buscador_nombre">
          <label for="filter">También puedes buscar por nombre</label>  
          <input type="text" name="filter" value="" id="filter" /> 
        </div>

      </form>
    </div>
  </div>
</div>    
