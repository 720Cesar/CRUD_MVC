<?php

    $server = "localhost";
    $user = "root";
    $password = "";
    $db = "prueba";

    // Función de conexión a la BD
    $connection = new mysqli($server, $user, $password, $db);

    // Se evalúa el resultado de la conexión a la BD
    if($connection -> connect_errno){
        die("Conexión fallida". $connection -> connect_errno);
    } 

    