function CreateUser(data) {//Функция для отправки изменной главы 
	SendRequest("POST","/create/user",data)//Функция для отправки AJAX
	.then(data => Index(data))//Передаем сообщение от сервера
	.catch(err => console.log(err));	
}

document.querySelector('#but_new_reg').onclick = () =>{
    PostDate = new FormData(document.querySelector('#reg_form'));
    CreateUser(PostDate);
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