<?php 

class MySQL
{
	var $HOSTNAME = "localhost";
	var $CONN = "";
/*
	var $USERNAME = "root";
	var $PASSWORD = "Apollo13";
	var $DBNAME = "vota_produccion";
*/
	var $USERNAME = "vota_p";
	var $PASSWORD = "vota_754";
	var $DBNAME = "votainteligente_proyectos";
	
	function error($text)
	{
		$no = mysql_errno();
		$msg = mysql_error();
		echo "db.inc.php::: [$text] ( $no : $msg )<br>\n";
		exit;	
	}
	
	function init()
	{
		$user = $this->USERNAME;
		$pass = $this->PASSWORD;
		$server = $this->HOSTNAME;
		$dbase = $this->DBNAME;
		$conn = mysql_connect($server, $user, $pass);
		if (!$conn){
			$this->error("DB connection unavailable");
		}
		$dbsel = mysql_select_db("$dbase");
		if (!$dbsel){
			$this->error("Unable to select database"); 
		}
		$this->CONN = $conn;
		return true;
	}
/*--------------------------------------------------
	GENERAL functions
--------------------------------------------------*/
	
	function select ($sql="")
	{
		if(empty($sql)) { return false; }
		if(!eregi("^select",$sql))
		{
			echo "<H2>SQL statement must begin with select!</H2>\n";
			return false;
		}
		if(empty($this->CONN)) { return false; }
		$conn = $this->CONN;
		$results = mysql_query($sql,$conn);
		
		if ((!$results) or (empty($results))) {
			mysql_free_result($results);
			return false;
		}
		
		$count = 0;
		$data = array();
		while ($row = mysql_fetch_array($results))
		{
			$data[$count] = $row;
			$count++;
		}
		
		mysql_free_result($results);
		return $data;
	}
	
	function insert ($sql="")
	{
		if(empty($sql)) { return false; }
		if(!eregi("insert",$sql))
		{
			echo "<H2>SQL statement must begin with insert!</H2>\n";
			return false;
		}
		if (empty($this->CONN)) { return false; }
		$conn = $this->CONN;
		$results = mysql_query($sql,$conn);
		
		if(!$results) { return false; }
		$results = mysql_insert_id();
		return $results;
	}

	function delete($sql="")
	{
		if(empty($sql)) { return false; }
		if(!eregi("delete",$sql))
		{
			echo "<H2>SQL statement must begin with delete!</H2>\n";
			return false;
		}
		if (empty($this->CONN)) { return false; }
		$conn = $this->CONN;
		$results = mysql_query($sql,$conn);
		return $results;
	}
	
	function update($sql="")
	{
		if(empty($sql)) { return false; }
		if(!eregi("update",$sql))
		{
			echo "<H2>SQL statement must begin with update!</H2>\n";
			return false;
		}
		if (empty($this->CONN)) { return false; }
		$conn = $this->CONN;
		$results = mysql_query($sql,$conn);
		return $results;
	}
	
/*--------------------------------------------------
	functions
--------------------------------------------------*/

	function getIdProyectoLey($nro_boletin="")
	{
		$sql = "SELECT id_proyecto_ley FROM ProyectoLey WHERE nro_boletin='$nro_boletin'";
  	$results = $this->select($sql);

		if (!empty($results)) {
			$results = $results[0]["id_proyecto_ley"];
		} else {
			$results = "0";
		}
		return $results;
	}

	function getIdSesion($sesion="")
	{
		$sql = "SELECT id_sesion FROM Sesion WHERE nro='$sesion'";
  	$results = $this->select($sql);

		if (!empty($results)) {
			$results = $results[0]["id_sesion"];
		} else {
			$results = "0";
		}
		return $results;
	}
	
	function updatePareosAusentes($id_votacion,$pareos,$ausentes)
	{
		$sql = "UPDATE Votacion SET voto_pareos='$pareos',voto_aus='$ausentes' WHERE id_votacion='$id_votacion'";
  	$results = $this->update($sql);

		return $results;
	}
	
	function insertVoto($id_votacion, $id_parlamento, $vote)
	{
	  //número interno en páginas de cámara y senado
	  $sql1 = "SELECT id_parlamentario FROM Parlamentario WHERE id_parlamento='$id_parlamento' AND senador_diputado='D'";
  	$results1 = $this->select($sql1);
  	if (!empty($results1)) {
			$id_parlamentario = $results1[0]["id_parlamentario"];
		} else {
			$id_parlamentario = "0";
		}
		//echo $id_parlamento."-".$id_parlamentario."<br>";

	  $results = null;
	  if ($results1 != null && $results1 != 0){
      $sql = "INSERT INTO VotacionParlamentario (id_votacion, id_parlamentario, voto) VALUES ($id_votacion, $id_parlamentario, '$vote')";
      $results = $this->insert($sql);
    }
		return $results;
	}
}
?>
