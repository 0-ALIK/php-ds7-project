<?php
require_once '../config/ConnectionDB.php';

class ProvinciaRepository {
    
    public function getAll(): array {
        $connection = ConnectionDB::getInstance()->getConnection();
        $sql = "SELECT * FROM provincia";

        try {
            $resultado = $connection->query($sql);
            
            if($resultado->rowCount() > 0) {
                $resultados = $resultado->fetchAll(PDO::FETCH_ASSOC);
            }

            return $resultados;
        } catch (PDOException $exception) {
            
            return [];
        }
    }

    public function insertProvincia( $nom_provincia ) {
        $connection = ConnectionDB::getInstance()->getConnection();
        $sql = "INSERT INTO Provincia (nom_provincia) VALUES (:nombre)";

        try {
            $stmt = $connection->prepare($sql);
            $stmt->bindParam("nombre", $nom_provincia);
            return $stmt->execute();
        } catch (\Throwable $th) {
            return false;
        }
    }
}