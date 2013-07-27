<?php
class AddUser implements Page {
    
    public function getTemplate() {
        return 'AddUser.tpl';
    }
    
    public function getContent() {
        if (isset($_POST['adduser'])) {
            $user = R::dispense('user');
            
            $user->name = postVar('username');
            $user->password = password_hash(postVar('password'), PASSWORD_DEFAULT, array('cost' => PASSWORD_COST));
            $user->createDate = R::isoDate();
            
            try {
                R::store($user);
            } catch (UserExists $e) {
                return array('success' => false);
            }
            return array('success' => true);
        }
        
        return array();
    }
}