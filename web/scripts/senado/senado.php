<?
require_once 'lib/simplehtmldom/simple_html_dom.php';

$db_host = 'localhost';
$db_user = 'root';
$db_passwd = 'mk.cl45!';
$db_database = 'votainteligente_proyectos';

$conn = mysql_connect($db_host, $db_user, $db_passwd);
mysql_select_db($db_database, $conn);

// legiini define el periodo legislativo mas antiguo a mostrar en el selector, si no existe este
// parametro, se toman todos los periodos desde 1990
$votaciones_url = "http://www.senado.cl/appsenado/index.php?mo=sesionessala&ac=votacionSala";
$base_url = "http://www.senado.cl/appsenado/";

$res = mysql_query("select max(id_parlamento) from Votacion", $conn);
$row = mysql_fetch_array($res);
$id_parlamento = $row[0];

$num_senadores = 38;

$meses = array(
	'Enero' => '01',
	'Febrero' => '02',
	'Marzo' => '03',
	'Abril' => '04',
	'Mayo' => '05',
	'Junio' => '06',
	'Julio' => '07',
	'Agosto' => '08',
	'Septiembre' => '09',
	'Octubre' => '10',
	'Noviembre' => '11',
	'Diciembre' => '12'
);

if (isset($argc)) {
	if ($argc == 1) {
		$num_legislaturas = 1;
		$html = file_get_html($votaciones_url);

		foreach ($html->find('select[name=legislaturas]') as $select) {
			foreach ($select->find("option") as $option) {
				print "Legislatura: " . $option->innertext . "\n";
				getLegislatura($option->value);

				if (--$num_legislaturas == 0) {
					break;
				}
			}
		}
	} elseif ($argc == 3) {
		if ($argv[1] > 0 && $argv[2] > 0) {
				$legiid = getIdLegislatura($argv[1]);

				if ($legiid > 0) {
					$sesiid = getIdSesion($legiid, $argv[2]);

					if ($sesiid > 0) {
						getSesion($legiid, $sesiid);
					} else {
						print("No se encontro la sesion\n");
					}
				} else {
					print("No se encontro la legislatura\n");
				}
		}
	} else {
		print("Uso: php senado.php [num_legislatura num_sesion]\n");
	}
} else {?>
<html>
	<head>
		<script type="text/javascript">
			function verifyForm() {
				var numericExpression = /^[0-9]+$/;

				if (!document.getElementById("num_legislatura").value.match(numericExpression)) {
					alert("Debe ingresar legislatura");
					return false;
				}

				if (!document.getElementById("num_sesion").value.match(numericExpression)) {
					alert("Debe ingresar sesion");
					return false;
				}

				return true;
			}
		</script>
	</head>
	<body>
		<form method="post" action="senado.php" onsubmit="return verifyForm()">
			<table>
				<tr>
					<td>N&ordm; Legislatura:</td>
					<td><input type="text" name="num_legislatura" id="num_legislatura" style="width: 50px;"/></td>
				</tr>
				<tr>
					<td>N&ordm; Sesi&oacute;n:</td>
					<td><input type="text" name="num_sesion" id="num_sesion" style="width: 50px;"/></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" value="Cargar"/></td>
				</tr>
			</table>
		</form>
		<pre>
<?
if ($_POST['num_legislatura'] > 0 && $_POST['num_sesion'] > 0) {
	$legiid = getIdLegislatura($_POST['num_legislatura']);

	if ($legiid > 0) {
		$sesiid = getIdSesion($legiid, $_POST['num_sesion']);

		if ($sesiid > 0) {
			getSesion($legiid, $sesiid);
		} else {
			print("No se encontro la sesion\n");
		}
	} else {
		print("No se encontro la legislatura\n");
	}
}
?>
		</pre>
	</body>
</html>
<?}

mysql_close($conn);

function getLegislatura($legiid) {
	$leg_html = file_get_html($GLOBALS['votaciones_url'] . "&legiid=" . $legiid);

	foreach ($leg_html->find('select[name=sesionessala]') as $leg_select) {
		foreach (array_reverse($leg_select->find("option")) as $leg_option) {
			if ($leg_option->value != '0') {
				getSesion($legiid, $leg_option->value);
			}
		}
	}
}

