<?php
// Conecction a la bd de syctecnologia
$usuario = 'GRUPO';
$contraseña = '123';
$host = 'localhost/orcl24'; // Nombre del host / SID de la base de datos Oracle

// Intentar establecer la conexión
$conn = oci_connect($usuario, $contraseña, $host);
if (!$conn) {
    $error = oci_error();
    echo "Error de conexión: " . $error['message'];
    //si se pudo acceder 
} else {
    echo "Conexión exitosa a la base de datos Oracle <br>";
}

?>