<?php
require_once('../dataAccess/BookingDAO.php');
include_once("../config/config_SMARTY.php");

function confirmBooking () {
    $str_json = file_get_contents('php://input');
    $data = json_decode($str_json);
    $bookingData = (array) $data;
    
    $bookingDAO = new BookingDAO();
    $booking = $bookingDAO->confirmBooking($bookingData);
    echo $booking;
}

session_start();

if(isset($_SESSION['user']) && !$_SESSION['user']['is_admin']){
    confirmBooking();
} else {
    header('location:./index.php');
}
