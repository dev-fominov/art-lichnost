<?php

add_filter('show_admin_bar', '__return_false'); // отключить верхнюю панель администратора

// Register Style And Scripts
function gulp_scripts()
{
	wp_enqueue_style('gulp-style', get_stylesheet_uri(), '1.1', true);
	wp_enqueue_style('gulp-main', get_template_directory_uri() . '/assets/main.min.css', '1.1', true);

	wp_deregister_script('jquery');
	wp_register_script('jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', false, null, true);
	wp_enqueue_script('jquery');

	// при подключении slick.min.js будут проблемы с работой слайдеров
	wp_enqueue_script('slick-script', get_template_directory_uri() . '/assets/js/slick.js', array(), '1.1', true);
	wp_enqueue_script('gulp-script', get_template_directory_uri() . '/assets/main.min.js', array(), '1.1', true);
}
// Добавить скрипты и стили на сайт
add_action('wp_enqueue_scripts', 'gulp_scripts');

function remove_styles()
{
	wp_deregister_style('contact-form-7');
	wp_deregister_style('wc-block-vendors-style');
	wp_deregister_style('wc-block-style');
	wp_deregister_style('wp-block-library');
}
add_action('wp_print_styles', 'remove_styles', 100);


function add_custom_taxonomies()
{
	// Camp
	register_taxonomy('camp-ages', ['camp'], [
		'hierarchical' => true,
		'label'        => 'Возрастная категория',
		'show_in_nav_menus' => true,
		'rewrite'      => ['slug' => 'camp-ages']
	]);
	register_taxonomy('camp-period', ['camp'], [
		'hierarchical' => true,
		'label'        => 'Период смен',
		'show_in_nav_menus' => true,
		'rewrite'      => ['slug' => 'camp-period']
	]);
	register_taxonomy('camp-section', ['camp'], [
		'hierarchical' => true,
		'label'        => 'Раздел лагеря',
		'rewrite'      => ['slug' => 'camp-section'],
		'public' => true,
		'show_in_nav_menus' => true
	]);

	// Courses
	register_taxonomy('courses-category', ['courses'], [
		'hierarchical' => true,
		'label'        => 'Категории курсов',
		'rewrite'      => ['slug' => 'courses-category'],
		'public' => true,
		'show_in_nav_menus' => true
	]);
	register_taxonomy('courses-ages', ['courses'], [
		'hierarchical' => true,
		'label'        => 'Возрастная категория',
		'show_in_nav_menus' => true,
		'rewrite'      => ['slug' => 'courses-ages']
	]);

}
add_action('init', 'add_custom_taxonomies');

// Сourses
function my_custom_post_courses()
{
	$labels = [
		'name'               => 'Курс',
		'singular_name'      => 'Курс',
		'add_new'            => 'Добавить курс',
		'add_new_item'       => 'Добавить',
		'edit_item'          => 'Редактировать',
		'new_item'           => 'Новый курс',
		'all_items'          => 'Все курсы',
		'view_item'          => 'Посмотреть',
		'search_items'       => 'Искать',
		'not_found'          => 'Курс не найден',
		'not_found_in_trash' => 'Курс не найден',
		'parent_item_colon'  => '',
		'menu_name'          => 'Курсы навыков'
	];
	$args = [
		'labels'        => $labels,
		'public'        => true,
		'rewrite'       => ['slug' => 'courses'],
		'supports'      => ['title'],
		'has_archive'   => true
	];
	register_post_type('courses', $args);
}
add_action('init', 'my_custom_post_courses');

// Camp
function my_custom_post_camp()
{
	$labels = [
		'name'               => 'Смена',
		'singular_name'      => 'Смена',
		'add_new'            => 'Добавить смену',
		'add_new_item'       => 'Добавить',
		'edit_item'          => 'Редактировать',
		'new_item'           => 'Новая смена',
		'all_items'          => 'Все смены',
		'view_item'          => 'Посмотреть',
		'search_items'       => 'Искать',
		'not_found'          => 'Смена не найдена',
		'not_found_in_trash' => 'Смена не найдена',
		'parent_item_colon'  => '',
		'menu_name'          => 'Смены лагеря'
	];
	$args = [
		'labels'        => $labels,
		'public'        => true,
		'rewrite'       => ['slug' => 'camp'],
		'supports'      => ['title'],
		'has_archive'   => true
	];
	register_post_type('camp', $args);
}
add_action('init', 'my_custom_post_camp');

