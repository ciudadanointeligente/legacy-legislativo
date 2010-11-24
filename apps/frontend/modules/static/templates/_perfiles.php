<?php 
  use_stylesheet('demopage.css');
  use_stylesheet('btn.css');
  use_javascript('jquery.min.js'); 
  use_javascript('jquery-parl-busc.js');
?>

<!--[if IE 7]><?php use_stylesheet('bubbletip-IE.css') ?><![endif]-->        
        
<div class="homelegis" style="margin-right: 10px;" >
  <img src="/images/home-perfiles/pparlamentarios.png" alt="perfiles parlamentarios"  /> <span class="blue clearfix">Perfiles Parlamentarios</span>        

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


<div class="homelegis" style="margin-right: 10px; ";"  ><img src="/images/home-perfiles/ppartidos.png" alt="perfiles de partidos políticos" /> <span class="blue clearfix">Perfiles de partidos políticos</span>
  <div class="homeperfilpartido" >

    <div class="marcoboton"><a class="boton" href="http://legislativo.votainteligente.cl/Partido/show/id_partido/1" onclick="this.blur();"><span class="iconopartido"> <img src="/images/partidos/1_ch.png" alt="c" /></span> <span class="txtbts">
      <table>
        <tbody>
          <tr>
            <td class="tdtextoboton">Democracia Cristiana</td>
          </tr>
        </tbody>
      </table>
    </span></a></div>
       <div class="marcoboton"><a class="boton" href="http://legislativo.votainteligente.cl/Partido/show/id_partido/2" onclick="this.blur();"><span class="iconopartido"> <img src="/images/partidos/2_ch.png" alt="c" /></span> <span class="txtbts">
      <table>
        <tbody>
          <tr>
            <td class="tdtextoboton">Partido por la Democracia</td>
          </tr>
        </tbody>
      </table>
    </span></a></div>
       <div class="marcoboton"><a class="boton" href="http://legislativo.votainteligente.cl/Partido/show/id_partido/3" onclick="this.blur();"><span class="iconopartido"> <img src="/images/partidos/3_ch.png" alt="c" /></span> <span class="txtbts">
      <table>
        <tbody>
          <tr>
            <td class="tdtextoboton">Partido Regionalista de los Independientes</td>
          </tr>
        </tbody>
      </table>
    </span></a></div>
       <div class="marcoboton"><a class="boton" href="http://legislativo.votainteligente.cl/Partido/show/id_partido/4" onclick="this.blur();"><span class="iconopartido"> <img src="/images/partidos/4_ch.png" alt="c" /></span> <span class="txtbts">
      <table>
        <tbody>
          <tr>
            <td class="tdtextoboton">Partido Radical Social Democráta</td>
          </tr>
        </tbody>
      </table>
    </span></a></div>
       <div class="marcoboton"><a class="boton" href="http://legislativo.votainteligente.cl/Partido/show/id_partido/5" onclick="this.blur();"><span class="iconopartido"> <img src="/images/partidos/5_ch.png" alt="c" /></span> <span class="txtbts">
      <table>
        <tbody>
          <tr>
            <td class="tdtextoboton"> 	Partido Socialista de Chile</td>
          </tr>
        </tbody>
      </table>
    </span></a></div>
       <div class="marcoboton"><a class="boton" href="http://legislativo.votainteligente.cl/Partido/show/id_partido/6" onclick="this.blur();"><span class="iconopartido"> <img src="/images/partidos/6_ch.png" alt="c" /></span> <span class="txtbts">
      <table>
        <tbody>
          <tr>
            <td class="tdtextoboton">Renovación Nacional</td>
          </tr>
        </tbody>
      </table>
    </span></a></div>
       <div class="marcoboton"><a class="boton" href="http://legislativo.votainteligente.cl/Partido/show/id_partido/7" onclick="this.blur();"><span class="iconopartido"> <img src="/images/partidos/7_ch.png" alt="c" /></span> <span class="txtbts">
      <table>
        <tbody>
          <tr>
            <td class="tdtextoboton">Unión Democráta Independiente</td>
          </tr>
        </tbody>
      </table>
    </span></a></div>
       <div class="marcoboton"><a class="boton" href="http://legislativo.votainteligente.cl/Partido/show/id_partido/8" onclick="this.blur();"><span class="iconopartido"> <img src="/images/partidos/8_ch.png" alt="c" /></span> <span class="txtbts">
      <table>
        <tbody>
          <tr>
            <td class="tdtextoboton">Chile Primero</td>
          </tr>
        </tbody>
      </table>
    </span></a></div>
       <div class="marcoboton"><a class="boton" href="http://legislativo.votainteligente.cl/Partido/show/id_partido/9" onclick="this.blur();"><span class="iconopartido"> <img src="/images/partidos/9_ch.png" alt="c" /></span> <span class="txtbts">
      <table>
        <tbody>
          <tr>
            <td class="tdtextoboton">Movimiento Amplio social</td>
          </tr>
        </tbody>
      </table>
    </span></a></div>
       <div class="marcoboton"><a class="boton" href="http://legislativo.votainteligente.cl/Partido/show/id_partido/10" onclick="this.blur();"><span class="iconopartido"> <img src="/images/partidos/10_ch.png" alt="c" /></span> <span class="txtbts">
      <table>
        <tbody>
          <tr>
            <td class="tdtextoboton">Independientes</td>
          </tr>
        </tbody>
      </table>
    </span></a></div>
     <div class="marcoboton"><a class="boton" href="http://legislativo.votainteligente.cl/Partido/show/id_partido/11" onclick="this.blur();"><span class="iconopartido"> <img src="/images/partidos/11_ch.png" alt="c" /></span> <span class="txtbts">
      <table>
        <tbody>
          <tr>
            <td class="tdtextoboton">Partido comunista</td>
          </tr>
        </tbody>
      </table>
      </span></a>
    </div>
  </div>
</div>

        
<div class="homelegis"  style="margin-right: 10px" ><img src="/images/home-perfiles/ppresidente.png" alt="Perfile del presidente"  /> <span class="blue clearfix">Perfil del presidente</span>
  <div class="menulegis" >
    <div class="marcoboton"><a class="boton" href="http://votainteligente.cl/index.php?option=com_content&view=article&id=13&Itemid=20" onclick="this.blur();"><span class="icono"> <img src="/images/home/bt_perfiles_ch.png" /></span> <span class="txtbts">
      <table>
        <tbody>
            <tr>
                <td class="tdtextoboton">Presidente<br />
Sebastián Piñera E.</td>
            </tr>
        </tbody>
    </table>
    </span></a></div>
    <br/>
  
  </div>
</div>
