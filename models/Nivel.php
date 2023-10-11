<?php
class Nivel {
    private $id_nivel;
    private $nom_nivel;

    public function getIdNivel() {
        return $this->id_nivel;
    }

    public function setIdNivel($id_nivel) {
        $this->id_nivel = $id_nivel;
    }

    public function getNomNivel() {
        return $this->nom_nivel;
    }

    public function setNomNivel($nom_nivel) {
        $this->nom_nivel = $nom_nivel;
    }
}
