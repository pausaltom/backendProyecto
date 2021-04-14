<?php

require_once("modelo/productos_modelo.php");

$producto= new Productos_modelo();

$matrizProductos=$producto->get_Productos();

session_start();
    if (isset($_SESSION["usuario"]) && (($_SESSION['usuario']['ID_Role'] == '1') || ($_SESSION['usuario']['ID_Role'] == '3'))) {
        require_once("vista/productos_Adminview.php");
    }else{
        require_once("vista/productos_view.php");
    }








?>