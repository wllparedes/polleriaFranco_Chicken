// ? MANTENIMIENTO DE CLIENTES
import {expresiones} from './../../../../assets/js/scripts/expresionesRegulares.js';
import {validarCampo, campos} from './../../../../assets/js/scripts/validarCampos.js';

$(document).ready(() => {

    //  Seleccionar Elementos DOM ( contenedor__mensaje / all inputs )

    let contenedor_mensaje = document.getElementById('contenedor__mensaje');
    const inputs = document.querySelectorAll('#formulario input');

    // Start Validación del formulario

    const validarFormulario = (e) => {
        switch (e.target.name) {
            case 'nombres':
                validarCampo(expresiones.razon_social, 'nombres', e.target);
                break;
            case 'apellidos':
                validarCampo(expresiones.nombre, 'apellidos', e.target);
                break;
            case 'numero':
                validarCampo(expresiones.telefono, 'numero', e.target);
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

    // Cuando se de Submit en el Btn Registrar

    $('#formulario').submit(function (e) {

        let select_cargo = $('#select-cargos');

        if (campos.nombres && campos.apellidos && campos.numero && campos.dni && campos.userName && campos.password && campos.correo && select_cargo.val()) {

            // Ajax
            const postData = {
                nombres: $('#nombres').val(),
                apellidos: $('#apellidos').val(),
                numero: $('#numero').val(),
                dni: $('#dni').val(),
                userName: $('#userName').val(),
                correo: $('#correo').val(),
                password: $('#password').val(),
                id_cargo: select_cargo.val()
            };

            $.ajax({
                url: '../models/nuevoUsuario.php',
                type: 'POST',
                data: postData,
                success: function (response) {
                    console.log(response);
                    let respuesta = response.trim();
                    if (respuesta === "error") {
                        no_registrado('usuario');
                    } else {
                        //
                        document.querySelectorAll('.formulario__grupo-correcto').forEach((i) => {
                            i.classList.remove('formulario__grupo-correcto')
                        })
                        contenedor_mensaje.classList.remove('contenedor__mensaje-activo');
                        si_registrado();
                        $('#formulario').trigger('reset');
                        // redireccionar("lista-usuarios")
                        // 
                    }
                },
            });
            
        } else {
            contenedor_mensaje.classList.add('contenedor__mensaje-activo');
        }
        e.preventDefault();
    });

})