<?php
class Module extends RedBean_SimpleModel {

    public function update()
    {
        $module = R::findOne('module', 'name = ?', array($this->name));
        if ($module != null && $module->id != $this->id)
        {
            throw new ModuleExists();
        }
    }
    
    public static function loadFirst() {
        return R::findOne('module', '1 = 1 ORDER BY id ASC', array());
    }
}