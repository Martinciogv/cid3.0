<?php
    require "../../clases/Usuarios.php";
    require "../../clases/Conexion.php";
    $obj = new usuarios();
    
    echo json_encode($obj->obtenDatosUsuario($_POST['idusuario']));
    
?>