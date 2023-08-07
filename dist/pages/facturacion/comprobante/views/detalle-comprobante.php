<!-- Funcionalidades -->
<?php

include("./../../../../php/empezar_session.php");
include("./../../../../php/verificar_session.php");

$comprobante_id = $_GET['comprobante_id'];
$detalleComprobanteJSON = $_GET['detalle'];
$detalleComprobante = json_decode(urldecode($detalleComprobanteJSON), true);

$comprobante = $detalleComprobante['comprobante'][0];
$cliente = $detalleComprobante['cliente'];
$pedido = $detalleComprobante['pedido'][0];
$productos = $detalleComprobante['productos'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Visualizar Comprobante</title>
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

      <?php include("./../../../../includes/recepcionista/_sidebar.php") ?>


      <!-- Main content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Visualización del Comprobante</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Inicio</a></div>
              <div class="breadcrumb-item">Ventas</div>
              <div class="breadcrumb-item">Ver Comprobante</div>
            </div>
          </div>

          <div class="section-body">
            <div class="invoice">
              <div class="invoice-print">
                <div class="section-title">Información precisa del Comprobante</div>
                <p class="section-lead">Toda la información precisa del comprobante.</p>

                <div class="row">

                  <!-- Grupo: id_comprobante  -->
                  <div class="form-group col-md-4 formulario__grupo" id="grupo__id_cdv">
                    <label for="id_cdv" class="formulario__label">ID Comprobante de Venta</label>
                    <div class="formulario__grupo-input input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-fingerprint"></i>
                        </div>
                      </div>
                      <input type="text" disabled class="form-control" id="id_cdv" name="id_cdv"
                        value=" <?php echo $comprobante['id_cdv'] ?> ">
                    </div>
                  </div>

                  <!-- Grupo: metodo de pago  -->
                  <div class="form-group col-md-4 formulario__grupo" id="grupo__metodo_pago">
                    <label for="metodo_pago" class="formulario__label">Método de Pago</label>
                    <div class="formulario__grupo-input input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-credit-card"></i>
                        </div>
                      </div>
                      <input type="text" disabled class="form-control" id="metodo_pago" name="metodo_pago"
                        value=" <?php echo $comprobante['metodo_pago'] ?> ">
                    </div>
                  </div>

                  <!-- Grupo: fecha  -->
                  <div class="form-group col-md-4 formulario__grupo" id="grupo__fecha_cdv">
                    <label for="fecha_cdv" class="formulario__label">Fecha</label>
                    <div class="formulario__grupo-input input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-calendar"></i>
                        </div>
                      </div>
                      <input type="text" disabled class="form-control" id="fecha_cdv" name="fecha_cdv"
                        value=" <?php echo $comprobante['fecha'] ?> ">
                    </div>
                  </div>


                </div>

                <div class="row">

                  <!-- Grupo: hora  -->
                  <div class="form-group col-md-4 formulario__grupo" id="grupo__hora_cdv">
                    <label for="hora_cdv" class="formulario__label">Hora</label>
                    <div class="formulario__grupo-input input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-clock"></i>
                        </div>
                      </div>
                      <input type="text" disabled class="form-control" id="hora_cdv" name="hora_cdv"
                        value=" <?php echo $comprobante['hora'] ?> ">
                    </div>
                  </div>

                  <!-- Grupo: igv  -->
                  <div class="form-group col-md-4 formulario__grupo" id="grupo__igv">
                    <label for="igv" class="formulario__label">IGV</label>
                    <div class="formulario__grupo-input input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-comment-dollar"></i>
                        </div>
                      </div>
                      <input type="text" disabled class="form-control" id="igv" name="igv"
                        value="S/. <?php echo $comprobante['igv'] ?> ">
                    </div>
                  </div>

                  <!-- Grupo: total  -->
                  <div class="form-group col-md-4 formulario__grupo" id="grupo__total">
                    <label for="total" class="formulario__label">Total</label>
                    <div class="formulario__grupo-input input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-file-invoice-dollar"></i>
                        </div>
                      </div>
                      <input type="text" disabled class="form-control" id="total" name="total"
                        value="S/. <?php echo $comprobante['total'] ?> ">
                    </div>
                  </div>

                </div>

                <div class="section-title">Información precisa del Pedido</div>
                <p class="section-lead">Toda la información precisa del pedido.</p>

                <div class="row">

                  <!-- Grupo: id_pedido  -->
                  <div class="form-group col-md-3 formulario__grupo" id="grupo__id_pedido">
                    <label for="id_pedido" class="formulario__label">ID Pedido</label>
                    <div class="formulario__grupo-input input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-fingerprint"></i>
                        </div>
                      </div>
                      <input type="text" disabled class="form-control" id="id_pedido" name="id_pedido"
                        value="<?php echo $pedido['id_pedido'] ?> ">
                    </div>
                  </div>

                  <!-- Grupo: nom_cliente  -->
                  <div class="form-group col-md-3 formulario__grupo" id="grupo__nombre">
                    <label for="nombre" class="formulario__label">Nombre del Cliente</label>
                    <div class="formulario__grupo-input input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-signature"></i>
                        </div>
                      </div>
                      <input type="text" disabled class="form-control" id="nombre" name="nombre"
                        value="<?php echo $pedido['nom_cliente'] ?> ">
                    </div>
                  </div>

                  <!-- Grupo: fecha_pedido  -->
                  <div class="form-group col-md-3 formulario__grupo" id="grupo__fecha">
                    <label for="fecha" class="formulario__label">Fecha</label>
                    <div class="formulario__grupo-input input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-calendar"></i>
                        </div>
                      </div>
                      <input type="text" disabled class="form-control" id="fecha" name="fecha"
                        value="<?php echo $pedido['fecha'] ?> ">
                    </div>
                  </div>

                  <!-- Grupo: hora_pedido  -->
                  <div class="form-group col-md-3 formulario__grupo" id="grupo__hora">
                    <label for="hora" class="formulario__label">Hora</label>
                    <div class="formulario__grupo-input input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-clock"></i>
                        </div>
                      </div>
                      <input type="text" disabled class="form-control" id="hora" name="hora"
                        value="<?php echo $pedido['hora'] ?> ">
                    </div>
                  </div>

                </div>

                <div class="row">

                  <!-- Grupo: sub_total  -->
                  <div class="form-group col-md-3 formulario__grupo" id="grupo__sub_total">
                    <label for="sub_total" class="formulario__label">Sub total</label>
                    <div class="formulario__grupo-input input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-dollar-sign"></i>
                        </div>
                      </div>
                      <input type="text" disabled class="form-control" id="sub_total" name="sub_total"
                        value="<?php echo $pedido['sub_total'] ?> ">
                    </div>
                  </div>

                  <!-- Grupo: n_mesa  -->
                  <div class="form-group col-md-3 formulario__grupo" id="grupo__n_mesa">
                    <label for="n_mesa" class="formulario__label">Número de Mesa</label>
                    <div class="formulario__grupo-input input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-calculator"></i>
                        </div>
                      </div>
                      <input type="text" disabled class="form-control" id="n_mesa" name="n_mesa"
                        value="<?php echo $pedido['n_mesa'] ?> ">
                    </div>
                  </div>

                  <!-- Grupo: observacion  -->
                  <div class="form-group col-md-6 formulario__grupo" id="grupo__observacion">
                    <label for="observacion" class="formulario__label">Observación</label>
                    <div class="formulario__grupo-input input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-eye"></i>
                        </div>
                      </div>
                      <input type="text" disabled class="form-control" id="observacion" name="observacion"
                        value="<?php echo $pedido['observacion'] ?> ">
                    </div>
                  </div>
                </div>

                <?php

                if (count($cliente) == 1) {

                  ?>
                  <div class="section-title">Información precisa del Cliente</div>
                  <p class="section-lead">Toda la información precisa del cliente.</p>
                  <div class="row">

                    <!-- Grupo: id_cliente  -->
                    <div class="form-group col-md-3 formulario__grupo" id="grupo__id_cliente">
                      <label for="id_cliente" class="formulario__label">ID Cliente</label>
                      <div class="formulario__grupo-input input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-fingerprint"></i>
                          </div>
                        </div>
                        <input type="text" disabled class="form-control" id="id_cliente" name="id_cliente"
                          value="<?php echo $comprobante['id_cliente'] ?>">
                      </div>
                    </div>

                    <!-- Grupo: razon_social  -->
                    <div class="form-group col-md-4 formulario__grupo" id="grupo__razon_social">
                      <label for="razon_social" class="formulario__label">Razon Social</label>
                      <div class="formulario__grupo-input input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-signature"></i>
                          </div>
                        </div>
                        <input type="text" disabled class="form-control" id="razon_social" name="razon_social"
                          value="<?php echo $cliente[0]['razon_social'] ?>">
                      </div>
                    </div>

                    <!-- Grupo: direccion  -->
                    <div class="form-group col-md-5 formulario__grupo" id="grupo__direccion">
                      <label for="direccion" class="formulario__label">Dirección</label>
                      <div class="formulario__grupo-input input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-location-arrow"></i>
                          </div>
                        </div>
                        <input type="text" disabled class="form-control" id="direccion" name="direccion"
                          value="<?php echo $cliente[0]['direccion'] ?>">
                      </div>
                    </div>

                  </div>

                  <div class="row">

                    <!-- Grupo: correo  -->
                    <div class="form-group col-md-4 formulario__grupo" id="grupo__correo">
                      <label for="correo" class="formulario__label">Correo</label>
                      <div class="formulario__grupo-input input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-at"></i>
                          </div>
                        </div>
                        <input type="text" disabled class="form-control" id="correo" name="correo"
                          value="<?php echo $cliente[0]['correo'] ?>">
                      </div>
                    </div>

                    <!-- Grupo: ruc  -->
                    <div class="form-group col-md-4 formulario__grupo" id="grupo__ruc">
                      <label for="ruc" class="formulario__label">RUC</label>
                      <div class="formulario__grupo-input input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-hashtag"></i>
                          </div>
                        </div>
                        <input type="text" disabled class="form-control" id="ruc" name="ruc"
                          value="<?php echo $cliente[0]['ruc'] ?>">
                      </div>
                    </div>

                    <!-- Grupo: número  -->
                    <div class="form-group col-md-4 formulario__grupo" id="grupo__numero">
                      <label for="numero" class="formulario__label">Número</label>
                      <div class="formulario__grupo-input input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-phone"></i>
                          </div>
                        </div>
                        <input type="text" disabled class="form-control" id="numero" name="numero"
                          value="<?php echo $cliente[0]['numero'] ?>">
                      </div>
                    </div>


                  </div>

                  <?php

                }

                ?>

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
                          foreach ($productos as $producto) {
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
                        <div class="section-title">Monto del Comprobante de Venta: </div>
                        <p class="section-lead"> <strong>Nota: </strong>El monto 'total' es el monto por el cual el cliente pagará.
                        </p>
                      </div>
                      <div class="col-lg-4 text-right">
                        <div class="invoice-detail-item">
                          <div class="invoice-detail-name">Subtotal</div>
                          <h5>
                            <div class="invoice-detail-value" id="sub_total">S/. <?php echo $pedido['sub_total'] ?> </div>
                          </h5>
                        </div>
                        <div class="invoice-detail-item">
                          <div class="invoice-detail-name">IGV</div>
                          <h5>
                            <div class="invoice-detail-value" id="igv">S/. <?php echo $comprobante['igv'] ?> </div>
                          </h5>
                        </div>
                        <hr class="mt-2 mb-2">
                        <div class="invoice-detail-item">
                          <div class="invoice-detail-name">Total</div>
                          <h4>
                            <div class="invoice-detail-value invoice-detail-value-lg" id="total">S/. <?php echo $comprobante['total'] ?> </div>
                          </h4>
                        </div>
                      </div>
                    </div>


                  </div>
                </div>
              </div>



              <hr>
              <div class="text-md-right">
                <div class="float-lg-left mb-lg-0 mb-3">
                  <a href="lista-comprobantes.php">
                    <button class="btn btn-danger btn-icon icon-left"><i class="fas fa-backward"></i> Volver
                      atrás</button>
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
