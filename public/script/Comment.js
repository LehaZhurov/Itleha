url = document.URL.split('/')[4]
page = 0
lenta = document.querySelector('#lenta_comment');
function SendComment(data) {//Функция для отправки изменной главы 
	SendRequest("Post","/create/comment",data)//Функция для отправки AJAX
	.then(data => Mess(data))
	.catch(err => console.log(err));
    setTimeout(function () {
        lenta.innerHTML = ' ';
        page = 0
        GetComment(page);
        all = true
        document.querySelector('#comment_input').value = '  '
    },3000);    
    
}
document.querySelector('#send_comment').onclick = () =>{
    PostDate = new FormData(document.querySelector('#comment_form'));
    PostDate.append('url',url);
    SendComment(PostDate);
}
function GetComment(p) {
        SendRequest("Get","/get/comment/"+url+"/"+p)//Функция для отправки AJAX
        .then(data => AppendComments(data))//Передаем сообщение от сервера
        .catch(err => console.log(err));	
        page = page + 1
}
function AppendComments(data) {
    if(data['code'] == 404){
        all = false
    }
    ////////////////////////
    data = data['data']
    if(data.lenght <= 0){
        lenta.style.display = 'none';
    }else{
        lenta.style.display = 'block';
    }
    ////////////////////////
    for (let i = 0; i < data.lenght; i++) {
        if(data[i]){
            lenta.innerHTML += Shablon(data[i]);
        }
    }
    ////////////////////////
}

function Shablon(item) {
    str = 
    `
    <span class = 'comment_block'>
        <h3>`+item['name']+`  `+item['last']+`</h3>
        <p>`+item['text']+`</p>
        <span class="date_and_view">
            <span class="date">
            `+item['date_create']+`
            </span>
        </span>
    </span>
    `;
    return str;
}
all = true
window.onload = () =>{
    GetComment(page);
    lenta.onscroll = () => {
        if(all){
            setTimeout(GetComment(page),2000);
        }
    }
}

