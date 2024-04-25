<!--menu-->
<nav class="navbar">
    <ul class="nav flex-column">
        <!--inicio-->
        <li class="nav-item">
            <a class="nav-link <?php echo ($pagina_actual == 'inicio.php') ? 'active' : ''; ?>" href="inicio.php">
                <span data-feather="home"></span>
                Inicio
            </a>
        </li>
        <!--Orden de impresión-->
        <li class="nav-item">
            <a class="nav-link <?php echo ($pagina_actual == 'impresion.php') ? 'active' : ''; ?>" href="impresion.php">
                <span data-feather="file-text"></span>
                Orden de impresión
            </a>
        </li>
        <!--Bitacora de impresión-->
        <li class="nav-item">
            <a class="nav-link <?php echo ($pagina_actual == 'bit_imp.php') ? 'active' : ''; ?>" href="bit_imp.php">
                <span data-feather="calendar"></span>
                Bitácora de impresión
            </a>
        </li>

        <?php if ($_SESSION['priv'] == "1" || $_SESSION['priv'] == "2") : ?>
            <!--Orden de diseñador-->
            <li class="nav-item">
                <a class="nav-link <?php echo ($pagina_actual == 'disenador.php') ? 'active' : ''; ?>" href="disenador.php">
                    <span data-feather="pen-tool"></span>
                    Orden de Diseñador
                </a>
            </li>
            <!--Bitacora de diseñador-->
            <li class="nav-item">
                <a class="nav-link <?php echo ($pagina_actual == 'bit_disenador.php') ? 'active' : ''; ?>" href="bit_disenador.php">
                    <span data-feather="calendar"></span>
                    Bitacora de Diseñador
                </a>
            </li>
            <!--Usuarios-->
            <li class="nav-item">
                <a class="nav-link <?php echo ($pagina_actual == 'usuarios.php') ? 'active' : ''; ?>" href="usuarios.php">
                    <span data-feather="user"></span>
                    Usuarios
                </a>
            </li>
        <?php elseif ($_SESSION['priv'] == "4" || $_SESSION['priv'] == "5") : ?>
             <!--Orden de diseñador-->
             <li class="nav-item">
                <a class="nav-link <?php echo ($pagina_actual == 'disenador.php') ? 'active' : ''; ?>" href="disenador.php">
                    <span data-feather="pen-tool"></span>
                    Orden de Diseñador
                </a>
            </li>
            <!--Bitacora de diseñador-->
            <li class="nav-item">
                <a class="nav-link <?php echo ($pagina_actual == 'bit_disenador.php') ? 'active' : ''; ?>" href="bit_disenador.php">
                    <span data-feather="calendar"></span>
                    Bitacora de Diseñador
                </a>
            </li>
            <!--Usuarios-->
            <li class="nav-item">
                <a class="nav-link <?php echo ($pagina_actual == 'usuarios.php') ? 'active' : ''; ?>" href="usuarios.php">
                    <span data-feather="user"></span>
                    Usuarios
                </a>
            </li>
            <!--Ajustes de impresión-->
            <li class="nav-item">
                <a class="nav-link <?php echo ($pagina_actual == 'ajustes.php') ? 'active' : ''; ?>" href="ajustes.php">
                    <span data-feather="settings"></span>
                    Ajustes Impresión
                </a>
            </li>
            <!--Ajustes de diseño-->
            <li class="nav-item">
                <a class="nav-link <?php echo ($pagina_actual == 'ajustesD.php') ? 'active' : ''; ?>" href="ajustesD.php">
                    <span data-feather="settings"></span>
                    Ajustes Diseño
                </a>
            </li>
        <?php else : ?>
            <!--Orden de Diseño-->
            <li class="nav-item">
                <a class="nav-link <?php echo ($pagina_actual == 'diseno.php') ? 'active' : ''; ?>" href="diseno.php">
                    <span data-feather="pen-tool"></span>
                    Orden de Diseño
                </a>
            </li>
            <!--Bitacora de diseño-->
            <li class="nav-item">
                <a class="nav-link <?php echo ($pagina_actual == 'bit_dis.php') ? 'active' : ''; ?>" href="bit_dis.php">
                    <span data-feather="calendar"></span>
                    Bitacora de Diseño
                </a>
            </li>
        <?php endif; ?>
        <!--Clientes-->
        <li class="nav-item">
            <a class="nav-link <?php echo ($pagina_actual == 'clientes.php') ? 'active' : ''; ?>" href="clientes.php">
                <span data-feather="users"></span>
                Clientes
            </a>
        </li>
    </ul>
</nav>

 </div>
 </div>
 <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
     <p></p>