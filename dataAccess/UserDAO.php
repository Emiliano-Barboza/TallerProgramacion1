<?php
require_once('class.Conexion.BD.php');
include_once('../config/configuracion.php');
include_once('../utils/dbUtils.php');

class UserDAO {
    private $connection = null;
    private $table = 'usuarios';
    private $tablePublicFields = array('email', 'password', 'nombre', 'apellido',
        'ci', 'fecha_nacimiento', 'direccion', 'usuario_tipo_id');
    
    public function __construct() {
        $this->connection = new ConexionBD(ENGINE, SERVER_ADDRESS, DB_NAME, DB_USER, DB_USER_PASSWORD);
    }
    
    public function confirmClient($id) {
        $query = "UPDATE " . $this->table . " "
                . "SET usuario_tipo_id = " . CLIENT_USER . " "
                . "WHERE usuario_id = " . $id . ";";
        $this->connection->conectar();
        $response = $this->connection->consulta($query);
       
        if($response) {
            $response = $this->connection->siguienteRegistro();
        }
        $this->connection->desconectar();
        return $response;
    }
    
    public function getUnconfirmedUsers() {
        $query = "SELECT * "
                . "FROM " . $this->table . " "
                . "WHERE `usuario_tipo_id` =" . UNCONFIRMED_USER . " LIMIT 0 , 30";
        
        $this->connection->conectar();
        $response = $this->connection->consulta($query);
        if($response) {
            $response = $this->connection->restantesRegistros();
        }
        $this->connection->desconectar();
        return $response;
    }
    
    public function getUser($email) {
        $query = "SELECT * "
                . "FROM " . $this->table . " "
                . "WHERE `email` LIKE '%" . $email . "%' LIMIT 0 , 30";
        
        $this->connection->conectar();
        $response = $this->connection->consulta($query);
        if($response) {
            $response = $this->connection->siguienteRegistro();
        }
        $this->connection->desconectar();
        return $response;
    }
    
    public function getUsers($users) {
        $query = "SELECT * "
                . "FROM " . $this->table . " "
                . "WHERE `usuario_id` IN (" . implode(", ", $users) . ") LIMIT 0 , 30";
        
        $this->connection->conectar();
        $response = $this->connection->consulta($query);
        if($response) {
            $response = $this->connection->restantesRegistros();
        }
        $this->connection->desconectar();
        return $response;
    }
    
    public function registerUser($data) {
        $response = null;
        $user = $this->getUser($data['email']);
        
        if (!$user) {
            $data['usuario_tipo_id'] = UNCONFIRMED_USER;
            $data['password'] = md5($data['password']);
            sort($this->tablePublicFields);
            ksort($data);
            $values = dbUtils::convertArrayToQueryValues(array_values($data));
            $query = "INSERT INTO " . $this->table . " (" . implode(", ", $this->tablePublicFields) . ") " .
                    "VALUES (" . $values  . ")";
            
            $this->connection->conectar();
            $response = $this->connection->consulta($query);
            
            if($response) {
                $response = $this->getUser($data['email']);
            } else {
                $response = $this->connection->ultimoError();
            }
            
            $this->connection->desconectar();
        } else {
            $response = 'User already exists.';
        }
        return $response;
    }
}