// Docoments
function my_custom_post_docs()
{
	$labels = [
		'name'               => 'Документы',
		'singular_name'      => 'Документы',
		'add_new'            => 'Добавить документ',
		'add_new_item'       => 'Добавить',
		'edit_item'          => 'Редактировать',
		'new_item'           => 'Новый документ',
		'all_items'          => 'Все документы',
		'view_item'          => 'Посмотреть',
		'search_items'       => 'Искать',
		'not_found'          => 'Документ не найден',
		'not_found_in_trash' => 'Документ не найден',
		'parent_item_colon'  => '',
		'menu_name'          => 'Список документов'
	];
	$args = [
		'labels'        => $labels,
		'public'        => true,
		'rewrite'       => ['slug' => 'docs'],
		'supports'      => ['title'],
		'has_archive'   => true
	];
	register_post_type('docs', $args);
}
add_action('init', 'my_custom_post_docs');

// Vacancies
function my_custom_post_vacancies()
{
	$labels = [
		'name'               => 'Вакансии',
		'singular_name'      => 'Вакансия',
		'add_new'            => 'Добавить вакансию',
		'add_new_item'       => 'Добавить',
		'edit_item'          => 'Редактировать',
		'new_item'           => 'Новая вакансия',
		'all_items'          => 'Все вакансии',
		'view_item'          => 'Посмотреть',
		'search_items'       => 'Искать',
		'not_found'          => 'Вакансия не найдена',
		'not_found_in_trash' => 'Вакансия не найдена',
		'parent_item_colon'  => '',
		'menu_name'          => 'Вакансии'
	];
	$args = [
		'labels'        => $labels,
		'public'        => true,
		'rewrite'       => ['slug' => 'vacancies'],
		'supports'      => ['title'],
		'has_archive'   => true
	];
	register_post_type('vacancies', $args);
}
add_action('init', 'my_custom_post_vacancies');

// Projects
function my_custom_post_projects()
{
	$labels = [
		'name'               => 'Наши проекты',
		'singular_name'      => 'Наш проект',
		'add_new'            => 'Добавить проект',
		'add_new_item'       => 'Добавить',
		'edit_item'          => 'Редактировать',
		'new_item'           => 'Новый проект',
		'all_items'          => 'Все проекты',
		'view_item'          => 'Посмотреть',
		'search_items'       => 'Искать',
		'not_found'          => 'Проект не найден',
		'not_found_in_trash' => 'Проект не найден',
		'parent_item_colon'  => '',
		'menu_name'          => 'Проекты'
	];
	$args = [
		'labels'        => $labels,
		'public'        => true,
		'rewrite'       => ['slug' => 'projects'],
		'supports'      => ['title'],
		'has_archive'   => true
	];
	register_post_type('projects', $args);
}
add_action('init', 'my_custom_post_projects');


add_action('after_setup_theme', function () {
	register_nav_menus([
		'header_menu' => 'Меню в шапке',
		'footer_menu' => 'Меню в подвале'
	]);
});

add_theme_support( 'post-thumbnails', [ 'post' ] );








require get_template_directory() . '/api/art-api.php';













/* Удаление type="text/javascript" */
add_action('template_redirect', function () {
	ob_start(function ($buffer) {
		$buffer = str_replace(array('type="text/javascript"', "type='text/javascript'"), '', $buffer);
		$buffer = str_replace(array('type="text/css"', "type='text/css'"), '', $buffer);
		return $buffer;
	});
});
// Start Remove Meta Generators
remove_action('wp_head', 'wp_generator');
// End Remove Meta Generators
// Start delete emoji
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');
// End delete emoji