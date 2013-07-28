<?php
addModuleClass('Users');
class Users {
    
    private static $defaultPage;
    private static $pages = array();
    
    public static function addPage($pageClassName, $pageName = false, $default = false) {
        if (havePageClass($pageClassName)) {
            if ($pageName !== false) {
                Users::$pages[$pageName] = $pageClassName;
            }
            Users::$pages[$pageClassName] = $pageClassName;
            
            if ($default == true) {
                Users::$defaultPage = $pageClassName;
            }
        }
    }
    
    public static function getPage($pageName) {
        if (isset(Users::$pages[$pageName]) && havePageClass(Users::$pages[$pageName])) {
            return Users::$pages[$pageName];
        }
        return Users::getDefaultPage();
    }
    
    public static function getDefaultPage() {
        return Users::$defaultPage;
    }
}