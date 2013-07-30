<?php
addModuleClass('Components');
class Components {
    
    private static $defaultPage;
    private static $pages = array();
    
    public static function addPage($pageClassName, $pageName = false, $default = false) {
        if (havePageClass($pageClassName)) {
            if ($pageName !== false) {
                Components::$pages[$pageName] = $pageClassName;
            }
            Components::$pages[$pageClassName] = $pageClassName;
            
            if ($default == true) {
                Components::$defaultPage = $pageClassName;
            }
        } else  {
            echo $pageClassName;
        }
    }
    
    public static function getPage($pageName) {
        if (isset(Components::$pages[$pageName]) && havePageClass(Components::$pages[$pageName])) {
            return Components::$pages[$pageName];
        }
        return Components::getDefaultPage();
    }
    
    public static function getDefaultPage() {
        return Components::$defaultPage;
    }
}