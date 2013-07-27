<?php
addPageClass('Home');

class Home implements Page {
    public function getTemplate() {
        return 'Home.tpl';
    }
    
    public function getContent() {
        return array();
    }
}