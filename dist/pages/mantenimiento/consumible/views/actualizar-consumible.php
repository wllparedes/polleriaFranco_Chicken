<!-- Modal -->
<div class="modal fade" id="actualizar-consumible-modal" tabindex="-1" aria-labelledby="actualizar-consumible-modal"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h1 class="modal-title fs-5 w-100" id="exampleModalLabel">Actualizar Consumible</h1>
      </div>
      <div class="modal-body">

        <!-- <div class="row"> -->

        <div class="col-12 grid-margin">
          <!-- <div class="card-body"> -->
          <!-- <p class="card-description"> Actualizar información del Cliente</p> -->
          <form class="forms-sample form-consumible" id="formulario">

            <!-- Grupo: ID del consumible -->
            <div class="form-group formulario__grupo formulario__grupo-correcto" id="grupo__id">
              <label for="id_consumible" class="formulario__label">ID del Consumible</label>
              <div class="formulario__grupo-input input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-fingerprint"></i>
                  </div>
                </div>
                <input disabled type="text" class="col-sm-3 form-control formulario__grupo-input" id="id_consumible"
                  name="id">
              </div>
            </div>


            <!-- Grupo: Nombre -->
            <div class="form-group formulario__grupo formulario__grupo-correcto" id="grupo__consumible">
              <label for="n_consumible" class="formulario__label">Nombre</label>
              <div class="formulario__grupo-input input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-utensils"></i>
                  </div>
                </div>
                <input type="text" class="form-control formulario__grupo-input" id="n_consumible" name="consumible"
                  placeholder="1/4 de Mostrito">
                <span class="fas fa-check-circle formulario__validacion-estado"></span>
              </div>
              <div class="formulario__input-error">
                El nombre del consumible debe ser de 4 a 20 dígitos y debe de tener la porción.
              </div>
            </div>


            <!-- Grupo: Descripción -->
            <div class="form-group formulario__grupo formulario__grupo-correcto" id="grupo__descripcion">
              <label for="n_descripcion" class="formulario__label">Descripción</label>
              <div class="formulario__grupo-input input-group">
                <!-- <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-keyboard"></i>
                                    </div>
                                </div> -->
                <textarea maxlength="90" type="text" class="form-control formulario__grupo-input" id="n_descripcion"
                  name="descripcion"
                  placeholder="“Mostrito” combina dos platos peruanos tradicionales: pollo a la brasa..."></textarea>
                <span class="fas fa-check-circle formulario__validacion-estado"></span>
              </div>
              <div class="formulario__input-error">
                La descripción tiene que ser de 5 a 90 digitos y solo puede tener letras, comas, y
                puntos.
              </div>
            </div>

            <!-- Grupo: Precio -->
            <div class="form-group formulario__grupo formulario__grupo-correcto" id="grupo__precio">
              <label for="n_precio" class="formulario__label">Precio</label>
              <div class="formulario__grupo-input input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-dollar-sign"></i>
                  </div>
                </div>
                <input type="text" class="form-control formulario__grupo-input" id="n_precio" name="precio"
                  placeholder="S/. 22.00">
                <span class="fas fa-check-circle formulario__validacion-estado"></span>
              </div>
              <div class="formulario__input-error">
                El precio debe de ser números, se aceptan hasta 2 decimales pero no letras ni simbolos.
              </div>
            </div>

            <!-- Grupo: Categoria -->
            <div class="form-group">
              <label for="n_categoria" class="formulario__label">Categoria</label>
              <div class="input-group" id="contenedor">
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



            <!-- = Message Error -->

            <div class="form-group col-md-12 contenedor__mensaje" id="contenedor__mensaje">
              <div class="formulario__mensaje bg-danger shadow-danger">
                <span class="fas fa-exclamation-triangle"></span> <b class="p-1">Rellene el
                  formulario correctamente.</b>
              </div>
            </div>


          </form>
          <!-- </div> -->
        </div>

        <!-- ! FIN DEL FORMULARIO QUE NECESITAMOS -->
        <!-- </div> -->

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> Cerrar </button>
        <button type="button" class="actualizar btn btn-primary shadow-primary"> Guardar Cambios </button>
      </div>
    </div>
  </div>
</div>
