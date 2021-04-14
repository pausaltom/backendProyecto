<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            text-align: center;
        }

        table,
        td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <td>Imagen:</td>
            <td>Nombre Producto:</td>
            <td>Precio:</td>
            <td>Acciones:</td>
        </tr>
        <?php
        foreach ($matrizProductos as $registro) {



            echo "<tr>"  ?><td><img src="/php/uploads/<?php echo $registro["img"];?>" width="25%" alt="Imagen Producto"></td><?php echo "<td>" .
                $registro["Nombre"] . "</td><td>" . $registro["Precio"] . " €</td>" .

                '<td><input type="button" value="Añadir"></td>';
        }

        ?>
        </tr>



    </table>
        
    <p><a href="http://localhost/php/auth/logout.php">Cerrar Sessión</a></p>
</body>

</html>