<?php
include_once '../config/configuracion.php';
include_once("../config/config_SMARTY.php");
include_once("../components/Calendar.php");

$smarty = new Smarty();

$smarty->template_dir = TEMPLATE_DIR;
$smarty->compile_dir = COMPILER_DIR;
$smarty->config_dir = CONFIG_DIR;
$smarty->cache_dir = CACHE_DIR;

$month = date("n");
$year = date("Y");
$calendar = new Calendar();
$calendarData = $calendar->getCalendar($month, $year);

session_start();

if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];
    $smarty->assign('user', $user);
}

$smarty->assign('pageTitle', 'Pagina principal');
$smarty->assign('calendar', $calendarData);
$smarty->display('dashboard.tpl');
