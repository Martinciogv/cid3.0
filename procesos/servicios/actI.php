<?php
session_start();

if (isset($_SESSION['usuario'], $_SESSION['priv'])) {
    require_once "../../clases/Conexion.php";
    $c = new conectar();
    $conexion = $c->conexion();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id_servicio = $_POST['id_servicio'];
        $estado = $_POST['estadoEdit'];

        // Actualizar el estado del servicio en la base de datos
        $query = "UPDATE servicios SET estado = '$estado' WHERE id_servicios = $id_servicio";
        $resultado = mysqli_query($conexion, $query);

        if ($resultado) {
            echo "El estado del servicio se actualizó correctamente.";
        } else {
            echo "Error al actualizar el estado del servicio: " . mysqli_error($conexion);
        }
    } else {
        echo "Acceso no autorizado.";
    }
} else {
    header("location:../index.php");
}
?>
