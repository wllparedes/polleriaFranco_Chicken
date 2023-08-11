<!-- Funcionalidades -->
<?php

include("./../../../../php/empezar_session.php");
include("./../../../../php/verificar_session.php");

$orden_id = $_GET['orden_id'];
$detalleOrdenJSON = $_GET['detalle'];
$detalleOrden = json_decode(urldecode($detalleOrdenJSON), true);

$empresa = $detalleOrden['empresa'][0];
$orden = $detalleOrden['orden'][0];
$productos = $detalleOrden['productos'];
$proveedor = $detalleOrden['proveedor'][0];
$requerimiento = $detalleOrden['requerimiento'][0];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Visualizar Orden de Compra</title>
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

      <?php include("./../../../../includes/almacenero/_sidebar.php") ?>


      <!-- Main content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Visualización de la Orden de compra</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Inicio</a></div>
              <div class="breadcrumb-item">Abastecimiento</div>
              <div class="breadcrumb-item">Ver Orden</div>
            </div>
          </div>

          <div class="section-body">
            <div class="invoice">
              <div class="invoice-print">
                <div class="section-title">Información precisa de la Empresa</div>
                <p class="section-lead">Toda la información precisa de la Empresa.</p>

                <div class="row">

                  <!-- Grupo: razon_social  -->
                  <div class="form-group col-md-4 formulario__grupo" id="grupo__razon_social">
                    <label for="razon_social" class="formulario__label">Razon Social</label>
                    <div class="formulario__grupo-input input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-user"></i>
                        </div>
                      </div>
                      <input type="text" disabled class="form-control" id="razon_social" name="razon_social"
                        value=" <?php echo $empresa['razon_social'] ?> ">
                    </div>
                  </div>

                  <!-- Grupo: RUC  -->
                  <div class="form-group col-md-4 formulario__grupo" id="grupo__ruc">
                    <label for="ruc" class="formulario__label">RUC</label>
                    <div class="formulario__grupo-input input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-hashtag"></i>
                        </div>
                      </div>
                      <input type="text" disabled class="form-control" id="ruc" name="ruc"
                        value=" <?php echo $empresa['ruc'] ?> ">
                    </div>
                  </div>

                  <!-- Grupo: EMAIL  -->
                  <div class="form-group col-md-4 formulario__grupo" id="grupo__email">
                    <label for="email" class="formulario__label">Correo</label>
                    <div class="formulario__grupo-input input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-at"></i>
                        </div>
                      </div>
                      <input type="text" disabled class="form-control" id="email" name="email"
                        value=" <?php echo $empresa['email'] ?> ">
                    </div>
                  </div>

                </div>


                <div class="row">

                  <!-- Grupo: ciudad  -->
                  <div class="form-group col-md-3 formulario__grupo" id="grupo__ciudad">
                    <label for="ciudad" class="formulario__label">Ciudad</label>
                    <div class="formulario__grupo-input input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-map"></i>
                        </div>
                      </div>
                      <input type="text" disabled class="form-control" id="ciudad" name="ciudad"
                        value="<?php echo $empresa['ciudad'] ?> ">
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
                        value=" <?php echo $empresa['direccion'] ?> ">
                    </div>
                  </div>


                  <!-- Grupo: telefono  -->
                  <div class="form-group col-md-4 formulario__grupo" id="grupo__telefono">
                    <label for="telefono" class="formulario__label">Telefono</label>
                    <div class="formulario__grupo-input input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-phone"></i>
                        </div>
                      </div>
                      <input type="text" disabled class="form-control" id="telefono" name="telefono"
                        value="<?php echo $empresa['telefono'] ?> ">
                    </div>
                  </div>

                </div>

                <div class="row">
                  <!-- Grupo: telefono fijo  -->
                  <div class="form-group col-md-4 formulario__grupo" id="grupo__telefono_fijo">
                    <label for="telefono_fijo" class="formulario__label">Telefono Fijo</label>
                    <div class="formulario__grupo-input input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-headset"></i>
                        </div>
                      </div>
                      <input type="text" disabled class="form-control" id="telefono_fijo" name="telefono_fijo"
                        value="<?php echo $empresa['telefono_fijo'] ?> ">
                    </div>
                  </div>
                </div>


                <div class="section-title">Información precisa de la Orden de compra</div>
                <p class="section-lead">Toda la información precisa de la Orden de compra.</p>

                <div class="row">
                  <!-- Grupo: id_odc -->
                  <div class="form-group col-md-4 formulario__grupo" id="grupo__id_odc">
                    <label for="id_odc" class="formulario__label">ID Orden de Compra</label>
                    <div class="formulario__grupo-input input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-fingerprint"></i>
                        </div>
                      </div>
                      <input type="text" disabled class="form-control" id="id_odc" name="id_odc"
                        value="<?php echo $orden['id_odc'] ?> ">
                    </div>
                  </div>

                  <!-- Grupo: estado -->
                  <div class="form-group col-md-4 formulario__grupo" id="grupo__estado_odc">
                    <label for="estado_odc" class="formulario__label">Estado</label>
                    <div class="formulario__grupo-input input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-toggle-on""></i>
                        </div>
                      </div>
                      <input type="text" disabled class="form-control" id="estado_odc" name="estado_odc"
                        value="<?php echo $orden['estado'] ?> ">
                    </div>
                  </div>

                  <!-- Grupo: fecha -->
                  <div class="form-group col-md-4 formulario__grupo" id="grupo__fecha_odc">
                    <label for="fecha_odc" class="formulario__label">Fecha de registro</label>
                    <div class="formulario__grupo-input input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-calendar"></i>
                        </div>
                      </div>
                      <input type="text" disabled class="form-control" id="fecha_odc" name="fecha_odc"
                        value="<?php echo $orden['fecha'] ?> ">
                    </div>
                  </div>

                </div>

                <div class="row">

                  <!-- Grupo: hora -->
                  <div class="form-group col-md-4 formulario__grupo" id="grupo__hora_odc">
                    <label for="hora_odc" class="formulario__label">Hora de registro</label>
                    <div class="formulario__grupo-input input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-clock"></i>
                        </div>
                      </div>
                      <input type="text" disabled class="form-control" id="hora_odc" name="hora_odc"
                        value="<?php echo $orden['hora'] ?> ">
                    </div>
                  </div>
                  <!-- Grupo: igv -->
                  <div class="form-group col-md-4 formulario__grupo" id="grupo__igv_odc">
                    <label for="igv_odc" class="formulario__label">IGV</label>
                    <div class="formulario__grupo-input input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-dollar-sign"></i>
                        </div>
                      </div>
                      <input type="text" disabled class="form-control" id="igv_odc" name="igv_odc"
                        value="<?php echo $orden['igv'] ?> ">
                    </div>
                  </div>
                  <!-- Grupo: total -->
                  <div class="form-group col-md-4 formulario__grupo" id="grupo__total_odc">
                    <label for="total_odc" class="formulario__label">Total</label>
                    <div class="formulario__grupo-input input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-file-invoice-dollar"></i>
                        </div>
                      </div>
                      <input type="text" disabled class="form-control" id="total_odc" name="total_odc"
                        value="<?php echo $orden['total'] ?> ">
                    </div>
                  </div>

                </div>

                <div class="row">
                  <!-- Grupo: fecha -->
                  <div class="form-group col-md-4 formulario__grupo" id="grupo__fecha_entrega">
                    <label for="fecha_entrega" class="formulario__label">Fecha de entrega</label>
                    <div class="formulario__grupo-input input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-calendar"></i>
                        </div>
                      </div>
                      <input type="text" disabled class="form-control" id="fecha_entrega" name="fecha_entrega"
                        value="<?php echo $orden['fecha_entrega'] ?> ">
                    </div>
                  </div>
                  <!-- Grupo: hora -->
                  <div class="form-group col-md-4 formulario__grupo" id="grupo__hora_entrega">
                    <label for="hora_entrega" class="formulario__label">Hora de entrega</label>
                    <div class="formulario__grupo-input input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-clock"></i>
                        </div>
                      </div>
                      <input type="text" disabled class="form-control" id="hora_entrega" name="hora_entrega"
                        value="<?php echo $orden['hora_entrega'] ?> ">
                    </div>
                  </div>

                </div>

                <div class="section-title">Información precisa del Proveedor</div>
                <p class="section-lead">Toda la información precisa del Proveedor.</p>

                <div class="row">
                  <!-- Grupo: Proveedor -->
                  <div class="form-group col-md-4 formulario__grupo" id="grupo__proveedor">
                    <label for="id_proveedor" class="formulario__label">ID Proveedor</label>
                    <div class="formulario__grupo-input input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-fingerprint"></i>
                        </div>
                      </div>
                      <input type="text" disabled class="form-control" id="id_proveedor" name="id_proveedor"
                        value="<?php echo $proveedor['id_proveedor'] ?> ">
                    </div>
                  </div>
                  <!-- Grupo: razon social -->
                  <div class="form-group col-md-4 formulario__grupo" id="grupo__razon_social_prov">
                    <label for="razon_social_prov" class="formulario__label">Razon Social</label>
                    <div class="formulario__grupo-input input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-user"></i>
                        </div>
                      </div>
                      <input type="text" disabled class="form-control" id="id_proveedor_prov" name="id_proveedor_prov"
                        value="<?php echo $proveedor['razon_social'] ?> ">
                    </div>
                  </div>
                  <!-- Grupo: ruc -->
                  <div class="form-group col-md-4 formulario__grupo" id="grupo__ruc_prov">
                    <label for="ruc_prov" class="formulario__label">RUC</label>
                    <div class="formulario__grupo-input input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-hashtag"></i>
                        </div>
                      </div>
                      <input type="text" disabled class="form-control" id="ruc_prov" name="ruc_prov"
                        value="<?php echo $proveedor['ruc'] ?> ">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <!-- Grupo: direccion -->
                  <div class="form-group col-md-4 formulario__grupo" id="grupo__direccion_prov">
                    <label for="direccion_prov" class="formulario__label">Direccion</label>
                    <div class="formulario__grupo-input input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-location-arrow"></i>
                        </div>
                      </div>
                      <input type="text" disabled class="form-control" id="direccion_prov" name="direccion_prov"
                        value="<?php echo $proveedor['direccion'] ?> ">
                    </div>
                  </div>
                  <!-- Grupo: telefono -->
                  <div class="form-group col-md-4 formulario__grupo" id="grupo__telefono_prov">
                    <label for="telefono_prov" class="formulario__label">Telefono</label>
                    <div class="formulario__grupo-input input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-phone"></i>
                        </div>
                      </div>
                      <input type="text" disabled class="form-control" id="telefono_prov" name="telefono_prov"
                        value="<?php echo $proveedor['telefono'] ?> ">
                    </div>
                  </div>
                  <!-- Grupo: email -->
                  <div class="form-group col-md-4 formulario__grupo" id="grupo__email_prov">
                    <label for="email_prov" class="formulario__label">Email</label>
                    <div class="formulario__grupo-input input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-at"></i>
                        </div>
                      </div>
                      <input type="text" disabled class="form-control" id="email_prov" name="email_prov"
                        value="<?php echo $proveedor['email'] ?> ">
                    </div>
                  </div>
                </div>

                <div class="section-title">Información precisa del Requerimiento de Compra</div>
                <p class="section-lead">Toda la información precisa del Requerimiento de Compra.</p>

                <div class="row">
                  <!-- Grupo: ID requerimiento  -->
                  <div class="form-group col-md-2 formulario__grupo" id="grupo__requerimiento">
                    <label for="requerimiento" class="formulario__label">ID Requerimiento</label>
                    <div class="formulario__grupo-input input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-fingerprint"></i>
                        </div>
                      </div>
                      <input type="text" disabled class="form-control" id="requerimiento" name="requerimiento"
                        value="<?php echo $requerimiento['id_req'] ?> ">
                    </div>
                  </div>
                  <!-- Grupo: registrador  -->
                  <div class="form-group col-md-4 formulario__grupo" id="grupo__registrador">
                    <label for="registrador" class="formulario__label">Registrador</label>
                    <div class="formulario__grupo-input input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-user-tie"></i>
                        </div>
                      </div>
                      <input type="text" disabled class="form-control" id="registrador" name="registrador"
                        value="<?php echo $requerimiento['registrador'] ?> ">
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
                        value="<?php echo $requerimiento['observacion'] ?> ">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <!-- Grupo: estado  -->
                  <div class="form-group col-md-4 formulario__grupo" id="grupo__estado_req">
                    <label for="estado_req" class="formulario__label">Estado</label>
                    <div class="formulario__grupo-input input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-toggle-on"></i>
                        </div>
                      </div>
                      <input type="text" disabled class="form-control" id="estado_req" name="estado_req"
                        value="<?php echo $requerimiento['estado'] ?> ">
                    </div>
                  </div>
                  <!-- Grupo: Fecha  -->
                  <div class="form-group col-md-4 formulario__grupo" id="grupo__fecha_req">
                    <label for="fecha_req" class="formulario__label">Fecha</label>
                    <div class="formulario__grupo-input input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-calendar"></i>
                        </div>
                      </div>
                      <input type="text" disabled class="form-control" id="fecha_req" name="fecha_req"
                        value="<?php echo $requerimiento['fecha'] ?> ">
                    </div>
                  </div>
                  <!-- Grupo: hora  -->
                  <div class="form-group col-md-4 formulario__grupo" id="grupo__hora_req">
                    <label for="estado_rq" class="formulario__label">Hora</label>
                    <div class="formulario__grupo-input input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-clock"></i>
                        </div>
                      </div>
                      <input type="text" disabled class="form-control" id="hora_req" name="hora_req"
                        value="<?php echo $requerimiento['hora'] ?> ">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <!-- Grupo: sub total  -->
                  <div class="form-group col-md-4 formulario__grupo" id="grupo__sub_total">
                    <label for="sub_total" class="formulario__label">Sub Total</label>
                    <div class="formulario__grupo-input input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-dollar-sign"></i>
                        </div>
                      </div>
                      <input type="text" disabled class="form-control" id="sub_total" name="sub_total"
                        value="<?php echo $requerimiento['sub_total'] ?> ">
                    </div>
                  </div>
                </div>



                <div class="row mt-4">
                  <div class="col-md-12">
                    <div class="section-title">Detalle del Requerimiento de Compra</div>
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
                        <tbody>
                          <?php
                          foreach ($productos as $producto) {
                            echo '<tr>';
                            echo '<td>' . $producto['id_producto'] . '</td>';
                            echo '<td>' . $producto['nom_producto'] . '</td>';
                            echo '<td>' . $producto['nom_categoria'] . '</td>';
                            echo '<td> S/.' . $producto['precio'] . '</td>';
                            echo '<td>' . $producto['cantidad'] . ' kg </td>';
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
                        <div class="section-title">Monto de la Orden de Compra: </div>
                        <p class="section-lead"> <strong>Nota: </strong>El monto 'total' es el monto por el cual se
                          pagará.
                        </p>

                      </div>
                      <div class="col-lg-4 text-right">
                        <div class="invoice-detail-item">
                          <div class="invoice-detail-name">Subtotal</div>
                          <h5>
                            <div class="invoice-detail-value" id="sub_total">
                              <?php echo $requerimiento['sub_total'] ?>
                            </div>
                          </h5>


                        </div>
                        <div class="invoice-detail-item">
                          <div class="invoice-detail-name">IGV</div>
                          <h5>
                            <div class="invoice-detail-value" id="igv">
                              <?php echo $orden['igv'] ?>
                            </div>
                          </h5>


                        </div>
                        <hr class="mt-2 mb-2">
                        <div class="invoice-detail-item">
                          <div class="invoice-detail-name">Total</div>
                          <h4>
                            <div class="invoice-detail-value invoice-detail-value-lg" id="total">
                              <?php echo $orden['total'] ?>
                            </div>
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
                  <a href="lista-ordenes-compras.php">
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
  <!-- Page Specific JS File -->

  <!-- Template JS File -->
  <script src="./../../../../assets/js/scripts.js"></script>

</body>

</html>
