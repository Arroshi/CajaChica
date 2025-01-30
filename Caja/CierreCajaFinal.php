<?php
require_once('../Config/security.php');
require_once('../Controller/controller_selector.php');
include_once('../Config/Conection.php');

$cnx = new conexion();
$cadena = $cnx->abrirConexion();


//$monto_apert_0 = mysqli_query($cadena,"SELECT `id_apert`, `monto_apert`  FROM `apertura_caja` WHERE DATE(`fecha_reg`) = CURDATE()")or exit(mysql_error());

//$monto_apert_ = mysqli_query($cadena,"SELECT COUNT(*) as count FROM apertura_caja WHERE DATE(`fecha_reg`) = CURDATE()")or exit(mysql_error());

//$datos_ = mysqli_fetch_object($monto_apert_0);

$self_monto_ = mssql_query("SELECT id_apert, monto_real FROM apertura_caja
                           WHERE CONVERT(DATE, fecha_reg) = CONVERT(DATE, GETDATE())
                           AND usu_caja = {$_SESSION['id_cuenta']}");


if ($self_monto_ != null) {
    $monto_ = mssql_fetch_object($self_monto_);
    if ($monto_ != null /*&& $_SESSION['rol'] == 2*/) {
        $montoCierre = $monto_->monto_real;
        //echo $montoCierre;
    }
}


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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
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
                <!--                 <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Form Validations</h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="../index.php" class="breadcrumb-link">Inicio</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Caja</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Registro caja</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->

                <div class="row">
                    <!-- ============================================================== -->
                    <!-- validation form -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-header">Validacion de Caja</h3>
                                <table class="table table-hover">
                                    <thead>
                                        <tr>

                                            <th scope="col">Usuario:</th>
                                            <th scope="col">Monto Aperturado:</th>
                                            <th scope="col">Monto Actual:</th>
                                            <th scope="col">Monto Cierre:</th>
                                            <th scope="col">Diferencia:</th>
                                            <th scope="col">Adicional:</th>
                                            <th scope="col">Fecha Apertura:</th>
                                            <th scope="col">Validacion:</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach ($listaCajas_F as $lst_d) : ?>
                                            <tr>

                                                <td><?php echo $lst_d['nom_resp'] . ' ' . $lst_d['ape_resp'] ?></td>
                                                <td><?php echo $lst_d['monto_apert'] ?></td>
                                                <td><?php echo $lst_d['monto_real'] ?></td>
                                                <td><?php echo $lst_d['monto_cierre'] ?></td>
                                                <td>
                                                    <?php
                                                    if ($lst_d['monto_real'] - $lst_d['monto_cierre'] > 0) {
                                                        echo $lst_d['monto_real'] - $lst_d['monto_cierre'];
                                                    } else {
                                                        echo "-";
                                                    }
                                                    // echo $lst_d[3] - $lst_d[4]
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($lst_d['monto_real'] - $lst_d['monto_cierre'] < 0) {
                                                        echo abs($lst_d['monto_real'] - $lst_d['monto_cierre']);
                                                    } else {
                                                        echo "-";
                                                    }
                                                    // echo $lst_d[3] - $lst_d[4]
                                                    ?>
                                                </td>

                                                <td><?php echo $lst_d['fecha_reg'] ?></td>
                                                <td>
                                                    <form method="POST" id="finalizar_caja">
                                                        <div class="row">

                                                            <div class="col-xl-11 col-lg-4 col-md-12 col-sm-12 col-12 d-flex align-content-center">
                                                                <?php
                                                                if ($lst_d['monto_real'] - $lst_d['monto_cierre'] > 0) {
                                                                ?>
                                                                    <input type="text" id="id_apert_diferencia" name="id_apert_diferencia" value="<?php echo $lst_d['id_apert'] ?>" hidden>
                                                                    <input type="text" id="id_usu_diferencia" name="id_usu_diferencia" value="<?php echo $lst_d['usu_caja'] ?>" hidden>
                                                                    <input type="number" class="form-select form-select-sm form-control form-control-sm" id="diferenc_m" name="diferenc_m" min="0" placeholder="Ingrese la diferencia">&nbsp&nbsp&nbsp
                                                                    <button class="btn btn-primary" id="btn_cierre_caja_diferencia" name="btn_cierre_caja_diferencia" type="submit">Validar</button>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <input type="text" id="id_apert_adicional" name="id_apert_adicional" value="<?php echo $lst_d['id_apert'] ?>" hidden>
                                                                    <input type="text" id="id_usu_adicional" name="id_usu_adicional" value="<?php echo $lst_d['usu_caja'] ?>" hidden>
                                                                    <input type="number" class="form-select form-select-sm form-control form-control-sm" id="adicional_m" name="adicional_m" min="0" value="<?php echo abs($lst_d[3] - $lst_d[4]) ?>" readonly>&nbsp&nbsp&nbsp
                                                                    <button class="btn btn-primary" id="btn_cierre_caja_adicional" name="btn_cierre_caja_adicional" type="submit">Validar</button>
                                                                <?php
                                                                }
                                                                ?>
                                                            </div>

                                                        </div>
                                                    </form>

                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>


                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end validation form -->
                <!-- ============================================================== -->
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

    </div>

    </div>
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->

    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="../assets/vendor/parsley/parsley.js"></script>

    <script src="../assets/resources/functions.js"></script>

    <script src="../assets/libs/js/main-js.js"></script>
    <script>
        $('#form').parsley();
    </script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>



</body>

</html>