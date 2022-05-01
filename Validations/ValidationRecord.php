<?
namespace Validations;

class ValidationRecord extends Validations{

    private $error = [];

    static function GreateRecord($data)
    {   
        $name  = trim($data['title']);
        $cover = $_FILES['cover'];
        $text  = trim($data['record_text']);
        if(strlen($name) < 9){
            $error[] = 'Нзавание должно быть длинее 9 символов';
        }else if(empty($text)){
            $error[] = 'Поле с текстом не должно быть пустым';
        }else if(strlen($text) < 3 && strlen($text) > 50){
            $error[] = 'Описание не менее 3 не более 50 символов';
        }
        return $error;
    }

    static function UpdateRecord($data)
    {
        $error = [];
        $name  = trim($data['title']);
        $cover = $_FILES['cover'];
        $text  = trim($data['record_text']);
        if(strlen($name) < 9){
            $error[] = 'Нзавание должно быть длинее 9 символов';
        }else if(empty($text)){
            $error[] = 'Поле с описанием не должно быть пустым';
        }else if(strlen($text) < 30 && strlen($text) > 40){
            $error[] = 'Описание не менее 30 не более 40 символов';
        }
        return $error;
    }

}