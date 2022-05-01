
table = document.querySelector("#body_table");



function PatternUnit(id,title,type,create,update){

	if(type == 'article'){
		FunRedact = 'onclick = "RedactArticle('+id+')"';
	}else if(type == 'record'){
		FunRedact = 'onclick = "RedactRecord('+id+')"';
	}
	str = 
	`
		<div class="table_unit">
            <span class="unit_id">`+id+`</span>
            <span class="unit_name">`+title+`</span>
            <span class="unit_type">`+type+`</span>
            <span class="unit_create">`+create+`</span>
            <span class="unit_update">`+update+`</span>
            <button class = 'but' `+FunRedact+`>Редактировать</button>
            <button class = 'but'>Удалить</button>
        </div>
	`
	return str;
}
function AppendUnitTable(data){
	Mess(data);	
	if(data['code'] == '404'){
		num_page = 0
		EchoNum(num_page);
		CetArticleRecord(0,10);
	}else{
		data = data['data'];
		table.innerHTML = ' ';
		for (let i = 0; i < 10; i++) {
			table.innerHTML += PatternUnit(data[i]['id'],data[i]['title'].substr(0, 9),data[i]['type'],data[i]['date_create'].substr(0, 11),data[i]['date_update'].substr(0, 11)); 
		}
	}
}
function CetArticleRecord(offset,limit) {//Функция для отправки изменной главы 
	SendRequest("Get","/get/record_and_article/"+offset+"/"+limit)//Функция для отправки AJAX
	.then(data => AppendUnitTable(data))//Передаем сообщение от сервера
	.catch(err => console.log(err));	
}

document.querySelector('#GetArticleRecord').onclick = () =>{
    CetArticleRecord(0,10);
}

num_page = 0;
function EchoNum(i){
	document.querySelector('#page').innerHTML = i + 1;
}
function UpPage(){
	num_page = num_page + 1;
	CetArticleRecord(num_page*10,10);
	EchoNum(num_page);
}

function DownPage(){
	if(num_page - 1 >= 0 ){
		num_page = num_page - 1;
		CetArticleRecord(num_page*10,10);
		EchoNum(num_page);
	}
}