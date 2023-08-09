$(document).ready(() => {
    $.ajax({
        url: '../tasks/cargarRequerimientos.php',
        type: 'GET',
        success: function (response) {
            let data = JSON.parse(response);
            VirtualSelect.init({
                ele: '#select-requerimiento',
                options: data,
                search: true,
                required: true,
                hasOptionDescription: true,
                showSelectedOptionsFirst: true,
                searchPlaceholderText: 'Buscar...',
                noSearchResultsText: 'No se encontraron resultados',
                noOptionsText: 'No hay requerimientos para mostrar',
                allOptionsSelectedText: 'Todo seleccionado',
                optionsSelectedText: 'Opciones seleccionadas',
                placeholder: `Seleccionar Requerimiento`
            });
        }
    });
});