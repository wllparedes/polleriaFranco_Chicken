-- Active: 1672707053078@@127.0.0.1@3306@polleriafrancochiken
--  BASE DE DATOS: "FRANCO CHICKEN"
-- Nota: Cuando veas el _detalle_ es parte de la normalización

create database PolleriaFrancoChiken;
use PolleriaFrancoChiken;

-- ABASTECIMIENTO

create table categoria(
    id_categoria INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nombre VARCHAR(20) NOT NULL,
    descripcion VARCHAR(90) NOT NULL
);

create table producto(
    id_producto INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nom_producto VARCHAR(35) NOT NULL,
    precio DECIMAL(8,2) NOT NULL,
    id_categoria INT NOT NULL,
    descripcion VARCHAR(90),
    FOREIGN KEY (id_categoria) REFERENCES categoria(id_categoria)
);

create table cargo(
    id_cargo INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nom_cargo VARCHAR(25) NOT NULL,
    descripcion VARCHAR(90) NOT NULL
);

create table usuario( -- empleado
    id_usuario INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nombres VARCHAR(40) NOT NULL,
    apellidos VARCHAR(40) NOT NULL,
    telefono VARCHAR(15) NOT NULL,
    dni VARCHAR(8) UNIQUE NOT NULL,
    nombre_usuario VARCHAR(40) NOT NULL,
    email VARCHAR(50) UNIQUE NOT NULL,
    clave VARBINARY(256) NOT NULL,
    id_cargo INT NOT NULL,
    FOREIGN KEY (id_cargo) REFERENCES cargo(id_cargo)
);

-- insert usuario values (null ,'walin', 'paredes', '922332', '34234', 'Walin Paredes', 'walin@gmail.com',  SHA2('walin', 256), 1);

-- select clave from usuario where id_usuario = SHA2('contraseña', 256);


create table requerimiento(
    id_req INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	registrador VARCHAR(90) NOT NULL,   
    fecha_hora TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    estado BOOLEAN NOT NULL,
	observacion VARCHAR(50) NOT NULL,   
    sub_total DECIMAL(8,2),
    id_usuario INT NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)
); 

create table detalle_requerimiento(
    id_req INT NOT NULL,
    id_producto INT NOT NULL,
    cantidad DECIMAL(8,2) NOT NULL,
    FOREIGN KEY (id_req) REFERENCES requerimiento(id_req),
    FOREIGN KEY (id_producto) REFERENCES producto(id_producto)
);

create table proveedor(
    id_proveedor INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    razon_social VARCHAR(20) NOT NULL,
    direccion VARCHAR(40) NOT NULL,
    ruc VARCHAR(20) NOT NULL,
    numero VARCHAR(20) NOT NULL,
    correo VARCHAR(20) NOT NULL
);

create table ordenDeCompra(
    id_ordenDeCompra INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    obs VARCHAR(100) NOT NULL,
    fecha_hora TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    estado BOOLEAN NOT NULL,
    total DECIMAL(8,2) NOT NULL,
    id_proveedor INT NOT NULL,
    id_req INT NOT NULL,
    FOREIGN KEY (id_req) REFERENCES requerimiento(id_req),
    FOREIGN KEY (id_proveedor) REFERENCES proveedor(id_proveedor)
);

create table comprobanteDeCompra(
    id_comprobanteDeCompra INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    descripcion VARCHAR(100),
    archivo VARCHAR(100) NOT NULL, -- URL DEL PDF
    fecha_hora TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    id_ordenDeCompra INT NOT NULL,
    FOREIGN KEY (id_ordenDeCompra) REFERENCES ordenDeCompra(id_ordenDeCompra)
);

-- VENTA
create table cliente(
    id_cliente INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    razon_social VARCHAR(20) NOT NULL,
    direccion VARCHAR(30) NOT NULL,
    correo VARCHAR(30) UNIQUE NOT NULL,
    ruc VARCHAR(11) UNIQUE NOT NULL,
    numero VARCHAR(15) NOT NULL
);


create table consumible(
    id_consumible INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nom_consumible VARCHAR(35) NOT NULL,
    descripcion VARCHAR(90) NOT NULL,
    precio DECIMAL(8,2) NOT NULL,
    id_categoria INT NOT NULL,
    FOREIGN KEY (id_categoria) REFERENCES categoria(id_categoria)
);

