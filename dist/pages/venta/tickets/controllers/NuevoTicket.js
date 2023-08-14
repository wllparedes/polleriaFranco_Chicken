$(document).ready(() => {

    let contenedor_mensaje = document.getElementById('contenedor__mensaje');

    $('#formulario').submit(function (e) {
        e.preventDefault();

        let select_pedido = $('#select-pedido');

        if (select_pedido.val()) {

            const id_pedido = select_pedido.val();

            window.open('../pdf/nuevoTicket.php?pedido_id=' + id_pedido, '_blank');

        } else {
            contenedor_mensaje.classList.add('contenedor__mensaje-activo');
        }

    })

});