<?php
require_once('../dataAccess/Authenticator.php');

$data = filter_input_array(INPUT_POST, [
    "user" => FILTER_SANITIZE_EMAIL,
    "password" => FILTER_SANITIZE_STRING
]);

$user = $data['user'];
$password = $data['password'];

$authenticator = new Authenticator();
$login = $authenticator->checkLogin($user, $password);

if(!is_string($login)){
    session_start();
    $_SESSION['user'] = $login;
    header('location:./index.php');
} else {
    header('location:./login.php?error=' . $login);
}
