// ? Nuevo Consumible

import {expresiones} from './../../../../assets/js/scripts/expresionesRegulares.js';
import {validarCampo, campos} from './../../../../assets/js/scripts/validarCampos.js';

$(document).ready(() => {

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

    // Cuando se de Submit en el Btn Registrar

    $('#formulario').submit(function (e) {

        let select_required = $('#select-categorias');

        if ( campos.consumible && campos.descripcion && campos.precio &&  select_required.val() ) {

            // Ajax
            const postData = {
                nom_consumible: $('#consumible').val(),
                descripcion: $('#descripcion').val(),
                precio : $('#precio').val(),
                id_categoria: select_required.val()
            };

            $.ajax({
                url: '../models/nuevoConsumible.php',
                type: 'POST',
                data: postData,
                success: function (response) {
                    let respuesta = response.trim();
                    if (respuesta != "correcto") {
                        error();
                    } else {
                        //
                        document.querySelectorAll('.formulario__grupo-correcto').forEach((i) => {
                            i.classList.remove('formulario__grupo-correcto')
                        })
                        contenedor_mensaje.classList.remove('contenedor__mensaje-activo');
                        si_registrado();
                        $('#formulario').trigger('reset');
                        redireccionar("lista-consumibles")
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