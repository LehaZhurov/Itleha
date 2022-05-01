<?
namespace Validations;

class ValidationComment extends Validations{

    private $error = [];

    static function GreateComment($data)
    {
        $text = trim($data['comment']);

        if(!$_SESSION['user']['name']){
            $error[] = 'Создайте или войдите в аккаунт';
        }else if(empty($text)){
            $error[] = 'Нельзя так';
        }

        return $error;
    }

}

?>