function getSesion($legiid, $sesiid) {
	$vot_html = file_get_html($GLOBALS['votaciones_url'] . "&legiid=" . $legiid . "&sesiid=" . $sesiid);

	$num_sesion = null;
	$fecha_sesion = null;

	foreach ($vot_html->find('select[name=sesionessala]') as $leg_select) {
		foreach (array_reverse($leg_select->find("option")) as $leg_option) {
			if ($sesiid == $leg_option->value) {
				$num_sesion = preg_replace('/^N&ordm; (\S*) .*/', '\1', $leg_option->innertext);
				list($ano_sesion, $mes_sesion, $dia_sesion) = explode('-', preg_replace('/^.* en .* (\d*) de (\w*) de (\d*)$/', '\3-\2-\1', $leg_option->innertext));
				$fecha_sesion = sprintf("%s-%s-%02d", $ano_sesion, $GLOBALS['meses'][$mes_sesion], $dia_sesion);
				print "Sesion: " . $num_sesion . ' Fecha: ' . $fecha_sesion;
				break;
			}
		}
	}

	$query = sprintf("SELECT id_sesion FROM Sesion WHERE fecha = '%s' AND nro = %s", $fecha_sesion, $num_sesion);
	$res = mysql_query($query, $GLOBALS['conn']);
	$row = mysql_fetch_array($res);
	$id_sesion = $row[0];
	$new_sesion = false;

	if ($id_sesion == null) {
		$query = sprintf("INSERT INTO Sesion (fecha, camara, nro, created_at) VALUES ('%s', 'Senado', %s, sysdate())", $fecha_sesion, $num_sesion);
		mysql_query($query, $GLOBALS['conn']) or die(mysql_error($GLOBALS['conn']));
		$id_sesion = mysql_insert_id($GLOBALS['conn']);
		$new_sesion = true;
	}

	foreach (array_reverse($vot_html->find('tr[class=tr-font-gris-short]')) as $vot_row) {
		// 0: Fecha (dd/MM/yyyy hh:mm)
		// 1: Materia, tipo, quorum
		// 2: Boletin
		// 3: Votos a favor
		// 4: Votos en contra
		// 5: Abstensiones
		// 6: Pareos
		list ($fecha, $hora) = explode(' ', $vot_row->find('td', 0)->plaintext);
		list ($dia, $mes, $ano) = explode('/', $fecha);
		$fecha = sprintf("%s-%s-%s", $ano, $mes, $dia);
		$hora .= ':00';

		$articulo = preg_replace('/ <br>.*/', '', $vot_row->find('td', 1)->find('a', 0)->innertext);
		$articulo = preg_replace('/ \(Boletín N.*/', ".", $articulo);
		$tipo = 'particular';

		if (preg_match('/^Votación de las enmiendas unánimes respecto del proyecto de ley, de la Honorable Cámara de Diputados/', $articulo) > 0) {
			$tipo = 'unica';
		} elseif (preg_match('/^Votación en general y en particular/', $articulo) > 0) {
			$tipo = 'general y particular';
			$articulo = 'Conveniencia de legislar sobre el proyecto y todos sus artículos.';
		} elseif (preg_match('/^Votación en general/', $articulo) > 0) {
			$tipo = 'general';
		}

		if ($tipo == 'particular') {
			$articulo = preg_replace('/(proyecto de ley).*/', '\1', $articulo);
		} elseif ($tipo == 'unica') {
			$articulo = preg_replace('/(de la Honorable Cámara de Diputados).*/', '\1', $articulo);
		}

		$rechazo_quorum = 0;

		if (preg_match('/falta de quórum/', $vot_row->find('td', 1)->find('a', 0)->plaintext)) {
			$rechazo_quorum = 1;
		}

		$quorum = '';

		if ($vot_row->find('td', 1)->find('span', 0) != null) {
			$quorum = preg_replace('/^QUORUM: /', '', $vot_row->find('td', 1)->find('span', 0)->plaintext);
			$quorum = preg_replace('/^Dos tercios Q\.C\./', 'Reforma Constitucional 2/3', $quorum);
			$quorum = preg_replace('/^Tres quintos Q\.C\./', 'Reforma Constitucional 3/5', $quorum);
			$quorum = preg_replace('/^Cuatro séptimos Q\.C\./', 'Ley Orgánica Constitucional', $quorum);
			$quorum = preg_replace('/^Mayoría simple/', 'Quorum Simple', $quorum);
			$quorum = preg_replace('/Q\.C\./', 'Quorum Calificado', $quorum);
		}

		$boletin = str_replace('.', '', $vot_row->find('td', 2)->plaintext);

		$id_proyecto_ley = null;

		if ($boletin != null) {
			if (!$new_sesion) {
				$query = sprintf("SELECT p.id_proyecto_ley FROM ProyectoLey p INNER JOIN ProyectoLeyEnSesion s USING (id_proyecto_ley)
					WHERE p.nro_boletin = '%s' AND s.id_sesion = %s", $boletin, $id_sesion);
				$res = mysql_query($query, $GLOBALS['conn']);
				$row = mysql_fetch_array($res);
				$id_proyecto_ley = $row[0];
			}

			$boletin = 'Boletín N° ' . $boletin;
		}

		$num_favor = $vot_row->find('td', 3)->plaintext;
		$num_contra = $vot_row->find('td', 4)->plaintext;
		$num_abs = $vot_row->find('td', 5)->plaintext;
		$num_pareos = $vot_row->find('td', 6)->plaintext;
		$num_aus = $GLOBALS['num_senadores'] - $num_favor - $num_contra - $num_abs - $num_pareos;

		$aprobado = 'Rechazado';

		if ($num_favor > $num_contra && $rechazo_quorum == 0) {
			$aprobado = 'Aprobado';
		}

		$query = sprintf("SELECT id_votacion FROM Votacion WHERE id_sesion = %s AND fecha = '%s' AND hora = '%s' AND camara = 'Senado'", $id_sesion, $fecha, $hora);
		$res = mysql_query($query, $GLOBALS['conn']);
		$row = mysql_fetch_array($res);
		$id_votacion = $row[0];

		if ($id_votacion != null) {
			if ($id_proyecto_ley != null) {
				$query = sprintf("UPDATE Votacion SET
					name = '%s',
					tipo = '%s',
					articulo = '%s',
					voto_si = %s,
					voto_no = %s,
					voto_abs = %s,
					voto_pareos = %s,
					voto_aus = %s,
					resultado = '%s',
					quorum = '%s',
					id_proyecto_ley = %s,
					updated_at = sysdate()
					WHERE id_votacion = %s",
					$boletin, $tipo, $articulo, $num_favor, $num_contra, $num_abs, $num_pareos, $num_aus, $aprobado, $quorum, $id_proyecto_ley, $id_votacion);
			} else {
				$query = sprintf("UPDATE Votacion SET
					name = '%s',
					tipo = '%s',
					articulo = '%s',
					voto_si = %s,
					voto_no = %s,
					voto_abs = %s,
					voto_pareos = %s,
					voto_aus = %s,
					resultado = '%s',
					quorum = '%s',
					updated_at = sysdate()
					WHERE id_votacion = %s",
					$boletin, $tipo, $articulo, $num_favor, $num_contra, $num_abs, $num_pareos, $num_aus, $aprobado, $quorum, $id_votacion);
			}
		} else {
			if ($id_proyecto_ley != null) {
				$query = sprintf(
					"INSERT INTO Votacion (name, camara, en_sala, tipo, articulo, fecha, hora, voto_si, voto_no, voto_abs, voto_pareos, voto_aus, resultado, quorum, id_proyecto_ley, id_sesion, id_parlamento, created_at)
				                   VALUES ('%s', 'Senado', 1, '%s', '%s', '%s', '%s', %s, %s, %s, %s, %s, '%s', '%s', %s, %s, %s, sysdate())",
					$boletin,
					$tipo,
					$articulo,
					$fecha,
					$hora,
					$num_favor,
					$num_contra,
					$num_abs,
					$num_pareos,
					$num_aus,
					$aprobado,
					$quorum,
					$id_proyecto_ley,
					$id_sesion,
					++$GLOBALS['id_parlamento']
				);
			} else {
				$query = sprintf(
					"INSERT INTO Votacion (name, camara, en_sala, tipo, articulo, fecha, hora, voto_si, voto_no, voto_abs, voto_pareos, voto_aus, resultado, quorum, id_sesion, id_parlamento, created_at)
				                   VALUES ('%s', 'Senado', 1, '%s', '%s', '%s', '%s', %s, %s, %s, %s, %s, '%s', '%s', %s, %s, sysdate())",
					$boletin,
					$tipo,
					$articulo,
					$fecha,
					$hora,
					$num_favor,
					$num_contra,
					$num_abs,
					$num_pareos,
					$num_aus,
					$aprobado,
					$quorum,
					$id_sesion,
					++$GLOBALS['id_parlamento']
				);
			}
		}

		mysql_query($query, $GLOBALS['conn']) or die(mysql_error($GLOBALS['conn']) . "\n$query");

		if ($id_votacion != null) {
			mysql_query(sprintf("DELETE FROM VotacionParlamentario WHERE id_votacion = %s", $id_votacion), $GLOBALS['conn']);
		} else {
			$id_votacion = mysql_insert_id($GLOBALS['conn']);
		}

		$url_detalle = $vot_row->find('td', 1)->find('a', 0)->href;

		$detalle_html = file_get_html($GLOBALS['base_url'] . $url_detalle);

		foreach ($detalle_html->find('tr[class=tr-font-gris-short]') as $detalle_row) {
			$nombre_senador = preg_replace('/.*\., (\S*).*$/', '\1', $detalle_row->find('td', 0)->innertext);
			$apellidos_senador = preg_replace('/^(.*)\.,.*$/', '\1', $detalle_row->find('td', 0)->innertext);

			$query = sprintf("SELECT id_parlamentario FROM Parlamentario WHERE senador_diputado = 'S' AND nombre LIKE '%s%%' AND apellidos LIKE '%s%%'",
				strtoupper($nombre_senador), strtoupper($apellidos_senador));
			$res = mysql_query($query, $GLOBALS['conn']) or die(mysql_error($GLOBALS['conn']));

			$row = mysql_fetch_array($res);

			$id_parlamentario = $row[0];

			if ($id_parlamentario == null) {
				die(sprintf("Parlamentario %s %s no existe\n", $nombre_senador, $apellidos_senador));
			}

			$voto = null;

			if ($detalle_row->find('td', 1)->find('img')) {
				$voto = 'y';
			} elseif ($detalle_row->find('td', 2)->find('img')) {
				$voto = 'n';
			} elseif ($detalle_row->find('td', 3)->find('img')) {
				$voto = 'a';
			} elseif ($detalle_row->find('td', 4)->find('img')) {
				$voto = 'p';
			}

			if ($voto == null) {
				die("Voto inválido\n");
			}

			$query = sprintf("INSERT INTO VotacionParlamentario VALUES (%s, %s, '%s')", $id_votacion, $id_parlamentario, $voto);

			mysql_query($query, $GLOBALS['conn']) or die(mysql_error($GLOBALS['conn']));
		}
	}

	print "... OK\n";
}

function getIdLegislatura($num_legislatura) {
	$html = file_get_html($GLOBALS['votaciones_url']);

	foreach ($html->find('select[name=legislaturas]') as $select) {
		foreach ($select->find("option") as $option) {
			$num_legislatura_actual = preg_replace('/^(\d*) \(.*/', '\1', $option->innertext);

			if ($num_legislatura == $num_legislatura_actual) {
				return $option->value;
			}
		}
	}

	return null;
}

function getIdSesion($legiid, $num_sesion) {
	$html = file_get_html($GLOBALS['votaciones_url'] . "&legiid=" . $legiid);

	foreach ($html->find('select[name=sesionessala]') as $select) {
		foreach ($select->find("option") as $option) {
			$num_sesion_actual = preg_replace('/^N&ordm; (\d*) .*/', '\1', $option->innertext);

			if ($num_sesion == $num_sesion_actual) {
				return $option->value;
			}
		}
	}

	return null;
}
?>
