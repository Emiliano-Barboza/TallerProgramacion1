<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 
 * 
 */

function getMonthStartOffset($month){
    
}

include_once("../config/config_SMARTY.php");
$smarty = new Smarty();

$smarty->template_dir = TEMPLATE_DIR;
$smarty->compile_dir = COMPILER_DIR;
$smarty->config_dir = CONFIG_DIR;
$smarty->cache_dir = CACHE_DIR;

$amountOfWeeks = 6;
$daysOfWeek = array('Monday', 'Tuesday', 'Wednesdy', 'Thursday', 'Friday', 'Saturday', 'Sunday');
$month = 'August'; // TODO get dynamic
$daysInMonth = 30; // TODO get dynamic
$year = 2020; // TODO get dynamic
$firstMonthDay = strtotime('first day of this month', time());
$calendar = array(
    array(
        array('title' => 'Monday'), 
        array('title' => 'Tuesday'), 
        array('title' => 'Wednesdy'), 
        array('title' => 'Thursday'), 
        array('title' => 'Friday'), 
        array('title' => 'Saturday'), 
        array('title' => 'Sunday')
        ),
    array(
        array('title' => '1'), 
        array('title' => '2'), 
        array('title' => '3'), 
        array('title' => '4'), 
        array('title' => '5'), 
        array('title' => '6'), 
        array('title' => '7')
        ),
    array(
        array('title' => '8'), 
        array('title' => '9'), 
        array('title' => '10'), 
        array('title' => '11'), 
        array('title' => '12'), 
        array('title' => '13'), 
        array('title' => '14')
        ),
    array(
        array('title' => '15'), 
        array('title' => '16'), 
        array('title' => '17'), 
        array('title' => '18'), 
        array('title' => '19'), 
        array('title' => '20'), 
        array('title' => '21')
        ),
    array(
        array('title' => '22'), 
        array('title' => '23'), 
        array('title' => '24'), 
        array('title' => '25'), 
        array('title' => '26'), 
        array('title' => '27'), 
        array('title' => '28')
        ),
    array(
        array('title' => '29'), 
        array('title' => '30'), 
        array('title' => '31'), 
        array('title' => '1'), 
        array('title' => '2'), 
        array('title' => '3'), 
        array('title' => '4')
        )
);

$smarty->assign('amountOfWeeks', $amountOfWeeks);
$smarty->assign('daysOfWeek', $daysOfWeek);
$smarty->assign('month', $month);
$smarty->assign('daysInMonth', $daysInMonth);
$smarty->assign('year', $year);
$smarty->assign('firstMonthDay', $firstMonthDay);
$smarty->assign('calendar', $calendar);

$smarty->display('dashboard.tpl');
