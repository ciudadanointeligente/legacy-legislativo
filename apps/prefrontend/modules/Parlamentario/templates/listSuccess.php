<h1>Parlamentarios List</h1>

<table>
  <thead>
    <tr>
      <th>Id parlamentario</th>
      <th>Nombre</th>
      <th>Apellidos</th>
      <th>Senador diputado</th>
      <th>Id circunscripcion</th>
      <th>Id distrito</th>
      <th>Pacto</th>
      <th>Partido</th>
      <th>Sexo</th>
      <th>Fecha nacimiento</th>
      <th>Profesion</th>
      <th>Periodos senador</th>
      <th>Periodos diputado</th>
      <th>Periodos senador desc</th>
      <th>Periodos diputado desc</th>
      <th>Primera vez</th>
      <th>Comisiones anteriores</th>
      <th>Comisiones actuales</th>
      <th>Voto nro</th>
      <th>Voto porcentaje</th>
      <th>Gasto electoral 2005</th>
      <th>Financiamiento electoral 2005</th>
      <th>Gasto electoral 2009</th>
      <th>Financiamiento electoral 2009</th>
      <th>Comite parlamentario</th>
      <th>Mail</th>
      <th>Web</th>
      <th>Twitter</th>
      <th>Facebook</th>
      <th>Dietas</th>
      <th>Declaracion interes</th>
      <th>Declaracion patrimonio</th>
      <th>Educacion universitaria</th>
      <th>Educacion postgrado</th>
      <th>Cargos gobierno</th>
      <th>Cargos eleccion</th>
      <th>Experiencia politica</th>
      <th>Experiencia laboral</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($parlamentarios as $parlamentario): ?>
    <tr>
      <td><a href="<?php echo url_for('Parlamentario/show?id_parlamentario='.$parlamentario->getIdParlamentario()) ?>"><?php echo $parlamentario->getIdParlamentario() ?></a></td>
      <td><?php echo $parlamentario->getNombre() ?></td>
      <td><?php echo $parlamentario->getApellidos() ?></td>
      <td><?php echo $parlamentario->getSenadorDiputado() ?></td>
      <td><?php echo $parlamentario->getIdCircunscripcion() ?></td>
      <td><?php echo $parlamentario->getIdDistrito() ?></td>
      <td><?php echo $parlamentario->getPacto() ?></td>
      <td><?php echo $parlamentario->getPartido() ?></td>
      <td><?php echo $parlamentario->getSexo() ?></td>
      <td><?php echo $parlamentario->getFechaNacimiento() ?></td>
      <td><?php echo $parlamentario->getProfesion() ?></td>
      <td><?php echo $parlamentario->getPeriodosSenador() ?></td>
      <td><?php echo $parlamentario->getPeriodosDiputado() ?></td>
      <td><?php echo $parlamentario->getPeriodosSenadorDesc() ?></td>
      <td><?php echo $parlamentario->getPeriodosDiputadoDesc() ?></td>
      <td><?php echo $parlamentario->getPrimeraVez() ?></td>
      <td><?php echo $parlamentario->getComisionesAnteriores() ?></td>
      <td><?php echo $parlamentario->getComisionesActuales() ?></td>
      <td><?php echo $parlamentario->getVotoNro() ?></td>
      <td><?php echo $parlamentario->getVotoPorcentaje() ?></td>
      <td><?php echo $parlamentario->getGastoElectoral_2005() ?></td>
      <td><?php echo $parlamentario->getFinanciamientoElectoral_2005() ?></td>
      <td><?php echo $parlamentario->getGastoElectoral_2009() ?></td>
      <td><?php echo $parlamentario->getFinanciamientoElectoral_2009() ?></td>
      <td><?php echo $parlamentario->getComiteParlamentario() ?></td>
      <td><?php echo $parlamentario->getMail() ?></td>
      <td><?php echo $parlamentario->getWeb() ?></td>
      <td><?php echo $parlamentario->getTwitter() ?></td>
      <td><?php echo $parlamentario->getFacebook() ?></td>
      <td><?php echo $parlamentario->getDietas() ?></td>
      <td><?php echo $parlamentario->getDeclaracionInteres() ?></td>
      <td><?php echo $parlamentario->getDeclaracionPatrimonio() ?></td>
      <td><?php echo $parlamentario->getEducacionUniversitaria() ?></td>
      <td><?php echo $parlamentario->getEducacionPostgrado() ?></td>
      <td><?php echo $parlamentario->getCargosGobierno() ?></td>
      <td><?php echo $parlamentario->getCargosEleccion() ?></td>
      <td><?php echo $parlamentario->getExperienciaPolitica() ?></td>
      <td><?php echo $parlamentario->getExperienciaLaboral() ?></td>
      <td><?php echo $parlamentario->getCreatedAt() ?></td>
      <td><?php echo $parlamentario->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('Parlamentario/new') ?>">New</a>

