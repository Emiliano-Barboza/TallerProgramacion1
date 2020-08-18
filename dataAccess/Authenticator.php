<?php
require_once('UserDAO.php');


class Authenticator {
    private $userDAO = null;
    
    public function __construct() {
        $this->userDAO = new UserDAO();
    }
    
    public function checkLogin($user, $password)  {
        $response = 'Usuario inválido.';
        $user = $this->userDAO->getUser($user);
        
        if($user && md5($password) === $user['password']) {
            if($user['usuario_tipo_id'] != 2) {
                $response = array(
                    'email' => $user['email'],
                    'full_name' => $user['nombre'],
                    'is_admin' => $user['usuario_tipo_id'] == 1
                );
            } else {
                $response = 'Usuario no confirmado.';
            }
        }
        
        return $response;
    }
}
