<?
$router = Bit55\Litero\Router::fromGlobals();
//////////////////////////////////////////////////////////////
if($_SESSION['user']['email'] == 'nagana.69com@gmail.com'){
    $router->add ( '/admin', function(){
        Render('admin.view.php',['title' =>'Админ панель',]);
    });
}
//////////////////////////////////////////////////////////////
$router->add ('/' , 'Controllers\ArticleAndRecordControllers@IndexLenta');
//////////////////////////////////////////////////////////////
$router->add('/create/article',       'Controllers\ArticleControllers@CreateArticle');
$router->add('/redact/article/:any',  'Controllers\ArticleControllers@RedactArticle');
$router->add('/update/article/:any',  'Controllers\ArticleControllers@UpdateArticle');
$router->add('/article/:any',           'Controllers\ArticleControllers@ArticlePage');
//////////////////////////////////////////////////////////////
$router->add('/create/record' ,       'Controllers\RecordControllers@CreateRecord');
$router->add('/redact/record/:any',   'Controllers\RecordControllers@RedactRecord');
$router->add('/update/record/:any',   'Controllers\RecordControllers@UpdateRecord');
$router->add('/record/:any',            'Controllers\RecordControllers@RecordPage');
/////////////////////////////////////////////////////////////
$router->add('/get/record_and_article/:any/:any' , 'Controllers\ArticleAndRecordControllers@GetArticleAndRecord');
/////////////////////////////////////////////////////////////
$router->add('/registration' ,        'Controllers\UserControllers@RegistrationPage');
$router->add('/autorisation' ,        'Controllers\UserControllers@AutorisationPage');
$router->add('/create/user' ,               'Controllers\UserControllers@CreateUser');
$router->add('/auto/user' ,                   'Controllers\UserControllers@AutoUser');
$router->add('/exit' ,                            'Controllers\UserControllers@Exit');
/////////////////////////////////////////////////////////////
$router->add('/create/comment' ,          'Controllers\CommentControllers@CreateCom');
$router->add('/get/comment/:any/:any' ,      'Controllers\CommentControllers@GetCom');
////////////////////////////////////////////////////////////
$router->add('/search/' ,      'Controllers\ArticleAndRecordControllers@Search');
////////////////////////////////////////////////////////////
if ($router -> isFound ()) { 
    $router -> executeHandler ( 
        $router -> getRequestHandler (), 
        $router -> getParams () 
    ); 
}  
else { 
     // Простой обработчик сообщения «Не найдено» 
           http_response_code ( 404 ); 
           echo  '<style>body{display:flex;justify-content:center;}</style><a href = "/"><img src = "https://cdn.dribbble.com/users/1129101/screenshots/3513987/404.gif"></a>' ; 
} 
?>
