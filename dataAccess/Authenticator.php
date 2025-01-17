<?php
require_once('UserDAO.php');
include_once('../config/configuracion.php');


class Authenticator {
    private $userDAO = null;
    
    public function __construct() {
        $this->userDAO = new UserDAO();
    }
    
    public function checkLogin($user, $password)  {
        $response = 'Invalid user.';
        $user = $this->userDAO->getUser($user);
        
        if($user && md5($password) === $user['password']) {
            if($user['usuario_tipo_id'] != UNCONFIRMED_USER) {
                $response = array(
                    'email'     => $user['email'],
                    'full_name' => $user['nombre'],
                    'is_admin'  => $user['usuario_tipo_id'] == ADMIN_USER,
                    'user_id'   => $user['usuario_id']
                );
            } else {
                $response = 'User not confirmed.';
            }
        }
        
        return $response;
    }
}
