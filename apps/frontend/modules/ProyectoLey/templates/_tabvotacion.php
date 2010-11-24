<div id="vtab_<?php echo $votacion->getIdVotacion() ?>" class="vtab">
  <ul>
      <li class="votos_si"></li>
      <li class="votos_no"></li>
      <li class="votos_aus"></li>
      <li class="votos_pareo"></li>
      <li class="votos_abs"></li>
  </ul>
  <div>
      <h4>Votos SI</h4>
      <div class="par_si">
        <table border="0" cellspacing="5">
          <?php foreach ($votacion->getVotosVoto('y') as $i=>$voto): ?>
            <tr><td class="<?php echo fmod($i, 2) ? 'evenvoto' : 'oddvoto'; ?>"><?php $p=$voto->getParl($voto->getIdParlamentario()); ?><a href="<?php echo url_for('Parlamentario/show?id_parlamentario='.$p->getIdParlamentario()) ?>"><?php echo $p->getNombre()." ".$p->getApellidos(); ?></a></td></tr>
          <?php endforeach; ?>
        </table>
      </div>
  </div>
  <div>
      <h4>Votos NO</h4>
      <div class="par_no">
        <table border="0" cellspacing="5">
          <?php foreach ($votacion->getVotosVoto('n') as $i=>$voto): ?>
            <tr><td class="<?php echo fmod($i, 2) ? 'evenvoto' : 'oddvoto'; ?>"><?php $p=$voto->getParl($voto->getIdParlamentario()); ?><a href="<?php echo url_for('Parlamentario/show?id_parlamentario='.$p->getIdParlamentario()) ?>"><?php echo $p->getNombre()." ".$p->getApellidos(); ?></a></td></tr>
          <?php endforeach; ?>
        </table>
      </div>
  </div>
  <div>
      <h4>Votos AUSENTES</h4>
      <div class="par_aus">
        <table border="0" cellspacing="5">
          <?php foreach ($votacion->getVotosAus() as $i=>$parl): ?>
            <tr><td class="<?php echo fmod($i, 2) ? 'evenvoto' : 'oddvoto'; ?>"><a href="<?php echo url_for('Parlamentario/show?id_parlamentario='.$parl->getIdParlamentario()) ?>"><?php echo $parl->getNombre()." ".$parl->getApellidos() ?></a></td></tr>
          <?php endforeach; ?>
        </table>
      </div>
  </div>
  <div>
      <h4>Votos PAREOS</h4>
      <div class="par_pareo">
        <table border="0" cellspacing="5">
          <?php foreach ($votacion->getVotosVoto('p') as $i=>$voto): ?>
            <tr><td class="<?php echo fmod($i, 2) ? 'evenvoto' : 'oddvoto'; ?>"><?php $p=$voto->getParl($voto->getIdParlamentario()); ?><a href="<?php echo url_for('Parlamentario/show?id_parlamentario='.$p->getIdParlamentario()) ?>"><?php echo $p->getNombre()." ".$p->getApellidos(); ?></a></td></tr>
          <?php endforeach; ?>
        </table>
      </div>
  </div>
  <div>
      <h4>Votos ABSTENCIONES</h4>
      <div class="par_abs">
        <table border="0" cellspacing="5">
          <?php foreach ($votacion->getVotosVoto('a') as $i=>$voto): ?>
            <tr><td class="<?php echo fmod($i, 2) ? 'evenvoto' : 'oddvoto'; ?>"><?php $p=$voto->getParl($voto->getIdParlamentario()); ?><a href="<?php echo url_for('Parlamentario/show?id_parlamentario='.$p->getIdParlamentario()) ?>"><?php echo $p->getNombre()." ".$p->getApellidos(); ?></a></td></tr>
          <?php endforeach; ?>
        </table>
      </div>
  </div>
</div>

<script type="text/javascript">
$(function() {
  var $items = $('#vtab_<?php echo $votacion->getIdVotacion() ?>>ul>li');
  $items.click(function() {
    $items.removeClass('selected');
    $(this).addClass('selected');

    var index = $items.index($(this));
    $('#vtab_<?php echo $votacion->getIdVotacion() ?>>div').hide().eq(index).show();
  }).eq(0).click();
});
</script>
