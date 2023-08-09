$(document).ready(() => {
    $.ajax({
        url: '../tasks/cargarProveedores.php',
        type: 'GET',
        success: function (response) {
            let data = JSON.parse(response);
            VirtualSelect.init({
                ele: '#select-proveedor',
                options: data,
                search: true,
                required: true,
                hasOptionDescription: true,
                showSelectedOptionsFirst: true,
                searchPlaceholderText: 'Buscar...',
                noSearchResultsText: 'No se encontraron resultados',
                noOptionsText: 'No hay proveedores para mostrar',
                allOptionsSelectedText: 'Todo seleccionado',
                optionsSelectedText: 'Opciones seleccionadas',
                placeholder: `Seleccionar Proveedor`
            });
        }
    });
});