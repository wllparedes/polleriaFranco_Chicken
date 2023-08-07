// ? MANTENIMIENTO DE CLIENTES
import {expresiones} from './../../../../assets/js/scripts/expresionesRegulares.js';
import { validarCampo, campos } from './../../../../assets/js/scripts/validarCampos.js';

$(document).ready(() => {

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

    //? Agregar Categoria

    $('#formulario').submit(function (e) {

        if (campos.nombre && campos.descripcion) {

            const postData = {
                nombre: $('#nombre').val(),
                descripcion: $('#descripcion').val()
            };
            $.ajax({
                url: '../models/nuevaCategoria.php',
                type: 'POST',
                data: postData,
                success: function (response) {
                    let respuesta = response.trim();
                    if (respuesta != "correcto") {
                        error();
                    } else {
                        document.querySelectorAll('.formulario__grupo-correcto').forEach((i) => {
                            i.classList.remove('formulario__grupo-correcto')
                        })
                        contenedor_mensaje.classList.remove('contenedor__mensaje-activo');
                        // 
                        si_registrado();
                        $('#formulario').trigger('reset');
                        redireccionar("lista-categorias");
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