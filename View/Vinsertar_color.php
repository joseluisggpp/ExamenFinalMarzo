<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Vista por crear</title>
</head>

<body>
    <h1>Formulario de Producto</h1>
    <form action="../controller/Cinsertar_producto.php" method="post">
        <!-- Campos del formulario con valores predeterminados si están definidos en POST -->

        <div class="form-floating mb-3">
            <input type="text" class="form-control" placeholder="" name="nombreProducto" required>
            <label class="form-floating-text" id="basic-addon1">Nombre</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" name="descripcionProducto" class="form-control" placeholder="Descripcion" required>
            <label class="form-floating-text" id="basic-addon1">Descripción</label>
        </div>

        <div class="form-floating mb-3">
            <input type="number" step="0.01" name="pesoProducto" class="form-control" placeholder="Peso" required>
            <label class="form-floating-text" id="basic-addon1">Peso</label>
        </div>
        <div class="form-floating mb-3">
            <input type="number" step="0.01" name="tamanoProducto" class="form-control" placeholder="tamaño" required>
            <label class="form-floating-text" id="basic-addon1">Tamaño</label>
        </div>
        <div class="form-floating mb-3">
            <input type="number" name="cantidadProducto" class="form-control" placeholder="Cantidad" required>
            <label class="form-floating-text" id="basic-addon1">Cantidad</label>
        </div>

        <div class="form-floating mb-3">
            <input type="number" step="0.01" name="precioProducto" class="form-control" placeholder="Precio" required>
            <label class="form-floating-text" id="basic-addon1">Precio</label>
        </div>
        <div>

        </div>
        <h5>Categoría:</h5>

        <select name='categoria'>
            <?php

            foreach ($categorias as $categoria) {
                echo "<option value='" . $categoria['id'] . "'>" . $categoria['nombre'] . "</option>";
            };
            ?>
        </select>
        <h5>Color:</h5>

        <select name='color'>
            <?php

            foreach ($colores as $color) {
                echo "<option value='" . $color['id'] . "'>" . $color['nombre'] . "</option>";
            };
            ?>
        </select>

        <button type="submit">Enviar</button>

    </form>

    <form action=../Controller/Celiminar_producto.php method=POST>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">idProducto</th>
                    <th scope="col">name</th>
                    <th scope="col">descripcion</th>
                    <th scope="col">peso</th>
                    <th scope="col">tamaño</th>
                    <th scope="col">cantidad</th>
                    <th scope="col">precio</th>
                </tr>
            </thead>
            <tbody>
                <?php


                for ($i = 0; $i < count($productos); $i++) {
                    //Para cada registro de BD hay que crear una fila de la tabla
                    print("<tr>\n");
                    //Recorremos todos los datos de este registro
                    for ($j = 0; $j < count($productos[$i]) / 2; $j++) {
                        //Para cada dato del registro creamos una celda
                        print("<td>" . $productos[$i][$j] . "</td>\n");
                    }
                    //Boton para Eliminar el producto
                    print("<td><input type='checkbox' name='idProducto[]' value='" . $productos[$i]['idProducto'] . "'></td>");
                    print("</tr>\n");
                }
                ?>
            </tbody>
        </table>
        <button class='btn btn-danger' type=submit>Eliminar</button>
    </form>
</body>

</html>