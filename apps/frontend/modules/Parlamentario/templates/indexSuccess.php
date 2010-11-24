<?php 
  use_stylesheet('demopage.css');
  use_javascript('jquery.min.js'); 
  use_javascript('ui/jquery.ui.core.min.js');
  use_javascript('ui/jquery.ui.widget.min.js');
  use_javascript('jquery-showhide.js');

  function printComunas($parl){
    if ($parl->getSenadorDiputado() == 'S'){
      $circ = $parl->getCircunscripcion();
      $distritos = $circ->getDistrito();
      foreach ($distritos as $distrito){
        $comunas = $distrito->getComuna();
        foreach ($comunas as $comuna){
          echo "-".$comuna->getIdComuna()."-";
        }
      }
    }
    else {
      $dist = $parl->getDistrito();
      $comunas = $dist->getComuna();
      foreach ($comunas as $comuna){
        echo "-".$comuna->getIdComuna()."-";
      }
    }
  }

  function printComunasCirc($parl){
    if ($parl->getSenadorDiputado() == 'S'){
      $circ = $parl->getCircunscripcion();
      $dist = $circ->getDistrito();
      $comunas = $dist[0]->getComuna();
      echo "title='";
      foreach ($comunas as $comuna){
        echo $comuna->getNombre().",";
      }
      echo "'";
    }
  }

  function printComunasDist($parl){
    if ($parl->getSenadorDiputado() == 'D'){
      $dist = $parl->getDistrito();
      $comunas = $dist->getComuna();
      echo "title='";
      foreach ($comunas as $comuna){
        echo $comuna->getNombre().",";
      }
      echo "'";
    }
  }

  if (isset($_POST['senador_diputado'])) $senador_diputado = $_POST['senador_diputado']; else $senador_diputado = 'S';
  if (isset($_POST['partido_comuna'])) $partido_comuna = $_POST['partido_comuna']; else $partido_comuna = '0';
  if (isset($_POST['partido'])) $partido = $_POST['partido']; else $partido = '0';
  if (isset($_POST['comuna'])) $comuna = $_POST['comuna']; else $comuna = '0';
  if (isset($_POST['filter'])) $filter = $_POST['filter']; else $filter = '';

  /*echo "<br>senador_diputado:".$senador_diputado;
  echo "<br>partido_comuna:".$partido_comuna;
  echo "<br>partido:".$partido;
  echo "<br>comuna:".$comuna;
  echo "<br>filter:".$filter;*/
?>

<?php slot('breadbrumb') ?>
  <li class="actual">> Perfiles Parlamentarios</li>
<?php end_slot() ?>

<h1 class="grafico">Perfiles Parlamentarios</h1>

<p class="desc">Busca acá a tu parlamentario e ingresa a su perfil para conocer todo lo que te interesa saber.</p>

<form>
  <div class="buscador_parlamentario">
    <input type="radio" name="senador_diputado" value="D" <?php if ($senador_diputado == 'D') echo "checked" ?>>Diputado
    <input type="radio" name="senador_diputado" value="S" <?php if ($senador_diputado == 'S') echo "checked" ?>>Senador<br>
  </div>

  <div class="buscador_partido">
    <select name="partido_comuna" id="partido_comuna" size="1">
      <option value="0" <?php if ($partido_comuna == '0') echo "selected" ?>>Buscar por</option>
      <option value="Partido" <?php if ($partido_comuna == 'Partido') echo "selected" ?>>Partido</option>
      <option value="Comuna" <?php if ($partido_comuna == 'Comuna') echo "selected" ?>>Comuna</option>
    </select>

    <select name="partido" id="partido" size="1">
      <?php $partidos = $parlamentarios[0]->getPartidos(); ?>
      <option value="0" <?php if ($partido == '0') echo "selected" ?>>-elije-</option>
      <?php foreach ($partidos as $p): ?>
        <?php echo '<option value="'.$p->getSigla().'" '; if ($partido == $p->getSigla()) echo "selected"; echo '>'.$p->getSigla().'</option>';  ?>
      <?php endforeach; ?>
    </select>

    <select name="comuna" id="comuna" size="1">
      <?php $comunas = $parlamentarios[0]->getComunas(); ?>
      <option value="0" <?php if ($comuna == '0') echo "selected" ?>>-elije-</option>
      <?php foreach ($comunas as $c): ?>
        <?php echo '<option value="-'.$c->getIdComuna().'-"'; if ($comuna == $c->getIdComuna()) echo "selected"; echo '>'.$c->getNombre().'</option>';  ?>
      <?php endforeach; ?>
    </select>
  </div>

  <div class="buscador_nombre">
    <label for="filter">También puedes buscar por nombre</label>  
    <input type="text" name="filter" value="<?php echo $filter; ?>" id="filter" />  
  </div>

</form>


<table id="tb_proyectos" class="parlamentarios">
  <thead>
    <tr class="titulos">
      <th></th>
      <th>Nombre</th>
      <th>Corporación</th>
      <th class="circ">Circunscripcion</th>
      <th class="dist">Distrito</th>
      <th class="comuna">Comuna</th>
      <th>Partido</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($parlamentarios as $parlamentario): ?>
    <tr>
      <td class="imgcell"><a href="<?php echo url_for('Parlamentario/show?id_parlamentario='.$parlamentario->getIdParlamentario()) ?>"><img src="/images/parlamentarios/<?php echo $parlamentario->getIdParlamentario() ?>_ch.png"></a></td>
      <td class="nombre"><a href="<?php echo url_for('Parlamentario/show?id_parlamentario='.$parlamentario->getIdParlamentario()) ?>"><?php echo $parlamentario->getNombre() ?> <?php echo $parlamentario->getApellidos() ?></a></td>
      <td class="imgcell p"><img class="sd" src="/images/<?php echo ($parlamentario->getSenadorDiputado() == 'D') ? 'camara' : 'senado'; ?>_ch.png" title="<?php echo ($parlamentario->getSenadorDiputado() == 'D') ? 'Cámara de Diputados' : 'Senado'; ?>" alt="<?php echo $parlamentario->getSenadorDiputado() ?>"></td>
      <td class="circ" <?php printComunasCirc($parlamentario); ?>><?php echo $parlamentario->getCircunscripcion()->getNombre() ?></td>
      <td class="dist" <?php printComunasDist($parlamentario); ?>><?php echo $parlamentario->getIdDistrito() ?></td>
      <td class="comuna"><?php printComunas($parlamentario); ?></td>
      <td class="partido"><a href="<?php echo url_for('Partido/show?id_partido='.$parlamentario->getIdPartido()) ?>"><img class="sp" src="/images/partidos/<?php echo $parlamentario->getIdPartido() ?>_30.png" title="<?php echo $parlamentario->getPartido() ?>" alt="<?php echo $parlamentario->getPartido() ?>"></a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

