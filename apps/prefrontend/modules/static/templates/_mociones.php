<?php
  use_javascript('protovis.js');
  //use_javascript('protovis-mociones.js');
?>

<script type="text/javascript+protovis">
var n = 5,
    m = 2,
    data = [
      { estado:1, a2006:0, a2010:1 },
      { estado:2, a2006:0, a2010:0 }, 
      { estado:3, a2006:0, a2010:5 }, 
      { estado:4, a2006:0, a2010:0 }, 
      { estado:5, a2006:0, a2010:0 }, 
      ],
    /*data = [{"estado":1,"a2006":0,"a2010":0},{"estado":2,"a2006":0,"a2010":0},{"estado":3,"a2006":0,"a2010":1},{"estado":4,"a2006":0,"a2010":0},{"estado":5,"a2006":0,"a2010":0}],*/
    w = 400,
    h = 250,
    x = pv.Scale.ordinal(pv.range(n)).splitBanded(0, w, 1),
    y = pv.Scale.linear(data, function(d) d.a2010).range(0, h);

var vis = new pv.Panel()
    .width(w)
    .height(h)
    .bottom(80)
    .left(50)
    .right(10)
    .top(5);

var bar = vis.add(pv.Panel)
    .data(data)
    .left(function() x(this.index))
  .add(pv.Bar)
    .def("active", false)
    .left(function() x(this.index))
    .width(x.range().band / m)
    .bottom(0)
    .height(function(d) y(d.a2006))
    .title("Click para mostrar las mociones presentadas")
    .cursor("pointer")
    .event("click", function(d) top.location="/ProyectoLey/"+d.estado+"/2006/2010/0/85/0")
    .fillStyle(function() this.active() ? "orange" : "steelblue")
    .event("mouseover", function() this.active(true)) //overwrite
    .event("mouseout", function() this.active(false));  //restore
    
bar.anchor("center").add(pv.Label)
    .top(function() bar.top())
    .textStyle("white")
    .textBaseline("top")
    .text(function(d) d.a2006);

var bar2 = vis.add(pv.Panel)
    .data(data)
    .left(function() x(this.index))
  .add(pv.Bar)
    .def("active", false)
    .left(function() x(this.index)+x.range().band / m)
    .width(x.range().band / m)
    .bottom(0)
    .height(function(d) y(d.a2010))
    .title("Click para mostrar las mociones presentadas")
    .cursor("pointer")
    .event("click", function(d) top.location="/ProyectoLey/"+d.estado+"/2010/2014/0/85/0")
    .fillStyle(function() this.active() ? "orange" : "limegreen")
    .event("mouseover", function() this.active(true)) //overwrite
    .event("mouseout", function() this.active(false));  //restore

bar2.anchor("center").add(pv.Label)
    .top(function() bar2.top())
    .textStyle("white")
    .textBaseline("top")
    .text(function(d) d.a2010);

//eje x: estados o materias
vis.add(pv.Label)
    .data(pv.range(n))
    .bottom(-5)
    .left(function() x(this.index) + x.range().band / 2)
    .textMargin(0)
    .textAlign("right")
    .textBaseline("middle")
		.textAngle(-Math.PI / 4)
    .text(function() new Array("Publicado","Rechazado","En tramitacion","Retirado","Archivado")[this.index]);

//labels 2ª línea
vis.add(pv.Label)
    .data(pv.range(n))
    .bottom(-5)
    .left(function() x(this.index) + x.range().band / 2 + 15)
    .textMargin(0)
    .textAlign("right")
    .textBaseline("middle")
		.textAngle(-Math.PI / 4)
    .text(function() new Array("","Inconstitucional","","","Solicitud de archivo")[this.index]);

//labels 3ª línea
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
    .title("Click para mostrar las mociones presentadas")
    .text(function(d) d);

vis.render();
</script>

