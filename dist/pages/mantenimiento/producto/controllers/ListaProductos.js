// ? Démas Funcionalidades 
import {expresiones} from './../../../../assets/js/scripts/expresionesRegulares.js';
import { validarCampo, campos } from './../../../../assets/js/scripts/validarCampos.js';

$(document).ready(() => {
    
    fetchProductos();
    // * Listar productos
    function fetchProductos() {
        $.ajax({
            url: '../models/listaProductos.php', 
            type: 'GET',
            success: function (response) {
                let productos = JSON.parse(response);
                let tablaVacia = document.getElementById('tabla');
                let template = '';

                if (response.trim() === '[]') {
                    tablaVacia.innerHTML = `<tr> <td colspan="7" class="text-center"> <h6>Sin registros por el momento</h6> </td> </tr>`;
                } else {
                    productos.forEach(producto => {
                        template += `
                        <tr productoID="${producto.id_producto}">
                            <td>
                                <div class="badge badge-light">
                                    ${producto.id_producto} 
                                </div>
                            </td>
                            <td> ${producto.nom_producto} </td>
                            <td> ${producto.descripcion} </td>
                            <td>
                                <div class="badge badge-primary">
                                    S/. ${producto.precio}
                                </div>    
                            </td>
                            <td>
                                <div class="badge badge-secondary">
                                    ${producto.nom_categoria} 
                                </div>
                            </td>
                            <td> 
                                <button class="actualizar-btn btn btn-warning shadow-warning" data-bs-toggle="modal" data-bs-target="#actualizar-producto-modal"> 
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
                url: '../models/buscarProducto.php',
                type: 'POST',
                data: { search },
                success: function (response) {
                    let template = '';
                    if (response.trim() !== '[]') {
                        let productos = JSON.parse(response); // Convertir de string a json
                        productos.forEach(producto => {
                            template += `
                                <tr productoID="${producto.id_producto}">
                                    <td>
                                        <div class="badge badge-light">
                                            ${producto.id_producto} 
                                        </div>
                                    </td>
                                    <td> ${producto.nom_producto} </td>
                                    <td> ${producto.descripcion} </td>
                                    <td>
                                        <div class="badge badge-primary">
                                            S/. ${producto.precio}
                                        </div>    
                                    </td>
                                    <td>
                                        <div class="badge badge-secondary">
                                            ${producto.nom_categoria} 
                                        </div>
                                    </td>
                                    <td> 
                                        <button class="actualizar-btn btn btn-warning shadow-warning" data-bs-toggle="modal" data-bs-target="#actualizar-producto-modal"> 
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
                        $('#productos-result').html(template);
                    }
                    $('#productos-result').html(template);
                    $('#productos-result').show();
                },
            })
        } else {
            $('#productos-result').hide();
        }
    });




    // ? Eliminar
        
    $(document).on('click', '.eliminar-btn', function () {
        alerta_confirmacion().then((resultado) => {
            if (resultado) {
                //
                let element = $(this)[0].parentElement.parentElement;
                let id = $(element).attr('productoID');
                // 
                $.ajax({
                    url: '../models/eliminarProducto.php',
                    type: 'POST',
                    data: { id },
                    success: function (response) {
                        let respuesta = response.trim();
                        if (respuesta != 'correcto') {
                            no_eliminado();
                        } else {
                            fetchProductos();
                            document.getElementById("search").value = "";
                            $('#productos-result').hide();
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
        let id = $(element).attr('productoID');

        $('#formulario').trigger('reset');  // ! Aún no encuentro solución para el virtual select

        document.querySelectorAll('.formulario__grupo span').forEach((i) => { i.classList.add('fa-check-circle') });
        document.querySelectorAll('.formulario__grupo span').forEach((i) => { i.classList.remove('fa-exclamation-circle') });
        document.getElementById('contenedor__mensaje').classList.remove('contenedor__mensaje-activo');
        document.querySelectorAll('.formulario__grupo').forEach((i) => { i.classList.add('formulario__grupo-correcto') })
        document.querySelectorAll('.formulario__grupo').forEach((i) => { i.classList.remove('formulario__grupo-incorrecto') })
        document.querySelectorAll('.formulario__input-error').forEach((i) =>{ i.classList.remove('formulario__input-error-activo') })

        // Aquí haces una petición AJAX para obtener los datos del cliente utilizando el clienteID
        $.ajax({
            url: '../models/obtenerProducto.php',
            type: 'GET',
            data: { id },
            success: function (response) {
                // Aquí cargas los datos del cliente en los campos del formulario en el modal
                let producto = JSON.parse(response);
                $('#id_producto').val(producto.id_producto);
                $('#n_producto').val(producto.nom_producto);
                $('#n_descripcion').val(producto.descripcion);
                $('#n_precio').val(producto.precio);
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
            case 'producto':
                validarCampo(expresiones.producto, 'producto', e.target);
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

    $('#actualizar-producto-modal').on('click', '.actualizar', function () {

        let select_required = $('#select-categorias');

        if ( campos.producto && campos.descripcion && campos.precio && select_required.val() ) {
            
            // Ajax
            const newData = {
                id: $('#id_producto').val(),
                nom_producto: $('#n_producto').val(),
                descripcion: $('#n_descripcion').val(),
                precio: $('#n_precio').val(),
                id_categoria: select_required.val(),
            };
            $.ajax({
                url: '../models/actualizarProducto.php',
                type: 'POST',
                data: newData,
                success: function (response) {
                    let respuesta = response.trim();
                    if (respuesta === 'error') {
                        error();
                    } else {
                        $('#actualizar-producto-modal').modal('hide');
                        si_actualizado();
                        fetchProductos();
                        document.getElementById("search").value = "";
                        $('#productos-result').hide();
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