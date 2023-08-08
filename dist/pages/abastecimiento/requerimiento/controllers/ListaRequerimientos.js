
$(document).ready(() => {

    fetchRequerimientos();
    // * Listar Requerimientos
    function fetchRequerimientos() {
        $.ajax({
            url: '../models/listaRequerimientos.php',
            type: 'GET',
            success: function (response) {
                let requerimientos = JSON.parse(response);
                let tablaVacia = document.getElementById('tabla');
                let template = '';

                if (response.trim() === '[]') {
                    tablaVacia.innerHTML = `<tr> <td colspan="9" class="text-center"> <h6>Sin registros por el momento</h6> </td> </tr>`;
                } else {
                    requerimientos.forEach(requerimiento => {
                        template += `
                        <tr requerimientoID="${requerimiento.id_requerimiento}">
                            <td>
                                <div class="badge badge-light">
                                    ${requerimiento.id_requerimiento} 
                                </div>
                            </td>
                            <td> ${requerimiento.registrador} </td>
                            <td> ${requerimiento.fecha} </td>
                            <td>
                                <div class="badge badge-info">
                                    ${requerimiento.hora} 
                                </div>
                            </td>
                            <td>
                                <div class="badge badge-primary">
                                    S/. ${requerimiento.sub_total}
                                </div>    
                            </td>
                            <td> ${requerimiento.observacion} </td>
                            <td> ${requerimiento.estado} </td>
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
                url: '../models/buscarRequerimiento.php',
                type: 'POST',
                data: { search },
                success: function (response) {
                    let template = '';
                    if (response.trim() !== '[]') {
                        let requerimientos = JSON.parse(response); // Convertir de string a json
                        requerimientos.forEach(requerimiento => {
                            template += `
                                <tr requerimientoID="${requerimiento.id_requerimiento}">
                                    <td>
                                        <div class="badge badge-light">
                                            ${requerimiento.id_requerimiento} 
                                        </div>
                                    </td>
                                    <td> ${requerimiento.registrador} </td>
                                    <td> ${requerimiento.fecha} </td>
                                    <td>
                                        <div class="badge badge-info">
                                            ${requerimiento.hora} 
                                        </div>
                                    </td>
                                    <td>
                                        <div class="badge badge-primary">
                                            S/. ${requerimiento.sub_total}
                                        </div>    
                                    </td>
                                    <td> ${requerimiento.observacion} </td>
                                    <td> ${requerimiento.estado} </td>
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
                        template = `<tr> <td colspan="9" class="text-center"> Sin resultados de la búsqueda </td> </tr>`
                        $('#requerimientos-result').html(template);
                    }
                    $('#requerimientos-result').html(template);
                    $('#requerimientos-result').show();
                },
            })
        } else {
            $('#requerimientos-result').hide();
        }
    });

    // ? Eliminar

    $(document).on('click', '.eliminar-btn', function () {
        alerta_confirmacion().then((resultado) => {
            if (resultado) {
                //
                let element = $(this)[0].parentElement.parentElement;
                let id = $(element).attr('requerimientoID');
                // 
                $.ajax({
                    url: '../models/eliminarRequerimiento.php',
                    type: 'POST',
                    data: { id },
                    success: function (response) {
                        let respuesta = response.trim();
                        if (respuesta != 'correcto') {
                            no_eliminado();
                        } else {
                            fetchRequerimientos();
                            document.getElementById("search").value = "";
                            $('#requerimientos-result').hide();
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
        let id = $(element).attr('requerimientoID');
        $.ajax({
            url: '../models/detalleRequerimiento.php',
            type: 'POST',
            data: { id },
            success: function (response) {
                let detalle_requerimiento = JSON.parse(response);
                window.location.href = 'detalle-requerimiento.php?requerimiento_id=' + id + '&detalle=' + encodeURIComponent(JSON.stringify(detalle_requerimiento));
            }
        })
        // 
    });
});