<script type="text/javascript+protovis">
var n = 15,
    m = 2,
    data = [
      { materia:1, a2006:2 },
      { materia:2, a2006:13 }, 
      { materia:3, a2006:1 }, 
      { materia:4, a2006:21 }, 
      { materia:5, a2006:17 }, 
      { materia:1, a2006:13 },
      { materia:1, a2006:19 },
      { materia:1, a2006:6 },
      { materia:1, a2006:4 },
      { materia:1, a2006:1 },
      { materia:1, a2006:7 },
      { materia:1, a2006:5 },
      { materia:1, a2006:3 },
      { materia:1, a2006:5 },
      { materia:1, a2006:0 },
      ],
    /*data = [{"materia":"1","a2006":0,"a2010":0},{"materia":"2,3,4,5","a2006":0,"a2010":0},{"materia":"6","a2006":0,"a2010":0},{"materia":"7,8,9,10","a2006":0,"a2010":0},{"materia":"11","a2006":0,"a2010":0},{"materia":"12,13,14","a2006":0,"a2010":0},{"materia":"15,16,17,18","a2006":0,"a2010":0},{"materia":"19,20","a2006":0,"a2010":0},{"materia":"21,22,23","a2006":0,"a2010":0},{"materia":"24,25","a2006":0,"a2010":0},{"materia":"26,27","a2006":0,"a2010":0},{"materia":"28","a2006":0,"a2010":0},{"materia":"29","a2006":0,"a2010":0},{"materia":"30,31","a2006":0,"a2010":0},{"materia":"32","a2006":0,"a2010":1}]*/
    w = 400,
    h = 250,
    x = pv.Scale.ordinal(pv.range(n)).splitBanded(0, w, 1),
    y = pv.Scale.linear(data, function(d) d.a2006).range(0, h);

var vis = new pv.Panel()
    .width(w)
    .height(h)
    .bottom(120)
    .left(50)
    .right(10)
    .top(5);

var bar = vis.add(pv.Panel)
    .data(data)
    .left(function() x(this.index))
  .add(pv.Bar)
    .def("active", false)
    .left(function() x(this.index))
    .width(x.range().band / m)
    .bottom(0)
    .height(function(d) y(d.a2006))
    .title("Click para mostrar las mociones presentadas")
    .cursor("pointer")
    .event("click", function(d) top.location="/ProyectoLey/0/2006/2010/"+d.materia+"/85/0")
    .fillStyle(function() this.active() ? "orange" : "steelblue")
    .event("mouseover", function() this.active(true))
    .event("mouseout", function() this.active(false));

bar.anchor("center").add(pv.Label)
    .top(function() bar.top())
    .textStyle("white")
    .textBaseline("top")
    .text(function(d) d.a2006);

//eje x: materias
vis.add(pv.Label)
    .data(pv.range(n))
    .bottom(-5)
    .left(function() x(this.index) + x.range().band / 2)
    .textMargin(0)
    .textAlign("right")
    .textBaseline("middle")
		.textAngle(-Math.PI / 4)
    .text(function() new Array("Defensa","Hacienda, Economía","Relaciones Exteriores","Administración, Regionalización","Salud","Medio Ambiente, Recursos","Obras Públicas, Vivienda, Tele-","Trabajo y","Educación, Deportes","Transparencia","Participación","Familia","Seguridad","Derechos Fundamentales,","Reconstrucción")[this.index]);

//eje x: label 2ª linea
vis.add(pv.Label)
    .data(pv.range(n))
    .bottom(-5)
    .left(function() x(this.index) + x.range().band / 2 + 10)
    .textMargin(0)
    .textAlign("right")
    .textBaseline("middle")
		.textAngle(-Math.PI / 4)
    .text(function() new Array("","Impuesto y Empresas","","Zonas Extremas e Indígenas","","Naturales y Derechos Animales","comunicaciones y Transporte","Protección Social","y Cultura","y Probidad","y Elecciones","","","Nacionalidad, Ciudadanía","Terremoto")[this.index]);

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
    .title("Click para mostrar las mociones presentadas")
    .text(function(d) d);

vis.render();
</script>
