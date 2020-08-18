<?php
require_once('class.Conexion.BD.php');

class UserDAO {
    private $dbConnection = null;
    
    public function __construct() {
        $this->dbConnection = new ConexionBD('mysql', 'localhost', 'obligatorio', 'root', 'root');
    }
    
    public function getUser($email) {
        $query = "SELECT * FROM `usuarios` WHERE `email` LIKE '%" . $email . "%' LIMIT 0 , 30";
        
        $this->dbConnection->conectar();
        $response = $this->dbConnection->consulta($query);
        if($response) {
            $response = $this->dbConnection->siguienteRegistro();
        }
        $this->dbConnection->desconectar();
        return $response;
    }
}
