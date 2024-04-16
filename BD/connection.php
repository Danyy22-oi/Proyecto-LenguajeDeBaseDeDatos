<?php
// Detalles de conexión
$usuario = 'hr';
$contraseña = '123';
$host = 'localhost/orcl24'; // Nombre del host / SID de la base de datos Oracle

// Intentar establecer la conexión
$conn = oci_connect($usuario, $contraseña, $host);
if (!$conn) {
    $error = oci_error();
    echo "Error de conexión: " . $error['message'];
} else {
    echo "Conexión exitosa a la base de datos Oracle <br>";
}

// Cerrar la conexión
oci_close($conn);
?>
