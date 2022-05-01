<?
namespace Controllers;
use SimpleImage;
class Controller{

    protected function SaveFile($name)
    {
        require("lib/ResizeImg.php");
        $file = $_FILES["$name"];
        $file_name = $file['name'];
        $image = new SimpleImage();
        $image->load($file['tmp_name']);
        $image->resize(1000, 600);
        $image->save("public/images/".$file_name);
        return "/public/images/$file_name";
    }

    protected function ResponceMess($text,$code,$data = [])
    {
        $responce = array("mess" => $text,"code" => $code,"data" => $data);
        return json_encode($responce);
    }
    protected function Translit($str){
        $converter = array(
            'а' => 'a',    'б' => 'b',    'в' => 'v',    'г' => 'g',    'д' => 'd',
            'е' => 'e',    'ё' => 'e',    'ж' => 'zh',   'з' => 'z',    'и' => 'i',
            'й' => 'y',    'к' => 'k',    'л' => 'l',    'м' => 'm',    'н' => 'n',
            'о' => 'o',    'п' => 'p',    'р' => 'r',    'с' => 's',    'т' => 't',
            'у' => 'u',    'ф' => 'f',    'х' => 'h',    'ц' => 'c',    'ч' => 'ch',
            'ш' => 'sh',   'щ' => 'sch',  'ь' => '',     'ы' => 'y',    'ъ' => '',
            'э' => 'e',    'ю' => 'yu',   'я' => 'ya',
        );
    
        $value = mb_strtolower($str);
        $value = strtr($value, $converter);
        $value = mb_ereg_replace('[^-0-9a-z]', '-', $value);
        $value = mb_ereg_replace('[-]+', '-', $value);
        $value = trim($value, '-');	
        return $value;
    }


    protected function ConvertDate($table)
    {
        $lenght = count($table);
        for ($i=0; $i < $lenght; $i++) { 
            $str = $table[$i]['date_create'];
            $str = str_replace('-','/',$str);
            $table[$i]['date_create'] = substr($str,0,16);
        }

        return $table;
    }

    public function Redirect($url)//Функция для редиректа 
	{	
        	//Если заголовки отправлены... 
        	//делаем редирект на javascript ...
        	echo '<script type="text/javascript">';
        	echo 'window.location.href="' . $url . '";'; 
        	echo '</script>';
        	//если javascript отключен, делаем редирект на html. 
        	echo '<noscript>'; 
        	echo '<meta http-equiv="refresh" content="0;url=' . $url . '" />'; 
        	echo '</noscript>'; exit; 
	}
}

?>