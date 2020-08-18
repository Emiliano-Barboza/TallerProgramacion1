<?php
require_once('../dataAccess/Authenticator.php');

$safePost = filter_input_array(INPUT_POST, [
    "user" => FILTER_SANITIZE_EMAIL,
    "password" => FILTER_SANITIZE_STRING
]);

$user = $safePost['user'];
$password = $safePost['password'];// TODO: use md5 here?

$authenticator = new Authenticator();
$login = $authenticator->checkLogin($user, $password);

if(isset($login)){
    session_start();
    $_SESSION['user'] = $login;
    header('location:./index.php');
} else {
    header('location:./login.php?error=usuario inválido.');
}
