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
            $user->password = password_hash(postVar('password'), PASSWORD_DEFAULT, array('cost' => PASSWORD_COST));
            $user->createDate = postVar('date', $user->createDate);
            R::store($user);
        }
        else
        {
            $user = R::load('user', getVar('user'));
        }
        
        return array('id' => $user->id, 'name' => $user->name, 'date' => $user->createDate);
    }
}