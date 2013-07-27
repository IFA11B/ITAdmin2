<?php
class EditUser implements Page
{

    public function getTemplate()
    {
        return 'EditUser.tpl';
    }

    public function getContent()
    {
        if (isset($_POST['edituser']))
        {
            $user = R::load('user', postVar('id'));
            $user->name = postVar('username', $user->name);
            $user->createDate = postVar('createdate', $user->createDate);
            
            $newpw = postVar('password');
            if ($newpw != '') {
                $user->password = password_hash($newpw, PASSWORD_DEFAULT, array('cost' => PASSWORD_COST));
            }
            
            R::store($user);
        }
        else
        {
            $user = R::load('user', getVar('user'));
        }
        
        return array('id' => $user->id, 'name' => $user->name, 'date' => $user->createDate);
    }
}