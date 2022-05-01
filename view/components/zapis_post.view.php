<div class = 'post'>
    <div class="state_post">
        <p class="discription_state">
            {{ item.text|raw }}
        </p>
        <img src="{{item.cover}}" alt="">
        <div class="date_and_view">
            <span class="date">
                 {{ item.date_create }}
            </span>
            <span class = 'combut'>
                <a href="/record/{{ item.url}}">Комментировать({{ item.comment_coll }})</a>
            </span>
            <span class="view">
                <span>
                <img src="/public/images/icons8-показать-30.png" alt="">
                    {{item.view}}
                </span>
            </span>
        </div>
    </div>
</div>