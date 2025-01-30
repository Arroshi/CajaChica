<?php
require_once('../Config/security.php');
include_once('../Config/Conection.php');

$cnx = new conexion();
$cadena = $cnx->abrirConexion();

$total_result = mysqli_query($cadena,"SELECT SUM(`Monto`) AS `Total` FROM `caja`") or exit(mysql_error());
$total = mysqli_fetch_object($total_result);

$monto_apert_ = mysqli_query($cadena,"SELECT *  FROM `apertura_caja`
                                       WHERE DATE(`fecha_reg`) = CURDATE() AND usu_caja = {$_SESSION['id_cuenta']}")


?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CAJA MAK</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <?php include '../Caja/bar_header.php'; ?>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
       <?php include '../Caja/nav_bar_moduls.php'; ?>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Listado Diario</h2>
                            <br>
                            <h3>Monto Aperturado : <strong>S/.
                                <?php
                             $montoApertura = "";
                            if ($monto_apert_ != null) {

                                $datos_ = mysqli_fetch_object($monto_apert_);

                                if ($datos_ != null && $_SESSION['rol'] == 2) {
                                    $montoApertura = $datos_->monto_apert;
                                    echo $montoApertura;
                                } elseif ($_SESSION['rol'] != 2) {
                                        echo "-";
                                }  else {
                                    echo "(A la espera de la apertura de caja.)";
                                }
                            } else {
                                echo "A la espera de la apertura de caja.";
                            }?>
                            </strong></h3>
                            <h3>Monto a Cerrar : <strong>S/. <?php echo $datos_->monto_real ?></strong></h3>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="../" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="ingreso.php" class="breadcrumb-link">Registro</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Listado Diario</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->


                    <div class="row">
                        <!-- ============================================================== -->
                        <!-- hoverable table -->
                        <!-- ============================================================== -->
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Caja Diaria</h5>
                                <div class="card-body">
                                    <?php
                                    require_once('../Controller/controller_selector.php');
                                    ?>
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">Cod:</th>
                                                <th scope="col">Fecha:</th>
                                                <th scope="col">Asignado a:</th>
                                                <th scope="col">Tipo de Gasto:</th>
                                                <th scope="col">Gasto (s/.):</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            <?php foreach ($listaDiaria as $lst_d): ?>
                                            <tr>
                                                <td scope="row"><?php echo $lst_d[0] ?></td>
                                                <td><?php echo $lst_d[1] ?></td>
                                                <td><?php echo $lst_d[2].' '. $lst_d[3] ?></td>
                                                <td><?php echo $lst_d[4] ?></td>
                                                <td><?php echo $lst_d[5] ?></td>
                                                <td><?php echo $lst_d[6] ?></td>
                                                <td>
                                                    <?php
                                                        if ($lst_d[8] !== null){
                                                         echo "S/. ".$lst_d[8];
                                                        }else{
                                                         echo '- -';
                                                        }
                                                    ?>
                                                </td>
                                                <td><?php //echo $lst_d[9] ?></td>
                                                <td>
                                                    <?php
                                                        /*if ($lst_d[10] !== null){
                                                         echo 'S/. '.$lst_d[10];
                                                        }else{
                                                         echo '- -';
                                                        }*/
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    /*if ($lst_d[11] !== null){
                                                         echo 'S/. '.$lst_d[11];
                                                    }else{
                                                         echo '- -';
                                                    }*/
                                                    ?>
                                                </td>
                                            </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end hoverable table -->
                        <!-- ============================================================== -->
                    </div>
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            Victor Arroyo Copyright © 2023
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="../assets/vendor/custom-js/jquery.multi-select.html"></script>
    <script src="../assets/libs/js/main-js.js"></script>
</body>

</html>

