<?php
session_start();
require_once "../../clases/Conexion.php";
$c = new conectar();
$conexion = $c->conexion();

$sql = "ALTER TABLE servicios ADD `fechaServicio` DATE DEFAULT CURRENT_DATE";

if ($conexion->query($sql) === TRUE) {
    echo "Columna agregada exitosamente.";
} else {
    echo "Error al agregar la columna: " . $conexion->error;
}

// Cerrar la conexión
$conexion->close();
?>

