<div class = 'post'>
    <div class="state_post">
        <img src="{{ item.cover }}" alt="">
        <a href="/article/{{ item.url }}"><h2 class="name_state">{{ item.title }}</h2></a>
        <p class="discription_state">
            {{ item.discription }}
        </p>
        <div class="date_and_view">
            <span class="date">
                {{ item.date_create }}
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