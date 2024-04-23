<?php
require_once "productosCrud.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    require_once "include/functions/recoge.php";
    $id = recogeGet("id");

    // Obtener los detalles del producto a editar
    $producto = obtenerClientePorId($id);

    if ($producto != null) {
        $id = $producto['Id_Producto'];
        $nombre = $producto['Nombre'];
        $descripcion = $producto['Descripcion'];
        $precio = $producto['Precio'];
        $cantidad = $producto['Cantidades'];
        $talla = $producto['Tallas'];
        $cantidadArray = explode(',', $cantidad);
        $tallaArray = explode(',', $talla);
        $imagen = $producto['Imagen'];
        $Id_Categoria = $producto['Id_Categoria'];
        $Id_Subcategoria = $producto['Id_Subcategoria'];
        $Id_Proveedor = $producto['Id_Proveedor'];
    } else {
        // Manejar el caso en que no se encuentre el producto
        // Por ejemplo, redirigir a una página de error o mostrar un mensaje al usuario
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "include/functions/recoge.php";
    // Obtener los datos del formulario
    $id = recogePost("Id_Producto");
    $nombre = recogePost("nombre");
    $descripcion = recogePost("descripcion");
    $precio = recogePost("precio");
    $cantidad = isset($_POST['cantidad']) ? array_filter($_POST['cantidad'], 'is_numeric') : array();
    $talla = isset($_POST['talla']) ? $_POST['talla'] : '';
    $imagen = recogePost("imagen");
    $categoria = recogePost("categoria");
    $subcategoria = recogePost("subcategoria");
    $proveedor = recogePost("proveedor");

    // Validación de datos, manejo de errores, etc.

    // Luego, realizar la edición del producto llamando a la función editarProducto()

    // Redirigir o mostrar un mensaje al usuario según el resultado de la operación
}

// Aquí empieza la estructura HTML para mostrar el formulario de edición
include_once 'include/templates/header.php';
?>

<main>
    <div class="container">
        <h2>Editar Producto</h2>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <!-- Aquí irían los campos del formulario con los valores predefinidos -->
            <!-- Se deben agregar los campos necesarios con los valores del producto a editar -->
        </form>
    </div>
</main>

<?php
include_once 'include/templates/footer.php';
?>