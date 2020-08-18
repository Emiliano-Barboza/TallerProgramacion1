<?php
include_once '../config/configuracion.php';
include_once("../config/config_SMARTY.php");

function showLogin(){
    $smarty = getSmarty();
    if(isset($_GET['error'])) {
        $smarty->assign('error', $_GET['error']);
    }   

    $smarty->assign('pageTitle', 'Página de inicio');
    $smarty->display('login.tpl');
}

session_start();

if(isset($_SESSION['user'])){
    header('location:./index.php');
} else {
    showLogin();
}


