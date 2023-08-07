
$(document).ready(() => {

    fetchComprobantes();
    // * Listar Comprobantes
    function fetchComprobantes() {
        $.ajax({
            url: '../models/listaComprobantes.php',
            type: 'GET',
            success: function (response) {
                let comprobantes = JSON.parse(response);
                let tablaVacia = document.getElementById('tabla');
                let template = '';

                if (response.trim() === '[]') {
                    tablaVacia.innerHTML = `<tr> <td colspan="11" class="text-center"> <h6>Sin registros por el momento</h6> </td> </tr>`;
                } else {
                    comprobantes.forEach(comprobante => {
                        template += `
                        <tr comprobanteID="${comprobante.id_comprobante}">
                            <td>
                                <div class="badge badge-light">
                                    ${comprobante.id_comprobante} 
                                </div>
                            </td>
                            <td> ${comprobante.id_pedido} </td>
                            <td> ${comprobante.nombre} </td>
                            <td> ${comprobante.fecha} </td>
                            <td>
                                <div class="badge badge-info">
                                    ${comprobante.hora} 
                                </div>
                            </td>
                            <td>
                                <div class="badge badge-success">
                                    S/. ${comprobante.igv} </td>
                                </div>
                            <td>
                                <div class="badge badge-primary">
                                    S/. ${comprobante.total}
                                </div>    
                            </td>
                            <td>
                                <div class="badge badge-secondary">
                                    ${comprobante.metodo_pago} 
                                </div>
                            </td>
                            <td> ${comprobante.estado} </td>
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
                url: '../models/buscarComprobante.php',
                type: 'POST',
                data: { search },
                success: function (response) {
                    let template = '';
                    if (response.trim() !== '[]') {
                        let comprobantes = JSON.parse(response); // Convertir de string a json
                        comprobantes.forEach(comprobante => {
                            template += `
                                <tr comprobanteID="${comprobante.id_comprobante}">
                                    <td>
                                        <div class="badge badge-light">
                                            ${comprobante.id_comprobante} 
                                        </div>
                                    </td>
                                    <td> ${comprobante.id_pedido} </td>
                                    <td> ${comprobante.nombre} </td>
                                    <td> ${comprobante.fecha} </td>
                                    <td>
                                        <div class="badge badge-info">
                                            ${comprobante.hora} 
                                        </div>
                                    </td>
                                    <td>
                                        <div class="badge badge-success">
                                            S/. ${comprobante.igv} </td>
                                        </div>
                                    <td>
                                        <div class="badge badge-primary">
                                            S/. ${comprobante.total}
                                        </div>    
                                    </td>
                                    <td>
                                        <div class="badge badge-secondary">
                                            ${comprobante.metodo_pago} 
                                        </div>
                                    </td>
                                    <td> ${comprobante.estado} </td>
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
                        template = `<tr> <td colspan="11" class="text-center"> Sin resultados de la búsqueda </td> </tr>`
                        $('#comprobantes-result').html(template);
                    }
                    $('#comprobantes-result').html(template);
                    $('#comprobantes-result').show();
                },
            })
        } else {
            $('#comprobantes-result').hide();
        }
    });

    // ? Eliminar

    $(document).on('click', '.eliminar-btn', function () {
        alerta_confirmacion().then((resultado) => {
            if (resultado) {
                //
                let element = $(this)[0].parentElement.parentElement;
                let id = $(element).attr('comprobanteID');
                // 
                $.ajax({
                    url: '../models/eliminarComprobante.php',
                    type: 'POST',
                    data: { id },
                    success: function (response) {
                        let respuesta = response.trim();
                        if (respuesta != 'correcto') {
                            no_eliminado();
                        } else {
                            fetchComprobantes();
                            document.getElementById("search").value = "";
                            $('#comprobantes-result').hide();
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
        let id = $(element).attr('comprobanteID');
        $.ajax({
            url: '../models/detalleComprobante.php',
            type: 'POST',
            data: { id },
            success: function (response) {
                let detalle_comprobante = JSON.parse(response);
                console.log(detalle_comprobante)
                window.location.href = 'detalle-comprobante.php?comprobante_id=' + id + '&detalle=' + encodeURIComponent(JSON.stringify(detalle_comprobante));
            }
        })
        // 
    });
});