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
  <title>Lista de Productos</title>
  <link rel="icon" href="./../../../../assets/img/login/icon.png" type="image/x-icon">
  <!-- General CSS Files -->
  <link rel="stylesheet" href="./../../../../assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="./../../../../assets/modules/fontawesome/css/all.min.css">
  <!-- CSS Libraries -->
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

      <?php include("./../../../../includes/almacenero/_sidebar.php") ?>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Tabla: Productos</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Inicio</a></div>
              <div class="breadcrumb-item">Mantenimiento</div>
              <div class="breadcrumb-item">Lista de Productos</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Lista de Productos</h2>
            <p class="section-lead">Lista de Productos registrados.</p>


            <!-- ! SEGUNDA FILA -->
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Tabla Productos:</h4>
                    <div class="card-header-form">
                      <form>
                        <div class="input-group">
                          <input type="search" class="form-control" placeholder="Buscar producto" id="search">
                          <div class="input-group-btn">
                            <button disabled class="btn btn-primary"><i class="fas fa-search"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">

                      <table id="tabla" class="table table-hover">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Categoria</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                          </tr>
                        </thead>

                        <tbody id="productos-result">
                        <tbody>
                          <!-- Busqueda de productos -->
                        </tbody>
                        </tbody>

                        <tbody id="content">
                          <!-- Lista de productos -->
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- ! FIN DE LA SEGUNDA FILA -->


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
  <!-- Phone PE -->
  <!-- <script src="./../../../../assets/modules/cleave-js/dist/cleave.min.js"></script> -->
  <!-- <script src="./../../../../assets/modules/cleave-js/dist/addons/cleave-phone.pe.js"></script> -->
  <!-- <script src="./../../../../assets/js/page/forms-advanced-forms.js"></script> -->

  <!-- JS Libraies -->
  <script src="./../../../../assets/modules/jquery-ui/jquery-ui.min.js"></script>

  <!-- Page Specific JS File -->
  <script src="./../../../../assets/js/page/components-table.js"></script>

  <!-- Template JS File -->
  <script src="./../../../../assets/js/scripts.js"></script>
  <!-- Scrollbar smooth-scrollbar -->
  <script src="./../../../../assets/modules/smooth-scrollbar/smooth-scrollbar.js"></script>
  <script src="./../../../../assets/modules/smooth-scrollbar/plugins/overscroll.js"></script>
  <script src="./../../../../assets/js/custom.js"></script>
  <!-- Sweet Alert -->
  <script src="./../../../../assets/modules/sweetalert/sweetalert2.all.min.js"></script>
  <script src="./../../../../assets/js/page/modules-sweetalert.js"></script>
  <!-- Funcionalidades web -->
  <script type="module" src="../controllers/ListaProductos.js"></script>
  <!-- Underscore -->
  <script src="../../../../assets/js/underscore-min.js"></script>

  <script src="../tasks/cargar-categorias.js"></script>
  <!-- Virtual select -->
  <script src="./../../../../assets/modules/virtual-select/virtual-select.min.js"></script>
  <!-- Modal Actualziar producto -->
  <?php include("actualizar-producto.php") ?>

</body>

</html>
