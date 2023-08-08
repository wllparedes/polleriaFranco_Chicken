// ? Nuevo comprobante

$(document).ready(() => {

    let contenedor_mensaje = document.getElementById('contenedor__mensaje');

    $('#formulario').submit(function (e) {
        e.preventDefault();

        let select_comprobante = $('#select-comprobante');

        if ( !_.isEmpty(select_comprobante.val().trim()) ) {
                
            const postData = {
                id_cdv: select_comprobante.val(),
            };

            $.ajax({
                url: '../models/registrarComprobante.php',
                type: 'POST',
                data: postData,
                success: function (response) {
                    let respuesta = response.trim();
                    if (respuesta != "correcto") {
                        error();
                    } else {
                        contenedor_mensaje.classList.remove('contenedor__mensaje-activo');
                        // 
                        si_registrado();
                        $('#formulario').trigger('reset');
                        $('.advComprobante').show();
                        $('#contenido_pedido').html('');
                        table_comprobante.classList.remove('table__seleccionados-activo');
                        table_cliente.classList.remove('table__seleccionados_dos-activo');
                        // 
                        redireccionar("./../../comprobante/views/lista-comprobantes");
                    }
                },
            });
        } else {
            contenedor_mensaje.classList.add('contenedor__mensaje-activo');
        }
    });
});