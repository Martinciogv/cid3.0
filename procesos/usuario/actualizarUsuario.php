<?php 

session_start();
	require_once "../../clases/Conexion.php";
	require_once "../../clases/usuarios.php";

	$obj= new usuarios();


	$datos=array(
			$_POST['idusuarioU'],
			$_POST['nombreU'],
			$_POST['privU']
				);

	echo $obj->actualizaUsuario($datos);
    
    header('Location: ../../vistas/usuarios.php');
	
	
 ?>