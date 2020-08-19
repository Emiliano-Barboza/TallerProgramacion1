<?php
include_once('../config/configuracion.php');
include_once("../config/config_SMARTY.php");
require_once('../dataAccess/InstructorDAO.php');
require_once('../dataAccess/BookingDAO.php');

function getFullDate($date) {
    return date("l jS F Y", strtotime($date));
}

function getAvailableHours($date){
    $workingHours = range(BOOKING_FIRST_HOUR, BOOKING_LAST_HOUR, BOOKING_SESSION_HOUR);
    $bookingDAO = new BookingDAO();
    $bookings = $bookingDAO->getBookings($date);
    $bookedHours = array_map(function($booking) {
        return intval($booking['hora']);
    }, $bookings);
    
    return array_diff($workingHours, $bookedHours);
}

function getBooking($date, $smarty) {
    $bookings = null;
    $selectedDate = getFullDate($date);
    $availableHours = getAvailableHours($date);
    
    $smarty->assign('date', $date);
    $smarty->assign('selectedDate', $selectedDate);
    $smarty->assign('availableHours', $availableHours);
    $smarty->assign('pageTitle', 'Reserva de clase');
    $smarty->display('booking.tpl');
}

function getInstructors($smarty) {
    $bookings = null;
    $data = filter_input_array(INPUT_POST, [
        "fecha" => FILTER_SANITIZE_STRING,
        "hora"  => FILTER_SANITIZE_NUMBER_INT
    ]);
    $date = $data['fecha'];
    
    $selectedDate = getFullDate($date);
    $availableHours = getAvailableHours($date);
    
    $instructorDAO = new InstructorDAO();
    $instructors = $instructorDAO->getAvailableInstructors($date, $data['hora']);
    $scriptsSource = array('content/js/confirmBooking.js');
    
    $smarty->assign('date', $date);
    $smarty->assign('selectedDate', $selectedDate);
    $smarty->assign('user', $_SESSION['user']);
    $smarty->assign('selectedHour', $data['hora']);
    $smarty->assign('availableHours', $availableHours);
    $smarty->assign('instructors', $instructors);
    $smarty->assign('scriptsSource', $scriptsSource);
    $smarty->assign('pageTitle', 'Reserva de clase');
    $smarty->display('booking.tpl');
}

session_start();


if(isset($_SESSION['user']) && !$_SESSION['user']['is_admin']){
    $smarty = getSmarty();
    
    if (isset($_GET['date'])){
        getBooking($_GET['date'], $smarty);
    } else {
        getInstructors($smarty);
    }
} else {
    header('location:./index.php');
}
