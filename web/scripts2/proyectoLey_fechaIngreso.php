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
        if(desde.length==0 || hasta.length==0)
            alert("Debe complentar la informacion requerida");
        else{
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
    </script>
</head>
<body>
<form method="post" name="f1" action="proyectoLey_fechaIngreso_result.php">
<table>
    <tr>
        <td align="left" class="TITULAR">
          Desde&nbsp;
          <input type="text" maxlength="10" size="11" name="desde" id="desde" />&nbsp;&nbsp;(dd/mm/aaaa)&nbsp;&nbsp;
          Hasta&nbsp;
          <input type="text" maxlength="10" size="11" name="hasta" id="hasta" />&nbsp;&nbsp;(dd/mm/aaaa)&nbsp;&nbsp;
          <input type="button" class="TEXTtema" value="&gt;&gt; Buscar" name="buscar" onclick="rld();">
        </td>
       </tr>
</table>
</form>
<div id="result"></div>
</body>