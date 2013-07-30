<?php
addPageClass('EditComponent');
moduleAddPage('Components', 'EditComponent', 'Edit');
class EditComponent implements Page {

    public function getTemplate() {
        return 'EditComponent.tpl';
    }

    public function getContent() {
        $result = array();
        
        if (isset($_POST['editcomponent'])) {
            $component = R::load('component', postVar('id'));
            
            $component->manufacturer = postVar('manufacturer');
            $component->purchaseDate = postVar('purchaseDate');
            $component->warrantyDuration = postVar('warrantyDuration');
            $component->note = postVar('note');
            $component->room = R::load('room', postVar('room'));
            $component->supplier = R::load('supplier', postVar('supplier'));
            
            $properties = postVar('properties');
            $propertyContent = postVar('propertyContent');
            
            if (count($properties) !== count($propertyContent)) {
                die("the fuck?");
            }
            
            for ($index = 0; $index < count($properties); $index += 1) {
                $property = R::load('property', $properties[$index]);
                
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
        } else {
            if (isset($_GET['component'])) {
                // load specified user id
                $component = R::load('component', getVar('component'));
                
                if ($component->id == 0) {
                    // specified user id hasnt been found
                    $component = Component::loadFirst();
                }
            } else {
                $component = Component::loadFirst();
            }
        }
        
        $componentArray = array();
        $componentArray['id'] = $component->id;
        $componentArray['manufacturer'] = $component->manufacturer;
        $componentArray['purchaseDate'] = $component->purchaseDate;
        $componentArray['warrantyDuration'] = $component->warrantyDuration;
        $componentArray['note'] = $component->note;
        $componentArray['room'] = $component->room->id;
        $componentArray['supplier'] = $component->supplier->id;
        
        $roomsArray = array();
        $rooms = R::findAll('room', 'ORDER BY number ASC');
        foreach ($rooms as $room) {
            $roomsArray[] = array(
                'id' => $room->id,
                'number' => $room->number,
                'name' => $room->name,
                'note' => $room->note);
        }
        
        $suppliersArray = array();
        $suppliers = R::findAll('supplier', 'ORDER BY name ASC');
        foreach ($suppliers as $supplier) {
            $suppliersArray[] = array('id' => $supplier->id, 'name' => $supplier->name);
        }
        
        $propertiesArray = array();
        $properties = R::find('property', 'component_id = ?', array($component->id));
        foreach ($properties as $property) {
            $valuesArray = array();
            if ($property->attribute->dataType === 'enum') {
                $values = $property->attribute->sharedValue;
                
                foreach($values as $value) {
                    $valuesArray[] = array('id' => $value->id, 'unit' => $value->unit, 'content' => $value->content);
                }
            }
            
            $propertiesArray[] = array(
                'id' => $property->id,
                'name' => $property->attribute->displayName,
                'internalName' => $property->attribute->internalName,
                'content' => $property->content,
                'dataType' => $property->attribute->dataType,
                'values' => $valuesArray);
        }
        
        $result['component'] = $componentArray;
        $result['rooms'] = $roomsArray;
        $result['suppliers'] = $suppliersArray;
        $result['properties'] = $propertiesArray;
        
        return $result;
    }
}