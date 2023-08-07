// ? Démas Funcionalidades 
import {expresiones} from './../../../../assets/js/scripts/expresionesRegulares.js';
import { validarCampo, campos } from './../../../../assets/js/scripts/validarCampos.js';

$(document).ready(() => {

    fetchClientes();
    // * Listar Cliente
    function fetchClientes() {
        $.ajax({
            url: '../models/listaClientes.php', 
            type: 'GET',
            success: function (response) {
                let clientes = JSON.parse(response);
                let tablaVacia = document.getElementById('tabla');
                let template = '';

                if (response.trim() === '[]') {
                    tablaVacia.innerHTML = `<tr> <td colspan="8" class="text-center"> <h6>Sin registros por el momento</h6> </td> </tr>`;
                } else {
                    clientes.forEach(cliente => {
                        template += `
                        <tr clienteID="${cliente.id_cliente}">
                            <td>
                                <div class="badge badge-light">
                                    ${cliente.id_cliente} 
                                </div>
                            </td>
                            <td> ${cliente.razon_social} </td>
                            <td> ${cliente.direccion} </td>
                            <td> ${cliente.correo} </td>
                            <td>
                                <div class="badge badge-success">
                                    ${cliente.ruc}
                                </div>    
                            </td>
                            <td>
                                <div class="badge badge-info">
                                    ${cliente.numero} 
                                </div>
                            </td>
                            <td> 
                                <button class="actualizar-btn btn btn-warning shadow-warning" data-bs-toggle="modal" data-bs-target="#actualizar-cliente-modal"> 
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
                url: '../models/buscarCliente.php',
                type: 'POST',
                data: { search },
                success: function (response) {
                    let template = '';
                    if (response.trim() !== '[]') {
                        let clientes = JSON.parse(response); // Convertir de string a json
                        clientes.forEach(cliente => {
                            template += `
                                <tr clienteID="${cliente.id_cliente}">
                                    <td>
                                        <div class="badge badge-light">
                                            ${cliente.id_cliente}
                                        </div>
                                    </td>
                                    <td>${cliente.razon_social}</td>
                                    <td>${cliente.direccion}</td>
                                    <td>${cliente.correo}</td>
                                    <td>
                                        <div class="badge badge-success">
                                            ${cliente.ruc}
                                        </div>    
                                    </td>
                                    <td>
                                        <div class="badge badge-info">
                                            ${cliente.numero} 
                                        </div>
                                    </td>
                                    <td> 
                                        <button class="actualizar-btn btn btn-warning shadow-warning" data-bs-toggle="modal" data-bs-target="#actualizar-cliente-modal"> 
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
                        template = `<tr> <td colspan="8" class="text-center"> Sin resultados de la búsqueda </td> </tr>`
                        $('#clientes-result').html(template);
                    }
                    $('#clientes-result').html(template);
                    $('#clientes-result').show();
                },
            })
        } else {
            // divLineaDivisora.innerHTML = ""; 
            $('#clientes-result').hide();
        }
    });


    // ? Eliminar


    $(document).on('click', '.eliminar-btn', function () {
        alerta_confirmacion().then((resultado) => {
            if (resultado) {
                //
                let element = $(this)[0].parentElement.parentElement;
                let id = $(element).attr('clienteID');
                // 
                $.ajax({
                    url: '../models/eliminarCliente.php',
                    type: 'POST',
                    data: { id },
                    success: function (response) {
                        let respuesta = response.trim();
                        if (respuesta != 'correcto') {
                            no_eliminado();
                        } else {
                            fetchClientes();
                            document.getElementById("search").value = "";
                            $('#clientes-result').hide();
                            si_eliminado();
                        }
                    }
                });
                // 
            }
        });
    });



    // ? Obtener datos del cliente para ponerlos al modal
    
    $('tbody').on('click', '.actualizar-btn', function () {
        Object.keys(campos).forEach(campo => { campos[campo] = true; });
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('clienteID');

        document.querySelectorAll('.formulario__grupo span').forEach((i) => { i.classList.add('fa-check-circle') });
        document.querySelectorAll('.formulario__grupo span').forEach((i) => { i.classList.remove('fa-exclamation-circle') });
        document.getElementById('contenedor__mensaje').classList.remove('contenedor__mensaje-activo');
        document.querySelectorAll('.formulario__grupo').forEach((i) => { i.classList.add('formulario__grupo-correcto') })
        document.querySelectorAll('.formulario__grupo').forEach((i) => { i.classList.remove('formulario__grupo-incorrecto') })
        document.querySelectorAll('.formulario__input-error').forEach((i) =>{ i.classList.remove('formulario__input-error-activo') })

        // Aquí haces una petición AJAX para obtener los datos del cliente utilizando el clienteID
        $.ajax({
            url: '../models/obtenerCliente.php',
            type: 'GET',
            data: { id },
            success: function (response) {
                // Aquí cargas los datos del cliente en los campos del formulario en el modal
                let cliente = JSON.parse(response);
                    $('#id_cliente').val(cliente.id_cliente);
                    $('#n_razon_social').val(cliente.razon_social);
                    $('#n_direccion').val(cliente.direccion);
                    $('#n_correo').val(cliente.correo);
                    $('#n_ruc').val(cliente.ruc);
                    $('#n_numero').val(cliente.numero);
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
            case 'razon_social':
                validarCampo(expresiones.razon_social, 'razon_social', e.target);
                break;
            case 'direccion':
                validarCampo(expresiones.direccion, 'direccion', e.target);
                break;
            case 'correo':
                validarCampo(expresiones.correo, 'correo', e.target);
                break;
            case 'ruc':
                validarCampo(expresiones.ruc, 'ruc', e.target);
                break;
            case 'numero':
                validarCampo(expresiones.telefono, 'numero', e.target);
                break;
        }
    };

    inputs.forEach((input) => {
        input.addEventListener('keyup', validarFormulario);
        input.addEventListener('blur', validarFormulario);
    });

    // End


    //? Cuando se de click al boton actualizar

    $('#actualizar-cliente-modal').on('click', '.actualizar', function () {

        if (campos.razon_social && campos.direccion && campos.correo && campos.ruc && campos.numero) {
            
            // Ajax
            const newData = {
                id: $('#id_cliente').val(),
                razon_social: $('#n_razon_social').val(),
                direccion: $('#n_direccion').val(),
                correo: $('#n_correo').val(),
                ruc: $('#n_ruc').val(),
                numero: $('#n_numero').val()
            };
            $.ajax({
                url: '../models/actualizarCliente.php',
                type: 'POST',
                data: newData,
                success: function (response) {
                    let respuesta = response.trim();
                    if (respuesta =='error') {
                        no_registrado('cliente');
                    } else {
                        $('#actualizar-cliente-modal').modal('hide');
                        si_actualizado();
                        fetchClientes();
                        document.getElementById("search").value = "";
                        $('#clientes-result').hide();
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

})