$(document).ready(() => {
    $.ajax({
        url: '../tasks/cargarOrden.php',
        type: 'GET',
        success: function (response) {
            let data = JSON.parse(response);
            VirtualSelect.init({
                ele: '#select-orden',
                options: data,
                search: true,
                required: true,
                hasOptionDescription: true,
                showSelectedOptionsFirst: true,
                searchPlaceholderText: 'Buscar...',
                noSearchResultsText: 'No se encontraron resultados',
                noOptionsText: 'No hay ordenes para mostrar',
                allOptionsSelectedText: 'Todo seleccionado',
                optionsSelectedText: 'Opciones seleccionadas',
                placeholder: `Seleccionar Orden de Compra`
            });
        }
    });
});