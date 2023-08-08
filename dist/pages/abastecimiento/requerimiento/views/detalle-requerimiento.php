<!-- Funcionalidades -->
<?php

include("./../../../../php/empezar_session.php");
include("./../../../../php/verificar_session.php");

$requerimiento_id = $_GET['requerimiento_id'];
$detalleRequerimientoJSON = $_GET['detalle'];
$detalleRequerimiento = json_decode(urldecode($detalleRequerimientoJSON), true);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Visualizar Pedido</title>
  <link rel="icon" href="./../../../../assets/img/login/icon.png" type="image/x-icon">

  <!-- General CSS Files -->
  <link rel="stylesheet" href="./../../../../assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="./../../../../assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="./../../../../assets/css/style.css">
  <link rel="stylesheet" href="./../../../../assets/css/components.css">
  <!-- Start GA -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());

    gtag('config', 'UA-94034622-3');
  </script>
  <!-- /END GA -->
</head>

<body id="my-scrollbar">
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>

      <?php include("./../../../../includes/_navbar.php") ?>

      <?php include("./../../../../includes/almacenero/_sidebar.php") ?>


      <!-- Main content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Visualización del Requerimiento de Compra</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Inicio</a></div>
              <div class="breadcrumb-item">Abastecimiento</div>
              <div class="breadcrumb-item">Ver Requerimiento</div>
            </div>
          </div>

          <div class="section-body">
            <div class="invoice">
              <div class="invoice-print">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="section-title d-flex justify-content-between">
                      <strong>
                        Requerimiento de Compra
                      </strong>
                      <div class="badge badge-light">
                        <strong>
                          Requerimiento de Compra #<?php echo $detalleRequerimiento['id_req'] ?>
                        </strong>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-6">
                        <address>
                          <strong>ID Registrador: </strong><br>
                          <p id="id_registrador">
                            <?php echo $detalleRequerimiento['id_usuario'] ?>
                          </p>
                          <strong>Fecha: </strong><br>
                          <p id="fecha">
                            <?php echo $detalleRequerimiento['fecha'] ?>
                          </p>
                          <strong>Hora: </strong><br>
                          <p id="hora">
                          <div class="badge badge-info">
                            <?php echo $detalleRequerimiento['hora'] ?>
                          </div>
                          </p>
                        </address>
                      </div>
                      <div class="col-md-6 text-md-right">
                        <address>
                          <strong>Registrador: </strong><br>
                          <p id="registrador">
                            <?php echo $detalleRequerimiento['registrador'] ?>
                          </p>
                          </p>
                          <strong>Observación:</strong><br>
                          <p id="observacion">
                            <?php echo $detalleRequerimiento['observacion'] ?>
                          </p>
                          <strong>Estado: </strong><br>
                          <p id="estado">
                            <?php echo $detalleRequerimiento['estado'] ?>
                          </p>
                        </address>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row mt-4">
                  <div class="col-md-12">
                    <div class="section-title">Detalle del Requerimiento de Compra</div>
                    <p class="section-lead">Todos los productos del Requerimiento de compra.</p>
                    <div class="table-responsive">

                      <!-- ? Tabla a elegir  -->
                      <table id="tabla" class="table table-striped table-hover table-md">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Producto</th>
                            <th>Categoria</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Descripción</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          foreach ($detalleRequerimiento['productos'] as $producto) {
                            echo '<tr>';
                              echo '<td>' . $producto['id_producto'] . '</td>';
                              echo '<td>' . $producto['nom_producto'] . '</td>';
                              echo '<td>' . $producto['nom_categoria'] . '</td>';
                              echo '<td> S/.' . $producto['precio'] . '</td>';
                              echo '<td>' . $producto['cantidad'] . ' kg </td>';
                              echo '<td>' . $producto['descripcion'] . '</td>';
                            echo '<tr>';
                          }
                          ?>
                        </tbody>
                      </table>

                      <!-- ? Fin de la tabla a elegir -->

                    </div>
                    <div class="row mt-4">
                      <div class="col-lg-8">
                        <div class="section-title">Monto del Requerimiento de Compra: </div>
                        <p class="section-lead"> <strong>Nota: </strong>El monto del requerimiento de compra no incluye el IGV.</p>
                      </div>
                      <div class="col-lg-4 text-right">
                        <hr class="mt-2 mb-2">
                        <div class="invoice-detail-item">
                          <div class="invoice-detail-name">Sub Total</div>
                          <div class="invoice-detail-value invoice-detail-value-lg">S/. <?php echo $detalleRequerimiento['sub_total'] ?>  </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <hr>
              <div class="text-md-right">
                <div class="float-lg-left mb-lg-0 mb-3">
                  <a href="lista-requerimientos.php">
                    <button class="btn btn-danger btn-icon icon-left"><i class="fas fa-backward"></i> Volver atrás</button>
                  </a>
                </div>
                <button class="btn btn-warning btn-icon icon-left"><i class="fas fa-print"></i>Imprimir</button>
              </div>
            </div>
          </div>
        </section>
      </div>


      <?php include("./../../../../includes/_footer.php") ?>


    </div>
  </div>


  <!-- General JS Scripts -->
  <script src="./../../../../assets/modules/jquery.min.js"></script>
  <script src="./../../../../assets/modules/popper.js"></script>
  <script src="./../../../../assets/modules/tooltip.js"></script>
  <script src="./../../../../assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="./../../../../assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="./../../../../assets/modules/moment.min.js"></script>
  <script src="./../../../../assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  <!-- Scrollbar smooth-scrollbar -->
  <script src="./../../../../assets/modules/smooth-scrollbar/smooth-scrollbar.js"></script>
  <script src="./../../../../assets/modules/smooth-scrollbar/plugins/overscroll.js"></script>
  <script src="./../../../../assets/js/custom.js"></script>
  <!-- Page Specific JS File -->

  <!-- Template JS File -->
  <script src="./../../../../assets/js/scripts.js"></script>

</body>

</html>
