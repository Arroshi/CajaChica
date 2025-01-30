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
                            <h3 class="card-header">Registro de Asignados</h3>
                            <div class="card-body">
                                <form method="POST" id="save_asign">
                                    <div class="form-row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2 row">
                                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2 form-group">
                                                <label for="tipo_doc">Tipo Documento</label>
                                                <select class="form-control form-control-lg" id="tipo_doc" name="tipo_doc" onchange="changeValue(this);">
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
                                                <label for="cod_asign_">Nro. Documento</label>
                                                <input type="text" class="form-control form-control-lg" id="cod_asign_" name="cod_asign_" placeholder="Ingrese el nro de documento" maxlength="20" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2 row">
                                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 form-group">
                                                <label for="nom_asign_">Nombres</label>
                                                <input type="text" class="form-control form-control-lg" id="nom_asign_" name="nom_asign_" placeholder="Ingrese los nombres del trabajador" required>
                                            </div>

                                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 form-group">
                                                <label for="ape_asign_">Apellidos</label>
                                                <input type="text" class="form-control form-control-lg" id="ape_asign_" name="ape_asign_" placeholder="Ingrese los apellidos del trabajador" required>
                                            </div>
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2 row">
                                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 form-group">
                                                <label for="nom_asign_">Categoria</label>
                                                <select id="tipo_g_id_" name="tipo_g_id_" class="form-control form-control-lg">
                                                    <option value="">Elije el tipo gasto</option>
                                                    <?php foreach ($listaAreas as $value) : ?>
                                                        <option value="<?php echo $value['id_area']; ?>"><?php echo $value['desc_area']; ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>


                                        <!-- <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-12 mb-2 form-group">
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="autorizado_" name="autorizado_">
                                                    <label class="form-check-label" for="autorizado_">
                                                        Autorizado
                                                    </label>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>

                                    <div class="form-row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            <button class="btn btn-primary" id="btnAsign_add" name="btnAsign_add" type="submit">Crear</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end validation form -->
                    <!-- ============================================================== -->
                </div>
                <!-- ============================================================== -->
                <!-- footer -->
                <!-- ============================================================== -->
                <div class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                Victor Arroyo Copyright © 2023.
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
                field = document.getElementById('cod_asign_');

            if (option == 'DUI') {
                document.getElementById('cod_asign_').value = '';
                field.maxLength = 15;
            } else if (option == 'DNI') {
                document.getElementById('cod_asign_').value = '';
                field.maxLength = 8;
            } else if (option == 'Cedula') {
                document.getElementById('cod_asign_').value = '';
                field.maxLength = 9;
            } else if (option == 'Licencia') {
                document.getElementById('cod_asign_').value = '';
                field.maxLength = 11;
            } else if (option == 'Pasaporte') {
                document.getElementById('cod_asign_').value = '';
                field.maxLength = 15;
            } else if (option == 'Otro') {
                document.getElementById('cod_asign_').value = '';
                field.maxLength = 20;
            }

        }
    </script>
</body>

</html>