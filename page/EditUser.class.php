<?php
addPageClass('EditUser');
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
                // turn moduleid into a module bean
                $module = R::load('module', $moduleid);
                
                // find privilege bean for user and module, or create a new one if it doesnt exist yet
                $privilege = Privilege::find($user, $module);
                
                // grant read rights to user for module
                $privilege->canRead = true;
                
                // store changes
                R::store($privilege);
            }
            
            foreach (postVar('write') as $moduleid) {
                // turn moduleid into a module bean
                $module = R::load('module', $moduleid);
            
                // find privilege bean for user and module, or create a new one if it doesnt exist yet
                $privilege = Privilege::find($user, $module);
            
                // grant read rights to user for module
                $privilege->canWrite = true;
            
                // store changes
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