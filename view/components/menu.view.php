<div id="menu">
        <ul>
            <li><a href = '/'>Главная</a></li>
            {% if user.name %}
                <li><a href = '#'>{{ user.name }}</a></li>
                <li><a href = '/exit'>Выйти</a></li>
            {% else %}
                <li><a href = '/registration'>Регистрация</a></li>
                <li><a href = '/autorisation'>Авторизация</a></li>
            {% endif %}
        </ul>
    </div>