{% extends "components/app.view.php" %}
{% block title %} Главная {% endblock %}
{% block content %}
<div id="lenta_block">
    <div id = 'lenta'>
        {% for item in post %}
                {% if item.type == 'article' %} 
                    {{ include('/components/state_post.view.php') }}  
                {% elseif item.type == 'record' %} 
                    {{ include('/components/zapis_post.view.php') }}
                {% endif %}
        {% endfor %}
        <!-- {{ include('/components/state_post.view.php') }} -->
    </div>
    <div id = 'more'>
        <button class = 'but' id = 'More'>Еще</button>
    </div>
</div>  
{% endblock %}
{% block script %}
<script src="/public/script/SendRequest.js"></script>
<script src="/public/script/GetArticleAndRecord.js"></script>
{% endblock %}