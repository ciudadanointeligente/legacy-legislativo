<?php
  use_stylesheet('votacion.css');
?>

<?php slot('breadbrumb') ?>
  <li>> <a href="<?php echo url_for('Parlamentario/index') ?>">Perfiles Parlamentarios</a></li>
  <li>> <a href="<?php echo url_for('Parlamentario/show?id_parlamentario='.$parlamentario->getIdParlamentario()) ?>"><?php echo $parlamentario->getNombre().' '.$parlamentario->getApellidos() ?></a></li>
  <li class="actual">> Votaciones</li>
<?php end_slot() ?>

<?php if (count($votaciones = $parlamentario->getVotacionesSala()) > 0): ?>

<h3 name="votos" class="tit"><img src="/images/proyectoley/votacion-01.png" />Las Votaciones</h3>

  <?php foreach ($votaciones as $voto): ?>
  
    <?php if (count($voto->getProyectoLey()->getDebate()) > 0): ?>

      <div class="voto">
        <div class="voto_box">
          <div class="voto_titulo"><?php echo ($voto->getProyectoLey()->getTituloSesion()==null) ? $voto->getProyectoLey()->getTitulo() : $voto->getProyectoLey()->getTituloSesion() ?>           <span class="voto_nroboletin">Boletín: <a href="<?php echo url_for('ProyectoLey/show?id_proyecto_ley='.$voto->getIdProyectoLey()) ?>"><?php echo $voto->getProyectoLey()->getNroBoletin(); ?></a></span></div>
         

          
          <table id="tb_votos">
            <tr><td>
              <div class="voto_box_1">
                <table id="tb_voto_1">
                  <thead>
                    <th class="voto_sala">SALA</th>
                    <th class="voto_materia"><?php echo $voto->getProyectoLey()->getMateria(); ?></th>
                    <th class="voto_fecha"><?php echo $voto->getDateTimeObject('fecha')->format('d/m/Y'); ?></th>
                  </thead>
                  <tbody>
                    <tr>
                      <td colspan="3"><strong>Votación <?php echo ($voto->getTipo()=='ambas') ? 'general y particular' : $voto->getTipo(); ?></strong><?php echo '<br>'.$voto->getArticulo(); ?><br><?php echo $voto->getMateria(); ?></td>
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
                      <td class="voto_voto"><img src="/images/votacion/<?php $vot=$voto->getVoto($parlamentario->getIdParlamentario()); if ($vot == null) echo 'vot_ausente.png" title="Ausente"'; else { if ($vot=='y') echo 'vot_si.png" title="Si"'; else if ($vot=='n') echo 'vot_no.png" title="No"'; else if ($vot=='a') echo 'vot_abstencion.png" title="Abstención"'; else if ($vot=='p') echo 'vot_pareo.png" title="Pareo"'; echo 'vot_ausente.png" title="Ausente"'; } ?> /></td>
                      <td class="voto_resultado"><img src="/images/votacion/<?php echo ($voto->getResultado() == 'Aprobado') ? 'vot_positivo.png" title="Aprobado"' : 'vot_negativo.png" title="Rechazado"'; ?> /></td>
                    </tr>
                    <tr>
                      <td colspan="2" class="voto_mas"><img src="/images/votacion/votacion_s.png" /><a href="<?php echo url_for('ProyectoLey/votaciones?id_proyecto_ley='.$voto->getProyectoLey()->getIdProyectoLey()) ?>">ver más votaciones</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </td></tr>
          </table>
        </div>
        
        <?php include_partial('Parlamentario/votaciones_comision', array('parlamentario' => $parlamentario, 'voto' => $voto, 'perfil' => false)) ?>

      </div>
      
    <?php endif; ?>
  <?php endforeach; ?>

<?php endif; ?>

