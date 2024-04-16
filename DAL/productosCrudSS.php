<?php
// Detalles de conexión a la base de datos Oracle
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

    // Consulta para seleccionar todos los productos
    $sql = "SELECT * FROM PRODUCTOSSYC";

    // Ejecutar la consulta
    $stmt = oci_parse($conn, $sql);
    oci_execute($stmt);

    // Mostrar los resultados en una tabla HTML
    echo "<table border='1'>
            <tr>
                <th>ID Producto</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
            </tr>";
    while ($row = oci_fetch_assoc($stmt)) {
        echo "<tr>
                <td>" . $row['ID_PRODUCTO'] . "</td>
                <td>" . $row['NOMBRE'] . "</td>
                <td>" . $row['DESCRIPCION'] . "</td>
                <td>" . $row['PRECIO'] . "</td>
            </tr>";
    }
    echo "</table>";

    // Cerrar la conexión
    oci_close($conn);
}
?>