-- OBS

create table pedido(
    id_pedido INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nom_cliente VARCHAR(20) NOT NULL,
    fecha_hora TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    estado BOOLEAN NOT NULL,
    sub_total DECIMAL(8,2),
    n_mesa VARCHAR(10), -- COMBO BOX -- Puede ser vacio
    observacion VARCHAR(50)
);

create table detalle_pedido(
    id_pedido INT NOT NULL,
    id_consumible INT NOT NULL,
    cantidad INT NOT NULL,
    FOREIGN KEY (id_pedido) REFERENCES pedido(id_pedido),
    FOREIGN KEY (id_consumible) REFERENCES consumible(id_consumible)
);

create table ticketPedido(
    id_ticket INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    id_pedido INT NOT NULL,
    FOREIGN KEY (id_pedido) REFERENCES pedido(id_pedido)
);

-- FACTURACIÓN 


create table comprobanteDeVenta(
    id_comprobanteDeVenta INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    metodo_pago VARCHAR(20) NOT NULL,
    fecha_hora TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    estado BOOLEAN NOT NULL,
    total DECIMAL(8,2) NOT NULL,
    igv DECIMAL(8,2) NOT NULL,
    id_pedido INT NOT NULL,
    id_usuario INT NOT NULL,
    id_cliente INT,
    FOREIGN KEY (id_pedido) REFERENCES pedido(id_pedido),
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario),
    FOREIGN KEY (id_cliente) REFERENCES cliente(id_cliente)
);


-- COSAS EXTRA DE LOS PROCESOS

-- create table infoEmpresa(
-- id_empresa INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
-- razon_social VARCHAR(100),
-- ruc VARCHAR(100),
-- direccion VARCHAR(100),
-- ciudad VARCHAR(100),
-- email VARCHAR(100),
-- telefono VARCHAR(100)
-- );


-- INSERT CARGO
INSERT INTO `cargo` (`id_cargo`, `nom_cargo`, `descripcion`) 
VALUES 
	(NULL, 'Almacenero', 'El almacenero se encarga de los procesos de abastecimiento.'), 
    (NULL, 'Recepcionista', 'La recepcionista se encarga de los procesos de mantenimiento y facturación.'),	
	(NULL, 'Mesero', 'El mesero se encarga de los procesos de ventas.'); 


-- Definir la clave

-- Insertar el usuario en la tabla usuarios
SET @clave = 'clave_secreta';
INSERT INTO `usuario` (`id_usuario`, `nombres`, `apellidos`, `telefono`, `dni`, `nombre_usuario`, `email`, `clave`, `id_cargo`) 
VALUES 
    (NULL, 'Joshua', 'Walter', '+51 910 446 150', '01543150', 'Joshua Walter', 'almacenero@gmail.com', AES_ENCRYPT('Almacenero123@', @clave) , '1'),
    (NULL, 'Emma', 'Cisneros', '+51 910 446 150', '30513153', 'Emma Cisneros', 'recepcionista@gmail.com', AES_ENCRYPT('Recepcionista123@', @clave) , '2'),
    (NULL, 'Adam', 'Paredes', '+51 900 116 110', '01013153', 'Adam Paredes', 'mesero@gmail.com', AES_ENCRYPT('Mesero123@', @clave) , '3');


-- INSERT CLIENTES 

INSERT INTO `cliente` (`id_cliente`, `razon_social`, `direccion`, `correo`, `ruc`, `numero`) 
VALUES 
	(NULL, 'Juan', 'Jr Alondras av 2', 'juan@gmail.com', '34341256134', '+51 987 401 095'),  
	(NULL, 'Johan', 'Tupac Amaru Calle 2', 'johan@gmail.com', '01045678905', '+51 901 721 152'),
	(NULL, 'Daniel', 'Av Camote Jr 5', 'daniel@gmail.com', '14221559931', '+51 918 932 146'),
	(NULL, 'Sofia', 'Alameda Jr 4', 'sofia@gmail.com', '25671286154', '+51 941 983 311');

