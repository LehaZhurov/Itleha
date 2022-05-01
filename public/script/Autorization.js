function AutoUser(data) {//Функция для отправки изменной главы 
	SendRequest("POST","/auto/user",data)//Функция для отправки AJAX
	.then(data => Index(data))//Передаем сообщение от сервера
	.catch(err => console.log(err));	
}

document.querySelector('#but_auto').onclick = () =>{
    PostDate = new FormData(document.querySelector('#auto'));
    AutoUser(PostDate);
}

function Index(data){
   if(data['code'] == 200){
        Mess(data);
        setTimeout(function(){
            window.location.href = '/';
        },2000)
   }else{
       Mess(data);
   }
}