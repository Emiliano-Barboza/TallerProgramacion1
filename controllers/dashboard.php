<?php
include_once '../config/configuracion.php';
include_once("../config/config_SMARTY.php");
include_once("../components/Calendar.php");

$month = date("n");
$year = date("Y");
$calendar = new Calendar();
$calendarData = $calendar->getCalendar($month, $year);

session_start();

$smarty = getSmarty();

if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];
    $smarty->assign('user', $user);
}

$smarty->assign('pageTitle', 'Pagina principal');
$smarty->assign('calendar', $calendarData);
$smarty->display('dashboard.tpl');