-- CATEGORIA
INSERT INTO `categoria` (`id_categoria`, `nombre`, `descripcion`) VALUES
    (NULL, 'Platillo', 'Los platillos son las comidas tradicionales para la venta a nuestros clientes.'), 
    (NULL, 'Bebida', 'Las bebidas son los jugos hechos de fruta para refrescar a los clientes. ');

-- CONSUMIBLES
INSERT INTO `consumible` (`id_consumible`, `nom_consumible`, `descripcion`, `precio`, `id_categoria`) 
    VALUES 
        (NULL, '1/4 de Pollo', 'papas fritas + ensalada fresca + cremas.', '16.00', '1'), 
        (NULL, '1/2 de Pollo', 'papas fritas + ensalada fresca + cremas.', '31.00', '1'),
        (NULL, '1 Pollo', 'papas fritas + ensalada fresca + cremas.', '51.00', '1'), 
        (NULL, 'Anticuchos', '3 palitos + 2 rodajas de choclo + papas nativas + ensalada.', '18.00', '1'), 
        (NULL, 'Brochetas de Pollo', '2 brochetas de pollo + papas fritas + ensalada.', '18.00', '1'), 
        (NULL, 'Broaster Pierna', '1/4 de pollo + papas fritas + ensalada fresca.', '12.00', '1'), 
        (NULL, 'Piqueo Brasa', '1/4 de ala brasa + 1 palito de anticucho + 1 chorizo + cremas.', '33.00', '1'), 
        (NULL, 'Pisco Sour', 'Sin Descripción.', '15.00', '2'), 
        (NULL, 'Maracuya Sour', 'Sin Descripción.', '15.00', '2'), 
        (NULL, 'Margarita', 'Sin Descripción.', '15.00', '2'), 
        (NULL, 'Red Margarita', 'Sin Descripción.', '15.00', '2'),
        (NULL, 'Moscou Mule', 'Sin descripción.', '15.00', '2'), 
        (NULL, 'Whisky Sour', 'Sin descripción.', '15.00', '2');


-- VISTA PARA CALCULAR EL SUBTOTAL de Pedido
CREATE VIEW CALCULAR_SUBTOTAL AS
SELECT dp.id_pedido, SUM(dp.cantidad * c.precio) AS subtotal
FROM detalle_pedido dp
JOIN consumible c ON dp.id_consumible = c.id_consumible
GROUP BY dp.id_pedido;

-- SUB TOTAL de  Requerimiento
CREATE VIEW CALCULAR_SUBTOTAL_REQUERIMIENTO AS
SELECT dr.id_req, SUM(dr.cantidad * p.precio) AS subtotal
FROM detalle_requerimiento dr
JOIN producto p ON dr.id_producto = p.id_producto
GROUP BY dr.id_req;


select * from pedido;
select * from detalle_pedido;
delete from detalle_pedido where id_pedido = 5;

CREATE VIEW VER_PEDIDO AS
SELECT p.*, dp.id_consumible, dp.cantidad, c.nom_consumible, c.descripcion, c.precio, cate.nombre as nom_categoria
FROM pedido p, detalle_pedido dp, consumible c, categoria cate
WHERE p.id_pedido = dp.id_pedido  
AND dp.id_consumible = c.id_consumible 
AND c.id_categoria = cate.id_categoria;

CREATE VIEW VER_COMPROBANTE AS
SELECT cdv.id_comprobanteDeVenta as id_cdv, cdv.metodo_pago, cdv.fecha_hora as fecha_hora_cdv, cdv.estado as estado_cdv, 
cdv.total, cdv.igv, cdv.id_usuario, cdv.id_cliente, p.*,
dp.id_consumible, dp.cantidad, c.nom_consumible, c.descripcion, c.precio, cate.nombre as nom_categoria
FROM comprobantedeventa cdv, pedido p, detalle_pedido dp, consumible c, categoria cate
WHERE cdv.id_pedido = p.id_pedido   
AND p.id_pedido = dp.id_pedido
AND dp.id_consumible = c.id_consumible 
AND c.id_categoria = cate.id_categoria;

SELECT * FROM VER_COMPROBANTE WHERE id_cdv = 25;

select * from cliente where razon_social = 'Juan';

SELECT * FROM comprobanteDeVenta;
SELECT * FROM VER_PEDIDO WHERE id_pedido = 8;