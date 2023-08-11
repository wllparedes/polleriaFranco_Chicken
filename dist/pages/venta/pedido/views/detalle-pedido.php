<!-- Funcionalidades -->
<?php

include("./../../../../php/empezar_session.php");
include("./../../../../php/verificar_session.php");

$pedido_id = $_GET['pedido_id'];
$detallePedidoJSON = $_GET['detalle'];
$detallePedido = json_decode(urldecode($detallePedidoJSON), true);

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

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>

      <?php include("./../../../../includes/_navbar.php") ?>

      <?php include("./../../../../includes/recepcionista/_sidebar.php") ?>


      <!-- Main content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Visualización del Pedido</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Inicio</a></div>
              <div class="breadcrumb-item">Ventas</div>
              <div class="breadcrumb-item">Ver Pedido</div>
            </div>
          </div>

          <div class="section-body">
            <div class="invoice">
              <div class="invoice-print">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="section-title d-flex justify-content-between">
                      <strong>
                        Pedido
                      </strong>
                      <div class="badge badge-light">
                        <strong>
                          Pedido #<?php echo $detallePedido['id_pedido'] ?>
                        </strong>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-6">
                        <address>
                          <strong>Cliente: </strong><br>
                          <p id="nom_cliente">
                            <?php echo $detallePedido['nom_cliente'] ?>
                          </p>
                          <strong>Fecha: </strong><br>
                          <p id="fecha">
                            <?php echo $detallePedido['fecha'] ?>
                          </p>
                          <strong>Hora: </strong><br>
                          <p id="hora">
                          <div class="badge badge-info">
                            <?php echo $detallePedido['hora'] ?>
                          </div>
                          </p>
                        </address>
                      </div>
                      <div class="col-md-6 text-md-right">
                        <address>
                          <strong>Número de Mesa:</strong><br>
                          <p id="num_mesa">
                          <div class="badge badge-secondary">
                            <?php echo $detallePedido['n_mesa'] ?>
                          </div>
                          </p>
                          <strong>Observación:</strong><br>
                          <p id="observacion">
                            <?php echo $detallePedido['observacion'] ?>
                          </p>
                          <strong>Estado: </strong><br>
                          <p id="estado">
                            <?php echo $detallePedido['estado'] ?>
                          </p>
                        </address>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row mt-4">
                  <div class="col-md-12">
                    <div class="section-title">Detalle del Pedido</div>
                    <p class="section-lead">Todos los consumibles del Pedido.</p>
                    <div class="table-responsive">

                      <!-- ? Tabla a elegir  -->
                      <table id="tabla" class="table table-striped table-hover table-md">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Consumible</th>
                            <th>Categoria</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Descripción</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          foreach ($detallePedido['productos'] as $producto) {
                            echo '<tr>';
                              echo '<td>' . $producto['id_consumible'] . '</td>';
                              echo '<td>' . $producto['nom_consumible'] . '</td>';
                              echo '<td>' . $producto['nom_categoria'] . '</td>';
                              echo '<td> S/.' . $producto['precio'] . '</td>';
                              echo '<td>' . $producto['cantidad'] . ' ud </td>';
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
                        <div class="section-title">Monto del Pedido: </div>
                        <p class="section-lead"> <strong>Nota: </strong>El monto del pedido no incluye el IGV.</p>
                      </div>
                      <div class="col-lg-4 text-right">
                        <hr class="mt-2 mb-2">
                        <div class="invoice-detail-item">
                          <div class="invoice-detail-name">Sub Total</div>
                          <div class="invoice-detail-value invoice-detail-value-lg">S/. <?php echo $detallePedido['sub_total'] ?>  </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <hr>
              <div class="text-md-right">
                <div class="float-lg-left mb-lg-0 mb-3">
                  <a href="lista-pedidos.php">
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
  <!-- Page Specific JS File -->

  <!-- Template JS File -->
  <script src="./../../../../assets/js/scripts.js"></script>

</body>

</html>
