<?php slot('breadbrumb') ?>
  <li>> <a href="<?php echo url_for('Parlamentario/index') ?>">Perfiles Partidos Políticos</a></li>
  <li class="actual">> <?php echo $partido->getNombre() ?></li>
<?php end_slot() ?>

<div id="top">
  <div class="topperfil">
    <img class="fotoperfil" src="/images/partidos/<?php echo $partido->getIdPartido() ?>.png">
  </div>

  <div class="datospersonales">
    <h1 class="perfil"><a href="#"><?php echo $partido->getNombre(); ?></a></h1>
    <p><span class="enunciado">Sigla: </span><?php echo $partido->getSigla() ?></p>
    <p><span class="enunciado">Fecha nacimiento: </span><?php echo $partido->getFechaNacimiento(); ?></p>
  </div>

  <div class="mesas">
    <table class="tablamesa">
      <tbody>
        <tr>
          <th>Mesa adulta:</th>
          <td><?php echo $partido->getMesaAdulta() ?></td>
        </tr>
        <tr>
          <th>Mesa juventud:</th>
          <td><?php echo $partido->getMesaJuventud() ?></td>
        </tr>
      </tbody>
    </table>
  </div>

  <div class="block">
    <div class="blockdata">
      <table class="enlacespersonales">
        <tbody>
          <tr>
            <th>Direccion:</th>
            <td><?php echo $partido->getDireccion() ?></td>
          </tr>
          <tr>
            <th>Telefono:</th>
            <td><?php echo $partido->getTelefono() ?></td>
          </tr>
          <tr>
            <th>Mail:</th>
            <td><?php echo $partido->getMail() ?></td>
          </tr>
          <tr>
            <th>Web:</th>
            <td><?php echo $partido->getWeb() ?></td>
          </tr>
        </tbody>
      </table>

      <table class="datoelectorales">
        <thead>
          <th>Nro diputados 2010:</th>
          <th>Nro senadores 2010:</th>
        </thead>
        <tbody>
          <tr>
            <td><?php echo $partido->getNroDiputados_2010() ?></td>
            <td><?php echo $partido->getNroSenadores_2010() ?></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="contentpad">
  <table class="historia">
    <tbody>
      <tr>
        <th>Historia:</th>
        <td><?php echo $partido->getHistoria() ?></td>
      </tr>
      <tr>
        <th>Principios:</th>
        <td><?php echo $partido->getPrincipios() ?></td>
      </tr>
    </tbody>
  </table>
</div>

<!--<div id="midcontent" ><p>Conoce las mociones presentadas por el partido según materia y estado del proyecto de ley desde el periódo legislativo 2006-2010.<br>Próximamente pondremos a tu disposición gráficos con las mociones presentadas por tu partido en el actual período legislativo 2010-2014.</p>

  <div id="mociones">
  <?php include_partial('Partido/mociones', array('partido' => $partido)) ?>
  </div>

</div>-->
