<?php 

session_start();
	require_once "../../clases/Conexion.php";
	require_once "../../clases/servicios.php";

	$obj= new servicios();


	$datos=[
			$_POST['id_serviciosU'],
			$_POST['estadoU'],
			$_POST['fol_disU'],
			$_POST['EstU'],
			$_POST['valor']
				];

	echo $obj->finalizarServicio($datos);

	header('Location: ../../vistas/bit_imp.php' );
	
 ?>