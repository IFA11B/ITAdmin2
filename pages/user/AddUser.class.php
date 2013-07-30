<?php
addPageClass('AddUser');
moduleAddPage('Users', 'AddUser', 'Add');
class AddUser implements Page {
    
    public function getTemplate() {
        return 'AddUser.tpl';
    }
    
    public function getContent() {
        $result = array();
        
        if (isset($_POST['adduser'])) {
            $user = R::dispense('user');
            
            $user->name = postVar('username');
            $user->password = password_hash(postVar('password'), PASSWORD_DEFAULT, array('cost' => PASSWORD_COST));
            $user->createDate = R::isoDate();
            
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
            
            try {
                R::store($user);
                $result['success'] = true;
            } catch (UserExists $e) {
                $result['success'] = false;
            }
            
            $_POST = array();
        }
        
        $modules = R::findAll('module');
        $moduleArray = array();
        
        foreach ($modules as $module) {
            $moduleArray[] = array(
                'id' => $module->id,
                'name' => $module->name,
                'read' => $module->defaultRead,
                'write' => $module->defaultWrite);
        }
        
        return array('modules' => $moduleArray);
    }
}