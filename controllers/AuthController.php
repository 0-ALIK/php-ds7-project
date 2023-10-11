<?php
include '../repositories/UsuarioRepository.php';
class AuthController {

    /**
     * Este método permite controlar el incio de sesión de un usuario
     * Si las credenciales del usuario son validas, se crea una nueva sesión en el sistema y es redirigido al dashboard.
     * Si las credenciales son incorrectas se regresa al login.
     * @param string $email Es el email de usuario
     * @param string $password Es la contraseña del usuario
     */
    public function login($email, $password) {
        $usuarioRepository = new UsuarioRepository();
        $usuario = $usuarioRepository->doLogin($email, $password);

        if( !is_null($usuario) ) {
            header('refresh:0;url=dashboard.php');
            exit;
        }

        header('refresh:0;url=login.php');
        exit;
    }

    public function register( $data ) {

        $usuarioRepository = new UsuarioRepository();

        if( $usuarioRepository->insertUsuario( $data ) ) {
            header('refresh:0;url=login.php');
            exit;        
        }

        header('refresh:0;url=register.php');
        exit;    
    }

}
