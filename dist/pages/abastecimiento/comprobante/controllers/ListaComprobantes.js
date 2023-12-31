
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
                    tablaVacia.innerHTML = `<tr> <td colspan="8" class="text-center"> <h6>Sin registros por el momento</h6> </td> </tr>`;
                } else {
                    comprobantes.forEach(comprobante => {
                        template += `
                        <tr comprobanteID="${comprobante.id_cdv}">
                            <td>
                                <div class="badge badge-light">
                                    ${comprobante.id_cdv} 
                                </div>
                            </td>
                            <td> ${comprobante.id_odc} </td>
                            <td> ${comprobante.observacion} </td>
                            <td> ${comprobante.archivo} </td>
                            <td> ${comprobante.fecha} </td>
                            <td>
                                <div class="badge badge-info">
                                    ${comprobante.hora} 
                                </div>
                            </td>
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
                                <tr comprobanteID="${comprobante.id_cdv}">
                                    <td>
                                        <div class="badge badge-light">
                                            ${comprobante.id_cdv} 
                                        </div>
                                    </td>
                                    <td> ${comprobante.id_odc} </td>
                                    <td> ${comprobante.observacion} </td>
                                    <td> ${comprobante.archivo} </td>
                                    <td> ${comprobante.fecha} </td>
                                    <td>
                                        <div class="badge badge-info">
                                            ${comprobante.hora} 
                                        </div>
                                    </td>
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
                            error();
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

    // ? Ver PDF
    $(document).on('click', '.ver-btn', function () {
        //
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('comprobanteID');
        $.ajax({
            url: '../models/verComprobante.php',
            type: 'POST',
            data: { id },
            success: function (response) {
                window.open( response, '_blank');
            }
        })
        // 
    });
});