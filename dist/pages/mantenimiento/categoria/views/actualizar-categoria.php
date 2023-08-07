<!-- Modal -->
<div class="modal fade" id="actualizar-categoria-modal" tabindex="-1" aria-labelledby="actualizar-categoria-modal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h1 class="modal-title fs-5 w-100" id="exampleModalLabel">Actualizar Categoría</h1>
            </div>
            <div class="modal-body">
                <!-- <div class="row"> -->
                <div class="col-12 grid-margin">
                    <!-- <div class="card-body"> -->
                    <!-- <p class="card-description"> Actualizar información del Cliente</p> -->
                    <form class="forms-sample form-categoria" id="formulario">

                        <!-- Grupo: ID del cliente -->
                        <div class="form-group formulario__grupo formulario__grupo-correcto" id="grupo__id">
                            <label for="id_categoria" class="formulario__label">ID de la Categoria</label>
                            <div class="formulario__grupo-input input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-fingerprint"></i>
                                    </div>
                                </div>
                                <input disabled type="text" class="col-sm-3 form-control formulario__grupo-input"
                                    id="id_categoria" name="id">
                            </div>
                        </div>


                        <!-- Grupo: Nombre categoria -->
                        <div class="form-group formulario__grupo formulario__grupo-correcto" id="grupo__nombre">
                            <label for="n_nombre" class="formulario__label">Nombre de la Categoria</label>
                            <div class="formulario__grupo-input input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-certificate"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control formulario__grupo-input" id="n_nombre"
                                    name="nombre" placeholder="Frutas o Bebidas">
                                <span class="fas fa-check-circle formulario__validacion-estado"></span>
                            </div>
                            <div class="formulario__input-error">
                                La Categoría tiene que ser de 4 a 20 dígitos y solo puede
                                contener letras y
                                guion bajo.
                            </div>
                        </div>

                        <!-- Grupo: Descripcion -->
                        <div class="form-group formulario__grupo formulario__grupo-correcto" id="grupo__direccion">
                            <label for="n_descripcion" class="formulario__label">Descripción de la Categoría</label>
                            <div class="formulario__grupo-input input-group">
                                <!-- <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-location-arrow"></i>
                                    </div>
                                </div> --> 
                                <!-- Para la descripcion de categoria no usaremos el icono -->
                                <textarea maxlength="90" class="form-control col-md-12 formulario__grupo-input" id="n_descripcion"
                                    name="descripcion"
                                    placeholder="La palabra bebida es una palabra de uso común que se refiere a todo tipo de líquidos (naturales o artificiales) que puedan ser utilizados para el consumo humano...."></textarea>
                                <span class="fas fa-check-circle formulario__validacion-estado"></span>
                            </div>
                            <div class="formulario__input-error">
                                La descripción tiene que ser de 5 a 250 digitos y solo puede tener letras, comas, y
                                puntos.
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
