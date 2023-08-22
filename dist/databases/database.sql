-- Active: 1672707053078@@127.0.0.1@3306@polleriafrancochicken
create database PolleriaFrancoChicken;
use PolleriaFrancoChicken;

-- Info de la empresa "Polleria Franco Chicken"
create table Empresa(
	id_empresa INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	razon_social VARCHAR(20),
	ruc VARCHAR(11),
	direccion VARCHAR(80),
	ciudad VARCHAR(20),
	email VARCHAR(30),
	telefono VARCHAR(15),
	telefono_fijo VARCHAR(15)
);

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
	-- registrador VARCHAR(90) NOT NULL,   
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
    direccion VARCHAR(30) NOT NULL,
    ruc VARCHAR(11) NOT NULL,
    numero VARCHAR(15) NOT NULL,
    correo VARCHAR(30) NOT NULL
);

create table ordenDeCompra(
    id_ordenDeCompra INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    fecha_hora TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    estado BOOLEAN NOT NULL,
	igv DECIMAL(8,2) NOT NULL,
    total DECIMAL(8,2) NOT NULL,
    id_proveedor INT NOT NULL,
    id_req INT NOT NULL,
    id_empresa INT NOT NULL,
    fecha_hora_entrega TIMESTAMP NOT NULL,
    FOREIGN KEY (id_empresa) REFERENCES Empresa(id_empresa),
    FOREIGN KEY (id_req) REFERENCES requerimiento(id_req),
    FOREIGN KEY (id_proveedor) REFERENCES proveedor(id_proveedor)
);

