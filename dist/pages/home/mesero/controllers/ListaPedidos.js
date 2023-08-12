$(document).ready( () => {
    
    ListaPedidos();

    function ListaPedidos() {
        $.ajax({
            url: '../models/listaPedidos.php',
            type: 'GET',
            success: function (response) {
                let pedidos = JSON.parse(response);
                let tablaVacia = document.getElementById('tabla');
                let template = '';

                if (response.trim() === '[]') {
                    tablaVacia.innerHTML = `<tr> <td colspan="8" class="text-center"> <h6>Sin registros por el momento</h6> </td> </tr>`;
                } else {

                    pedidos.forEach(pedido => {
                        template += 
                            `<tr pedidoID="${pedido.id_pedido}">
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
                            </tr>`
                    });
                    
                    $('#content').html(template);
                }



            }
        })
        
    }

});