<!-- Modal -->
<div class="modal fade" id="actualizar-usuario-modal" tabindex="-1" aria-labelledby="actualizar-usuario-modal"
  aria-hidden="true">
  <div class="modal-xl modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h1 class="modal-title fs-5 w-100" id="exampleModalLabel">Actualizar Usuario</h1>
      </div>
      <div class="modal-body">

        <!-- <div class="row"> -->

        <div class="col-12 grid-margin">
          <!-- <div class="card-body"> -->
          <!-- <p class="card-description"> Actualizar información del usuario</p> -->
          <form class="forms-sample form-usuario" id="formulario">

            <div class="row">

              <!-- Grupo: ID del usuario -->
              <div class="form-group col-lg-2 formulario__grupo formulario__grupo-correcto" id="grupo__id">
                <label for="id_usuario" class="formulario__label">ID del Usuario</label>
                <div class="formulario__grupo-input input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fas fa-fingerprint"></i>
                    </div>
                  </div>
                  <input disabled type="text" class="form-control formulario__grupo-input" id="id_usuario" name="id">
                </div>
              </div>

              <!-- Grupo: Nombres -->
              <div class="form-group col-lg-5 formulario__grupo" id="grupo__nombres">
                <label for="nombres" class="formulario__label">Nombres</label>
                <div class="formulario__grupo-input input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fas fa-user"></i>
                    </div>
                  </div>
                  <input type="text" class="form-control formulario__grupo-input" id="n_nombres" name="nombres"
                    placeholder="John Alexander">
                  <span class="fas fa-exclamation-circle formulario__validacion-estado"></span>
                </div>
                <div class="formulario__input-error">
                  El nombre tiene que ser de 5 a 20 dígitos y solo puede contener numeros, letras y
                  guion bajo.
                </div>
              </div>

              <!-- Grupo: Apellidos -->
              <div class="form-group col-lg-5 formulario__grupo" id="grupo__apellidos">
                <label for="apellidos" class="formulario__label">Apellidos</label>
                <div class="formulario__grupo-input input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fas fa-user"></i>
                    </div>
                  </div>
                  <input type="text" class="form-control formulario__grupo-input" id="n_apellidos" name="apellidos"
                    placeholder="Boe Smith">
                  <span class="fas fa-exclamation-circle formulario__validacion-estado"></span>
                </div>
                <div class="formulario__input-error">
                  El apellido tiene que ser de 5 a 20 dígitos y solo puede contener numeros, letras y guion
                  bajo.
                </div>
              </div>

            </div>

            <div class="row">


              <!-- Grupo: Telefono -->
              <div class="form-group col-lg-6 formulario__grupo" id="grupo__numero">
                <label for="numero" class="formulario__label">Telefono (Formato PE)</label>
                <div class="formulario__grupo-input input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fas fa-phone"></i>
                    </div>
                  </div>
                  <input type="text" class="form-control formulario__grupo-input phone-number" id="n_numero"
                    name="numero" placeholder="+51 982 029 923">
                  <span class="fas fa-exclamation-circle formulario__validacion-estado"></span>
                </div>
                <div class="formulario__input-error">
                  El Telefono debe de empezar por el prefijo +51 y seguidamente el número de nueve digitos que
                  debe de comenzar por el 9.
                </div>
              </div>
              <!-- Grupo: DNI -->
              <div class="form-group col-lg-6 formulario__grupo" id="grupo__dni">
                <label for="dni" class="formulario__label">DNI</label>
                <div class="formulario__grupo-input input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fas fa-address-card"></i>
                    </div>
                  </div>
                  <input type="text" class="form-control formulario__grupo-input" id="n_dni" name="dni"
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
                  <input type="text" class="form-control formulario__grupo-input" id="n_userName" name="userName"
                    placeholder="John Boe">
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
                  <input type="email" class="form-control formulario__grupo-input" id="n_correo" name="correo"
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
              <div class="form-group col-lg-6 formulario__grupo" id="grupo__password">
                <label for="password" class="formulario__label">Contraseña</label>
                <div class="formulario__grupo-input input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fas fa-key"></i>
                    </div>
                  </div>
                  <input type="text" class="form-control formulario__grupo-input" id="n_password" name="password"
                    placeholder="*************">
                  <span class="fas fa-exclamation-circle formulario__validacion-estado"></span>
                </div>
                <div class="formulario__input-error">
                  La contraseña tiene que tener una longitud mayor a 5 caracteres, debe contener al menos una mayúscula,
                  números y algún caracter especial.
                </div>
              </div>

              <!-- Grupo: cargos -->
              <div class="form-group col-lg-3">
                <label for="n_cargo" class="formulario__label">Cargo</label>
                <div class="input-group" id="contenedor">
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
        <button type="button" class="actualizar btn btn-primary"> Guardar Cambios </button>
      </div>
    </div>
  </div>
</div>
