<?php 

session_start();
	require_once "../../clases/Conexion.php";
	require_once "../../clases/servicios.php";

	$obj= new servicios();


	$datos=[
			$_POST['id_serviciosEdit'],
			$_POST['serviciosEdit'],
			$_POST['documentEdit'],
			$_POST['ubicacionEdit'],
			$_POST['espEdit'],
			$_POST['anticipoEdit'],
			$_POST['estadoEdit'],
			$_POST['fol_disEdit'],
			];

	echo $obj->actualizaServicio($datos);

	header('Location: ../../vistas/bit_imp.php' );
	
 ?>