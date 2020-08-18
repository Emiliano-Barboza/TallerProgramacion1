<?php
require_once('class.Conexion.BD.php');
include_once('../config/configuracion.php');
include_once('../utils/dbUtils.php');

class BookingDAO {
    private $connection = null;
    private $table = 'reservas';
    private $tablePublicFields = array('email', 'password', 'nombre', 'apellido',
        'ci', 'fecha_nacimiento', 'direccion', 'usuario_tipo_id');
    
    public function __construct() {
        $this->connection = new ConexionBD(ENGINE, SERVER_ADDRESS, DB_NAME, DB_USER, DB_USER_PASSWORD);
    }
    
    public function getLicensesToConfirm() {
        $query = "SELECT `usuario_id` FROM " . $this->table . " WHERE `usuario_id` NOT IN (SELECT `usuario_id` FROM `libretas`) Group by `usuario_id` having count(*) > " . MIN_BOOKINGS_TO_ALLOW_LICENSE;
        $this->connection->conectar();
        $response = $this->connection->consulta($query);
       
        if($response) {
            $response = $this->connection->siguienteRegistro();
        }
        $this->connection->desconectar();
        return $response;
    }
}
