<?php
include '../controllers/AuthController.php';

$controller = new AuthController();
$error = null;

if ( isset($_GET['login']) ) {

    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (!empty($email) && !empty($password)) {
            
            $controller->login($email, $password);

        } else {
            $error = 'Los campos no pueden estar vacios';
        }

    } else {
        $error = 'No enviaste los campos';
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
    <title>Login</title>
</head>
<body>

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title text-center">Inicio de Sesión</h2>
                <form action="./login.php?login=" method="POST">
                    <?php 
                    if (!is_null($error)) {
                        echo "<p class='text-danger'>$error</p>";
                    }                        
                    ?>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="contraseña" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="contraseña" name="password">
                    </div>
                    
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>