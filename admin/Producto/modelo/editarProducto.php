<?php
        session_start();
        if(!isset($_SESSION["usuario"])||($_SESSION['usuario']['ID_Role'] =='2')){
             header("location: http://localhost/php/comun/logout.php");
        }
        include("../../conexionBD.php");

        $userDireccion=$_GET['userDireccion'];

        

        $userEmail=$_SESSION['usuario'];
        $usuarioUpdated=$mysqli->query("UPDATE usuario SET Direccion='$userDireccion' WHERE usuario.Email='$userEmail'");    
        echo ($mysqli->error);
        if(!$mysqli->error){
            header("location: ../../paginaHome.php");
        }
        
        
        
        $mysqli->close();
    ?>