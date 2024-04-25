<?php
session_start();

if (isset($_SESSION['usuario'], $_SESSION['priv'])) {
    require_once "../../clases/Conexion.php";
    $c = new conectar();
    $conexion = $c->conexion();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id_orden = $_POST['id_orden'];
        $id_cliente = $_POST['id_cliente'];
        $estado = $_POST['estadoEdit'];

        // Actualizar el estado y el ID del cliente del servicio en la base de datos
        $query = "UPDATE orden SET id_cliente = '$id_cliente', estado = '$estado' WHERE id_orden = $id_orden";
        $resultado = mysqli_query($conexion, $query);

        if ($resultado) {
            echo "La información del servicio se actualizó correctamente.";
            // Redireccionar a la página anterior
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit; // Terminar el script para evitar ejecución adicional
        } else {
            echo "Error al actualizar la información del servicio: " . mysqli_error($conexion);
        }
    } else {
        echo "Acceso no autorizado.";
    }
} else {
    header("location:../index.php");
}
?>
