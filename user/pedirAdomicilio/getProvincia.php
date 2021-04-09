


<?php

        $mysqli= new mysqli("localhost", "root", "", "icl");

        if($mysqli->connect_errno){
            echo("Connect failed: ".$mysqli->connect_error);
            exit();
        }
        
        $result=$mysqli->query("SELECT * from provincia");
      

        while($row = $result->fetch_object())
        {
            echo($row->ID_Provincia." / ".$row->Provincia."//");
            
        }
        
        $result->free();
        $mysqli->close();
    ?>