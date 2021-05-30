// подгрузка новостей категории "Мнения"

jQuery(document).ready(function ($) {

    var width = screen.width;

    jQuery.post(
        myPlugin.ajaxurl,
        {
            action: 'load_opinions',
            width: width,
        },
        
        function(response) {
            $('.opinions__list').html(response);

            if (width < 768) {
                $('.opinions__list').slick({
                    infinite: true,
                    autoplaySpeed: 2000,
                    arrows: false,
                    dots: true
                });
            }
        }
    );

    if ($('.opinions-sidebar__list')) {

        $('.opinions-sidebar__list').slick({
            infinite: true,
            autoplaySpeed: 2000,
            arrows: false,
            dots: true
        });
    }
});
