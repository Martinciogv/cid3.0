<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/Diseno.php";

	$obj= new diseno();

	echo json_encode($obj->obtenDatosOrden($_POST['idorden']));

 ?>