// ? Démas Funcionalidades 
import {expresiones} from './../../../../assets/js/scripts/expresionesRegulares.js';
import { validarCampo, campos } from './../../../../assets/js/scripts/validarCampos.js';

$(document).ready(() => {
    
    fetchConsumibles();
    // * Listar consumibles
    function fetchConsumibles() {
        $.ajax({
            url: '../models/listaConsumibles.php', 
            type: 'GET',
            success: function (response) {
                let consumibles = JSON.parse(response);
                let tablaVacia = document.getElementById('tabla');
                let template = '';

                if (response.trim() === '[]') {
                    tablaVacia.innerHTML = `<tr> <td colspan="7" class="text-center"> <h6>Sin registros por el momento</h6> </td> </tr>`;
                } else {
                    consumibles.forEach(consumible => {
                        template += `
                        <tr consumibleID="${consumible.id_consumible}">
                            <td>
                                <div class="badge badge-light">
                                    ${consumible.id_consumible} 
                                </div>
                            </td>
                            <td> ${consumible.nom_consumible} </td>
                            <td> ${consumible.descripcion} </td>
                            <td>
                                <div class="badge badge-primary">
                                    S/. ${consumible.precio}
                                </div>    
                            </td>
                            <td>
                                <div class="badge badge-secondary">
                                    ${consumible.nom_categoria} 
                                </div>
                            </td>
                            <td> 
                                <button class="actualizar-btn btn btn-warning shadow-warning" data-bs-toggle="modal" data-bs-target="#actualizar-consumible-modal"> 
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
    };


    // ? BUSAR 
    $('#search').keyup(function () {
        if ($('#search').val() != "") {
            let search = $('#search').val();
            $.ajax({
                url: '../models/buscarConsumible.php',
                type: 'POST',
                data: { search },
                success: function (response) {
                    let template = '';
                    if (response.trim() !== '[]') {
                        let consumibles = JSON.parse(response); // Convertir de string a json
                        consumibles.forEach(consumible => {
                            template += `
                                <tr consumibleID="${consumible.id_consumible}">
                                    <td>
                                        <div class="badge badge-light">
                                            ${consumible.id_consumible} 
                                        </div>
                                    </td>
                                    <td> ${consumible.nom_consumible} </td>
                                    <td> ${consumible.descripcion} </td>
                                    <td>
                                        <div class="badge badge-primary">
                                            S/. ${consumible.precio}
                                        </div>    
                                    </td>
                                    <td>
                                        <div class="badge badge-secondary">
                                            ${consumible.nom_categoria} 
                                        </div>
                                    </td>
                                    <td> 
                                        <button class="actualizar-btn btn btn-warning shadow-warning" data-bs-toggle="modal" data-bs-target="#actualizar-consumible-modal"> 
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
                        template = `<tr> <td colspan="7" class="text-center"> Sin resultados de la búsqueda </td> </tr>`
                        $('#consumibles-result').html(template);
                    }
                    $('#consumibles-result').html(template);
                    $('#consumibles-result').show();
                },
            })
        } else {
            $('#consumibles-result').hide();
        }
    });




    // ? Eliminar

        
    $(document).on('click', '.eliminar-btn', function () {
        alerta_confirmacion().then((resultado) => {
            if (resultado) {
                //
                let element = $(this)[0].parentElement.parentElement;
                let id = $(element).attr('consumibleID');
                // 
                $.ajax({
                    url: '../models/eliminarConsumible.php',
                    type: 'POST',
                    data: { id },
                    success: function (response) {
                        let respuesta = response.trim();
                        if (respuesta != 'correcto') {
                            no_eliminado();
                        } else {
                            fetchConsumibles();
                            document.getElementById("search").value = "";
                            $('#consumibles-result').hide();
                            si_eliminado();
                        }
                    }
                });
                // 
            }
        });
    });



    // ? Obtener datos de la consumibles para ponerlos al modal
    
    $('tbody').on('click', '.actualizar-btn', function () {
        Object.keys(campos).forEach(campo => { campos[campo] = true; });
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('consumibleID');

        $('#formulario').trigger('reset');  // ! Aún no encuentro solución para el virtual select

        document.querySelectorAll('.formulario__grupo span').forEach((i) => { i.classList.add('fa-check-circle') });
        document.querySelectorAll('.formulario__grupo span').forEach((i) => { i.classList.remove('fa-exclamation-circle') });
        document.getElementById('contenedor__mensaje').classList.remove('contenedor__mensaje-activo');
        document.querySelectorAll('.formulario__grupo').forEach((i) => { i.classList.add('formulario__grupo-correcto') })
        document.querySelectorAll('.formulario__grupo').forEach((i) => { i.classList.remove('formulario__grupo-incorrecto') })
        document.querySelectorAll('.formulario__input-error').forEach((i) =>{ i.classList.remove('formulario__input-error-activo') })

        // Aquí haces una petición AJAX para obtener los datos del cliente utilizando el clienteID
        $.ajax({
            url: '../models/obtenerConsumible.php',
            type: 'GET',
            data: { id },
            success: function (response) {
                // Aquí cargas los datos del cliente en los campos del formulario en el modal
                let consumible = JSON.parse(response);
                $('#id_consumible').val(consumible.id_consumible);
                $('#n_consumible').val(consumible.nom_consumible);
                $('#n_descripcion').val(consumible.descripcion);
                $('#n_precio').val(consumible.precio);
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
            case 'consumible':
                validarCampo(expresiones.consumible, 'consumible', e.target);
                break;
            case 'descripcion':
                validarCampo(expresiones.descripcion, 'descripcion', e.target);
                break;
            case 'precio':
                validarCampo(expresiones.precio, 'precio', e.target);
                break;
        }
    };

    inputs.forEach((input) => {
        input.addEventListener('keyup', validarFormulario);
        input.addEventListener('blur', validarFormulario);
    });

    // End


    //? Cuando se de click al boton actualizar

    $('#actualizar-consumible-modal').on('click', '.actualizar', function () {

        let select_required = $('#select-categorias');

        if ( campos.consumible && campos.descripcion && campos.precio && select_required.val() ) {
            
            // Ajax
            const newData = {
                id: $('#id_consumible').val(),
                nom_consumible: $('#n_consumible').val(),
                descripcion: $('#n_descripcion').val(),
                precio: $('#n_precio').val(),
                id_categoria: select_required.val(),
            };
            $.ajax({
                url: '../models/actualizarConsumible.php',
                type: 'POST',
                data: newData,
                success: function (response) {
                    let respuesta = response.trim();
                    if (respuesta === 'error') {
                        error();
                    } else {
                        $('#actualizar-consumible-modal').modal('hide');
                        si_actualizado();
                        fetchConsumibles();
                        document.getElementById("search").value = "";
                        $('#consumibles-result').hide();
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