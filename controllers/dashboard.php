<?php
include_once '../config/configuracion.php';
include_once("../config/config_SMARTY.php");
include_once("../components/Calendar.php");
require_once('../dataAccess/BookingDAO.php');

$month = date("n");
$year = date("Y");
$bookingDAO = new BookingDAO();
$bookings = $bookingDAO->getBookingOfMonth($month, $year);

$calendar = new Calendar();
$calendarData = $calendar->getCalendar($month, $year, $bookings);
$cssSources = array('content/css/calendar.css');


session_start();

$smarty = getSmarty();

if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];
    $smarty->assign('user', $user);
}

$smarty->assign('pageTitle', 'Pagina principal');
$smarty->assign('cssSources', $cssSources);
$smarty->assign('calendar', $calendarData);
$smarty->display('dashboard.tpl');
