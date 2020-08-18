<?php
require_once('../dataAccess/InstructorDAO.php');
$data = filter_input_array(INPUT_POST, [
    "nombre"              => FILTER_SANITIZE_STRING,
    "apellido"          => FILTER_SANITIZE_STRING,
    "ci"    => FILTER_SANITIZE_STRING,
    "fecha_nacimiento"          => FILTER_SANITIZE_STRING,
    "vencimiento"           => FILTER_SANITIZE_STRING
]);

$instructorDAO = new InstructorDAO();
$response = $instructorDAO->registerInstructor($data);
    
if(!is_string($response)){
    header('location:./index.php');
} else {
    header('location:./registerStaff.php?error=' . $response);
}