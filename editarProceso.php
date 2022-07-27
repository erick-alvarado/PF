<?php
    print_r($_POST);
    if(!isset($_POST['id'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $cui = $_POST["txtCui"];
    $nombre = $_POST["txtNombre"];
    $telefono = $_POST["txtTelefono"];
    $direccion = $_POST["txtDireccion"];
    $contrasena = $_POST["txtContrasena"];
    $id = $_POST['id'];

    $sentencia = $bd->prepare("UPDATE persona SET cui = ?, nombre = ?, telefono = ?, direccion=?, contrasena = ?  where id = ?;");
    $resultado = $sentencia->execute([$cui,$nombre,$telefono,$direccion,$contrasena, $id]);
    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>