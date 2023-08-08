// ? Démas Funcionalidades 
import {expresiones} from './../../../../assets/js/scripts/expresionesRegulares.js';
import { validarCampo, campos } from './../../../../assets/js/scripts/validarCampos.js';

$(document).ready(() => {

    fetchUsuarios();
    // * Listar usuarios
    function fetchUsuarios() {
        $.ajax({
            url: '../models/listaUsuarios.php', 
            type: 'GET',
            success: function (response) {
                let usuarios = JSON.parse(response);
                let tablaVacia = document.getElementById('tabla');
                let template = '';

                if (response.trim() === '[]') {
                    tablaVacia.innerHTML = `<tr> <td colspan="8" class="text-center"> <h6>Sin registros por el momento</h6> </td> </tr>`;
                } else {
                    usuarios.forEach(usuario => {
                        template += `
                        <tr usuarioID="${usuario.id_usuario}">
                            <td>
                                <div class="badge badge-light">
                                    ${usuario.id_usuario} 
                                </div>
                            </td>
                            <td> ${usuario.nombre_usuario} </td>
                            <td>
                                <div class="badge badge-info">
                                    ${usuario.numero}
                                </div>
                            </td>
                            <td> ${usuario.dni} </td>
                            <td>
                                <div class="badge badge-success">
                                    ${usuario.correo}
                                </div>    
                            </td>
                            <td>
                                <div class="badge badge-secondary">
                                    ${usuario.cargo} 
                                </div>
                            </td>
                            <td> ${usuario.clave} </td>
                            <td> 
                                <button class="actualizar-btn btn btn-warning shadow-warning" data-bs-toggle="modal" data-bs-target="#actualizar-usuario-modal"> 
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
                url: '../models/buscarUsuario.php',
                type: 'POST',
                data: { search },
                success: function (response) {
                    let template = '';
                    if (response.trim() !== '[]') {
                        let usuarios = JSON.parse(response); // Convertir de string a json
                        usuarios.forEach(usuario => {
                            template += `
                                <tr usuarioID="${usuario.id_usuario}">
                                    <td>
                                        <div class="badge badge-light">
                                            ${usuario.id_usuario} 
                                        </div>
                                    </td>
                                    <td> ${usuario.nombre_usuario} </td>
                                    <td>
                                        <div class="badge badge-info">
                                            ${usuario.numero}
                                        </div>
                                    </td>
                                    <td> ${usuario.dni} </td>
                                    <td>
                                        <div class="badge badge-success">
                                            ${usuario.correo}
                                        </div>    
                                    </td>
                                    <td>
                                        <div class="badge badge-secondary">
                                            ${usuario.cargo} 
                                        </div>
                                    </td>
                                    <td> ${usuario.clave} </td>
                                    <td> 
                                        <button class="actualizar-btn btn btn-warning shadow-warning" data-bs-toggle="modal" data-bs-target="#actualizar-usuario-modal"> 
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
                        $('#usuarios-result').html(template);
                    }
                    $('#usuarios-result').html(template);
                    $('#usuarios-result').show();
                },
            })
        } else {
            $('#usuarios-result').hide();
        }
    });


    // ? Eliminar


    $(document).on('click', '.eliminar-btn', function () {
        alerta_confirmacion().then((resultado) => {
            if (resultado) {
                //
                let element = $(this)[0].parentElement.parentElement;
                let id = $(element).attr('usuarioID');
                // 
                $.ajax({
                    url: '../models/eliminarUsuario.php',
                    type: 'POST',
                    data: { id },
                    success: function (response) {
                        let respuesta = response.trim();
                        if (respuesta == 'error' || respuesta == 'advertencia') {
                            no_eliminado();
                        } else if (respuesta == 'not_eliminar') {
                            usuario_now();
                        } else if (respuesta == 'correcto'){
                            fetchUsuarios();
                            document.getElementById("search").value = "";
                            $('#usuarios-result').hide();
                            si_eliminado();
                        } else {
                            error();
                        }
                        
                    }
                });
                // 
            }
        });
    });



    // ? Obtener datos del cliente para ponerlos al modal
    
    $('tbody').on('click', '.actualizar-btn', function () {
        let eliminar = document.getElementById('select-cargos');
        eliminar.parentNode.removeChild(eliminar);

        let contenedor = document.getElementById('contenedor');
        const select_cargos = document.createElement('div');
        select_cargos.id = "select-cargos";
        select_cargos.classList.add('form-control');
        contenedor.append(select_cargos);
        
        Object.keys(campos).forEach(campo => { campos[campo] = true; });
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('usuarioID');

        document.querySelectorAll('.formulario__grupo span').forEach((i) => { i.classList.add('fa-check-circle') });
        document.querySelectorAll('.formulario__grupo span').forEach((i) => { i.classList.remove('fa-exclamation-circle') });
        document.getElementById('contenedor__mensaje').classList.remove('contenedor__mensaje-activo');
        document.querySelectorAll('.formulario__grupo').forEach((i) => { i.classList.add('formulario__grupo-correcto') })
        document.querySelectorAll('.formulario__grupo').forEach((i) => { i.classList.remove('formulario__grupo-incorrecto') })
        document.querySelectorAll('.formulario__input-error').forEach((i) =>{ i.classList.remove('formulario__input-error-activo') })

        // Aquí haces una petición AJAX para obtener los datos del cliente utilizando el clienteID
        $.ajax({
            url: '../models/obtenerUsuario.php',
            type: 'GET',
            data: { id },
            success: function (response) {

                // Aquí cargas los datos del cliente en los campos del formulario en el modal
                let usuario = JSON.parse(response);
                const cargos = usuario['cargo'];
                const datos = usuario['usuario'][0];
                
                $('#id_usuario').val(datos.id_usuario);
                $('#n_nombres').val(datos.nombres);
                $('#n_apellidos').val(datos.apellidos);
                $('#n_numero').val(datos.telefono);
                $('#n_dni').val(datos.dni);
                $('#n_userName').val(datos.nombre_usuario);
                $('#n_correo').val(datos.email);
                $('#n_password').val(datos.clave);
                // Carga los demás campos del formulario según corresponda

                VirtualSelect.init({
                    ele: '#select-cargos',
                    options: cargos,
                    search: true,
                    required: true,
                    selectedValue: datos.id_cargo,
                    searchPlaceholderText: 'Buscar...',
                    noSearchResultsText: 'No se encontraron resultados',
                    noOptionsText: 'No hay opciones para mostrar',
                    allOptionsSelectedText: 'Todo seleccionado',
                    optionsSelectedText: 'Opciones seleccionadas',
                    placeholder: `Seleccionar cargo`
                });

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
            case 'nombres':
                validarCampo(expresiones.nombres, 'nombres', e.target);
                break;
            case 'apellidos':
                validarCampo(expresiones.apellidos, 'apellidos', e.target);
                break;
            case 'numero':
                validarCampo(expresiones.numero, 'numero', e.target);
                break;
            case 'dni':
                validarCampo(expresiones.dni, 'dni', e.target);
                break;
            case 'userName':
                validarCampo(expresiones.userName, 'userName', e.target);
                break;
            case 'correo':
                validarCampo(expresiones.correo, 'correo', e.target);
                break;
            case 'password':
                validarCampo(expresiones.password, 'password', e.target);
                break;
        }
    };

    inputs.forEach((input) => {
        input.addEventListener('keyup', validarFormulario);
        input.addEventListener('blur', validarFormulario);
    });

    // End


    //? Cuando se de click al boton actualizar

    $('#actualizar-usuario-modal').on('click', '.actualizar', function () {

        let select_cargo = $('#select-cargos');

        if (campos.nombres && campos.apellidos && campos.numero && campos.dni && campos.userName && campos.correo && campos.password && select_cargo.val() ) {
            
            // Ajax
            const newData = {
                id: $('#id_usuario').val(),
                nombres: $('#n_nombres').val(),
                apellidos: $('#n_apellidos').val(),
                numero: $('#n_numero').val(),
                dni: $('#n_dni').val(),
                userName: $('#n_userName').val(),
                correo: $('#n_correo').val(),
                password: $('#n_password').val(),
                id_cargo: select_cargo.val(),
            };

            $.ajax({
                url: '../models/actualizarUsuario.php',
                type: 'POST',
                data: newData,
                success: function (response) {
                    let respuesta = response.trim();
                    if (respuesta =='error') {
                        no_registrado('usuario');
                    } else {
                        $('#actualizar-usuario-modal').modal('hide');
                        si_actualizado();
                        fetchUsuarios();
                        document.getElementById("search").value = "";
                        $('#usuarios-result').hide();
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