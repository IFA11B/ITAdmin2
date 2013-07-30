<?php
addPageClass('AddModule');
moduleAddPage('Modules', 'AddModule', 'Add');
class AddModule implements Page {

    public function getTemplate() {
        return 'AddModule.tpl';
    }

    public function getContent() {
        if (isset($_POST['addmodule'])) {
            $module = R::dispense('module');
            
            $module->name = postVar('moduleName');
            $module->descr = postVar('moduleDescr');
            $module->defaultRead = (integer) postVar('moduleRead');
            $module->defaultWrite = (integer) postVar('moduleWrite');
            
            try {
                R::store($module);
            } catch (ModuleExists $e) {
                return array('success' => false);
            }
            return array('success' => true);
        }
        
        return array();
    }
}