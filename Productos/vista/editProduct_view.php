<?php

session_start();
if (!isset($_SESSION["usuario"]) && (($_SESSION['usuario']['ID_Role'] == '1') || ($_SESSION['usuario']['ID_Role'] == '3'))) {
    header("location: http://localhost/php/auth/login.html");
}

$ID_Producto = $_GET['id'];



    echo $ID_Producto;
    


?>