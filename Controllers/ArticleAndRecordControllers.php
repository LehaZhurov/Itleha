<?
namespace Controllers;
use R;
class ArticleAndRecordControllers extends Controller{
    private function ArticleAndRecord($offset,$limit)
    {
        $table = R::findAll('itlarticleandrecord' , 'ORDER BY id DESC LIMIT '.$offset.','.$limit.'');
        return array_values($table);
        // //из таблицы  взять с элемента offset первых limit штуку 
    }
    public function GetArticleAndRecord($offset,$limit){
		$table = $this->ArticleAndRecord($offset,$limit);
        $table = $this->ConvertDate($table);
        if(!empty($table)){
            echo $this->ResponceMess("Записи загружены",200,array_values($table));   
        }else{
		    echo $this->ResponceMess("Записи закончились",404,array_values($table));
        }
		//переиндусируем массив и возрощаем ответ в формате JSON
	}
    public function IndexLenta()
    {
        $AandR = $this->ArticleAndRecord(0,10);
        $AandR = $this->ConvertDate($AandR);
        Render('index.view.php',['title' => "Главная",'post' => $AandR]);
    }

    public function Search()
    {
        $q = $_GET['q'];
        if(empty($q)){
            $this->Redirect("/");
        }
        $res_title = R::find('itlarticleandrecord', 'title LIKE ?', ["%$q%"]);
        if(!$res_title){
            $this->Redirect("/NotFound");
        }
        Render('search.view.php',['post' => $res_title]);  
    }
}
?>