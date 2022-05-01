{% extends "components/app.view.php" %}
{% block title %} {{title}} {% endblock %}
{% block  descroption %}
	<meta name="description" content="{{ article['description'] }}" />
{% endblock %}
{% block content %}
<div id="article">
<h1 style="text-align: center;"><span style="color: #ffffff;">{{ article['title'] }}</span></h1>
<p>{{ article['discription']}}</p>
<p><img style="display: block; margin-left: auto; margin-right: auto;" src="{{ article['cover']}}" width="1015" height="533" data-src="https://habrastorage.org/webt/mc/6v/0f/mc6v0fpjb9ugjhx6zta2931nick.png" /></p>
{{ article['text']|raw }}   
<span class="date_and_view">
    <span class="date">
        {{ article['date_create'] }}
    </span>
    <span class="view">
        <span>
            <img src="/public/images/icons8-показать-30.png" alt="">
            {{ article['view']}}
        </span>
    </span>
</span>
<hr>
<span id="share">
    <script src="https://yastatic.net/share2/share.js"></script>
    <span>Поделится:</span>
    <span class="ya-share2" 
		data-curtain data-size="l" 
		data-services="vkontakte,telegram,twitter,pinterest"
		data-description = "{% autoescape %} {{ manga['description'] |raw }}{% endautoescape %}"
		data-image = "{{ manga['img'] }}"
    ></span>
</span>
{{ include('/components/comment_block.view.php') }} 
</div>
{% block script %}
<script src="/public/script/SendRequest.js"></script>
<script src="/public/script/Comment.js"></script>
{% endblock %}
{% endblock %}

