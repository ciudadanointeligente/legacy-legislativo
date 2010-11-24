<table width="200" border="0" cellspacing="0">
  <tr><td>
    <div class="voto_box_1">
      <table id="tb_voto_1">
        <tbody>
          <tr><td><strong>Votación <?php echo ($votacion->getTipo()=='ambas') ? 'general y particular' : $votacion->getTipo(); ?></strong></td></tr>
          <tr><td><strong>Comisión</strong> <?php echo $votacion->getComision() ?></td></tr>
          <tr><td><?php if ($votacion->getTipo() == 'ambas') echo 'Conveniencia de legislar sobre el proyecto y todos sus artículos.'; else if ($votacion->getTipo() == 'general') echo 'Conveniencia de legislar sobre el proyecto'; else echo $votacion->getArticulo(); ?></td></tr>        
        </tbody>
      </table>
    </div>
  </td></tr>
  
  <tr>
    <td id="voto">
      <table width="200" border="0" cellspacing="5">
        <tr>
          <td colspan="2">
            <table id="tb_votacion_<?php echo $votacion->getIdVotacion() ?>" class="tb_votacion" width="200" border="0" cellspacing="5">
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
          <td rowspan="5"><div id="votacion_barchart_<?php echo $votacion->getIdVotacion() ?>" class="votacion_barchart"></div></td>
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
  </tr>
</table>

<script type="text/javascript">
$('#tb_votacion_<?php echo $votacion->getIdVotacion() ?>').visualize({type: 'bar', height: '60px', width: '120px', parseDirection: 'x', appendTitle: false, colors: ['#A8D342','#FD8D2A']}).appendTo('#votacion_barchart_<?php echo $votacion->getIdVotacion() ?>').trigger('visualizeRefresh');
</script>
