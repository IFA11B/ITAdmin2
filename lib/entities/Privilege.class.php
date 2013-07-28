<?php
class Privilege extends RedBean_SimpleModel {
    
    public static function find(RedBean_OODBBean $user, RedBean_OODBBean $module) {
        // find existing privilege for user and module
        $privilege = R::findOne(
            'privilege',
            ' user_id = :user AND module_id = :module ',
            array(':user' => $user->id, ':module' => $module->id));
        
        if ($privilege == null) {
            // privilege doesnt exist yet, so lets create one
            $privilege = R::dispense('privilege');
        
            $privilege->user = $user;
            $privilege->module = $module;
            $privilege->canRead = $module->defaultRead;
            $privilege->canWrite = $module->defaultWrite;
        
            // we store now so privilege has a valid id (non-zero)
            R::store($privilege);
        }
        
        return $privilege;
    }
}