<?php
class User extends RedBean_SimpleModel
{

    /**
     * Verifies this users password against the specified password
     *
     * @param string $password
     * @return boolean
     */
    public function verifyPassword($password)
    {
        $user = $this->unbox();
        $hash = $user->password;
        
        $success = password_verify($password, $hash);
        if ($success == true)
        {
            $rehash = password_needs_rehash($hash, PASSWORD_DEFAULT, array('cost' => PASSWORD_COST));
            
            if ($rehash == true)
            {
                $user->password = password_hash($password, PASSWORD_DEFAULT, array('cost' => PASSWORD_COST));
                R::store($user);
            }
            
            return true;
        }
        return false;
    }

    public function update()
    {
        $user = R::findOne('user', 'name = ?', array($this->name));
        if ($user != null && $user->id != $this->id)
        {
            throw new UserExists();
        }
    }
    
    public static function loadFirst() {
        return R::findOne('user', '1 = 1 ORDER BY id ASC', array());
    }
}