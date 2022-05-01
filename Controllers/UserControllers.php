<?
namespace Controllers;
use R;
use Carbon\Carbon;
use Validations\ValidationUser;
class UserControllers extends Controller{

    
    public function RegistrationPage()
    {
        Render('registration.view.php',['title' => 'Регистрация']);
    }

    public function AutorisationPage()
    {
        Render('auto.view.php',['title' => 'Авторизация']);
    }
    
    public function CreateUser()
    {
        $validation = ValidationUser::CreateUser($_POST);
        if($validation[0]){
            echo $this->ResponceMess($validation[0],404);
            exit();
        }
        $record = R::dispense('itluser');
        $record->name = $_POST['name'];
        $record->lastname = $_POST['lastname'];
        $record->email = $_POST['email'];
        $record->fpass = password_hash($_POST['first_password'] , PASSWORD_DEFAULT);
        $record->spass = password_hash($_POST['second_password'], PASSWORD_DEFAULT);
        $record->date_create = New Carbon();
        $record->date_update = New Carbon();
        $record->date_delete = " ";
        R::store($record);
        $this->AutoUser();
    }

    public function UpdateUser()
    {
        
    }

    public function AutoUser()
    {
        $validation = ValidationUser::AutoUser($_POST);
        if($validation[0]){
            echo $this->ResponceMess($validation[0],404);
            exit();
        }
        $_SESSION['user'] = R::findOne('itluser', 'email = ?', [$_POST['email']])->properties;
        $user = $_SESSION['user'];
        echo parent::ResponceMess('Добро пожаловать, '.$user['name'],200);
    }

    public function Exit(){
        unset($_SESSION['user']);
        parent::Redirect('/');
    }

}
?>