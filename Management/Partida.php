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

    <!-- Font Awesome -->
    <link rel="stylesheet" href="../Vista/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer">


    <link rel="stylesheet" href="../assets/vendor/multi-select/css/multi-select.css">



    <style>
        .card {
            margin-bottom: 0px !important;
        }
    </style>
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

                <!-- <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h3 class="card-header">Registro de Partidas</h3>
                            <div class="card-body">
                                <form method="POST">
                                    <div class="form-row">


                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12  mb-2 row">
                                            <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12  mb-2 form-group">
                                                <label for="nom_usu">Nueva partida</label>
                                                <input type="text" class="form-control" id="nomPart" name="nomPart" placeholder="Ingrese la nueva partida" required>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    </div>

                                    <div class="form-group row text-left">
                                        <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                            <button class="btn btn-primary" id="btnPartida_add" name="btnPartida_add" type="submit">Crear</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div> -->

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-5">
                    <div class="section-block">
                        <h5 class="section-title">Registro</h5>
                        <p>Modulo que permite poder crear <b>Partidas</b> y <b>Sub Partidas</b> y sus respectivas <b>Relaciones</b>.</p>
                    </div>
                    <div class="tab-vertical">
                        <ul class="nav nav-tabs" id="myTab3" role="tablist">
                            <!-- <li class="nav-item">
                                <a class="nav-link active" id="partida-vertical-tab" data-toggle="tab" href="#partida-vertical" role="tab" aria-controls="partida" aria-selected="true">PARTIDAS</a>
                            </li> -->
                            <li class="nav-item">
                                <a class="nav-link active" id="creations-vertical-tab" data-toggle="tab" href="#creations-vertical" role="tab" aria-controls="creations" aria-selected="false">RELACIONES</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="relations-vertical-tab" data-toggle="tab" href="#relations-vertical" role="tab" aria-controls="relations" aria-selected="false">CENTRO DE COSTOS</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent3">
                            <!-- <div class="tab-pane fade show active" id="partida-vertical" role="tabpanel" aria-labelledby="partida-vertical-tab">
                                <h3>Registro de Partidas</h3>
                                <form method="POST">
                                    <div class="form-row">

                                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12  mb-2 row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12  mb-2 form-group">
                                                <label for="nom_usu">Nueva partida</label>
                                                <input type="text" class="form-control" id="nomPart" name="nomPart" placeholder="Ingrese la nueva partida" required>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group row text-right">
                                        <div class="col col-sm-10 col-lg-12 offset-sm-1 offset-lg-0">
                                            <button class="btn btn-primary" id="btnPartida_add" name="btnPartida_add" type="submit">Crear</button>
                                        </div>
                                    </div>
                                </form>
                            </div> -->
                            <div class="tab-pane fade show active" id="creations-vertical" role="tabpanel" aria-labelledby="creations-vertical-tab">
                                <h3>Formulario de Partidas y Sub Partidas</h3>
                                <!-- <form method="POST"> -->

                                <div class="form-row">

                                    <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12 mb-4 p-0">

                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                                            <div class="accrodion-regular">
                                                <div id="accordion">
                                                    <div class="accrodion-header">
                                                        <div class="card">
                                                            <div class="card-header" id="headingOne">
                                                                <h5 class="mb-0">
                                                                    <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsePartida" aria-expanded="false" aria-controls="collapsePartida">CREAR PARTIDA</button>
                                                                </h5>
                                                            </div>

                                                        </div>
                                                        <div class="card">
                                                            <div class="card-header" id="headingTwo">
                                                                <h5 class="mb-0">
                                                                    <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSubPartida" aria-expanded="false" aria-controls="collapseSubPartida">CREAR SUB PARTIDA</button>
                                                                </h5>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div id="collapsePartida" class="collapse" aria-labelledby="createPartida" data-parent="#accordion" style="">

                                                        <div class="col-xl-6 col-lg-12 col-md-6 col-sm-12 col-12 mb-1 mt-3 p-0">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <label for="nom_subpart">Nueva partida</label>
                                                                    <div class="input-group mb-3">
                                                                        <input type="text" class="form-control" id="nomPart" name="nomPart" placeholder="Ingrese la nueva partida">

                                                                        <div class="input-group-append">
                                                                            <button class="btn btn-primary" id="btnPartida_add" name="btnPartida_add" type="submit">Crear</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div id="collapseSubPartida" class="collapse" aria-labelledby="createPartida" data-parent="#accordion" style="">

                                                        <div class="col-xl-6 col-lg-12 col-md-6 col-sm-12 col-12 mb-1 mt-3 p-0">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <label for="nom_subpart">Nueva sub partida</label>
                                                                    <div class="input-group mb-3">
                                                                        <input type="text" class="form-control" id="nom_subpart" name="nom_subpart" placeholder="Ingrese la nueva sub partida">
                                                                        <div class="input-group-append">
                                                                            <button type="button" class="btn btn-primary" id="add_subpart" name="add_subpart">Añadir</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- ============================================================== -->
                                    <!-- keep over multiselectd  -->
                                    <!-- ============================================================== -->
                                    <!-- <div class="col-xl-10 col-lg-12 col-md-6 col-sm-12 col-12 mb-4 p-0 m-auto">
                                        <div class="col-xl-6 col-lg-12 col-md-6 col-sm-12 col-12 mb-4 p-0">
                                            <div class="card">
                                                <div class="card-body">
                                                    <label for="tipo_partida">Escoja Partida</label>
                                                    <div class="col-12 col-sm-8 col-lg-12 p-0">
                                                        <div style="width: 100%">

                                                            <div class="input-group mb-3">
                                                                <input type="text" class="form-control" id="nom_subpart" name="nom_subpart" placeholder="Ingrese la nueva sub partida"> -
                                                                <select id="tipo_partida" name="tipo_partida" class="form-control form-control-lg">
                                                                    <option value="-1" selected>PARTIDA</option>
                                                                    <?php foreach ($listaPartidas as $value) : ?>
                                                                        <option value="<?php echo $value[0]; ?>"><?php echo $value[1]; ?></option>
                                                                    <?php endforeach ?>
                                                                </select>
                                                                <!-- <div class="input-group-append">
                                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#part_add">Añadir</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->

                                    <div class="col-xl-10 col-lg-12 col-md-6 col-sm-12 col-12 mb-4 p-0 m-auto">
                                        <div class="card">
                                            <div class="card-body">
                                                <label for="tipo_partida">Escoja Partida</label>
                                                <div class="col-6 col-sm-8 col-lg-6 p-0 mb-4">
                                                    <div style="width: 100%">

                                                        <div class="input-group mb-3">
                                                            <!-- <input type="text" class="form-control" id="nom_subpart" name="nom_subpart" placeholder="Ingrese la nueva sub partida"> -->
                                                            <select id="tipo_partida" name="tipo_partida" class="form-control form-control-lg">
                                                                <option value="-1" selected>PARTIDA</option>
                                                                <?php foreach ($listaPartidas as $value) : ?>
                                                                    <option value="<?php echo $value['id_partida']; ?>"><?php echo $value['desc_partida']; ?></option>
                                                                <?php endforeach ?>
                                                            </select>
                                                            <!-- <div class="input-group-append">
                                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#part_add">Añadir</button>
                                                                </div> -->
                                                        </div>
                                                    </div>
                                                </div>

                                                <label for="">Escoja Sub Partida</label>
                                                <div class="form-group row d-flex justify-content-center">
                                                    <div class="col col-sm-10 col-lg-10 offset-sm-1 offset-lg-0">
                                                        <button type="button" class="btn btn-primary" id="refresh" title="Refrescar lista"><i class="fa-solid fa-arrows-rotate"></i></button>
                                                        <button type="button" class="btn btn-danger" id="deselect-all" title="Limpiar lista"><i class="fa-solid fa-trash-can"></i></button>
                                                    </div>
                                                </div>

                                                <select id='public-methods' multiple='multiple'>
                                                    <?php foreach ($listaSubPartidas as $value) : ?>
                                                        <option value="<?php echo $value['id_sub_partida']; ?>"><?php echo $value['desc_sub_partida']; ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ============================================================== -->
                                    <!-- end keep over multiselectd  -->
                                    <!-- ============================================================== -->

                                </div>
                                <div class="form-group row text-right">
                                    <div class="col col-sm-10 col-lg-12 offset-sm-1 offset-lg-0">
                                        <button class="btn btn-primary" id="btn_SubPartida_add" name="btn_SubPartida_add" type="button">Crear</button>
                                    </div>
                                </div>

                                <!-- </form> -->
                            </div>
                            <div class="tab-pane fade" id="relations-vertical" role="tabpanel" aria-labelledby="relations-vertical-tab">
                                <h3>Formulario de Centro de costos</h3>
                                <form action="">
                                    <div class="form-row">
                                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12 col-12 mb-2 p-0">
                                            <div class="form-row group-form">
                                                <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12  mb-2 row">
                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12  mb-2 form-group">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <label for="part">Escoja Partida</label>
                                                                <div class="col-12 col-sm-8 col-lg-12 p-0">
                                                                    <div style="width: 100%">
                                                                        <select id="_part" name="_part" class="form-control">
                                                                            <option value="-1" selected>PARTIDA</option>
                                                                            <!-- <?php foreach ($listaPartidas as $value) : ?>
                                                                                <option value="<?php echo $value[0]; ?>"><?php echo $value[1]; ?></option>
                                                                            <?php endforeach ?> -->
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>

                                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12 col-12 mb-4 p-0">
                                            <div class="card">
                                                <div class="card-body">
                                                    <?php
                                                    // $multiListSubPartidas = $oPartida->MultiList_Sub_Partidas($cod);
                                                    ?>
                                                    <div class="form-row group-form">
                                                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 row">
                                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12  mb-2 form-group">
                                                                <label for="">Escoja Sub Partida</label>
                                                                <select id="public-methods-sp" name="public-methods-sp" multiple='multiple'>
                                                                    <?php foreach ($listaSubPartidas as $value) : ?>
                                                                        <option value="<?php echo $value['id_sub_partida']; ?>"><?php echo $value['desc_sub_partida'] ?></option>
                                                                    <?php endforeach ?>
                                                                </select>
                                                            </div>

                                                        </div>
                                                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 row">
                                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12  mb-2 form-group">
                                                                <label for="">Escoja los Centros de costo</label>
                                                                <select id='public-methods_' multiple='multiple'>
                                                                    <?php foreach ($cboRespon_ as $value) : ?>
                                                                        <option value="<?php echo $value[0]; ?>"><?php echo $value[1] ?></option>
                                                                    <?php endforeach ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>



                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12 col-12 mb-2 p-0">
                                            <div class="form-row group-form">
                                                <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12  mb-2 row">
                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2 form-group">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <label>Escoja el rol que se le dará al usuario</label><br>
                                                                <form action="">
                                                                    <!-- <label class="custom-control custom-radio custom-control-inline">
                                                                        <input type="radio" name="radio-inline" value="2" class="custom-control-input"><span class="custom-control-label">ADMINISTRADOR</span>
                                                                    </label> -->
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
                                                </div>
                                                <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12  mb-2 row">
                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2 form-group">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <label>Beneficiario</label><br>
                                                                <form action="">
                                                                    <label class="custom-control custom-radio custom-control-inline">
                                                                        <input type="radio" name="radio-inline-benf" value="1" class="custom-control-input"><span class="custom-control-label">SI</span>
                                                                    </label>
                                                                    <label class="custom-control custom-radio custom-control-inline">
                                                                        <input type="radio" name="radio-inline-benf" value="0" class="custom-control-input"><span class="custom-control-label">NO</span>
                                                                    </label>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row text-right">
                                        <div class="col col-sm-10 col-lg-12 offset-sm-1 offset-lg-0">
                                            <button class="btn btn-primary" id="btn_relations_add" name="btn_relations_add" type="button">Crear</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
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
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- <div class="modal fade" id="part_add" name="part_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Crear Partida nueva</h4>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </a>
                </div>

                <div class="modal-body">

                    <form method="POST">
                        <div class="form-group">
                            <label for="desc_partida" class="col-form-label"><strong>Nueva Partida</strong></label>
                            <input type="text" class="form-control" id="nomPart" name="nomPart" placeholder="Ingrese la nueva partida">
                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-primary" id="btnPartida_add" name="btnPartida_add" type="button">Crear</button>
                            <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div> -->
    <!-- Optional JavaScript -->

    <script src="../assets/resources/functions.js"></script>
    <script src="../assets/resources/selection_relations.js"></script>
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="../assets/vendor/multi-select/js/jquery.multi-select.js"></script>
    <script src="../assets/libs/js/main-js.js"></script>
    <script src="../assets/resources/quicksearch.js" type="text/javascript"></script>




    <!-- <script>
        $('#my-select, #pre-selected-options').multiSelect()
    </script> -->
    <!-- <script>
        $('#callbacks').multiSelect({
            afterSelect: function(values) {
                alert("Select value: " + values);
            },
            afterDeselect: function(values) {
                alert("Deselect value: " + values);
            }
        });
    </script> -->
    <script>
        // $('#public-methods').multiSelect({
        //     keepOrder: true
        // });
        $('#public-methods_').multiSelect({
            keepOrder: true
        });
    </script>
    <script>
        $("#add_subpart").click(function() {
            var _data = {
                add_subpart: true,
                sub_partida: $("#nom_subpart").val().toUpperCase(),
            };

            $.ajax({
                type: "POST",
                url: "../Controller/Add_Partida.php",
                data: _data,
                success: function(r) {
                    if (r == 1) {
                        alert("Agregado correctamente");
                        $("#nom_subpart").val("");
                    } else {
                        alert("Error al registrar, Verifique que los campos estén correctamente completos.");
                    }
                },
            });

            return false;
        });

        $(document).ready(function() {
            $("#refresh").click(function() {
                // Realizar una solicitud AJAX para obtener los nuevos datos del cbo

                $.ajax({
                    type: "GET",
                    url: "../Controller/getSubPartida.php", // Script PHP para obtener datos del cbo
                    // dataType: 'json',
                    success: function(response) {
                        const sub_partida = JSON.parse(response);
                        //console.log(sub_partida);

                        for (var i = 0; i < sub_partida.length; i++) {
                            var listItem = document.createElement("option");
                            listItem.value = sub_partida[i].id;
                            listItem.textContent = sub_partida[i].desc;
                            document.getElementById("public-methods").appendChild(listItem);
                        }

                        // Destruir el plugin MultiSelect.js (si ya está inicializado)
                        $("#public-methods").multiSelect("destroy");

                        // Volver a inicializar el plugin MultiSelect.js
                        $('#public-methods').multiSelect({
                            selectableHeader: "<input type='text' class='form-control form-control-lg mb-3' autocomplete='off' placeholder=Buscar en lista>",
                            selectionHeader: "<input type='text' class='form-control form-control-lg mb-3' autocomplete='off' placeholder=Buscar en lista>",
                            afterInit: function(ms) {
                                var that = this,
                                    $selectableSearch = that.$selectableUl.prev(),
                                    $selectionSearch = that.$selectionUl.prev(),
                                    selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',
                                    selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';

                                that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                                    .on('keydown', function(e) {
                                        if (e.which === 40) {
                                            that.$selectableUl.focus();
                                            return false;
                                        }
                                    });

                                that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                                    .on('keydown', function(e) {
                                        if (e.which == 40) {
                                            that.$selectionUl.focus();
                                            return false;
                                        }
                                    });
                            },
                            afterSelect: function() {
                                this.qs1.cache();
                                this.qs2.cache();
                            },
                            afterDeselect: function() {
                                this.qs1.cache();
                                this.qs2.cache();
                            }
                        });
                    },
                });
            });
            // $("#deselect_all").click(function() {
            //     console.log("clean");

            //     $.ajax({
            //         type: "GET",
            //         url: "../Controller/getData.php", // Script PHP para obtener datos del cbo
            //         // dataType: 'json',
            //         success: function(response) {
            //             const sub_partida = JSON.parse(response);
            //             // console.log(sub_partida);

            //             var bla = document.querySelector(".ms-selectable");
            //             var balbla = bla.querySelector(".ms-list");


            //             // $('#deselect-all').click(function() {
            //             //     $('#public-methods').multiSelect('deselect_all');
            //             //     return false;
            //             // });
            //         },
            //     });
            // });
        });
    </script>

    <script>
        // $('#public-methods').multiSelect();
        // $('#select-all').click(function() {
        //     $('#public-methods').multiSelect('select_all');
        //     return false;
        // });
        $('#deselect-all').click(function() {
            $('#public-methods').multiSelect('deselect_all');
            return false;
        });
        // $('#select-100').click(function() {
        //     $('#public-methods').multiSelect('select', ['elem_0', 'elem_1'..., 'elem_99']);
        //     return false;
        // });
        // $('#deselect-100').click(function() {
        //     $('#public-methods').multiSelect('deselect', ['elem_0', 'elem_1'..., 'elem_99']);
        //     return false;
        // });
        // $('#refresh').on('click', function() {
        //     $('#public-methods').multiSelect('refresh');
        //     return false;
        // });
        // $('#add-option').on('click', function() {
        //     $('#public-methods').multiSelect('addOption', {
        //         value: 42,
        //         text: 'test 42',
        //         index: 0
        //     });
        //     return false;
        // });
        // $('#public-methods').multiSelect({
        //     selectableHeader: "<input type='text' class='search-input' autocomplete='off' placeholder='Buscar...'>",
        //     selectionHeader: "<input type='text' class='search-input' autocomplete='off' placeholder='Buscar...'>",
        // });
    </script>
    <!-- <script>
        $('#optgroup').multiSelect({
            selectableOptgroup: true
        });
    </script> -->
    <!-- <script>
        $('#disabled-attribute').multiSelect();
    </script> -->
    <!-- <script>
        $('#custom-headers').multiSelect({
            selectableHeader: "<div class='custom-header'>Selectable items</div>",
            selectionHeader: "<div class='custom-header'>Selection items</div>",
            selectableFooter: "<div class='custom-header'>Selectable footer</div>",
            selectionFooter: "<div class='custom-header'>Selection footer</div>"
        });
    </script> -->


    <script>
        $('#public-methods').multiSelect({
            selectableHeader: "<input type='text' class='form-control form-control-lg mb-3' autocomplete='off' placeholder=Buscar en lista>",
            selectionHeader: "<input type='text' class='form-control form-control-lg mb-3' autocomplete='off' placeholder=Buscar en lista>",
            afterInit: function(ms) {
                var that = this,
                    $selectableSearch = that.$selectableUl.prev(),
                    $selectionSearch = that.$selectionUl.prev(),
                    selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',
                    selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';

                that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                    .on('keydown', function(e) {
                        if (e.which === 40) {
                            that.$selectableUl.focus();
                            return false;
                        }
                    });

                that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                    .on('keydown', function(e) {
                        if (e.which == 40) {
                            that.$selectionUl.focus();
                            return false;
                        }
                    });
            },
            afterSelect: function() {
                this.qs1.cache();
                this.qs2.cache();
            },
            afterDeselect: function() {
                this.qs1.cache();
                this.qs2.cache();
            }
        });

        // $('#public-methods-sp').multiSelect({
        //     selectableHeader: "<input type='text' class='form-control form-control-lg mb-3' autocomplete='off' placeholder=Buscar en lista>",
        //     selectionHeader: "<input type='text' class='form-control form-control-lg mb-3' autocomplete='off' placeholder=Buscar en lista>",
        //     afterInit: function(ms) {
        //         var that = this,
        //             $selectableSearch = that.$selectableUl.prev(),
        //             $selectionSearch = that.$selectionUl.prev(),
        //             selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',
        //             selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';

        //         that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
        //             .on('keydown', function(e) {
        //                 if (e.which === 40) {
        //                     that.$selectableUl.focus();
        //                     return false;
        //                 }
        //             });

        //         that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
        //             .on('keydown', function(e) {
        //                 if (e.which == 40) {
        //                     that.$selectionUl.focus();
        //                     return false;
        //                 }
        //             });
        //     },
        //     afterSelect: function() {
        //         this.qs1.cache();
        //         this.qs2.cache();
        //     },
        //     afterDeselect: function() {
        //         this.qs1.cache();
        //         this.qs2.cache();
        //     }
        // });

        $('#public-methods-sp').multiSelect({
            keepOrder: true
        });
    </script>
    <script>
        $(document).ready(function() {
            // Manejar el cambio en el cuadro combinado
            $('#_part').on('change', function() {
                // Obtener el valor seleccionado
                var selectedValue = $(this).val();
                // console.log(selectedValue);

                // Realizar una solicitud AJAX para enviar el valor al servidor
                $.ajax({
                    type: 'POST',
                    url: '../Controller/select_.php',
                    data: {
                        cod_tipo: selectedValue
                    },
                    success: function(response) {
                        try {
                            // Limpiar opciones existentes antes de agregar nuevas
                            $('#public-methods-sp').empty();

                            const subtipos = JSON.parse(response);
                            let template = '';

                            for (var i = 0; i < subtipos.length; i++) {
                                var listItem = document.createElement("option");
                                listItem.value = subtipos[i].id_sub;
                                listItem.textContent = subtipos[i].desc_sub;
                                document.getElementById("public-methods-sp").appendChild(listItem);
                            }

                            // $('#public-methods-sp').append(template);

                            // Destruir e inicializar el plugin solo si hay opciones nuevas
                            if (subtipos.length > 0) {
                                $('#public-methods-sp').multiSelect("destroy");

                                $('#public-methods-sp').multiSelect({
                                    keepOrder: true
                                });
                            }
                        } catch (error) {
                            console.error('Error al analizar la respuesta JSON:', error);
                        }
                    },
                    error: function(error) {
                        console.error('Error en la solicitud AJAX:', error);
                    }
                });
            });
        });
    </script>

</body>

</html>