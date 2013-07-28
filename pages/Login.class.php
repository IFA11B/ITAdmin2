<?php
addPageClass('Login');

class Login implements Page {
    public function getTemplate() {
        return 'Login.tpl';
    }
    
    public function getContent() {
        if (isset($_POST['login'])) {
            $userName = postVar('username');
            $password = postVar('password');
            
            $user = R::findOne('user', 'name = ?', array($userName));
            if ($user->verifyPassword($password)) {
                $_SESSION['user'] = $user->id;
                $_SESSION['userAddr'] = $_SERVER['REMOTE_ADDR'];
            } else {
                return array('success' => false);
            }
        }
        
        if (verifySession()) {
            header('Location: /' . RELATIVE_PATH . 'Home');
        }
        
        return array();
    }
}