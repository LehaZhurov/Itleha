<?
namespace Validations;

class Validations{

    static function isValidEmail($email){    
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    

}

?>