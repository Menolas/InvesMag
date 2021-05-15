<div class="share-social  dlg-modal dlg-modal-fade">
    <h2 class="share-social__title">Поделиться этой новостью:</h2>
    <ul class="share-social__list">
        <li class="share-social__item">
            <a href="https://t.me/share/url?url=<?=get_permalink();?>" class="share-social__link" target="_blank">
                <svg>
                    <use xlink:href="/wp-content/themes/InvestMag/img/svg/sprite.svg#tel"></use>
                </svg>
                <span>Поделиться в Telegram</span>
            </a>
        </li>
        <li class="share-social__item">
            <a href="http://www.facebook.com/sharer.php?u=<?=get_permalink();?>&picture=<?=get_the_post_thumbnail_url();?>" class="share-social__link" target="_blank">
                <svg>
                    <use xlink:href="/wp-content/themes/InvestMag/img/svg/sprite.svg#fb"></use>
                </svg>
                <span>Поделиться в Facebook</span>
            </a>
        </li>
        <li class="share-social__item">
            <a href="viber://forward?text=<?=get_permalink();?>" class="share-social__link" target="_blank">
                <svg>
                    <use xlink:href="/wp-content/themes/InvestMag/img/svg/sprite.svg#viber"></use>
                </svg>
                <span>Поделиться в Viber</span>
            </a>
        </li>
        <li class="share-social__item">
            <a href="https://api.whatsapp.com/send?text=<?=get_permalink();?>" class="share-social__link" target="_blank">
                <svg>
                    <use xlink:href="/wp-content/themes/InvestMag/img/svg/sprite.svg#whatsapp"></use>
                </svg>
                <span>Поделиться в WhatsApp</span>
            </a>
        </li>
        <li class="share-social__item">
            <a href="http://twitter.com/share?url=<?=get_permalink();?>&text=url%20encoded%20text&via=TWITTERNAME" class="share-social__link" target="_blank">
                <svg>
                    <use xlink:href="/wp-content/themes/InvestMag/img/svg/sprite.svg#twitter"></use>
                </svg>
                <span>Поделиться в Twitter</span>
            </a>
        </li>
        <li class="share-social__item">
            <a href="http://vk.com/share.php?url=<?=get_permalink();?>&title=Website%20Title&description=Shared%20Page%20Description&image=<?=get_the_post_thumbnail_url();?>" class="share-social__link" target="_blank">
                <svg>
                    <use xlink:href="/wp-content/themes/InvestMag/img/svg/sprite.svg#vk"></use>
                </svg>
                <span>Поделиться в ВК</span>
            </a>
        </li>
        <li class="share-social__item">
            <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?=get_permalink();?>" class="share-social__link" target="_blank">
                <svg>
                    <use xlink:href="/wp-content/themes/InvestMag/img/svg/sprite.svg#linkedin"></use>
                </svg>
                <span>Поделиться в LinkedIn</span>
            </a>
        </li>
    </ul>
    
    <p>Поделиться ссылкой:</p>
    <div class="share-social__form-wrap">
        <input class="share-social__form-input" type="text" name="link" value="<?=get_permalink();?>">
        <button class="btn">Копировать</button>
    </div>
</div>
