<?php
require_once '../models/Usuario.php';
require_once '../controllers/UserController.php';
require_once '../repositories/ProvinciaRepository.php';
require_once '../repositories/DistritoRepository.php';
require_once '../repositories/NivelRepository.php';

session_start();

$userController = new UserController();
$provinciaRepository = new ProvinciaRepository();
$distritoRespository = new DistritoRepository();
$provincias = $provinciaRepository->getAll();

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

        if (isset($_FILES["foto"]) && !empty($_FILES["foto"])) {
            $archivo_tmp = $_FILES['foto']['tmp_name'];
            $datos["foto"] = file_get_contents($archivo_tmp);
        }

        $userController->updateUser($usuario->getIdUsuario(), $datos);
    }
}

if( isset($_GET['agregar_provincia']) ) {
    if(isset($_POST['nombre'])) {
        $provinciaRepository->insertProvincia( $_POST['nombre'] );
    }
}

if( isset($_GET['agregar_distrito']) ) {
    if(isset($_POST['id_provincia']) && isset($_POST['nombre'])) {
        $distritoRespository->inserDistrito( $_POST['id_provincia'], $_POST['nombre'] );
    }
}

if( isset($_GET['cambiar_pass']) )  {
    $userController->cambiarPass($usuario->getEmail());
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

    <a href="./dashboard-usuarios.php">Ver usarios</a>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                
                <div class="card">
                    <div class="card-body">
                        <?php
                        $imagenUser = 'data:image/jpeg;base64,'.base64_encode( $usuario->getFoto() );
                        if(!is_null($imagenUser)) {
                            echo "<img src='data:image/jpeg;base64,". base64_encode($usuario->getFoto()). "' alt='Foto de Perfil' class='img-fluid rounded-circle' style='max-width: 200px;'>";
                        } else {
                            echo "<img src='../' alt='Foto de Perfil' class='img-fluid rounded-circle' style='max-width: 200px;'>";
                        }
                        ?>

                        <form action="./dashboard.php?agregar_provincia=" method="post">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre de la provincia</label>
                                <input type="text" class="form-control" id="nombre" name="nombre">
                            </div>
                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-primary">Agregar provincia</button>
                            </div>
                        </form>

                        <form action="./dashboard.php?agregar_distrito=" method="post">
                            <div class="mb-3">
                                <label for="id_provincia" class="form-label">Provincia (Seleccionar)</label>
                                <select class="form-control" id="id_provincia" name="id_provincia" required>
                                    <option value="">-- seleciona una provincia --</option>
                                    <?php
                                    foreach( $provincias as $provincia ) {
                                        echo "<option value='".$provincia['id_provincia']."'>".$provincia['nom_provincia']."</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre del distrito</label>
                                <input type="text" class="form-control" id="nombre" name="nombre">
                            </div>
                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-primary">Agregar distrito</button>
                            </div>
                        </form>

                    </div>
                </div>
                
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
                                <label for="id_provincia" class="form-label">Provincia (Seleccionar)</label>
                                <select class="form-control" id="id_provincia" name="id_provincia">
                                    <option value="">-- seleciona una provincia --</option>
                                    <?php
                                    foreach( $provincias as $provincia ) {
                                        echo "<option value='".$provincia['id_provincia']."'>".$provincia['nom_provincia']."</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="id_distrito" class="form-label">Distrito (Seleccionar)</label>
                                <select class="form-control" id="id_distrito" name="id_distrito"></select>
                            </div>

                            <div class="mb-3">
                                <label for="id_nivel" class="form-label">Nivel (Seleccionar)</label>
                                <select class="form-control" id="id_nivel" name="id_nivel">
                                    <option value="">-- seleciona un nivel --</option>
                                    <?php
                                    $nivelRepository = new NivelRepository();
                                    $niveles = $nivelRepository->getAll();

                                    foreach( $niveles as $nivel ) {
                                        echo "<option value='".$nivel['id_nivel']."'>".$nivel['nom_nivel']."</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="foto" class="form-label">Foto (Subir archivo)</label>
                                <input type="file" class="form-control" id="foto" name="foto">
                            </div>

                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                            </div>

                            <a class="my-2" href="./dashboard.php?cambiar_pass">Cambiar contraseña</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="../js/fill-select-distrito.js"></script>
    
</body>
</html>
