<?php
require_once "productosCrud.php";

// Realiza la consulta para obtener los datos necesarios
$productos = obtenerProductos();
$categorias = getArray("SELECT * FROM PRODUCTOSSYC");
$subcategorias = getArray("SELECT * FROM subcategoria");
$proveedores = getArray("SELECT * FROM proveedores");
$tallas = getArray("SELECT * FROM tallas");

// Verifica si la solicitud es GET para cargar los datos del producto a editar
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Aquí deberías obtener el ID del producto a editar, puedes usar recogeGet("id") como en tu código original

    // Realiza la consulta para obtener los datos del producto específico
    // Reemplaza '$id' por el ID del producto que obtuviste
    $producto = obtenerProductoPorID($id);

    // Verifica si se encontró el producto
    if ($producto != null) {
        // Asigna los valores de las columnas a las variables correspondientes
        // Ajusta los nombres de las columnas según tu tabla
        $id = $producto['ID_PRODUCTO'];
        $nombre = $producto['NOMBRE'];
        $descripcion = $producto['DESCRIPCION'];
        $precio = $producto['PRECIO'];
        // y así sucesivamente para las demás columnas
    }
}

// Verifica si la solicitud es POST para procesar el formulario de edición
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Aquí deberías obtener los valores del formulario y procesarlos para actualizar el producto en la base de datos
    // Ajusta el código para procesar los datos del formulario y actualizar el producto según sea necesario
}

// Incluye la cabecera y comienza el contenido HTML
include_once 'ruta/a/tu/archivo/header.php';
?>

main>
    <div class="container">
        <h2>Editar Producto</h2>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div>
                <input type="hidden" name="Id_Producto" value="<?= $id ?>">
            </div>
            <div class="form-group">
                <label for="nombre">Nombre<span class="required">*</span></label>
                <input type="text" class="form-control" id="Nombre" name="nombre" placeholder="Nombre" maxlength="255" value="<?= $nombre ?>">
                <?php if (!empty($errores['nombre'])) : ?>
                    <div class="text-danger"><?php echo $errores['nombre']; ?></div>
                <?php endif; ?>
            </div>
            <br>
            <div class="form-group">
                <label for="descripcion">Descripción<span class="required">*</span></label>
                <textarea class="form-control" id="Descripcion" name="descripcion" rows="2" maxlength="200"><?= $descripcion ?></textarea>
                <?php if (!empty($errores['descripcion'])) : ?>
                    <div class="text-danger"><?php echo $errores['descripcion']; ?></div>
                <?php endif; ?>
            </div>
            <br>
            <div class="form-group">
                <label for="precio">Precio<span class="required">*</span></label>
                <input type="number" class="form-control" id="Precio" name="precio" placeholder="Precio" value="<?= $precio ?>">
                <?php if (!empty($errores['precio'])) : ?>
                    <div class="text-danger"><?php echo $errores['precio']; ?></div>
                <?php endif; ?>
            </div>
            <br>
            <div class="form-group">
                <label>Tallas (Selección múltiple)<span class="required">*</span></label>
                <div class="row">
                    <?php $colSize = ceil(count($tallas) / 3); ?>
                    <?php foreach ($tallas as $index => $tallaItem) : ?>
                        <?php if ($index % $colSize === 0) : ?>
                            <div class="col-md-4">
                            <?php endif; ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="talla_<?php echo $tallaItem['Id_Talla']; ?>" name="talla[]" value="<?php echo $tallaItem['Id_Talla']; ?>" <?php if (in_array($tallaItem['Id_Talla'], $tallaArray)) : ?> checked <?php endif; ?>>
                                <label class="form-check-label" for="talla_<?php echo $tallaItem['Id_Talla']; ?>">
                                    <?php echo $tallaItem['Descripcion']; ?>
                                </label>
                                <?php
                                $indice = array_search($tallaItem['Id_Talla'], $tallaArray);
                                if ($indice !== false && isset($cantidadArray[$indice])) {
                                    $cantidadValue = $cantidadArray[$indice];
                                } else {
                                    $cantidadValue = '';
                                }
                                ?>
                                <input type="number" class="form-control" id="cantidad_<?php echo $tallaItem['Id_Talla']; ?>" name="cantidad[<?php echo $tallaItem['Id_Talla']; ?>]" placeholder="Cantidad" value="<?php echo $cantidadValue; ?>">
                            </div>
                            <?php if (($index + 1) % $colSize === 0 || ($index + 1) === count($tallas)) : ?>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <?php if (!empty($errores['talla_cantidad'])) : ?>
                    <div class="text-danger"><?php echo $errores['talla_cantidad']; ?></div>
                <?php endif; ?>
            </div>
            <br>
            <div class="form-group">
                <label for="imagen">Imagen</label>
                <input type="file" class="form-control" id="imagen" name="imagen">
            </div>
            <br>
            <div class="form-group">
                <label for="categoria">Categoría<span class="required">*</span></label>
                <select class="form-control" id="Categoria" name="categoria">
                    <?php foreach ($categorias as $cat) : ?>
                        <option value="<?= $cat['Id_Categoria'] ?>" <?= ($cat['Id_Categoria'] == $Id_Categoria) ? 'selected' : '' ?>>
                            <?= $cat['Descripcion'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <br>
            <div class="form-group">
                <label for="subcategoria">Subcategoría<span class="required">*</span></label>
                <select class="form-control" id="Subcategoria" name="subcategoria">
                    <?php foreach ($subcategorias as $subcat) : ?>
                        <option value="<?= $subcat['id_SubCategoria'] ?>" <?= ($subcat['id_SubCategoria'] == $Id_Subcategoria) ? 'selected' : '' ?>>
                            <?= $subcat['nombre'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <br>
            <div class="form-group">
                <label for="proveedor">Proveedor<span class="required">*</span></label>
                <select class="form-control" id="Proveedor" name="proveedor">
                    <?php foreach ($proveedores as $prov) : ?>
                        <option value="<?= $prov['Id_Proveedor'] ?>" <?= ($prov['Id_Proveedor'] == $Id_Proveedor) ? 'selected' : '' ?>>
                            <?= $prov['Nombre'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <br>
            <div>
                <button type="submit" class="btn btn-primary color-boton">Actualizar Producto</button>
            </div>
            <br>
        </form>
    </div>
</main>

<!-- Aquí va cualquier script adicional que necesites -->

<?php
// Incluye el pie de página
include_once 'ruta/a/tu/archivo/footer.php';
?>
