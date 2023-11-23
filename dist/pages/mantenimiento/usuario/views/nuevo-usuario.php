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
  <title>Nuevo Usuario</title>
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
  <!-- <link rel="stylesheet" href="./../../../../assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css"> -->
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

      <?php include("./../../../../includes/recepcionista/_sidebar.php") ?>


      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Formulario: Nuevo Usuario</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Inicio</a></div>
              <div class="breadcrumb-item">Mantenimiento</a></div>
              <div class="breadcrumb-item">Nuevo Usuario</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Nuevo Usuario</h2>
            <p class="section-lead">Rellene la información requerida para poder crear un nuevo usuario.</p>

            <!-- ! FILA  -->
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Formulario:</h4>
                  </div>
                  <div class="card-body">
                    <form class="forms-sample form-usuario" id="formulario">

                      <div class="row">

                        <!-- Grupo: Nombres -->
                        <div class="form-group col-md-6 formulario__grupo" id="grupo__nombres">
                          <label for="nombres" class="formulario__label">Nombres</label>
                          <div class="formulario__grupo-input input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-user"></i>
                              </div>
                            </div>
                            <input type="text" class="form-control formulario__grupo-input" id="nombres" name="nombres"
                              placeholder="John Alexander">
                            <span class="fas fa-exclamation-circle formulario__validacion-estado"></span>
                          </div>
                          <div class="formulario__input-error">
                            El nombre tiene que ser de 4 a 20 dígitos y solo puede contener numeros, letras y
                            guion bajo.
                          </div>
                        </div>

                        <!-- Grupo: Apellidos -->
                        <div class="form-group col-md-6 formulario__grupo" id="grupo__apellidos">
                          <label for="apellidos" class="formulario__label">Apellidos</label>
                          <div class="formulario__grupo-input input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-user"></i>
                              </div>
                            </div>
                            <input type="text" class="form-control formulario__grupo-input" id="apellidos"
                              name="apellidos" placeholder="Boe Smith">
                            <span class="fas fa-exclamation-circle formulario__validacion-estado"></span>
                          </div>
                          <div class="formulario__input-error">
                            El apellido tiene que ser de 4 a 20 dígitos y solo puede contener numeros, letras y guion
                            bajo.
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <!-- Grupo: Telefono -->
                        <div class="form-group col-md-6 formulario__grupo" id="grupo__numero">
                          <label for="numero" class="formulario__label">Telefono (Formato PE)</label>
                          <div class="formulario__grupo-input input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-phone"></i>
                              </div>
                            </div>
                            <input type="text" class="form-control formulario__grupo-input phone-number" id="numero"
                              name="numero" placeholder="+51 982 029 923">
                            <span class="fas fa-exclamation-circle formulario__validacion-estado"></span>
                          </div>
                          <div class="formulario__input-error">
                            El Telefono debe de empezar por el prefijo +51 y seguidamente el número de nueve digitos que
                            debe de comenzar por el 9.
                          </div>
                        </div>

                        <!-- Grupo: DNI -->
                        <div class="form-group col-md-6 formulario__grupo" id="grupo__dni">
                          <label for="dni" class="formulario__label">DNI</label>
                          <div class="formulario__grupo-input input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-address-card"></i>
                              </div>
                            </div>
                            <input type="text" class="form-control formulario__grupo-input" id="dni" name="dni"
                              placeholder="73419750">
                            <span class="fas fa-exclamation-circle formulario__validacion-estado"></span>
                          </div>
                          <div class="formulario__input-error">
                            EL dni solo puede contener números y el maximo son 8 dígitos.
                          </div>
                        </div>
                      </div>


                      <div class="row">
                        <!-- Grupo: Nombre de usuario -->
                        <div class="form-group col-md-6 formulario__grupo" id="grupo__userName">
                          <label for="userName" class="formulario__label">Nombre de Usuario</label>
                          <div class="formulario__grupo-input input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-user"></i>
                              </div>
                            </div>
                            <input type="text" class="form-control formulario__grupo-input" id="userName"
                              name="userName" placeholder="John Boe">
                            <span class="fas fa-exclamation-circle formulario__validacion-estado"></span>
                          </div>
                          <div class="formulario__input-error">
                            El nombre de ususario tiene que ser de 5 a 20 dígitos y solo puede contener numeros, letras
                            y
                            guion bajo.
                          </div>
                        </div>


                        <!-- Grupo: Correo -->
                        <div class="form-group col-md-6 formulario__grupo" id="grupo__correo">
                          <label for="correo" class="formulario__label">Correo</label>
                          <div class="formulario__grupo-input input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-at"></i>
                              </div>
                            </div>
                            <input type="email" class="form-control formulario__grupo-input" id="correo" name="correo"
                              placeholder="johnboe@gmail.com">
                            <span class="fas fa-exclamation-circle formulario__validacion-estado"></span>
                          </div>
                          <div class="formulario__input-error">
                            El correo debe de ser valido, contar con una extensión @gmail.com o @hotmail.com.
                          </div>
                        </div>
                      </div>

                      <div class="row">

                        <!-- Grupo: clave -->
                        <div class="form-group col-md-6 formulario__grupo" id="grupo__password">
                          <label for="password" class="formulario__label">Contraseña</label>
                          <div class="formulario__grupo-input input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-key"></i>
                              </div>
                            </div>
                            <input type="password" class="form-control formulario__grupo-input" id="password"
                              name="password" placeholder="*************">
                            <span class="fas fa-exclamation-circle formulario__validacion-estado"></span>
                          </div>
                          <div class="formulario__input-error">
                            La contraseña tiene que tener una longitud mayor a 5 caracteres, debe contener al menos una
                            mayúscula, números y algún caracter especial.
                          </div>
                        </div>

                        <!-- Grupo: Cargo -->
                        <div class="form-group col-md-3 formulario__grupo" id="grupo__cargo">
                          <label for="cargo" class="formulario__label">Cargo</label>
                          <div class="formulario__grupo-input input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-certificate"></i>
                              </div>
                            </div>

                            <div id="select-cargos" class="form-control">
                              <!-- Lista de cargos a elegir -->
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
  <!-- Nice scriollbar -->
  <script src="./../../../../assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <!-- <script src="./../../../../assets/modules/moment.min.js"></script> -->
  <script src="./../../../../assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  <!-- darle formato a los inputs para telef -->
  <script src="./../../../../assets/modules/cleave-js/dist/cleave.min.js"></script>
  <script src="./../../../../assets/modules/cleave-js/dist/addons/cleave-phone.pe.js"></script>
  <!-- Para la seguridad de una contraseña -->
  <!-- <script src="./../../../../assets/modules/jquery-pwstrength/jquery.pwstrength.min.js"></script> -->
  <!-- <script src="./../../../../assets/modules/bootstrap-daterangepicker/daterangepicker.js"></script> -->
  <!-- Para las fechas -->
  <!-- <script src="./../../../../assets/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script> -->
  <!-- Para pickear los colores -->
  <!-- <script src="./../../../../assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script> -->
  <!-- pickaear el tiempo -->
  <script src="./../../../../assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
  <!-- <script src="./../../../../assets/modules/select2/dist/js/select2.full.min.js"></script> Select2> -->
  <!-- Estilos a los select -->
  <!-- <script src="./../../../../assets/modules/jquery-selectric/jquery.selectric.min.js"></script> -->


  <!-- Page Specific JS File -->
  <script src="./../../../../assets/js/page/forms-advanced-forms.js"></script>
  <!-- Template JS File -->
  <script src="./../../../../assets/js/scripts.js"></script>
  <!-- Sweet Alert -->
  <script src="./../../../../assets/modules/sweetalert/sweetalert2.all.min.js"></script>
  <script src="./../../../../assets/js/page/modules-sweetalert.js"></script>
  <!-- Funcionalidades Pages -->
  <script type="module" src="../controllers/NuevoUsuario.js"></script>
  <script src="../../../../assets/js/underscore-min.js"></script>
  <script src="../../../../assets/js/scripts/redirect.js"></script>
  <script src="../tasks/cargar-cargos.js"></script>
  <!-- Virtual select -->
  <script src="./../../../../assets/modules/virtual-select/virtual-select.min.js"></script>
</body>

</html>
