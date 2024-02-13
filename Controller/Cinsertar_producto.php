<?php

namespace Controller;

use PDO;
use PDOException;

use model\Utils as Utils;
use ExamenFinalMarzo\Model\Categoria as Categoria;
use ExamenFinalMarzo\Model\Color as Color;
use ExamenFinalMarzo\Model\Producto as Producto;


include(__DIR__ . "/../Model/Utils.php");
include(__DIR__ . "/../Model/categoria.php");
include(__DIR__ . "/../Model/color.php");
include(__DIR__ . "/../Model/producto.php");

if (!isset($conexion))
    $conexion = Utils::conectar();

$categorias = Categoria::getCategorias($conexion);
$colores = Color::getColores($conexion);
$productos = Producto::getProductos($conexion);

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $nombre = Utils::validarDatos($_POST["nombreProducto"]);
    $descripcion = Utils::validarDatos($_POST["descripcionProducto"]);
    $peso = Utils::validarDatos($_POST["pesoProducto"]);
    $tamano = Utils::validarDatos($_POST["tamanoProducto"]);
    $cantidad = Utils::validarDatos($_POST["cantidadProducto"]);
    $precio = Utils::validarDatos($_POST["precioProducto"]);

    $producto = [
        'name' => $nombre,
        'descripcion' => $descripcion,
        'peso' => $peso,
        'tamano' => $tamano,
        'cantidad' => $cantidad,
        'precio' => $precio
    ];
    if (Utils::validarProducto($producto)) {
        Producto::addProducto($conexion, $producto);
    } else {
        echo "No se ha realizado la validación del producto. No se ha insertado el producto.";
    }
}
include("../View/Vinsertar_color.php");
