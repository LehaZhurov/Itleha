lenta = document.querySelector("#lenta");
function PatternUnit(dd){
	if(dd['comment_coll'] == null){
		dd['comment_coll'] = 0
	}
	if(dd['type'] == 'article'){
		str = `
		<div class = 'post'>
    		<div class="state_post">
        		<img src="`+dd['cover']+`" alt="">
        		<a href="/article/`+dd['url']+`"><h2 class="name_state">`+dd['title']+`</h2></a>
        		<p class="discription_state">
					`+dd['discription']+`
        		</p>
        		<div class="date_and_view">
					<span class="date">
						`+dd['date_create'].substr(0, 16)+`
            		</span>
            		<span class="view">
                	<span>
                    	<img src="/public/images/icons8-показать-30.png" alt="">
                    	321321
                	</span>
            	</span>
        	</div>
    	</div>
	</div>`;
	}else if(dd['type'] == 'record'){
		str = 	`
		<div class = 'post'>
    		<div class="state_post">
        		<p class="discription_state">
				`+dd['text']+`
        		</p>
        <img src="`+dd['cover']+`" alt="">
        <div class="date_and_view">
            <span class="date">
                 `+dd['date_create'].substr(0, 9)+`	
            </span>
			<span class = 'combut'>
                <a href="/record/`+dd['url']+`">Комментировать(`+dd['comment_coll']+`)</a>
            </span>
            <span class="view">
                <span>
                    <img src="/public/images/handlike_121054.png" alt="">
                    `+dd['view']+`
                </span>
            </span>
        </div>
    </div>
</div>
		`
	}
	return str;
}
function AppendUnitLenta(data){
	Mess(data);	
	data = data['data'];
	for (let i = 0; i < 10; i++) {
		lenta.innerHTML += PatternUnit(data[i]); 
	}
}
function CetArticleRecord(offset,limit) {//Функция для отправки изменной главы 
	SendRequest("Get","/get/record_and_article/"+offset+"/"+limit)//Функция для отправки AJAX
	.then(data => AppendUnitLenta(data))//Передаем сообщение от сервера
	.catch(err => console.log(err));	
}

num_page = 1;
function UpPage(){
	CetArticleRecord(num_page*10,10);
	num_page = num_page + 1;
}

document.querySelector('#More').onclick = () =>{
    UpPage();
}