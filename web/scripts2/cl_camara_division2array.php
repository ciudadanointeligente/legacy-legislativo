<?php

//set_time_limit(0);

$mes = array (
	'Ene' => '01',
	'Feb' => '02',
	'Mar' => '03',
	'Abr' => '04',
	'May' => '05',
	'Jun' => '06',
	'Jul' => '07',
	'Ago' => '08',
	'Sep' => '09',
	'Oct' => '10',
	'Nov' => '11',
	'Dec' => '12'
);

function cl_camara_division2array($division_id) {
  include("./db.inc.php");
  $db = new MySQL;
  if(!$db->init()) die("¡¡¡ERROR!!!<BR>\n");

  $url = "http://www.camara.cl/trabajamos/sala_votacion_detalle.aspx?prmID="; //3274
	$out = array();
	$out['division_id'] = $division_id;
	
	$html = Grabber($url.$division_id);
	$out['original_html'] = $html;
	
	$a_favor_sub = get_first_string($html, 'A favor</h2>', 'En contra</h2>');
	$en_contra_sub = get_first_string($html, 'En contra</h2>', 'Abstención</h2>');
	$abstencion_sub = get_first_string($html, 'Abstención</h2>', 'Dispensados Art. 5°</h2>');
	$dispensados_sub = get_first_string($html, 'Dispensados Art. 5°</h2>', 'Pareos</h2>');
	$pareos_sub = get_first_string($html, 'Pareos</h2>', '</div>');
	$table_sub = get_first_string($html, '<table class="tabla resumenvotacion">', '</table>');
	$table_control_number = returnSubstrings($table_sub,'<td>','</td>');
	
	$fecha = trim(get_first_string($html, 'Fecha:</strong>', '</p>'));
	$materia = str_replace("'","\'",trim(get_first_string($html, 'Materia:</strong>', '</p>')));
	$out['info']['topic'] = $materia;
	
	if ($materia==""){
	  $materia = str_replace("'","\'",trim(get_first_string($html, 'Observaciones:</strong>', '</p>')));
	  $out['info']['topic'] = $materia;
  }
  	
	$articulo = str_replace("'","\'",trim(get_first_string($html, 'Artículo:</strong>', '</p>')));
	$out['info']['article'] = $articulo;
	
	$sesion = str_replace("'","\'",trim(get_first_string($html, 'Sesión:</strong>', '</p>')));
	$out['info']['session'] = $sesion;
	
	$tramite = str_replace("'","\'",trim(get_first_string($html, 'Trámite:</strong>', '</p>')));
	$out['info']['step'] = $tramite;
	
	$tipo_de_votacion = str_replace("'","\'",strtolower(trim(get_first_string($html, 'Tipo de votación:</strong>', '</p>'))));
	$out['info']['division_type'] = $tipo_de_votacion;
	
	$quorum = str_replace("'","\'",trim(get_first_string($html, 'Quorum:</strong>', '</p>')));
	$out['info']['quorum'] = $quorum;
	
	$resultado = str_replace("'","\'",trim(get_first_string($html, 'Resultado:</strong>', '</p>')));
	$out['info']['result'] = $resultado;
	
	$name_sub = trim(get_first_string($html, '<div id ="detail">', '<p>'));
	$name = trim(get_first_string($name_sub, '<h2>', '</h2>'));
	$out['info']['name'] = $name;
	
	$fecha_db_ar = explode(' ', $fecha);
	global $mes;
	$fecha_db = $fecha_db_ar[4] .'-' . $mes[trim($fecha_db_ar[2],'.')] . '-' . $fecha_db_ar[0] . ' ' . $fecha_db_ar[5];
	$fecha_db_date = $fecha_db_ar[4] .'-' . $mes[trim($fecha_db_ar[2],'.')] . '-' . $fecha_db_ar[0];
	$fecha_db_time = $fecha_db_ar[5];
	$out['info']['date'] = $fecha_db_date;
	$out['info']['time'] = $fecha_db_time;
	
	/*$query = "
		INSERT INTO 
			division (division_id,divided_on,name,materia,session,article,tramite,type,quorum,result)
		VALUES 
			($row, '$fecha_db', '$name', '$materia', '$sesion', '$articulo', '$tramite', '$tipo_de_votacion', '$quorum', '$resultado')
	";*/
	$camara = 'C.Diputados';
	$en_sala = '1';
  $out['info']['enSala'] = 'true';
	
	if (strpos($name, 'Bolet') == 0){
    $nro_boletin = substr($name,12);
  }

  if ($nro_boletin != null){
		$id_proyecto_ley = $db->getIdProyectoLey($nro_boletin);
	} 
	else {
	  $id_proyecto_ley = 0;
	}
  $id_sesion = $db->getIdSesion($sesion);
  
	$name = utf8_decode($name);
	$tipo_de_votacion = utf8_decode($tipo_de_votacion);
	$articulo = utf8_decode($articulo);
	$materia = utf8_decode($materia);
	$quorum = utf8_decode($quorum);
		
	$query = "INSERT INTO Votacion (name,camara,en_sala,tipo,articulo,materia,fecha,hora,voto_si,voto_no,voto_abs,voto_disp,voto_pareos,voto_aus,resultado,quorum,id_proyecto_ley,id_sesion,id_parlamento,created_at,updated_at) VALUES ('$name', '$camara', $en_sala, '$tipo_de_votacion', '$articulo', '$materia', '$fecha_db_date', '$fecha_db_time', $table_control_number[0], $table_control_number[1], $table_control_number[2], $table_control_number[3], 0, 0, '$resultado', '$quorum', $id_proyecto_ley, $id_sesion, $division_id, '".date('Y-m-d H:m:s')."', '".date('Y-m-d H:m:s')."')";
	//echo $query;
	$id_votacion = $db->insert($query);
	//echo $id_votacion;
	
	$a_favor_ar = returnSubstrings($a_favor_sub,'ID=','">');
	$en_contra_ar = returnSubstrings($en_contra_sub,'ID=','">');
	$abstencion_ar = returnSubstrings($abstencion_sub,'ID=','">');
	$dispensados_ar = returnSubstrings($dispensados_sub,'ID=','">');
	$pareos_ar = returnSubstrings($pareos_sub,'ID=','">');
	
	$out['total'] = array(
	  'yes' => 0,
	  'no' => 0,
	  'abstain' => 0,
	  'dispensed' => 0,
	  'paired' => 0,
	);
	
	foreach ($a_favor_ar as $mp_row) {
		$db->insertVoto($id_votacion,$mp_row,'y');
		
		$name_pom = str_replace("'","\'",trim(get_first_string($a_favor_sub,'prmID='.$mp_row.'">','</a>')));
		$names[$name_pom][$mp_row] = $mp_row;
		$out['mp']['mp_'.$mp_row]['mp_id'] = $mp_row;
		$out['mp']['mp_'.$mp_row]['vote'] = 'y';
		
		$name_pom2 = explode('.',$name_pom);
		$out['mp']['mp_'.$mp_row]['name'] = trim($name_pom2[1]) . '.' . $name_pom2[2];
		
		if ($name_pom2[0] == 'Sra') {
		  $out['mp']['mp_'.$mp_row]['sex'] = 'f';
		} else {
		  $out['mp']['mp_'.$mp_row]['sex'] = 'm';
		}
		$out['total']['yes'] ++;
	}
	foreach ($en_contra_ar as $mp_row) {
		$db->insertVoto($id_votacion,$mp_row,'n');
				
		$name_pom = str_replace("'","\'",trim(get_first_string($en_contra_sub,'prmID='.$mp_row.'">','</a>')));
		$names[$name_pom][$mp_row] = $mp_row;
		$out['mp']['mp_'.$mp_row]['mp_id'] = $mp_row;
		$out['mp']['mp_'.$mp_row]['vote'] = 'n';
		
		$name_pom2 = explode('.',$name_pom);
		$out['mp']['mp_'.$mp_row]['name'] = trim($name_pom2[1]) . '.' . $name_pom2[2];
		
		if ($name_pom2[0] == 'Sra') {
		  $out['mp']['mp_'.$mp_row]['sex'] = 'f';
		} else {
		  $out['mp']['mp_'.$mp_row]['sex'] = 'm';
		}
		$out['total']['no'] ++;
	}
	foreach ($abstencion_ar as $mp_row) {
		$db->insertVoto($id_votacion,$mp_row,'a');
		
		$name_pom = str_replace("'","\'",trim(get_first_string($abstencion_sub,'prmID='.$mp_row.'">','</a>')));
		$names[$name_pom][$mp_row] = $mp_row;
		$out['mp']['mp_'.$mp_row]['mp_id'] = $mp_row;
		$out['mp']['mp_'.$mp_row]['vote'] = 'a';
		
		$name_pom2 = explode('.',$name_pom);
		$out['mp']['mp_'.$mp_row]['name'] = trim($name_pom2[1]) . '.' . $name_pom2[2];
		
		if ($name_pom2[0] == 'Sra') {
		  $out['mp']['mp_'.$mp_row]['sex'] = 'f';
		} else {
		  $out['mp']['mp_'.$mp_row]['sex'] = 'm';
		}
		$out['total']['abstain'] ++;
	}
	foreach ($dispensados_ar as $mp_row) {
		$db->insertVoto($id_votacion,$mp_row,'d');
				
		$name_pom = str_replace("'","\'",trim(get_first_string($dispensados_sub,'prmID='.$mp_row.'">','</a>')));
		$names[$name_pom][$mp_row] = $mp_row;
		$out['mp']['mp_'.$mp_row]['mp_id'] = $mp_row;
		$out['mp']['mp_'.$mp_row]['vote'] = 'd';
		
		$name_pom2 = explode('.',$name_pom);
		$out['mp']['mp_'.$mp_row]['name'] = trim($name_pom2[1]) . '.' . $name_pom2[2];
		
		if ($name_pom2[0] == 'Sra') {
		  $out['mp']['mp_'.$mp_row]['sex'] = 'f';
		} else {
		  $out['mp']['mp_'.$mp_row]['sex'] = 'm';
		}
		$out['total']['dispensed'] ++;
	}
	foreach ($pareos_ar as $mp_row) {
		$db->insertVoto($id_votacion,$mp_row,'p');
				
		$name_pom = str_replace("'","\'",trim(get_first_string($pareos_sub,'prmID='.$mp_row.'">','</a>')));
		$names[$name_pom][$mp_row] = $mp_row;
		$out['mp']['mp_'.$mp_row]['mp_id'] = $mp_row;
		$out['mp']['mp_'.$mp_row]['vote'] = 'p';
		
		$name_pom2 = explode('.',$name_pom);
		$out['mp']['mp_'.$mp_row]['name'] = trim($name_pom2[1]) . '.' . $name_pom2[2];
		
		if ($name_pom2[0] == 'Sra') {
		  $out['mp']['mp_'.$mp_row]['sex'] = 'f';
		} else {
		  $out['mp']['mp_'.$mp_row]['sex'] = 'm';
		}
		$out['total']['paired'] ++;
		
		//check
		if (($table_control_number[0] == $out['total']['yes']) and ($table_control_number[1] == $out['total']['no']) and ($table_control_number[2] == $out['total']['abstain']) and ($table_control_number[3] == $out['total']['dispensed'])) {
		} else {
		  $out['error'] = 'wrong sums: yes:' . $table_control_number[0] . ' vs. ' . $out['total']['yes'] . ', no:' . $table_control_number[1] . ' vs. ' . $out['total']['no'] . ', abstain:' . $table_control_number[2] . ' vs. ' . $out['total']['abstain'] . ', dispensed:' . $table_control_number[3] . ' vs. ' . $out['total']['dispensed'];
		}
	}
	
	//updated Votacion con pareos y ausentes
	$ausentes = 120-$table_control_number[0]-$table_control_number[1]-$table_control_number[2]-$out['total']['paired'];
	$db->updatePareosAusentes($id_votacion, $out['total']['paired'],$ausentes);
	
	if (strlen($html) < 8300) {
	  $out['error'] = 'small file; might have not been downloaded correctly or wrong id';
	}
	 return $out;
}




//***********************************************************
//better file()
function Grabber($url)
{
$ch = curl_init ();
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($ch, CURLOPT_URL, $url);
curl_setopt ($ch, CURLOPT_TIMEOUT, 120);
return curl_exec($ch);
curl_close ($ch);
} 
//***************************************************
// finds substrings between openingMarker and closingMarker a put them in array 
  function returnSubstrings($text, $openingMarker, $closingMarker) {
    $openingMarkerLength = strlen($openingMarker);
    $closingMarkerLength = strlen($closingMarker);

    $result = array();
    $position = 0;
    while (($position = strpos($text, $openingMarker, $position)) !== false) {
      $position += $openingMarkerLength;
      if (($closingMarkerPosition = strpos($text, $closingMarker, $position)) !== false) {
        $result[] = trim(substr($text, $position, $closingMarkerPosition - $position));
        $position = $closingMarkerPosition + $closingMarkerLength;
      }
    }
    return $result;
  }

// firs tstring :
  function get_first_string ($text,$openingMarker, $closingMarker) {
	$out_ar = returnSubstrings($text, $openingMarker, $closingMarker);
	$out = $out_ar[0];
	return($out);
  }
?>
