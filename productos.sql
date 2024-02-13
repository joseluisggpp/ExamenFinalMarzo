DROP DATABASE IF EXISTS productosbd;

CREATE DATABASE IF NOT EXISTS productosbd;

USE productosbd;

DROP TABLE IF EXISTS `producto`;
CREATE TABLE `producto` (
  `idProducto` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `peso` int(11) NOT NULL,
  `tamano` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` float NOT NULL,
  PRIMARY KEY (`idProducto`)
);

DROP TABLE IF EXISTS `color`;
CREATE TABLE `color` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codhex` varchar(100) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
);
DROP TABLE IF EXISTS `producto_has_color`;
CREATE TABLE producto_has_color (
  `idProducto` INT,
  `idColor` INT,
  PRIMARY KEY (`idProducto`, `idColor`),
  FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`),
  FOREIGN KEY (`idColor`) REFERENCES `color` (`id`)
);
DROP TABLE IF EXISTS `categoria`;
CREATE TABLE categoria (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `nombre` VARCHAR(50) NOT NULL,
  `descripcion` TEXT NOT NULL,
  `idCatPadre` INT NULL,
  FOREIGN KEY (`idCatPadre`) REFERENCES `categoria` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
);
INSERT INTO producto (name, descripcion, peso, tamano, cantidad, precio) VALUES
('Smartphone X12', 'Último modelo con cámara de alta resolución.', 150, 8, 10, 799.99),
('Laptop Pro 15', 'Laptop de alto rendimiento para profesionales.', 1200, 15, 5, 1200.00),
('Auriculares Bluetooth', 'Auriculares inalámbricos con cancelación de ruido.', 200, 5, 15, 150.00),
('Consola de videojuegos', 'Consola de última generación para toda la familia.', 3500, 30, 8, 499.99),
('Smartwatch Fitness', 'Reloj inteligente con seguimiento de actividad física.', 75, 10, 20, 199.99),
('Cámara DSLR', 'Cámara profesional para fotografía con lentes intercambiables.', 950, 12, 4, 899.99),
('Tableta gráfica', 'Tableta para diseño gráfico con lápiz sensible a la presión.', 500, 14, 7, 299.99),
('Robot de cocina', 'Robot de cocina multifuncional con conexión WiFi.', 4000, 22, 6, 649.99),
('Altavoz inteligente', 'Altavoz con asistente de voz integrado y control del hogar inteligente.', 300, 6, 12, 129.99),
('E-reader', 'Lector de libros electrónicos con pantalla de tinta electrónica.', 150, 8, 9, 99.99);

INSERT INTO color (codhex, nombre, descripcion, imagen) VALUES
('#FF5733', 'Rojo', 'Vibrante y lleno de energía.', '/img/rojo.jpg'),
('#3498DB', 'Azul', 'Tranquilidad y serenidad.', '/img/azul.jpg'),
('#2ECC71', 'Verde', 'Natural y fresco.', '/img/verde.jpg'),
('#F1C40F', 'Amarillo', 'Luminoso y alegre.', '/img/amarillo.jpg'),
('#E74C3C', 'Naranja', 'Divertido y enérgico.', '/img/naranja.jpg');
INSERT INTO categoria (nombre, descripcion, idCatPadre) VALUES
('Electrónica', 'Dispositivos y gadgets.', NULL),
('Moda', 'Ropa y accesorios.', NULL),
('Hogar', 'Decoración y muebles.', NULL),
('Librería', 'Libros y material de lectura.', NULL),
('Jardinería', 'Herramientas y plantas.', NULL);

INSERT INTO producto_has_color (idProducto, idColor) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 1),
(7, 2),
(8, 3),
(9, 4),
(10, 5);

