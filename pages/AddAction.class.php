<?php
addPageClass('AddAction');
class AddAction implements Page {
    public function getTemplate() {
        return 'AddAction.tpl';
    }
    
    public function getContent() {
        $result = array();
        
        if (isset($_POST['addaction'])) {
            $action = R::dispense('action');
            
            $action->name = postVar('name');
            
            try {
                R::store($action);
                $result['success'] = true;
            } catch (ActionExists $e) {
                $result['success'] = false;
            }
        }
        
        return $result;
    }
}