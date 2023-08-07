
VirtualSelect.init({
    ele: '#select-mesas',
    options: [
        {label: 'Mesa N° 1', value: 'Mesa N° 1'},
        {label: 'Mesa N° 2', value: 'Mesa N° 2'},
        {label: 'Mesa N° 3', value: 'Mesa N° 3'},
        {label: 'Mesa N° 4', value: 'Mesa N° 4'},
        {label: 'Mesa N° 5', value: 'Mesa N° 5'},
        {label: 'Mesa N° 6', value: 'Mesa N° 6'},
    ],
    search: true,
    searchPlaceholderText: 'Buscar...',
    noSearchResultsText: 'No se encontraron resultados',
    noOptionsText: 'No hay opciones para mostrar',
    allOptionsSelectedText: 'Todo seleccionado',
    optionsSelectedText: 'Opciones seleccionadas',
    placeholder: `Seleccionar Mesa`
});
