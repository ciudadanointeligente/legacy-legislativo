<?php 
  use_javascript('jquery.min.js'); 
  use_javascript('ui/jquery.ui.core.min.js');
  use_javascript('ui/jquery.ui.widget.min.js');
  use_javascript('ui/jquery.ui.accordion.min.js');
  use_javascript('jquery-accordion.js');
  use_stylesheet('tweet.css');
  use_stylesheet('perfilrelacion.css')
?>

<?php slot('breadbrumb') ?>
  <li>> <a href="<?php echo url_for('Parlamentario/index') ?>">Perfiles Parlamentarios</a></li>
  <li class="actual">> <?php echo $parlamentario->getNombre().' '.$parlamentario->getApellidos() ?></li>
<?php end_slot() ?>

<div id="top">
  <div class="topperfil">
    <img class="fotoperfil" src="/images/parlamentarios/<?php echo $parlamentario->getIdParlamentario() ?>.png">
  </div>
  <div class="datospersonales">
    <h1 class="perfil"><a href="#"><?php echo $parlamentario->getNombre() ?> <?php echo $parlamentario->getApellidos() ?></a></h1>
    <p><?php 
      if($parlamentario->getSenadorDiputado()=='S') echo "Senador por Circunscipción ".$parlamentario->getCircunscripcion();
      else echo "Diputado por Distrito ".$parlamentario->getDistrito();
    ?></p>
    <p>Sexo: <?php echo $parlamentario->getSexo() ?></p>
    <p>Fecha nacimiento: <?php echo $parlamentario->getDateTimeObject('fecha_nacimiento')->format('d/m/Y') ?></p>
  </div>

  <div class="block">
<div class="contpestanas">
<a href="#"> <div class="pestana curved-top"> Su perfil</div></a>
<a href="#"><div class="pestanadark curved-top"> <img src="../../../../../images/relinteres/ic-relacion18px.png" width="32" height="18" /> Su perfil de intereses</div></a>
    <div class="blockdata">
     
      <table class="enlacespersonales">
        <tbody>
          <tr><td>
                <p class="enunciado">mail: <a class="linkazul" href="mailto:<?php echo $parlamentario->getMail() ?>"><?php echo $parlamentario->getMail() ?></a></p>
                <p class="enunciado">web: <a class="linkazul" href="http://<?php echo $parlamentario->getWeb() ?>"><?php echo $parlamentario->getWeb() ?></a></p>
                <p class="enunciado">twitter: <a class="linkazul" href="http://twitter.com/<?php echo $parlamentario->getTwitter() ?>"><?php echo $parlamentario->getTwitter() ?></a></p>
                <p class="enunciado">facebook: <a class="linkazul" href="http://www.facebook.com/<?php if (is_numeric($parlamentario->getFacebook())) echo 'profile.php?id='; echo $parlamentario->getFacebook(); ?>"><?php echo $parlamentario->getFacebook() ?></a></p>
          </td></tr>
        </tbody>
      </table>
      <table class="datoelectorales">
        <tbody>
          <tr><th>Nº votos</th><th>% votos</th></tr>
          <tr><td><?php echo $parlamentario->getVotoNro() ?></td><td><?php echo $parlamentario->getVotoPorcentaje() ?></td></tr>
        </tbody>
      </table>
      <table class="datoelectorales">
        <tbody>
          <tr><th>Pacto</th><th>Partido</th></tr>
          <tr><td class="pacto"><?php echo $parlamentario->getPacto() ?></td><td class="partido"><a href="<?php echo url_for('Partido/show?id_partido='.$parlamentario->getIdPartido()) ?>"><img src="/images/partidos/<?php echo $parlamentario->getPartido()->getIdPartido() ?>_ch.png"></a></td></tr>
        </tbody>
      </table>
      </p>
    </div> 
  </div>

