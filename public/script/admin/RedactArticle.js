var data;
function Back(data){
    Mess(data);
    if(data['code'] == 200){
        setTimeout(window.location.href = '/admin',10000);
    }
}
var PostDate;

function SaveRedactArticle(data,id) {//Функция для отправки изменной главы 
	SendRequest("Post","/update/article/"+id,data)//Функция для отправки AJAX
	.then(data => Back(data))//Передаем сообщение от сервера
	.catch(err => console.log(err));	
}

document.querySelector('#SaveUpdateArticle').onclick = () =>{
    id = document.querySelector('#article_id').value;
    PostDate = new FormData(document.querySelector('#form_article'));
	PostDate.append(document.querySelector('#cover'),1);
    $text = tinymce.activeEditor.getContent();
	PostDate.append('text_article',$text);
    SaveRedactArticle(PostDate,id);
}
document.querySelector('#Back').onclick = () =>{
    data = {'mess': 'Возрощаю на Страницу Админ панели.' , 'code' : 200};
    Back(data)
}
window.onload = () =>{
    data = {'mess': 'Данные статьи досттупны на вкладке "Статья"','code' : 200};
    Mess(data);
}
