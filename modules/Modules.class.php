<?php
addModuleClass('Modules');
class Modules {
    
    private static $defaultPage;
    private static $pages = array();
    
    public static function addPage($pageClassName, $pageName = false, $default = false) {
        if (havePageClass($pageClassName)) {
            if ($pageName !== false) {
                Modules::$pages[$pageName] = $pageClassName;
            }
            Modules::$pages[$pageClassName] = $pageClassName;
            
            if ($default == true) {
                Modules::$defaultPage = $pageClassName;
            }
        }
    }
    
    public static function getPage($pageName) {
        if (isset(Modules::$pages[$pageName]) && havePageClass(Modules::$pages[$pageName])) {
            return Modules::$pages[$pageName];
        }
        return Modules::getDefaultPage();
    }
    
    public static function getDefaultPage() {
        return Modules::$defaultPage;
    }
}