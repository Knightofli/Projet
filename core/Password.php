<?php
//------------------//
//  class Password  //
//------------------//

class Password{

    
    static $password_hashed;

    /**
    * Hashe le mot de passe
    **/
    static function hash_password($password){
        Password::$password_hashed = password_hash($password, PASSWORD_DEFAULT);
        return Password::$password_hashed;
    }
}
?>
