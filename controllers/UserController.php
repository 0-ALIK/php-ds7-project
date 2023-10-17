<?php

class UserController {

    public function updateUser($id, $datos) {
        $usuarioRepository = new UsuarioRepository();

        if( $usuarioRepository->updateUsuario($id, $datos) ) {
            header('refresh:0;url=dashboard.php');
            exit;       
        }

        header('refresh:0;url=dashboard.php');
        exit;       

    }

}