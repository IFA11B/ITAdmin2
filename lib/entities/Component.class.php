<?php

class Component extends RedBean_SimpleModel {
    
    public static function loadFirst() {
        return R::findOne('component', '1 = 1 ORDER BY id ASC', array());
    }
}