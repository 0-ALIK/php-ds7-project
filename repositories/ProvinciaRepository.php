<?php
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
}