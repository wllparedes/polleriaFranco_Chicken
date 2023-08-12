<!-- Funcionalidades -->
<?php

include("./../../../../php/empezar_session.php");
include("./../../../../php/verificar_session.php");
include("./../../../../php/calcular-registros.php");
include("./../../../../php/ventas_compras.php");

?>

<!-- Page Web -->
<?php include("./../../../../includes/_head.php") ?>

<?php include("./../../../../includes/_navbar.php") ?>

<?php include("./../../../../includes/almacenero/_sidebar.php") ?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">

    <!-- ! INICIO DE LA PRIMERA FILA -->
    <div class="row">
      <!-- * 1ra CARTA -->
      <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
          <div class="card-stats">
            <div class="card-stats-title">Nuestras estadisticas - <strong>Requerimiento de compra</strong></div>
            <div class="card-stats-items">
              <div class="card-stats-item">
                <div class="card-stats-item-count">24</div>
                <div class="card-stats-item-label">Añadidas</div>
              </div>
              <div class="card-stats-item">
                <div class="card-stats-item-count">12</div>
                <div class="card-stats-item-label">Actualizadas</div>
              </div>
              <div class="card-stats-item">
                <div class="card-stats-item-count">23</div>
                <div class="card-stats-item-label">Eliminadas</div>
              </div>
            </div>
          </div>
          <div class="card-icon shadow-primary bg-primary">
            <i class="fas fa-clipboard-list"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total</h4>
            </div>
            <?php echo calcular_registros('requerimiento') ?>
          </div>
        </div>
      </div>
      <!-- * FIN DE LA 1RA CARTA -->


      <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
          <div class="card-chart">
            <canvas id="balance-chart" height="80"></canvas>
          </div>
          <div class="card-icon shadow-danger bg-danger">
            <i class="fas fa-dollar-sign"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Balance de Ventas</h4>
            </div>
            <div class="card-body">
              <?php echo ventas_compras('ventas') ?>
            </div>
          </div>
        </div>
      </div>


      <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
          <div class="card-chart">
            <canvas id="sales-chart" height="80"></canvas>
          </div>
          <div class="card-icon shadow-info bg-info">
            <i class="fas fa-print"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Balance de Gastos</h4>
            </div>
            <div class="card-body">
              <?php echo ventas_compras('compras') ?>

            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- ! FIN DE LA PRIMERA FILA -->

    <!-- ! INICIO DE LA SEGUNDA FILA -->
    <div class="row">


      <!-- * 1ra CARTA -->
      <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
          <div class="card-stats">
            <div class="card-stats-title">Nuestras estadisticas - <strong>Ordenes de Compra</strong></div>
            <div class="card-stats-items">
              <div class="card-stats-item">
                <div class="card-stats-item-count">24</div>
                <div class="card-stats-item-label">Añadidas</div>
              </div>
              <div class="card-stats-item">
                <div class="card-stats-item-count">23</div>
                <div class="card-stats-item-label">Actualizados</div>
              </div>
              <div class="card-stats-item">
                <div class="card-stats-item-count">23</div>
                <div class="card-stats-item-label">Eliminadas</div>
              </div>
            </div>
          </div>
          <div class="card-icon shadow-warning bg-warning">
            <i class="fas fa-shopping-bag"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total</h4>
            </div>
            <?php echo calcular_registros('ordendecompra') ?>
          </div>
        </div>
      </div>
      <!-- * FIN DE LA 1RA CARTA -->


      <!-- * 2da CARTA -->
      <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
          <div class="card-stats">
            <div class="card-stats-title">Nuestras estadisticas - <strong>M. de Productos</strong></div>
            <div class="card-stats-items">
              <div class="card-stats-item">
                <div class="card-stats-item-count">24</div>
                <div class="card-stats-item-label">Añadidas</div>
              </div>
              <div class="card-stats-item">
                <div class="card-stats-item-count">23</div>
                <div class="card-stats-item-label">Actualizados</div>
              </div>
              <div class="card-stats-item">
                <div class="card-stats-item-count">23</div>
                <div class="card-stats-item-label">Eliminadas</div>
              </div>
            </div>
          </div>
          <div class="card-icon shadow-success bg-success">
            <i class="fas fa-seedling"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total</h4>
            </div>
            <?php echo calcular_registros('producto') ?>
          </div>
        </div>
      </div>
      <!-- * FIN DE LA 2dA CARTA -->

      <!-- * 3ra CARTA -->
      <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
          <div class="card-stats">
            <div class="card-stats-title">Nuestras estadisticas - <strong>M. de Categorias</strong></div>
            <div class="card-stats-items">
              <div class="card-stats-item">
                <div class="card-stats-item-count">24</div>
                <div class="card-stats-item-label">Añadidas</div>
              </div>
              <div class="card-stats-item">
                <div class="card-stats-item-count">24</div>
                <div class="card-stats-item-label">Actualizados</div>
              </div>
              <div class="card-stats-item">
                <div class="card-stats-item-count">23</div>
                <div class="card-stats-item-label">Eliminadas</div>
              </div>
            </div>
          </div>
          <div class="card-icon shadow-dark bg-dark">
            <i class="fas fa-drumstick-bite""></i>
                </div>
                <div class=" card-wrap">
              <div class="card-header">
                <h4>Total</h4>
              </div>
              <?php echo calcular_registros('categoria') ?>
          </div>
        </div>
      </div>
      <!-- * FIN DE LA 3RA CARTA -->



    </div>
    <!-- ! FIN DE LA SEGUNDA FILA -->


    <!-- ! CUARTA FILA -->
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h4>Ordenes de Compras</h4>
            <div class="card-header-action">
              <a href="../../../abastecimiento/orden_compra/views/lista-ordenes-compras.php" class="btn btn-danger">Ver
                más <i class="fas fa-chevron-right"></i></a>
            </div>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive table-invoice">
              <table class="table table-striped" id="tabla">
                <thead>
                  <tr>
                    <th>ID Orden</th>
                    <th>ID Requerimiento</th>
                    <th>Proveedor</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>IGV</th>
                    <th>Total</th>
                    <th>Estado</th>
                  </tr>
                </thead>
                <tbody id="content">

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- ! FIN DE LA CUARTA FILA -->



  </section>
</div>

<?php include("./../../../../includes/_footer.php") ?>

<?php include("./../../../../includes/_scripts.php") ?>
<script src="../controllers/ListaOrdenesCompras.js"></script>
