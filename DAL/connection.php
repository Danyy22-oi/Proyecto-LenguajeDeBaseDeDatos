<?php
function conectarDb(){
    $usuario = 'hr';
    $contraseña = '123';
    $base_de_datos = 'syctecnologias';
    $servidor = 'nombre_del_servidor';

    $conexion = oci_connect($usuario, $contraseña, $servidor.'/'.$base_de_datos);
    if(!$conexion){
        $error = oci_error();
        echo "Error al conectar con la base de datos: " . $error['message'];
        exit;
    }

    return $conexion;
}

function Desconectar($conexion){
    oci_close($conexion);
}
?>
