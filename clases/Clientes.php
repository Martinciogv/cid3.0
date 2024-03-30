<?php

class clientes
{
	public function agregaCliente($datos)
	{
		$c = new Conectar();
		$conexion = $c->conexion();

		$resultado = mysqli_query($conexion, "SELECT * FROM `clientes` WHERE nombre='$datos[0]'");

		if (mysqli_num_rows($resultado) > 0) {
			// Si hay duplicado, devuelve un error
			return "duplicado";
		}

		$idusuario = $_SESSION['iduser'];

		$sql = "INSERT INTO `clientes`(`id_usuario`, `nombre`, `email`, `telefono`, `ocupacion`, `fecha_cumple`)
                VALUES ('$idusuario', '$datos[0]', '$datos[1]', '$datos[2]', '$datos[3]', '$datos[4]')";

		// Si es exitoso, devuelve verdadero
		return mysqli_query($conexion, $sql);
	}



	public function obtenDatosCliente($idcliente)
	{
		$c = new conectar();
		$conexion = $c->conexion();

		$sql = "SELECT `id_cliente`, `id_usuario`, `nombre`, `email`, `telefono`, `ocupacion`, `fecha_cumple` FROM `clientes` where id_cliente='$idcliente'";
		$result = mysqli_query($conexion, $sql);
		$ver = mysqli_fetch_row($result);

		$datos = array(
			'id_cliente' => $ver[0],
			'nombre' => $ver[2],
			'email' => $ver[3],
			'telefono' => $ver[4],
			'ocupacion' => $ver[5],
			'fecha_cumple' => $ver[6],
		);
		return $datos;
	}

	public function actualizaCliente($datos)
	{
		$c = new conectar();
		$conexion = $c->conexion();
		$sql = "UPDATE `clientes` SET 
			
			`nombre`='$datos[1]',
			`email`='$datos[2]',
			`telefono`='$datos[3]',
			`ocupacion`='$datos[4]',
			`fecha_cumple`='$datos[5]' WHERE id_cliente='$datos[0]'";
		return mysqli_query($conexion, $sql);
	}

	public function eliminaCliente($idcliente)
	{
		$c = new conectar();
		$conexion = $c->conexion();

		$sql = "DELETE from clientes where id_cliente='$idcliente'";

		return mysqli_query($conexion, $sql);
	}
}
