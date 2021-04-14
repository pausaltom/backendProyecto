<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    table{
        
        margin-left: auto;
        margin-right: auto;
    }
    </style>
</head>

<body>
    
    <?php
        session_start();
        if (!isset($_SESSION["usuario"]) || ($_SESSION['usuario']['ID_Role']=='2')) {
            header("location: http://localhost/php/auth/login.html");
        }
    ?> 
    
    <form action="../modelo/datosImagen.php" method="POST" enctype="multipart/form-data">
        <table>
        <tr>
            <td><label for="imagen">Imagen:</label></td>
            <td><input type="file" name="imagen" size="20"></td>
        </tr>
        <tr>
            <td><input type="submit" value="Enviar Imagen"></td>
        </tr>
        </table>



    </form>



</body>

</html>