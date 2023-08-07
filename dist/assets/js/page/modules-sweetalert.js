"use strict";

// $("#swal-1").click(function() {
// 	swal('Hello');
// });

// $("#swal-2").click(function() {
// 	swal('Good Job', 'You clicked the button!', 'success');
// });

// $("#swal-3").click(function() {
// 	swal('Good Job', 'You clicked the button!', 'warning');
// });

// $("#swal-4").click(function() {
// 	swal('Good Job', 'You clicked the button!', 'info');
// });

// $("#swal-5").click(function() {
// 	swal('Good Job', 'You clicked the button!', 'error');
// });

// $("#swal-6").click(function() {
//   swal({
//       title: 'Are you sure?',
//       text: 'Once deleted, you will not be able to recover this imaginary file!',
//       icon: 'warning',
//       buttons: true,
//       dangerMode: true,
//     })
//     .then((willDelete) => {
//       if (willDelete) {
//       swal('Poof! Your imaginary file has been deleted!', {
//         icon: 'success',
//       });
//       } else {
//       swal('Your imaginary file is safe!');
//       }
//     });
// });

// $("#swal-7").click(function() {
//   swal({
//     title: 'What is your name?',
//     content: {
//     element: 'input',
//     attributes: {
//       placeholder: 'Type your name',
//       type: 'text',
//     },
//     },
//   }).then((data) => {
//     swal('Hello, ' + data + '!');
//   });
// });


// $("#swal-8").click(function() {
//   swal('This modal will disappear soon!', {
//     buttons: false,
//     timer: 3000,
//   });
// });


// ? ALERTAS PROPIAS

// 
const si_registrado = () => {
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Se ha registrado exitosamente!',
        showConfirmButton: false,
        timer: 1500
    })
};

//  
const no_registrado = (tabla) => {
    Swal.fire({
        position: 'center',
        icon: 'warning',
        title: 'No se ha podido registrar',
        text: `Datos anteriormente añadidos, asegúrese de no repetir datos. Usted podría editar el ${tabla}.`,
        showConfirmButton: false,
        timer: 5000
    })
};

// 
const alerta_confirmacion = () => {
    return new Promise((resolve) => {
        Swal.fire({
            title: '¿Estás seguro de eliminar el registro?',
            text: 'Ya no podrás recuperarlo',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#fc424a',
            cancelButtonColor: '#0090e7',
            confirmButtonText: 'Eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            resolve(result.isConfirmed);
        });
    });
};

// 
const si_eliminado = () => {

    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
    });
    Toast.fire({
        icon: 'success',
        title: 'Eliminación satisfactoria.'
    });
};

// 
const no_eliminado = () => {
    Swal.fire({
        position: 'center',
        icon: 'error',
        title: 'No se ha podido eliminar',
        text: 'Parece que este registro está enlazado en otro registro, verífiquelo.',
        showConfirmButton: false,
        timer: 2500
    })
};

// 
const error = () => {
    Swal.fire({
        position: 'center',
        icon: 'error',
        title: 'Error',
        text: 'Ha ocurrido un error, intentelo más tarde.',
        showConfirmButton: false,
        timer: 2500
    })
};

// 
// const no_actualizado = () => {
//     const Toast = Swal.mixin({
//         toast: true,
//         position: 'top-end',
//         showConfirmButton: false,
//         timer: 3000,
//         timerProgressBar: true,
//         didOpen: (toast) => {
//             toast.addEventListener('mouseenter', Swal.stopTimer)
//             toast.addEventListener('mouseleave', Swal.resumeTimer)
//         }
//     });
//     Toast.fire({
//         icon: 'error',
//         title: 'Actualización fallida.',
//         text: 'Digite los datos correctos.'
//     });
// };

// 

const si_actualizado = () => {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true
    });
    Toast.fire({
        icon: 'success',
        title: 'Actualización satisfactoria.'
    });
};

const usuario_now = () => {
    Swal.fire({
        position: 'center',
        icon: 'warning',
        title: 'No se ha podido eliminar',
        text: `Usted no puede eliminarse a si mismo, por favor consulte con sus superiores.`,
        showConfirmButton: false,
        timer: 5000
    })
};