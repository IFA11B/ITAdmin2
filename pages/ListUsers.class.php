<?php
addPageClass('ListUsers');
moduleAddPage('Users', 'ListUsers', 'List', true);
class ListUsers implements Page {
    
    public function getTemplate() {
        return 'ListUsers.tpl';
    }
    
    public function getContent() {
        $result = array();
        
        $result['users'] = array();
        $users = R::findAll('user', 'ORDER BY name ASC');
        
        foreach($users as $user) {
            $result['users'][] = array('id' =>$user->id, 'name' => $user->name, 'createDate' => $user->createDate);
        }
        
        return $result;
    }
}