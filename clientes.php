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
        <h1>CLIENTES</h1>
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
        require_once "clientesCrud.php";

        // Llamar a la función para obtener los clientes y mostrarlos en una tabla
        $clientes = obtenerClientes();

        if (!empty($clientes)) {
            echo "<table>";
            echo "<tr><th>CLIENTE_ID</th><th>NOMBRE</th><th>TELEFONO</th><th>CORREO</th><th>DIRECCION</th><th>ACCIONES</th></tr>";

            foreach ($clientes as $cliente) {
                echo "<tr>";
                echo "<td>" . $cliente['CLIENTE_ID'] . "</td>";
                echo "<td>" . $cliente['NOMBRE'] . "</td>";
                echo "<td>" . $cliente['TELEFONO'] . "</td>";
                echo "<td>" . $cliente['CORREO'] . "</td>";
                echo "<td>" . $cliente['DIRECCION'] . "</td>";
                echo "<td>";
                // Botón para editar que redirige a editarCliente.php con el ID del cliente como parámetro GET
                echo "<a href='editarCliente.php?id=" . $cliente['CLIENTE_ID'] . "'><button>Editar</button></a>";
                // Botón para eliminar que redirige a eliminarCliente.php con el ID del cliente como parámetro GET
                echo "<a href='eliminarCliente.php?id=" . $cliente['CLIENTE_ID'] . "'><button>Eliminar</button></a>";
                echo "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "No se encontraron clientes.";
        }
        ?>
    </div>
</body>

</html>