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
</div>
<div class="clientes-container">
    <h2>Proovedores</h2>
<div class="proveedores-container">
    <div class="proveedores-table">
        
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Proveedor Marvo</td>
                    <td><img src="imagenes/marvo ñogo.png" alt="Proveedor Marvo" style="width: 100px; height: auto;"></td>
                    <td>
                        <button class="editar">Editar</button>
                        <button class="eliminar">Eliminar</button>
                    </td>
                </tr>
                <tr>
                    <td>Proveedor MSI</td>
                    <td><img src="imagenes/msi logo.png" alt="Proveedor B" style="width: 100px; height: auto;"></td>
                    <td>
                        <button class="editar">Editar</button>
                        <button class="eliminar">Eliminar</button>
                    </td>
                </tr>
                <!-- Agrega más filas según sea necesario -->
            </tbody>
        </table>
    </div>
</div>

</body>

</html>