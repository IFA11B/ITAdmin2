<?php
addPageClass('EditUser');
moduleAddPage('Users', 'EditUser', 'Edit');
class EditUser implements Page {

    public function getTemplate() {
        return 'EditUser.tpl';
    }

    public function getContent() {
        if (isset($_POST['edituser'])) {
            $user = R::load('user', postVar('id'));
            $user->name = postVar('username', $user->name);
            $user->createDate = postVar('createdate', $user->createDate);
            
            $newpw = postVar('password');
            if ($newpw != '') {
                $user->password = password_hash($newpw, PASSWORD_DEFAULT, array('cost' => PASSWORD_COST));
            }
            
            foreach (postVar('read') as $moduleid) {
                $module = R::load('module', $moduleid);
                $privilege = Privilege::find($user, $module);
                $privilege->canRead = true;
                R::store($privilege);
            }
            
            foreach (postVar('write') as $moduleid) {
                $module = R::load('module', $moduleid);
                $privilege = Privilege::find($user, $module);
                $privilege->canWrite = true;
                R::store($privilege);
            }
            
            R::store($user);
        } else {
            $user = R::load('user', getVar('user'));
        }
        
        $result = array();
        $moduleArray = array();
        $modules = R::findAll('module');
        
        foreach ($modules as $module) {
            $privilege = Privilege::find($user, $module);

            $moduleArray[] = array(
                'id' => $module->id,
                'name' => $module->name,
                'read' => $privilege->canRead,
                'write' => $privilege->canWrite);
        }
        
        $result['modules'] = $moduleArray;
        $result['id'] = $user->id;
        $result['name'] = $user->name;
        $result['date'] = $user->createDate;
        
        return $result;
    }
}