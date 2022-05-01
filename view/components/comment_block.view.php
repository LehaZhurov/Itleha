{% if user.name %}
<hr>
    <span id="comment_zone">
        <h2>Коменнтарии</h2>
        <form action="#" id = 'comment_form'>
            <textarea type="text" placeholder="Комментарий" id = 'comment_input' name = 'comment'>
            </textarea>
            <button class = 'but' type = 'button' id = 'send_comment'>Отправить</button>
        </form>
            <span id = 'lenta_comment'>
                
            </span>
    </span> 
{% else %}
    <h2>Для того чтоб оставить Комментарий необходимо быть зарегистрированным или войти</h2>
{% endif %}