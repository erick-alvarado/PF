<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtCui"]) || empty($_POST["txtContrasena"])){
        header('Location: login.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $cui = $_POST["txtCui"];
    $contrasena = $_POST["txtContrasena"];
    

    /*
    $sentencia = $bd->prepare("select * from persona where cui = ? and contrasena = ?");
    $sentencia -> bind_param("ss", $cui,$contrasena);
    $sentencia->execute();
    $result = $sentencia->get_result();
    $persona = $result->fetch_assoc();
    */

    $stmt = mysqli_prepare($bd, "select * from persona where cui = ? and contrasena = ?");
    mysqli_stmt_bind_param($stmt,  "ss", $cui,$contrasena);
    mysqli_stmt_execute($stmt);
    $resultado =  mysqli_stmt_get_result($stmt);
    $persona = mysqli_fetch_assoc($resultado);

    mysqli_close($bd);

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