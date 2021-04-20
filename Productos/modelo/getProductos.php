<?php

    include("../../comun/conexionBD.php");

<<<<<<< HEAD

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
=======
    
    $registrosPorPag=3;
    
    
    $pagina=$_GET["pagina"];
        
    
>>>>>>> 9fab12aa38c884b94414d62463eac31e5b0d4f8d

    $empezar_desde = ($pagina-1) * $registrosPorPag;
    
    $result = $mysqli->query("SELECT * from producto");
    echo ($mysqli->error);

    $numRegistros = mysqli_num_rows($result);

    $total_paginas=ceil($numRegistros/$registrosPorPag);

    $resultPagianado = $mysqli->query("SELECT * from producto LIMIT $empezar_desde,$registrosPorPag");
    while ($row = $resultPagianado->fetch_object()) {
        echo ($row->ID_Producto . " / " . $row->img ." / ".$row->Nombre . " / ".$row->Precio . "//");
    }
<<<<<<< HEAD


    //-------------------------------------------- Paginación --------------------------------------------
    echo("#");
    for ($i=1; $i < $total_paginas; $i++) { 
        echo "<a class='paginacion' href='?pagina=" . $i . "'>" . $i . "</a> ";
    }
=======
    echo("#");
    echo($total_paginas);

   
>>>>>>> 9fab12aa38c884b94414d62463eac31e5b0d4f8d
    
    $result->free();
    $mysqli->close();
?>