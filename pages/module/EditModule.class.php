<?php
addPageClass('EditModule');
moduleAddPage('Modules', 'EditModule', 'Edit');
class EditModule implements Page {
    
    public function getTemplate() {
        return 'EditModule.tpl';
    }
    
    public function getContent() {
        if (isset($_POST['editmodule'])) {
            $module = R::load('module', postVar('id'));
        
            if ($module->id != 0) {
                $module->name = postVar('name', $module->name);
                $module->className = postVar('className', $module->className);
                $module->sortOrder = postVar('sortOrder', $module->sortOrder);
                $module->description = postVar('description', $module->description);
                $module->defaultRead = (integer) postVar('defaultRead', 0);
                $module->defaultWrite = (integer) postVar('defaultWrite', 0);
        
                R::store($module);
            }
        } elseif (isset($_POST['deletemodule'])) {
            $module = R::load('module', postVar('id'));
            $privileges = R::findAll('privilege', 'module_id = ?', array($module->id));
        
            foreach ($privileges as $privilege) {
                R::trash($privilege);
            }
        
            R::trash($module);
        
            $module = Module::loadFirst();
        } else {
            if (isset($_GET['moduleid'])) {
                // load specified user id
                $module = R::load('module', getVar('moduleid'));
        
                if ($module->id == 0) {
                    // specified user id hasnt been found
                    $module = Module::loadFirst();
                }
            } else {
                $module = Module::loadFirst();
            }
        }
        
        $result = array();
        
        $result['id'] = $module->id;
        $result['name'] = $module->name;
        $result['className'] = $module->className;
        $result['sortOrder'] = $module->sortOrder;
        $result['description'] = $module->description;
        $result['defaultRead'] = $module->defaultRead;
        $result['defaultWrite'] = $module->defaultWrite;
        
        return $result;
    }
}
