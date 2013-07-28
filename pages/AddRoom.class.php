<?php
addPageClass('AddRoom');

class AddRoom implements Page {
    
    public function getTemplate() {
        return 'AddRoom.tpl';
    }
    
    public function getContent() {
        $result = array();
        
        if (isset($_POST['addroom'])) {
            $room = R::dispense('room');
            
            $room->number = postVar('number');
            $room->name = postVar('name');
            $room->note = postVar('note');
            
            try {
                R::store($room);
                $result['success'] = true;
            } catch (RoomExists $e) {
                $result['success'] = false;
            }
            
            $_POST = array();
        }
        
        return $result;
    }
}