<?php
addPageClass('ListComponents');
moduleAddPage('Components', 'ListComponents' , 'List', true);
class ListComponents implements Page {

    public function getTemplate() {
        return 'ListComponents.tpl';
    }

    public function getContent() {
        $result = array();
        
        $componentsArray = array();
        $components = R::findAll('component');
        
        foreach ($components as $component) {
            $componentsArray[] = array(
                'id' => $component->id,
                'archetype' => $component->archetype->name,
                'roomNumber' => $component->room->number,
                'roomName' => $component->room->name,
                'manufacturer' => $component->manufacturer,
                'purchaseDate' => $component->purchaseDate,
                'note' => $component->note);
        }
        
        $result['components'] = $componentsArray;
        
        return $result;
    }
}