// ? Nuevo comprobante

$(document).ready(() => {


    let contenedor_mensaje = document.getElementById('contenedor__mensaje');


    $('#formulario').submit(function (e) {
        e.preventDefault();

        let select_cliente = $('#select-cliente');
        let select_pedido = $('#select-pedido');
        let select_metodo = $('#select-metodos');

        if ( !_.isEmpty(select_pedido.val().trim()) && !_.isEmpty(select_metodo.val().trim()) ) {
                
            const postData = {
                id_pedido: select_pedido.val(),
                metodo_pago: select_metodo.val(),
                id_cliente: select_cliente.val(),
            };

            $.ajax({
                url: '../models/nuevoComprobante.php',
                type: 'POST',
                data: postData,
                success: function (response) {
                    console.log(response);
                    let respuesta = response.trim();
                    if (respuesta != "correcto") {
                        error();
                    } else {

                        contenedor_mensaje.classList.remove('contenedor__mensaje-activo');
                        // 
                        si_registrado();
                        $('#formulario').trigger('reset');
                        $('.advCliente').show();
                        $('.advPedido').show();
                        $('#contenido').html('');
                        $('#contenido_pedido').html('');
                        table.classList.remove('table__seleccionados-activo');
                        table_pedido.classList.remove('table__seleccionados_dos-activo');
                        redireccionar("lista-comprobantes");
                    }
                },
            });
        } else {
            contenedor_mensaje.classList.add('contenedor__mensaje-activo');
        }
    });
});