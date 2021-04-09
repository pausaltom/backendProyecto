


<?php
        include("../../conexionBD.php");
        $idMunicipio=$_GET['Municipio'];

        $result=$mysqli->query("SELECT * FROM cp WHERE cp.ID_Municipio = '$idMunicipio'");
        
      

        while($row = $result->fetch_object())
        {
            echo($row->CP." / ".$row->ID_Municipio."//");
            
        }
        
        $result->free();
        $mysqli->close();
    ?>