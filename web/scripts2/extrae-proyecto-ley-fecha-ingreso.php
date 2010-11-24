<head>
    <script type="text/javascript">
    function objetoAjax(){
        var xmlhttp=false;
        try {
                xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
                try {
                   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                } catch (E) {
                        xmlhttp = false;
                }
        }
        if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
                xmlhttp = new XMLHttpRequest();
        }
        return xmlhttp;
    }
    function rld(){
	var desde = document.getElementById('desde').value;
	var hasta = document.getElementById('hasta').value;
        var hoy = document.getElementById('hoy').value;
        if(desde.length==0 || hasta.length==0)
            alert("Debe complentar la informacion requerida");
        else{
            var error=0;
            if(hoy<desde)
                error=1;
            if(hoy<hasta)
                error=2;
            if(desde>hasta)
                error=3;
            if(error>0)
                alert("Error! debe seleccionar fechas validas");
            else
            {
                var divResultado = document.getElementById('result');
                ajax=objetoAjax();
                ajax.open("POST", "basic.php",true);
                ajax.onreadystatechange=function() {
                    if (ajax.readyState==1) {
                        divResultado.innerHTML = 'Extrayendo informaci&oacute;n<br /><img src="imgs/loading.gif" border="0" />'
                    }
                    if (ajax.readyState==4) {
                        divResultado.innerHTML = ajax.responseText
                    }
                }
                ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
                ajax.send("desde="+desde+"&hasta="+hasta)
            }
        }
    }
    </script>
<script type='text/javascript' language='javascript' src='jscalendar/calendar.js'></script>
<script type='text/javascript' language='javascript' src='jscalendar/lang/calendar-es2.js'></script>
<script type='text/javascript' language='javascript' src='jscalendar/calendar-setup.js'></script>
<link rel='stylesheet' type='text/css' href='jscalendar/calendar-blue2.css' />
</head>
<body>
<form method="post" name="f1" action="proyectoLey_fechaIngreso_result.php">
<table>
    <tr>
        <td align="left" class="TITULAR">
          Desde&nbsp;
          <input readonly="true" name="desde" id="desde" type="text" class="disabled" /><img src="imgs/calendar_2.png" id="fecha_boton_desde" alt="Fecha desde" title="Fecha desde" width="16" height="16" style="cursor:pointer" />&nbsp;&nbsp;<br />
          Hasta&nbsp;
          <input readonly="true" name="hasta" id="hasta" type="text" class="disabled" /><img src="imgs/calendar_2.png" id="fecha_boton_hasta" alt="Fecha hasta" title="Fecha hasta" width="16" height="16" style="cursor:pointer" />&nbsp;&nbsp;<br />
          <input type="button" class="TEXTtema" value="&gt;&gt; Extraer" name="extraer" onclick="rld();" />
          <input type="hidden" value="<?php echo date("d-m-Y")?>" name="hoy" id="hoy" />
        </td>
       </tr>
</table>
</form>
<script type="text/javascript">
Calendar.setup({
	inputField     :    "desde",
	ifFormat       :    "%d-%m-%Y",
	button         :    "fecha_boton_desde",
	align          :    "B1",
	singleClick    :    true
});
Calendar.setup({
	inputField     :    "hasta",
	ifFormat       :    "%d-%m-%Y",
	button         :    "fecha_boton_hasta",
	align          :    "B1",
	singleClick    :    true
});
</script>
<div id="result" style="font-size:0.8em;"></div>
</body>