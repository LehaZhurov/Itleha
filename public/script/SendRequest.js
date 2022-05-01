function SendRequest(method,url,body = null){
	Ajax = true;
	return new Promise ((resolve,reject)=>{
		const xhr = new XMLHttpRequest();
		xhr.open(method,url,true)
		xhr.responseType = 'json';
		xhr.withCredentials = true;
		if(xhr.readyState == 0){
			console.log(0);
		}
		if(xhr.readyState == 1){
			console.log(1);
		}
		if(xhr.readyState == 3){
			console.log(3);
		}
		if(xhr.readyState == 4){
			console.log(4);
		}

		xhr.onload = () =>{
			if(xhr.status >= 400){
				reject(xhr.response);
			}else{
				resolve(xhr.response);
				// let mather_block = document.querySelector('#manga-spisok').innerHTML = " ";
			}
		}
		xhr.onerror = () =>{
			reject(xhr.response);
		}
		xhr.send(body);
	});
}