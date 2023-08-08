// ? Démas Funcionalidades 
import {expresiones} from './../../../../assets/js/scripts/expresionesRegulares.js';
import { validarCampo, campos } from './../../../../assets/js/scripts/validarCampos.js';

$(document).ready(() => {
    
    fetchCategorias();
    // * Listar categorias
    function fetchCategorias() {
        $.ajax({ 
            url: '../models/listaCategorias.php',
            type: 'GET',
            success: function (response) {
                let categorias = JSON.parse(response);
                let tablaVacia = document.getElementById('tabla');
                let template = '';
                if (response.trim() === '[]') {
                    tablaVacia.innerHTML = `<tr> <td colspan="5" class="text-center"> <h6>Sin registros por el momento</h6> </td> </tr>`;
                } else {
                    categorias.forEach(categoria => {
                        template += `
                        <tr categoriaID="${categoria.id_categoria}">
                            <td>    
                                <div class="badge badge-light">
                                    ${categoria.id_categoria}
                                </div>
                            </td>
                            <td>
                                <div class="badge badge-success">
                                    ${categoria.nombre}
                                </div>
                            </td>
                            <td> ${categoria.descripcion} </td>
                            <td> 
                                <button class="actualizar-btn btn btn-warning shadow-warning" data-bs-toggle="modal" data-bs-target="#actualizar-categoria-modal"> 
                                    <i class="fas fa-pen"></i>
                                </button> 
                            </td>
                            <td>
                                <button class="eliminar-btn btn btn-danger shadow-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>`
                    });
                    
                    $('#content').html(template);
                }
            },
        });
    }
    

    // ? BUSAR 
    $('#search').keyup(function () {
        if ($('#search').val() != "") {
            let search = $('#search').val();
            $.ajax({
                url: '../models/buscarCategoria.php',
                type: 'POST',
                data: { search },
                success: function (response) {
                    let template = '';
                    if (response.trim() !== '[]') {
                        let categorias = JSON.parse(response); // Convertir de string a json
                        categorias.forEach(categoria => {
                            template += `
                                <tr categoriaID="${categoria.id_categoria}">
                                    <td>    
                                        <div class="badge badge-light">
                                            ${categoria.id_categoria}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="badge badge-success">
                                            ${categoria.nombre}
                                        </div>
                                    </td>
                                    <td>
                                        ${categoria.descripcion}
                                    </td>
                                    <td>
                                        <button class="actualizar-btn btn btn-warning shadow-warning" data-bs-toggle="modal" data-bs-target="#actualizar-categoria-modal">
                                            <i class="fas fa-pen"></i>
                                        </button>
                                    </td>
                                    <td>
                                        <button class="eliminar-btn btn btn-danger shadow-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>`;
                        });
                    } else {
                        template = `<tr> <td colspan="5" class="text-center"> Sin resultados de la búsqueda  </td> </tr>`
                        $('#categorias-result').html(template);
                    }
                    $('#categorias-result').html(template);
                    $('#categorias-result').show();
                },
            })
        } else {
            $('#categorias-result').hide();
        }
    });

    // ? Eliminar

    $(document).on('click', '.eliminar-btn', function () {
        alerta_confirmacion().then((resultado) => {
            if (resultado) {
                //
                let element = $(this)[0].parentElement.parentElement;
                let id = $(element).attr('categoriaID');
                // 
                $.ajax({
                    url: '../models/eliminarCategoria.php',
                    type: 'POST',
                    data: { id },
                    success: function (response) {
                        let respuesta = response.trim();
                        if (respuesta != 'correcto') {
                            no_eliminado();
                        } else {
                            fetchCategorias();
                            document.getElementById("search").value = "";  
                            $('#categorias-result').hide();
                            si_eliminado();
                        }
                    }
                });
                // 
            }
        });
    });



    // ? Obtener datos de la categoria para ponerlos al modal
    
    $('tbody').on('click', '.actualizar-btn', function () {
        Object.keys(campos).forEach(campo => { campos[campo] = true; });
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('categoriaID');

        document.querySelectorAll('.formulario__grupo span').forEach((i) => { i.classList.add('fa-check-circle') });
        document.querySelectorAll('.formulario__grupo span').forEach((i) => { i.classList.remove('fa-exclamation-circle') });
        document.getElementById('contenedor__mensaje').classList.remove('contenedor__mensaje-activo');
        document.querySelectorAll('.formulario__grupo').forEach((i) => { i.classList.add('formulario__grupo-correcto') })
        document.querySelectorAll('.formulario__grupo').forEach((i) => { i.classList.remove('formulario__grupo-incorrecto') })
        document.querySelectorAll('.formulario__input-error').forEach((i) =>{ i.classList.remove('formulario__input-error-activo') })

        // Aquí haces una petición AJAX para obtener los datos del cliente utilizando el clienteID
        $.ajax({
            url: '../models/obtenerCategoria.php',
            type: 'GET',
            data: { id },
            success: function (response) {
                // Aquí cargas los datos del cliente en los campos del formulario en el modal
                let cliente = JSON.parse(response);
                $('#id_categoria').val(cliente.id_categoria);
                $('#n_nombre').val(cliente.nombre);
                $('#n_descripcion').val(cliente.descripcion);
                // Carga los demás campos del formulario según corresponda
            }
        });
    });



    // ? ACTUALIZAR

    //  Seleccionar Elementos DOM ( contenedor__mensaje / all inputs )

    let contenedor_mensaje = document.getElementById('contenedor__mensaje');
    const inputs = document.querySelectorAll('#formulario input');

    // Start Validación del formulario

    const validarFormulario = (e) => {

        switch (e.target.name) {
            case 'nombre':
                validarCampo(expresiones.nombre, 'nombre', e.target);
                break;
            case 'descripcion':
                validarCampo(expresiones.descripcion, 'descripcion', e.target);
                break;
        }
    };

    inputs.forEach((input) => {
        input.addEventListener('keyup', validarFormulario);
        input.addEventListener('blur', validarFormulario);
    });

    // End


    //? Cuando se de click al boton actualizar

    $('#actualizar-categoria-modal').on('click', '.actualizar', function () {

        if ( campos.nombre && campos.descripcion ) {
            // Ajax
            const newData = {
                id: $('#id_categoria').val(),
                nombre: $('#n_nombre').val(),
                descripcion: $('#n_descripcion').val()
            };
            $.ajax({
                url: '../models/actualizarCategoria.php',
                type: 'POST',
                data: newData,
                success: function (response) {
                    let respuesta = response.trim();
                    if (respuesta === 'error') {
                        error();
                    } else {
                        $('#actualizar-categoria-modal').modal('hide');
                        si_actualizado();
                        fetchCategorias();
                        document.getElementById("search").value = "";
                        $('#categorias-result').hide();
                        // 
                        document.querySelectorAll('.formulario__grupo-correcto').forEach((i) => {
                            i.classList.remove('formulario__grupo-correcto')
                        })
                        contenedor_mensaje.classList.remove('contenedor__mensaje-activo');
                    }
                }
            });
        } else {
            contenedor_mensaje.classList.add('contenedor__mensaje-activo');
        }
    });

});