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

    public function cambiarPass($email) {
        $para = $email;
        $asunto = "Solicitud de cambio de contraseña";
        $mensaje = "Su solicitud de cambio de contraseña ha sido recibida.";

        $headers = 'From: moisesalik01@gmail.com' . "\r\n" .
            'Reply-To: moisesalik01@gmail.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        if (mail($para, $asunto, $mensaje, $headers)) {
            echo "Correo enviado correctamente.";
        } else {
            echo "No se pudo enviar el correo.";
        }
    }

}