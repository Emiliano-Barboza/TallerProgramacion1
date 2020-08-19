<?php
require_once('class.Conexion.BD.php');
include_once('../config/configuracion.php');
include_once('../utils/dbUtils.php');

class BookingDAO {
    private $connection = null;
    private $table = 'reservas';
    private $userTable = 'usuarios';
    private $tablePublicFields = array('fecha', 'hora', 'instructor_id', 'usuario_id');
    
    public function __construct() {
        $this->connection = new ConexionBD(ENGINE, SERVER_ADDRESS, DB_NAME, DB_USER, DB_USER_PASSWORD);
    }
    
    public function confirmBooking($bookingData){
        sort($this->tablePublicFields);
        ksort($bookingData);
        $values = dbUtils::convertArrayToQueryValues(array_values($bookingData));
        $query = "INSERT INTO " . $this->table . " (" . implode(", ", $this->tablePublicFields) . ") " .
                "VALUES (" . $values  . ")";
        
        var_dump($query);
        
        $this->connection->conectar();
        $response = $this->connection->consulta($query);
        
        if($response) {
            $response = $this->connection->ultimoIdInsert();
        }
        $this->connection->desconectar();
        
        return $response;
    }
    
    public function getLicensesToConfirm() {
        $query = "SELECT `usuario_id` FROM " . $this->table . " WHERE `usuario_id` NOT IN (SELECT `usuario_id` FROM `libretas`) Group by `usuario_id` having count(*) > " . MIN_BOOKINGS_TO_ALLOW_LICENSE;
        $this->connection->conectar();
        $response = $this->connection->consulta($query);
       
        if($response) {
            $response = $this->connection->restantesRegistros();
        }
        $this->connection->desconectar();
        return $response;
    }
    
    public function getBookings($date = null, $instructorId = null) {
        if(!isset($date)) {
            $date = date("Y-m-d");
        }
        
        $query = "SELECT `nombre`, `apellido`, `direccion`, `hora`  FROM " . $this->table . 
                " as r, " . $this->userTable . " as u WHERE r.usuario_id = u.usuario_id && `fecha` = '" . 
                $date . "' ORDER BY `hora`, `nombre`, `direccion`" ;
        
        if(isset($instructorId)) {
            $query .= " AND `instructor_id` = " . $instructorId;
        }
        $this->connection->conectar();
        $response = $this->connection->consulta($query);
       
        if($response) {
            $response = $this->connection->restantesRegistros();
        }
        $this->connection->desconectar();
        return $response;
    }
    
    public function getBookingOfMonth($month, $year) {
        $date = $year . '-' . $month . '-' . 1;
        $query = "SELECT r.fecha, count(*) as inscriptos, IF(r.usuario_id IS NULL, FALSE, TRUE) as licencias "
                . "FROM `reservas` as r "
                . "LEFT JOIN `libretas`  as l ON (r.usuario_id = l.usuario_id) "
                . "WHERE r.fecha BETWEEN CAST('" . $date . "' AS DATE) AND LAST_DAY('" . $date . "') "
                . "GROUP BY r.fecha ";
        
        $this->connection->conectar();
        $response = $this->connection->consulta($query);
       
        if($response) {
            $response = $this->connection->restantesRegistros();
        }
        $this->connection->desconectar();
        return $response;
    }
}
