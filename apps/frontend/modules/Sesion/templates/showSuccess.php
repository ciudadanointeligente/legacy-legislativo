<table>
  <tbody>
    <tr>
      <th>Id sesion:</th>
      <td><?php echo $sesion->getIdSesion() ?></td>
    </tr>
    <tr>
      <th>Fecha:</th>
      <td><?php echo $sesion->getFecha() ?></td>
    </tr>
    <tr>
      <th>Camara:</th>
      <td><?php echo $sesion->getCamara() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $sesion->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $sesion->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('Sesion/edit?id_sesion='.$sesion->getIdSesion()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('Sesion/index') ?>">List</a>
