<!doctype html>
<html lang="ru-RU">

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo wp_get_document_title(); ?></title>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>


	<?php

	$terms = get_terms(array('taxonomy' => 'camp-section'));

	foreach ($terms as $term) {
		$category_link = get_category_link($term->term_id);
		echo '<a href="' . $category_link . '">' . $term->name . '</a>';
	}


	?>

