<?php include 'template/header.php' ?>
<?php
    if(!empty($_SESSION["cui"])){
        header('Location: principal.php');
        exit();
    }
    
?>
<div class="col-md-4">
            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error'){
                ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> Vuelve a intentar.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php 
                }
            ?>   
            <div class="card">
                <form class="p-4" method="POST" action="log.php">
                    <div class="mb-3">
                        <label class="form-label">Cui: </label>
                        <input type="text" class="form-control" name="txtCui" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Contrasena: </label>
                        <input type="text" class="form-control" name="txtContrasena" autofocus required>
                    </div>
                    
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary" value="Login">
                    </div>
                </form>
            </div>
        </div>