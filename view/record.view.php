{% extends "components/app.view.php" %}
{% block title %} {{title}} {% endblock %}
{% block  descroption %}
	<meta name="description" content="{{ record['discription'] }}" />
{% endblock %}
{% block content %}
<div id="article">
<h1 style="text-align: center;"><span style="color: #ffffff;">{{ record['title'] }}</span></h1>
<p>{{ record['discription']}}</p>
<p><img style="display: block; margin-left: auto; margin-right: auto;" src="{{ record['cover']}}" /></p>

<p>
    {{ record.text|raw }}  
</p> 
<span class="date_and_view">
    <span class="date">
        {{ record['date_create'] }}
    </span>
    <span class="view">
        <span>
            <img src="/public/images/icons8-показать-30.png" alt="">
            {{ record['view'] }}
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
		data-description = "{% autoescape %} {{record['description'] |raw }}{% endautoescape %}"
		data-image = "{{record['cover'] }}"
    ></span>
</span>
{{ include('/components/comment_block.view.php') }} 
</div>
{% block script %}
<script src="/public/script/SendRequest.js"></script>
<script src="/public/script/Comment.js"></script>
{% endblock %}
{% endblock %}