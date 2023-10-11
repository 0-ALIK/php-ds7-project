<!DOCTYPE html>
<html lang="en">
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
                <img src="" alt="Foto de Perfil" class="img-fluid rounded-circle" style="max-width: 200px;">
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center">Mi Perfil</h2>
                        <form action="guardar_cambios.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="Nombre del Usuario">
                            </div>
                            <div class="mb-3">
                                <label for="apellido" class="form-label">Apellido</label>
                                <input type="text" class="form-control" id="apellido" name="apellido" value="Apellido del Usuario">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="correo@example.com">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Nueva Contraseña">
                            </div>
                            <div class="mb-3">
                                <label for="foto" class="form-label">Foto (Subir archivo)</label>
                                <input type="file" class="form-control" id="foto" name="foto">
                            </div>
                            <div class="mb-3">
                                <label for="id_nivel" class="form-label">Nivel (Seleccionar)</label>
                                <select class="form-control" id="id_nivel" name="id_nivel">
                                    <option value="1">Nivel 1</option>
                                    <option value="2">Nivel 2</option>
                                    <option value="3">Nivel 3</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="id_distrito" class="form-label">Distrito (Seleccionar)</label>
                                <select class="form-control" id="id_distrito" name="id_distrito">
                                    <option value="1">Distrito 1</option>
                                    <option value="2">Distrito 2</option>
                                    <option value="3">Distrito 3</option>
                                </select>
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