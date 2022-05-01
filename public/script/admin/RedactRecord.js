
function Back(data){
    Mess(data);
    if(data['code'] == 200){
        setTimeout(window.location.href = '/admin',10000);
    }
}
var PostDate;

function SaveRedactRecord(data,id) {//Функция для отправки изменной главы 
	SendRequest("Post","/update/record/"+id,data)//Функция для отправки AJAX
	.then(data => Back(data))//Передаем сообщение от сервера
	.catch(err => console.log(err));	
}

document.querySelector('#SaveUpdateRecord').onclick = () =>{
    id = document.querySelector('#record_id').value;
    PostDate = new FormData(document.querySelector('#form_record'));
	PostDate.append(document.querySelector('#cover'),1);
    SaveRedactRecord(PostDate,id);
}
document.querySelector('#Back').onclick = () =>{
    var data = {'mess': 'Возрощаю на Страницу Админ панели.'};
    Back(data);
}
window.onload = () =>{
    data = {'mess': 'Данные поста доступны на вкладке "Пост"','code' : 200};
    Mess(data);
}