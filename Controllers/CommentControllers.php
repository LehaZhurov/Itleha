<?
namespace Controllers;
use R;
use Carbon\Carbon;
use Validations\ValidationComment;
class CommentControllers extends Controller{

    public function CreateCom()
    {   
        $validation = ValidationComment::GreateComment($_POST);
        if($validation[0]){
            echo $this->ResponceMess($validation[0],404);
            exit();
        }
        $ras  = R::findOne('itlarticleandrecord', 'url = ?', [$_POST['url']]);
        /////
        $user = R::load('itluser', $_SESSION['user']['id']);
        ////
        $comment                = R::dispense('itlcomment');
        $comment->name          = $_SESSION['user']['name'];
        $comment->last          = $_SESSION['user']['lastname'];
        $comment->text          = htmlspecialchars($_POST['comment']);
        $comment->date_create   = New Carbon();
        $comment->date_update   = New Carbon();
        $comment->date_delete   = " ";
        /////
        $ras->comment_coll      += 1;     
        /////
        $ras    ->ownCommentList[] = $comment;
        $user   ->ownCommentList[] = $comment;
        R::store($ras);
        R::store($user);
        echo $this->ResponceMess('Комментарий сохранен',200);
    }

    public function GetCom($url,$page)
    {

        if(!$_SESSION['user']['name']){
            echo $this->ResponceMess('Создайте или войдите в аккаунт',404);
            exit();
        }
        $ras  = R::findOne('itlarticleandrecord', 'url = ?', [$url]);
        $comment = array_reverse(R::find('itlcomment', 'itlarticleandrecord_id = ? ', [$ras->id]));
        $com = [];
        $comment = array_values($comment);
        for($i=0; $i < 10; $i++) { 
           if($comment[$page*10 + $i]->properties){
               $com[] = $comment[$page*10 + $i]->properties;
           }
        }
        $com['lenght'] = count($com);
        ////////////////////////////////////////////////////
        if($com['lenght'] <= 0){
            echo $this->ResponceMess('error',404,$com);
            exit();
        }
        $com = $this->ConvertDate($com);
        echo $this->ResponceMess('success',200,$com);
        
    }

}
