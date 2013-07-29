<?php
addPageClass('AddValue');
class AddValue implements Page {
    
    public function getTemplate() {
        return 'AddValue.tpl';
    }
    
    public function getContent() {
        $result = array();
        
        if (isset($_POST['addvalue'])) {
            $value = R::dispense('value');
            
            $value->unit = postVar('unit');
            $value->content = postVar('content');
            
            try {
                R::store($value);
                $result['success'] = true;
            } catch (ValueExists $e) {
                $result['success'] = false;
            }
        }
        
        return $result;
    }
}