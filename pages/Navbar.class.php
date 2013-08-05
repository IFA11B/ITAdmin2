<?php
class Navbar implements Page {

    public function getTemplate() {
        return '';
    }

    public function getContent() {
        $modules = R::findAll('module', 'ORDER BY sort_order ASC, name ASC');
        $user = R::load('user', sessionVar('user'));
        
        $result = array();
        
        foreach ($modules as $module) {
            $privilege = Privilege::find($user, $module);
            
            $result[] = array(
                'id' => $module->id,
                'name' => $module->name,
                'descr' => $module->description,
                'link' => '/' . RELATIVE_PATH . $module->className . '/',
                'read' => $privilege->canRead,
                'write' => $privilege->canWrite);
        }
        
        return $result;
    }
}