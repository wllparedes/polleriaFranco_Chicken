
VirtualSelect.init({
    ele: '#select-metodos',
    options: [
        {label: 'Efectivo', value: 'Efectivo'},
        {label: 'Tarjeta de Crédito', value: 'Tarjeta de Crédito'},
        {label: 'Tarjeta de Débito', value: 'Tarjeta de Débito'},
    ],
    search: true,
    searchPlaceholderText: 'Buscar...',
    noSearchResultsText: 'No se encontraron resultados',
    noOptionsText: 'No hay opciones para mostrar',
    allOptionsSelectedText: 'Todo seleccionado',
    optionsSelectedText: 'Opciones seleccionadas',
    placeholder: `Seleccionar Método de Pago`
});

