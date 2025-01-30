<?php
require_once('../Config/config_role.php');
?>
<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                        Menu
                    </li>

                    <?php if ($_SESSION['user_'] === 'rvalera') { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fas fa-dollar-sign"></i>Gastos</a>
                            <div id="submenu-1" class="collapse submenu">
                                <ul class="nav flex-column">

                                    <li class="nav-item">
                                        <a class="nav-link" href="../Caja/Gestion.php">Gestión</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    <?php } ?>

                    <?php if ($_SESSION['roles'] === 1 || $_SESSION['roles'] === 2) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fas fa-dollar-sign"></i>Gastos</a>
                            <div id="submenu-1" class="collapse submenu">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="../Caja/Plantilla.php">Plantilla Gastos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="../Caja/PlantillaI.php">Plantilla Ingresos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="../Caja/Gestion.php">Gestión</a>
                                    </li>
                                </ul>
                            </div>
                        </li>


                        <li class="nav-divider">
                            Caja
                        </li>

                    <?php } ?>


                    <?php if ($_SESSION['roles'] === 1 || $_SESSION['roles'] === 2 || $_SESSION['roles'] === 4 || $_SESSION['roles'] === 5) { ?>

                        <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fas fa-donate"></i>Registro</a>
                            <div id="submenu-2" class="collapse submenu">


                                <?php if ($_SESSION['roles'] === 1 || $_SESSION['roles'] === 2) { ?>
                                    <!-- CONTABILIDAD -->
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="../Caja/../Caja/AperturaCaja.php">Apertura de Caja</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="../Caja/../Caja/CierreCajaFinal.php">Validacion de Cierre de Caja</a>
                                        </li>
                                    </ul>
                                    <!-- CONTABILIDAD -->
                                <?php } ?>

                                <!-- <?php if ($_SESSION['roles'] === 1 || $_SESSION['roles'] === 4 || $_SESSION['roles'] === 5) { ?> -->
                                <!-- CAJA -->
                                <ul class="nav flex-column">

                                    <li class="nav-item">
                                        <a class="nav-link" href="ingreso.php">Caja</a>
                                    </li>
                                    <!-- <?php if ($_SESSION['user_'] === 'bamez') { ?> -->
                                    <!-- <li class="nav-item">
                                            <a class="nav-link" href="ingresos.php">Registros manuales</a>
                                        </li> -->
                                    <!-- <?php } ?> -->
                                    <li class="nav-item">
                                        <a class="nav-link" href="../Caja/CierreCaja.php">Cierre de Caja</a>
                                    </li>
                                </ul>
                                <!-- CAJA -->
                                <!-- <?php } ?> -->

                            </div>
                        </li>

                    <?php } ?>

                    <li class="nav-divider">
                        Herramientas
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-7" aria-controls="submenu-7"><i class="fas fa-fw fa-inbox"></i>Listado<span class="badge badge-secondary">New</span></a>
                        <div id="submenu-7" class="collapse submenu">
                            <ul class="nav flex-column">

                                <li class="nav-item">
                                    <a class="nav-link" href="../Caja/Caja-Custom.php">Caja</a>
                                </li>

                                <?php if ($_SESSION['roles'] === 3 || $_SESSION['user_'] !== 'rvalera') { ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="../Caja/Caja-Semanal.php">Caja Semanal</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="../Caja/Caja-Diaria.php">Caja Diaria</a>
                                    </li>
                                <?php } ?>
                                <?php if ($_SESSION['user_'] === 'rvalera') { ?>
                                    <!--<li class="nav-item">
                                        <a class="nav-link" href="Caja-Completa.php">Caja Completa</a>
                                    </li>-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="../Caja/Caja-Custom.php">Caja</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link collapsed" href="" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1-2" aria-controls="submenu-1-2">Detalles</a>
                                        <div id="submenu-1-2" class="submenu collapse">
                                            <ul class="nav flex-column">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="../Caja/IngresosCaja.php">Ingresos</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="../Caja/AdicionalesCaja.php">Adicionales</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="../Caja/Diferencias.php">Diferencias</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                <?php } ?>
                                <?php if ($_SESSION['roles'] === 2 || $_SESSION['roles'] === 1) { ?>
                                    <li class="nav-item">
                                        <a class="nav-link collapsed" href="" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1-2" aria-controls="submenu-1-2">Detalles</a>
                                        <div id="submenu-1-2" class="submenu collapse">
                                            <ul class="nav flex-column">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="../Caja/IngresosCaja.php">Ingresos</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="../Caja/AdicionalesCaja.php">Adicionales</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="../Caja/Diferencias.php">Diferencias</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>

                                <?php } ?>
                            </ul>
                        </div>
                    </li>
                    <?php if ($_SESSION['roles'] === 1 || $_SESSION['roles'] === 2) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-9" aria-controls="submenu-9"><i class="fab fa-wpforms"></i>Reportes</a>
                            <div id="submenu-9" class="collapse submenu">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="../reportes/detalles.php">Detalles</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="../reportes/x_asesor.php">X Asesor</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    <?php } ?>

                    <?php if ($_SESSION['roles'] === 1 || $_SESSION['roles'] === 2) { ?>
                        <li class="nav-divider">
                            Configuracion
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-40" aria-controls="submenu-40"><i class="fas fa-box"></i>Partidas</a>
                            <div id="submenu-40" class="collapse submenu">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="../Management/Partida.php">Nueva Partida</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="../Management/GestionPartidas.php">Gestion de Partidas</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-41" aria-controls="submenu-41"><i class="fas fa-users"></i>Personal</a>
                            <div id="submenu-41" class="collapse submenu">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link collapsed" href="" data-toggle="collapse" aria-expanded="false" data-target="#submenu-40-1" aria-controls="submenu-40-1">Usuarios</a>
                                        <div id="submenu-40-1" class="submenu collapse">
                                            <ul class="nav flex-column">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="../Management/Usuarios.php">Crear Usuario</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="../Management/GestionTrabajadores.php">Gestion de Usuarios</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link collapsed" href="" data-toggle="collapse" aria-expanded="false" data-target="#submenu-40-2" aria-controls="submenu-40-2">Asignados</a>
                                        <div id="submenu-40-2" class="submenu collapse">
                                            <ul class="nav flex-column">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="../Management/Asignados.php">Crear Asignado</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="../Management/GestionAsignados.php">Gestion de Asignados</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>

                            </div>

                        </li>
                    <?php } ?>

                </ul>
            </div>
        </nav>
    </div>
</div>