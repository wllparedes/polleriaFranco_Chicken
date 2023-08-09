$(document).ready(() => {

    let table = document.getElementById('table');

    $('.seleccionar').on('click', function (e) {
        let valor = $('#select-proveedor').val();
        if (valor.length > 0) {
            table.classList.add('table__seleccionados-activo');
            $('.advProveedor').hide();
            $.ajax({
                type: 'POST',
                url: '../models/mostrarProveedor.php',
                data: { valor },
                success: function (response) {
                    let proveedor = JSON.parse(response);
                    let template = '';
                    template +=
                        `<tr proveedorID="${proveedor.id_proveedor}">
                            <td>
                                <div class="badge badge-light">
                                    ${proveedor.id_proveedor}
                                </div>
                            </td>
                            <td> ${proveedor.razon_social} </td>
                            <td> ${proveedor.direccion} </td>
                            <td> ${proveedor.correo} </td>
                            <td>
                                <div class="badge badge-success">
                                    ${proveedor.ruc}
                                </div>
                            </td>
                            <td>
                                <div class="badge badge-info">
                                    ${proveedor.numero}
                                </div>
                            </td>
                        </tr>`;
                    $('#contenido').html(template);
                }
            })
        } else {
            $('.advProveedor').show();
            $('#contenido').html('');
            table.classList.remove('table__seleccionados-activo');
        }
        e.preventDefault();
    })

});