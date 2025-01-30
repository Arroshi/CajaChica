<?php
require_once('../Config/security.php');
require_once('../Controller/controller_selector.php');
include_once('../Config/Conection.php');

$cnx = new conexion();
$cadena = $cnx->abrirConexion();


//$monto_apert_0 = mysqli_query($cadena,"SELECT `id_apert`, `monto_apert`  FROM `apertura_caja` WHERE DATE(`fecha_reg`) = CURDATE()")or exit(mysql_error());

//$monto_apert_ = mysqli_query($cadena,"SELECT COUNT(*) as count FROM apertura_caja WHERE DATE(`fecha_reg`) = CURDATE()")or exit(mysql_error());

//$datos_ = mysqli_fetch_object($monto_apert_0);

$self_monto_ = mssql_query("SELECT TOP 1 *  FROM apertura_caja WHERE usu_caja = {$_SESSION['id_cuenta']} and estado_caja = 'En curso' ORDER BY fecha_reg DESC;", $cadena);

if ($self_monto_ != null) {
    $monto_ = mssql_fetch_object($self_monto_);
    if ($monto_ != null /*&& $_SESSION['rol'] == 2*/) {
        $montoCierre = $monto_->monto_real;
        //echo $montoCierre;
    } else {
        echo "<script>alert('Aun no tienes una apertura de caja.');</script>
             <META http-equiv='Refresh' content = '0.2; URL = ../Caja/Dashboard.php'>;";
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
                            <h3 class="card-header">Cierre de Caja</h3>
                            <div class="card-body">

                                <form method="POST" id="updt_caja_cierre">
                                    <div hidden>
                                        <input name="id_apert_c" id="id_apert_c" value="<?php echo $monto_->id_apert; ?>">
                                        <input name="id_usu" id="id_usu" value="<?php echo $_SESSION['id_cuenta']; ?>">
                                    </div>
                                    <div class="form-row">
                                        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 mb-3 form-group">
                                            <label for="validationCustomUsername">Monto del sistema:</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroupPrepend">S/.</span>
                                                </div>

                                                <input type="number" name="monto_real" id="monto_real" min="0" class="form-control" value="<?php echo $monto_->monto_; ?>" readonly>
                                            </div>
                                            <br>
                                        </div>
                                        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 mb-3 form-group">
                                            <label for="validationCustomUsername">Monto Cierre:</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroupPrepend">S/.</span>
                                                </div>

                                                <input type="number" name="monto_cierre" id="monto_cierre" min="0" class="form-control" placeholder="Ingrese monto a cerrar" value="">
                                            </div>
                                            <br>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            <button class="btn btn-primary" id="btn_cierre_u" name="btn_cierre_u" type="submit">Cerrar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end validation form -->
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