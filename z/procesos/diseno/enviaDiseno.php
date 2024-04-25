<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/servicios.php";

	$obj= new servicios();


	$datos=array(
		$_POST['id_usuarioEN'],
		$_POST['id_clienteEN'],
		$_POST['idordenEN'],
		$_POST['ttrabajoEN'],
		$_POST['fecha_entregEN'],
		$_POST['cantidadEN'],
		$_POST['medidaEN'],
    	$_POST['materialEN'],
		$_POST['f_salidaEN'],
		$_POST['formatEN'],
		$_POST['estadoEN'],
		$_POST['acabadosEN'],
		$_POST['ubiEN'],
		$_POST['observacionesEN'],
		$_POST['docuEN'],
		$_POST['antiEN']
				);

	echo $obj->envioServicios($datos);

    header('Location: ../../vistas/bit_disenador.php');
 ?>