<?php

    $servername = "localhost";   #Localhost o IP
    $username = "root";          #Usuario de la dB
    $password = "";   #Contraseña de la dB
    $database = "titulov4";       #Nombre de la db
    $conn = mysqli_connect($servername, $username, $password, $database);
    if (!$conn) {
        die("Conexion no establecida: " . mysqli_connect_error());
    }

?>
