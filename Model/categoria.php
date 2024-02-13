<?php

namespace ExamenFinalMarzo\Model;

use PDO;
use PDOException;

class Categoria
{

    static function getCategorias($conexion) // Devuelve un array con todos los registros de la tabla categoría.
    {
        //Hacemos un try-catch para manejar posibles fallos
        try {
            //Realizamos una quiery de todos los datos de la tabla color
            $query = "SELECT * FROM categoria";

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
}
