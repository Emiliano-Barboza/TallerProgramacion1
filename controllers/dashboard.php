<?php
include_once '../config/configuracion.php';
include_once("../config/config_SMARTY.php");
include_once("../components/Calendar.php");
require_once('../dataAccess/BookingDAO.php');

$month = date("n");
$year = date("Y");

if(isset($_GET['month'])) {
    $month = $_GET['month'];
}
if(isset($_GET['year'])) {
    $year = $_GET['year'];
}

$bookingDAO = new BookingDAO();
$bookings = $bookingDAO->getBookingOfMonth($month, $year);

$calendar = new Calendar();
$calendarData = $calendar->getCalendar($month, $year, $bookings);
$cssSources = array('content/css/calendar.css');
$scriptsSource = array('content/js/calendar.js');

session_start();

$smarty = getSmarty();

if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];
    $smarty->assign('user', $user);
}

$smarty->assign('pageTitle', 'Pagina principal');
$smarty->assign('cssSources', array_merge($cssSources, $smarty->getTemplateVars('cssSources')));
$smarty->assign('scriptsSource', $scriptsSource);
$smarty->assign('calendar', $calendarData);
$smarty->display('dashboard.tpl');
