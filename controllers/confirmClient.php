<?php
require_once('../dataAccess/UserDAO.php');
include_once("../config/config_SMARTY.php");

function confirmClient () {
    $str_json = file_get_contents('php://input');
    $data = json_decode($str_json);
    
    $userDAO = new UserDAO();
    $user = $userDAO->confirmClient($data->usuario_id);
    echo $user;
}

session_start();

if(isset($_SESSION['user']) && $_SESSION['user']['is_admin']){
    confirmClient();
} else {
    header('location:./index.php');
}
