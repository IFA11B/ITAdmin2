<?php
class NavBar implements Page {

    public function getTemplate() {
        return '';
    }

    public function getContent() {
        $modules = R::findAll('module');
        $user = R::findOne('user', 'id = ?', array(sessionVar('user')));
        
        $result = array();
        
        foreach ($modules as $module) {
            $privilege = Privilege::find($user, $module);
            
            $result[] = array(
                'id' => $module->id,
                'name' => $module->name,
                'descr' => $module->descr,
                'link' => '/' . RELATIVE_PATH . $module->name . '/',
                'read' => $privilege->canRead,
                'write' => $privilege->canWrite);
        }
        
        return $result;
    }
}