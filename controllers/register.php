<?php

include_once '../config/configuracion.php';
include_once("../config/config_SMARTY.php");

$smarty = getSmarty();

if(isset($_GET['error'])) {
    $smarty->assign('error', $_GET['error']);
}

$smarty->assign('pageTitle', 'Sign up');
$smarty->display('register.tpl');
