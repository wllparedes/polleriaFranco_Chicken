$(document).ready(() => {

    let table = document.getElementById('table');

    $('.seleccionar').on('click', function (e) {
        let valores = $('#select-productos').val();
        if (valores.length > 0) {
            table.classList.add('table__seleccionados-activo');
            $('.advProducto').hide();
            $.ajax({
                type: 'POST',
                url: '../models/mostrarProductos.php',
                data: { valores },
                success: function (response) {
                    let productos = JSON.parse(response);
                    let template = '';
                    productos.forEach(producto => {
                        template +=
                            `<tr productoID="${producto.id_producto}">
                                <td>
                                    <div class="badge badge-light">
                                        ${producto.id_producto}
                                    </div>
                                </td>
                                <td> ${producto.nom_producto} </td>
                                <td>
                                    <div class="badge badge-secondary">
                                        ${producto.nom_categoria}
                                    </div>
                                </td>
                                <td> ${producto.descripcion} </td>
                                <td>
                                    <div class="badge badge-primary">
                                        S/. ${producto.precio}
                                    </div>
                                </td>
                                <td> 
                                    <input required type="text" id="unidad" pattern="[0-9\.]+" name="unidad" class="color-focus form-control input-unidad" placeholder="Ingrese la cantidad (kg.)">
                                </td>
                            </tr>`;
                    });
                    $('#contenido').html(template);
                }
            })
        } else {
            $('.advProducto').show();
            $('#contenido').html('');
            table.classList.remove('table__seleccionados-activo');
        }
        e.preventDefault();
    })

});