var PostDate;
function CreateArticle(data) {//Функция для отправки изменной главы 
	SendRequest("Post","/create/article",data)//Функция для отправки AJAX
	.then(data => Mess(data))//Передаем сообщение от сервера
	.catch(err => console.log(err));	
}

document.querySelector('#SaveNewArticle').onclick = () =>{
    PostDate = new FormData(document.querySelector('#form_article'));
	PostDate.append(document.querySelector('#cover'),1);
	$text = tinymce.activeEditor.getContent();
	PostDate.append('text_article',$text);
    CreateArticle(PostDate);
}




var tx = document.getElementsByTagName('textarea');//РАСТЯГИВАЕМ_textarea
for (var i = 0; i < tx.length; i++) {
	tx[i].setAttribute('style', 'height:' + (tx[i].scrollHeight) + 'px;overflow-y:hidden;');
	tx[i].addEventListener("input", OnInput, false);
}
function OnInput() {
this.style.height = 'auto';
this.style.height = (this.scrollHeight) + 'px';//////console.log(this.scrollHeight);
}
