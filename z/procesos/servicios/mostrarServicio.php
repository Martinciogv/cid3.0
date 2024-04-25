<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/servicios.php";

	$obj= new servicios();

	echo json_encode($obj->obtenDatosServicios($_POST['idservicios']));

 ?>