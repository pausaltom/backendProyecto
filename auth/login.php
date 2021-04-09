<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Login</title>
</head>

<body>
    <?php

    include("../conexionBD.php");

    

    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $passwordS = mysqli_real_escape_string($mysqli, $_POST['password']);
    $contador = 0;
    $password=  htmlspecialchars ( $passwordS , $flags = ENT_COMPAT | ENT_HTML401 , $encoding = ini_get("default_charset") , $double_encode = true );
    
    $comprobacion = $mysqli->query("SELECT * from usuario WHERE usuario.Email='$email'");
    if (mysqli_num_rows($comprobacion) <= 0) {
        echo ("Login no existe o Contraseña incorrecta");
        header("location:login.html");
    } else {
        $row = $comprobacion->fetch_object();

        if (password_verify($password, $row->Password)) {
            $contador++;
        }


        if ($contador > 0) {
            echo ("Usuario: " . $row->Nombre . " conectado");
            session_start();
            $_SESSION["usuario"] = $_POST["email"];
            $mysqli->query("UPDATE usuario SET Validado=1 WHERE usuario.Email ='$email'");
            header("location:../paginaHome.php");
        } else {
    ?>
            <script type="text/javascript">
                alert("Contraseña incorrecta");
            </script>


    <?php
            header("location:login.html");
        }
    }



    echo ($mysqli->error);
    $mysqli->close();
    ?>

</body>

</html>