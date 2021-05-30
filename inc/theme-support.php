<?php

add_theme_support('title-tag');

add_theme_support('post-thumbnails');
set_post_thumbnail_size(330, 219); // размер миниатюры поста по умолчанию

add_image_size('portret', 142, 9999); // 300 в ширину и без ограничения в высоту
add_image_size('single-page', 600, 408, true); // Кадрирование изображения
add_image_size('screen-post', 630, 394, true);


add_filter( 'image_size_names_choose', 'my_custom_sizes' );
function my_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'portret' => 'Портрет колумниста',
        'single-page' => 'Иллюстрация для поста',
    ) );
}
        
register_nav_menus(
    array(
        'menu-1' => esc_html__( 'Primary', 'investmag' ),
        'Footer Menu' => 'Footer Menu Location',
        'Footer Menu Secondary' => 'Footer Second Menu Location',
        'Mobile Small Menu' => 'Mobile Small Menu Location',
        'Tags List Menu' => 'Secondary Menu'
    )
);

add_theme_support( 'customize-selective-refresh-widgets' );

function investmag_widgets_init() {
    register_sidebar(
        array(
            'name'          => esc_html__( 'Sidebar', 'investmag' ),
            'id'            => 'sidebar-main',
            'description'   => esc_html__( 'Add widgets here.', 'investmag' ),
            'before_sidebar' => '<sidebar class="">', // WP 5.6
            'after_sidebar'  => '</sidebar>', // WP 5.6
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    register_sidebar(
        array(
            'name'          => esc_html__( 'Sidebar страницы "Мнение"', 'investmag' ),
            'id'            => 'sidebar-opinions',
            'description'   => esc_html__( 'Add widgets here.', 'investmag' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    register_sidebar(
        array(
            'name'          => esc_html__( 'Sidebar страницы "Статья"', 'investmag' ),
            'id'            => 'sidebar-article',
            'description'   => esc_html__( 'Add widgets here.', 'investmag' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    register_sidebar(
        array(
            'name'          => esc_html__( 'Sidebar страницы "О площадке"', 'investmag' ),
            'id'            => 'sidebar-platform',
            'description'   => esc_html__( 'Add widgets here.', 'investmag' ),
            'before_sidebar' => '<aside class="platform-sidebar">', // WP 5.6
            'after_sidebar'  => '</aside>', // WP 5.6
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
}
add_action( 'widgets_init', 'investmag_widgets_init' );