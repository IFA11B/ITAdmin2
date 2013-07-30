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
            $page = getVar('page');
            $module = getVar('module');
            
            $newPage = 'Home';
            if (strlen($module) > 0) {
                $newPage = $module . '/';
                
                if (strlen($page) > 0) {
                    $newPage .= $page;
                }
            } elseif (strlen($page) > 0) {
                $newPage = $page;
            }
            header('Location: /' . RELATIVE_PATH . $newPage);
        }
        
        return array();
    }
}