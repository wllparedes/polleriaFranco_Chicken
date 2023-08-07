
export const expresiones = {
	// * Cliente
	razon_social: /^[a-zA-Z\_\- ]{5,20}$/, // Letras, numeros, guion y guion_bajo
	direccion: /^[a-zA-Z0-9\_\-\. ][^@]{10,50}$/, // Letras y espacios, pueden llevar acentos.
	correo: /^[a-zA-Z0-9_.+-]+@([gmail]|[hotmail])+\.[a-zA-Z0-9-.]+$/,
	telefono: /^\+51\s\d{3}\s\d{3}\s\d{3}$/,// 7 a 14 numeros.
	ruc: /^\d{11}$/, // 7 a 14 numeros.

	// * Categoria
	nombre: /^[a-zA-Z\_\- ]{4,20}$/,
	descripcion: /^[a-zA-Z0-9\_\-\.\s][^@]{5,90}$/,

	// * Consumible
	consumible :/^[a-zA-Z0-9\_\-\. ][^@]{5,35}$/,
	precio: /^\d+(\.\d{1,2})?$/,

	// * Pedido
	observacion: /^[a-zA-Z0-9\_\-\. ][^@]{10,50}$/,

	// * Producto
	producto: /^[a-zA-Z0-9\_\-\. ][^@]{4,35}$/,

	// * Requerimiento
	registrador: /^[a-zA-Z\_\- ]{4,90}$/,

	// * Usuario
	nombres: /^[a-zA-Z\_\- ]{4,40}$/,
	apellidos: /^[a-zA-Z\_\- ]{4,40}$/,
	dni: /^\d{8}$/,
	userName: /^[a-zA-Z\_\- ]{4,40}$/,
	password: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/,
	numero: /^\+51\s\d{3}\s\d{3}\s\d{3}$/,

	// ? Faltan más expresiones regulares
}
