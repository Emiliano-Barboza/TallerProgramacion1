<?php
require_once('../dataAccess/UserDAO.php');
include_once("../config/config_SMARTY.php");

function confirmClients () {
    $userDAO = new UserDAO();
    $users = $userDAO->getUnconfirmedUsers();
    $scriptsSource = array('content/js/confirmClient.js');
    
    $smarty = getSmarty();
    $smarty->assign('pageTitle', 'Confirm clients');
    $smarty->assign('scriptsSource', $scriptsSource);
    $smarty->assign('users', $users);
    $smarty->display('confirmClients.tpl');
}

session_start();

if(isset($_SESSION['user']) && $_SESSION['user']['is_admin']){
    confirmClients();
} else {
    header('location:./index.php');
}
