<?php
class Attribute extends RedBean_SimpleModel {

    public function update()
    {
        $attribute = R::findOne('attribute', 'internal_name = ?', array($this->internalName));
        if ($attribute != null && $attribute->id != $this->id)
        {
            throw new AttributeExists();
        }
    }
}