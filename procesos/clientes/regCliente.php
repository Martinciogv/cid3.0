<?php
// Script PHP para agregar clientes
session_start();
require_once "../../clases/Conexion.php";
require_once "../../clases/Clientes.php";

$obj = new Clientes();

$datos = array(
    $_POST['nombre'],
    $_POST['email'],
    $_POST['telefono'],
    $_POST['ocupacion'],
    $_POST['fecha_cumple']
);

$resultado = $obj->agregaCliente($datos);

if ($resultado === "duplicado") {
    echo '<script>
            alert("El nombre ya está registrado");
            window.history.back();
          </script>';
    exit;
} elseif ($resultado === true) {
    echo '<script>
    alert("Registrado correctamente");
    window.history.back();
  </script>';
    exit;
} else {
   
}
