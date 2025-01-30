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
                            <h2 class="pageheader-title">Listado de Trabajadores</h2>
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
                            <h5 class="card-header">Trabajadores</h5>
                            <div class="card-body">
                                <!-- <div class="table table-hover table-responsive"> -->

                                <table id="table_" class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">N° documento</th>
                                            <th scope="col">Trabajador</th>
                                            <th scope="col">Area</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Estado</th>
                                            <th scope="col">-</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <?php foreach ($listaTrabajadores as $lst_workers) : ?>
                                            <tr>
                                                <td scope="row"><?php echo $lst_workers['id_user'] ?></td>
                                                <td><?php echo $lst_workers['dni_resp'] ?></td>

                                                <td><?php echo $lst_workers['nom_resp'] . " " . $lst_workers['ape_resp'] ?></td>
                                                <td><?php echo $lst_workers['desc_area'] ?></td>
                                                <td><?php echo $lst_workers['email_usu'] ?></td>


                                                <td>
                                                    <?php
                                                    if ($lst_workers['estado_usu'] == 1) {
                                                        echo 'Activo';
                                                    } else {
                                                        echo 'No Activo';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <button class="btn btn-rounded btn-primary editbtn" data-toggle="modal" data-target="#exampleModal">Editar</button>
                                                    <!-- </td>
                                                <td> -->
                                                    <button class="btn btn-rounded btn-danger dltuser_btn">Eliminar</button>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                                <!-- </div> -->
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
                                Copyright © 2023
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end footer -->
                <!-- ============================================================== -->

                <!-- Modal update -->
                <div class="modal fade" id="editUser" name="editUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel">Editar Usuario</h4>
                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </a>
                            </div>

                            <div class="modal-body">

                                <form id="update_users" name="update_users" method="POST">
                                    <input type="hidden" id="id_users" name="id_users">

                                    <div class="d-flex col-sm-12 justify-content-between p-0">
                                        <div class="form-group col-sm-6 pl-0">
                                            <label for="doc_users" class="col-form-label"><strong>DNI</strong></label>
                                            <input type="text" id="doc_users" name="doc_users" maxlength="8" class="form-control">
                                        </div>

                                        <div class="form-group col-sm-6 pr-0">
                                            <label for="cate_usu" class="col-form-label"><strong>Categoria</strong></label>
                                            <select id="cate_usu" name="cate_usu" class="form-control">
                                                <option value="" disabled>CATEGORIA</option>
                                                <?php foreach ($listaAreas as $value) : ?>
                                                    <option value="<?php echo $value['id_area']; ?>"><?php echo $value['desc_area'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                    </div>
                                    </div>

                                    <div class="d-flex col-sm-12 justify-content-between p-0">
                                        <div class="form-group col-sm-6 pl-0">
                                            <label for="nom_users" class="col-form-label"><strong>Nombre</strong></label>
                                            <input type="text" id="nom_users" name="nom_users" class="form-control">
                                        </div>

                                        <div class="form-group col-sm-6 pr-0">
                                            <label for="ape_users" class="col-form-label"><strong>Apellido</strong></label>
                                            <input type="text" id="ape_users" name="ape_users" class="form-control">
                                        </div>
                                    </div>

                                    <!--<div class="form-group">
                                        <label for="cate_usu" class="col-form-label"><strong>Categoria</strong></label>
                                        <select id="cate_usu" name="cate_usu" class="form-control">
                                            <option value="" disabled>CATEGORIA</option>
                                            <?php foreach ($listaAreas as $value) : ?>
                                                <option value="<?php echo $value['id_area']; ?>"><?php echo $value['desc_area'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>-->

                                    <div class="form-group">
                                        <label for="mail_users" class="col-form-label"><strong>Correo</strong></label>
                                        <input type="text" id="mail_users" name="mail_users" class="form-control">
                                    </div>


                                    <br>

                                    <label class="custom-control custom-checkbox" for="status_user">
                                        <input type="checkbox" class="custom-control-input" id="status_user" name="status_user"><span class="custom-control-label">Activo</span>
                                    </label>

                                    <br>

                                    <div class="modal-footer">
                                        <button class="btn btn-primary" id="btnUsers_updt" name="btnUsers_updt" type="button">Guardar</button>
                                        <a href="#" class="btn btn-secondary" data-dismiss="modal">Cerrar</a>
                                    </div>
                                </form>

                            </div>


                        </div>
                    </div>
                </div>
                <!-- Modal update -->

                <!-- Modal delete -->
                <div class="modal fade" id="deleteUsers" name="deleteUsers" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel">Seguro que quieres eliminar?</h4>
                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </a>
                            </div>
                            <form id="delete_users" method="POST">
                                <input type="text" id="id_user_dlt" name="id_user_dlt" hidden>

                                <div class="modal-footer">
                                    <button class="btn btn-danger" id="btnUsers_delete" name="btnUsers_delete" type="submit">Si</button>
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

            $('.editbtn').on('click', function() {
                $('#editUser').modal('show');
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text().trim();
                }).get();
                console.log(data);

                var code = data[0];

                $.ajax({
                    type: 'POST',
                    url: '../Controller/getDetailsUser.php',
                    data: {
                        id_user: code,
                    },
                    success: function(response) {
                        var data = JSON.parse(response);
                        console.log(data);

                        $('#id_users').val(data[0].id_user);
                        $('#doc_users').val(data[0].dni_resp !== null ? data[0].dni_resp.trim() : '');
                        $('#nom_users').val(data[0].nom_resp);
                        $('#ape_users').val(data[0].ape_resp);
                        $('#cate_usu').val(data[0].id_area);
                        $('#mail_users').val(data[0].email_usu);

                        $.each(data, function(index, value) {
                            var option = $('<option>', {
                                value: value.id_area,
                                text: value.desc_area
                            });

                        });

                        if (data[0].estado_usu == 1) {
                            $('#status_user').prop('checked', true);
                        } else {
                            $('#status_user').prop('checked', false);
                        }
                    },

                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            });





            $('.dltuser_btn').on('click', function() {
                // console.log("test");
                $('#deleteUsers').modal('show');
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();
                console.log(data);
                $('#id_user_dlt').val(data[0]);
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


            // --------------------------------------------------
            //
            // --------------------------------------------------
        });
    </script>

</body>

</html>