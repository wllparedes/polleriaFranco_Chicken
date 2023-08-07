<!-- Funcionalidades -->
<?php

include("./../../../../php/empezar_session.php");
include("./../../../../php/verificar_session.php");
include("./../../../../php/calcular-registros.php");

?>

<!-- Page Web -->
<?php include("./../../../../includes/_head.php") ?>

    <?php include("./../../../../includes/_navbar.php") ?>

      <?php include("./../../../../includes/mesero/_sidebar.php") ?>
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
                    S/. 187,13
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
                    S/. 4,732
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
                <div class="card-wrap">
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


          <!-- ! TERCERA FILA -->
          <div class="row">
            <div class="col-lg-8">
              <div class="card">
                <div class="card-header">
                  <h4>Ventas vs Compras</h4>
                </div>
                <div class="card-body">
                  <canvas id="myChart" height="158"></canvas>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card gradient-bottom">
                <div class="card-header">
                  <h4>Top 5 Consumibles</h4>
                </div>
                <div class="card-body">
                  <ul class="list-unstyled list-unstyled-border">
                    <li class="media">
                      <img class="mr-3 rounded" width="55" src="./../../../../assets/img/products/product-3-50.png" alt="product">
                      <div class="media-body">
                        <div class="float-right">
                          <div class="font-weight-600 text-muted text-small">86 Sales</div>
                        </div>
                        <div class="media-title">oPhone S9 Limited</div>
                        <div class="mt-1">
                          <div class="budget-price">
                            <div class="budget-price-square bg-primary" data-width="64%"></div>
                            <div class="budget-price-label">$68,714</div>
                          </div>
                          <div class="budget-price">
                            <div class="budget-price-square bg-danger" data-width="43%"></div>
                            <div class="budget-price-label">$38,700</div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="media">
                      <img class="mr-3 rounded" width="55" src="./../../../../assets/img/products/product-4-50.png" alt="product">
                      <div class="media-body">
                        <div class="float-right">
                          <div class="font-weight-600 text-muted text-small">67 Sales</div>
                        </div>
                        <div class="media-title">iBook Pro 2018</div>
                        <div class="mt-1">
                          <div class="budget-price">
                            <div class="budget-price-square bg-primary" data-width="84%"></div>
                            <div class="budget-price-label">$107,133</div>
                          </div>
                          <div class="budget-price">
                            <div class="budget-price-square bg-danger" data-width="60%"></div>
                            <div class="budget-price-label">$91,455</div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="media">
                      <img class="mr-3 rounded" width="55" src="./../../../../assets/img/products/product-1-50.png" alt="product">
                      <div class="media-body">
                        <div class="float-right">
                          <div class="font-weight-600 text-muted text-small">63 Sales</div>
                        </div>
                        <div class="media-title">Headphone Blitz</div>
                        <div class="mt-1">
                          <div class="budget-price">
                            <div class="budget-price-square bg-primary" data-width="34%"></div>
                            <div class="budget-price-label">$3,717</div>
                          </div>
                          <div class="budget-price">
                            <div class="budget-price-square bg-danger" data-width="28%"></div>
                            <div class="budget-price-label">$2,835</div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="media">
                      <img class="mr-3 rounded" width="55" src="./../../../../assets/img/products/product-3-50.png" alt="product">
                      <div class="media-body">
                        <div class="float-right">
                          <div class="font-weight-600 text-muted text-small">28 Sales</div>
                        </div>
                        <div class="media-title">oPhone X Lite</div>
                        <div class="mt-1">
                          <div class="budget-price">
                            <div class="budget-price-square bg-primary" data-width="45%"></div>
                            <div class="budget-price-label">$13,972</div>
                          </div>
                          <div class="budget-price">
                            <div class="budget-price-square bg-danger" data-width="30%"></div>
                            <div class="budget-price-label">$9,660</div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <!-- <li class="media">
                      <img class="mr-3 rounded" width="55" src="./../../../../assets/img/products/product-5-50.png" alt="product">
                      <div class="media-body">
                        <div class="float-right">
                          <div class="font-weight-600 text-muted text-small">19 Sales</div>
                        </div>
                        <div class="media-title">Old Camera</div>
                        <div class="mt-1">
                          <div class="budget-price">
                            <div class="budget-price-square bg-primary" data-width="35%"></div>
                            <div class="budget-price-label">$7,391</div>
                          </div>
                          <div class="budget-price">
                            <div class="budget-price-square bg-danger" data-width="28%"></div>
                            <div class="budget-price-label">$5,472</div>
                          </div>
                        </div>
                      </div>
                    </li> -->
                  </ul>
                </div>
                <div class="card-footer pt-3 d-flex justify-content-center">
                  <div class="budget-price justify-content-center">
                    <div class="budget-price-square bg-primary" data-width="20"></div>
                    <div class="budget-price-label">Selling Price</div>
                  </div>
                  <div class="budget-price justify-content-center">
                    <div class="budget-price-square bg-danger" data-width="20"></div>
                    <div class="budget-price-label">Budget Price</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- ! FIN DE LA TERCERA FILA -->




          <!-- ! CUARTA FILA -->
          <div class="row">
            <div class="col-lg-4">
              <div class="card gradient-bottom">
                <div class="card-header">
                  <h4>Top 5 Productos</h4>
                </div>
                <div class="card-body">
                  <ul class="list-unstyled list-unstyled-border">
                    <!-- <li class="media">
                      <img class="mr-3 rounded" width="55" src="./../../../../assets/img/products/product-3-50.png" alt="product">
                      <div class="media-body">
                        <div class="float-right">
                          <div class="font-weight-600 text-muted text-small">86 Sales</div>
                        </div>
                        <div class="media-title">oPhone S9 Limited</div>
                        <div class="mt-1">
                          <div class="budget-price">
                            <div class="budget-price-square bg-primary" data-width="64%"></div>
                            <div class="budget-price-label">$68,714</div>
                          </div>
                          <div class="budget-price">
                            <div class="budget-price-square bg-danger" data-width="43%"></div>
                            <div class="budget-price-label">$38,700</div>
                          </div>
                        </div>
                      </div>
                    </li> -->
                    <!-- <li class="media">
                      <img class="mr-3 rounded" width="55" src="./../../../../assets/img/products/product-4-50.png" alt="product">
                      <div class="media-body">
                        <div class="float-right">
                          <div class="font-weight-600 text-muted text-small">67 Sales</div>
                        </div>
                        <div class="media-title">iBook Pro 2018</div>
                        <div class="mt-1">
                          <div class="budget-price">
                            <div class="budget-price-square bg-primary" data-width="84%"></div>
                            <div class="budget-price-label">$107,133</div>
                          </div>
                          <div class="budget-price">
                            <div class="budget-price-square bg-danger" data-width="60%"></div>
                            <div class="budget-price-label">$91,455</div>
                          </div>
                        </div>
                      </div>
                    </li> -->
                    <li class="media">
                      <img class="mr-3 rounded" width="55" src="./../../../../assets/img/products/product-1-50.png" alt="product">
                      <div class="media-body">
                        <div class="float-right">
                          <div class="font-weight-600 text-muted text-small">63 Sales</div>
                        </div>
                        <div class="media-title">Headphone Blitz</div>
                        <div class="mt-1">
                          <div class="budget-price">
                            <div class="budget-price-square bg-primary" data-width="34%"></div>
                            <div class="budget-price-label">$3,717</div>
                          </div>
                          <div class="budget-price">
                            <div class="budget-price-square bg-danger" data-width="28%"></div>
                            <div class="budget-price-label">$2,835</div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="media">
                      <img class="mr-3 rounded" width="55" src="./../../../../assets/img/products/product-3-50.png" alt="product">
                      <div class="media-body">
                        <div class="float-right">
                          <div class="font-weight-600 text-muted text-small">28 Sales</div>
                        </div>
                        <div class="media-title">oPhone X Lite</div>
                        <div class="mt-1">
                          <div class="budget-price">
                            <div class="budget-price-square bg-primary" data-width="45%"></div>
                            <div class="budget-price-label">$13,972</div>
                          </div>
                          <div class="budget-price">
                            <div class="budget-price-square bg-danger" data-width="30%"></div>
                            <div class="budget-price-label">$9,660</div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="media">
                      <img class="mr-3 rounded" width="55" src="./../../../../assets/img/products/product-5-50.png" alt="product">
                      <div class="media-body">
                        <div class="float-right">
                          <div class="font-weight-600 text-muted text-small">19 Sales</div>
                        </div>
                        <div class="media-title">Old Camera</div>
                        <div class="mt-1">
                          <div class="budget-price">
                            <div class="budget-price-square bg-primary" data-width="35%"></div>
                            <div class="budget-price-label">$7,391</div>
                          </div>
                          <div class="budget-price">
                            <div class="budget-price-square bg-danger" data-width="28%"></div>
                            <div class="budget-price-label">$5,472</div>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
                <div class="card-footer pt-3 d-flex justify-content-center">
                  <div class="budget-price justify-content-center">
                    <div class="budget-price-square bg-primary" data-width="20"></div>
                    <div class="budget-price-label">Selling Price</div>
                  </div>
                  <div class="budget-price justify-content-center">
                    <div class="budget-price-square bg-danger" data-width="20"></div>
                    <div class="budget-price-label">Budget Price</div>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-lg-8">
              <div class="card">
                <div class="card-header">
                  <h4>Proveedores</h4>
                  <div class="card-header-action">
                    <a href="#" class="btn btn-danger">Ver más <i class="fas fa-chevron-right"></i></a>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive table-invoice">
                    <table class="table table-striped">
                      <tr>
                        <th>Proveedor ID</th>
                        <th>Razón Social</th>
                        <th>Status</th>
                        <th>Due Date</th>
                        <th>Action</th>
                      </tr>
                      <tr>
                        <td><a href="#">INV-87239</a></td>
                        <td class="font-weight-600">Kusnadi</td>
                        <td>
                          <div class="badge badge-warning">Unpaid</div>
                        </td>
                        <td>July 19, 2018</td>
                        <td>
                          <a href="#" class="btn btn-primary">Detail</a>
                        </td>
                      </tr>
                      <tr>
                        <td><a href="#">INV-48574</a></td>
                        <td class="font-weight-600">Hasan Basri</td>
                        <td>
                          <div class="badge badge-success">Paid</div>
                        </td>
                        <td>July 21, 2018</td>
                        <td>
                          <a href="#" class="btn btn-primary">Detail</a>
                        </td>
                      </tr>
                      <tr>
                        <td><a href="#">INV-76824</a></td>
                        <td class="font-weight-600">Muhamad Nuruzzaki</td>
                        <td>
                          <div class="badge badge-warning">Unpaid</div>
                        </td>
                        <td>July 22, 2018</td>
                        <td>
                          <a href="#" class="btn btn-primary">Detail</a>
                        </td>
                      </tr>
                      <tr>
                        <td><a href="#">INV-84990</a></td>
                        <td class="font-weight-600">Agung Ardiansyah</td>
                        <td>
                          <div class="badge badge-warning">Unpaid</div>
                        </td>
                        <td>July 22, 2018</td>
                        <td>
                          <a href="#" class="btn btn-primary">Detail</a>
                        </td>
                      </tr>
                      <tr>
                        <td><a href="#">INV-87320</a></td>
                        <td class="font-weight-600">Ardian Rahardiansyah</td>
                        <td>
                          <div class="badge badge-success">Paid</div>
                        </td>
                        <td>July 28, 2018</td>
                        <td>
                          <a href="#" class="btn btn-primary">Detail</a>
                        </td>
                      </tr>
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
