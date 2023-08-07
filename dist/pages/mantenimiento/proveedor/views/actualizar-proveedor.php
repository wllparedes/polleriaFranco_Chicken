<!-- Modal -->
<div class="modal fade" id="actualizar-proveedor-modal" tabindex="-1" aria-labelledby="actualizar-proveedor-modal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h1 class="modal-title fs-5 w-100" id="exampleModalLabel">Actualizar Proveedor</h1>
            </div>
            <div class="modal-body">

                <!-- <div class="row"> -->

                <div class="col-12 grid-margin">
                        <!-- <div class="card-body"> -->
                        <!-- <p class="card-description"> Actualizar información del Cliente</p> -->
                        <form class="forms-sample form-proveedor" id="formulario">

                            <!-- Grupo: ID del cliente -->
                            <div class="form-group formulario__grupo formulario__grupo-correcto" id="grupo__id">
                                <label for="id_proveedor" class="formulario__label">ID del Proveedor</label>
                                <div class="formulario__grupo-input input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-fingerprint"></i>
                                        </div>
                                    </div>
                                    <input disabled type="text" class="col-sm-3 form-control formulario__grupo-input" id="id_proveedor" name="id">
                                </div>
                            </div>


                            <!-- Grupo: Razon Social -->
                            <div class="form-group formulario__grupo formulario__grupo-correcto" id="grupo__razon_social">
                                <label for="n_razon_social" class="formulario__label">Razón Social</label>
                                <div class="formulario__grupo-input input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-user"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control formulario__grupo-input" id="n_razon_social"
                                        name="razon_social" placeholder="John Boe">
                                    <span class="fas fa-check-circle formulario__validacion-estado"></span>
                                </div>
                                <div class="formulario__input-error">
                                    La Razón Social tiene que ser de 4 a 20 dígitos y solo puede contener numeros,
                                    letras y
                                    guion bajo.
                                </div>
                            </div>

                            <!-- Grupo: Dirección -->
                            <div class="form-group formulario__grupo formulario__grupo-correcto" id="grupo__direccion">
                                <label for="n_direccion" class="formulario__label">Dirección</label>
                                <div class="formulario__grupo-input input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-location-arrow"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control formulario__grupo-input" id="n_direccion"
                                        name="direccion" placeholder="Av. Las Viñas 235 dpt 2">
                                    <span class="fas fa-check-circle formulario__validacion-estado"></span>
                                </div>
                                <div class="formulario__input-error">
                                    La dirección tiene que ser de 5 a 20 dígitos y solo puede contener numeros, letras y
                                    guion
                                    bajo.
                                </div>
                            </div>

                            <!-- Grupo: Correo -->
                            <div class="form-group formulario__grupo formulario__grupo-correcto" id="grupo__correo">
                                <label for="n_correo" class="formulario__label">Correo</label>
                                <div class="formulario__grupo-input input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-at"></i>
                                        </div>
                                    </div>
                                    <input type="email" class="form-control formulario__grupo-input" id="n_correo"
                                        name="correo" placeholder="johnboe@gmail.com">
                                    <span class="fas fa-check-circle formulario__validacion-estado"></span>
                                </div>
                                <div class="formulario__input-error">
                                    El correo debe de ser valido, contar con una extensión @gmail.com o @hotmail.com.
                                </div>
                            </div>

                            <!-- Grupo: Ruc -->
                            <div class="form-group formulario__grupo formulario__grupo-correcto" id="grupo__ruc">
                                <label for="n_ruc" class="formulario__label">RUC</label>
                                <div class="formulario__grupo-input input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-hashtag"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control formulario__grupo-input" id="n_ruc" name="ruc"
                                        placeholder="091272819221">
                                    <span class="fas fa-check-circle formulario__validacion-estado"></span>
                                </div>
                                <div class="formulario__input-error">
                                    El Ruc solo puede contener números y el maximo son 11 dígitos.
                                </div>
                            </div>

                            <!-- Grupo: Numero -->
                            <div class="form-group formulario__grupo formulario__grupo-correcto" id="grupo__numero">
                                <label for="n_numero" class="formulario__label">Telefono (Formato PE)</label>
                                <div class="formulario__grupo-input input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-phone"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control formulario__grupo-input phone-number"
                                        id="n_numero" name="numero" placeholder="+51 982 029 923">
                                    <span class="fas fa-check-circle formulario__validacion-estado"></span>
                                </div>
                                <div class="formulario__input-error">
                                    El Telefono debe de empezar por el prefijo +51 y seguidamente el número de nueve
                                    digitos que debe de comenzar por el 9.
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
