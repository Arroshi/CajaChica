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
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Listado de Centros de Costo</h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="../" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="ingreso.php" class="breadcrumb-link">Gestion</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Listado Total</li>
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
                            <h5 class="card-header">Centros de Costo</h5>
                            <div class="card-body">
                                <table id="table_" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col" hidden>ID</th>
                                            <th scope="col">Identificador</th>
                                            <th scope="col">Razon</th>
                                            <th scope="col">-</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <?php foreach ($listaCentros as $lst_center) : ?>
                                            <tr>
                                                <td scope="row" hidden><?php echo $lst_center[0] ?></td>
                                                <td><?php echo $lst_center[1] ?></td>
                                                <td><?php echo $lst_center[2] ?></td>
                                                <td>
                                                    <button class="btn btn-rounded btn-primary editcenterbtn" data-toggle="modal" data-target="#exampleModal">Editar</button>

                                                    <button class="btn btn-rounded btn-danger dltcenterbtn">Eliminar</button>
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

                <!-- Modal update -->
                <div class="modal fade" id="editCentro" name="editCentro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel">Editar Centro de Costos</h4>
                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </a>
                            </div>

                            <div class="modal-body">

                                <form id="update_asign" name="update_asign" method="POST">
                                    <input type="text" id="id_cent" name="id_cent" hidden>

                                    <div class="form-group">
                                        <label for="identif_cent" class="col-form-label"><strong>Identificador</strong></label>
                                        <input type="text" id="identif_cent" name="identif_cent" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="desc_cent" class="col-form-label"><strong>Razon</strong></label>
                                        <input type="text" id="desc_cent" name="desc_cent" class="form-control">
                                    </div>

                                    <div class="modal-footer">
                                        <button class="btn btn-primary" id="btnCentro_updt" name="btnCentro_updt" type="submit">Guardar</button>
                                        <a href="#" class="btn btn-secondary" data-dismiss="modal">Cerrar</a>
                                    </div>
                                </form>

                            </div>


                        </div>
                    </div>
                </div>
                <!-- Modal update -->

                <!-- Modal delete -->
                <div class="modal fade" id="deleteCentroCosto" name="deleteCentroCosto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel">Seguro que quieres eliminar?</h4>
                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </a>
                            </div>
                            <form id="delete_centro" method="POST">
                                <input type="text" id="id_center_" name="id_center_" hidden>

                                <div class="modal-footer">
                                    <button class="btn btn-danger" id="btnCentro_delete" name="btnCentro_delete" type="submit">Si</button>
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
    <script src="../assets/vendor/custom-js/jquery.multi-select.html"></script>
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

            $('.editcenterbtn').on('click', function() {
                console.log("test");
                $('#editCentro').modal('show');
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();
                console.log(data);
                $('#id_cent').val(data[0]);
                $('#identif_cent').val(data[1]);
                $('#desc_cent').val(data[2]);
            });

            $('.dltcenterbtn').on('click', function() {
                console.log("test");
                $('#deleteCentroCosto').modal('show');
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();
                console.log(data);
                $('#id_center_').val(data[0]);
            });

        });


        var table = $('#table_').DataTable({

            // responsive: true,
            "dom": '<"row"<"col-sm-4"l><"col-sm-4"B><"col-sm-4"f>>tip',
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
    </script>
</body>

</html>