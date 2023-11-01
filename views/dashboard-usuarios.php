<?php
require_once '../models/Usuario.php';
require_once '../controllers/UserController.php';
require_once '../repositories/UsuarioRepository.php';


session_start();



if( !isset($_SESSION['usuario']) ) {
    echo 'Acceso denegado, serás redirigido en 3 segundos...';
    header('refresh:3;url=login.php');
    exit;
}

$usuario = unserialize( $_SESSION['usuario'] );

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

    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>

    <title>Tabla de usuarios</title>
</head>
<body>
    <h2>Puede editar directamente los datos de un usuario escribiendo sobre las celdas de la tabla</h2>
    <table>
        <tr>
            <th>ID Usuario</th>
            <th>Nombre <span class="text-info">editable</span></th>
            <th>Apellido <span class="text-info">editable</span></th>
            <th>Email <span class="text-info">editable</span></th>
            <th>ID Nivel</th>
            <th>ID Distrito</th>
            <th>Editar</th>
        </tr>

        <?php
            $usuarioRepository = new UsuarioRepository();

            $usuarios = $usuarioRepository->getAll();

            foreach ($usuarios as $usuarioi) {
                $id = $usuarioi['id_usuario'];
                echo "<tr>";
                echo "<td>" . $id . "</td>";
                echo "<td id='".$id."-nombre"."' contenteditable='true'>" . $usuarioi['nombre'] . "</td>";
                echo "<td id='".$id."-apellido"."' contenteditable='true'>" . $usuarioi['apellido'] . "</td>";
                echo "<td id='".$id."-email"."' contenteditable='true'>" . $usuarioi['email'] . "</td>";
                echo "<td>" . $usuarioi['id_nivel'] . "</td>";
                echo "<td>" . $usuarioi['id_distrito'] . "</td>";
                echo '<td><button onclick="editarUsuarios('.$id.')">Editar</button></td>';
                echo "</tr>";
            }
        ?>


    </table>

    <script src="../js/edit-usuarios.js"></script>

</body>
</html>
