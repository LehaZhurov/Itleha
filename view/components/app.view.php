<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {% block  descroption %}
    {% endblock %}
    <title>{% block title %}{% endblock %}</title>
    <link rel="stylesheet" href="/public/style/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="/public/style/mess.css">
    <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&display=swap" rel="stylesheet">
    {% block link %} {% endblock %}
</head>
<body>
<div id="work_area">
    <header id = 'header'>
        <div id="logo">
        ITL
        </div>
        <form id = 'search' action = '/search/' method = 'GET'>
            <input type="text" placeholder="Поиск" name = 'q'><button><img src="/public/images/icons8-офтальмология-50.png" alt=""></button>
        </form>
    </header>
    <div id="content">
        {{ include('/components/menu.view.php') }}
        {% block content %} {% endblock %}
    </div>
    <footer id = 'footer'>
        <div id = copyright>
            &copy ITL <?php echo date('Y'); ?>
        </div>
        <div>
            Жалобы и предложения:exemale@mail.gu
        </div>
        {% block script %} {% endblock %}
        <script src="/public/script/mess.js" ></script>
    </footer>
</div>
</body>
</html>