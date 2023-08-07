
export const campos = {
    // * Cliente
    razon_social: false,
    direccion: false,
    correo: false,
    ruc: false,
    numero: false,
    // * Categoria
    nombre: false,
    descripcion: false,
    // * Consumible
    precio: false,
    consumible: false,

    // * Pedido
    observacion: false,

    // * Producto
    producto: false,

    // * Requerimiento
    registrador: false,

    // * User
    nombres: false,
    apellidos: false,
    dni: false,
    userName: false,
    password: false,



    // ? Faltan más campos
}

export const validarCampo = (expresion, campo, input) => {

    // Seleccionar elementos DOM ( / )
    let form_grupo = document.getElementById(`grupo__${campo}`);
    let span = document.querySelector(`#grupo__${campo} span`);
    let error = document.querySelector(`#grupo__${campo} .formulario__input-error`);

    if ( _.isEmpty(input.value.trim()) ) {
        form_grupo.classList.remove('formulario__grupo-incorrecto');
        span.classList.remove('fa-exclamation-circle');
        error.classList.remove('formulario__input-error-activo')
        form_grupo.classList.remove('formulario__grupo-correcto');
        span.classList.remove('fa-check-circle');
        campos[campo] = false;

    } else {
        
        if (expresion.test(input.value)) {
            form_grupo.classList.remove('formulario__grupo-incorrecto');
            form_grupo.classList.add('formulario__grupo-correcto');
            span.classList.remove('fa-exclamation-circle');
            span.classList.add('fa-check-circle');
            error.classList.remove('formulario__input-error-activo')
    
            campos[campo] = true;

        } else {
            form_grupo.classList.add('formulario__grupo-incorrecto');
            form_grupo.classList.remove('formulario__grupo-correcto');
            span.classList.add('fa-exclamation-circle');
            span.classList.remove('fa-check-circle');
            error.classList.add('formulario__input-error-activo')
            
            campos[campo] = false;

        }
    }
}






