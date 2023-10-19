<?php
require_once '../config/ConnectionDB.php';

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

    public function inserDistrito( $id_provincia, $nom_distrito ) {
        $connection = ConnectionDB::getInstance()->getConnection();
        $sql = "INSERT INTO Distrito (id_provinica, nom_distrito) VALUES (:provincia, :nombre)";

        try {
            $stmt = $connection->prepare($sql);
            $stmt->bindParam("provinca", $id_provincia);
            $stmt->bindParam("nombre", $nom_distrito);

            return $stmt->execute(); 
        } catch (\Throwable $th) {
            return false;
        }
    }
}