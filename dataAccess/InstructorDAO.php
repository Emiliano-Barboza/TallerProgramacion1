<?php
require_once('class.Conexion.BD.php');
include_once('../config/configuracion.php');
include_once('../utils/dbUtils.php');

class InstructorDAO {
    private $connection = null;
    private $table = 'instructores';
    private $bookingTable = 'reservas';
    private $tablePublicFields = array('nombre', 'apellido', 'ci',
        'fecha_nacimiento', 'vecimiento');
    
    
    public function __construct() {
        $this->connection = new ConexionBD(ENGINE, SERVER_ADDRESS, DB_NAME, DB_USER, DB_USER_PASSWORD);
    }
    
    public function getAvailableInstructors($date = null, $hour = null) {
        $extraQuery = '';
        if(!isset($date)) {
            $date = date("Y-m-d");
        }
        if(isset($hour)) {
            $extraQuery =  " AND `hora` = " . $hour;
        }
        $query = "SELECT * FROM " . $this->table . " as i WHERE i.instructor_id NOT IN (SELECT `instructor_id` FROM " . 
                $this->bookingTable . " WHERE `fecha` = " . $date . $extraQuery . ")";
        
        $this->connection->conectar();
        $response = $this->connection->consulta($query);
       
        if($response) {
            $response = $this->connection->restantesRegistros();
        }
        $this->connection->desconectar();
        return $response;
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
    
    public function getInstructors() {
        $query = "SELECT * FROM " . $this->table . " LIMIT 0 , 30";
        
        $this->connection->conectar();
        $response = $this->connection->consulta($query);
        if($response) {
            $response = $this->connection->restantesRegistros();
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
