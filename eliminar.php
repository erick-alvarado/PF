<?php 
    if(!isset($_GET['id'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include 'model/conexion.php';
    $id = $_GET['id'];

    //$sentencia = $bd->prepare("DELETE FROM persona where id = ?;");
    //$resultado = $sentencia->execute([$id]);

    $stmt = mysqli_prepare($bd, "DELETE FROM persona where id = ?;");
    mysqli_stmt_bind_param($stmt, 's',$id);

    $resultado = mysqli_stmt_execute($stmt);


    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=eliminado');
    } else {
        header('Location: index.php?mensaje=error');
    }
    
?>