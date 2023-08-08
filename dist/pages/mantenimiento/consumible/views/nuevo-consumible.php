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
  <title>Nuevo Consumible</title>
  <link rel="icon" href="./../../../../assets/img/login/icon.png" type="image/x-icon">

  <!-- General CSS Files -->
  <link rel="stylesheet" href="./../../../../assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="./../../../../assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="./../../../../assets/modules/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet"
    href="./../../../../assets/modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <link rel="stylesheet" href="./../../../../assets/modules/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="./../../../../assets/modules/jquery-selectric/selectric.css">
  <link rel="stylesheet" href="./../../../../assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
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

<body id="my-scrollbar">
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>

      <?php include("./../../../../includes/_navbar.php") ?>

      <?php include("./../../../../includes/recepcionista/_sidebar.php") ?>


      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Formulario: Nuevo Consumible</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Inicio</a></div>
              <div class="breadcrumb-item">Mantenimiento</a></div>
              <div class="breadcrumb-item">Nuevo Consumible</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Nuevo Consumible</h2>
            <p class="section-lead">Rellene la información requerida para poder crear un nuevo consumible.
            </p>

            <!-- ! FILA  -->
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Formulario:</h4>
                  </div>
                  <div class="card-body">
                    <form class="forms-sample form-consumible" id="formulario">

                      <div class="row">

                        <!-- Grupo: Nombre -->
                        <div class="form-group col-md-6 formulario__grupo" id="grupo__consumible">
                          <label for="consumible" class="formulario__label">Nombre</label>
                          <div class="formulario__grupo-input input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-utensils"></i>
                              </div>
                            </div>
                            <input type="text" class="form-control formulario__grupo-input" id="consumible"
                              name="consumible" placeholder="1/4 de Mostrito">
                            <span class="fas fa-exclamation-circle formulario__validacion-estado"></span>
                          </div>
                          <div class="formulario__input-error">
                            El nombre del consumible debe ser de 5 a 35 dígitos y debe de
                            tener la porción.
                          </div>
                        </div>

                        <!-- Grupo: Descripcion -->
                        <div class="form-group col-md-6 formulario__grupo" id="grupo__descripcion">
                          <label for="descripcion" class="formulario__label">Descripción</label>
                          <div class="formulario__grupo-input input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-keyboard"></i>
                              </div>
                            </div>
                            <input maxlength="90" type="text" class="form-control formulario__grupo-input"
                              id="descripcion" name="descripcion"
                              placeholder="“Mostrito” combina dos platos peruanos tradicionales: pollo a la brasa...">
                            <span class="fas fa-exclamation-circle formulario__validacion-estado"></span>
                          </div>
                          <div class="formulario__input-error">
                            La descripción tiene que ser de 5 a 90 digitos y solo puede
                            tener letras, comas, y puntos.
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <!-- Grupo: Precio -->
                        <div class="form-group col-md-6 formulario__grupo" id="grupo__precio">
                          <label for="precio" class="formulario__label">Precio</label>
                          <div class="formulario__grupo-input input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-dollar-sign"></i>
                              </div>
                            </div>
                            <input type="text" class="form-control formulario__grupo-input" id="precio" name="precio"
                              placeholder="S/. 22.00">
                            <span class="fas fa-exclamation-circle formulario__validacion-estado"></span>
                          </div>
                          <div class="formulario__input-error">
                            El precio debe de ser números, se aceptan hasta 2 decimales pero
                            no letras ni simbolos.
                          </div>
                        </div>

                        <!-- Grupo: Categoria -->
                        <div class="form-group col-md-6 formulario__grupo" id="grupo__categoria">
                          <label for="categoria" class="formulario__label">Categoria</label>
                          <div class="formulario__grupo-input input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-certificate"></i>
                              </div>
                            </div>

                            <div id="select-categorias" class="form-control">
                              <!-- Lista de categorias a elegir -->
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
  <!-- <script src="./../../../../assets/modules/moment.min.js"></script> -->
  <!-- <script src="./../../../../assets/js/stisla.js"></script> -->

  <!-- JS Libraies -->
  <!-- <script src="./../../../../assets/modules/cleave-js/dist/cleave.min.js"></script> -->
  <!-- <script src="./../../../../assets/modules/cleave-js/dist/addons/cleave-phone.pe.js"></script> -->
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
  <!-- Scrollbar smooth-scrollbar -->
  <script src="./../../../../assets/modules/smooth-scrollbar/smooth-scrollbar.js"></script>
  <script src="./../../../../assets/modules/smooth-scrollbar/plugins/overscroll.js"></script>
  <script src="./../../../../assets/js/custom.js"></script>

  <!-- Template JS File -->
  <script src="./../../../../assets/js/scripts.js"></script>
  <!-- Sweet Alert -->
  <script src="./../../../../assets/modules/sweetalert/sweetalert2.all.min.js"></script>
  <script src="./../../../../assets/js/page/modules-sweetalert.js"></script>
  <!-- Funcionalidades Pages -->
  <script type="module" src="../controllers/NuevoConsumible.js"></script>
  <script src="../../../../assets/js/underscore-min.js"></script>
  <script src="../../../../assets/js/scripts/redirect.js"></script>
  <script src="../tasks/cargar-categorias.js"></script>
  <!-- Virtual select -->
  <script src="./../../../../assets/modules/virtual-select/virtual-select.min.js"></script>
</body>

</html>
