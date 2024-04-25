<?php 

	class diseno{

		public function agregaDiseno($datos){
			$c= new conectar();
			$conexion=$c->conexion();
			$fecha=date('Y-m-d');
			
			if($datos[7] == "0") {

			$sql="INSERT INTO `orden`
			(`id_usuario`,
			 `id_cliente`,
			 `ttrabajo`,
			 `medida`,
			 `material`,
			 `cantidad`,
			 `f_salida`, 
			 `formato`,
			 `descripcion_`,
			 `notas`,
			 `tarchivos`,
			 `ubi`,
			 `acabados`,
			 `fecha_entrega`,
			 `fecha_imp`,
			 `descri`,
			 `disenador`,
			 `pro`,
			 `estado`,
			 `fechaOrden`)
			 				 VALUES ('$datos[2]',
									'$datos[0]',
									'$datos[3]',
									'$datos[4]',
									'$datos[5]',
									'$datos[6]',
									'$datos[8]',
									'$datos[9]',
									'$datos[10]',
									'$datos[11]',
									'$datos[12]',
									'$datos[13]',
									'$datos[18]',
									'$datos[1]',
									'$datos[17]',
									'$datos[19]',
									'$datos[14]',
									'$datos[15]',
									'$datos[16]',
									'$fecha')";
			return mysqli_query($conexion,$sql);	
		} else {
			
			$sql="INSERT INTO `orden`
			(`id_usuario`,
			 `id_cliente`,
			 `ttrabajo`,
			 `medida`,
			 `material`,
			 `cantidad`,
			 `f_salida`, 
			 `formato`,
			 `descripcion_`,
			 `notas`,
			 `tarchivos`,
			 `ubi`,
			 `acabados`,
			 `fecha_entrega`,
			 `fecha_imp`,
			 `descri`,
			 `disenador`,
			 `pro`,
			 `estado`,
			 `fechaOrden`)
			 				 VALUES ('$datos[2]',
									'$datos[0]',
									'$datos[3]',
									'$datos[4]',
									'$datos[5]',
									'$datos[6]',
									'$datos[7]',
									'$datos[9]',
									'$datos[10]',
									'$datos[11]',
									'$datos[12]',
									'$datos[13]',
									'$datos[18]',
									'$datos[1]',
									'$datos[17]',
									'$datos[19]',
									'$datos[14]',
									'$datos[15]',
									'$datos[16]',
									'$fecha')";
			return mysqli_query($conexion,$sql);
		}
		
		
		}
		public function obtenDatosOrden($idorden){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="SELECT `id_orden`, `id_usuario`, `id_cliente`, `ttrabajo`, `medida`, `material`,
			`cantidad`, `f_salida`, `formato`, `descripcion_`, `notas`, `tarchivos`, `ubi`, `acabados`,
			`fecha_entrega`, `fecha_imp`, `descri`, `disenador`, `pro`, `estado`, `fechaOrden`
			FROM `orden` WHERE id_orden='$idorden'";
				
			$result=mysqli_query($conexion,$sql);
			$most=mysqli_fetch_row($result);

			$dato=array(
					'id_orden' => $most[0], 
					'id_usuario' => $most[1],
					'id_cliente' => $most[2],
					'ttrabajo' => $most[3],
					'medida' => $most[4],
					'material' => $most[5],
					'cantidad' => $most[6],
					'f_salida' => $most[7],
					'format' => $most[8],
					'descripcion_' => $most[9],
					'notas' => $most[10],
					'tarchivos' => $most[11],
					'ubi' => $most[12],
					'acabados' => $most[13],
					'fecha_entrega' => $most[14],
					'fecha_imp' => $most[15],
					'descri' => $most[16],
					'disena' => $most[17],
					'pro' => $most[18],
					'estado' => $most[19],
					'fechaOrden' => $most[20],
					
						);
			return $dato;
		}
		
	
		public function actualizaOrden($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();
	
			$sql="UPDATE orden set 	ttrabajo='$datos[1]',
									cantidad='$datos[7]',
									f_salida='$datos[8]',
									formato='$datos[9]',
									acabados='$datos[10]',
									fecha_entrega='$datos[2]',
									fecha_imp='$datos[3]',
									descri='$datos[12]',
									disenador='$datos[5]',
									pro='$datos[6]',
									ubi='$datos[4]',
									estado='$datos[11]'
		
						where id_orden='$datos[0]'";
			return mysqli_query($conexion,$sql);
		}

		public function actualizaOrden1($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();
	
			$sql="UPDATE orden set id_orden='$datos[0]',
									id_cliente='$datos[1]'
									
		
						where id_orden='$datos[0]'";
			return mysqli_query($conexion,$sql);
		}
	
}
 ?>
 