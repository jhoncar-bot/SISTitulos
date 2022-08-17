<?php  

    
    $servername = "localhost";   #Localhost o IP
    $username = "root";          #Usuario de la dB
    $password = "";   #Contraseña de la dB
    $database = "titulov4.1";       #Nombre de la db              #puerto por el que se conecta la dB
    $conn = mysqli_connect($servername, $username, $password, $database);

    //mysql_set_charset('utf8', $conn);
        if (!$conn) {
        die("Conexion no establecida: " . mysqli_connect_error());
        }
        #mysqli_connect_error()
        #devuelve una cadena con la descripcion del ultimo error de conexión
        
?>
