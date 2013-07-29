<?php
addPageClass('AddAttribute');
class AddAttribute implements Page {
    
    public function getTemplate() {
        return 'AddAttribute.tpl';
    }
    
    public function getContent() {
        $result = array();
        
        if (isset($_POST['addattribute'])) {
            $attribute = R::dispense('attribute');
            
            $attribute->internalName = postVar('internalName');
            $attribute->displayName = postVar('displayName');
            $attribute->dataType = postVar('dataType');
            
            if ($attribute->dataType === 'enum') {
                foreach($_POST['values'] as $valueid) {
                    $value = R::load('value', $valueid);
                    
                    $attribute->sharedValue[] = $value;
                }
            }
            
            try {
                R::store($attribute);
                $result['success'] = true;
            } catch (AttributeExists $e) {
                $result['success'] = false;
            }
            
        }
        
        $values = R::findAll('value', 'ORDER BY unit ASC, content ASC');
        $result['values'] = array();
        
        foreach($values as $value) {
            $result['values'][] = array('id' => $value->id, 'unit' => $value->unit, 'content' => $value->content);
        }
        
        return $result;
    }
}