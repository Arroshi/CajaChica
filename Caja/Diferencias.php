<?php
require_once('../Config/security.php');
include_once('../Config/Conection.php');
require_once('../Controller/controller_selector.php');

$cnx = new conexion();
$cadena = $cnx->abrirConexion();

$total_result = mssql_query("SELECT SUM(Monto) AS Total FROM caja",$cadena);
$total = mssql_fetch_object($total_result);

$monto_apert_ = mssql_query("SELECT TOP 1 id_apert, monto_, monto_real FROM apertura_caja
                                       WHERE usu_caja = {$_SESSION['id_cuenta']}
                                       ORDER BY fecha_reg DESC", $cadena);


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
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Listado de las Diferencias</h2>
                            <?php if ($_SESSION['roles'] === 3) { ?>
                                <h3>Monto Actual - <strong>S/.
                                        <?php
                                        $montoApertura = "";
                                        if ($monto_apert_ != null) {

                                            $datos_ = mysqli_fetch_object($monto_apert_);

                                            if ($datos_ != null && $_SESSION['rol'] == 2) {
                                                $montoApertura = $datos_->monto_;
                                                echo $montoApertura;
                                            } elseif ($_SESSION['rol'] != 2) {
                                                echo "-";
                                            } else {
                                                echo "(A la espera de la apertura de caja.)";
                                            }
                                        } else {
                                            echo "A la espera de la apertura de caja.";
                                        } ?>
                                    </strong></h3>
                            <?php } ?>

                            <!-- <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="../" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="ingreso.php" class="breadcrumb-link">Registro</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Listado Diario</li>
                                    </ol>
                                </nav>
                            </div> -->
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
                            <h5 class="card-header">Caja</h5>


                            <form class="card-header p-0">
                                <div class="form-row card-body">
                                    <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                        <label for="validationCustomUsername">Seleccione el miembro de caja:</label>
                                        <select class="form-control" id="id_caja_cstm_diff" name="id_caja_cstm_diff">
                                            <option selected>Selecciona</option>
                                            <?php foreach ($cboUsuariosCaja as $user_caja) : ?>
                                                <option value="<?php echo $user_caja[0]; ?>"><?php echo $user_caja[2] . ' ' . $user_caja[3]; ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                            </form>
                            <?php
                            require_once('../Controller/controller_selector.php');
                            $listaDiferencias = $oCaja->diferencias();
                            ?>

                            <div id="diff_" class="card-body">
                                <table id="table" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID:</th>
                                            <th scope="col">Fecha:</th>
                                            <th scope="col">Monto apertura:</th>
                                            <th scope="col">Monto total:</th>
                                            <th scope="col">Monto sistema:</th>
                                            <th scope="col">Monto cierre:</th>
                                            <th scope="col">Diferencia:</th>
                                            <th scope="col">Abono:</th>
                                            <th scope="col">Deuda:</th>
                                            <th scope="col">Registrador:</th>
                                            <th scope="col">Caja:</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php

                                        function showdata($data)
                                        {
                                            if ($data !== null) {
                                                echo "<td>$data</td>";
                                            } else {
                                                echo "<td>-</td>";
                                            }
                                        }
                                        ?>
                                        <?php foreach ($listaDiferencias as $lst_d) :
                                            $cont = 0;
                                        ?>

                                            <tr>
                                                <?php showdata($lst_d[$cont++]) ?>
                                                <?php showdata($lst_d[$cont++]) ?>
                                                <?php showdata("S/. " . $lst_d[$cont++]) ?>
                                                <?php showdata("S/. " . $lst_d[$cont++]) ?>
                                                <?php showdata("S/. " . $lst_d[$cont++]) ?>
                                                <?php showdata("S/. " . $lst_d[$cont++]) ?>
                                                <?php showdata("S/. " . $lst_d[$cont++]) ?>
                                                <?php showdata("S/. " . $lst_d[$cont++]) ?>
                                                <?php showdata("S/. " . $lst_d[$cont++]) ?>
                                                <?php showdata($lst_d[$cont++]) ?>
                                                <?php showdata($lst_d[$cont++]) ?>
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

    <!-- Data Tables Pluggin -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap4.min.js"></script>
    <!--  -->
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <!--  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/xlsx.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/jszip.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/dist/xlsx.full.min.js"></script>
    <!--  -->

    <script>
        $(document).ready(function() {
            var table = $('#table').DataTable({
                // "dom": '<"row"<"col-sm-4"l><"col-sm-4"B><"col-sm-4"f>>tip',
                "dom": '<"row"<"col-sm-4"l><"col-sm-4"B><"col-sm-4"f>>t<"row"<"col-sm-6"i><"col-sm-6"p>>',
                buttons: [
                    'excel'
                ],
                buttons: [{
                    extend: 'excelHtml5',
                    text: 'Excel', // Cambia el texto del botón
                    className: 'btn btn-excel pointer',
                    titleAttr: 'Crear Excel',
                    title: '',
                    filename: 'MAK',
                    autoFilter: true, // Habilita los filtros en los encabezados en Excel
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5, 6, 7, 8], // Especifica las columnas que deseas exportar (excluyendo la primera)
                    },
                    customize: function(xlsx) {
                        var sheet = xlsx.xl.worksheets['sheet1.xml'];
                        // Agregar un estilo de negrita (bold) al encabezado
                        $('row:first 1[r^="1"]', sheet).attr('s', '20');
                    }

                }],
                responsive: true,
                autoWidth: false,
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
                },
                columnDefs: [{
                    searchable: false,
                    orderable: false,
                    targets: 0
                }],
                // "order": [
                //     [1, "desc"]
                // ],
            });
            // table.on('order.dt search.dt', function() {
            //     let i = 1;

            //     table.cells(null, 0, {
            //         search: 'applied',
            //         order: 'applied'
            //     }).every(function(cell) {
            //         this.data(i++);
            //     });
            // }).draw();
            // --------------------------------------------------
            //
            // --------------------------------------------------

            // $('#id_caja_cstm_diff').change(function() {
            //     if ($('#id_caja_cstm_diff').val() == 'Selecciona') {
            //         // // Muestra la primera tabla
            //         $('#diff_').removeClass("hide");
            //         $('#diff_').addClass("show");
            //         // // Oculta la segunda tabla
            //         $('#diff_box').removeClass("show");
            //         $('#diff_box').addClass("hide");
            //     } else {
            //         // // Muestra la primera tabla
            //         $('#diff_box').removeClass("hide");
            //         $('#diff_box').addClass("show");
            //         // // Oculta la segunda tabla
            //         $('#diff_').addClass("hide");
            //     }
            // })
        });
    </script>

    <script>
        $("#id_caja_cstm_diff").change(function() {
            var _data_diff = {
                id_caja_cstm_: true,
                id_caja_cstm_diff: $("#id_caja_cstm_diff").val(),
            };
            // var seleccion = $(this).val();
            $.ajax({
                type: "POST",
                url: "../Controller/cajaFilter.php",
                data: _data_diff,
                dataType: "JSON",
                beforeSend: function() {
                    // Ocultar la tabla
                    // $('#diff_').hide();
                    // Destruir la tabla actual
                    if ($.fn.DataTable.isDataTable('#table')) {
                        $('#table').DataTable().destroy();
                    }
                },
                success: function(data) {
                    console.log(data);
                    if (data.resultado == 1) {
                        var tbody = $("#table tbody");
                        tbody.empty();

                        $.each(data.listaDiffBox, function(index, item) {
                            var row = "<tr>";
                            row += "<td>" + item[0] + "</td>";
                            row += "<td>" + item[1] + "</td>";
                            row += "<td>S/. " + item[2] + "</td>";
                            row += "<td>S/. " + item[3] + "</td>";
                            row += "<td>S/. " + item[4] + "</td>";
                            row += "<td>S/. " + item[5] + "</td>";
                            row += "<td>S/. " + item[6] + "</td>";
                            row += "<td>S/. " + item[7] + "</td>";
                            row += "<td>S/. " + item[8] + "</td>";
                            row += "<td>" + item[9] + "</td>";
                            row += "<td>" + item[10] + "</td>";
                            // Agrega más celdas según tus datos
                            row += "</tr>";

                            // Agrega la fila a la tabla
                            tbody.append(row);
                        });
                    }
                },
                complete: function() {
                    var table = $('#table').DataTable({
                        // "dom": '<"row"<"col-sm-4"l><"col-sm-4"B><"col-sm-4"f>>tip',
                        "dom": '<"row"<"col-sm-4"l><"col-sm-4"B><"col-sm-4"f>>t<"row"<"col-sm-6"i><"col-sm-6"p>>',
                        buttons: [
                            'excel'
                        ],
                        buttons: [{
                            extend: 'excelHtml5',
                            text: 'Excel', // Cambia el texto del botón
                            className: 'btn btn-excel pointer',
                            titleAttr: 'Crear Excel',
                            title: '',
                            filename: 'MAK',
                            autoFilter: true, // Habilita los filtros en los encabezados en Excel
                            exportOptions: {
                                columns: [1, 2, 3, 4, 5, 6, 7, 8], // Especifica las columnas que deseas exportar (excluyendo la primera)
                            },
                            customize: function(xlsx) {
                                var sheet = xlsx.xl.worksheets['sheet1.xml'];
                                // Agregar un estilo de negrita (bold) al encabezado
                                $('row:first 1[r^="1"]', sheet).attr('s', '20');
                            }

                        }],
                        responsive: true,
                        autoWidth: false,
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
                        },
                        columnDefs: [{
                            searchable: false,
                            orderable: false,
                            targets: 0
                        }],
                        // "order": [
                        //     [1, "desc"]
                        // ],
                    });
                    // table.on('order.dt search.dt', function() {
                    //     let i = 1;

                    //     table.cells(null, 0, {
                    //         search: 'applied',
                    //         order: 'applied'
                    //     }).every(function(cell) {
                    //         this.data(i++);
                    //     });
                    // }).draw();
                }
            });
            return false;
        });
    </script>
</body>

</html>