<div id="left">
  <div id="accordion">
   <h3><a href="#"> SUS INDICADORES</a></h3>
  <div>
  <div class="indicador" style="margin-bottom: 10px;">
  <h6>declaración de interés</h6>
  <div class="indicador-gris">
  <div class="indicador_valor amarillo">4.5</div>
  <div class="indicador_bajada">en el promedio<br />
  <span class="chico">v/s</span><span> óptimo funcionario público</span></div></div>
  <br />
   <div class="indicador-gris">
  <div class="indicador_valor bajolamedia">_<!--aqui solo carga la imagen --></div>
  <div class="indicador_bajada">bajo el promedio<br />
  <span>respecto a sus pares</span></div>
  </div>
  </div>
  <div class="indicador" style="margin-bottom: 10px;">
  <h6>vinculaciones societarias</h6>
   <div class="indicador-gris">
  <div class="indicador_valor rojo">20%</div>
  <div class="indicador_bajada">COHERENCIA <br />
  <span class="bajada">en su declaración</span></div>
  </div>
  </div>
  
  
  </div>
   
    <h3><a href="#">INFO PARLAMENTARIO</a></h3>
    <div>
      <?php if ($parlamentario->getMesaDirectiva() != null): ?><p><span class="enunciado">Mesa directiva:</span> <?php echo $parlamentario->getMesaDirectiva() ?></p><?php endif; ?>
      <p><span class="enunciado">Períodos legislativos:</span> <?php echo ($parlamentario->getSenadorDiputado()=='S') ? $parlamentario->getPeriodosSenadorDesc() : $parlamentario->getPeriodosDiputadoDesc() ?></p>
      <p><span class="enunciado">Primera vez:</span> <?php echo $parlamentario->getPrimeraVez() ?></p>
      <p><span class="enunciado">Comisiones anteriores:</span> <?php echo $parlamentario->getComisionesAnteriores() ?></p>
      <p><span class="enunciado">Comisiones actuales:</span> <?php echo ($parlamentario->getSenadorDiputado()=='S' && $parlamentario->getComisionesActuales() == null) ? 'El senado no las ha definido. Se resolverá el 6 de abril.' : $parlamentario->getComisionesActuales() ?></p>
      <p><span class="enunciado">Comité parlamentario:</span> <?php echo $parlamentario->getComiteParlamentario() ?></p>
    </div>
    <h3><a href="#">GASTOS Y FINANCIAMIENTO ELECTORAL</a></h3>
    <div>
      <?php if ($parlamentario->getGastoElectoral2005() != NULL && $parlamentario->getGastoElectoral2005() != 0 && $parlamentario->getGastoElectoral2005() != ''): ?>
        <p><span class="enunciado">Gasto electoral 2005:</span> <?php echo '$ '.number_format($parlamentario->getGastoElectoral2005(), 0, ',', '.'); ?></p>
      <?php endif; ?>
      <?php if ($parlamentario->getFinanciamientoElectoral2005() != NULL && $parlamentario->getFinanciamientoElectoral2005() != 0  && $parlamentario->getFinanciamientoElectoral2005() != ''): ?>
        <p><span class="enunciado">Financiamiento electoral 2005:</span> <?php echo '$ '.number_format($parlamentario->getFinanciamientoElectoral2005(), 0, ',', '.') ?></p>
      <?php endif; ?>
      <?php if ($parlamentario->getGastoElectoral2005() == NULL || $parlamentario->getGastoElectoral2005() == 0 || $parlamentario->getGastoElectoral2005() == ''): ?>
        <p><span class="enunciado">Gasto electoral 2009:</span> <?php echo ($parlamentario->getGastoElectoral2009() == 0) ? 'No presentó su declaración al SERVEL.' : '$ '.number_format($parlamentario->getGastoElectoral2009(), 0, ',', '.'); ?></p>
      <?php endif; ?>
      <?php if ($parlamentario->getFinanciamientoElectoral2005() == NULL || $parlamentario->getFinanciamientoElectoral2005() == 0 || $parlamentario->getFinanciamientoElectoral2005() == ''): ?>
        <p><span class="enunciado">Financiamiento electoral 2009:</span> <?php echo ($parlamentario->getFinanciamientoElectoral2009() == 0) ? 'No presentó su declaración al SERVEL.' : '$ '.number_format($parlamentario->getFinanciamientoElectoral2009(), 0, ',', '.'); ?></p>
      <?php endif; ?>
      <p><span class="enunciado">Dieta parlamentaria:</span> <?php echo ($parlamentario->getSenadorDiputado()=='D') ? '$ 5.161.415' : number_format($parlamentario->getDietas(), 0, ',', '.'); ?></p>
    </div>
    <h3><a href="#">DECLARACIONES DE INTERESES Y PATRIMONIO</a></h3>
    <div>
      
          <div class="bt_block"><?php echo ($parlamentario->getDeclaracionInteres() != NULL) ? '<a  href="'.$parlamentario->getDeclaracionInteres().'"><img src="http://legislativo.votainteligente.cl/images/blanksheet.png"> <div>Ver declaración de intereses</div></a>' : 'No ha presentado su declaración de intereses 2010.' ?></div>
   
      <div class="bt_block">
          <?php echo ($parlamentario->getDeclaracionPatrimonio() != NULL) ? '<a  target="_blank" href="'.$parlamentario->getDeclaracionPatrimonio().'"><img src="http://legislativo.votainteligente.cl/images/blanksheet.png"> <div>Ver declaración de patrimonio</div></a>' : 'No ha presentado su declaración de patrimonio 2010.' ?>
      </div>
    </div>
    <h3><a href="#">TRAYECTORIA</a></h3>
    <div>
      <p><span class="enunciado">Educación universitaria:</span> <?php echo $parlamentario->getEducacionUniversitaria() ?></p>
      <p><span class="enunciado">Educación postgrado:</span> <?php echo $parlamentario->getEducacionPostgrado() ?></p>
      <p><span class="enunciado">Cargos de gobierno:</span> <?php echo $parlamentario->getCargosGobierno() ?></p>
      <p><span class="enunciado">Cargos de elección:</span> <?php echo $parlamentario->getCargosEleccion() ?></p>
      <p><span class="enunciado">Experiencia política:</span> <?php echo $parlamentario->getExperienciaPolitica() ?></p>
      <p><span class="enunciado">Experiencia laboral:</span> <?php echo $parlamentario->getExperienciaLaboral() ?></p>
    </div>
  </div>
