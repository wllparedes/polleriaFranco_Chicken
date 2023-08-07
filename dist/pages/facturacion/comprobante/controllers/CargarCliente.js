$(document).ready(() => {

    let table = document.getElementById('table');

    $('.seleccionar').on('click', function (e) {
        let valor = $('#select-cliente').val();
        if (valor.length > 0) {
            table.classList.add('table__seleccionados-activo');
            $('.advCliente').hide();
            $.ajax({
                type: 'POST',
                url: '../models/mostrarCliente.php',
                data: { valor },
                success: function (response) {
                    let cliente = JSON.parse(response);
                    let template = '';
                    template +=
                        `<tr clienteID="${cliente.id_cliente}">
                            <td>
                                <div class="badge badge-light">
                                    ${cliente.id_cliente}
                                </div>
                            </td>
                            <td> ${cliente.razon_social} </td>
                            <td> ${cliente.direccion} </td>
                            <td> ${cliente.correo} </td>
                            <td>
                                <div class="badge badge-success">
                                    ${cliente.ruc}
                                </div>
                            </td>
                            <td>
                                <div class="badge badge-info">
                                    ${cliente.numero}
                                </div>
                            </td>
                        </tr>`;
                    $('#contenido').html(template);
                }
            })
        } else {
            $('.advCliente').show();
            $('#contenido').html('');
            table.classList.remove('table__seleccionados-activo');
        }
        e.preventDefault();
    })

});