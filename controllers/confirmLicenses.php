<?php
require_once('../dataAccess/BookingDAO.php');
require_once('../dataAccess/UserDAO.php');
include_once("../config/config_SMARTY.php");

function confirmLicenses () {
    $users = array();
    $bookingDAO = new BookingDAO();
    $licenses = $bookingDAO->getLicensesToConfirm();
    $scriptsSource = array('content/js/confirmLicense.js');
    
    if (is_array($licenses)) {
        $userDAO = new UserDAO();
        $users = $userDAO->getUsers(array_values($licenses));
    }
    
    $smarty = getSmarty();
    $smarty->assign('pageTitle', 'Confirmación de licencias');
    $smarty->assign('scriptsSource', $scriptsSource);
    $smarty->assign('users', $users);
    $smarty->display('confirmLicenses.tpl');
}

session_start();

if(isset($_SESSION['user']) && $_SESSION['user']['is_admin']){
    confirmLicenses();
} else {
    header('location:./index.php');
}
