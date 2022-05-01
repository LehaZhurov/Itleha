var PostDate;
function CreateRecord(data) {//Функция для отправки изменной главы 
	SendRequest("Post","/create/record",data)//Функция для отправки AJAX
	.then(data => Mess(data))//Передаем сообщение от сервера
	.catch(err => console.log(err));	
}

document.querySelector('#SaveNewRecord').onclick = () =>{
	$text = tinymce.activeEditor.getContent();
    PostDate = new FormData(document.querySelector('#form_record'));
    CreateRecord(PostDate);
}