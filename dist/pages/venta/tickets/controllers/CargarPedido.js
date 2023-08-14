$(document).ready(() => {

    let table_pedido = document.getElementById('table_pedido');

    $('.seleccionar-pedido').on('click', function (e) {
        let valor = $('#select-pedido').val();
        if (valor.length > 0) {
            table_pedido.classList.add('table__seleccionados_dos-activo');
            $('.advPedido').hide();
            $.ajax({
                type: 'POST',
                url: '../models/mostrarPedido.php',
                data: { valor },
                success: function (response) {
                    let info_pedido = JSON.parse(response);
                    let productos = info_pedido['productos'];
                    
                    // ? Completo datos en los inputs
                    $('#id_pedido').val(info_pedido['id_pedido']);
                    $('#estado').val(info_pedido['estado']);
                    $('#nombre').val(info_pedido['nom_cliente']);
                    $('#fecha').val(info_pedido['fecha']);
                    $('#hora').val(info_pedido['hora']);
                    $('#mesa').val(info_pedido['n_mesa']);
                    $('#observacion').val(info_pedido['observacion']);
                    $('#sub_total').text(info_pedido['sub_total']);

                    // ? añadir a la tabla
                    let template = '';
                    productos.forEach(producto => {
                        template +=`
                            <tr productoID="${producto.id_consumible}">
                                <td>
                                    <div class="badge badge-light">
                                        ${producto.id_consumible} 
                                    </div>
                                </td>
                                <td>
                                    ${producto.nom_consumible}
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
                                <td> ${producto.cantidad} ud</td>
                                <td> ${producto.descripcion} </td>
                            </tr>`;
                    });
                    
                    $('#contenido_pedido').html(template);
                }
            })
        } else {
            $('.advPedido').show();
            $('#contenido_pedido').html('');
            table_pedido.classList.remove('table__seleccionados_dos-activo');
        }
        e.preventDefault();
    })

});