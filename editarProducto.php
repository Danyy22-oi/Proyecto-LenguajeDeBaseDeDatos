<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Título de la página</title>
    <link rel="stylesheet" href="style.css">
    <title>Menú Principal</title>
</head>

<body>
    <a href="index2.php">
        <img src="imagenes/Black_and_White_Monochrome_Tech_Logo-removebg-preview.png" alt="Ir al Menú" style="display:block; margin: 0 auto; width: 120px;">
        <h1>EDITAR PRODUCTO</h1>
    </a>

    <div class="sidebar">
        <div class="usuario">
            <img src="imagenes/sticker-png-login-icon-system-administrator-user-user-profile-icon-design-avatar-face-head.png" alt="Foto de perfil">
            <div class="informacion-usuario">
                <span class="nombre-usuario">Juan Mora Arias</span>
                <span class="correo-usuario">juaMAA123@gmail.com</span>
            </div>
        </div>
        <ul>
            <li><a href="#">Clientes</a></li>
            <li><a href="#">Reportes</a></li>
            <li><a href="#">Configuración</a></li>
            <li><a href="#">Gestión de Usuarios</a></li>
        </ul>
    </div>
    <div class="container">

        <?php
        // Incluir el encabezado y las funciones necesarias
        require_once "productosCrud.php";

        // Definir variables para los valores iniciales de los campos
        $producto_id = "";
        $nombre = "";
        $cat_producto_id = "";

        // Verificar si se recibió un ID de producto válido por GET
        if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
            $producto_id = $_GET['id'];

            // Obtener la información del producto por su ID
            $producto = obtenerIdProducto($producto_id);

            // Verificar si el producto y sus claves están definidos
            if ($producto && isset($producto['PRODUCTO_ID']) && isset($producto['NOMBRE']) && isset($producto['CAT_PRODUCTO_ID'])) {
                // Obtener los datos del producto
                $nombre = $producto['NOMBRE'];
                $cat_producto_id = $producto['CAT_PRODUCTO_ID'];
            } else {
                // Mostrar un mensaje de error si no se encontró el producto o las claves necesarias
                echo "<p>Error: No se pudo obtener la información del producto.</p>";
            }
        } else {
            // Mostrar un mensaje de error si no se proporcionó un ID de producto válido
            echo "<p>ID de producto no válido.</p>";
        }
        ?>

<main>
    
            <div class="container">
                <form method="post" action="actualizarProducto.php">
                    <input type="hidden" name="producto_id" value="<?php echo $producto_id; ?>">
                    <div class="form-group">
                        <label for="nombre" style="color: blue;">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="Nombre" value="<?php echo $nombre; ?>">
                    </div>
                    <div class="form-group">
                        <label for="cat_producto_id" style="color: blue;">ID de Categoría:</label>
                        <input type="text" class="form-control" id="cat_producto_id" name="Cat_Producto_ID" value="<?php echo $cat_producto_id; ?>">
                    </div>

                </form>
            </div>
        </main>

    </div>
</body>

</html>

<?php

?>