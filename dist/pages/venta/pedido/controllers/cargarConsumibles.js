$(document).ready(() => {

    let table = document.getElementById('table');

    $('.seleccionar').on('click', function (e) {
        let valores = $('#select-consumibles').val();
        if (valores.length > 0) {
            table.classList.add('table__seleccionados-activo');
            $('.advConsumible').hide();
            $.ajax({
                type: 'POST',
                url: '../models/mostrarConsumibles.php',
                data: { valores },
                success: function (response) {
                    let consumibles = JSON.parse(response);
                    let template = '';
                    consumibles.forEach(consumible => {
                        template +=
                            `<tr consumibleID="${consumible.id_consumible}">
                                <td>
                                    <div class="badge badge-light">
                                        ${consumible.id_consumible}
                                    </div>
                                </td>
                                <td> ${consumible.nom_consumible} </td>
                                <td>
                                    <div class="badge badge-secondary">
                                        ${consumible.nom_categoria}
                                    </div>
                                </td>
                                <td> ${consumible.descripcion} </td>
                                <td>
                                    <div class="badge badge-primary">
                                        S/. ${consumible.precio}
                                    </div>
                                </td>
                                <td> 
                                    <input required type="text" id="unidad" pattern="[0-9]+" name="unidad" class="color-focus form-control input-unidad" placeholder="Ingrese la cantidad (u.)" value="1">
                                </td>
                            </tr>`;
                    });
                    $('#contenido').html(template);
                }
            })
        } else {
            $('.advConsumible').show();
            $('#contenido').html('');
            table.classList.remove('table__seleccionados-activo');
        }
        e.preventDefault();
    })

});