create table comprobanteDeCompra(
    id_comprobanteDeCompra INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    observacion VARCHAR(100),
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

-- Tablas para los registros de gastos y ventas

CREATE TABLE balance_ventas(
    id INT PRIMARY KEY AUTO_INCREMENT,
    monto_ventas DECIMAL(8,2),
    ingreso DECIMAL(8,2),
    igv_ingreso DECIMAL(8,2),
    fecha_hora_ultimaVenta TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE balance_compras(
    id INT PRIMARY KEY AUTO_INCREMENT,
    monto_compras DECIMAL(8,2),
    gasto DECIMAL(8,2),
    igv_gasto DECIMAL(8,2),
    fecha_hora_ultimaCompra TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- INSERT EMPRESA
INSERT INTO `Empresa` (`id_empresa`, `razon_social`, `ruc`, `direccion`, `ciudad`, `email`, `telefono`, `telefono_fijo`) VALUES 
	(NULL, 'Franco Chicken', '09072834561', 'Urb. el exito Mz. C Lt. 19-San Gregorio', 'Lima/Vitarte', 'Sin Correo.', '+51 946 484 077', '(51) 356 2041');

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

-- INSERT PROVEEDORES
INSERT INTO `proveedor` (`id_proveedor`, `razon_social`, `direccion`, `ruc`, `numero`, `correo`) VALUES 
(NULL, 'Alejandro Villanueva', 'Puente Camote Jr Plata', '00728817211', '+51 943 433 034', 'alejandrosimp@gmail.com'), 
(NULL, 'Adam Torres', 'Jr La florida Calle 2', '01223637811', '+51 923 322 032', 'adam@gmail.com'), 
(NULL, 'Melissa Flores', 'Los molinos Calle 2', '90230067731', '+51 932 323 123', 'melissa@gmail.com');

-- CATEGORIA
INSERT INTO `categoria` (`id_categoria`, `nombre`, `descripcion`) VALUES
    (NULL, 'Platillo', 'Los platillos son las comidas tradicionales para la venta a nuestros clientes.'), 
    (NULL, 'Bebida', 'Las bebidas son los jugos hechos de fruta para refrescar a los clientes.'),
    (NULL, 'Cereal', 'Sin descripción.'),
    (NULL, 'Verdura', 'Sin descripción');

-- PRODUCTOS
INSERT INTO `producto` (`id_producto`, `nom_producto`, `precio`, `id_categoria`, `descripcion`) VALUES 
	(NULL, 'Arroz', '4', '3', 'Sin descripción.'), 
    (NULL, 'Lechuga', '5.10', '4', 'Sin descripción.');


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

INSERT INTO balance_ventas (monto_ventas, ingreso, igv_ingreso) VALUES(0, 0, 0);
INSERT INTO balance_compras (monto_compras, gasto, igv_gasto) VALUES(0, 0, 0);


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
FROM comprobanteDeVenta cdv, pedido p, detalle_pedido dp, consumible c, categoria cate
WHERE cdv.id_pedido = p.id_pedido   
AND p.id_pedido = dp.id_pedido
AND dp.id_consumible = c.id_consumible 
AND c.id_categoria = cate.id_categoria;

CREATE VIEW VER_REQUERIMIENTO AS
SELECT r.*, dr.id_producto, dr.cantidad, p.nom_producto, p.descripcion, p.precio, cate.nombre as nom_categoria, u.nombre_usuario
FROM requerimiento r, detalle_requerimiento dr, producto p, categoria cate, usuario u
WHERE r.id_req = dr.id_req
AND dr.id_producto = p.id_producto
AND p.id_categoria = cate.id_categoria
AND r.id_usuario = u.id_usuario;

CREATE OR REPLACE VIEW VER_ORDEN AS
SELECT odc.id_ordenDeCompra as id_odc, odc.fecha_hora as fecha_hora_odc, odc.estado as estado_odc, 
odc.total, odc.igv, odc.fecha_hora_entrega, 
r.*, 
dr.id_producto, dr.cantidad, 
p.nom_producto, p.descripcion, p.precio, 
cate.nombre as nom_categoria, em.*,
prov.id_proveedor, prov.razon_social as razon_social_prov, prov.direccion as direccion_prov, prov.ruc as ruc_prov, prov.numero as numero_prov, prov.correo as correo_prov,
u.nombre_usuario
FROM ordenDeCompra odc,  requerimiento r, detalle_requerimiento dr, producto p, categoria cate, Empresa em, proveedor prov, usuario u
WHERE odc.id_req = r.id_req
AND r.id_req = dr.id_req
AND dr.id_producto = p.id_producto
AND p.id_categoria = cate.id_categoria
AND odc.id_empresa = em.id_empresa
AND odc.id_proveedor = prov.id_proveedor
AND r.id_usuario = u.id_usuario;


--  Trigger para actualizar el balance de ventas

CREATE TRIGGER update_balance_ventas
AFTER INSERT ON comprobanteDeVenta
FOR EACH ROW
BEGIN

    DECLARE monto_ventasLast FLOAT;
    DECLARE monto_ventasNew FLOAT;
    DECLARE ingresoNew FLOAT;
    DECLARE igvNew FLOAT;

    SELECT monto_ventas INTO monto_ventasLast FROM balance_ventas ORDER BY id DESC LIMIT 1; 

    SET monto_ventasNew = monto_ventasLast + NEW.total;
    SET ingresoNew = NEW.total;
    SET igvNew = NEW.igv;

    INSERT INTO balance_ventas (monto_ventas, ingreso, igv_ingreso) VALUES (monto_ventasNew, ingresoNew, igvNew);
END;

--  Trigger para actualizar el balance de compras

CREATE TRIGGER update_balance_compras
AFTER INSERT ON ordenDeCompra
FOR EACH ROW
BEGIN

    DECLARE monto_comprasLast FLOAT;
    DECLARE monto_comprasNew FLOAT;
    DECLARE gastoNew FLOAT;
    DECLARE igvNew FLOAT;

    SELECT monto_compras INTO monto_comprasLast FROM balance_compras ORDER BY id DESC LIMIT 1; 

    SET monto_comprasNew = monto_comprasLast + NEW.total;
    SET gastoNew = NEW.total;
    SET igvNew = NEW.igv;

    INSERT INTO balance_compras (monto_compras, gasto, igv_gasto) VALUES (monto_comprasNew, gastoNew, igvNew);
END;




-- * Actualizar, eliminar y añadir productos


