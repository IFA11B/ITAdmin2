<?php
addPageClass('EditUser');

class EditUser implements Page {

    public function getTemplate() {
        return 'EditUser.tpl';
    }

    public function getContent() {
        $result = array();
        
        if (isset($_POST['edituser'])) {
            $user = R::load('user', postVar('id'));
            $user->name = postVar('username', $user->name);
            $user->createDate = postVar('createdate', $user->createDate);
            
            $newpw = postVar('password');
            if ($newpw != '') {
                $user->password = password_hash($newpw, PASSWORD_DEFAULT, array('cost' => PASSWORD_COST));
            }
            
            $modules = R::findAll('modules');
            $moduleArray = array();
            
            foreach ($modules as $module) {
                // find existing link between user and module
                $link = R::findOne(
                    'link_user_module',
                    ' user = :user AND module = :module ',
                    array(':user' => $user->id, 'module' => $module->id));
                
                if ($link == null) {
                    // link between user and module doesnt exist yet, so lets create one
                    $link = R::dispense('link_user_module');
                    
                    $link->user = $user;
                    $link->module = $module;
                    $link->canRead = $module->defaultRead;
                    $link->canWrite = $module->defaultWrite;
                    
                    // we store now so $link has a valid id (non-zero), which we need for editing the user.
                    R::store($link);
                }
                
                // at this point we have a valid link object
                // ... hopefully
                

                $moduleArray[] = array('module' => $module->id, 'name' => $module->name, 'read' => $link->canRead,
                    'write' => $link->canWrite);
            }
            
            $result['modules'] = $moduleArray;
            
            R::store($user);
        } else {
            $user = R::load('user', getVar('user'));
        }
        
        $result['id'] = $user->id;
        $result['name'] = $user->name;
        $result['date'] = $user->createDate;
        
        return $result;
    }
}