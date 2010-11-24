<?php 
  use_stylesheet('votacion.css');
  use_stylesheet('visualize.css');
  use_stylesheet('visualize-light-votacion.css');
  use_javascript('jquery.min.js');
	use_javascript('visualize2.jQuery.js');
	use_javascript('visualize-votacion.js');
?>

<h1>Otorga un bono solidario a las familias de menores ingresos.</h1>

Nro Boletín: 6852-05
  <table width="200" border="0" cellspacing="0">

  <tr class="hd">
    <td class="icvota, vota"><img src="/images/proyectoley/votacion-01.png" width="21" height="21" />Votaciones</td>
  </tr>
  <tr>
    <td id="tipo">Tipo de votación: general. </td>
  </tr>
  <tr>
    <td id="voto">

      <table width="200" border="0" cellspacing="5">
        <tr>
          <td colspan="2">
            <table id="tb_votacion_2" class="tb_votacion" width="200" border="0" cellspacing="5">
              <thead>
                <tr>
                  <td></td>
                  <th scope="col" class="tb_voto_hide">Si&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</th>

                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row" class="sino">si</th>
                  <td class="si">114</td>
                </tr>
                <tr>

                  <th scope="row" class="sino">no</th>
                  <td class="no">0</td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
        <tr>

          <td class="variables">abs.</td>
          <td class="variables">0</td>
          <td rowspan="5"><div id="votacion_barchart_2" class="votacion_barchart"></div></td>
        </tr>
        <tr>
          <td class="variables">p</td>
          <td class="variables">0</td>

          </tr>
        <tr>
          <td class="variables">aus.</td>
          <td class="variables">0</td>
        </tr>
        <tr>
          <td class="variables">res.</td>

          <td><img src="/images/proyectoley/positivo.png" title="Aprobado" width="14" height="14" /></td>
        </tr>
      </table>
    </td>
  </tr>
</table>

<script type="text/javascript">
$('#tb_votacion_2').visualize({type: 'bar', height: '30px', width: '100px', parseDirection: 'x', appendTitle: false, colors: ['#A8D342','#FD8D2A']}).appendTo('#votacion_barchart_2').trigger('visualizeRefresh');
</script>
  <table width="200" border="0" cellspacing="0">
  <tr class="hd">

    <td class="icvota, vota"><img src="/images/proyectoley/votacion-01.png" width="21" height="21" />Votaciones</td>
  </tr>
  <tr>
    <td id="tipo">Tipo de votación: general. </td>
  </tr>
  <tr>
    <td id="voto">
      <table width="200" border="0" cellspacing="5">

        <tr>
          <td colspan="2">
            <table id="tb_votacion_3" class="tb_votacion" width="200" border="0" cellspacing="5">
              <thead>
                <tr>
                  <td></td>
                  <th scope="col" class="tb_voto_hide">Si&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</th>
                </tr>

              </thead>
              <tbody>
                <tr>
                  <th scope="row" class="sino">si</th>
                  <td class="si">114</td>
                </tr>
                <tr>
                  <th scope="row" class="sino">no</th>

                  <td class="no">0</td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
        <tr>
          <td class="variables">abs.</td>

          <td class="variables">0</td>
          <td rowspan="5"><div id="votacion_barchart_3" class="votacion_barchart"></div></td>
        </tr>
        <tr>
          <td class="variables">p</td>
          <td class="variables">0</td>
          </tr>

        <tr>
          <td class="variables">aus.</td>
          <td class="variables">0</td>
        </tr>
        <tr>
          <td class="variables">res.</td>
          <td><img src="/images/proyectoley/positivo.png" title="Aprobado" width="14" height="14" /></td>

        </tr>
      </table>
    </td>
  </tr>
</table>

<script type="text/javascript">
$('#tb_votacion_3').visualize({type: 'bar', height: '30px', width: '100px', parseDirection: 'x', appendTitle: false, colors: ['#A8D342','#FD8D2A']}).appendTo('#votacion_barchart_3').trigger('visualizeRefresh');
</script>
      </div>
    </div>
  </div>

