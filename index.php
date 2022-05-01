<?
session_start();
require 'vendor/autoload.php';
//Подключючение к БД
R::setup(
	'mysql:host=localhost;dbname=itl',
	'root',	''
);
//Шаблонизатор Twig
function Render($nameview,$param = array())//Функция для создания шаблона
{	
	$user = ['user' => $_SESSION['user']];
	$param = array_merge($param,$user);
	$loader 	= new \Twig\Loader\FilesystemLoader('view');
	$twig 		= new \Twig\Environment($loader);
	echo $twig->render($nameview,$param);
}
//
require 'router.php';
?>