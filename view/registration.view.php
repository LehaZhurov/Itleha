{% extends "components/app.view.php" %}
{% block title %} Регистрация {% endblock %}
{% block content %}
<div id="auto_form">
    <form action="/#" id = 'reg_form'>
        <h1>Регистрация</h1>
        <label for="name">Ник</label>
        <input type="text" name = 'name' id = 'name' placeholder="Ник">
        <label for="lastname">Еще ник?</label>
        <input type="text" name = 'lastname' id = 'lastname' placeholder="Еще ник?">
        <label for="email">Email</label>
        <input type="text" name = 'email' id = 'email' placeholder="Email">
        <label for="first_password">Пароль</label>
        <input type="password" name = 'first_password' id = 'first_password' placeholder="Пароль">
        <label for="second_password">Повтори пароль</label>
        <input type="password" name = 'second_password' id = 'second_password' placeholder="Повтори пароль">
        <button class = 'but' id = 'but_new_reg' type = 'button'>Регистрация</button>
    </form>
</div>
{% endblock %}
{% block script %}
<script src="/public/script/SendRequest.js"></script>
<script src="/public/script/Registration.js"></script>

{% endblock %}