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
        <h1>PRODUCTOS</h1>
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
        // Incluir el archivo de funciones
        require_once "productosCrud.php";

        // Llamar a la función para obtener los productos y mostrarlos en una tabla
        $productos = obtenerProductos();
        if (!empty($productos)) {
            echo "<table>";
            echo "<tr><th>PRODUCTO_ID</th><th>NOMBRE</th><th>CAT_PRODUCTO_ID</th><th>ACCIONES</th></tr>";
        
            foreach ($productos as $producto) {
                echo "<tr>";
                echo "<td>" . $producto['PRODUCTO_ID'] . "</td>";
                echo "<td>" . $producto['NOMBRE'] . "</td>";
                echo "<td>" . $producto['CAT_PRODUCTO_ID'] . "</td>";
                echo "<td>";
                // Botón para editar que redirige a editar_producto.php con el ID del producto como parámetro GET
                echo "<a href='editarProducto.php?id=" . $producto['PRODUCTO_ID'] . "'><button>Editar</button></a>";
                // Botón para eliminar que redirige a eliminar_producto.php con el ID del producto como parámetro GET
                echo "<a href='eliminarProducto.php?id=" . $producto['PRODUCTO_ID'] . "'><button>Eliminar</button></a>";
                // Botón adicional
                echo "<a href='otraPagina.php?id=" . $producto['PRODUCTO_ID'] . "'><button>Botón Adicional</button></a>";
                echo "</td>";
                echo "</tr>";
            }
        
            echo "</table>";
        }
        ?>
        <!-- Botón para agregar un nuevo producto -->
        <a href="agregarProducto.php"><button>Agregar Nuevo Producto</button></a>
    </div>
</body>

</html>
