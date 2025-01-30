<?php
require_once('../Config/security.php');
require_once('../Controller/controller_selector.php');
include_once('../Config/Conection.php');

$cnx = new conexion();
$cadena = $cnx->abrirConexion();


$monto_apert_0 = mssql_query("SELECT id_apert, monto_apert  FROM apertura_caja WHERE CONVERT(VARCHAR, fecha_reg, 112) = CONVERT(VARCHAR, GETDATE(), 112)", $cadena);

$monto_apert_ = mssql_query("SELECT COUNT(*) as count FROM apertura_caja WHERE CONVERT(VARCHAR, fecha_reg, 112) = CONVERT(VARCHAR, GETDATE(), 112)", $cadena);



$datos_ = mssql_fetch_object($monto_apert_0);

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
                            <h3 class="card-header">Registro de Caja</h3>
                            <div class="card-body">

                                <!--<div class="form-row">
                                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2 form-group">
                                        <label for="validationCustomUsername">Seleccione la asignacion:</label>
                                        <select class="form-control" id="id_asign_caja_" name="id_asign_caja_" onchange="showForm()">
                                            <option selected disabled>Selecciona</option>
                                            <?php foreach ($cboUsuariosCaja as $user_caja) : ?>
                                                <option value="<?php echo $user_caja[0]; ?>"><?php echo $user_caja[2] . ' ' . $user_caja[3]; ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div> -->
                                <div class="form-row">
                                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2 form-group">
                                        <label for="validationCustomUsername">Seleccione la asignacion:</label>
                                        <select class="form-control" id="id_asign_caja_" name="id_asign_caja_" onchange="showForm()">
                                            <option selected disabled>Selecciona</option>
                                            <?php foreach ($cboUsuariosCaja as $user_caja) : ?>
                                                <option value="<?php echo $user_caja['id_user']; ?>"><?php echo $user_caja['nom_resp'] . ' ' . $user_caja['ape_resp']; ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>



                                <!--Añadir montos-->
                                <form method="POST" id="updt_caja_r" name="updt_caja_r" style="display: none;">
                                    <label for="validationCustomUsername" hidden>Asignar apertura de caja:</label>
                                    <input type="text" name="usu_updt_aper" id="usu_updt_aper" value="<?php echo $_SESSION['id_cuenta']; ?>" hidden>
                                    <input type="text" name="apert_id" id="apert_id" hidden>

                                    <div class="">

                                        <div class="form-row">

                                            <div class="col-xl-2 col-lg-3 col-md-12 col-sm-12 col-12 mb-2">
                                                <br>
                                                <label for="validationCustomUsername">Añadir:</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroupPrepend">S/.</span>
                                                    </div>
                                                    <input type="text" id="monto_updt_" name="monto_updt_" class="form-control" placeholder="Ingrese adicional">
                                                </div>
                                                <br>
                                            </div>

                                            <div class="col-xl-5 col-lg-7 col-md-12 col-sm-12 col-12 mb-2" hidden>
                                                <br>
                                                <label for="validationCustomUsername">Detalle:</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroupPrepend">ABC</span>
                                                    </div>
                                                    <!-- <input type="text" class="form-control" id="desc_apert" name="desc_apert" placeholder="Ingrese el detalle"> -->
                                                    <textarea class="form-control" placeholder="Ingrese el detalle"></textarea>
                                                </div>
                                                <br>
                                            </div>

                                        </div>

                                        <div class="form-row">

                                            <div class="col-xl-2 col-lg-3 col-md-12 col-sm-12 col-12 mb-2">

                                                <br>
                                                <label for="validationCustomUsername">Monto Actual:</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroupPrepend">S/.</span>
                                                    </div>
                                                    <input type="text" class="form-control" id="monto_ape_updt" name="monto_ape_updt" aria-describedby="inputGroupPrepend" readonly>
                                                </div>
                                                <br>

                                            </div>
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            <br>
                                            <button class="btn btn-primary" id="btn_updt_aper" name="btn_updt_aper" type="submit">Añadir</button>
                                        </div>
                                    </div>

                                    <input class="form-control" type="text" id="_id_usu_caja_" name="_id_usu_caja_" hidden>
                                </form>
                                <!--Añadir montos-->

                                <!--Abrir caja con diferencia-->
                                <form method="POST" id="save_caj_r" style="display: none;">
                                    <input type="hidden" name="usu_reg_aper_" id="usu_reg_aper_" value="<?php echo $_SESSION['id_cuenta']; ?>"><!-- -- id de cuenta de jaime-->

                                    <div class="form-row">
                                        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 mb-2 form-group">
                                            <br>
                                            <label for="validationCustomUsername">Monto del Dia:</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroupPrepend">S/.</span>
                                                </div>
                                                <input type="text" class="form-control" id="monto_ape_" name="monto_ape_" placeholder="Ingrese el monto" aria-describedby="inputGroupPrepend" required>

                                            </div>

                                            <br>
                                            <div hidden>
                                                <label for="validationCustomUsername">Asignar apertura de caja:</label>
                                                <input class="form-control" type="text" id="id_usu_caja_" name="id_usu_caja_">
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2 form-group" hidden>
                                            <label for="validationCustomUsername">Seleccione el usuario de la caja:</label>
                                            <select class="form-control" id="id_cod_usu_caja_" name="id_cod_usu_caja_" onchange="getIdCaja()">
                                                <option selected disabled>Selecciona</option>
                                                <?php foreach ($cboUsuariosCaja as $user_caja) : ?>
                                                    <option value="<?php echo $user_caja[0]; ?>"><?php echo $user_caja[2] . ' ' . $user_caja[3]; ?></option>
                                                <?php endforeach ?>
                                            </select>



                                            <label for="validationCustomUsername">Diferencia:</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroupPrepend">S/.</span>
                                                </div>
                                                <input type="text" class="form-control" id="dife_c" name="dife_c" placeholder="Ingrese la diferencia" aria-describedby="inputGroupPrepend" onkeyup="enable_botton()">
                                            </div>

                                            <div class="input-group" hidden>
                                                <label for="validationCustomUsername">id_caja:</label>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroupPrepend">S/.</span>
                                                </div>
                                                <input type="text" class="form-control" name="id_caja_aperturada" id="id_caja_aperturada">
                                            </div>
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            <button class="btn btn-primary" id="btn_save_aper_" name="btn_save_aper_" type="submit">Crear</button>
                                        </div>
                                    </div>
                                </form>
                                <!--Abrir caja con diferencia-->

                                <!--Abrir caja con adicional -->
                                <form method="POST" id="caja_adic" name="caja_adic" style="display: none;">
                                    <div hidden>
                                        <input type="text" name="usu_reg_aper_ad" id="usu_reg_aper_ad" value="<?php echo $_SESSION['id_cuenta']; ?>">
                                        <input type="text" name="apert_id__" id="apert_id__">
                                    </div>

                                    <div class="form-row">

                                        <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-12 mb-2">

                                            <br>
                                            <label for="validationCustomUsername">Añadir:</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroupPrepend">S/.</span>
                                                </div>
                                                <input type="number" id="monto_updt_" name="monto_updt_" class="form-control monto_updt_" placeholder="Ingrese adicional">
                                            </div>
                                            <br>

                                            <label for="validationCustomUsername">Monto Actual:</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroupPrepend">S/.</span>
                                                </div>
                                                <input type="text" class="form-control" id="monto_ape_updt_" name="monto_ape_updt_" aria-describedby="inputGroupPrepend" readonly>
                                            </div>

                                        </div>

                                        <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-12 mb-2">

                                            <br>
                                            <label for="validationCustomUsername">Sobrante:</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroupPrepend">S/.</span>
                                                </div>
                                                <input type="number" id="monto_acu_" name="monto_acu_" class="form-control" readonly>
                                            </div>
                                            <br>
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            <br>
                                            <button class="btn btn-primary" id="btn_updt_adi" name="btn_updt_adi" type="submit">Añadir</button>
                                        </div>
                                    </div>

                                    <input class="form-control" type="text" id="id_usu_caja_ad" name="id_usu_caja_ad" hidden>
                                </form>
                                <!--Añadir caja con adicional -->
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


        <script type="text/javascript">
            function showForm() {
                var option = document.getElementById("id_asign_caja_").value;

                document.getElementById("_id_usu_caja_").value = option
                document.getElementById("id_usu_caja_").value = option
                document.getElementById("id_usu_caja_ad").value = option

                $.ajax({
                    type: "POST",
                    url: "../Controller/getMonto.php",
                    data: {
                        cod_usu: option
                    },
                    success: function(monto) {

                        //var montoArray = JSON.parse(monto);
                        console.log(monto);
                        // console.log(monto[0].monto_real);

                        if (monto !== null && monto.length > 0) {
                            document.getElementById("updt_caja_r").style.display = "block";
                            document.getElementById("save_caj_r").style.display = "none";

                            // Iterar sobre cada elemento del arreglo
                            for (var i = 0; i < monto.length; i++) {

                                var idApert = monto[i].id_apert;
                                var monto_ = monto[i].monto_;
                                var montoReal = monto[i].monto_real;
                                var adicional = monto[i].adicional;
                                var estadoC = monto[i].estado;


                                // Hacer algo con los valores obtenidos
                                // console.log("id_apert: " + idApert);
                                // console.log("monto_: " + monto_);
                                // console.log("monto_real: " + montoReal);
                                // console.log("adicional: " + adicional);
                                // console.log("estado actual: " + estadoC);

                                document.getElementById("monto_ape_updt").value = monto_;
                                document.getElementById("monto_acu_").value = adicional;
                                document.getElementById("apert_id").value = idApert;
                                document.getElementById("apert_id__").value = idApert;

                                if (estadoC == 'En curso') {
                                    alert("Este usuario tiene una caja en curso");
                                    document.getElementById("updt_caja_r").style.display = "block";
                                    document.getElementById("caja_adic").style.display = "none";
                                } else if (estadoC == 'Pendiente') {
                                    alert("Este usuario tiene un cierre pendiente. A la espera de confirmacion.");
                                    document.getElementById("updt_caja_r").style.display = "none";
                                    document.getElementById("caja_adic").style.display = "none";
                                } else {
                                    if (adicional > 0) {
                                        alert(`Este usuario tiene un monto acumulado de S/.${adicional}.`);
                                        document.getElementById("caja_adic").style.display = "block";
                                        document.getElementById("updt_caja_r").style.display = "none";
                                        document.getElementById("save_caj_r").style.display = "none";

                                        // --------------
                                        const montoUpd = document.querySelector(".monto_updt_");


                                        montoUpd.addEventListener('input', function() {


                                            const montoAcu = document.querySelector("#monto_acu_").value;
                                            const montoT = document.querySelector("#monto_ape_updt_");

                                            var valor = montoUpd.value;

                                            if (valor === null || valor === "") {
                                                valor = 0;
                                            }

                                            var varlorTotal = parseInt(valor) + parseInt(montoAcu);

                                            montoT.value = varlorTotal;
                                            document.getElementById("monto_ape_updt_").value = varlorTotal;


                                        });

                                    } else {
                                        document.getElementById("caja_adic").style.display = "none";
                                        document.getElementById("updt_caja_r").style.display = "none";
                                        document.getElementById("save_caj_r").style.display = "block";
                                    }

                                }
                            }


                        } else if (monto == 0) {
                            document.getElementById("caja_adic").style.display = "none";
                            document.getElementById("updt_caja_r").style.display = "none";
                            document.getElementById("save_caj_r").style.display = "block";
                            alert("Usuario sin caja aperturada.");
                            console.log("no data found");
                        }
                    }

                });
            }

            function getIdCaja() {
                var id_usu = document.getElementById("id_cod_usu_caja_").value;
                $.ajax({
                    type: "POST",
                    url: "../Controller/getCaja_id.php",
                    data: {
                        cod_usu_c: id_usu
                    },
                    success: function(data) {
                        var montoArray = JSON.parse(data);
                        var cod_caja_aprt = document.getElementById("id_caja_aperturada").value = montoArray;
                        console.log(montoArray);
                    }
                });
            }

            function enable_botton() {
                var inputValor = document.getElementById('dife_c').value;
                var boton = document.getElementById('btn_save_aper_');

                if (inputValor !== '') {
                    boton.disabled = false;
                } else {
                    boton.disabled = true;
                }
            }
        </script>

</body>

</html>