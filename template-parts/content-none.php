<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 */

?>

<section class="no-results not-found">

        <?php if (is_search()) : ?>
            <p>Ничего не найдено, уточните критерий поиска</p>

            <div class="search-rules">
                <p>
                    Обратите внимание на простые правила использования 
                    контекстного поиска по информации сайта
                </p>
                <ul class="search-rules__list">
                    <li class="search-rules__item">
                        Фраза для поиска может включать несколько слов. 
                        В результате будет произведен поиск содержимого, 
                        в котором имеются все эти слова.
                    </li>
                    <li class="search-rules__item">
                        Слова фразы могут быть неполными. Так, в частности, 
                        при поиске по слову <b>"крас"</b> будут найдены и статьи,
                        содержащие <b>"красоты"</b> и <b>"прекрасно"</b>.
                    </li>
                    <li class="search-rules__item">
                        Регистр не оказывает влияния на результат поиска, т.е. 
                        <b>"минск"</b> и <b>"Минск"</b> дадут одинаковый результат.
                    </li>
                </ul>
            </div>
        <?php else : ?>
            
            <section class="error-404 not-found">

                <p class="error-404__text">Страница не найдена</p>

                <span>404</span>

                <a class="error-404__link" href="/">Перейти на главную страницу</a>

            </section><!-- .error-404 -->
        
        <?php endif; ?>
    
</section>
