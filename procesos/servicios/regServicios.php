<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/servicios.php";

	$obj= new servicios();



	$ser = "";
	if(isset($_POST["servicio"])){
	  foreach($_POST["servicio"] as $valor){
		$servicios = $servicios. "".$valor;
	  }
	}
	
	$datos=array(
		$_POST['usuario'],
		$_POST['cliente'],
		$_POST['fecha_entrega'],
		$_POST['fol_dis'],
		$servicios,
		$_POST['doc'],
    	$_POST['ubi'],
    	$_POST['espe'],
    	$_POST['anticipoS'],
		$_POST['estado'],
				);

	echo $obj->registroServicios($datos);

    header('Location: ../../vistas/impresion.php');
 ?>