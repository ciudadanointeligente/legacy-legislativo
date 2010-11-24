<?php 
    use_stylesheet('votacion.css');
    use_stylesheet('visualize.css');
	use_stylesheet('pl_votacion.css');	
    use_stylesheet('http://www.votainteligente.cl/plugins/content/sexybookmarks/style.css');
    use_stylesheet('visualize-light-votacion.css');
    use_javascript('jquery.min.js');
    use_javascript('visualize2.jQuery.js');
    use_stylesheet('../lytebox/main.css');
    use_javascript('../lytebox/main.js');
?>
<?php if ($this_proyecto->getIdProyectoLey() != null): ?>
  <table class="tb_proyecto_detalle">
    <tbody>
    <?php include_partial('ProyectoLey/cabecera', array('proyecto' => $this_proyecto)) ?>
    
    <?php if ($this_proyecto->getEtapa() != 'Tramitación terminada') : ?>
      <tr><td colspan="4">
        <table class="tb_proyecto_detalle2">
          <thead>
            <tr class="titulos3">
              <th>Meses en trámite</th>
              <th>Urgencia</th>
              <th>% avance</th>
              <th>Último movimiento semanal</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="meses"><?php if ($this_proyecto->getFechaIngreso() != null) echo floor((time()-mktime(0,0,0,$this_proyecto->getDateTimeObject('fecha_ingreso')->format('m'),$this_proyecto->getDateTimeObject('fecha_ingreso')->format('d'),$this_proyecto->getDateTimeObject('fecha_ingreso')->format('Y')))/2628000); ?></td>
              <td class="imgcell"><?php if ($this_proyecto->getUrgencia() != null) if ($this_proyecto->getUrgencia() == 'Sin urgencia' || $this_proyecto->getUrgencia() == '') echo '<img alt="Sin urgencia" title="Sin urgencia" src="/images/proyectoley/urgencia_1.png">'; else if ($this_proyecto->getUrgencia() == 'Simple') echo '<img alt="Simple" title="Simple" src="/images/proyectoley/urgencia_2.png">'; else if ($this_proyecto->getUrgencia() == 'Suma') echo '<img alt="Suma" title="Suma" src="/images/proyectoley/urgencia_3.png">'; else if ($this_proyecto->getUrgencia() == 'Discusión inmediata') echo '<img alt="Discusión inmediata" title="Discusión inmediata" src="/images/proyectoley/urgencia_4.png">'; ?></td>
              <td class="avance"></td>
              <td class="velocidad"></td>
            </tr>
          </tbody>
        </table>
      </td></tr>
    <?php endif; ?>
    
    <?php if (trim($this_proyecto->getIniciativa()) == 'Mensaje' || count($this_proyecto->getAutorProyectoLey()) > 0) : ?>
    <tr><td colspan="4">
      <h2>Autores:</h2>
        <?php if (trim($this_proyecto->getIniciativa()) == 'Mensaje') echo 'Presidente/a de la República'; else foreach ($this_proyecto->getAutores($this_proyecto->getAutorProyectoLey()) as $i=>$autor) { if ($i>0) echo ', '; echo ($autor->getIdParlamentario() != null) ? '<a href="'.url_for('Parlamentario/show?id_parlamentario='.$autor->getIdParlamentario()).'">'.$autor->getNombre().' '.$autor->getApellidos().'</a>' : $autor->getNombre().' '.$autor->getApellidos(); } ?></td>
      </tr>
    <?php endif; ?>
    
    <tr><td colspan="4">
      <h2>Detalles:</h2>
      <p><a href="http://sil.senado.cl/cgi-bin/sil_tramitacion.pl?<?php echo $this_proyecto->getNroInterno() ?>" rel="lyteframe" title="Proyecto en discusión > Tramitación" rev="width: 630px; height: 400px; scrolling: no;">Tramitación</a> |
      <a href="http://sil.senado.cl/cgi-bin/sil_oficios.pl?<?php echo $this_proyecto->getNroInterno() ?>" rel="lyteframe" title="Proyecto en discusión > Oficios" rev="width: 630px; height: 400px; scrolling: no;">Oficios</a> |
      <a href="http://sil.senado.cl/cgi-bin/sil_indicaciones.pl?<?php echo $this_proyecto->getNroInterno() ?>" rel="lyteframe" title="Proyecto en discusión > Indicaciones" rev="width: 630px; height: 400px; scrolling: no;">Indicaciones</a> |
      <a href="http://sil.senado.cl/cgi-bin/sil_urgencias.pl?<?php echo $this_proyecto->getNroInterno() ?>" rel="lyteframe" title="Proyecto en discusión > Urgencias" rev="width: 630px; height: 400px; scrolling: no;">Urgencias</a></p>
    </td></tr>
    <tr><td colspan="4">
      <?php if ($this_proyecto->getResumen() != NULL): ?>
        <div class="resumen">
          <h2 class="tit_bloque">De qué se trata el proyecto:</h2>
          <p><?php echo $this_proyecto->getResumen() ?></p>
        </div>
      <?php endif; ?>
    </td>
    </tr>
    <tr>
        <td colspan="4">
          <?php $debates = $this_proyecto->getDebates($this_proyecto->getIdProyectoLey()); ?>
          <?php if (count($debates) > 0): ?>
            <h2 class="tit_bloque">Sigue el debate y sus votaciones:</h2>
            <?php $fecha1=0;?>
            <?php foreach ($debates as $i => $debate){ ?>
                <?php if($fecha1!=$debate->getDateTimeObject('fecha')->format('d/m/Y')): ?>
                    <div id="pl_marco">
                        <div id="pl_fecha"><?php echo $debate->getDateTimeObject('fecha')->format('d/m/Y') ?></div>
                <?php endif; ?>


            <?php echo ($debate->getComisionSala()) ? '<div class="pl_debate_tit_comision">' : '<div class="pl_debate_tit_sala">'; ?>
            <div class="pl_debate_camara">
                      <a name="<?php echo $i?>">
                      <?php if(trim($debate->getCamara()) == 'Senado'): ?>
                        <img class="ico" alt="Senado" title="Senado" src="/images/senado_blanco.png" />
                      <?php elseif(trim($debate->getCamara()) == 'C.Diputados'): ?>
                        <img class="ico" alt="Cámara Diputados" title="Cámara Diputados" src="/images/camara_blanco.png" />
                      <?php else: ?>
                        <img class="ico" alt="Senado" title="Senado" src="/images/mixto.png" />
                      <?php endif; ?>
                      </a>
            </div>
            <?php echo ($debate->getComisionSala()) ? '<div class="pl_debate_comision">Debate en Comisión</div>' : '<div class="pl_debate_sala">Debate en Sala</div>' ?>
            </div>
            <div id="pl_sobre"><strong>Sobre:</strong> <?php echo $debate->getTema() ?></div>
            <div id="pl_tipo"><em>Tipo de discusión:</em> <?php if ($debate->getDiscusion() == '0') echo 'Particular.'; else if ($debate->getDiscusion() == '1') echo 'General.'; else if ($debate->getDiscusion() == '2') echo 'General y Particular.'; else echo 'Única.'; ?></div>
            <div class="pl_debate_datitos">
                    <!-- votacion -->
                    <?php if ($debate->getComisionSala() == 0): ?>

                      <?php $vot=0; foreach ($this_proyecto->getVotacion() as $votacion): ?>
                        <?php if ($votacion->getVisible() && $votacion->getCamara() == $debate->getCamara() && $votacion->getFecha() == $debate->getFecha()): ?>
                          <?php if ($vot==0): ?>
                            <div class="pl_votacion">
                              <?php include_partial('ProyectoLey/votacion', array('votacion' => $votacion, 'debate' => $debate, 'nota' => $votacion->getNota())) ?>
                            </div>
                          <?php endif; ?>
                          <?php $vot++; ?>

                        <?php endif; ?>
                      <?php endforeach; ?>

                    <?php else: ?>

                      <?php $vot=0; foreach ($debate->getVotacionComisionOrdered() as $votacion): ?>
                        <?php if ($vot==0): ?>
                          <div class="pl_votacion">
                            <?php include_partial('ProyectoLey/votacion', array('votacion' => $votacion, 'debate' => $debate, 'nota' => false)) ?>
                          </div>
                        <?php endif; ?>
                        <?php $vot++; ?>
                      <?php endforeach; ?>

                    <?php endif; ?>

                    <?php if ($vot==0): ?>
                      <div class="pl_votacion vota"><!--<img src="/images/proyectoley/no_votacion-01.png" width="21" height="21" />No hubo votación--></div>

                    <?php else: ?>

                      <div class="pl_tb_votacion_botones">
                        <a href="<?php if ($debate->getComisionSala()) $tipo='#comision'; else $tipo='#sala'; echo url_for('ProyectoLey/votaciones?id_proyecto_ley='.$this_proyecto->getIdProyectoLey().$tipo) ?>" id="detalles_btn_<?php echo $debate->getIdDebate() ?>"><img src="/images/proyectoley/detalles.png" align="right" /><div id="tip_detalles_<?php echo $debate->getIdDebate() ?>" style="display:none;">Ve los detalles de ésta y otras votaciones que se llevaron a cabo sobre el proyecto.</div></a>
                        <?php if ($tipo=='#sala'): ?>
                        <a href="http://www.camara.cl/trabajamos/sala_votacion_detalle.aspx?prmId=<?php echo $votacion->getIdParlamento() ?>" target="_blank" id="fuente_btn_<?php echo $debate->getIdDebate() ?>"><img src="/images/proyectoley/fuente.png" align="right" /><div id="tip_fuente_<?php echo $debate->getIdDebate() ?>" style="display:none;">Gráficos: Elaboración Vota Inteligente. Fuente: www.congreso.cl</div></a>
                        <?php endif; ?>
                      </div>

                    <?php endif; ?>

                    <!-- textos -->
                    <span><?php if ($debate->getComisionSala()) { echo '<strong>En qué comisión:</strong> '; if ($debate->getComision() != NULL) { foreach ($debate->getComision() as $j=>$comision) { if ($j>0) echo '; '; echo $comision->getNombre(); } if ($debate->getComisionesUnidas()) echo ' unidas.'; }} ?></span>
                      <p><?php echo $debate->getDebate() ?></p>
                    <span><?php if ($debate->getDocs() != NULL){ $docs = explode(",",$debate->getDocs()); echo '<a href="'.trim($docs[0]).'"><img src="/images/ley.png" alt="Para conocer más de este debate, pincha acá." title="Para conocer más de este debate, pincha acá."/></a> '; } ?></span>

                    <script type="text/javascript">
                      //tooltips
                      $('#detalles_btn_<?php echo $debate->getIdDebate() ?>').bubbletip($('#tip_detalles_<?php echo $debate->getIdDebate() ?>'), {
                        deltaDirection: 'left',
                        offsetTop: 0,
                        offsetRight: 50
                      });
                      $('#fuente_btn_<?php echo $debate->getIdDebate() ?>').bubbletip($('#tip_fuente_<?php echo $debate->getIdDebate() ?>'), {
                        deltaDirection: 'left',
                        offsetTop: 0,
                        offsetRight: 50
                      });
                    </script>

                  </div>
                  <div id="pl_shared">
                    <?php include_partial('ProyectoLey/share', array('link' => 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'].'#'.$i, 'titulo' => ($this_proyecto->getTituloSesion() != null) ? $this_proyecto->getTituloSesion() : ucfirst(strtolower($this_proyecto->getTitulo())))) ?>
                  </div>



                <?php if($fecha1==$debate->getDateTimeObject('fecha')->format('d/m/Y')): ?>
                    </div>
                <?php endif; ?>
                            <?php $fecha1=$debate->getDateTimeObject('fecha')->format('d/m/Y'); ?>
           <?php } ?>
      <?php endif; ?>
    </td></tr>
    </tbody>
  </table>
<?php endif; ?>