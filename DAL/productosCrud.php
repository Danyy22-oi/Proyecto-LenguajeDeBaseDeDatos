<?php
function conectarDb() {
    $usuario = 'hr';
    $contraseña = '123';
    $host = 'localhost/orcl24'; // O la dirección de tu servidor Oracle

    try {
        $conexion = new PDO("oci:dbname=$host", $usuario, $contraseña);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexion;
    } catch (PDOException $e) {
        echo "Error de conexión: " . $e->getMessage();
        return null;
    }
}

function desconectar($conexion) {
    $conexion = null;
}

// El resto de tu código CRUD aquí, utilizando PDO en lugar de mysqli
function listarProductos() {
    $productos = array();
    try {
        $conn = conectarDb();
        $sql = "SELECT * FROM productos";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $productos[] = $row;
        }
        $conn = null; // Cerrar la conexión
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    return $productos;
}
// Función para actualizar un producto
function actualizarProducto($id, $nombre, $descripcion, $precio, $imagen, $categoria, $subcategoria, $proveedor) {
    try {
        $conn = conectarDb();
        $sql = "UPDATE productos SET Nombre = :nombre, Descripcion = :descripcion, Precio = :precio, Imagen = :imagen, Id_Categoria = :categoria, Id_Subcategoria = :subcategoria, Id_Proveedor = :proveedor WHERE Id_Producto = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':precio', $precio);
        $stmt->bindParam(':imagen', $imagen);
        $stmt->bindParam(':categoria', $categoria);
        $stmt->bindParam(':subcategoria', $subcategoria);
        $stmt->bindParam(':proveedor', $proveedor);
        $stmt->execute();
        $conn = null; // Cerrar la conexión
        return true;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}
<?php
// Función para insertar un nuevo producto
function insertarProducto($nombre, $descripcion, $precio, $imagen, $categoria, $subcategoria, $proveedor) {
    try {
        $conn = conectarDb();
        $sql = "INSERT INTO productos (Nombre, Descripcion, Precio, Imagen, Id_Categoria, Id_Subcategoria, Id_Proveedor) VALUES (:nombre, :descripcion, :precio, :imagen, :categoria, :subcategoria, :proveedor)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':precio', $precio);
        $stmt->bindParam(':imagen', $imagen);
        $stmt->bindParam(':categoria', $categoria);
        $stmt->bindParam(':subcategoria', $subcategoria);
        $stmt->bindParam(':proveedor', $proveedor);
        $stmt->execute();
        $conn = null; // Cerrar la conexión
        return true;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}
?>


?>
