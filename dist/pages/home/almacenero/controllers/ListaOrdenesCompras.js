
$(document).ready(() => {

    fetchOrdenes();
    // * Listar ordenes de compras
    function fetchOrdenes() {
        $.ajax({
            url: '../models/listaOrdenesCompras.php',
            type: 'GET',
            success: function (response) {
                let ordenes = JSON.parse(response);
                
                let tablaVacia = document.getElementById('tabla');
                let template = '';

                if (response.trim() === '[]') {
                    tablaVacia.innerHTML = `<tr> <td colspan="8" class="text-center"> <h6>Sin registros por el momento</h6> </td> </tr>`;
                } else {
                    ordenes.forEach(orden => {
                        template += `
                        <tr ordenID="${orden.id_orden}">
                            <td>
                                <div class="badge badge-light">
                                    ${orden.id_orden} 
                                </div>
                            </td>
                            <td> ${orden.id_req} </td>
                            <td> ${orden.proveedor} </td>
                            <td> ${orden.fecha} </td>
                            <td>
                                <div class="badge badge-info">
                                    ${orden.hora} 
                                </div>
                            </td>
                            <td>
                                <div class="badge badge-success">
                                    S/. ${orden.igv} </td>
                                </div>
                            <td>
                                <div class="badge badge-primary">
                                    S/. ${orden.total}
                                </div>    
                            </td>
                            <td> ${orden.estado} </td>
                        </tr>`
                    });
                    
                    $('#content').html(template);
                }
            },
        });
    };


});