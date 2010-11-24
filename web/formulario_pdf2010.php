<?php
if($_POST['frm_registropdf2010']==1){
        extract($_POST);
	$db_link = mysql_connect('localhost','pdf2010','qwerty123456');
	if(!$db_link){
		die('No se pudo conectar: ' . mysql_error());
	}
	$db_selected = mysql_select_db('pdf2010', $db_link);
	if(!$db_selected){
		die('No se selecciono la BD: ' . mysql_error());
	}
	$sql="INSERT INTO beca (nombre, apellido, correo, pais, tipo_organizacion, pregunta1, pregunta2, pregunta3) VALUES
				('".utf8_decode($nombre)."','".utf8_decode($apellido)."','".utf8_decode($mail)."','".utf8_decode($fono)."','".utf8_decode($url)."','".utf8_decode($comentario3)."','".utf8_decode($comentario4)."','".utf8_decode($comentario5)."')";
	$result=mysql_query($sql);
        header("location: formulario_pdf2010.html");
}
?>
<script type="text/javascript">
<!--
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
    } if (errors) alert('The following error(s) occurred:\n'+errors);
    document.MM_returnValue = (errors == '');
} }
//-->
</script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel='stylesheet' href='css/pdfla.css' type='text/css'>
<body>
<form id="contacto" name="contacto" method="post" action="">
    <div class="fci_cruz">
    <div class="fci_content_blanco">

    <h2>2- Postula a las BECAS para ingresar a la Conferencia sin costo.</h2>
      <p>PDF entregará tickets gratuitos para líderes digitales y emprendedores sociales que no puedan costear el ingreso a la Conferencia, sólo llena el formulario y explícanos por qué debieras ser acreedor de una de las Becas PDF</p>

    <table class="fci_contacto" width="100%" border="0" cellpadding="2" cellspacing="1">
    <tr>
      <td >Nombre<span >*</span></td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3"><input name="nombre" type="text" class="fci_formulario" id="nombre" size="30" /></td>
    </tr>
    <tr>
      <td >Apellido<span >*</span></td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3"><input name="apellido" type="text" class="fci_formulario" id="apellido" size="30" /></td>
    </tr>
    <tr>
      <td width="27%">E- mail<span class=>*</span></td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3"><input name="mail" type="text" class="fci_formulario" id="mail" size="30" /></td>
    </tr>
    <tr>
      <td>País<span>*</span></td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3"><input name="fono" type="text" class="fci_formulario" id="fono" size="30" /></td>
    </tr>
    <tr>
      <td width="80%">Tipo de Organización</td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3"><input name="url" type="text" class="fci_formulario" id="url" size="30" /></td>
    </tr>
    <tr>
      <td height="34" colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td height="90" colspan="3"><div>
        <p>¿Qué te motiva para participar en el Personal Democracy Forum de América Latina?</p>
        <p>
          <textarea name="comentario3" cols="45" rows="5" class="formulario" id="comentario3"></textarea>
        </p>
      </div>
        <div>
          <p>¿Por qué consideras que debieras ingresar a la conferencia sin pagar el ticket de ingreso?</p>
          <p>
            <textarea name="comentario4" cols="45" rows="5" class="formulario" id="comentario4"></textarea>
          </p>
        </div>
      <div>
        <p>¿Qué es lo más interesante de tu trabajo que quisieras compartir en la Conferencia de PDF?</p>
        <p>
          <textarea name="comentario5" cols="45" rows="5" class="formulario" id="comentario5"></textarea>
        </p>
      </div></td>
    </tr>
    <tr>
      <td colspan="3"><div align="center">
        <input name="btn" type="submit" id="btn" onClick="MM_validateForm('nombre','','R','mail','','RisEmail','comentario','','R');return document.MM_returnValue" value=" Enviar " />
        <input name="enviar" type="hidden" id="enviar" value="fheusser@votainteligente.cl" />
<input name="frm_registropdf2010" type="hidden" id="frm_registropdf2010" value="1" />
        <input name="volver" type="hidden" id="volver" value="../index.html" />
      </div></td>
    </tr>
  </table>
  </div>
  </div>
</form>
</body>