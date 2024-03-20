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

    // Consulta de prueba
    $sql = "SELECT * FROM EMPLOYEES WHERE ROWNUM <= 10"; // Cambia 'tu_tabla' por el nombre de tu tabla

    // Ejecutar la consulta
    $stmt = oci_parse($conn, $sql);
    oci_execute($stmt);

    // Mostrar los resultados
    echo "Resultados de la consulta: <br>";
    while ($row = oci_fetch_assoc($stmt)) {
        echo "Columna1: " . $row['EMPLOYEE_ID'] . ", Nombre: " . $row['FIRST_NAME'] . "<br>"; // Corregido 'FIRTS_NAME' a 'FIRST_NAME'
    }
}

// Cerrar la conexión
oci_close($conn);
?>
