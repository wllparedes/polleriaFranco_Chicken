
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
                url: '../models/buscarOrdenCompra.php',
                type: 'POST',
                data: { search },
                success: function (response) {
                    let template = '';
                    if (response.trim() !== '[]') {
                        let ordenes = JSON.parse(response); // Convertir de string a json
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
                                </tr>`;
                        });
                    } else {
                        template = `<tr> <td colspan="8" class="text-center"> Sin resultados de la búsqueda </td> </tr>`
                        $('#ordenes-result').html(template);
                    }
                    $('#ordenes-result').html(template);
                    $('#ordenes-result').show();
                },
            })
        } else {
            $('#ordenes-result').hide();
        }
    });

    // ? Eliminar

    $(document).on('click', '.eliminar-btn', function () {
        alerta_confirmacion().then((resultado) => {
            if (resultado) {
                //
                let element = $(this)[0].parentElement.parentElement;
                let id = $(element).attr('ordenID');
                // 
                $.ajax({
                    url: '../models/eliminarOrdenCompra.php',
                    type: 'POST',
                    data: { id },
                    success: function (response) {
                        let respuesta = response.trim();
                        if (respuesta != 'correcto') {
                            no_eliminado();
                        } else {
                            fetchOrdenes();
                            document.getElementById("search").value = "";
                            $('#ordenes-result').hide();
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
        let id = $(element).attr('ordenID');
        $.ajax({
            url: '../models/detalleOrdenCompra.php',
            type: 'POST',
            data: { id },
            success: function (response) {
                let detalle_orden = JSON.parse(response);
                window.location.href = 'detalle-orden-compra.php?orden_id=' + id + '&detalle=' + encodeURIComponent(JSON.stringify(detalle_orden));
            }
        })
        // 
    });
});