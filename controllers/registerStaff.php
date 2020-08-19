<?php
include_once('../config/configuracion.php');
include_once("../config/config_SMARTY.php");

function registerStaff() {
    $smarty = getSmarty();
    
    if(isset($_GET['error'])) {
        $smarty->assign('error', $_GET['error']);
    }

    $smarty->assign('pageTitle', 'Regist instructor');
    $smarty->display('registerStaff.tpl');
}

session_start();

if(isset($_SESSION['user']) && $_SESSION['user']['is_admin']){
    registerStaff();
} else {
    header('location:./index.php');
}
