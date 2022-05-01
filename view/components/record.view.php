<form action="#" id = 'form_record' class = 'form_admin'>
    <label for="#name_state">Загаловок</label>
    <input type="text" placeholder="Заголовок" id = 'name_state' class = 'input_admin' name = 'title' value = '{{name_record}}'>
    <label for="#name_state">Текст записи</label>
    <textarea type="text" placeholder="Текст записи" id = 'discription' class = 'input_admin' name = 'record_text'>
        {{discription_record }}
    </textarea>
    <label for="#name_state">Картинка</label>
    <input type="file" placeholder="Картинка" id = 'cover' class = 'input_admin' name = 'img' value = '{{ cover }}'>
    {% if discription_record %}
        <button class = 'but' id = 'SaveUpdateRecord' type = 'button'>Сохранить</button>
        <button class = 'but' id = 'Back' type = 'button'>Назад</button>
        <input type="text" id = 'record_id' value = '{{id_record}}' style = 'display:none'>
    {% else %}
        <button class = 'but' id = 'SaveNewRecord' type = 'button'>Сохранить</button>
    {% endif %}
</form>

