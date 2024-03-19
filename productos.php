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
    <div style="text-align: center; margin-top: 20px;">
    <a href="productoNuevo.php" class="agregar-producto-nuevo">Agregar Producto Nuevo</a>
</div>
</div>
        <div class="clientes-container">
    <h2>Productos</h2>
    <div class="productos-container">
        <div class="productos-table">
        
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Codigo</th>
                        <th>Imagen</th>
                        <th>Acciones</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Monitor Msi</td>
                        <td>Msicvk</td>
                        <td><img src="imagenes/9S6-3CC32H-014-800x800h.jpg.webp" alt="Producto 1" style="width: 100px; height: auto;"></td>
                        <td>
                            <button class="editar">Editar</button>
                            <button class="eliminar">Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Teclado Marvo</td>
                        <td>TMRV12</td>
                        <td><img src="imagenes/marvo-km400g3-combo-teclado-mouse-gaming.jpg" alt="Producto 2" style="width: 100px; height: auto;"></td>
                        <td>
                            <button class="editar">Editar</button>
                            <button class="eliminar">Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Mouse Scorpion</td>
                        <td>MSSco18</td>
                        <td><img src="imagenes/mouse scorpion.webp" alt="Producto 3" style="width: 100px; height: auto;"></td>
                        <td>
                            <button class="editar">Editar</button>
                            <button class="eliminar">Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Headset Gamer Rosa Marvo Hg8936</td>
                        <td>HGMR66</td>
                        <td><img src="imagenes/headsetd.webp" alt="Producto 2" style="width: 100px; height: auto;"></td>
                        <td>
                            <button class="editar">Editar</button>
                            <button class="eliminar">Eliminar</button>
                        </td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>