<?php
include_once('../config/configuracion.php');
include_once("../config/config_SMARTY.php");
require_once('../dataAccess/InstructorDAO.php');
require_once('../dataAccess/BookingDAO.php');

function getBookings() {
    $bookings = null;
    $smarty = getSmarty();
    $data = filter_input_array(INPUT_POST, [
        "fecha"                 => FILTER_SANITIZE_STRING,
        "instructor_id"         => FILTER_SANITIZE_NUMBER_INT
    ]);
    
    $instructorDAO = new InstructorDAO();
    $instructors = $instructorDAO->getInstructors();
    $cssSources = array('content/css/booking.css');
    
    if (isset($data)) {
        $bookingDAO = new BookingDAO();
        $bookings = $bookingDAO->getBookings($data['fecha'], $data['instructor_id']);
        $smarty->assign('bookings', $bookings);
    }

    $smarty->assign('pageTitle', 'Listado de clases');
    $smarty->assign('instructors', $instructors);
    $smarty->assign('cssSources', $cssSources);
    $smarty->assign('pageTitle', 'Listado de clases');
    $smarty->display('bookings.tpl');
}

session_start();

if(isset($_SESSION['user']) && $_SESSION['user']['is_admin']){
    getBookings();
} else {
    header('location:./index.php');
}
