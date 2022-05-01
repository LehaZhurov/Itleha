{% extends "components/app.view.php" %}
{% block title %} {{ title }} {% endblock %}
{% block content %}
<div id="auto_form">
    <form action="/#" id = 'auto'>
        <h1>Авторизация</h1>
        <label for="email">Email</label>
        <input type="text" name = 'email' id = 'email' placeholder="Email">
        <label for="first_password">Пароль</label>
        <input type="password" name = 'first_password' id = 'first_password' placeholder="Пароль">
        <button class = but id = 'but_auto' type ='button'> Войти</button>
    </form>
</div>
{% endblock %}
{% block script %}
<script src="/public/script/SendRequest.js"></script>
<script src="/public/script/Autorization.js"></script>
{% endblock %}