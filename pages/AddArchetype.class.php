<?php
addPageClass('AddArchetype');
class AddArchetype implements Page {
    
    public function getTemplate() {
        return 'AddArchetype.tpl';
    }
    
    public function getContent() {
        $result = array();
        
        if (isset($_POST['addarchetype'])) {
            $archetype = R::dispense('archetype');
            
            $archetype->name = postVar('name');
            
            foreach($_POST['attributes'] as $attributeid) {
                $attribute = R::load('attribute', $attributeid);
                $archetype->sharedAttribute[] = $attribute;
            }
            
            try {
                R::store($archetype);
                $result['success'] = true;
            } catch (UserExists $e) {
                $result['success'] = false;
            }
        }
        
        $result['attributes'] = array();
        $attributes = R::findAll('attribute', 'ORDER BY display_name ASC');
        
        foreach($attributes as $attribute) {
            $result['attributes'][] = array('id' => $attribute->id, 'name' => $attribute->displayName);
        }
        
        return $result;
    }
}