<?php
addPageClass('AddSupplier');
class AddSupplier implements Page {
    
    public function getTemplate() {
        return 'AddSupplier.tpl';
    }
    
    public function getContent() {
        $result = array();
        
        if (isset($_POST['addsupplier'])) {
            $supplier = R::dispense('supplier');
            
            $supplier->name = postVar('name');
            $supplier->street = postVar('street');
            $supplier->city = postVar('city');
            $supplier->zip = postVar('zip');
            $supplier->phone = postVar('phone');
            $supplier->mobile = postVar('mobile');
            $supplier->fax = postVar('fax');
            $supplier->email = postVar('email');
            
            try {
                R::store($supplier);
                $result['success'] = true;
            } catch (SupplierExists $e) {
                $result['success'] = false;
            }
        
            $_POST = array();
        }
        
        return $result;
    }
}
