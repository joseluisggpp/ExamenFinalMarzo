<?php

namespace ExamenFinalMarzo\Model;

use PDO;
use PDOException;

class Color
{

    static function getColores($conexion) // Devuelve un array con todos los datos de los colores.
    {
        //Hacemos un try-catch para manejar posibles fallos
        try {
            //Realizamos una quiery de todos los datos de la tabla color
            $query = "SELECT * FROM color";

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
    static function delColor($id_color, $conexion) // Borra el color cuyo id sea $id de la tabla color
    {
        try {

            // Borramos un color según su ID

            $query = "DELETE FROM color WHERE id=:id";

            // Preparamos la ejecución de la sentencia (statement stmt)

            $stmt = $conexion->prepare($query);

            // Asociamos el valor del parámetro idproducto a la posición de :id

            $stmt->bindValue(':id', $id_color);

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
