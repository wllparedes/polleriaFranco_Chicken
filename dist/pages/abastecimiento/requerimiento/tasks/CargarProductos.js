$(document).ready(() => {
    $.ajax({
        url: '../tasks/cargarProductos.php',
        type: 'GET',
        success: function (response) {
            let data = JSON.parse(response);
            VirtualSelect.init({
                ele: '#select-productos',
                options: data,
                multiple: true,
                search: true,
                required: true,
                showSelectedOptionsFirst: true,
                searchPlaceholderText: 'Buscar...',
                noSearchResultsText: 'No se encontraron resultados',
                noOptionsText: 'No hay productos para mostrar',
                allOptionsSelectedText: 'Todo seleccionado',
                optionsSelectedText: 'Opciones seleccionadas',
                placeholder: `Seleccionar Productos`
            });
        }
    });
});