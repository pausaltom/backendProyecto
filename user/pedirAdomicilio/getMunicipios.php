


<?php
        include("../../conexionBD.php");
        $idProvincia=$_GET['idProvincia'];

        $result=$mysqli->query("SELECT * from municipio WHERE municipio.ID_Provincia=$idProvincia");
      

        while($row = $result->fetch_object())
        {
            echo($row->ID_Municipio." / ".$row->Municipio." / ".$row->ID_Provincia."//");
            
        }
        
        $result->free();
        $mysqli->close();
    ?>