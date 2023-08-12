<!-- Funcionalidades -->
<?php

include("./../../../../php/empezar_session.php");
include("./../../../../php/verificar_session.php");

$ruta_sidebar = $_SESSION['nom_cargo'] == 'Recepcionista' ? "./../../../../includes/recepcionista/_sidebar.php" : "./../../../../includes/mesero/_sidebar.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Nuevo Pedido</title>
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

      <?php include($ruta_sidebar); ?>


      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Formulario: Nuevo Pedido</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Inicio</a></div>
              <div class="breadcrumb-item">Pedidos</a></div>
              <div class="breadcrumb-item">Nuevo Pedido</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Nuevo Pedido</h2>
            <p class="section-lead">Rellene la información requerida para poder crear un nuevo pedido.
            </p>

            <!-- ! FILA  -->
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Formulario:</h4>
                  </div>
                  <div class="card-body">
                    <form class="forms-sample form-cliente" id="formulario">

                      <div class="row">

                        <!-- Grupo: Nombre-->
                        <div class="form-group col-md-6 formulario__grupo" id="grupo__nombre">
                          <label for="nombre" class="formulario__label">Nombre del Cliente</label>
                          <div class="formulario__grupo-input input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-user"></i>
                              </div>
                            </div>
                            <input type="text" class="form-control formulario__grupo-input" id="nombre" name="nombre"
                              placeholder="John Boe">
                            <span class="fas fa-exclamation-circle formulario__validacion-estado"></span>
                          </div>
                          <div class="formulario__input-error">
                            El nombre del cliente tiene que ser de 4 a 20 dígitos y solo puede
                            contener letras y
                            guion bajo.
                          </div>
                        </div>

                        <!-- Grupo: N° de Mesa  -->
                        <div class="form-group col-md-3 formulario__grupo" id="grupo__descripcion">
                          <label for="descripcion" class="formulario__label">Número de Mesa (Opcional)</label>
                          <div class="formulario__grupo-input input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-calculator"></i>
                              </div>
                            </div>
                            

                            <!-- Seleccionar Mesa -->
                            <div id="select-mesas" class="form-control"></div>

                          </div>
                        </div>
                      </div>

                      <div class="row">

                        <!-- Grupo: Observación-->
                        <div class="form-group col-md-6 formulario__grupo" id="grupo__observacion">
                          <label for="observacion" class="formulario__label">Observación (Opcional)</label>
                          <div class="formulario__grupo-input input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-eye"></i>
                              </div>
                            </div>
                            <input type="text" class="form-control formulario__grupo-input" id="observacion" name="observacion"
                              placeholder="El 1/4 del Mostrito sin papas fritas...">
                            <span class="fas fa-exclamation-circle formulario__validacion-estado"></span>
                          </div>
                          <div class="formulario__input-error">
                            La observación solo debe de contener letras, números, guiones y el /.
                          </div>
                        </div>
                      </div>


                      <hr class="bg-secondary">

                      <div class="row">
                        <!-- Grupo: Btn Seleccionar Productos -->
                        <div class="form-group col-md-6 formulario__grupo" id="grupo__nombre">
                          <label for="nombre" class="formulario__label">Seleccionar consumibles a pedir</label>
                          <div class="formulario__grupo-input input-group">

                            <button type="button" class="btn btn-info" data-bs-toggle="modal"
                              data-bs-target="#seleccionarConsumibles">
                              <i class="fas fa-utensils"></i>
                              &nbsp;Seleccionar Consumibles
                            </button>

                          </div>
                        </div>
                      </div>

                      <h6 class="text-center col-12 p-4 text-muted advConsumible">
                        <strong>Seleccionar al menos un consumible</strong>
                      </h6>

                      <!-- Tabla donde deben de estar los productos seleccionados -->
                      <div class="row table__seleccionados" id="table">
                        <div class="col-12">
                          <div class="card">
                            <div class="card-body p-0 consumiblesBox">
                              <div class="table-responsive">
                                <table class="table table-striped">
                                  <thead>
                                    <tr>
                                      <th>ID</th>
                                      <th>Nombre</th>
                                      <th>Categoria</th>
                                      <th>Descripción</th>
                                      <th>Precio</th>
                                      <th>Cantidad</th>
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
  <script type="module" src="../controllers/NuevoPedido.js"></script>
  <script src="../tasks/CargarConsumibles.js"></script>
  <script src="../tasks/CargarMesas.js"></script>
  <script src="../controllers/cargarConsumibles.js"></script>
  <!-- Modal para seleccionar consumibles -->
  <?php include("seleccionar-consumibles.php") ?>
</body>

</html>
