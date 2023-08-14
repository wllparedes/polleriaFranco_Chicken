$(document).ready(() => {
    $.ajax({
        url: '../tasks/cargarPedidos.php',
        type: 'GET',
        success: function (response) {
            let data = JSON.parse(response);
            VirtualSelect.init({
                ele: '#select-pedido',
                options: data,
                search: true,
                required: true,
                hasOptionDescription: true,
                showSelectedOptionsFirst: true,
                searchPlaceholderText: 'Buscar...',
                noSearchResultsText: 'No se encontraron resultados',
                noOptionsText: 'No hay pedidos para mostrar',
                allOptionsSelectedText: 'Todo seleccionado',
                optionsSelectedText: 'Opciones seleccionadas',
                placeholder: `Seleccionar Pedido`
            });
        }
    });
});