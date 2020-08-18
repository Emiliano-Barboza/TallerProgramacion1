<?php
require_once('../dataAccess/LicenseDAO.php');
include_once("../config/config_SMARTY.php");

function confirmLicense () {
    $str_json = file_get_contents('php://input');
    $data = json_decode($str_json);
    
    $licenseDAO = new LicenseDAO();
    $user = $licenseDAO->confirmLicense($data->usuario_id);
    echo $user;
}

session_start();

if(isset($_SESSION['user']) && $_SESSION['user']['is_admin']){
    confirmLicense();
} else {
    header('location:./index.php');
}
