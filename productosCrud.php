<?php

require_once "BD/connection.php";

// Función para obtener los productos desde la base de datos
function obtenerProductos() {
    try {
        $usuario = 'hr';
        $contraseña = '123';
        $host = 'localhost/orcl24'; // Nombre del host / SID de la base de datos Oracle

        // Intentar establecer la conexión
        $conn = oci_connect($usuario, $contraseña, $host);
        if (!$conn) {
            $error = oci_error();
            echo "Error de conexión: " . $error['message'];
        } else {
            // Conexión exitosa, continuar con la consulta
            $sql = "SELECT * FROM PRODUCTOSSYC"; // Modifica esta consulta según tu estructura de base de datos

            // Ejecutar la consulta
            $stmt = oci_parse($conn, $sql);
            oci_execute($stmt);

            $productos = array();
            while ($row = oci_fetch_assoc($stmt)) {
                $productos[] = $row;
            }

            oci_close($conn); // Cerrar la conexión

            return $productos;
        }
    } catch (\Throwable $th) {
        echo $th;
        return array();
    }
}

// Función para agregar un producto a la base de datos
function agregarProducto($idProveedor, $nombre, $codigo) {
    try {
        // Establecer la conexión con Oracle
        $usuario = 'hr';
        $contraseña = '123';
        $host = 'localhost/orcl24'; // Nombre del host / SID de la base de datos Oracle
        $conn = oci_connect($usuario, $contraseña, $host);

        if (!$conn) {
            $error = oci_error();
            echo "Error de conexión: " . $error['message'];
            return false;
        } else {
            // Insertar el nuevo producto
            $sql = "INSERT INTO PRODUCTOSSYC (ID_PROVEEDOR, NOMBRE, CODIGO) VALUES (:idProveedor, :nombre, :codigo)";
            $stmt = oci_parse($conn, $sql);
            oci_bind_by_name($stmt, ":idProveedor", $idProveedor);
            oci_bind_by_name($stmt, ":nombre", $nombre);
            oci_bind_by_name($stmt, ":codigo", $codigo);

            $result = oci_execute($stmt);
            oci_close($conn); // Cerrar la conexión

            return $result;
        }
    } catch (\Throwable $th) {
        echo $th;
        return false;
    }
}

// Función para eliminar un producto de la base de datos
function eliminarProducto($idProducto) {
    try {
        // Establecer la conexión con Oracle
        $usuario = 'hr';
        $contraseña = '123';
        $host = 'localhost/orcl24'; // Nombre del host / SID de la base de datos Oracle
        $conn = oci_connect($usuario, $contraseña, $host);

        if (!$conn) {
            $error = oci_error();
            echo "Error de conexión: " . $error['message'];
            return false;
        } else {
            // Eliminar el producto
            $sql = "DELETE FROM PRODUCTOSSYC WHERE ID_PRODUCTO = :idProducto";
            $stmt = oci_parse($conn, $sql);
            oci_bind_by_name($stmt, ":idProducto", $idProducto);

            $result = oci_execute($stmt);
            oci_close($conn); // Cerrar la conexión

            return $result;
        }
    } catch (\Throwable $th) {
        echo $th;
        return false;
    }
}

// Función para editar un producto en la base de datos
function editarProducto($idProducto, $idProveedor, $nombre, $codigo) {
    try {
        // Establecer la conexión con Oracle
        $usuario = 'hr';
        $contraseña = '123';
        $host = 'localhost/orcl24'; // Nombre del host / SID de la base de datos Oracle
        $conn = oci_connect($usuario, $contraseña, $host);

        if (!$conn) {
            $error = oci_error();
            echo "Error de conexión: " . $error['message'];
            return false;
        } else {
            // Editar el producto
            $sql = "UPDATE PRODUCTOSSYC SET ID_PROVEEDOR = :idProveedor, NOMBRE = :nombre, CODIGO = :codigo WHERE ID_PRODUCTO = :idProducto";
            $stmt = oci_parse($conn, $sql);
            oci_bind_by_name($stmt, ":idProducto", $idProducto);
            oci_bind_by_name($stmt, ":idProveedor", $idProveedor);
            oci_bind_by_name($stmt, ":nombre", $nombre);
            oci_bind_by_name($stmt, ":codigo", $codigo);

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




?>