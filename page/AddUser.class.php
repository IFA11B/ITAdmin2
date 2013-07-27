<?php
class AddUser implements Page {
    
    public function getTemplate() {
        return 'AddUser.tpl';
    }
    
    public function getContent() {
        if (isset($_POST['adduser'])) {
            $userName = trim(postVar('username'));
            $password = trim(postVar('password'));
            
            if ($userName != '' && $password != '')
            {
                $user = R::dispense('user');
                $user->name = $userName;
                $user->password = password_hash($password, PASSWORD_DEFAULT, array('cost' => PASSWORD_COST));
                $user->createDate = R::isoDate();
                R::store($user);
                return array('success' => true);
            }
        }
        
        return array();
    }
}