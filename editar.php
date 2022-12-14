<?php include 'template/header.php' ?>

<?php
    if(!isset($_GET['id'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $id = $_GET['id'];

    /*
    $sql = "select * from persona where id = $id;";
    $result = mysqli_query($bd, $sql);
    $persona = mysqli_fetch_assoc($result);
    */ 
    
    $stmt = mysqli_prepare($bd, "select * from persona where id = ?;");
    mysqli_stmt_bind_param($stmt,  "s", $id);
    mysqli_stmt_execute($stmt);
    $resultado =  mysqli_stmt_get_result($stmt);

    $persona = mysqli_fetch_assoc($resultado);

    mysqli_close($bd);
    //print_r($persona);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                        <label class="form-label">Cui: </label>
                        <input type="text" class="form-control" name="txtCui" required 
                        value="<?php echo $persona['cui']; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="txtNombre" required 
                        value="<?php echo $persona['nombre']; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Telefono: </label>
                        <input type="text" class="form-control" name="txtTelefono" required 
                        value="<?php echo $persona['telefono']; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Direccion: </label>
                        <input type="text" class="form-control" name="txtDireccion" required 
                        value="<?php echo $persona['direccion']; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Contrasena: </label>
                        <input type="text" class="form-control" name="txtContrasena" required 
                        value="<?php echo $persona['contrasena']; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="id" value="<?php echo $persona['id']; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>