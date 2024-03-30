<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/Diseno.php";

	$obj= new diseno();

	
	$datos=array(
		$_POST['cliente'],
		$_POST['fecha_entrega_dis'],
		$_POST['usuarioD'],
		$_POST['ttrabajo'],
		$_POST['medida'],
		$_POST['material'],
		$_POST['cantidad'],
		$_POST['format'],
		$_POST['otro'],
		$_POST['t_formato'],
		$_POST['descripcion_'],
		$_POST['notas'],
		$_POST['t_arc'],
    	$_POST['ubic'],
		$_POST['disenador'],
		$_POST['pro'],
		$_POST['estado'],
		$_POST['fecha_entrega_imp'],
    	$_POST['acabados'],
		$_POST['descri'],
    	
				);

	echo $obj->agregaDiseno($datos);

    header('Location: ../../vistas/disenador.php');
 ?>