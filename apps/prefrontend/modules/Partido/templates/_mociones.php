<?php
  use_javascript('protovis.js');
  use_javascript('jquery.min.js'); 
  use_javascript('jquery-parlamentario.js');
?>

<?php if (($mociones = $partido->getMociones()) != null && $partido != 'PC'): ?>

  <?php
    $num_mat = $partido->countMocionesMateria($mociones,2006,2010,null);
    $num_est = $partido->countMocionesEstado($mociones,2006,2010,0);
  
    //por materias
    if ($num_mat > 0){
      $materias = Doctrine_Core::getTable('Materia')->createQuery('m')->execute();
      $anterior = null;
      $super_materias = "";
      foreach ($materias as $i => $materia) {
        if ($i == 0) {
          $anterior = $materia->getSuperMateria();
          $super_materias = $materia->getIdMateria();
        }
        else if ($materia->getSuperMateria() == $anterior) 
          $super_materias .= ",".$materia->getIdMateria();
        else {
          //echo $anterior.":".$parlamentario->countMocionesMateria($mociones,2006,2010,explode(",",$super_materias)).'<br>';
          $mats[] = array('materia' => $super_materias, 'a2006' => $partido->countMocionesMateria($mociones,2006,2010,explode(",",$super_materias)));
          $super_materias = $materia->getIdMateria();
          $super_m[] = $anterior;
          $anterior = $materia->getSuperMateria();
          //última supermateria
          if ($i == count($materias)-1) {
            //echo $anterior.":".$parlamentario->countMocionesMateria($mociones,2006,2010,explode(",",$super_materias)).'<br>';
          $mats[] = array('materia' => $super_materias, 'a2006' => $partido->countMocionesMateria($mociones,2006,2010,explode(",",$super_materias)));
            $super_m[] = $anterior; //para mostrar los labels automáticamente (no usado)
          }
        }
      }
    }
    //foreach ($super_materias as $i=>$s) if ($i>0) echo ",".$s; else echo $s;

    //por estados    
    if ($num_est > 0){
      for ($i=1; $i<=5; $i++) {
        $estados[] = array('estado' => $i, 'a2006' => $partido->countMocionesEstado($mociones,2006,2010,$i));
      }
    }
  ?>

  <?php if ($num_mat > 0 || $num_est > 0): ?><h3 name="mociones" class="tit">Mociones presentadas</h3><?php endif; ?>
  <div class="btn_mocion">
    <?php if ($num_mat > 0): ?><div id="btn_estado" class="mocion_act"><a href="#mociones">Estado</a></div><?php endif; ?>
    <?php if ($num_est > 0): ?><div id="btn_materia"><a href="#mociones">Materia</a></div><?php endif; ?>
    <div>Pincha la barra del gráfico y revisa los proyectos.</div>
  </div>

  <?php if ($num_mat > 0): ?>
  <div id="mociones_materias">
  <script type="text/javascript+protovis">
  var n = <?php echo count($mats) ?>,  //nº de materias
      m = 1,  //nº de años
      data = <?php echo json_encode($mats) ?>,
      w = 400,
      h = 150,
      x2 = pv.Scale.ordinal(pv.range(n)).splitBanded(0, w, 4/5),
      y2 = pv.Scale.linear(data, function(d) d.a2006).range(0, h);

  var vis = new pv.Panel()
      .width(w)
      .height(h)
      .bottom(120)
      .left(50)
      .right(10)
      .top(5);

var bar = vis.add(pv.Panel)
    .data(data)
    .left(function() x2(this.index))
  .add(pv.Bar)
    .def("activo", false)
    .left(function() x2(this.index))
    .width(x2.range().band / m)
    .bottom(0)
    .height(function(d) y2(d.a2006))
    .title("Pincha acá para ver las mociones presentadas")
    .cursor("pointer")
    .event("click", function(d) top.location="/ProyectoLey/0/2006/2010/"+d.materia+"/0/<?php echo $partido->getIdPartido(); ?>/0")
    .fillStyle(function() this.activo() ? "orange" : "steelblue")
    .event("mouseover", function() this.activo(true)) //overwrite
    .event("mouseout", function() this.activo(false));  //restore

bar.anchor("center").add(pv.Label)
    .top(function() bar.top())
    .textStyle("white")
    .textBaseline("top")
    .text(function(d) d.a2006);

