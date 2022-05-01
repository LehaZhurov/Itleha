<?
namespace Controllers;
use R;
use Carbon\Carbon;
use Validations\ValidationArticle;
class ArticleControllers extends Controller{

    public function CreateArticle()
    {   
        $validation = ValidationArticle::GreateArticle($_POST);
        if($validation[0]){
            echo $this->ResponceMess($validation[0],404);
            exit();
        }
        $article                = R::dispense('itlarticleandrecord');
        $article->type          = 'article';
        $article->title         = $_POST['name_article'];
        $article->discription   = $_POST['discription'];
        $article->cover         = $this->SaveFile('cover');
        $article->text          = $_POST['text_article'];
        $article->date_create   = New Carbon();
        $article->date_update   = New Carbon();
        $article->date_delete   = " ";
        $article->url           = $this->Translit($_POST['name_article']);
        $article->view          = 1;
        R::store($article);
        echo $this->ResponceMess('Статья Сохранена',200);
    }
    
   
    public function RedactArticle($id)
    {   
        $article = R::load('itlarticleandrecord',$id);
        $article = $article->properties;
        Render('admin.view.php',[
            'title' =>'Админ панель' , 
            'name_article'=>$article['title'],
            'discription_article'=>$article['discription'],
            'text_article'=>$article['text'],
            'cover'=>$article['cover'],
            'id_article'=>$article['id']
        ]);
    }

    public function UpdateArticle($id)
    {   
        $validation = ValidationArticle::UpdateArticle($_POST);
        if($validation[0]){
            echo $this->ResponceMess($validation[0],404);
            exit();
        }
        $article                = R::load('itlarticleandrecord',$id);
        $article->type          = 'article';
        $article->title         = $_POST['name_article'];
        $article->discription   = $_POST['discription'];
        if(!empty($_FILES['cover']['name'])){
            $article->cover = $this->SaveFile('cover');
        }else{
            $article->cover = $article->cover;
        }
        $article->text          = $_POST['text_article'];
        $article->date_create   = $article->date_create;
        $article->date_update   = New Carbon();
        $article->date_delete   = " ";
        $article->url           = $this->Translit($_POST['name_article']);
        $article->view          = $article->view;
        R::store($article);
        echo $this->ResponceMess('Изменения успешно сохранены',200);
    }

    public function ArticlePage($url)
    {
        $this->UpView($url);
        $article = R::findOne('itlarticleandrecord', 'url = ?', [$url]);
        $article = $article->properties;  
        Render('article.view.php',['title' => $article['title'] , 'article' => $article]);
    }

    private function UpView($url)
    {
        $article = R::findOne('itlarticleandrecord', 'url = ?', [$url]); 
        $article->view          = $article->view + 1;
        R::store($article);
    }
}
?>