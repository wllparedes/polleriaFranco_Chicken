<!-- Funcionalidades -->
<?php

include("./../../../../php/empezar_session.php");
include("./../../../../php/verificar_session.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Registrar Pago</title>
  <link rel="icon" href="./../../../../assets/img/login/icon.png" type="image/x-icon">

  <!-- General CSS Files -->
  <link rel="stylesheet" href="./../../../../assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="./../../../../assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <!-- <link rel="stylesheet" href="./../../../../assets/modules/bootstrap-daterangepicker/daterangepicker.css"> -->
  <!-- <link rel="stylesheet" href="./../../../../assets/modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css"> -->
  <!-- <link rel="stylesheet" href="./../../../../assets/modules/select2/dist/css/select2.min.css"> -->
  <!-- <link rel="stylesheet" href="./../../../../assets/modules/jquery-selectric/selectric.css"> -->
  <!-- <link rel="stylesheet" href="./../../../../assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css"> -->
  <link rel="stylesheet" href="./../../../../assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">

  <!-- Virtual Select -->
  <link rel="stylesheet" href="./../../../../assets/modules/virtual-select/virtual-select.min.css">
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

      <?php include("./../../../../includes/recepcionista/_sidebar.php"); ?>


      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Formulario: Registrar Pago</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Inicio</a></div>
              <div class="breadcrumb-item">Pagos</a></div>
              <div class="breadcrumb-item">Registrar Pago</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Registrar Pago</h2>
            <p class="section-lead">Rellene la información requerida para poder registrar el pago del comprobante de
              venta.
            </p>

            <!-- ! FILA  -->
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Formulario:</h4>
                  </div>
                  <div class="card-body">
                    <form class="forms-sample form-comprobante" id="formulario">

                      <div class="row">
                        <!-- Grupo: Btn Seleccionar comprobante -->
                        <div class="form-group col-md-6 formulario__grupo" id="grupo__pedido">
                          <label for="pedido" class="formulario__label">Seleccionar comprobante requerido</label>
                          <div class="formulario__grupo-input input-group">

                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                              data-bs-target="#seleccionarComprobante">
                              <i class="fas fa-print"></i>
                              &nbsp;Seleccionar Comprobante de Venta
                            </button>

                          </div>
                        </div>
                      </div>

                      <h6 class="text-center col-12 p-4 text-muted advComprobante">
                        <strong>Seleccionar un comprobante de venta</strong>
                      </h6>

                      <!-- Tabla donde deben de estar el comprobante de venta seleccionado -->
                      <div class="contenedor table__seleccionados" id="table_comprobante">

                        <!-- ? COMPROBANTE -->
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
                              <input type="text" disabled class="form-control" id="id_cdv" name="id_cdv" value="">
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
                                value="">
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
                              <input type="text" disabled class="form-control" id="fecha_cdv" name="fecha_cdv" value="">
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
                              <input type="text" disabled class="form-control" id="hora_cdv" name="hora_cdv" value="">
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
                              <input type="text" disabled class="form-control" id="igv" name="igv" value="">
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
                              <input type="text" disabled class="form-control" id="total" name="total" value="">
                            </div>
                          </div>

                        </div>


                        <div id="table_cliente" class="contenedor table__seleccionados_dos">
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
                                  value="">
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
                                  value="">
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
                                  value="">
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
                                <input type="text" disabled class="form-control" id="correo" name="correo" value="">
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
                                <input type="text" disabled class="form-control" id="ruc" name="ruc" value="">
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
                                <input type="text" disabled class="form-control" id="numero" name="numero" value="">
                              </div>
                            </div>

                          </div>
                        </div>


                        <!-- ? PEDIDO -->
                        <div class="section-title">Información precisa del Pedido</div>
                        <p class="section-lead">Toda la información precisa del pedido.</p>

                        <!-- 1ra fila -->
                        <div class="row">
                          <!-- Grupo: ID_PEDIDO  -->
                          <div class="form-group col-md-3 formulario__grupo" id="grupo__pedido">
                            <label for="id_pedido" class="formulario__label">ID del Pedido</label>
                            <div class="formulario__grupo-input input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <i class="fas fa-fingerprint"></i>
                                </div>
                              </div>
                              <input type="text" disabled class="form-control" id="id_pedido" name="id_pedido">
                            </div>
                          </div>

                          <!-- Grupo: estado -->
                          <div class="form-group col-md-3 formulario__grupo" id="grupo__estado">
                            <label for="estado" class="formulario__label">Estado</label>
                            <div class="formulario__grupo-input input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <i class="fas fa-toggle-on"></i>
                                </div>
                              </div>
                              <input type="text" disabled class="form-control" id="estado" name="estado">
                            </div>
                          </div>

                          <!-- Grupo: nombre  -->
                          <div class="form-group col-md-6 formulario__grupo" id="grupo__nombre">
                            <label for="nombre" class="formulario__label">Nombre del cliente</label>
                            <div class="formulario__grupo-input input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <i class="fas fa-signature"></i>
                                </div>
                              </div>
                              <input type="text" disabled class="form-control" id="nombre" name="nombre">
                            </div>
                          </div>
                        </div>

                        <!-- * segunda fila -->
                        <div class="row">
                          <!-- Grupo: fecha -->
                          <div class="form-group col-md-6 formulario__grupo" id="grupo__fecha">
                            <label for="fecha" class="formulario__label">Fecha de registro</label>
                            <div class="formulario__grupo-input input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <i class="fas fa-calendar"></i>
                                </div>
                              </div>
                              <input type="text" disabled class="form-control" id="fecha" name="fecha">
                            </div>
                          </div>

                          <!-- Grupo: hora -->
                          <div class="form-group col-md-6 formulario__grupo" id="grupo__hora">
                            <label for="hora" class="formulario__label">Hora de Registro</label>
                            <div class="formulario__grupo-input input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <i class="fas fa-clock"></i>
                                </div>
                              </div>
                              <input type="text" disabled class="form-control" id="hora" name="hora">
                            </div>
                          </div>
                        </div>


                        <!-- * tercera fila -->
                        <div class="row">

                          <!-- Grupo: mesa  -->
                          <div class="form-group col-md-3 formulario__grupo" id="grupo__mesa">
                            <label for="observacion" class="formulario__label">Mesa</label>
                            <div class="formulario__grupo-input input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <i class="fas fa-calculator"></i>
                                </div>
                              </div>
                              <input type="text" disabled class="form-control" id="mesa" name="mesa">
                            </div>
                          </div>

                          <!-- Grupo: observacion  -->
                          <div class="form-group col-md-9 formulario__grupo" id="grupo__observacion">
                            <label for="observacion" class="formulario__label">Observacion</label>
                            <div class="formulario__grupo-input input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <i class="fas fa-eye"></i>
                                </div>
                              </div>
                              <input type="text" disabled class="form-control" id="observacion" name="observacion">
                            </div>
                          </div>
                        </div>



                        <!-- Lista de productos -->

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
                                <tbody id="contenido_pedido">

                                </tbody>
                              </table>

                              <!-- ? Fin de la tabla a elegir -->

                            </div>
                            <div class="row mt-4">
                              <div class="col-lg-8">
                                <div class="section-title">Monto del Pedido: </div>
                                <p class="section-lead"> <strong>Nota: </strong>Al momento de intentar de registrar el
                                  pedido, se adicionará el IGV.
                                </p>
                              </div>
                              <div class="col-lg-4 text-right">
                                <div class="invoice-detail-item">
                                  <div class="invoice-detail-name">Subtotal</div>
                                  <h5>
                                    <div class="invoice-detail-value" id="sub_total">  </div>
                                  </h5>
                                </div>
                                <div class="invoice-detail-item">
                                  <div class="invoice-detail-name">IGV</div>
                                  <h5>
                                    <div class="invoice-detail-value" id="monto_igv">  </div>
                                  </h5>
                                </div>
                                <hr class="mt-2 mb-2">
                                <div class="invoice-detail-item">
                                  <div class="invoice-detail-name">Total</div>
                                  <h4>
                                    <div class="invoice-detail-value invoice-detail-value-lg" id="monto_final">  </div>
                                  </h4>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                      </div>

                      <!-- = Message Error -->

                      <div class="row">
                        <div class="form-group col-md-12 contenedor__mensaje" id="contenedor__mensaje">
                          <div class="formulario__mensaje bg-danger shadow-danger">
                            <span class="fas fa-exclamation-triangle"></span> <b class="p-1">Rellene el formulario
                              correctamente.</b>
                          </div>
                        </div>
                      </div>

                      <!--? Container btns -->
                      <div class="row justify-content-center">
                        <div class="form-group col-lg-4 col-md-8 d-flex justify-content-around">
                          <button id="registrar" type="submit" name="registrar"
                            class="btn btn-lg btn-success bg-success">
                            <i class="fas fa-check-double"></i>
                            &nbsp;<b>Registrar</b>
                          </button>
                        </div>
                      </div>

                    </form>

                  </div>
                </div>
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
  <script src="./../../../../assets/modules/nicescroll/jquery.nicescroll.min.js"></script> <!-- Scrollbar nice -->
  <script src="./../../../../assets/modules/moment.min.js"></script>
  <script src="./../../../../assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  <!-- <script src="./../../../../assets/modules/cleave-js/dist/cleave.min.js"></script>
    <script src="./../../../../assets/modules/cleave-js/dist/addons/cleave-phone.pe.js"></script> -->
  <!-- darle formato a los inputs para telef -->
  <script src="./../../../../assets/modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <!-- <script src="./../../../../assets/modules/bootstrap-daterangepicker/daterangepicker.js"></script> -->
  <!-- Para las fechas -->
  <!-- <script src="./../../../../assets/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script> -->
  <!-- Para pickear los colores -->
  <!-- <script src="./../../../../assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script> -->
  <!-- pickaear el tiempo -->
  <script src="./../../../../assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
  <!-- <script src="./../../../../assets/modules/select2/dist/js/select2.full.min.js"></script> Select2> -->
  <!-- <script src="./../../../../assets/modules/jquery-selectric/jquery.selectric.min.js"></script> -->

  <!-- Page Specific JS File -->
  <!-- <script src="./../../../../assets/js/page/forms-advanced-forms.js"></script> -->

  <!-- Template JS File -->
  <script src="./../../../../assets/js/scripts.js"></script>
  <script src="../../../../assets/js/underscore-min.js"></script>
  <script src="../../../../assets/js/scripts/redirect.js"></script>
  <!-- Sweet Alert -->
  <script src="./../../../../assets/modules/sweetalert/sweetalert2.all.min.js"></script>
  <script src="./../../../../assets/js/page/modules-sweetalert.js"></script>
  <!-- Virtual select -->
  <script src="./../../../../assets/modules/virtual-select/virtual-select.min.js"></script>
  <!-- Funcionalidades Pages -->
  <!-- <script type="module" src="../controllers/NuevoComprobante.js"></script> -->
  <script src="../tasks/CargarComprobante.js"></script>
  <script src="../controllers/CargarComprobante.js"></script>
  <script src="../controllers/RegistrarComprobante.js"></script>

  <!-- Modal para seleccionar el pedido-->
  <?php include("seleccionar-comprobante.php") ?>
</body>

</html>
