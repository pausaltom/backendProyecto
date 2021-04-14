<?php

    //$mysqli = new mysqli("localhost", "Cliente", "1234", "icl");
    
    //Usuario superAdmin (no es recomendable usar el usuario root)
    // $server="localhost";
    // $user="superAdmin";
    // $password="hFe7anf1retwahAu";
    // $name="icl"; 
    class Conectar{


        public static function conexion(){
                $server="localhost";
                $user="root";
                $password="";
                $name="icl";
                $mysqli = new mysqli("$server", "$user", "$password", "$name");

                if ($mysqli->connect_errno) {
                    echo ("Connect failed: " . $mysqli->connect_error);
                    exit();
                }
                return $mysqli;
            
        }
    }
    
?>