<?php
class Usuario {
    private $id_usuario;
    private $nombre;
    private $apellido;
    private $email;
    private $password;
    private $foto;
    private $id_nivel;
    private $id_distrito;

    // Getter para id_usuario
    public function getIdUsuario() {
        return $this->id_usuario;
    }

    // Setter para id_usuario
    public function setIdUsuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    // Getter para nombre
    public function getNombre() {
        return $this->nombre;
    }

    // Setter para nombre
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    // Getter para apellido
    public function getApellido() {
        return $this->apellido;
    }

    // Setter para apellido
    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    // Getter para email
    public function getEmail() {
        return $this->email;
    }

    // Setter para email
    public function setEmail($email) {
        $this->email = $email;
    }

    // Getter para password
    public function getPassword() {
        return $this->password;
    }

    // Setter para password
    public function setPassword($password) {
        $this->password = $password;
    }

    // Getter para foto
    public function getFoto() {
        return $this->foto;
    }

    // Setter para foto
    public function setFoto($foto) {
        $this->foto = $foto;
    }

    // Getter para id_nivel
    public function getIdNivel() {
        return $this->id_nivel;
    }

    // Setter para id_nivel
    public function setIdNivel($id_nivel) {
        $this->id_nivel = $id_nivel;
    }

    // Getter para id_distrito
    public function getIdDistrito() {
        return $this->id_distrito;
    }

    // Setter para id_distrito
    public function setIdDistrito($id_distrito) {
        $this->id_distrito = $id_distrito;
    }

    public function cargarDesdeArreglo( $data ) {
        $this->setIdUsuario($data['id_usuario']);
        $this->setNombre($data['nombre']);
        $this->setApellido($data['apellido']);
        $this->setEmail($data['email']);
        $this->setPassword($data['password']);
        $this->setFoto($data['foto']);
        $this->setIdNivel($data['id_nivel']);
        $this->setIdDistrito($data['id_distrito']);
    }

}