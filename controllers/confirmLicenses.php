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
        $licenseUsers = array_shift($licenses);
        $users = $userDAO->getUsers(array_values($licenseUsers));
    }
    
    $smarty = getSmarty();
    $smarty->assign('pageTitle', 'Confirm Licenses');
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
