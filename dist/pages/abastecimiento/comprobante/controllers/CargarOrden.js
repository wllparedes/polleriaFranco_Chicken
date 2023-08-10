$(document).ready(() => {

    let table_orden = document.getElementById('table_orden');

    $('.seleccionar').on('click', function (e) {
        let valor = $('#select-orden').val();
        if (valor.length > 0) {
            table_orden.classList.add('table__seleccionados-activo');
            $('.advOrden').hide();
            $.ajax({
                type: 'POST',
                url: '../models/mostrarOrden.php',
                data: { valor },
                success: function (response) {
                    let info_orden = JSON.parse(response);
                    let orden = info_orden['orden'][0];
                    let proveedor = info_orden['proveedor'][0];

                    // ? añadir a la tabla Orden de compra
                    let template = '';
                    template +=`
                        <tr ordenID="${orden.id_odc}">
                            <td>
                                <div class="badge badge-light">
                                    ${orden.id_odc} 
                                </div>
                            </td>
                            <td>
                                ${orden.id_req}
                            </td>
                            <td> ${orden.fecha} </td>
                            <td>
                            <div class="badge badge-primary">
                                    ${orden.hora}
                                </div>    
                            </td>
                            <td> ${orden.fecha_hora_entrega}</td>
                            <td> ${orden.estado} </td>
                            <td>
                                <div class="badge badge-warning">
                                    ${orden.igv}
                                </div>
                            </td>
                            <td>
                                <div class="badge badge-secondary">
                                    ${orden.total} 
                                </div>
                            </td>
                        </tr>`;
                    $('#contenido').html(template);

                    // ? añadir a la tabla proveedor
                    let template_proveedor = '';
                    template_proveedor +=`
                        <tr proveedorID="${proveedor.id_proveedor}">
                            <td>
                                <div class="badge badge-light">
                                    ${proveedor.id_proveedor} 
                                </div>
                            </td>
                            <td> ${proveedor.razon_social} </td>
                            <td>
                                ${proveedor.direccion}
                            </td>
                            <td> ${proveedor.correo} </td>
                            <td>
                                <div class="badge badge-success">
                                    ${proveedor.ruc}
                                </div>    
                            </td>
                            <td>
                                <div class="badge badge-info">
                                    ${proveedor.numero}</td>
                                </div>
                        </tr>`;
                    $('#contenido_proveedor').html(template_proveedor);
                }
            })
        } else {
            $('.advOrden').show();
            $('#contenido').html('');
            $('#contenido_proveedor').html('');
            table_orden.classList.remove('table__seleccionados-activo');
        }
        e.preventDefault();
    })

});