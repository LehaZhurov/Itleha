{% extends "components/app.view.php" %}
{% block link %} 
        <link rel="stylesheet" href="/public/style/tab.css">
        <link rel="stylesheet" href="/public/style/admin.css">
{% endblock %}
{% block title %} {{title}} {% endblock %}
{% block content %}
<div id="admin_tab">
<div class="tabs">
        <input type="radio" name="tab-btn" id="tab-btn-1" value="" checked>
        <label for="tab-btn-1">Статья</label>
        <input type="radio" name="tab-btn" id="tab-btn-2" value="" >
        <label for="tab-btn-2">Пост</label>
        <input type="radio" name="tab-btn" id="tab-btn-3" value="">
        <label for="tab-btn-3" id = 'GetArticleRecord'>Список записей</label>
        <div id="content-1">
                 {{ include('/components/wysgyv.view.php') }}
        </div>
        <div id="content-2">
                {{ include('/components/record.view.php') }}
        </div>
        <div id="content-3">
                {{ include('/components/all_record_and_article.view.php') }}
        </div>
</div>
</div>
{% block script %} 
<script src="https://cdn.tiny.cloud/1/rjp8ruy992cydi3k4s0fywofjwz93tefthg6z4zu4irkytiw/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#mytextarea',
        plugins: 'code,fullscreen,codesample,link'
    });
</script>
<script src="/public/script/SendRequest.js"></script>

{% if text_article %}
<script src="/public/script/admin/RedactArticle.js"></script>       
{% elseif discription_record%}
<script src="/public/script/admin/RedactRecord.js"></script>
{% else %}
<script src="/public/script/admin/CreateArticle.js"></script>
<script src="/public/script/admin/CreateRecord.js"></script>
{% endif %}
<script src="/public/script/admin/GetArticleRecord.js"></script>
<script src="/public/script/admin/LocationMove.js"></script>


{% endblock %}
{% endblock %}