<?php
require_once('../config/security.php');
include_once('../Config/Conection.php');
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

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 p-0">
                        <div class="card">

                            <h5 class="card-header">Caja</h5>
                            <?php if ($_SESSION['roles'] === 1 || $_SESSION['roles'] === 2 || $_SESSION['user_'] === 'rvalera') { ?>
                                <form id="formCajaCustom" class="card-header p-0" method="POST">
                                    <div class="form-row card-body">
                                        <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                            <label for="validationCustomUsername">Seleccione el centro de costo:</label>
                                            <select class="form-control" id="id_cc" name="id_cc">
                                                <option value="" selected>Selecciona</option>
                                                <?php foreach ($listaCentros as $lst_c) : ?>
                                                    <option value="<?php echo $lst_c['id_centro_c']; ?>"><?php echo $lst_c['desc_centro_c']; ?></option>
                                                <?php endforeach ?>

                                            </select>
                                        </div>

                                        <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                            <label for="tipo_doc">Fecha desde:</label>
                                            <input type="date" class="form-control" name="desdeDate" id="desdeDate">
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                            <label for="tipo_doc">Fecha hasta:</label>
                                            <input type="date" class="form-control" name="hastaDate" id="hastaDate">
                                        </div>

                                        <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12 mt-4">
                                            <button type="submit" class="btn btn-primary" id="btnFilterReport" name="btnFilterReport">Buscar</button>
                                            <button type="button" class="btn btn-secondary" id="btnFilterClear" name="btnFilterClear">Limpiar</button>
                                        </div>
                                    </div>
                                </form>
                            <?php } ?>

                            <div id="table_custom" class="card-body">
                                <?php
                                require_once('../Controller/controller_selector.php');
                                ?>
                                <table id="table" class="table resultadoFiltro table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">CC.CC</th>
                                            <th scope="col">PARTIDA</th>
                                            <th scope="col">SUB PARTIDA</th>
                                            <th scope="col">MONTO TOTAL</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach ($listaDetalles as $lst_d) : ?>
                                            <tr>
                                                <td><?php echo $lst_d[0] ?></td>
                                                <td><?php echo $lst_d[1] ?></td>
                                                <td><?php echo $lst_d[2] ?></td>
                                                <td><?php echo $lst_d[3] ?></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>

                            </div>

                            <div id="table_custom_" class="card-body" style="display: none;">
                                <table id="table_" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">CC.CC</th>
                                            <th scope="col">PARTIDA</th>
                                            <th scope="col">SUB PARTIDA</th>
                                            <th scope="col">MONTO TOTAL</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

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
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->


    <!-- Optional JavaScript -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="../assets/libs/js/main-js.js"></script>
    <script src="../assets/resources/functions.js"></script>

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
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/xlsx.full.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/jszip.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/dist/xlsx.full.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/vfs_fonts.js"></script>

    <!--  -->
    <script src="../assets/resources/functions.js"></script>

    <script>
        $('#btnFilterClear').click(function() {
            // Limpia los valores de los inputs
            $('#id_cc').val("");
            $('#desdeDate').val("");
            $('#hastaDate').val("");
            // // Muestra la primera tabla
            $('#table_custom').show();
            // // Oculta la segunda tabla
            $('#table_custom_').hide();
        })
        $("#btnFilterReport").click(function() {
            var _data_filter = {
                btnFilterReport: true,
                id_cc: $("#id_cc").val(),
                desdeDate: $("#desdeDate").val(),
                hastaDate: $("#hastaDate").val(),
            };

            $.ajax({
                type: "POST",
                url: "../Controller/cajaFilter.php",
                data: _data_filter,
                dataType: "JSON",
                beforeSend: function() {
                    // Ocultar la tabla
                    $('#table_custom').hide();
                    // Destruir la tabla actual
                    if ($.fn.DataTable.isDataTable('#table_')) {
                        $('#table_').DataTable().destroy();
                    }
                },
                success: function(data) {
                    console.log(data);

                    if (data.resultado) {

                        // Resto de tu código para llenar la tabla con los nuevos datos
                        var tbody = $("#table_custom_ tbody");
                        tbody.empty();
                        // Recorre los datos en data.listaCustom y agrega filas a la tabla
                        $.each(data.listaCustom, function(index, item) {
                            var row = "<tr>";
                            row += "<td>" + (item[0] ?? '') + "</td>";
                            row += "<td>" + (item[1] ?? '') + "</td>";
                            row += "<td>" + (item[2] ?? '') + "</td>";
                            row += "<td>" + (item[3] ?? '') + "</td>";
                            // Agrega más celdas según tus datos
                            row += "</tr>";

                            // Agrega la fila a la tabla
                            tbody.append(row);
                        });
                    } else {
                        alert("LLAMAR A SISTEMAS")
                    }
                },
                complete: function() {
                    //Mostrar la tabla
                    $('#table_custom_').show();

                    // Inicializar DataTables con los nuevos datos
                    $('#table_').DataTable({
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
                            filename: 'reporte_detalles',
                            autoFilter: true, // Habilita los filtros en los encabezados en Excel
                            customize: function(xlsx) {
                                var sheet = xlsx.xl.worksheets['Caja.xml'];
                                // Agregar un estilo de negrita (bold) al encabezado
                                $('row:first 1[r^="1"]', sheet).attr('s', '20');
                            }

                        }],
                        responsive: true,
                        autoWidth: false,
                        searching: true,
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
                        "order": [
                            [0, "desc"]
                        ]
                    });
                }
            });
            return false;
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
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
                        // exportOptions: {
                        //     columns: [0, 1, 2, 3, 4, 5, 6, 7, 8], // Especifica las columnas que deseas exportar (excluyendo la primera)
                        // },
                        customize: function(xlsx) {
                            var sheet = xlsx.xl.worksheets['sheet1.xml'];
                            // Agregar un estilo de negrita (bold) al encabezado
                            $('row:first 1[r^="1"]', sheet).attr('s', '20');
                        }

                    }],
                    order: [],
                    responsive: true,
                    autoWidth: false,
                    searching: true,
                    "debug": true,
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
                    // columnDefs: [{
                    //     searchable: false,
                    //     orderable: false,
                    //     targets: 0
                    // }],
                    // "order": [
                    //     [0, "desc"]
                    // ],
                });
            });
        });
    </script>
</body>

</html>