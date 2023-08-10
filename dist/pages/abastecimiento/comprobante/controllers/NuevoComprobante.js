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

        let select_orden = $('#select-orden');
        let observacion = $('#observacion');
        let pdfInput = $('#pdf')[0];
        let pdfFile = pdfInput.files[0];

        if ( pdfFile && select_orden.val() && ( _.isEmpty(observacion.val().trim()) || campos.observacion )  ) {
            
            let formData = new FormData();
            
            formData.append('id_orden', select_orden.val());
            formData.append('observacion', observacion.val());
            formData.append('pdf', pdfFile);

            $.ajax({
                url: '../models/nuevoComprobante.php',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
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
                        $('.advOrden').show();
                        $('#contenido').html('');
                        $('#contenido_proveedor').html('');
                        table_orden.classList.remove('table__seleccionados-activo');
                        redireccionar("lista-comprobantes");
                    }
                },
            });
        } else {
            contenedor_mensaje.classList.add('contenedor__mensaje-activo');
        }
    });
});