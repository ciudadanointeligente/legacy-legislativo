<?php
require_once("excel.php"); 
require_once("excel-ext.php"); 

$conEmp = mysql_connect("localhost", "pdf2010", "qwerty123456");
mysql_select_db("pdf2010", $conEmp);
$queEmp = "SELECT id number, concat(nombre,' ',apellido) name, correo email, pais country, tipo_organizacion 'Type of organization', pregunta1 anwser1, pregunta2 anwser2, pregunta3 anwser3 FROM beca ORDER BY fecha_creacion ASC";
echo $queEmp;
$resEmp = mysql_query($queEmp, $conEmp) or die(mysql_error());
$totEmp = mysql_num_rows($resEmp);

echo "<pre>";
print_r($totEmp);
echo "<pre>";

while($datatmp = mysql_fetch_assoc($resEmp)) { 
	$data[] = $datatmp;
	echo $datatmp."<br>";
}
/*
$date=date('YmdHms');
createExcel("grant-".$date.".xls", $data);
exit;*/
?>
