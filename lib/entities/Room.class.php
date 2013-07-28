<?php
class Room extends RedBean_SimpleModel {

    public function update()
    {
        // make sure the user isnt adding the same room again
        
        $module = R::findOne('room', 'name = ?', array($this->name));
        if ($module != null && $module->id != $this->id)
        {
            throw new RoomExists();
        }
        
        $module = R::findOne('room', 'number = ?', array($this->number));
        if ($module != null && $module->id != $this->id)
        {
            throw new RoomExists();
        }
    }
}