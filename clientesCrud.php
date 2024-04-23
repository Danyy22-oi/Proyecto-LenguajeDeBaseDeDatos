<?php
require_once "BD/connection.php";

// Función para obtener los clientes desde la base de datos
function obtenerClientes()
{
    try {
        $usuario = 'GRUPO';
        $contraseña = '123';
        $host = 'localhost/orcl24'; // Nombre del host / SID de la base de datos Oracle

        // Intentar establecer la conexión
        $conn = oci_connect($usuario, $contraseña, $host);
        if (!$conn) {
            $error = oci_error();
            echo "Error de conexión: " . $error['message'];
        } else {
            // Conexión exitosa, continuar con la consulta
            $sql = "SELECT * FROM CLIENTE"; // Modifica esta consulta según tu estructura de base de datos

            // Ejecutar la consulta
            $stmt = oci_parse($conn, $sql);
            oci_execute($stmt);

            $cliente = array();
            while ($row = oci_fetch_assoc($stmt)) {
                $cliente[] = $row;
            }

            oci_close($conn); // Cerrar la conexión

            // Imprimir los resultados para depuración
            print_r($cliente);

            return $cliente;
        }
    } catch (\Throwable $th) {
        echo $th;
        return array();
    }
}

// Función para eliminar un cliente de la base de datos
function eliminarCliente($idCliente)
{
    try {
        // Establecer la conexión con Oracle
        $usuario = 'GRUPO';
        $contraseña = '123';
        $host = 'localhost/orcl24'; // Nombre del host / SID de la base de datos Oracle
        $conn = oci_connect($usuario, $contraseña, $host);

        if (!$conn) {
            $error = oci_error();
            echo "Error de conexión: " . $error['message'];
            return false;
        } else {
            // Eliminar el cliente
            $sql = "DELETE FROM CLIENTE WHERE ID_CLIENTE = :idCliente";
            $stmt = oci_parse($conn, $sql);
            oci_bind_by_name($stmt, ":idCliente", $idCliente);

            $result = oci_execute($stmt);
            oci_close($conn); // Cerrar la conexión

            return $result;
        }
    } catch (\Throwable $th) {
        echo $th;
        return false;
    }
}

// Función para obtener los detalles de un cliente por su ID
function obtenerIdCliente($id)
{
    $cliente = null;
    try {
        // Establecer la conexión con Oracle
        $usuario = 'GRUPO';
        $contraseña = '123';
        $host = 'localhost/orcl24'; // Nombre del host / SID de la base de datos Oracle
        $conn = oci_connect($usuario, $contraseña, $host);

        if (!$conn) {
            $error = oci_error();
            echo "Error de conexión: " . $error['message'];
        } else {
            // Consultar el cliente con el ID proporcionado
            $sql = "SELECT * FROM CLIENTE WHERE CLIENTE_ID = :id";
            $stmt = oci_parse($conn, $sql);
            oci_bind_by_name($stmt, ":id", $id);
            oci_execute($stmt);

            // Obtener el resultado como un array asociativo
            $cliente = oci_fetch_assoc($stmt);

            // Cerrar la conexión
            oci_close($conn);
        }
    } catch (\Throwable $th) {
        echo $th;
    }

    return $cliente;
}


// Función para editar un cliente en la base de datos
function editarCliente($idCliente, $nombre, $telefono, $correo, $direccion )
{
    try {
        // Establecer la conexión con Oracle
        $usuario = 'GRUPO';
        $contraseña = '123';
        $host = 'localhost/orcl24'; // Nombre del host / SID de la base de datos Oracle
        $conn = oci_connect($usuario, $contraseña, $host);

        if (!$conn) {
            $error = oci_error();
            echo "Error de conexión: " . $error['message'];
            return false;
        } else {
            // Editar el cliente
            $sql = "UPDATE CLIENTE SET ID_CLIENTE = :idCliente, NOMBRE = :nombre, CODIGO = :codigo WHERE ID_CLIENTE = :idCliente";
            $stmt = oci_parse($conn, $sql);
            oci_bind_by_name($stmt, ":idCliente", $idCliente);
            oci_bind_by_name($stmt, ":nombre", $nombre);
            oci_bind_by_name($stmt, ":telefono", $telefono);
            oci_bind_by_name($stmt, ":correo", $correo);
            oci_bind_by_name($stmt, ":direccion", $direccion);

            $result = oci_execute($stmt);
            oci_close($conn); // Cerrar la conexión

            return $result;
        }
    } catch (\Throwable $th) {
        echo $th;
        return false;
    }
}
    
?>