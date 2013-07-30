<?php
addPageClass('ListModules');
moduleAddPage('Modules', 'ListModules', 'List', true);
class ListModules implements Page {
    
    public function getTemplate() {
        return 'ListModules.tpl';
    }
    
    public function getContent() {
        $result = array();
        
        $modulesArray = array();
        $modules = R::findAll('module', 'ORDER BY name ASC');
        
        foreach($modules as $module) {
            $modulesArray[] = array('id' => $module->id, 'name' => $module->name, 'descr' => $module->descr);
        }
        
        $result['modules'] = $modulesArray;
        
        return $result;
    }
}