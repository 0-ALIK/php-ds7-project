<?php
/**
 * Esta es una clase que utiliza el patrón de diseño Singletoon para obtener la instancia de una conexión a
 * la base de datos.
 */
class ConnectionDB {

    /** Es la instancia de la propia clase */
    private static $instance = null;
    private $servername = "localhost";
    private $username = "estudiante";
    private $password = "utp2022";
    private $database = "laboratoriodos";

    /** Es la instancia de la conexión a la base de datos */
    private $conn;

    private function __construct() {
        try {
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->database", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "NOOOOOO" . $e->getMessage();
        }
    }

    /**
     * Permite obtener la instancia de la clase ConnectionDB
     */
    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new ConnectionDB();
        }
        return self::$instance;
    }

    /**
     * Permite obtener la instancia de la conexión a la base de datos
     */
    public function getConnection(): PDO {
        return $this->conn;
    }

    /**
     * Permite cerrar la conexión a la base de datos
     */
    public function closeConnection() {
        $this->conn = null;
    }
}