<?php
require_once('UserDAO.php');


class Authenticator {
    private $userDAO = null;
    
    public function __construct() {
        $this->userDAO = new UserDAO();
    }
    
    public function checkLogin($user, $password)  {
        $response = null;
        $user = $this->userDAO->getUser($user);
        if($user) {
            if(md5($password) === $user['password']) {
                $response = array(
                    'email' => $user['email'],
                    'full_name' => $user['nombre'] . ' ' . $user['apellido']
                );
            }
        }
        
        return $response;
    }
}
