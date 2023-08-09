$(document).ready(() => {

    let table_requerimiento = document.getElementById('table_requerimiento');

    $('.seleccionar-requerimiento').on('click', function (e) {
        let valor = $('#select-requerimiento').val();
        if (valor.length > 0) {
            table_requerimiento.classList.add('table__seleccionados_dos-activo');
            $('.advRequerimiento').hide();
            $.ajax({
                type: 'POST',
                url: '../models/mostrarRequerimiento.php',
                data: { valor },
                success: function (response) {
                    let info_requerimiento = JSON.parse(response);
                    let productos = info_requerimiento['productos'];
                    
                    // ? Completo datos en los inputs
                    $('#id_req').val(info_requerimiento['id_req']);
                    $('#estado').val(info_requerimiento['estado']);
                    $('#registrador').val(info_requerimiento['registrador']);
                    $('#fecha').val(info_requerimiento['fecha']);
                    $('#hora').val(info_requerimiento['hora']);
                    $('#usuario').val(info_requerimiento['id_usuario']);
                    $('#observacion').val(info_requerimiento['observacion']);
                    $('#sub_total').text(info_requerimiento['sub_total']);


                    // ? añadir a la tabla
                    let template = '';
                    productos.forEach(producto => {
                        template +=`
                            <tr productoID="${producto.id_producto}">
                                <td>
                                    <div class="badge badge-light">
                                        ${producto.id_producto} 
                                    </div>
                                </td>
                                <td>
                                    ${producto.nom_producto}
                                </td>
                                <td>
                                    <div class="badge badge-secondary">
                                        ${producto.nom_categoria}
                                    </div>
                                </td>
                                <td>
                                <div class="badge badge-primary">
                                        S/. ${producto.precio}
                                    </div>    
                                </td>
                                <td> ${producto.cantidad} kg</td>
                                <td> ${producto.descripcion} </td>
                            </tr>`;
                    });
                    $('#contenido_requerimiento').html(template);
                }
            })
        } else {
            $('.advRequerimiento').show();
            $('#contenido_requerimiento').html('');
            table_requerimiento.classList.remove('table__seleccionados_dos-activo');
        }
        e.preventDefault();
    })

});