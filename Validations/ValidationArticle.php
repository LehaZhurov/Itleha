<?
namespace Validations;

class ValidationArticle extends Validations{

    private $error = [];

    static function GreateArticle($data)
    {   
        $name  = $data['name_article'];
        $disc  = $data['discription'];
        $cover = $_FILES['cover'];
        $text  = $data['text_article'];
        if(empty($name)){
            $error[] = 'Поле с название не должно быть пустым';
        }else if(strlen($name) < 9){
            $error[] = 'Нзавание должно быть длинее 9 символов';
        }else if(empty($disc)){
            $error[] = 'Поле с описанием не должно быть пустым';
        }else if(strlen($disc) < 30 && strlen($disc) > 40){
            $error[] = 'Описание не менее 30 не более 40 символов';
        }else if(!isset($cover)){
            $error[] = 'Нужна обложка';
        }

        return $error;
    }

    static function UpdateArticle($data)
    {
        $error = [];
        $name  = $data['name_article'];
        $disc  = trim($data['discription']);
        $cover = $_FILES['cover'];
        $text  = $data['text_article'];
        if(empty($name)){
            $error[] = 'Поле с название не должно быть пустым';
        }else if(strlen($name) < 9){
            $error[] = 'Нзавание должно быть длинее 9 символов';
        }else if(empty($disc)){
            $error[] = 'Поле с описанием не должно быть пустым';
        }else if(strlen($disc) < 30 && strlen($disc) > 40){
            $error[] = 'Описание не менее 30 не более 40 символов';
        }
        return $error;
    }

}
?>