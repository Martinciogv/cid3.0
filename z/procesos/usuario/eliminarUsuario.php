<?php
session_start();
if (isset($_SESSION['usuario']) and $_SESSION['usuario'] == 'admin') {
  require_once "../../clases/Conexion.php";
  $c = new conectar();
  $conexion = $c->conexion();
}
?>
  <?php

  if(isset($_GET['id_usuario'])) {
    $id_usuario = $_GET['id_usuario'];
   
    
    $query = "DELETE FROM `usuarios` WHERE id_usuario = $id_usuario";
    $result = mysqli_query($conexion, $query);
    if(!$result) {
      die("Query Failed.");
    }
    
    header('Location: ../../vistas/usuarios.php');

  }
  

?>