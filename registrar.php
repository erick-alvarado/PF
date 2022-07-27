<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtCui"]) || empty($_POST["txtNombre"]) || empty($_POST["txtTelefono"])|| empty($_POST["txtDireccion"])|| empty($_POST["txtContrasena"])){
        header('Location: index.php?mensaje=falta');
        exit();
    }

    include_once 'model/conexion.php';
    $cui = $_POST["txtCui"];
    $nombre = $_POST["txtNombre"];
    $telefono = $_POST["txtTelefono"];
    $direccion = $_POST["txtDireccion"];
    $contrasena = $_POST["txtContrasena"];
    

    $sentencia = $bd->prepare("INSERT INTO persona(cui, nombre, telefono,direccion,contrasena) VALUES (?,?,?,?,?);");
    $resultado = $sentencia->execute([$cui,$nombre,$telefono,$direccion,$contrasena]);
    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>