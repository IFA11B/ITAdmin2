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
        $modules = R::findAll('module', 'ORDER BY sort_order ASC, name ASC');
        
        foreach ($modules as $module) {
            $modulesArray[] = array(
                'id' => $module->id,
                'order' => $module->sortOrder,
                'name' => $module->name,
                'descr' => $module->description);
        }
        
        $result['modules'] = $modulesArray;
        
        return $result;
    }
}