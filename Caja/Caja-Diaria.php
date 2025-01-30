<?php
require_once('../Config/security.php');
include_once('../Config/Conection.php');

$cnx = new conexion();
$cadena = $cnx->abrirConexion();

$total_result = mssql_query("SELECT SUM(Monto) AS Total FROM caja", $cadena);
$total = mssql_fetch_object($total_result);

$monto_apert_ = mssql_query("SELECT TOP 1 id_apert, monto_, monto_real  FROM apertura_caja
                                       WHERE usu_caja = {$_SESSION['id_cuenta']}
                                       ORDER BY fecha_reg DESC", $cadena)


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
                            <h2 class="pageheader-title">Listado Diario</h2>
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
                        <?php
                        // echo $_SESSION[''];
                        ?>
                        <div class="card">
                            <h5 class="card-header">Caja Diaria</h5>
                            <div class="card-body">
                                <?php
                                require_once('../Controller/controller_selector.php');

                                ?>
                                <?php if ($_SESSION['roles'] === 3 || $_SESSION['roles'] === 5) {
                                    $listaDiaria = $oCaja->cajaDiaria($_SESSION['id_cuenta']); ?>

                                    <table id="table_" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID:</th>
                                                <th scope="col">Fecha:</th>
                                                <th scope="col">Asignado a:</th>
                                                <th scope="col">Partida:</th>
                                                <th scope="col">Sub Partida:</th>
                                                <th scope="col">Caja:</th>
                                                <th scope="col">Autorizado por:</th>
                                                <th scope="col">Gasto (s/.):</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php foreach ($listaDiaria as $lst_d) : ?>
                                                <tr>
                                                    <!-- <td></td> -->
                                                    <td scope="row"><?php echo $lst_d[0] ?></td>
                                                    <td><?php echo $lst_d[1] ?></td>
                                                    <td><?php echo $lst_d[2] . ' ' . $lst_d[3] ?></td>
                                                    <td><?php echo $lst_d[4] ?></td>
                                                    <td><?php echo $lst_d[5] ?></td>
                                                    <td><?php echo $lst_d[6] ?></td>
                                                    <td>
                                                        <?php
                                                        if ($lst_d[7] !== null) {
                                                            echo "S/. " . $lst_d[7];
                                                        } else {
                                                            echo '- -';
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                <?php  } else {
                                    $listaDiaria_admin = $oCaja->cajaDiaria_admin(); ?>

                                    <table id="table_" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID:</th>
                                                <th scope="col">Fecha:</th>
                                                <th scope="col">Asignado a:</th>
                                                <th scope="col">Partida:</th>
                                                <th scope="col">Sub Partida:</th>
                                                <th scope="col">Caja:</th>
                                                <th scope="col">Autorizado por:</th>
                                                <th scope="col">Gasto (s/.):</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php foreach ($listaDiaria_admin as $lst_d) : ?>
                                                <tr>
                                                    <!-- <td></td> -->
                                                    <td scope="row"><?php echo $lst_d[0] ?></td>
                                                    <td><?php echo $lst_d[1] ?></td>
                                                    <td><?php echo $lst_d[2] . ' ' . $lst_d[3] ?></td>
                                                    <td><?php echo $lst_d[4] ?></td>
                                                    <td><?php echo $lst_d[5] ?></td>
                                                    <td><?php echo $lst_d[6] ?></td>
                                                    <td><?php echo $lst_d[7] ?></td>
                                                    <td>
                                                        <?php
                                                        if ($lst_d[8] !== null) {
                                                            echo "S/. " . $lst_d[8];
                                                        } else {
                                                            echo '- -';
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                <?php  } ?>
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

    <script>
        $(document).ready(function() {
            $('#table_').DataTable({
                // "dom": '<"row"<"col-sm-6"l><"col-sm-6"f>>t<"row"<"col-sm-6"i><"col-sm-6"p>>',
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
            // Agregar números secuenciales a la primera columna
            // $('#table_').on('order.dt search.dt', function() {
            //     $('#table_').DataTable().column(0, {
            //         search: 'applied',
            //         order: 'applied'
            //     }).nodes().each(function(cell, i) {
            //         cell.innerHTML = i + 1;
            //     });
            // }).draw();
        });
    </script>
</body>

</html>