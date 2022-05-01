<?
namespace Validations;
use R;
class ValidationUser extends Validations{

    private $error = [];

    static function CreateUser($data)
    {   
        $name       = trim($data['name']);
        $lastname   = trim($data['lastname']);
        $email      = trim($data['email']);
        $fpass      = trim($data['first_password']);
        $spass      = trim($data['second_password']);
        $uniqueuser = R::findOne('itluser', 'email = ?', [$data['email']])->properties['email']; 
        if(strlen($name) < 3){
            $error[] = 'Имена не менее 3 символов';
        }else if(strlen($lastname) < 3){
            $error[] = 'Имена не менее 3 символов';
        }else if(strlen($name) > 50){
            $error[] = 'Имена не более 15 символов';
        }else if(strlen($lastname) > 50){
            $error[] = 'Имена не более 15 символов';
        }else if(!parent::isValidEmail($email)){
            $error[] = 'Введите корректный email';
        }else if($fpass != $spass){
            $error[] = 'Пароли не совподают';
        }else if(strlen($fpass) < 8){
            $error[] = 'Пароль не менее 8 символов';
        }else if($email == $uniqueuser){
            $error[] = 'Зарегестрированный Email';
        }

        return $error;
    }

   

    static function AutoUser($data)
    {
        $user = R::findOne('itluser', 'email = ?', [$data['email']])->properties;
        if($user == false){
            $error[] = 'Пользователь не найден';
        }elseif(!password_verify($data['first_password'], $user['fpass'])){
            $error[] = 'Пароль или логин не валидны';
        }

        return $error;
    }


}