//eje x: materias
vis.add(pv.Label)
    .data(pv.range(n))
    .bottom(-5)
    .left(function() x2(this.index) + x2.range().band / 2)
    .textMargin(0)
    .textAlign("right")
    .textBaseline("middle")
		.textAngle(-Math.PI / 4)
    .text(function() new Array("Defensa","Hacienda, Economía","Relaciones Exteriores","Administración, Regionalización","Salud","Medio Ambiente, Recursos","Obras Públicas, Vivienda, Tele-","Trabajo y","Educación, Deportes","Transparencia","Participación","Familia","Seguridad","Derechos Fundamentales,","Reconstrucción")[this.index]);

//eje x: label 2ª linea
vis.add(pv.Label)
    .data(pv.range(n))
    .bottom(-5)
    .left(function() x2(this.index) + x2.range().band / 2 + 10)
    .textMargin(0)
    .textAlign("right")
    .textBaseline("middle")
		.textAngle(-Math.PI / 4)
    .text(function() new Array("","Impuesto y Empresas","","Zonas Extremas e Indígenas","","Naturales y Derechos Animales","comunicaciones y Transporte","Protección Social","y Cultura","y Probidad","y Elecciones","","","Nacionalidad, Ciudadanía","Terremoto")[this.index]);

  //valores
  vis.add(pv.Rule)
      .data(y2.ticks())
      .bottom(function(d) Math.round(y2(d)) - .5)
      .strokeStyle(function(d) d ? "rgba(255,255,255,.3)" : "#000")
    .add(pv.Rule)
      .left(0)
      .width(5)
      .strokeStyle("#000")
    .anchor("left").add(pv.Label)
      .text(function(d) d);

  vis.render();
  </script>
  </div>
  <?php endif; ?>

  <?php if ($num_est > 0): ?>
  <div id="mociones_estados">
  <script type="text/javascript+protovis">
  var n = <?php echo count($estados) ?>,  //nº de estados
      m = 1,  //nº de años
      data = <?php echo json_encode($estados) ?>,
      w = 400,
      h = 150,
      x = pv.Scale.ordinal(pv.range(n)).splitBanded(0, w, 4/5),
      y = pv.Scale.linear(data, function(d) d.a2006).range(0, h);

  var vis = new pv.Panel()
      .width(w)
      .height(h)
      .bottom(80)
      .left(50)
      .right(10)
      .top(5);

var bar = vis.add(pv.Panel)
    .data(data)
    .left(function(d) x(this.index))
  .add(pv.Bar)
    .left(function(d) x(this.index))
    .width(x.range().band / m)
    .bottom(0)
    .height(function(d) y(d.a2006))
    .title("Pincha acá para ver las mociones presentadas")
    .cursor("pointer")
    .event("click", function(d) top.location="/ProyectoLey/"+d.estado+"/2006/2010/0/0/<?php echo $partido->getIdPartido(); ?>/0")
    .fillStyle("steelblue")
    .event("mouseover", function() this.fillStyle("orange")) // override
    .event("mouseout", function() this.fillStyle("steelblue")); // restore

bar.anchor("center").add(pv.Label)
    .top(function() bar.top())
    .textStyle("white")
    .textBaseline("top")
    .text(function(d) d.a2006);

  //eje x: estados
  vis.add(pv.Label)
      .data(pv.range(n))
      .bottom(-5)
      .left(function() x(this.index) + x.range().band / 2)
      .textMargin(0)
      .textAlign("right")
      .textBaseline("middle")
		  .textAngle(-Math.PI / 4)
      .text(function() new Array("Publicado","Rechazado","En tramitacion","Retirado","Archivado")[this.index]);

  //eje x: labels 2ª línea
  vis.add(pv.Label)
      .data(pv.range(n))
      .bottom(-5)
      .left(function() x(this.index) + x.range().band / 2 + 15)
      .textMargin(0)
      .textAlign("right")
      .textBaseline("middle")
		  .textAngle(-Math.PI / 4)
      .text(function() new Array("","Inconstitucional","","","Solicitud de archivo")[this.index]);

  //eje x: labels 3ª línea
  vis.add(pv.Label)
      .data(pv.range(n))
      .bottom(-5)
      .left(function() x(this.index) + x.range().band / 2 + 30)
      .textMargin(0)
      .textAlign("right")
      .textBaseline("middle")
		  .textAngle(-Math.PI / 4)
      .text(function() new Array("","Inadmisible","","","")[this.index]);

  //eje y: valores
  vis.add(pv.Rule)
      .data(y.ticks())
      .bottom(function(d) Math.round(y(d)) - .5)
      .strokeStyle(function(d) d ? "rgba(255,255,255,.3)" : "#000")
    .add(pv.Rule)
      .left(0)
      .width(5)
      .strokeStyle("#000")
    .anchor("left").add(pv.Label)
      .text(function(d) d);

  vis.render();
  </script>
  </div>
  <?php endif; ?>
<?php endif; ?>
