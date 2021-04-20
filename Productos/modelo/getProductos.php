<?php

    include("../../comun/conexionBD.php");


    $registrosPorPag=3;
    
    if ($_GET["pagina"]!=null) {
        if ($_GET["pagina"]==1) {
            header("Location: ../vista/listaProductos.html");
        }else{
            $pagina=$_GET["pagina"];
        }
    }else{
       $pagina=1; 
    }    

    $empezar_desde = ($pagina-1) * $registrosPorPag;
    
    $result = $mysqli->query("SELECT * from producto");
    echo ($mysqli->error);

    $numRegistros = mysqli_num_rows($result);

    $total_paginas=ceil($numRegistros/$registrosPorPag);

    $resultPagianado = $mysqli->query("SELECT * from producto LIMIT $empezar_desde,$registrosPorPag");
    while ($row = $resultPagianado->fetch_object()) {
        echo ($row->ID_Producto . " / " . $row->img ." / ".$row->Nombre . " / ".$row->Precio . "//");
    }


    //-------------------------------------------- Paginación --------------------------------------------
    echo("#");
    for ($i=1; $i < $total_paginas; $i++) { 
        echo "<a class='paginacion' href='?pagina=" . $i . "'>" . $i . "</a> ";
    }
    
    $result->free();
    $mysqli->close();
?>