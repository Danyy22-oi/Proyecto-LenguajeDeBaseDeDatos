<?php
// Incluir el encabezado y las funciones necesarias

require_once "productosCrud.php";

// Verificar si se recibió un ID de producto válido por GET
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $producto_id = $_GET['id'];

    // Obtener la información del producto por su ID
    $producto = obtenerIdProducto($producto_id);

    if ($producto) {
        // Obtener los datos del producto
        $nombre = $producto['Nombre'];
        $descripcion = $producto['Descripcion'];
        $precio = $producto['Precio'];
        



        
?>
<main>
    <div class="container">
        <h2>Editar Producto</h2>
        <form method="post" action="actualizarProducto.php">
            <input type="hidden" name="producto_id" value="<?php echo $producto_id; ?>">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre; ?>">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea class="form-control" id="descripcion" name="descripcion"><?php echo $descripcion; ?></textarea>
            </div>
            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="number" class="form-control" id="precio" name="precio" value="<?php echo $precio; ?>">
            </div>
            <!-- Agregar más campos de formulario según sea necesario -->

            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
</main>
<?php
    } else {
        // Mostrar un mensaje de error si no se encontró el producto
        echo "<p>Producto no encontrado.</p>";
    }
} else {
    // Mostrar un mensaje de error si no se proporcionó un ID de producto válido
    echo "<p>ID de producto no válido.</p>";
}

// Incluir el pie de página
require_once "include/templates/footer.php";
?>
