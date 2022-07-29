<?php
    print_r($_POST);
    if(!isset($_POST['id'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    session_start();
    if(empty($_SESSION["id"])){
        $cui = $_POST["txtCui"];
        $id = $_POST['id'];
    }
    else {
        $cui = $_SESSION["cui"];
        $id = $_SESSION["id"];

    }
    $nombre = $_POST["txtNombre"];
    $telefono = $_POST["txtTelefono"];
    $direccion = $_POST["txtDireccion"];
    $contrasena = $_POST["txtContrasena"];

    $sentencia = $bd->prepare("UPDATE persona SET cui = ?, nombre = ?, telefono = ?, direccion=?, contrasena = ?  where id = ?;");
    $resultado = $sentencia->execute([$cui,$nombre,$telefono,$direccion,$contrasena, $id]);
    if ($resultado === TRUE) {
        if(empty($_SESSION["id"])){
            header('Location: index.php?mensaje=editado');
        }
        else{
            header('Location: principal.php?mensaje=editado');
        }
    } else {
        if(empty($_SESSION["id"])){
            header('Location: index.php?mensaje=error');
        }
        else{
            header('Location: principal.php?mensaje=error');
        }
        exit();
    }
    
?>