<?php
	require_once('cnx.php');
	require_once('controlador.php');
	$boton=$titulo="Ingresar";
	extract($_POST);
	if($flag==1){
		unset($error);
		if(strlen($password)==0 || strlen($username)==0){
			$error="ERROR: No puede dejar ning&uacute;n campo de texto sin completar";
		}else{
			$coneccion = coneccion();
			if($coneccion){
				$sql="SELECT if( count( id ) >0, id, 0 ) AS value1
						FROM usuario
						WHERE password = sha1( '$password' )
						AND username = '$username'
						LIMIT 1";
				$o = new Controlador();
				$o->setQry($sql);
				$id=$o->selectQ();
				if($id==0){
					$error="ERROR: Datos incorrectos";
				}else{
					session_start();
					$_SESSION['usu_id']=$id;
					header("location: home.php");
				}
			}
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title><?php echo $titulo;?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
	</head>
	<body>
            <br />
            <br />
            <br />
	<form method="post" name="f1" action="" />
	<table width="450px" border="0" cellspacing="1" cellpadding="3" align="center">
      <tr>
        <td class="titulo" width="50%">Username : </td>
        <td><input type="text" name="username" id="username" class="input" maxlength="150" size="30" /></td>
      </tr>
      <tr>
        <td class="titulo">Password : </td>
        <td><input type="password" name="password" id="password" class="input" maxlength="10" size="30" /></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><input type="submit" name="button" value="<?php echo $boton;?>" /></td>
      </tr>
      <?php if(strlen($error)>0){ ?>
	  <tr>
	    <td colspan="2" style="background-color:#FF0000; text-align:center;"><?php echo $error;?></td>
	  </tr>
	  <?php }?>
    </table>
    <input type="hidden" name="flag" id="flag" value="1" />
    </form>
	</body>
</html>