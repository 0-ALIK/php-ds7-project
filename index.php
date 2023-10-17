<?php 
include 'controllers/IndexController.php';

if( isset($_GET['q']) ) {

    $q = $_GET['q'];
    $indexContoller = new IndexController();

    if( $q == 'login' ) {
        $indexContoller->getLoginPage();
    }

    if ( $q == 'registro' ) {   
        $indexContoller->getRegisterPage();
    }
    
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="./css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="./css/bootstrap.utilities.css">
    <title>Index</title>
</head>
<body>
    
    <div class="container mt-5">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Mi Tarjeta</h5>
                <p class="card-text">Esta es una tarjeta de ejemplo con enlaces centrados.</p>
                <div class="d-flex justify-content-center">
                    <a href="./?q=login" class="btn btn-primary mr-3">Ir al login</a>
                    <a href="./?q=registro" class="btn btn-secondary">Ir al registro</a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>