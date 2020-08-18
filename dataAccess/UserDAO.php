<?php
require_once('class.Conexion.BD.php');

class UserDAO {
    private $connection = null;
    private $table = 'usuarios';
    private $tablePublicFields = array('email', 'password', 'nombre', 'apellido',
        'ci', 'fecha_nacimiento', 'direccion', 'usuario_tipo_id');
    
    
    public function __construct() {
        $this->connection = new ConexionBD('mysql', 'localhost', 'obligatorio', 'root', 'root');
    }
    
    private function convertArrayToQueryValues($data){
        $values = '';
        
        foreach ($data as $value) {
            if (is_string($value)) {
                $values .= '"' . $value . '"';
            } else {
                $values .= $value;
            }
            $values .= ",";
        }
        return rtrim($values, ",");
    }
    
    public function getUser($email) {
        $query = "SELECT * FROM " . $this->table . " WHERE `email` LIKE '%" . $email . "%' LIMIT 0 , 30";
        
        $this->connection->conectar();
        $response = $this->connection->consulta($query);
        if($response) {
            $response = $this->connection->siguienteRegistro();
        }
        $this->connection->desconectar();
        return $response;
    }
    
    public function registerUser($data) {
        $response = null;
        $user = $this->getUser($data['email']);
        
        if (!$user) {
            $data['usuario_tipo_id'] = 2; // TODO: Convert to constant
            $data['password'] = md5($data['password']);
            sort($this->tablePublicFields);
            ksort($data);
            $values = $this->convertArrayToQueryValues(array_values($data));
            $query = "INSERT INTO " . $this->table . " (" . implode(", ", $this->tablePublicFields) . ") " .
                    "VALUES (" . $values  . ")";
            
            $this->connection->conectar();
            $response = $this->connection->consulta($query);
            $this->connection->desconectar();
            if($response) {
                $response = $this->getUser($data['email']);
            }
        } else {
            $response = 'El usuario ya existe.';
        }
        return $response;
    }
}