</div>

<div id="midcontent" ><p>Conoce las mociones presentadas por tu parlamentario según materia y estado del proyecto de ley para los periódos legislativos 2006-2010(<img src="http://legislativo.votainteligente.cl/images/color2006-2010.png">) y 2010-2014(<img src="http://legislativo.votainteligente.cl/images/color2010-2014.png">).</p>

  <div id="mociones">
    <?php include_partial('Parlamentario/mociones', array('parlamentario' => $parlamentario)) ?>
  </div>
  
  <?php if ($parlamentario->getSenadorDiputado() == 'D'): ?>
    <div id="votaciones">
      <?php include_partial('Parlamentario/votaciones', array('parlamentario' => $parlamentario)) ?>
      <div class="voto_semanas"<img src="/images/votacion/votacion_s.png" /><a href="<?php echo url_for('Parlamentario/votaciones?id_parlamentario='.$parlamentario->getIdParlamentario()) ?>">ver votaciones anteriores</a></div>
    </div>
  <?php endif; ?>


</div>
<div id="right">  
        <div id="twitter">
          <?php include_partial('Parlamentario/twitter', array('parlamentario' => $parlamentario)) ?>
        </div>
        <div id="news">
          <?php include_partial('Parlamentario/news', array('parlamentario' => $parlamentario)) ?>
        </div>
</div>