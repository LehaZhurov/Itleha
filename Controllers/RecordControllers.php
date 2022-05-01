<?
namespace Controllers;
use R;
use Carbon\Carbon;
use Validations\ValidationRecord;
class RecordControllers extends Controller{

    public function CreateRecord()
    {   
        $validation = ValidationRecord::GreateRecord($_POST);
        if($validation[0]){
            echo $this->ResponceMess($validation[0],404);
            exit();
        }
        $record = R::dispense('itlarticleandrecord');
        $record->type = 'record';
        $record->title = $_POST['title'];
        $record->discription = ' ';
        $record->cover = parent::SaveFile('img');
        $record->text = $_POST['record_text'];
        $record->date_create = New Carbon();
        $record->date_update = New Carbon();
        $record->date_delete = " ";
        $record->url = parent::Translit($_POST['title']);
        R::store($record);
        echo parent::ResponceMess('Запись Сохранена',200);
    }

    public function RedactRecord($id)
    {   
        $record = R::load('itlarticleandrecord',$id);
        $record = $record->properties;
        Render('admin.view.php',[
            'title' => $record['title'], 
            'name_record'=>$record['title'],
            'discription_record'=>$record['text'],
            'cover'=>$record['cover'],
            'id_record'=>$record['id']
        ]);
    }

    public function UpdateRecord($id)
    {
        $validation = ValidationRecord::UpdateRecord($_POST);
        if($validation[0]){
            echo $this->ResponceMess($validation[0],404);
            exit();
        }
        $record = R::load('itlarticleandrecord',$id);
        $record->type = 'record';
        $record->title = $_POST['title'];
        $record->discription = ' ';
        if(!empty($_FILES['img']['name'])){
            $record->cover = $this->SaveFile('img');
        }else{
            $record->cover = $record->cover;
        }
        $record->date_create   = $record->date_create;
        $record->text = $_POST['record_text'];
        $record->date_update = New Carbon();
        $record->date_delete = " ";
        $record->url = parent::Translit($_POST['title']);
        R::store($record);
        echo parent::ResponceMess('Изменения сохраненый',200);
    }

    public function RecordPage($url)
    {
        $this->UpView($url);
        $record = R::findOne('itlarticleandrecord', 'url = ?', [$url]);; 
        $record = $record->properties;  
        $record = $this->ConvertDate($record);
        Render('record.view.php',['title' => $record['title'] , 'record' => $record]);
    }

    private function UpView($url)
    {
        $article = R::findOne('itlarticleandrecord', 'url = ?', [$url]); 
        $article->view          = $article->view + 1;
        R::store($article);
    }
}