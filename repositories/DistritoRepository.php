<?php
class DistritoRepository {

    public function getAllById( $id_provincia ): array {
        $connection = ConnectionDB::getInstance()->getConnection();
        $sql = "SELECT * FROM distrito WHERE id_provincia = $id_provincia";

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