<?php
addPageClass('AddComponent');
class AddComponent implements Page {

    public function getTemplate() {
        if (isset($_POST['steptwo'])) {
            return 'AddComponentStepTwo.tpl';
        }
        return 'AddComponentStepOne.tpl';
    }

    public function getContent() {
        $result = array();
        
        if (isset($_POST['addcomponent'])) {
            $component = R::dispense('component');
            
            $component->manufacturer = postVar('manufacturer');
            $component->purchaseDate = postVar('purchaseDate');
            $component->warrantyDuration = postVar('warrantyDuration');
            $component->note = postVar('note');
            $component->archetype = R::load('archetype', postVar('archetype'));
            $component->room = R::load('room', postVar('room'));
            $component->supplier = R::load('supplier', postVar('supplier'));
            
            $attributes = postVar('attributes');
            $propertyContent = postVar('propertyContent');
            
            if (count($attributes) != count($propertyContent)) {
                die("the fuck?");
            }
            
            for ($index = 0; $index < count($attributes); $index += 1) {
                $attribute = R::load('attribute', $attributes[$index]);
                $property = R::dispense('property');
                
                $property->component = $component;
                $property->attribute = $attribute;
                $property->content = $propertyContent[$index];
                
                // potential exceptions here
                // in the interest of saving time, error handling has been cut to a bare minimum.
                // should you find yourself with too much time on your hand, please add error handling.
                R::store($property);
            }
            
            try {
                R::store($component);
                $result['success'] = true;
            } catch (ComponentExists $e) {
                $result['success'] = false;
            }
        } elseif (isset($_POST['steptwo'])) {
            $archetype = R::load('archetype', postVar('archetype'));
            
            $result['archetype'] = $archetype->id;
            $result['attributes'] = array();
            $attributes = $archetype->sharedAttribute;
            
            foreach ($attributes as $attribute) {
                $valuesArray = array();
                
                if ($attribute->dataType == 'enum') {
                    $values = $attribute->sharedValue;
                    
                    foreach ($values as $value) {
                        $valuesArray[] = array('id' => $value->id, 'unit' => $value->unit, 'content' => $value->content);
                    }
                }
                
                $result['attributes'][] = array(
                    'id' => $attribute->id,
                    'internalName' => $attribute->internalName,
                    'name' => $attribute->displayName,
                    'dataType' => $attribute->dataType,
                    'values' => $valuesArray);
            }
            
            $result['rooms'] = array();
            $rooms = R::findAll('room', 'ORDER BY number ASC');
            
            foreach($rooms as $room) {
                $result['rooms'][] = array('id' => $room->id, 'number' => $room->number, 'name' => $room->name, 'note' => $room->note);
            }
            
            $result['suppliers'] = array();
            $suppliers = R::findAll('supplier', 'ORDER BY name ASC');
            
            foreach($suppliers as $supplier) {
                $result['suppliers'][] = array('id' => $supplier->id, 'name' => $supplier->name);
            }
            
            return $result;
        }
        
        $result['archetypes'] = array();
        $archetypes = R::findAll('archetype', 'ORDER BY name ASC');
        
        foreach ($archetypes as $archetype) {
            $result['archetypes'][] = array('id' => $archetype->id, 'name' => $archetype->name);
        }
        
        return $result;
    }
}