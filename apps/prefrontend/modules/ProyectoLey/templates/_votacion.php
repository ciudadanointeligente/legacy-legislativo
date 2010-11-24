<table border="0" cellspacing="0">
  <tr class="hd">
    <td colspan="2" class="icvota, vota"><img src="/images/proyectoley/votacion-01.png" width="21" height="21" />Votaciones</td>
  </tr>
  <tr>
    <td colspan="2" class="tipo">Votación <?php echo ($votacion->getTipo()=='ambas') ? 'general y particular' : $votacion->getTipo() ?>. <?php if ($nota): ?>
      <a class="vota_asterisco" id="nota_btn_<?php echo $votacion->getIdVotacion() ?>" class="nota_btn"><img src="/images/proyectoley/asterisco.png" /><div id="tip_nota_<?php echo $votacion->getIdVotacion() ?>" style="display:none;">No constan acá los artículos que se votaron por separado por tener un quórum especial y que también fueron aprobados.</div></a>
    <?php endif; ?>
    </td>
  </tr>
  
  <tr>
    <td colspan="2"><p><?php if ($votacion->getTipo() == 'ambas') echo 'Conveniencia de legislar sobre el proyecto y todos sus artículos.'; else if ($votacion->getTipo() == 'general') echo 'Conveniencia de legislar sobre el proyecto'; else echo $votacion->getArticulo(); ?></p>
    </td>
  </tr>
  <tr>
    <td class="voto">
      <table border="0" cellspacing="5">
        <tr>
          <td colspan="2">
            <table id="tb_votacion_<?php echo $votacion->getIdVotacion() ?>" class="tb_votacion" border="0" cellspacing="5">
              <thead>
                <tr>
                  <td></td>
                  <th scope="col" class="tb_voto_hide">Si&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row" class="sino">si</th>
                  <td class="si"><?php echo $votacion->getVotoSi() ?></td>
                </tr>
                <tr>
                  <th scope="row" class="sino">no</th>
                  <td class="no"><?php echo $votacion->getVotoNo() ?></td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
        <tr>
          <td class="variables">abs.</td>
          <td class="variables"><?php echo $votacion->getVotoAbs() ?></td>
        </tr>
        <tr>
          <td class="variables">p</td>
          <td class="variables"><?php echo $votacion->getVotoPareos() ?></td>
          </tr>
        <tr>
          <td class="variables">aus.</td>
          <td class="variables"><?php echo $votacion->getVotoAus() ?></td>
        </tr>
        <tr>
          <td class="variables">res.</td>
          <td><img src="/images/proyectoley/<?php echo ($votacion->getResultado() == 'Aprobado') ? 'positivo.png" title="Aprobado"' : 'negativo.png" title="Rechazado"'; ?> width="14" height="14" /></td>
        </tr>
      </table>
    </td>
    <td>
      <div id="votacion_barchart_<?php echo $votacion->getIdVotacion() ?>" class="votacion_barchart"></div>
    </td>
  </tr>
</table>

<script type="text/javascript">
//diagrama de votación
$('#tb_votacion_<?php echo $votacion->getIdVotacion() ?>').visualize({type: 'bar', height: '30px', width: '100px', parseDirection: 'x', appendTitle: false, colors: ['#A8D342','#FD8D2A']}).appendTo('#votacion_barchart_<?php echo $votacion->getIdVotacion() ?>').trigger('visualizeRefresh');

//bubble tip
$('#nota_btn_<?php echo $votacion->getIdVotacion() ?>').bubbletip($('#tip_nota_<?php echo $votacion->getIdVotacion() ?>'), {
  //positionAt: 'mouse',
  deltaDirection: 'left',
  offsetTop: 0,
  offsetRight: 50
});
</script>
