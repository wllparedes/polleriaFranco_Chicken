$(document).ready(() => {

    let table_comprobante = document.getElementById('table_comprobante');
    let table_cliente = document.getElementById('table_cliente');

    $('.seleccionar-comprobante').on('click', function (e) {
        let valor = $('#select-comprobante').val();
        if (valor.length > 0) {
            table_comprobante.classList.add('table__seleccionados-activo');
            $('.advComprobante').hide();
            $.ajax({
                type: 'POST',
                url: '../models/mostrarComprobante.php',
                data: { valor },
                success: function (response) {
                    let info_comprobante = JSON.parse(response);
                    const cliente = info_comprobante.cliente;
                    const comprobante = info_comprobante.comprobante[0];
                    const pedido = info_comprobante.pedido[0];
                    const productos = info_comprobante.productos;

                    // ? Completo datos en los inputs COMPROBANTE
                    $('#id_cdv').val(comprobante['id_cdv']);
                    $('#estado_cdv').val(comprobante['estado']);
                    $('#fecha_cdv').val(comprobante['fecha']);
                    $('#hora_cdv').val(comprobante['hora']);
                    $('#metodo_pago').val(comprobante['metodo_pago']);
                    $('#igv').val(comprobante['igv'] );
                    $('#total').val(comprobante['total']);

                    $('#monto_final').text(comprobante['total']);
                    $('#monto_igv').text(comprobante['igv']);


                    if (cliente.length != 0) {
                        table_cliente.classList.add('table__seleccionados_dos-activo')
                        
                        // ? Completo datos en los inputs CLIENTE
                        $('#id_cliente').val(comprobante['id_cliente']);
                        $('#correo').val(cliente[0]['correo']);
                        $('#direccion').val(cliente[0]['direccion']);
                        $('#numero').val(cliente[0]['numero']);
                        $('#razon_social').val(cliente[0]['razon_social']);
                        $('#ruc').val(cliente[0]['ruc']);

                    } else {
                        table_cliente.classList.remove('table__seleccionados_dos-activo')
                    }

                    
                    // ? Completo datos en los inputs PEDIDO
                    $('#id_pedido').val(pedido['id_pedido']);
                    $('#estado').val(pedido['estado']);
                    $('#nombre').val(pedido['nom_cliente']);
                    $('#fecha').val(pedido['fecha']);
                    $('#hora').val(pedido['hora']);
                    $('#mesa').val(pedido['n_mesa']);
                    $('#observacion').val(pedido['observacion']);
                    $('#sub_total').text(pedido['sub_total']);
                    
                    


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
            $('.advComprobante').show();
            $('#contenido_pedido').html('');
            table_comprobante.classList.remove('table__seleccionados-activo');
            table_cliente.classList.remove('table__seleccionados_dos-activo')
        }
        e.preventDefault();
    })

});