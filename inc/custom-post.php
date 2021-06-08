<?php

add_action('init', 'register_post_types');

function register_post_types(){

    register_taxonomy('rubrics', ['main', 'slider', 'cards', 'opinions'],[
        'labels' => array(
            'name' => 'Темы',
            'singular_name' => 'Тема поста',
            ),
        'public' => true,
        'hierarchical' => true,
        'show_in_rest' => true,
        'show_in_nav_menus' => true,
    ]);

    register_post_type('opinions', [
        'label'  => null,
        'labels' => [
            'name'               => 'Мнения', // основное название для типа записи
            'singular_name'      => 'Мнение', // название для одной записи этого типа
            'add_new'            => 'Добавить мнение', // для добавления новой записи
            'add_new_item'       => 'Добавление мнения', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование мнения', // для редактирования типа записи
            'new_item'           => 'Новое мнение', // текст новой записи
            'view_item'          => 'Смотреть мнение', // для просмотра записи этого типа.
            'search_items'       => 'Искать мнение', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'menu_name'          => 'Мнения', // название меню
        ],
        
        'public'              => true,
        'show_in_menu'        => true, // показывать ли в меню адмнки
        'show_in_rest'        => true, // добавить в REST API. C WP 4.7
        'menu_icon'           => null,
        'hierarchical'        => false,
        'supports'            => [ 'title', 'editor', 'author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'],
        'taxonomies'          => ['rubrics', 'post_tag'],
        'has_archive'         => true,
        'rewrite'             => true,
        'query_var'           => true,
        'menu_icon'          => 'dashicons-format-quote',
    ] );

    register_post_type('top', [
        'label'  => null,
        'labels' => [
            'name'               => 'Главное', // основное название для типа записи
            'singular_name'      => 'Главное', // название для одной записи этого типа
            'add_new'            => 'Добавить в главное', // для добавления новой записи
            'add_new_item'       => 'Добавление в главное', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование главного', // для редактирования типа записи
            'new_item'           => '', // текст новой записи
            'view_item'          => '', // для просмотра записи этого типа.
            'search_items'       => '', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено вкорзине
        ],
        
        'public'              => true,
        'show_in_menu'        => true, // показывать ли в меню адмнки
        'show_in_rest'        => true, // добавить в REST API. C WP 4.7
        'menu_icon'           => null,
        'hierarchical'        => false,
        'supports'            => [ 'title', 'editor', 'thumbnail','excerpt','trackbacks','custom-fields','revisions','page-attributes','post-formats'],
        'has_archive'         => true,
        'rewrite'             => true,
        'query_var'           => true,
        'menu_icon'          => 'dashicons-format-image',
    ] );

    register_post_type('main', [
        'label'  => null,
        'labels' => [
            'name'               => 'Обычные посты', // основное название для типа записи
            'singular_name'      => 'Обычный пост', // название для одной записи этого типа
            'add_new'            => 'Добавить пост', // для добавления новой записи
            'add_new_item'       => 'Добавление поста', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование поста', // для редактирования типа записи
            'new_item'           => 'Новый пост', // текст новой записи
            'view_item'          => 'Смотреть пост', // для просмотра записи этого типа.
            'search_items'       => 'Искать пост', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'menu_name'          => 'Обычный пост', // название меню
        ],
        
        'public'              => true,
        'show_in_menu'        => true, // показывать ли в меню адмнки
        'show_in_rest'        => true, // добавить в REST API. C WP 4.7
        'menu_icon'           => null,
        'hierarchical'        => false,
        'supports'            => [ 'title', 'editor', 'author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'],
        'taxonomies'          => ['rubrics', 'post_tag'],
        'has_archive'         => true,
        'rewrite'             => true,
        'query_var'           => true,
        'menu_icon'          => 'dashicons-images-alt2',
    ] );

    register_post_type('slider', [
        'label'  => null,
        'labels' => [
            'name'               => 'Слайдер', // основное название для типа записи
            'singular_name'      => 'Слайдер', // название для одной записи этого типа
            'add_new'            => 'Добавить слайдер', // для добавления новой записи
            'add_new_item'       => 'Добавление слайдера', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование слайдера', // для редактирования типа записи
            'new_item'           => 'Новый слайдер', // текст новой записи
            'view_item'          => 'Смотреть слайдер', // для просмотра записи этого типа.
            'search_items'       => 'Искать слайдер', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено вкорзине
        ],
        
        'public'              => true,
        'show_in_menu'        => true, // показывать ли в меню адмнки
        'show_in_rest'        => true, // добавить в REST API. C WP 4.7
        'menu_icon'           => null,
        'hierarchical'        => false,
        'supports'            => [ 'title', 'editor', 'thumbnail','excerpt','trackbacks','custom-fields','revisions','page-attributes','post-formats'],
        'taxonomies'          => ['rubrics', 'post_tag'],
        'has_archive'         => true,
        'rewrite'             => true,
        'query_var'           => true,
        'menu_icon'          => 'dashicons-format-image',
    ] );

    register_post_type('cards', [
        'label'  => null,
        'labels' => [
            'name'               => 'Карточки', // основное название для типа записи
            'singular_name'      => 'Карточка', // название для одной записи этого типа
            'add_new'            => 'Добавить Карточку', // для добавления новой записи
            'add_new_item'       => 'Добавление Карточки', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование Карточки', // для редактирования типа записи
            'new_item'           => 'Новая карточка', // текст новой записи
            'view_item'          => 'Смотреть карточку', // для просмотра записи этого типа.
            'search_items'       => 'Искать карточку', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено вкорзине
        ],
        
        'public'              => true,
        'show_in_menu'        => true, // показывать ли в меню адмнки
        'show_in_rest'        => true, // добавить в REST API. C WP 4.7
        'menu_icon'           => null,
        'hierarchical'        => false,
        'supports'            => [ 'title', 'editor', 'thumbnail','excerpt','trackbacks','custom-fields','revisions','page-attributes','post-formats'],
        'taxonomies'          => ['rubrics', 'post_tag'],
        'has_archive'         => true,
        'rewrite'             => true,
        'query_var'           => true,
        'menu_icon'          => 'dashicons-format-gallery',
    ] );

    register_post_type('partners', [
        'label'  => null,
        'labels' => [
            'name'               => 'Партнеры', // основное название для типа записи
            'singular_name'      => 'Партнер', // название для одной записи этого типа
            'add_new'            => 'Добавить партнера', // для добавления новой записи
            'add_new_item'       => 'Добавление партнера', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование партнера', // для редактирования типа записи
            'new_item'           => 'Новый партнер', // текст новой записи
            'view_item'          => 'Смотреть партнера', // для просмотра записи этого типа.
            'search_items'       => 'Искать партнера', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено вкорзине
        ],
        
        'public'              => true,
        'show_in_menu'        => true, // показывать ли в меню адмнки
        'show_in_rest'        => true, // добавить в REST API. C WP 4.7
        'menu_icon'           => null,
        'hierarchical'        => false,
        'supports'            => [ 'title', 'editor', 'thumbnail','excerpt','trackbacks','custom-fields','revisions','page-attributes','post-formats'],
        'taxonomies'          => ['post_tag'],
        'has_archive'         => true,
        'rewrite'             => true,
        'query_var'           => true,
        'menu_icon'          => 'dashicons-buddicons-buddypress-logo',
    ] );

    register_post_type('columnists', [
        'label'  => null,
        'labels' => [
            'name'               => 'Колумнисты', // основное название для типа записи
            'singular_name'      => 'Колумнист', // название для одной записи этого типа
            'add_new'            => 'Добавить колумниста', // для добавления новой записи
            'add_new_item'       => 'Добавление колумниста', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование колумниста', // для редактирования типа записи
            'new_item'           => 'Новый колумнист', // текст новой записи
            'view_item'          => 'Смотреть колумниста', // для просмотра записи этого типа.
            'search_items'       => 'Искать колумниста', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено вкорзине
        ],
        
        'public'              => true,
        'show_in_menu'        => true, // показывать ли в меню адмнки
        'show_in_rest'        => true, // добавить в REST API. C WP 4.7
        'menu_icon'           => null,
        'hierarchical'        => false,
        'supports'            => [ 'title', 'editor', 'thumbnail','excerpt','trackbacks','custom-fields','revisions','page-attributes','post-formats'],
        'taxonomies'          => ['rubrics', 'post_tag'],
        'has_archive'         => true,
        'rewrite'             => true,
        'query_var'           => true,
        'menu_icon'          => 'dashicons-buddicons-buddypress-logo',
    ] );
}

add_action( 'init', 'simple_post', 999 );
function simple_post(){
    unregister_post_type('simple-post');
}
