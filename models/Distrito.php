<?php
class Distrito {
    private $id_distrito;
    private $nom_distrito;
    private $id_provincia; // Representa la relación con la tabla Provincia

    public function getIdDistrito() {
        return $this->id_distrito;
    }

    public function setIdDistrito($id_distrito) {
        $this->id_distrito = $id_distrito;
    }

    public function getNomDistrito() {
        return $this->nom_distrito;
    }

    public function setNomDistrito($nom_distrito) {
        $this->nom_distrito = $nom_distrito;
    }

    public function getIdProvincia() {
        return $this->id_provincia;
    }

    public function setIdProvincia($id_provincia) {
        $this->id_provincia = $id_provincia;
    }
}
