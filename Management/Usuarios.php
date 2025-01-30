<?php
require_once('../Config/security.php');
require_once('../Controller/controller_selector.php');
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
        <?php include 'nav_header_bar.php'; ?>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <?php include 'lateral_bar_management.php'; ?>
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
                            <h3 class="card-header">Registro de Usuarios</h3>
                            <div class="card-body">
                                <form method="POST" id="save_users" class="needs-validation" novalidate>
                                    <div class="form-row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2 row">
                                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2 form-group">
                                                <label for="tipo_doc">Tipo Documento</label>
                                                <select class="form-control" id="tipo_doc" name="tipo_doc" onchange="changeValue(this);">
                                                    <option selected disabled>Seleccionar un tipo de documento</option>
                                                    <option value="DUI">1. DUI</option>
                                                    <option value="DNI">2. DNI</option>
                                                    <option value="Cedula">3. Cedula</option>
                                                    <option value="Licencia">4. Licencia</option>
                                                    <option value="Pasaporte">5. Pasaporte</option>
                                                    <option value="Otro">6. Otro</option>
                                                </select>
                                            </div>

                                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2 form-group">
                                                <label for="tipo_doc">Nro. Documento</label>
                                                <input type="text" class="form-control" id="cod_usu" name="cod_usu" placeholder="Ingrese el nro de documento" maxlength="20" required>
                                            </div>
                                        </div>


                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12  mb-2 row">
                                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12  mb-2 form-group">
                                                <label for="nom_usu">Nombres</label>
                                                <input type="text" class="form-control" id="nom_user_" name="nom_user_" placeholder="Ingrese los nombres del usuario" required>
                                                <div class="invalid-feedback">
                                                    Please choose a username.
                                                </div>
                                            </div>

                                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2 form-group">
                                                <label for="ape_usu">Apellidos</label>
                                                <input type="text" class="form-control" id="ape_usu" name="ape_usu" placeholder="Ingrese los apellidos del usuario" required>
                                            </div>
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2 row">
                                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2 form-group">
                                                <label for="tipo_area">Area:</label>
                                                <select class="form-control" id="tipo_area" name="tipo_area">
                                                    <option selected disabled>Seleccionar area</option>
                                                    <?php foreach ($listaAreas as $value) : ?>
                                                        <option value="<?php echo $value['id_area']; ?>"><?php echo $value['desc_area']; ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>

                                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2 form-group">
                                                <label for="ape_usu">Email ZOHO</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-at"></i></span>
                                                    </div>
                                                    <input type="email" class="form-control" id="email_usu" name="email_usu" placeholder="nombre@ejemplo.com.pe" required>
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="form-row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12  mb-2 row">
                                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2 form-group">
                                                <label for="validationCustomUsername">Usuario</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-user"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" id="usu_" name="usu_" placeholder="Cree un usuario" aria-describedby="inputGroupPrepend" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2 form-group">
                                                <label for="validationCustomUsername">Contraseña</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-lock"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" id="contra_" name="contra_" placeholder="Cree una contraseña" aria-describedby="inputGroupPrepend" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12  mb-2 row">
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2 form-group">
                                                <label>Escoga el rol que se le dará al usuario</label><br>
                                                <form action="">
                                                    <label class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="radio-inline" value="3" class="custom-control-input"><span class="custom-control-label">USUARIO</span>
                                                    </label>
                                                    <label class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="radio-inline" value="4" class="custom-control-input"><span class="custom-control-label">CAJA</span>
                                                    </label>
                                                    <label class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="radio-inline" value="5" class="custom-control-input"><span class="custom-control-label">CAJA LEGAL</span>
                                                    </label>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <button class="btn btn-primary" id="btnUsers_add" name="btnUsers_add" type="submit">Crear</button>
                                    </div>
                            </div>
                            </form>

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
        const opciones = document.getElementById("tipo_c_id");
        const elemento = document.getElementById("gasto");

        opciones.addEventListener("change", function() {
            if (opciones.value === "2") {
                elemento.style.opacity = 1;
                //elemento.style.display = 'block';
            } else if (opciones.value === "1") {
                elemento.style.opacity = 0;
                //elemento.style.display = 'none';
            }
        });


        function changeValue(dropdown) {
            var option = dropdown.options[dropdown.selectedIndex].value,
                field = document.getElementById('cod_usu');

            if (option == 'DUI') {
                document.getElementById('cod_usu').value = '';
                field.maxLength = 15;
            } else if (option == 'DNI') {
                document.getElementById('cod_usu').value = '';
                field.maxLength = 8;
            } else if (option == 'Cedula') {
                document.getElementById('cod_usu').value = '';
                field.maxLength = 9;
            } else if (option == 'Licencia') {
                document.getElementById('cod_usu').value = '';
                field.maxLength = 11;
            } else if (option == 'Pasaporte') {
                document.getElementById('cod_usu').value = '';
                field.maxLength = 15;
            } else if (option == 'Otro') {
                document.getElementById('cod_usu').value = '';
                field.maxLength = 20;
            }

        }
    </script>
</body>

</html>