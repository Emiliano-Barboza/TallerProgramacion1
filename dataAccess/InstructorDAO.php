<?php
require_once('class.Conexion.BD.php');
include_once('../config/configuracion.php');
include_once('../utils/dbUtils.php');

class InstructorDAO {
    private $connection = null;
    private $table = 'instructores';
    private $tablePublicFields = array('nombre', 'apellido', 'ci',
        'fecha_nacimiento', 'vecimiento');
    
    
    public function __construct() {
        $this->connection = new ConexionBD(ENGINE, SERVER_ADDRESS, DB_NAME, DB_USER, DB_USER_PASSWORD);
    }
    
    public function getInstructor($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE `instructor_id` = " . $id;
        
        $this->connection->conectar();
        $response = $this->connection->consulta($query);
        if($response) {
            $response = $this->connection->siguienteRegistro();
        }
        $this->connection->desconectar();
        return $response;
    }
    
    public function registerInstructor($data) {
        sort($this->tablePublicFields);
        ksort($data);
        $values = dbUtils::convertArrayToQueryValues(array_values($data));
        $query = "INSERT INTO " . $this->table . " (" . implode(", ", $this->tablePublicFields) . ") " .
                "VALUES (" . $values  . ")";

        $this->connection->conectar();
        $response = $this->connection->consulta($query);
        
        if($response) {
            $id = $this->connection->ultimoIdInsert();
            $response = $this->getInstructor($id);
        } else {
            $response = $this->connection->ultimoError();
        }
        $this->connection->desconectar();
        
        return $response;
    }
}
