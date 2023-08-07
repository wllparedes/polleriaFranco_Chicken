// ? Nuevo Pedido

import { expresiones } from './../../../../assets/js/scripts/expresionesRegulares.js';
import {validarCampo, campos} from './../../../../assets/js/scripts/validarCampos.js';

$(document).ready(() => {

    //  Seleccionar Elementos DOM ( contenedor__mensaje / all inputs )

    let contenedor_mensaje = document.getElementById('contenedor__mensaje');
    const inputs = document.querySelectorAll('#formulario input');

    // Start Validación del formulario

    const validarFormulario = (e) => {
        switch (e.target.name) {
            case 'registrador':
                validarCampo(expresiones.registrador, 'registrador', e.target);
                break;
            case 'observacion':
                validarCampo(expresiones.observacion, 'observacion', e.target);
                break;
        }
    };

    inputs.forEach((input) => {
        input.addEventListener('keyup', validarFormulario);
        input.addEventListener('blur', validarFormulario);
    });

    $('#formulario').submit(function (e) {
        e.preventDefault();

        let select_productos = $('#select-productos');
        let observacion = $('#observacion');

        if ( campos.registrador && ( select_productos.val().length != 0 )  &&   ( _.isEmpty(observacion.val().trim()) || campos.observacion )  ) {
            
            let cantidad_producto = [];
            let cantidades = document.getElementsByClassName('input-unidad');
    
            for (let i = 0; i < cantidades.length; i++) {
                let elemento_tr = cantidades[i];
                let cantidad_i = elemento_tr.value;
                let id_producto = elemento_tr.parentElement.parentElement.getAttribute('productoID');
                let cantidad_and_producto = { id_producto, cantidad_i };
                cantidad_producto.push(cantidad_and_producto);
            }
    
            const postData = {
                registrador: $('#registrador').val(),
                observacion: observacion.val(),
                productos: cantidad_producto
            };

            $.ajax({
                url: '../models/nuevoRequerimiento.php',
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
                        $('.advProducto').show();
                        $('#contenido').html('');
                        table.classList.remove('table__seleccionados-activo');
                        // redireccionar("lista-pedidos")
                    }
                },
            });
        } else {
            contenedor_mensaje.classList.add('contenedor__mensaje-activo');
        }
    });
});