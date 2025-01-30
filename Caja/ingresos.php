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
                        <h3>Monto Actual - <strong>S/.
                                <?php
                                $montoApertura = "";
                                if ($monto_apert_1 != null) {

                                    $_monto = mssql_fetch_object($monto_apert_1);

                                    if ($_monto !== null && $_monto !== 0 && $_SESSION['rol'] == 2) {
                                        $montoApertura = $_monto->monto_;

                                        if ($montoApertura === null) {
                                            echo "<script>
                                                  alert('El monto es igual a 0.');
                                                  var botonDeshabilitado = true;
                                                  </script>" . '0';
                                            echo $montoApertura;
                                ?>
                                            <script type="text/javascript">
                                                $(document).ready(function() {
                                                    $('#btnCaja_add').prop('disabled', true);
                                                });
                                            </script>

                                <?php
                                        } elseif ($_monto->estado_caja == 'Pendiente') {
                                            echo "<script>
                                                  alert('Tienes un monto retenido.');
                                                  var botonDeshabilitado = true;
                                                  </script>" . $montoApertura;
                                        } elseif ($_monto->estado_caja == 'Finalizado') {
                                            echo "<script>
                                                  alert('A la espera de la apertura de caja.');
                                                  var botonDeshabilitado = true;
                                                 </script>" . '0';
                                        } else {
                                            echo $montoApertura;
                                        }
                                    } elseif ($_SESSION['roles'] == 4 || $_SESSION['roles'] == 5) {
                                        echo "-";
                                    } else {
                                        echo "(A la espera de la apertura de caja.)";
                                    }


                                    /*if ($monto_->monto_real == 0) {
                                        echo "<script>alert('El monto es igual a 0');</script>";
                                    }*/
                                }
                                ?>

                            </strong></h3>

                        <div class="card">
                            <h5 class="card-header">Registro de Caja</h5>

                            <div class="card-body">


                                <form id="validationform" method="POST">

                                    <div class="col-md-6 m-auto">


                                        <input type="hidden" id="_usu_reg_id" name="_usu_reg_id" value="<?php echo $_SESSION['id_cuenta'] ?>">

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

                                        <div id="beneficiario" class="form-row" style="display: none;">
                                            <div class="form-group col-md-12">
                                                <label>Beneficiario</label>

                                                <select id="select_2" class="form-control">
                                                    <option value="-1" selected disabled>BENEFICIARIO</option>
                                                    <?php foreach ($listaAsignados as $value) : ?>
                                                        <option value="<?php echo $value['id_user']; ?>"><?php echo $value['nom_user'] ?></option>
                                                    <?php endforeach ?>
                                                </select>

                                                <input type="hidden" id="benef" name="benef">
                                            </div>

                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>ID Propiedad</label>

                                                <input id="propiedad" name="propiedad" type="text" required="" placeholder="ID PROPIEDAD" class="form-control">
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

                                                <input id="monto_" name="monto_" type="number" required="" min="0" data-parsley-max="6" placeholder="MONTO S/." class="form-control">
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>Tipo de moneda</label>

                                                <select id="t_moneda" name="t_moneda" class="form-control">
                                                    <option disabled>TIPO MONEDA</option>
                                                    <option value="1" selected>SOLES</option>
                                                    <option value="2">DOLARES</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Fecha</label>

                                                <input id="_fecha_" name="_fecha_" type="date" required="" data-parsley-max="6" class="form-control">
                                            </div>

                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label>Descripcion</label>

                                                <textarea id="obs_" name="obs_" class="form-control" placeholder="DESCRIPCIÓN"></textarea>
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

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label>Subir archivo</label>
                                                <div class="custom-file mb-3">
                                                    <!-- <input type="file" class="custom-file-input" id="customFile"> -->
                                                    <input type="file" id="customFile" name="customFile[]" multiple accept=".png, .jpg, .jpeg" hidden>
                                                    <label class="custom-label-file" for="customFile">
                                                        <span class="customFile_file form-control">
                                                            <span>Ningún archivo seleccionado</span>
                                                        </span>
                                                        <span class="customFile_button btn-primary">
                                                            <i class="fas fa-folder-open"></i>
                                                            Buscar archivos
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col col-sm-10 col-lg-9 m-auto pt-3 text-right">
                                        <button type="button" id="btnCaja_manual_add" name="btnCaja_manual_add" class="btn btn-space btn-primary">Registrar</button>
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
    <script src="../assets/resources/selection_types.js"></script>
    <script src="../assets/resources/selection_files.js"></script>

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
        /*const opciones = document.getElementById("tipo_c_id");
        const elemento = document.getElementById("gasto");

        opciones.addEventListener("change", function() {
          if (opciones.value === "2") {
            elemento.style.opacity = 1;
            //elemento.style.display = 'block';
          } else if (opciones.value === "1") {
            elemento.style.opacity = 0;
            //elemento.style.display = 'none';
          }
        });*/
        $(document).ready(function() {
            $('#select_2').select2();

            $('#select_2').on('change', function() {
                // Obtiene el valor seleccionado
                var selectedValue = $(this).val();

                $('#benef').val(selectedValue);
            });
        });
    </script>

    <script type="text/javascript">
        const opciones = document.getElementById("tipo_c_id");
        const elemento = document.getElementById("gasto");

        opciones.addEventListener("change", function() {

            if (opciones.value === "2") {
                elemento.style.opacity = 1;

                setTimeout(function() {
                    elemento.style.display = 'flex';
                    elemento.style.transition = "opacity 0.2s ease-out";
                }, 300);

            } else if (opciones.value === "1") {
                elemento.style.opacity = 0;
                setTimeout(function() {
                    elemento.style.display = 'none';
                }, 300);
            }
        });

        //elemento.style.transition = "opacity 0.2s ease-out";
    </script>

    <script>
        $(document).ready(function() {
            $(".auto-input").on("keyup", function() {
                var letra = $(this).val();
                var lstAsignados = $(".lista");

                if (letra.length > 0) {
                    $.ajax({
                        url: "../Controller/getAsignados.php",
                        method: "POST",
                        data: {
                            caracter: letra,
                        },
                        success: function(response) {
                            var asignado_ = JSON.parse(response);
                            // console.log(asignado_);

                            lstAsignados.empty();

                            // console.log(asignado_.length);
                            if (asignado_.length > 0) {
                                asignado_.forEach(function(user) {
                                    lstAsignados.append(
                                        '<li id="' + user.id_user + '">' + user.names_user + "</li>"
                                    );
                                    lstAsignados.addClass("visible");
                                });
                            } else {
                                // Si no se encontraron opciones, mostramos el mensaje en un <li> deshabilitado
                                lstAsignados.append(
                                    '<li class="disabled-li">No se encontraro asignado.</li>'
                                );
                                lstAsignados.addClass("visible");
                            }

                            lstAsignados.find("li").click(function() {
                                var texto = $(this).text();
                                var id = $(this).attr("id");
                                console.log(texto);
                                console.log(id);
                                $("#asign_").val(id);

                                $(".auto-input").val(texto);

                                lstAsignados.empty(); // Vaciamos la lista después de seleccionar
                                lstAsignados.removeClass("visible");
                            });
                        },
                    });
                } else {
                    lstAsignados.empty();
                    lstAsignados.removeClass("visible");
                }
            });
        });
    </script>
</body>

</html>