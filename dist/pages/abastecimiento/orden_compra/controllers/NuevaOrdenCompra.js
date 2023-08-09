// ? Nueva orden de compra

$(document).ready(() => {

    let contenedor_mensaje = document.getElementById('contenedor__mensaje');

    $('#formulario').submit(function (e) {
        e.preventDefault();

        let select_proveedor = $('#select-proveedor');
        let select_requerimiento = $('#select-requerimiento');
        let fecha_hora = $('#fecha_hora');

        if ( !_.isEmpty(select_proveedor.val().trim()) && !_.isEmpty(select_requerimiento.val().trim()) && fecha_hora.val() ) {

            const postData = {
                id_proveedor: select_proveedor.val(),
                id_req: select_requerimiento.val(),
                fecha_hora: fecha_hora.val()
            };

            $.ajax({
                url: '../models/nuevaOrdenCompra.php',
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
                        $('.advProveedor').show();
                        $('.advRequerimiento').show();
                        $('#contenido').html('');
                        $('#contenido_requerimiento').html('');
                        table.classList.remove('table__seleccionados-activo');
                        table_requerimiento.classList.remove('table__seleccionados_dos-activo');
                        redireccionar("lista-ordenes-compras");
                    }
                },
            });
        } else {
            contenedor_mensaje.classList.add('contenedor__mensaje-activo');
        }
    });
});