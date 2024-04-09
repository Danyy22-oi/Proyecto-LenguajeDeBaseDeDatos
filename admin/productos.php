<?php
// Requiere el archivo de conexión a la base de datos
require_once "../DAL/productosCrud.php";

// Preparar la consulta SQL para obtener los productos
$elSQL = "SELECT p.*, prov.Nombre AS Proveedor, GROUP_CONCAT(CONCAT(t.Descripcion, ': ', pt.Cantidad) ORDER BY t.Id_Talla SEPARATOR ', ') AS TallasConCantidad
          FROM productos p
          LEFT JOIN producto_talla pt ON p.Id_Producto = pt.Id_Producto
          LEFT JOIN tallas t ON pt.Id_Talla = t.Id_Talla
          LEFT JOIN proveedores prov ON p.Id_Proveedor = prov.Id_Proveedor
          GROUP BY p.Id_Producto";

// Obtener los productos de la base de datos utilizando la función definida en productosCrud.php
$productos = getArray($elSQL);

// Verificar si se ha enviado una solicitud POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verificar si la acción es eliminar un producto
    if ($_POST['action'] == 'eliminar_producto') {
        if(isset($_POST['id'])) {
            $id = $_POST['id'];
            // Llamar a la función para eliminar el producto
            if (EliminarProducto($id)) {
                // Redireccionar a la página de productos después de eliminar
                header("Location: productos.php");                
            } else {
                // Mostrar un mensaje de error si falla la eliminación
                echo "<div class='alert alert-danger' role='alert'>Error al eliminar el producto.</div>";
            }
        } else {
            // Mostrar un mensaje de error si no se recibe el ID del producto
            echo "<div class='alert alert-danger' role='alert'>ID de producto no recibido.</div>";
        }
    }
}
// Incluir el encabezado y el cuerpo de la página HTML
include_once '../include/templates/header.php';
?>

<main>
    <div class="custom-container">
        <!-- Botón para agregar un nuevo producto -->
        <div style="float: right;">
            <a href="../agregarproducto.php">
                <button type="button" class="btn btn-success color-boton">Añadir Producto</button>
            </a>
        </div>
        <h2>Productos</h2>
        <!-- Verificar si hay productos disponibles -->
        <?php if (!empty($productos)): ?>
        <!-- Mostrar la tabla de productos -->
        <table class="table">
            <thead style="text-align: center;">
                <tr>
                    <th class="max">Nombre</th>
                    <th>Categoría</th>
                    <th>Precio</th>
                    <th class="max">Descripción</th>
                    <th>Proveedor</th>
                    <th>Imagen</th>
                    <th>Tallas y Cantidades Disponibles</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- Iterar sobre los productos y mostrar cada uno en una fila de la tabla -->
                <?php foreach ($productos as $producto): ?>
                <tr>
                    <td class="text-center" style="max-width: 100px;"><?= $producto['Nombre'] ?></td>
                    <td class="text-center"><?= $producto['Categoria'] ?></td>
                    <td class="text-center"><?= $producto['Precio'] ?></td>
                    <td style="max-width: 200px;"><?= $producto['Descripcion'] ?></td>
                    <td class="text-center"><?= $producto['Proveedor'] ?></td>
                    <td class="text-center"><img class="logo" src="../img/productos/<?php echo $producto['Imagen']?>"
                            alt="<?= $producto['Nombre'] ?>"></td>
                    <td style="max-width: 100px;"><?= $producto['TallasConCantidad'] ?></td>
                    <td class="text-center">
                        <!-- Enlace para actualizar el producto -->
                        <a href="../actualizarproducto.php?id=<?= $producto['Id_Producto'] ?>"
                            class="btn btn-primary mr-1"><i class="fas fa-edit"></i></a>
                        <!-- Formulario para eliminar el producto -->
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" style="display: inline;">
                            <input type="hidden" name="id" value="<?= $producto['Id_Producto'] ?>">
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('¿Está seguro de que desea eliminar este producto?');"><i
                                    class="fas fa-trash-alt"></i></button>
                            <input type="hidden" name="action" value="eliminar_producto">
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <!-- Mensaje si no hay productos disponibles -->
        <?php else: ?>
        <p>No hay registros de productos.</p>
        <?php endif; ?>
    </div>
</main>

<?php
// Incluir el pie de página HTML
include_once '../include/templates/footer.php';
?>

</html>