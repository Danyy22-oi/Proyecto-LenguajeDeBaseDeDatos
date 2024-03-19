<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Título de la página</title>
    <link rel="stylesheet" href="style.css">
    <title>Menú Principal</title>
</head>

<body>
    <h1>CONTROL DE INVENTARIO S&C TECNOLOGIAS</h1>
    <a href="index2.php">
        <img src="imagenes/Black_and_White_Monochrome_Tech_Logo-removebg-preview.png" alt="Ir al Menú"
            style="display:block; margin: 0 auto; width: 120px;">
 

    <div class="sidebar">
        <div class="usuario">
            <img src="imagenes/sticker-png-login-icon-system-administrator-user-user-profile-icon-design-avatar-face-head.png"
                alt="Foto de perfil">
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
    <h1>Agregar Producto Nuevo</h1>
    <div class="agregar-producto-container">
        <div class="agregar-producto-form">
            <form action="guardar_producto.php" method="post">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="input-field">
                
                <label for="codigo">Código:</label>
                <input type="text" id="codigo" name="codigo" class="input-field">
                
                <label for="imagen">Imagen:</label>
                <input type="text" id="imagen" name="imagen" class="input-field">
                
                <button type="submit" class="submit-button">Guardar Producto</button>
            </form>
        </div>
    </div>
</body>

</html>