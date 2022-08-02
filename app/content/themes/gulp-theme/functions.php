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


function add_custom_taxonomies()
{
	register_taxonomy('camp-ages', ['camp'], [
		'hierarchical' => true,
		'label'        => 'Возрастная категория',
		'rewrite'      => ['slug' => 'camp-ages']
	]);
	register_taxonomy('camp-period', ['camp'], [
		'hierarchical' => true,
		'label'        => 'Период смен',
		'rewrite'      => ['slug' => 'camp-period']
	]);
	register_taxonomy('camp-section', ['camp'], [
		'hierarchical' => true,
		'label'        => 'Раздел лагеря',
		'rewrite'      => ['slug' => 'camp-section']
	]);
}
add_action('init', 'add_custom_taxonomies');


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