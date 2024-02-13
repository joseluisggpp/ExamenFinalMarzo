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

var_dump($productos);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productosABorrar = $_POST["idProducto"];
    foreach ($productosABorrar as $idProducto) {
        Producto::delProductoColor($conexion, $idProducto);
        Producto::delProducto($conexion, $idProducto);
    }
}
$productos = Producto::getProductos($conexion);
include("../View/Vinsertar_color.php");
