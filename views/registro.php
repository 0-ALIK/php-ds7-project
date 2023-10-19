<?php
require_once '../controllers/AuthController.php';
require_once '../repositories/ProvinciaRepository.php';
require_once '../repositories/DistritoRepository.php';
require_once '../repositories/NivelRepository.php';
require_once '../repositories/UsuarioRepository.php';

$authController = new AuthController();
$provinciaRepository = new ProvinciaRepository();
$nivelRepository = new NivelRepository();
$usuarioRepository = new UsuarioRepository();


if( isset($_GET['registro']) ) {

    if (isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["id_provincia"]) && isset($_POST["id_distrito"]) && isset($_POST["id_nivel"])) {

        $datos = array(
            "nombre" => $_POST["nombre"],
            "apellido" => $_POST["apellido"],
            "email" => $_POST["email"],
            "password" => $_POST["password"],
            "id_distrito" => $_POST["id_distrito"],
            "id_nivel" => $_POST["id_nivel"]
        );
        
        if (isset($_FILES["foto"])) {
            $archivo_tmp = $_FILES['foto']['tmp_name'];
            $datos["foto"] = file_get_contents($archivo_tmp);
        }

        $authController->register( $datos );
        
    } else {
        // Algunos campos del formulario están ausentes, maneja el error de acuerdo a tus necesidades
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
    <title>Registro</title>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">

                        <h2 class="card-title text-center">Registro de Usuario</h2>

                        <form action="./registro.php?registro=" method="POST" enctype="multipart/form-data">
                            <?php                            
                            if(isset($_GET['mensaje']) && isset($_GET['tipo'])) {
                                $mensaje = $_GET['mensaje'];
                                $tipo = $_GET['tipo'];
                                echo "<p class='text-$tipo'>$mensaje</p>";
                            }
                            ?>
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>

                            <div class="mb-3">
                                <label for="apellido" class="form-label">Apellido</label>
                                <input type="text" class="form-control" id="apellido" name="apellido" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>

                            <div class="mb-3">
                                <label for="foto" class="form-label">Foto (Subir archivo)</label>
                                <input type="file" class="form-control" id="foto" name="foto" accept=".jpg, .jpeg, .png">
                            </div>

                            <div class="mb-3">
                                <label for="id_provincia" class="form-label">Provincia (Seleccionar)</label>
                                <select class="form-control" id="id_provincia" name="id_provincia" required>
                                    <option value="">-- seleciona una provincia --</option>
                                    <?php
                                    $provincias = $provinciaRepository->getAll();

                                    foreach( $provincias as $provincia ) {
                                        echo "<option value='".$provincia['id_provincia']."'>".$provincia['nom_provincia']."</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="id_distrito" class="form-label">Distrito (Seleccionar)</label>
                                <select class="form-control" id="id_distrito" name="id_distrito" required></select>
                            </div>

                            <div class="mb-3">
                                <label for="id_nivel" class="form-label">Nivel (Seleccionar)</label>
                                <select class="form-control" id="id_nivel" name="id_nivel" required>
                                    <option value="">-- seleciona un nivel --</option>
                                    <?php
                                    $niveles = $nivelRepository->getAll();

                                    foreach( $niveles as $nivel ) {
                                        echo "<option value='".$nivel['id_nivel']."'>".$nivel['nom_nivel']."</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Registrarse</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../js/fill-select-distrito.js"></script>

</body>
</html>