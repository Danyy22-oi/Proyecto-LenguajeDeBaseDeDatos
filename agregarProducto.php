<?php
include_once "functions/autenticado.php";

verificarAutenticacion();

include_once "include/functions/recoge.php";

$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = recogePost("nombre");
    $categoria = recogePost("categoria");
    $idProducto=recogePost("idProducto");
    /* 
    Aquí puedes realizar la validación de los datos ingresados si es necesario.
    Por ejemplo, verificar que el nombre no esté vacío, etc.
    */

    include_once 'productoCrud.php'; // Incluye el archivo que contiene las funciones de CRUD para productos
    
    // Llama a la función para agregar un producto
    if (agregarProducto($idProducto,$nombre, $categoria)) {
        header("Location: productoAgregadoExitosamente.php");
        exit();
    } else {
        $errores[] = "Error al agregar el producto"; // Puedes personalizar el mensaje de error según necesites
    }
}

?><!DOCTYPE html>
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
        <h1>AGREGAR NUEVO PRODUCTO</h1>
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
       
    <form action="agregarProducto.php" method="POST">
    <label for="nombre" class="blue-text">Nombre:</label><br>
    <input type="text" id="nombre" name="nombre" class="blue-text"><br>

    <label for="categoria" class="blue-text">Categoría:</label><br>
    <input type="text" id="categoria" name="categoria" class="blue-text"><br>

    <!-- Agrega más campos según los datos que quieras recopilar -->

    <input type="submit" value="Guardar Producto">
</form>
    </div>
   
</body>

</html>