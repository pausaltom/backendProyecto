<?php

    //$mysqli = new mysqli("localhost", "Cliente", "1234", "icl");
    $server="localhost";
    $user="root";
    $password="";
    $name="icl";
    $mysqli = new mysqli("", "$user", "$password", "$name");
    if ($mysqli->connect_errno) {
        echo ("Connect failed: " . $mysqli->connect_error);
        exit();
    }
?>