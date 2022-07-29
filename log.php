<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtCui"]) || empty($_POST["txtContrasena"])){
        header('Location: login.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $cui = $_POST["txtCui"];
    $contrasena = $_POST["txtContrasena"];
    

    $sentencia = $bd->prepare("select * from persona where cui = ? and contrasena = ?");
    $sentencia -> bind_param("ss", $cui,$contrasena);
    $sentencia->execute();
    $result = $sentencia->get_result();
    $persona = $result->fetch_assoc();

    print_r($persona);
    if ($persona) {
        session_start();
        $_SESSION["id"]=$persona['id'];
        $_SESSION["cui"]=$persona['cui'];
        header('Location: principal.php');
    } else {
        header('Location: login.php?mensaje=error');
        exit();
    }
    
?>