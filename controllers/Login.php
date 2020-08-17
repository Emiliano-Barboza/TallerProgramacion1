<?php

include_once '../config/configuracion.php';
include_once("../config/config_SMARTY.php");

$smarty = new Smarty();

$smarty->template_dir = TEMPLATE_DIR;
$smarty->compile_dir = COMPILER_DIR;
$smarty->config_dir = CONFIG_DIR;
$smarty->cache_dir = CACHE_DIR;

$month = date("n");//8; // TODO get dynamic
$year = date("Y");//2020; // TODO get dynamic
$calendar = new Calendar();
$calendarData = $calendar->getCalendar($month, $year);

$smarty->assign('month', $month);
$smarty->assign('year', $year);
$smarty->assign('calendar', $calendarData);
$smarty->display('dashboard.tpl');
