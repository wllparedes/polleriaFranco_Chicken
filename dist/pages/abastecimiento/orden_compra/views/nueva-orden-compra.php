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
  <title>Nueva Orden de compra</title>
  <link rel="icon" href="./../../../../assets/img/login/icon.png" type="image/x-icon">

  <!-- General CSS Files -->
  <link rel="stylesheet" href="./../../../../assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="./../../../../assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="./../../../../assets/modules/bootstrap-daterangepicker/daterangepicker.css">
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

      <?php include("./../../../../includes/almacenero/_sidebar.php"); ?>


      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Formulario: Nueva Orden de compra</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Inicio</a></div>
              <div class="breadcrumb-item">Abastecimiento</a></div>
              <div class="breadcrumb-item">Nueva Orden de compra</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Nueva Orden de compra</h2>
            <p class="section-lead">Rellene la información requerida para poder crear una nueva orden de compra.
            </p>

            <!-- ! FILA  -->
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Formulario:</h4>
                  </div>
                  <div class="card-body">
                    <form class="forms-sample form-orden-compra" id="formulario">

                      <div class="row">
                        <!-- Grupo: Razon Social -->
                        <div class="form-group col-md-6 formulario__grupo" id="grupo__fecha_hora">
                          <label>Fecha y Hora estimada de entrega</label>
                          <div class="formulario__grupo-input input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-calendar"></i>
                              </div>
                            </div>
                            <input type="text" class="form-control datetimepicker" id="fecha_hora" name="fecha_hora">
                          </div>
                        </div>
                      </div>

                      <hr class="bg-secondary">

                      <div class="row">
                        <!-- Grupo: Btn Seleccionar proveedor -->
                        <div class="form-group col-md-6 formulario__grupo" id="grupo__proveedor">
                          <label for="proveedor" class="formulario__label">Seleccionar proveedor requerido
                            (Opcional)</label>
                          <div class="formulario__grupo-input input-group">

                            <button type="button" class="btn btn-info" data-bs-toggle="modal"
                              data-bs-target="#seleccionarProveedor">
                              <i class="fas fa-user"></i>
                              &nbsp;Seleccionar Proveedor
                            </button>

                          </div>
                        </div>
                      </div>

                      <h6 class="text-center col-12 p-4 text-muted advProveedor">
                        <strong>Seleccionar un proveedor</strong>
                      </h6>

                      <!-- Tabla donde deben de estar el proveedor seleccionado -->
                      <div class="row table__seleccionados" id="table">
                        <div class="col-12">
                          <div class="section-title">Información del Proveedor</div>
                          <p class="section-lead">Toda la información precisa del proveedor seleccionado.</p>

                          <div class="card">
                            <div class="card-body p-0 clienteBox">
                              <div class="table-responsive">
                                <table class="table table-striped">
                                  <thead>
                                    <tr>
                                      <th>ID</th>
                                      <th>Razon Social</th>
                                      <th>Direccion</th>
                                      <th>Correo</th>
                                      <th>RUC</th>
                                      <th>Número</th>
                                    </tr>
                                  </thead>
                                  <tbody id="contenido">

                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>

                        </div>
                      </div>


                      <hr class="bg-secondary">

                      <div class="row">
                        <!-- Grupo: Btn Seleccionar requerimiento de compra -->
                        <div class="form-group col-md-6 formulario__grupo" id="grupo__requerimiento">
                          <label for="requerimiento" class="formulario__label">Seleccionar requerimiento de compra
                            requerido</label>
                          <div class="formulario__grupo-input input-group">

                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                              data-bs-target="#seleccionarRequerimiento">
                              <i class="fas fa-shopping-bag"></i>
                              &nbsp;Seleccionar Requerimiento de compra
                            </button>

                          </div>
                        </div>
                      </div>

                      <h6 class="text-center col-12 p-4 text-muted advRequerimiento">
                        <strong>Seleccionar un requerimiento de compra</strong>
                      </h6>

                      <!-- Tabla donde deben de estar el requerimiento seleccionado -->
                      <div class="contenedor table__seleccionados_dos" id="table_requerimiento">
                        <div class="section-title">Información precisa del Requerimiento de compra</div>
                        <p class="section-lead">Toda la información precisa del Requerimiento de compra.</p>

                        <!-- 1ra fila -->
                        <div class="row">
                          <!-- Grupo: ID_REQUERIMIENTO  -->
                          <div class="form-group col-md-3 formulario__grupo" id="grupo__requerimiento">
                            <label for="id_requerimiento" class="formulario__label">ID Requerimiento</label>
                            <div class="formulario__grupo-input input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <i class="fas fa-fingerprint"></i>
                                </div>
                              </div>
                              <input type="text" disabled class="form-control" id="id_req" name="id_req">
                            </div>
                          </div>

                          <!-- Grupo: id_cusuario -->
                          <div class="form-group col-md-3 formulario__grupo" id="grupo__usuario">
                            <label for="usuario" class="formulario__label">ID Usuario</label>
                            <div class="formulario__grupo-input input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <i class="fas fa-user"></i>
                                </div>
                              </div>
                              <input type="text" disabled class="form-control" id="usuario" name="usuario">
                            </div>
                          </div>

                          <!-- Grupo: nombre  -->
                          <div class="form-group col-md-6 formulario__grupo" id="grupo__registrador">
                            <label for="registrador" class="formulario__label">Nombres y Apellidos del
                              registrador</label>
                            <div class="formulario__grupo-input input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <i class="fas fa-signature"></i>
                                </div>
                              </div>
                              <input type="text" disabled class="form-control" id="registrador" name="registrador">
                            </div>
                          </div>
                        </div>

                        <!-- * segunda fila -->
                        <div class="row">
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

                          <!-- Grupo: fecha -->
                          <div class="form-group col-md-5 formulario__grupo" id="grupo__fecha">
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
                          <div class="form-group col-md-4 formulario__grupo" id="grupo__hora">
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

                          <!-- Grupo: observacion  -->
                          <div class="form-group col-md-8 formulario__grupo" id="grupo__observacion">
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
                            <div class="section-title">Detalle del Requerimiento de compra</div>
                            <p class="section-lead">Todos los consumibles del Requerimiento de compra.</p>
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
                                <tbody id="contenido_requerimiento">

                                </tbody>
                              </table>

                              <!-- ? Fin de la tabla a elegir -->

                            </div>
                            <div class="row mt-4">
                              <div class="col-lg-8">
                                <div class="section-title">Monto del Requerimiento de compra: </div>
                                <p class="section-lead"> <strong>Nota: </strong>Al momento de intentar de registrar el
                                  requerimiento de compra, se adicionará el IGV.
                                </p>
                              </div>
                              <div class="col-lg-4 text-right">
                                <div class="invoice-detail-item">
                                  <div class="invoice-detail-name">Subtotal</div>
                                  <h5>
                                    <div class="invoice-detail-value" id="sub_total"></div>
                                  </h5>
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
  <script src="./../../../../assets/modules/bootstrap-daterangepicker/daterangepicker.js"></script>
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
  <script type="module" src="../controllers/NuevaOrdenCompra.js"></script>

  <script src="../tasks/CargarProveedores.js"></script>
  <script src="../tasks/CargarRequerimientos.js"></script>

  <script src="../controllers/CargarProveedor.js"></script>
  <script src="../controllers/CargarRequerimiento.js"></script>
  <!-- Modal para seleccionar al proveedor -->
  <?php include("seleccionar-proveedor.php") ?>
  <!-- Modal para seleccionar el requerimiento -->
  <?php include("seleccionar-requerimiento.php") ?>
</body>

</html>
