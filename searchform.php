<form class="form searching-form" action="/" method="get">
    <div class="searching-form__inner-wrap">
        <input class="search-form__input" type="text" name="s" id="search" value="<?php the_search_query();?>" placeholder='Поиск' required>

        <button type="submit">
            <svg>
                <use xlink:href="/wp-content/themes/InvestMag/img/svg/sprite.svg#search"></use>
            </svg>
            Поиск
        </button>
    </div>

</form>
