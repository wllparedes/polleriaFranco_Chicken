'use strict';

$(document).ready(() => {
    
    // ? Obtener datos del usuario
    
    cargar_datos();
    function cargar_datos() {

        // Aquí haces una petición AJAX para obtener los datos del cliente utilizando el clienteID
        $.ajax({
            url: '../models/obtenerPerfil.php',
            type: 'GET',
            success: function (response) {
                // Aquí cargas los datos del cliente en los campos del formulario en el modal
                let usuario = JSON.parse(response);
                const datos = usuario['usuario'][0];
                
                $('#nombres').val(datos.nombres);
                $('#apellidos').val(datos.apellidos);
                $('#numero').val(datos.telefono);
                $('#dni').val(datos.dni);
                $('#userName').val(datos.nombre_usuario);
                $('#correo').val(datos.email);
                $('#password').val(datos.clave);

            }
        });


    };


});