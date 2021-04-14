<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <script type="text/javascript" src="javascriptProduct.js"></script>
</head>

<body>
    <?php
    session_start();
    if (!isset($_SESSION["usuario"]) || ($_SESSION['usuario']['ID_Role'] == '2')) {
        header("location: http://localhost/php/auth/login.html");
    }
    ?>
    <script type="text/javascript">
        window.addEventListener("load", loadEvents);
    </script>


</body>

</html>