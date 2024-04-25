<?php 

session_start();
	require_once "../../clases/Conexion.php";
	require_once "../../clases/diseno.php";

	$obj= new diseno();


	$datos=array(
			$_POST['idordenE'],//0
			$_POST['ttrabajoE'],//1
			$_POST['fecha_entregE'],//2
			$_POST['fecha_impE'],//3
			$_POST['ubiE'],//4
			$_POST['disenaE'],//5
			$_POST['proE'],//6
			$_POST['cantidadE'],//7
			$_POST['f_salidaE'],//8
			$_POST['formatoE'],//9
			$_POST['acabadosE'],//10
			$_POST['estadoE'],//11
			$_POST['descriE']//
				);

	echo $obj->actualizaOrden($datos);

	header('Location: ../../vistas/bit_disenador.php' );
	
 ?>