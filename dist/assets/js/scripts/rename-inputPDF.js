function updateLabel() {
    var input = document.getElementById('pdf');
    var label = document.querySelector('.custom-file-label');

    if (input.files.length > 0) {
        label.innerHTML = input.files[0].name;
    } else {
        label.innerHTML = 'Seleccionar un PDF Comprobante de Compra (40MB MAX)';
    }
}
