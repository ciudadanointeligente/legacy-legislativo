<?php

include ('cl_camara_division2array.php');		//neccesary to set the correct path

if (isset($_GET["id"])) $division_id = $_GET['id']; else $division_id=11109;

$original_html = $_GET['original_html'];

if ($_GET['format'] != 'php') {
	include('array2xml.php');		//neccesary to set the correct path
	$xml = cl_camara_division2xml_xml($division_id,$original_html);
	echo($xml);
} else {
	$php = cl_camara_division2php($division_id,$original_html);
	echo $php;
}

function cl_camara_division2xml_xml ($division_id,$original_html = false) {
	$out = array();
	$division = cl_camara_division2array($division_id);
	$out = $division;
	if (!$original_html) {
	  unset($out['original_html']);
	}
	$xml = array2xml($out,'votainteligente.cl',true);
	return $xml;
}

function cl_camara_division2php ($division_id,$original_html = false) {
	$out = array();
	$division = cl_camara_division2array($division_id);
	$out = $division;
	if (!$original_html) {
	  unset($out['original_html']);
	}
	$php = serialize($out);
	return $php;
}

?>