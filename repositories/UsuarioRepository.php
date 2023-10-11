<?php
include '../config/ConnectionDB.php';
include '../models/Usuario.php';
class UsuarioRepository {

    public function doLogin($email, $password): Usuario | null {
        $connection = ConnectionDB::getInstance()->getConnection();

        $sql = "SELECT * FROM usuario WHERE email = '$email'";
        $usuario = null;

        try {
            $resultado = $connection->query($sql);

            if($resultado->rowCount() > 0) {
                $resultados = $resultado->fetchAll(PDO::FETCH_ASSOC);
                $usuario = new Usuario();
                $usuario->cargarDesdeArreglo( $resultados[0] );

                if( !password_verify($password, $usuario->getPassword()) ) {
                    echo "no pasa";
                    $usuario = null;
                }
            }

            return $usuario;
        } catch (PDOException $exception) {
            echo $exception->getMessage();
            return null;
        }
    }

    public function insertUsuario( $datos ): bool {
        $connection = ConnectionDB::getInstance()->getConnection();
        $sql = "INSERT INTO usuario (nombre, apellido, email, password, id_distrito, id_nivel, foto) VALUES (:nombre, :apellido, :email, :password, :id_distrito, :id_nivel, :foto)";
        
        try {
            $stmt = $connection->prepare( $sql );

            $passwordHash = password_hash($datos["password"], PASSWORD_DEFAULT);

            $stmt->bindParam(':nombre', $datos["nombre"]);
            $stmt->bindParam(':apellido', $datos["apellido"]);
            $stmt->bindParam(':email', $datos["email"]);
            $stmt->bindParam(':password', $passwordHash);
            $stmt->bindParam(':id_distrito', $datos["id_distrito"]);
            $stmt->bindParam(':id_nivel', $datos["id_nivel"]);
            $stmt->bindParam(':foto', $datos["foto"], PDO::PARAM_LOB);

            if ($stmt->execute()) {
                return true;
            }

            return false;
        } catch (PDOException $exception) {
            echo $exception->getMessage();
            return false;
        }
    }

}