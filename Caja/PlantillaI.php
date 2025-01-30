<?php
require_once('../Config/security.php');
require_once('../Controller/controller_selector.php');
include_once('../Config/Conection.php');

$cnx = new conexion();
$conexion = $cnx->abrirConexion();

//$query = "SELECT id_apert, monto_apert  FROM apertura_caja WHERE DATE(fecha_reg) = CURDATE()";
//$query = "SELECT id_apert, monto_apert FROM apertura_caja WHERE CONVERT(VARCHAR, fecha_reg, 112) = CONVERT(VARCHAR, GETDATE(), 112)";

$monto_apert_ = mssql_query("SELECT id_apert, monto_apert FROM apertura_caja WHERE CONVERT(VARCHAR, fecha_reg, 112) = CONVERT(VARCHAR, GETDATE(), 112)", $conexion);

if ($monto_apert_ === false) {
    die("Error al ejecutar la consulta: " . mssql_get_last_message());
}

//$monto_apert_ = mysqli_query($cadena,"SELECT `id_apert`, `monto_apert`  FROM `apertura_caja` WHERE DATE(`fecha_reg`) = CURDATE()")or exit(mysql_error());

$datos_ = mssql_fetch_object($monto_apert_);


$monto_apert_1 = mssql_query("SELECT id_apert, monto_, monto_real, estado_caja  FROM apertura_caja WHERE usu_caja = '{$_SESSION['id_cuenta']}' and estado_caja = 'En curso' ORDER BY fecha_reg DESC", $conexion);

if ($monto_apert_1 === false) {
    die("Error al ejecutar la consulta: " . mssql_get_last_message());
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
    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
                    <!-- valifation types -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">





                        <div class="card">
                            <h5 class="card-header">Registro de Caja</h5>

                            <div class="card-body">

                                <form id="validationform" method="POST">

                                    <div class="col-md-6 m-auto">
                                        <input type="hidden" id="id_caja_admin" name="id_caja_admin" value="<?php echo $_SESSION['id_cuenta'] ?>">


                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Tipo de partida</label>

                                                <?php
                                                require_once('../Controller/controller_selector.php');
                                                ?>
                                                <select id="tipo_partida" name="tipo_partida" class="form-control">
                                                    <option selected disabled>PARTIDAS</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>Tipo de sub partida</label>

                                                <select id="tipo_subpartida" name="tipo_subpartida" class="form-control">
                                                    <option selected disabled>SUB PARTIDAS</option>
                                                    <!-- Este ComboBox se llenará dinámicamente con JavaScript -->
                                                </select>
                                            </div>
                                        </div>

                                        <div id="show-subsubpartida" class="form-row" style="display: none;">
                                            <div class="form-group col-md-6">
                                                <label>Tipo de sub partida</label>

                                                <select id="sub_subpartida" name="sub_subpartida" class="form-control">
                                                    <option selected disabled>SUB SUBPARTIDAS</option>
                                                    <!-- Este ComboBox se llenará dinámicamente con JavaScript -->
                                                </select>
                                            </div>
                                        </div>

                                        <div id="show-especif" class="form-row" style="display: none;">
                                            <div class="form-group col-md-12">
                                                <label>Especificar</label>

                                                <textarea id="especif" name="especif" class="form-control" placeholder="ESPECIFICAR"></textarea>
                                            </div>
                                        </div>

                                        <?php
                                        if (isset($_monto->id_apert)) {
                                        ?>
                                            <input type="hidden" name="cod_apert_c_" id="cod_apert_c_" value="<?php echo $_monto->id_apert; ?>">
                                        <?php
                                        } else {
                                            echo "";
                                        }
                                        ?>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Monto</label>

                                                <input id="monto_admin" name="monto_admin" type="number" required="" data-parsley-max="6" placeholder="MONTO S/." class="form-control">
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>Tipo de moneda</label>

                                                <select id="t_moneda" name="t_moneda" class="form-control">
                                                    <option selected disabled>TIPO MONEDA</option>
                                                    <option value="1">SOLES</option>
                                                    <option value="2">DOLARES</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label>Descripcion</label>
                                                <textarea id="obs_admin" name="obs_admin" class="form-control" placeholder="DESCRIPCIÓN"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label>Centro de Costos</label>
                                                <select id="centro_c_" name="centro_c_" class="form-control">
                                                    <option selected disabled>CENTRO DE COSTOS</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col col-sm-10 col-lg-9 m-auto pt-3 text-right">
                                        <button type="button" id="btn_add_ingr" name="btn_add_ingr" class="btn btn-space btn-primary">Registrar</button>
                                        <button type="reset" class="btn btn-space btn-secondary">Cancel</button>
                                    </div>

                                </form>


                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end valifation types -->
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
    <script src="../assets/resources/selection_ingresos.js"></script>
    <!-- <script src="../assets/resources/selection_ingresos_.js"></script> -->

    <script src="../assets/libs/js/main-js.js"></script>
    <!-- Select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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

    <script type="text/javascript">
        $(document).ready(function() {
            $('#select_2').select2();

            $('#select_2').on('change', function() {
                // Obtiene el valor seleccionado
                var selectedValue = $(this).val();

                $('#benef').val(selectedValue);
            });
        });
    </script>

</body>

</html>