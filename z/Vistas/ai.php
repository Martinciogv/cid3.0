<?php
session_start();
if (isset($_SESSION['usuario'], $_SESSION['priv'])) {
    require_once "../clases/Conexion.php";
    $c = new conectar();
    $conexion = $c->conexion();

    include('includes/headers.php');
    include('includes/menu.php');
?>
<h2>Agregar Columna</h2>
    
    <form action="../procesos/ajustes/agregar_columna.php" method="post">
        <input type="submit" name="agregar_columna" value="Agregar Columna">
    </form>
   
<?php

} else {
    header("location:../index.php");
}
?>

<!--
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Nota</h5>
                            <p class="card-text">
                            <h3>Folio impresión #<?php echo $mostrar[0]; ?></h3>
                            <?php
                            if ($mostrar[6] != '0') { ?>
                                <h3>Folio diseño #<?php echo $mostrar[6]; ?></h3>
                            <?php } else { ?>
                            <?php } ?>
                           
                        </p>
                        </div>
                            -->