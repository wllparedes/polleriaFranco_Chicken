
$(document).ready(() => {

    fetchPedidos();
    // * Listar Pedidos
    function fetchPedidos() {
        $.ajax({
            url: '../models/listaPedidos.php',
            type: 'GET',
            success: function (response) {
                let pedidos = JSON.parse(response);
                let tablaVacia = document.getElementById('tabla');
                let template = '';

                if (response.trim() === '[]') {
                    tablaVacia.innerHTML = `<tr> <td colspan="10" class="text-center"> <h6>Sin registros por el momento</h6> </td> </tr>`;
                } else {
                    pedidos.forEach(pedido => {
                        template += `
                        <tr pedidoID="${pedido.id_pedido}">
                            <td>
                                <div class="badge badge-light">
                                    ${pedido.id_pedido} 
                                </div>
                            </td>
                            <td> ${pedido.nom_cliente} </td>
                            <td> ${pedido.fecha} </td>
                            <td>
                                <div class="badge badge-info">
                                    ${pedido.hora} 
                                </div>
                            </td>
                            <td>
                                <div class="badge badge-primary">
                                    S/. ${pedido.sub_total}
                                </div>    
                            </td>
                            <td>
                                <div class="badge badge-secondary">
                                    ${pedido.n_mesa} 
                                </div>
                            </td>
                            <td> ${pedido.observacion} </td>
                            <td> ${pedido.estado} </td>
                            <td> 
                                <button class="ver-btn btn btn-warning shadow-warning"> 
                                    <i class="fas fa-eye"></i>
                                </button> 
                            </td>
                            <td>
                                <button class="eliminar-btn btn btn-danger shadow-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>`
                    });
                    
                    $('#content').html(template);
                }
            },
        });
    };



    // ? BUSAR 
    $('#search').keyup(function () {
        if ($('#search').val() != "") {
            let search = $('#search').val();
            $.ajax({
                url: '../models/buscarPedido.php',
                type: 'POST',
                data: { search },
                success: function (response) {
                    let template = '';
                    if (response.trim() !== '[]') {
                        let pedidos = JSON.parse(response); // Convertir de string a json
                        pedidos.forEach(pedido => {
                            template += `
                                <tr pedidoID="${pedido.id_pedido}">
                                    <td>
                                        <div class="badge badge-light">
                                            ${pedido.id_pedido} 
                                        </div>
                                    </td>
                                    <td> ${pedido.nom_cliente} </td>
                                    <td> ${pedido.fecha} </td>
                                    <td>
                                        <div class="badge badge-info">
                                            ${pedido.hora} 
                                        </div>
                                    </td>
                                    <td>
                                        <div class="badge badge-primary">
                                            S/. ${pedido.sub_total}
                                        </div>    
                                    </td>
                                    <td>
                                        <div class="badge badge-secondary">
                                            ${pedido.n_mesa} 
                                        </div>
                                    </td>
                                    <td> ${pedido.observacion} </td>
                                    <td> ${pedido.estado} </td>
                                    <td> 
                                        <button class="ver-btn btn btn-warning shadow-warning"> 
                                            <i class="fas fa-eye"></i>
                                        </button> 
                                    </td>
                                    <td>
                                        <button class="eliminar-btn btn btn-danger shadow-danger">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>`;
                        });
                    } else {
                        template = `<tr> <td colspan="10" class="text-center"> Sin resultados de la búsqueda </td> </tr>`
                        $('#pedidos-result').html(template);
                    }
                    $('#pedidos-result').html(template);
                    $('#pedidos-result').show();
                },
            })
        } else {
            $('#pedidos-result').hide();
        }
    });

    // ? Eliminar

    $(document).on('click', '.eliminar-btn', function () {
        alerta_confirmacion().then((resultado) => {
            if (resultado) {
                //
                let element = $(this)[0].parentElement.parentElement;
                let id = $(element).attr('pedidoID');
                // 
                $.ajax({
                    url: '../models/eliminarPedido.php',
                    type: 'POST',
                    data: { id },
                    success: function (response) {
                        let respuesta = response.trim();
                        if (respuesta != 'correcto') {
                            no_eliminado();
                        } else {
                            fetchPedidos();
                            document.getElementById("search").value = "";
                            $('#pedidos-result').hide();
                            si_eliminado();
                        }
                    }
                });
                // 
            }
        });
    });

    // ? Ver Pedido
    $(document).on('click', '.ver-btn', function () {
        //
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('pedidoID');
        $.ajax({
            url: '../models/detallePedido.php',
            type: 'POST',
            data: { id },
            success: function (response) {
                let detalle_pedido = JSON.parse(response);
                window.location.href = 'detalle-pedido.php?pedido_id=' + id + '&detalle=' + encodeURIComponent(JSON.stringify(detalle_pedido));
            }
        })
        // 
    });
});