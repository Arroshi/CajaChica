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
    <!-- Data Tables Pluggin -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap4.min.css">
    <!--  -->
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
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                        <div class="page-header">
                            <h2 class="pageheader-title">Gestión</h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <!-- <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="../" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="ingreso.php" class="breadcrumb-link">Gestion</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Listado Total</li>
                                    </ol>
                                </nav>
                            </div> -->
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->


                <!-- <div class="row"> -->
                <!-- ============================================================== -->
                <!-- hoverable table -->
                <!-- ============================================================== -->

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-5">

                    <div class="pills-regular">
                        <ul class="nav nav-pills mb-1" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active show" id="profile-tab-p" data-toggle="pill" href="#pills-home" role="tab" aria-controls="home" aria-selected="false">PARTIDAS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab-sp" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="profile" aria-selected="false">SUB PARTIDAS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="contact" aria-selected="true">Tab#3</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade active show" id="pills-home" role="tabpanel" aria-labelledby="profile-tab-p">
                                <div class="card">
                                    <div class="card-body">
                                        <table id="table_" class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Partida</th>
                                                    <th scope="col">Estado</th>
                                                    <th scope="col">-</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php foreach ($listaPartidas as $value) : ?>
                                                    <tr>
                                                        <td scope="row"><?php echo $value['id_partida'] ?></td>
                                                        <td><?php echo $value['desc_partida'] ?></td>
                                                        <td>
                                                            <?php if ($value['status'] == 1) {
                                                                echo 'Activo';
                                                            } else {
                                                                echo 'No activo';
                                                            } ?>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-rounded btn-primary editP" data-toggle="modal" data-target="#exampleModal">Editar</button>

                                                            <button class="btn btn-rounded btn-danger dltP">Eliminar</button>
                                                        </td>
                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="profile-tab-sp">
                                <div class="card">
                                    <div class="card-body">
                                        <table id="table_" class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Sub Partida</th>
                                                    <th scope="col">Estado</th>
                                                    <th scope="col">-</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php foreach ($listaSubPartidas as $value) : ?>
                                                    <tr>
                                                        <td scope="row"><?php echo $value['id_sub_partida'] ?></td>
                                                        <td><?php echo $value['desc_sub_partida'] ?></td>
                                                        <td>
                                                            <?php if ($value['status'] == 1) {
                                                                echo 'Activo';
                                                            } else {
                                                                echo 'No activo';
                                                            } ?>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-rounded btn-primary editSP">Editar</button>
                                                            <!-- </td>
                                                <td> -->
                                                            <button class="btn btn-rounded btn-danger dltSP">Eliminar</button>
                                                        </td>
                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <h5>Proximamente...</h5>
                                        <!-- <table id="table_" class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Partida</th>
                                                    <th scope="col">Estado</th>
                                                    <th scope="col">-</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php foreach ($listaPartidas as $value) : ?>
                                                    <tr>
                                                        <td scope="row"><?php echo $value[0] ?></td>
                                                        <td><?php echo $value[1] ?></td>
                                                        <td>
                                                            <?php if ($value[2] == 1) {
                                                                echo 'Activo';
                                                            } else {
                                                                echo 'No activo';
                                                            } ?>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-rounded btn-primary editbtn" data-toggle="modal" data-target="#exampleModal">Editar</button>

                                                            <button class="btn btn-rounded btn-danger dltcate_btn">Eliminar</button>
                                                        </td>
                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end hoverable table -->
                <!-- ============================================================== -->
                <!-- </div> -->
                <!-- ============================================================== -->
                <!-- footer -->
                <!-- ============================================================== -->
                <div class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                Copyright © 2023
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end footer -->
                <!-- ============================================================== -->

                <!-- Modal update -->
                <div class="modal fade" id="editP" name="editP" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel">Editar Partida</h4>
                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </a>
                            </div>

                            <div class="modal-body">

                                <form method="POST">
                                    <input type="text" id="id_partida" name="id_partida" hidden>

                                    <div class="form-group">
                                        <label for="desc_partida" class="col-form-label"><strong>Partida</strong></label>
                                        <input type="text" id="desc_partida" name="desc_partida" class="form-control">
                                    </div>

                                    <label class="custom-control custom-checkbox" for="status_part">
                                        <input type="checkbox" class="custom-control-input" id="status_part" name="status_part"><span class="custom-control-label">Activo</span>
                                    </label>

                                    <div class="modal-footer">
                                        <button class="btn btn-primary" id="btn_part_updt" name="btn_part_updt" type="submit">Guardar</button>
                                        <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="editSP" name="editSP" tabindex="-1" role="dialog" aria-labelledby="SPModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h4 class="modal-title" id="SPModalLabel">Editar Sub Partida</h4>
                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </a>
                            </div>

                            <div class="modal-body">

                                <form method="POST">
                                    <input type="text" id="id_sub_partida" name="id_sub_partida" hidden>

                                    <div class="form-group">
                                        <label for="desc_sub_partida" class="col-form-label"><strong>Sub Partida</strong></label>
                                        <input type="text" id="desc_sub_partida" name="desc_sub_partida" class="form-control">
                                    </div>

                                    <label class="custom-control custom-checkbox" for="status_sub_part">
                                        <input type="checkbox" class="custom-control-input" id="status_sub_part" name="status_sub_part"><span class="custom-control-label">Activo</span>
                                    </label>

                                    <div class="modal-footer">
                                        <button class="btn btn-primary" id="btn_sub_part_updt" name="btn_sub_part_updt" type="submit">Guardar</button>
                                        <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal update -->

                <!-- Modal delete -->
                <div class="modal fade" id="deleteP" name="deleteP" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel">Seguro que quieres eliminar?</h4>
                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </a>
                            </div>
                            <form id="delete_cate" method="POST">
                                <input type="text" id="id_part_dlt" name="id_part_dlt" hidden>

                                <div class="modal-footer">
                                    <button class="btn btn-danger" id="btn_p_delete" name="btn_p_delete" type="submit">Si</button>
                                    <a href="#" class="btn btn-primary" data-dismiss="modal">No</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="deleteSP" name="deleteSP" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel">Seguro que quieres eliminar?</h4>
                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </a>
                            </div>
                            <form id="delete_cate" method="POST">
                                <input type="text" id="id_sub_part_dlt" name="id_sub_part_dlt" hidden>

                                <div class="modal-footer">
                                    <button class="btn btn-danger" id="btn_sp_delete" name="btn_sp_delete" type="submit">Si</button>
                                    <a href="#" class="btn btn-primary" data-dismiss="modal">No</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Modal delete -->


            </div>

        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- <script src="../assets/vendor/custom-js/jquery.multi-select.html"></script> -->
    <script src="../assets/libs/js/main-js.js"></script>

    <script src="../assets/resources/functions.js"></script>

    <!-- Data Tables Pluggin -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap4.min.js"></script>
    <!--  -->


    <script type="text/javascript">
        $(document).ready(function() {

            $('.editP').on('click', function() {
                $('#editP').modal('show');
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text().trim();
                }).get();

                console.log(data);

                $('#id_partida').val(data[0]);
                $('#desc_partida').val(data[1]);

                if (data[2] == "Activo") {
                    $('#status_part').prop('checked', true);
                } else {
                    $('#status_part').prop('checked', false);
                }
            });

            $('.editSP').on('click', function() {
                $('#editSP').modal('show');
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text().trim();
                }).get();

                console.log(data);

                $('#id_sub_partida').val(data[0]);
                $('#desc_sub_partida').val(data[1]);

                if (data[2] == "Activo") {
                    $('#status_sub_part').prop('checked', true);
                } else {
                    $('#status_sub_part').prop('checked', false);
                }
            });





            $('.dltP').on('click', function() {

                $('#deleteP').modal('show');
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text().trim();
                }).get();
                console.log(data);
                $('#id_part_dlt').val(data[0]);
            });


            $('.dltSP').on('click', function() {

                $('#deleteSP').modal('show');
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text().trim();
                }).get();
                console.log(data);
                $('#id_sub_part_dlt').val(data[0]);
            });


            var table = $('.table').DataTable({

                // responsive: true,
                dom: '<"row"<"col-sm-6"l><"col-sm-6"f>>t<"row"<"col-sm-6"i><"col-sm-6"p>>',
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json", // URL del archivo de localización
                    "searchPlaceholder": "Buscar en la tabla..." // placeholder del Buscar.
                },
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "Todos"]
                ],
                // Otras opciones de DataTables
                "drawCallback": function(settings) {
                    $('.dataTables_length select').addClass('form-control form-control-sm');
                    $('.dataTables_filter input').addClass('form-control form-control-sm');
                },
                "order": [
                    [0, "asc"]
                ],
            });


            // --------------------------------------------------
            //
            // --------------------------------------------------
        });
    </script>

</body>

</html>