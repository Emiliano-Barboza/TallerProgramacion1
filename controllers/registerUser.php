<?php
require_once('../dataAccess/UserDAO.php');
$data = filter_input_array(INPUT_POST, [
    "email"             => FILTER_SANITIZE_EMAIL,
    "nombre"              => FILTER_SANITIZE_STRING,
    "apellido"          => FILTER_SANITIZE_STRING,
    "ci"    => FILTER_SANITIZE_STRING,
    "fecha_nacimiento"          => FILTER_SANITIZE_STRING,
    "direccion"           => FILTER_SANITIZE_STRING,
    "password"          => FILTER_SANITIZE_STRING
]);

$userDAO = new UserDAO();
$response = $userDAO->registerUser($data);
    
if(!is_string($response)){
    header('location:./login.php');
} else {
    header('location:./register.php?error=' . $response);
}