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

    // Cuando se de Submit en el Btn Registrar

    $('#formulario').submit(function (e) {

        if (campos.razon_social && campos.direccion && campos.correo && campos.ruc && campos.numero) {

            // Ajax
            const postData = {
                razon_social: $('#razon_social').val(),
                ruc: $('#ruc').val(),
                numero: $('#numero').val(),
                direccion: $('#direccion').val(),
                correo: $('#correo').val(),
            };
            $.ajax({
                url: '../models/nuevoCliente.php',
                type: 'POST',
                data: postData,
                success: function (response) {
                    let respuesta = response.trim();
                    if (respuesta === "error") {
                        no_registrado('cliente');
                    } else {
                        //
                        document.querySelectorAll('.formulario__grupo-correcto').forEach((i) => {
                            i.classList.remove('formulario__grupo-correcto')
                        })
                        contenedor_mensaje.classList.remove('contenedor__mensaje-activo');
                        si_registrado();
                        $('#formulario').trigger('reset');
                        redireccionar("lista-clientes")
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