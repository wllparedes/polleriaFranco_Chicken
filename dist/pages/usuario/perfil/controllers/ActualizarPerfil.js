'use strict';
// ? MANTENIMIENTO DE CLIENTES
import {expresiones} from './../../../../assets/js/scripts/expresionesRegulares.js';
import {validarCampo, campos} from './../../../../assets/js/scripts/validarCampos.js';

$(document).ready(() => {

    //  Seleccionar Elementos DOM ( contenedor__mensaje / all inputs )

    let contenedor_mensaje = document.getElementById('contenedor__mensaje');
    const inputs = document.querySelectorAll('#formulario input');

    // Start Validación del formulario

    const validarFormulario = (e) => {
        switch (e.target.name) {
            case 'nombres':
                validarCampo(expresiones.nombres, 'nombres', e.target);
                break;
            case 'apellidos':
                validarCampo(expresiones.apellidos, 'apellidos', e.target);
                break;
            case 'numero':
                validarCampo(expresiones.telefono, 'numero', e.target);
                break;
            case 'dni':
                validarCampo(expresiones.dni, 'dni', e.target);
                break;
            case 'userName':
                validarCampo(expresiones.userName, 'userName', e.target);
                break;
            case 'correo':
                validarCampo(expresiones.correo, 'correo', e.target);
                break;
            case 'password':
                validarCampo(expresiones.password, 'password', e.target);
                break;
        }
    };

    inputs.forEach((input) => {
        input.addEventListener('keyup', validarFormulario);
        input.addEventListener('blur', validarFormulario);
    });

    // End


    $('.editar').click(function (e) {

        Object.keys(campos).forEach(campo => { campos[campo] = true; });

        // ? Check green
        document.querySelectorAll('.formulario__grupo span').forEach((i) => { i.classList.add('fa-check-circle') });
        document.querySelectorAll('.formulario__grupo span').forEach((i) => { i.classList.remove('fa-exclamation-circle') });
        document.getElementById('contenedor__mensaje').classList.remove('contenedor__mensaje-activo');
        document.querySelectorAll('.formulario__grupo').forEach((i) => { i.classList.add('formulario__grupo-correcto') })
        document.querySelectorAll('.formulario__grupo').forEach((i) => { i.classList.remove('formulario__grupo-incorrecto') })
        document.querySelectorAll('.formulario__input-error').forEach((i) => { i.classList.remove('formulario__input-error-activo') })

        // ? Button cambiar class
        let btn_editar = document.getElementById('btn_bipolar');
        btn_editar.setAttribute('disabled', true);

        // ? Cambiar los btns disabled = false
        let inputs = $('input');
        inputs.each( function() { $(this).prop('disabled', false) });

        // ? Crear un input para actualizar

        const contenedor_btn = document.getElementById('contenedor_btn');
        let btn_actualizar = document.createElement('button');
        btn_actualizar.classList.add('actualizar', 'btn', 'btn-lg', 'btn-light', 'bg-light');
        btn_actualizar.setAttribute('type', 'button');
        btn_actualizar.innerHTML = '<i class="fas fa-check-double"></i> &nbsp;<b>Actualizar Información</b>';
        contenedor_btn.append(btn_actualizar);

        e.preventDefault();    
        
        $('.actualizar').click(function (e) {

            if (campos.nombres && campos.apellidos && campos.numero && campos.dni && campos.userName && campos.password && campos.correo) { 

                // Ajax 
                const postData = {
                    nombres: $('#nombres').val(),
                    apellidos: $('#apellidos').val(),
                    numero: $('#numero').val(),
                    dni: $('#dni').val(),
                    userName: $('#userName').val(),
                    correo: $('#correo').val(),
                    password: $('#password').val(),
                };

                $.ajax({
                    url: '../models/actualizarPerfil.php',
                    type: 'POST',
                    data: postData,
                    success: function (response) {
                        let respuesta = response.trim();
                        if (respuesta === "error") {
                            no_registrado('usuario');
                        } else {
                            si_actualizado();
                            
                            // ? Cambiar los btns disabled = false
                            inputs.each( function() { $(this).prop('disabled', true) });
                            // Eliminar los check
                            document.querySelectorAll('.formulario__grupo-correcto').forEach((i) => {
                                i.classList.remove('formulario__grupo-correcto')
                            })
                            // ? Eliminar el input actualizar
                            btn_actualizar.parentNode.removeChild(btn_actualizar);
                            btn_editar.removeAttribute('disabled');
                            contenedor_mensaje.classList.remove('contenedor__mensaje-activo');
                            
                            let nuevoNombre = $('#userName').val();
                            $('#saludo').text(nuevoNombre);
                            $('#nombre_usuario').text(nuevoNombre);

                        }
                        
                    }

                })
                
            } else {
                contenedor_mensaje.classList.add('contenedor__mensaje-activo');
            }
    
            e.preventDefault();    
    
        });

    });


});



