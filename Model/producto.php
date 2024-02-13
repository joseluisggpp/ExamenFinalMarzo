<?php

namespace ExamenFinalMarzo\Model;

use PDO;
use PDOException;

class Producto
{
    static function getProductos($conexion)
    {
        try {
            //Realizamos una quiery de todos los datos de la tabla color
            $query = "SELECT * FROM producto";

            //Ejecutamos la query y guardamos el puntero en $resultado
            //query ejecuta antes de la variable
            $resultado = $conexion->query($query);

            //Guardamos los datos de todos los punteros
            $resultado = $resultado->fetchAll();
        } catch (PDOException $e) {
            //Si da un error, mostrara el error
            print '¡Error!: ' . $e->getMessage() . '<br/>';

            //Terminamos el script
            die();
        }
        //Devolvemos los datos
        return $resultado;
    }
    static function getProductosColor($conexion, $idColor) //recibe un id de un color y devuelve un array con todos los productos que sean de dicho color, mostrará los nombres de los colores, no los id(cruzar tablas o crear function getColor en color.php). 
    {
        //Hacemos un try-catch para manejar posibles fallos
        try {

            $query = "SELECT producto.* , color.nombre as nombreColor FROM producto inner join producto_has_color on producto.idProducto = producto_has_color.idProducto inner join color ON producto_has_color.idColor = color.id WHERE idColor=:idColor;";

            //Ejecutamos la query y guardamos el puntero en $resultado
            //query ejecuta antes de la variable
            $resultado = $conexion->prepare($query);
            $resultado->bindValue(":idColor", $idColor);
            $resultado->execute();
            //Guardamos los datos de todos los punteros
            $resultado = $resultado->fetchAll();
        } catch (PDOException $e) {
            //Si da un error, mostrara el error
            print '¡Error!: ' . $e->getMessage() . '<br/>';
            //Terminamos el script
            die();
        }
        //Devolvemos los datos
        return $resultado;
    }
    static function addProducto($conexion, $datos_producto) //recibe todos los datos del producto e inserta el registro en base de datos. Devuelve 1 si se inserto correctamente en BD y -1 en caso de error. 
    {
        try {
            $query = "INSERT INTO producto (name, descripcion, peso, tamano, cantidad, precio) VALUES (:name,:descripcion,:peso,:tamano,:cantidad,:precio)";
            $stmt = $conexion->prepare($query);

            $stmt->bindValue(':name', $datos_producto['name']);
            $stmt->bindValue(':descripcion', $datos_producto['descripcion']);
            $stmt->bindValue(':peso', $datos_producto['peso']);
            $stmt->bindValue(':tamano', $datos_producto['tamano']);
            $stmt->bindValue(':cantidad', $datos_producto['cantidad']);
            $stmt->bindValue(':precio', $datos_producto['precio']);
            // Ejecutamos la sentencia SQL con los valores del usuario proporcionados

            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    static function delProducto($conexion, $idProducto)
    {
        try {

            // Borramos un color según su ID

            $query = "DELETE FROM producto WHERE idProducto=:id";

            // Preparamos la ejecución de la sentencia (statement stmt)

            $stmt = $conexion->prepare($query);

            // Asociamos el valor del parámetro idproducto a la posición de :id

            $stmt->bindValue(':id', $idProducto);

            $stmt->execute();

            // Obtenemos el número de filas afectadas por la eliminación

            $filas_afectadas = $stmt->rowCount();

            return $filas_afectadas;
        } catch (PDOException $e) {

            // Manejo de errores en caso de excepción PDO

            print "¡Error!: " . $e->getMessage() . "<br/>";
            die();
        } finally {

            // Cerramos la conexión PDO en el bloque finally

            $pdo = null;
        }
    }
    static function delProductoColor($conexion, $idProducto)
    {
        try {

            // Borramos un color según su ID

            $query = "DELETE FROM producto_has_color WHERE idProducto=:id";

            // Preparamos la ejecución de la sentencia (statement stmt)

            $stmt = $conexion->prepare($query);

            // Asociamos el valor del parámetro idproducto a la posición de :id

            $stmt->bindValue(':id', $idProducto);

            $stmt->execute();

            // Obtenemos el número de filas afectadas por la eliminación

            $filas_afectadas = $stmt->rowCount();

            return $filas_afectadas;
        } catch (PDOException $e) {

            // Manejo de errores en caso de excepción PDO

            print "¡Error!: " . $e->getMessage() . "<br/>";
            die();
        } finally {

            // Cerramos la conexión PDO en el bloque finally

            $pdo = null;
        }
    }
}
