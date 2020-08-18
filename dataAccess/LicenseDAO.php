<?php
require_once('class.Conexion.BD.php');
include_once('../config/configuracion.php');
include_once('../utils/dbUtils.php');

class LicenseDAO {
    private $connection = null;
    private $table = 'libretas';
    private $tablePublicFields = array('fecha', 'usuario_id');
    
    public function __construct() {
        $this->connection = new ConexionBD(ENGINE, SERVER_ADDRESS, DB_NAME, DB_USER, DB_USER_PASSWORD);
    }
    
    public function confirmLicense($id) {
        $date = date("Y-m-d");
        $values = "'" . $date . "', " . $id;
        $query = "INSERT INTO " . $this->table . " (" . implode(", ", $this->tablePublicFields) . ") " .
                    "VALUES (" . $values  . ")";
        
        $this->connection->conectar();
        $response = $this->connection->consulta($query);
       
        if($response) {
            $response = $this->connection->siguienteRegistro();
        }
        $this->connection->desconectar();
        return $response;
    }
}
