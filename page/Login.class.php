<?php
class Login implements Page {
    public function getTemplate() {
        return 'Login.tpl';
    }
    
    public function getContent() {
        if (isset($_POST['login'])) {
            $userName = trim(postVar('username'));
            $password = trim(postVar('password'));
            
            if ($userName != '' && $password != '')
            {
                $user = R::findOne('user', 'name = ?', array($userName));
                if ($user->verifyPassword($password)) {
                    $_SESSION['user'] = $user->id;
                    header('Location: index.php?page=Home');
                }
                return array('success' => false);
            }
        }
        
        return array();
    }
}