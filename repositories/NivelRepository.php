<?php
require_once '../config/ConnectionDB.php';

class NivelRepository {

    public function getAll(): array {
        $connection = ConnectionDB::getInstance()->getConnection();
        $sql = "SELECT * FROM nivel";

        try {
            $resultado = $connection->query($sql);
            $resultados = [];
            if($resultado->rowCount() > 0) {
                $resultados = $resultado->fetchAll(PDO::FETCH_ASSOC);
            }

            return $resultados;
        } catch (PDOException $exception) {
            
            return [];
        }
    }

    

}