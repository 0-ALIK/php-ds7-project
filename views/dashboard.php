<?php
include '../models/Usuario.php';
include '../controllers/UserController.php';

session_start();

$userController = new UserController();

if( !isset($_SESSION['usuario']) ) {
    echo 'Acceso denegado, serás redirigido en 3 segundos...';
    header('refresh:3;url=login.php');
    exit;
}

$usuario = unserialize( $_SESSION['usuario'] );

if( isset($_GET['update']) ) {

    if (isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["email"])) {

        $datos = array(
            "nombre" => $_POST["nombre"],
            "apellido" => $_POST["apellido"],
            "email" => $_POST["email"],
        );

        if (isset($_FILES["foto"])) {
            $archivo_tmp = $_FILES['foto']['tmp_name'];
            $datos["foto"] = file_get_contents($archivo_tmp);
        }

        $userController->updateUser($usuario->getIdUsuario(), $datos);

    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="../css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="../css/bootstrap.utilities.css">
    <title>Dashboard</title>
</head>
<body>
    <h1>Dashboard</h1>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                
                <img src='data:image/jpeg;base64,<?= base64_encode($usuario->getFoto()) ?>' alt='Foto de Perfil' class='img-fluid rounded-circle' style='max-width: 200px;'>
                
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center">Bienvenido al sistema <?=$usuario->getNombre()?></h2>

                        <form action="./dashboard.php?update=" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?=$usuario->getNombre()?>">
                            </div>

                            <div class="mb-3">
                                <label for="apellido" class="form-label">Apellido</label>
                                <input type="text" class="form-control" id="apellido" name="apellido" value="<?=$usuario->getApellido()?>">
                            </div>
                            
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?=$usuario->getEmail()?>">
                            </div>

                            <div class="mb-3">
                                <label for="foto" class="form-label">Foto (Subir archivo)</label>
                                <input type="file" class="form-control" id="foto" name="foto">
                            </div>

                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>