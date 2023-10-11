<?php
class Provincia {
    private $id_provincia;
    private $nom_provincia;

    public function getIdProvincia() {
        return $this->id_provincia;
    }

    public function setIdProvincia($id_provincia) {
        $this->id_provincia = $id_provincia;
    }

    public function getNomProvincia() {
        return $this->nom_provincia;
    }

    public function setNomProvincia($nom_provincia) {
        $this->nom_provincia = $nom_provincia;
    }
}
