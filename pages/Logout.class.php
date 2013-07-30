<?php
addPageClass('Logout');
class Logout implements Page {
    
    public function getTemplate() {
        return 'Logout.tpl';
    }
    
    public function getContent() {
        session_unset();
        session_destroy();
        
        header('Location: /'.RELATIVE_PATH);
        
        return array();
    }
}