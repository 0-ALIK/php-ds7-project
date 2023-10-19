<?php
require_once '../repositories/UsuarioRepository.php';

class UserController {

    public function updateUser($id, $datos) {
        $usuarioRepository = new UsuarioRepository();

        if( $usuarioRepository->updateUsuario($id, $datos) ) {
            $_SESSION['usuario'] = serialize($usuarioRepository->getById($id));
            header('refresh:0;url=dashboard.php?mensaje=Datos actualizados&tipo=info');
            exit;       
        }

        header('refresh:0;url=dashboard.php?mensaje=No se pudieron actualizar&tipo=danger');
        exit;
    }

}