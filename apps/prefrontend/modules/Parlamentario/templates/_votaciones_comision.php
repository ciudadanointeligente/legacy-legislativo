<?php 
  use_javascript('jquery.min.js');
  use_javascript('ui/jquery.effects.core.js');
  use_javascript('ui/jquery.effects.blind.js');
  use_javascript('votacion-comision.js');
?>

<?php $debate=$voto->getProyectoLey()->getDebate(); if ($debate!=null && (count($votoscom = $parlamentario->getVotacionesComisionDebate($debate[0]->getIdDebate())) > 0)): ?>

  <div class="voto_boton_comision"><a href="#" id="button_<?php echo $voto->getIdVotacion() ?>"><img src="/images/votacion/comision.png" align="left" /> <span>ve su voto en comisión.</span></a></div>

  <div id="voto_com_<?php echo $voto->getIdVotacion() ?>">

    <?php foreach ($votoscom as $i=>$votocom): ?>

      <div class="voto_box">

        <table id="tb_votos">
          <tr><td>
            <div class="voto_box_1">
              <table id="tb_voto_1">
                <thead>
                  <th class="voto_comision">COMISIÓN</th>
                  <th class="voto_fecha"><?php echo $votocom->getDebate()->getDateTimeObject('fecha')->format('d/m/Y'); ?></th>
                </thead>
                <tbody>
                  <tr>
                    <td colspan="2"><strong>Votación <?php echo ($votocom->getTipo()=='ambas') ? 'general y particular' : $votocom->getTipo(); ?></strong><br><strong>Comisión</strong> <?php echo $votocom->getComision() ?><br><?php if ($votocom->getTipo() == 'ambas') echo 'Conveniencia de legislar sobre el proyecto y todos sus artículos.'; else if ($votocom->getTipo() == 'general') echo 'Conveniencia de legislar sobre el proyecto'; else echo $votocom->getArticulo(); ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </td>

          <td>            
            <div class="voto_box_2">
              <table id="tb_voto_2">
                <thead>
                  <th class="voto_tit_voto">Voto</th>
                  <th class="voto_tit_resultado">Resultado</th>
                </thead>
                <tbody>
                  <tr>
                    <td class="voto_voto"><img src="/images/votacion/<?php $vot=$votocom->getVoto($parlamentario->getIdParlamentario()); if ($vot == null) echo 'vot_ausente.png" title="Ausente"'; else { if ($vot=='s') echo 'vot_si.png" title="Si"'; else if ($vot=='n') echo 'vot_no.png" title="No"'; else if ($vot=='a') echo 'vot_abstencion.png" title="Abstención"'; else if ($vot=='p') echo 'vot_pareo.png" title="Pareo"'; echo 'vot_ausente.png" title="Ausente"'; } ?> /></td>
                    <td class="voto_resultado"><img src="/images/votacion/<?php echo ($votocom->getResultado() == 'Aprobado') ? 'vot_positivo.png" title="Aprobado"' : 'vot_negativo.png" title="Rechazado"'; ?> /></td>
                  </tr>
                  <tr>
                    <td colspan="2" class="voto_mas"><img src="/images/votacion/votacion_s.png" /><a href="<?php echo url_for('ProyectoLey/votaciones?id_proyecto_ley='.$votocom->getProyectoLey()->getIdProyectoLey().'#comision') ?>">ver más votaciones</a></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </td></tr>
        </table>
      </div>
      <?php if ($perfil) break; ?>
      
    <?php endforeach; ?>
  
  </div>
      
<?php endif; ?>

<script type="text/javascript">
$(function() {
  $("#voto_com_<?php echo $voto->getIdVotacion() ?>").hide();
  $("#button_<?php echo $voto->getIdVotacion() ?>").click(function() {
    $("#voto_com_<?php echo $voto->getIdVotacion() ?>").toggle('blind',null,600);
    return false;
  });
});  
</script>
