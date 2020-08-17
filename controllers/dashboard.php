<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 
 * 
 */
include_once '../config/configuracion.php';
include_once("../config/config_SMARTY.php");
include_once("../components/Calendar.php");

$smarty = new Smarty();

$smarty->template_dir = TEMPLATE_DIR;
$smarty->compile_dir = COMPILER_DIR;
$smarty->config_dir = CONFIG_DIR;
$smarty->cache_dir = CACHE_DIR;

$amountOfWeeks = 6;
$month = 8; // TODO get dynamic
$daysInMonth = 30; // TODO get dynamic
$year = 2020; // TODO get dynamic
$calendar = new Calendar();
$weeks = $calendar->getCalendarWeeks($month, $year);
$calendarData = array(
    'weeks' => $weeks
);

$smarty->assign('amountOfWeeks', $amountOfWeeks);
$smarty->assign('month', $month);
$smarty->assign('daysInMonth', $daysInMonth);
$smarty->assign('year', $year);
$smarty->assign('calendar', $calendarData);
$first = date("l", strtotime("first day of this month"));
$smarty->assign('firstDay', $first);

$smarty->display('dashboard.tpl');
