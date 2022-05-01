<form action="#" id = 'form_article' class = 'form_admin'>
    <label for="#name_state">Название</label>
    <input type="text" placeholder="Название статьи" name = 'name_article' id = 'name_state' class = 'input_admin' value = '{{name_article}}'>
    <label for="#name_state">Описание</label>
    <textarea type="text" placeholder="Описание статьи" name = 'discription' id = 'discription' class = 'input_admin'>
      {{discription_article}}
    </textarea>
    <label for="#name_state">Обложка</label>
    <input type="file" placeholder="Обложка" name = 'cover' id = 'cover' class = 'input_admin' value = '{{ cover }}'>
    <textarea id = 'mytextarea'>
        {{ text_article }}
        
    </textarea>
        
    {% if text_article %}
        <button class = 'but' id = 'SaveUpdateArticle' type = 'button'>Сохранить</button>
        <button class = 'but' id = 'Back' type = 'button'>Назад</button>
        <input type="text" id = 'article_id' value = '{{id_article}}' style = 'display:none'>
    {% else %}
        <button class = 'but' id = 'SaveNewArticle' type = 'button'>Сохранить</button>
    {% endif %}
</form>

