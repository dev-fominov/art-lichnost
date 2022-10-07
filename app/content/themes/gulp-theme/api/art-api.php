<?php

add_action('rest_api_init', function () {

	$prefix = 'art/v1';

	register_rest_route($prefix, 'page/contacts', [
		'methods' => 'GET',
		'callback' => 'art_page_contacts',
		'permission_callback' => '__return_true'
	]);
	register_rest_route($prefix, 'page/home', [
		'methods' => 'GET',
		'callback' => 'art_page_home',
		'permission_callback' => '__return_true'
	]);
	register_rest_route($prefix, 'page/blogs', [
		'methods' => 'GET',
		'callback' => 'art_page_blogs',
		'permission_callback' => '__return_true'
	]);
	register_rest_route($prefix, 'page/blogs/(?P<slug>[a-zA-Z0-9-]+)', [
		'methods' => 'GET',
		'callback' => 'art_page_blogs_post',
		'permission_callback' => '__return_true'
	]);
	register_rest_route($prefix, 'page/psychologist', [
		'methods' => 'GET',
		'callback' => 'art_page_psychologist',
		'permission_callback' => '__return_true'
	]);

	// Лагеря
	register_rest_route($prefix, 'page/camp', [
		'methods' => 'GET',
		'callback' => 'art_page_camp',
		'permission_callback' => '__return_true'
	]);

	register_rest_route($prefix, 'camp/filter', [
		'methods' => 'GET',
		'callback' => 'art_camp_filter',
		'permission_callback' => '__return_true'
	]);

	register_rest_route($prefix, 'page/skills', [
		'methods' => 'GET',
		'callback' => 'art_page_skills',
		'permission_callback' => '__return_true'
	]);

	register_rest_route($prefix, 'page/professions', [
		'methods' => 'GET',
		'callback' => 'art_page_professions',
		'permission_callback' => '__return_true'
	]);

	register_rest_route($prefix, 'page/tourist-holidays', [
		'methods' => 'GET',
		'callback' => 'art_page_tourist_holidays',
		'permission_callback' => '__return_true'
	]);

	register_rest_route($prefix, 'page/merch', [
		'methods' => 'GET',
		'callback' => 'art_page_merch',
		'permission_callback' => '__return_true'
	]);
});


function art_page_merch()
{
	$data = [];

	$my_page = get_page_by_path('merch', OBJECT, 'page');
	$id_page = $my_page->ID;

	$post = get_post($id_page);
	$title = apply_filters('the_content', $post->post_content);

	$array_description_merch = get_field('kak_kupit', $id_page);
	foreach ($array_description_merch as $item) {
		$description_merch[] = $item['punkty'];
	}

	$description = [
		'title_merch' => get_field('title_merch', $id_page),
		'description_merch' => $description_merch,
	];

	$array_merch = get_field('aleksandr-merch', $id_page) ? get_field('aleksandr-merch', $id_page) : null;
	if ($array_merch) {
		foreach ($array_merch as $item) {
			$gallery_images = $item['gallery_images'];
			$images = null;
			foreach ($gallery_images as $item_image) {
				$images[] = [
					'url' => $item_image['images']['url'],
					'alt' => $item_image['images']['title']
				];
			}

			$array_size = $item['razmery'];
			$size = null;
			foreach ($array_size as $item_size) {
				$stock = $item_size['nalichie'][0] ? $item_size['nalichie'][0] : 0;
				$size[] = [
					'title' => $item_size['nazvanie'],
					'stock' => (int)$stock
				];
			}

			$merch[] = [
				'title' => $item['nazvanie'],
				'description' => $item['opisanie'],
				'price' => $item['price-merch'],
				'gallery' => $images,
				'size' => $size,
			];
		}
	}

	$data['id_page'] = $id_page;
	$data['title'] = $title;
	$data['description'] = $description;
	$data['merch'] = $merch;

	return $data;
}

function art_page_skills()
{
	$data = [];

	$my_page = get_term_by('slug', 'skills', 'camp-section');
	$id_page = 'term_' . $my_page->term_id . '';

	$background_img = ['url' => get_field('bac_img_section', $id_page)['url'], 'alt' => get_field('bac_img_section', $id_page)['title']];
	$background_video = get_field('bac_video_section', $id_page);

	$post = get_field('title-section', $id_page);
	$content = apply_filters('the_content', $post);

	$description_section = get_field('description_section', $id_page);
	$content_description_section = apply_filters('the_content', $description_section);
	$izobrazhenie = ['url' => get_field('izobrazhenie', $id_page)['url'], 'alt' => get_field('izobrazhenie', $id_page)['title']];
	$id_video = get_field('id_video', $id_page);

	$benefits_title = get_field('title_section_block', $id_page);
	$array_benefits_parents = get_field('preimushhestva_dlya_roditelej', $id_page);
	$array_benefits_children = get_field('preimushhestva_dlya_detok', $id_page);
	foreach ($array_benefits_parents as $item) {
		$benefits_parents[] = $item['nazvanie'];
	}
	foreach ($array_benefits_children as $item) {
		$benefits_children[] = $item['nazvanie'];
	}

	$mesta_prozhivaniya_title = get_field('title_section_block_video', $id_page);
	$mesta_prozhivaniya_description = get_field('description_section_block_video', $id_page);
	$array_video_mesta_prozhivaniya = get_field('video_mesta_prozhivaniya', $id_page);
	foreach ($array_video_mesta_prozhivaniya as $item) {
		$mesta_prozhivaniya[] = [
			'title' => $item['zagolovok'],
			'description' => $item['opisanie'],
			'id_video' => $item['id_video'],
			'oblozhka' => ['url' => $item['oblozhka']['url'], 'alt' => $item['oblozhka']['title']]
		];
	}

	$programm_title = get_field('zagolovok_bloka_programm', $id_page);
	$array_programm = get_field('opisanie_bloka_programm', $id_page);
	foreach ($array_programm as $item) {
		$programm[] = $item['nazvanie'];
	}
	$programm_img = ['url' => get_field('izobrazhenie_programm', $id_page)['url'], 'alt' => get_field('izobrazhenie_programm', $id_page)['title']];

	$daily_regime_title = get_field('zagolovok_bloka_rezim', $id_page);
	$array_daily_regime = get_field('rasporyadok_dnya', $id_page);
	foreach ($array_daily_regime as $item) {
		$daily_regime[] = $item['vremya_i_meropriyatie'];
	}

	$includ_title = get_field('zagolovok_bloka_price', $id_page);
	$includ_post = get_field('opisanie_bloka_price', $id_page);
	$includ_content = apply_filters('the_content', $includ_post);

	$array_faq = get_field('faq', $id_page);
	foreach ($array_faq as $item) {
		$faq[] = ['question' => $item['vopros'], 'answer' => $item['otvet']];
	}

	$request_title = get_field('zagolovok_zayavka', $id_page);
	$array_request = get_field('spisok_punktov', $id_page);
	foreach ($array_request as $item) {
		$request[] = $item['nazvanie'];
	}
	$request_img = ['url' => get_field('izobrazhenie_razdel_lagerya', $id_page)['url'], 'alt' => get_field('izobrazhenie_razdel_lagerya', $id_page)['title']];

	$data['id_page'] = $my_page->term_id;
	$data['background_img'] = $background_img;
	$data['background_video'] = $background_video;
	$data['content'] = $content;

	$data['description_text'] = $content_description_section;
	$data['description_img'] = $izobrazhenie;
	$data['description_video'] = $id_video;

	$data['benefits_title'] = $benefits_title;
	$data['benefits_parents'] = $benefits_parents;
	$data['benefits_children'] = $benefits_children;

	$data['prozhivanie_title'] = $mesta_prozhivaniya_title;
	$data['prozhivanie_description'] = $mesta_prozhivaniya_description;
	$data['mesta_prozhivaniya'] = $mesta_prozhivaniya;

	$data['programm_title'] = $programm_title;
	$data['programm'] = $programm;
	$data['programm_img'] = $programm_img;

	$data['daily_regime_title'] = $daily_regime_title;
	$data['daily_regime'] = $daily_regime;

	$data['includ_title'] = $includ_title;
	$data['includ_content'] = $includ_content;

	$data['faq'] = $faq;

	$data['request_title'] = $request_title;
	$data['request'] = $request;
	$data['request_img'] = $request_img;

	return $data;
}

function art_page_professions()
{
	$data = [];

	$my_page = get_term_by('slug', 'professions', 'camp-section');
	$id_page = 'term_' . $my_page->term_id . '';

	$background_img = ['url' => get_field('bac_img_section', $id_page)['url'], 'alt' => get_field('bac_img_section', $id_page)['title']];
	$background_video = get_field('bac_video_section', $id_page);

	$post = get_field('title-section', $id_page);
	$content = apply_filters('the_content', $post);

	$description_section = get_field('description_section', $id_page);
	$content_description_section = apply_filters('the_content', $description_section);
	$izobrazhenie = ['url' => get_field('izobrazhenie', $id_page)['url'], 'alt' => get_field('izobrazhenie', $id_page)['title']];
	$id_video = get_field('id_video', $id_page);

	$benefits_title = get_field('title_section_block', $id_page);
	$array_benefits_parents = get_field('preimushhestva_dlya_roditelej', $id_page);
	$array_benefits_children = get_field('preimushhestva_dlya_detok', $id_page);
	foreach ($array_benefits_parents as $item) {
		$benefits_parents[] = $item['nazvanie'];
	}
	foreach ($array_benefits_children as $item) {
		$benefits_children[] = $item['nazvanie'];
	}

	$mesta_prozhivaniya_title = get_field('title_section_block_video', $id_page);
	$mesta_prozhivaniya_description = get_field('description_section_block_video', $id_page);
	$array_video_mesta_prozhivaniya = get_field('video_mesta_prozhivaniya', $id_page);
	foreach ($array_video_mesta_prozhivaniya as $item) {
		$mesta_prozhivaniya[] = [
			'title' => $item['zagolovok'],
			'description' => $item['opisanie'],
			'id_video' => $item['id_video'],
			'oblozhka' => ['url' => $item['oblozhka']['url'], 'alt' => $item['oblozhka']['title']]
		];
	}

	$programm_title = get_field('zagolovok_bloka_programm', $id_page);
	$array_programm = get_field('opisanie_bloka_programm', $id_page);
	foreach ($array_programm as $item) {
		$programm[] = $item['nazvanie'];
	}
	$programm_img = ['url' => get_field('izobrazhenie_programm', $id_page)['url'], 'alt' => get_field('izobrazhenie_programm', $id_page)['title']];

	$daily_regime_title = get_field('zagolovok_bloka_rezim', $id_page);
	$array_daily_regime = get_field('rasporyadok_dnya', $id_page);
	foreach ($array_daily_regime as $item) {
		$daily_regime[] = $item['vremya_i_meropriyatie'];
	}

	$includ_title = get_field('zagolovok_bloka_price', $id_page);
	$includ_post = get_field('opisanie_bloka_price', $id_page);
	$includ_content = apply_filters('the_content', $includ_post);

	$array_faq = get_field('faq', $id_page);
	foreach ($array_faq as $item) {
		$faq[] = ['question' => $item['vopros'], 'answer' => $item['otvet']];
	}

	$request_title = get_field('zagolovok_zayavka', $id_page);
	$array_request = get_field('spisok_punktov', $id_page);
	foreach ($array_request as $item) {
		$request[] = $item['nazvanie'];
	}
	$request_img = ['url' => get_field('izobrazhenie_razdel_lagerya', $id_page)['url'], 'alt' => get_field('izobrazhenie_razdel_lagerya', $id_page)['title']];

	$data['id_page'] = $my_page->term_id;
	$data['background_img'] = $background_img;
	$data['background_video'] = $background_video;
	$data['content'] = $content;

	$data['description_text'] = $content_description_section;
	$data['description_img'] = $izobrazhenie;
	$data['description_video'] = $id_video;

	$data['benefits_title'] = $benefits_title;
	$data['benefits_parents'] = $benefits_parents;
	$data['benefits_children'] = $benefits_children;

	$data['prozhivanie_title'] = $mesta_prozhivaniya_title;
	$data['prozhivanie_description'] = $mesta_prozhivaniya_description;
	$data['mesta_prozhivaniya'] = $mesta_prozhivaniya;

	$data['programm_title'] = $programm_title;
	$data['programm'] = $programm;
	$data['programm_img'] = $programm_img;

	$data['daily_regime_title'] = $daily_regime_title;
	$data['daily_regime'] = $daily_regime;

	$data['includ_title'] = $includ_title;
	$data['includ_content'] = $includ_content;

	$data['faq'] = $faq;

	$data['request_title'] = $request_title;
	$data['request'] = $request;
	$data['request_img'] = $request_img;

	return $data;
}

function art_page_tourist_holidays()
{
	$data = [];

	$my_page = get_term_by('slug', 'tourist-holidays', 'camp-section');
	$id_page = 'term_' . $my_page->term_id . '';

	$background_img = ['url' => get_field('bac_img_section', $id_page)['url'], 'alt' => get_field('bac_img_section', $id_page)['title']];
	$background_video = get_field('bac_video_section', $id_page);

	$post = get_field('title-section', $id_page);
	$content = apply_filters('the_content', $post);

	$description_section = get_field('description_section', $id_page);
	$content_description_section = apply_filters('the_content', $description_section);
	$izobrazhenie = ['url' => get_field('izobrazhenie', $id_page)['url'], 'alt' => get_field('izobrazhenie', $id_page)['title']];
	$id_video = get_field('id_video', $id_page);

	$benefits_title = get_field('title_section_block', $id_page);
	$array_benefits_parents = get_field('preimushhestva_dlya_roditelej', $id_page);
	$array_benefits_children = get_field('preimushhestva_dlya_detok', $id_page);
	foreach ($array_benefits_parents as $item) {
		$benefits_parents[] = $item['nazvanie'];
	}
	foreach ($array_benefits_children as $item) {
		$benefits_children[] = $item['nazvanie'];
	}

	$mesta_prozhivaniya_title = get_field('title_section_block_video', $id_page);
	$mesta_prozhivaniya_description = get_field('description_section_block_video', $id_page);
	$array_video_mesta_prozhivaniya = get_field('video_mesta_prozhivaniya', $id_page);
	foreach ($array_video_mesta_prozhivaniya as $item) {
		$mesta_prozhivaniya[] = [
			'title' => $item['zagolovok'],
			'description' => $item['opisanie'],
			'id_video' => $item['id_video'],
			'oblozhka' => ['url' => $item['oblozhka']['url'], 'alt' => $item['oblozhka']['title']]
		];
	}

	$programm_title = get_field('zagolovok_bloka_programm', $id_page);
	$array_programm = get_field('opisanie_bloka_programm', $id_page);
	foreach ($array_programm as $item) {
		$programm[] = $item['nazvanie'];
	}
	$programm_img = ['url' => get_field('izobrazhenie_programm', $id_page)['url'], 'alt' => get_field('izobrazhenie_programm', $id_page)['title']];

	$daily_regime_title = get_field('zagolovok_bloka_rezim', $id_page) ? get_field('zagolovok_bloka_rezim', $id_page) : null;
	$array_daily_regime = get_field('rasporyadok_dnya', $id_page) ? get_field('rasporyadok_dnya', $id_page) : null;
	if ($array_daily_regime) {
		foreach ($array_daily_regime as $item) {
			$daily_regime[] = $item['vremya_i_meropriyatie'];
		}
	}


	$includ_title = get_field('zagolovok_bloka_price', $id_page);
	$includ_post = get_field('opisanie_bloka_price', $id_page);
	$includ_content = apply_filters('the_content', $includ_post);

	$array_faq = get_field('faq', $id_page);
	foreach ($array_faq as $item) {
		$faq[] = ['question' => $item['vopros'], 'answer' => $item['otvet']];
	}

	$request_title = get_field('zagolovok_zayavka', $id_page);
	$array_request = get_field('spisok_punktov', $id_page);
	foreach ($array_request as $item) {
		$request[] = $item['nazvanie'];
	}
	$request_img = ['url' => get_field('izobrazhenie_razdel_lagerya', $id_page)['url'], 'alt' => get_field('izobrazhenie_razdel_lagerya', $id_page)['title']];

	$data['id_page'] = $my_page->term_id;
	$data['background_img'] = $background_img;
	$data['background_video'] = $background_video;
	$data['content'] = $content;

	$data['description_text'] = $content_description_section;
	$data['description_img'] = $izobrazhenie;
	$data['description_video'] = $id_video;

	$data['benefits_title'] = $benefits_title;
	$data['benefits_parents'] = $benefits_parents;
	$data['benefits_children'] = $benefits_children;

	$data['prozhivanie_title'] = $mesta_prozhivaniya_title;
	$data['prozhivanie_description'] = $mesta_prozhivaniya_description;
	$data['mesta_prozhivaniya'] = $mesta_prozhivaniya;

	$data['programm_title'] = $programm_title;
	$data['programm'] = $programm;
	$data['programm_img'] = $programm_img;

	$data['daily_regime_title'] = $daily_regime_title;
	$data['daily_regime'] = $daily_regime;

	$data['includ_title'] = $includ_title;
	$data['includ_content'] = $includ_content;

	$data['faq'] = $faq;

	$data['request_title'] = $request_title;
	$data['request'] = $request;
	$data['request_img'] = $request_img;

	return $data;
}

function art_camp_filter($params)
{

	$age = !empty($params->get_param('age')) ? $params->get_param('age') : null;
	$section = !empty($params->get_param('section')) ? $params->get_param('section') : null;
	$period = !empty($params->get_param('period')) ? $params->get_param('period') : null;
	$certificate = !empty($params->get_param('certificate')) ? $params->get_param('certificate') : null;

	$args = [
		'post_type' 			=> 'camp',
		'posts_per_page' 	=> '-1',
		'post_status' 		=> 'publish'
	];

	// // Filter params AGE
	if (isset($age) && $age != 'all') {
		$args['tax_query'][] = array(
			'taxonomy' => 'camp-ages',
			'field'    => 'slug',
			'terms'    => $age
		);
	} else {
		$args['tax_query'][] = array(
			'taxonomy' => 'camp-ages',
			'operator' => 'EXISTS'
		);
	}

	// // Filter params PERIOD
	if (isset($period) && $period != 'all') {
		$args['meta_query'][] = array(
			'key' => 'period',
			'value' => $period,
			'type' => 'CHAR',
			'compare' => 'REGEXP'
		);
	}

	// // Filter params SECTION
	if (isset($section) && $section != 'all') {
		$args['tax_query'][] = array(
			'taxonomy' => 'camp-section',
			'field'    => 'slug',
			'terms'    => $section
		);
	} else {
		$args['tax_query'][] = array(
			'taxonomy' => 'camp-section',
			'operator' => 'EXISTS'
		);
	}

	// // Filter params CERTIFICATE
	if ($certificate) {
		if ($certificate == '1') {
			$args['meta_query'][] = array(
				'key' => 'nalichie_sertifikata',
				'value' => 1,
				'compare' => 'IN'
			);
		} else {
			$args['meta_query'][] = array(
				'key' => 'nalichie_sertifikata',
				'value' => 0,
				'compare' => 'IN'
			);
		}
	} else {
		$args['meta_query'][] = array(
			'key' => 'nalichie_sertifikata',
			'value' => 1,
			'compare' => 'IN'
		);
	}

	$camps = new WP_Query($args);

	$data = [];
	$i = 0;

	foreach ($camps->posts as $camp) {
		$id = $camp->ID;
		$thumbnail = get_field('image_miniatyura', $id);

		$data[$i]['id'] = $id;
		$data[$i]['$certificate'] = $certificate;
		$data[$i]['title'] = $camp->post_title;
		$data[$i]['subtitle'] = get_field('location', $id);
		$data[$i]['slug'] = $camp->post_name;
		$data[$i]['thumbnail'] = ['url' => $thumbnail['url'], 'alt' => $thumbnail['title']];

		$i++;
	}

	return $data;
}

function art_page_camp()
{
	$data = [];

	$my_page = get_page_by_path('camp', OBJECT, 'page');
	$id_page = $my_page->ID;

	$background_img = ['url' => get_field('image_page_camp', $id_page)['url'], 'alt' => get_field('image_page_camp', $id_page)['title']];
	$background_video = get_field('video_page_camp', $id_page);

	$post = get_post($id_page);
	$content = apply_filters('the_content', $post->post_content);

	$arrayCamps = null;

	$terms = get_terms([
		'taxonomy' => 'camp-section',
		'hide_empty' => false,
	]);

	foreach ($terms as $term) {

		$args = [
			'post_type' => 'camp',
			'numberposts' 	=> -1,
			'tax_query' => [[
				'taxonomy' => 'camp-section',
				'field'    => 'slug',
				'terms'    => $term->slug
			]],
		];

		$camps = query_posts($args);

		$newCamps = [];

		foreach ($camps as $camp) {

			$id = $camp->ID;

			$image_miniatyura = get_field('image_miniatyura', $id);

			$newCamps[] = [
				'ID' => $id,
				'post_title' => $camp->post_title,
				'post_slug' => $camp->post_name,
				'thumbnail' => ['url' => $image_miniatyura['url'], 'alt' => $image_miniatyura['title']],
				'location' => get_field('location', $id)
			];
		}

		$arrayCamps[] = [
			'term_id' => $term->term_id,
			'name' => $term->name,
			'slug' => $term->slug,
			'description' => $term->description,
			'count' => $term->count,
			'camp_card' => $newCamps
		];
	}

	$review = '';

	$merch = [
		'title' => get_field('title_merch', $id_page),
		'description' => get_field('description_merch', $id_page),
		'image' => ['url' => get_field('image_merch', $id_page)['url'], 'alt' => get_field('image_merch', $id_page)['title']],
	];

	$arrayDocs = null;
	$argsDocs = [
		'post_type' => 'docs'
	];

	$docs = query_posts($argsDocs);

	foreach ($docs as $doc) {

		$id = $doc->ID;

		$arrayDocs[] = [
			'id' => $id,
			'slug' => $doc->post_name,
			'title' => $doc->post_title,
			'subtitle' => get_field('subtitle_docs', $id)
		];
	}

	$filter = null;

	function build_sorter($key)
	{
		return function ($a, $b) use ($key) {
			return strnatcmp($a[$key], $b[$key]);
		};
	}

	$camp_ages = get_terms([
		'taxonomy' => 'camp-ages',
		'hide_empty' => false,
		'parent' => 0
	]);

	$camp_section = get_terms([
		'taxonomy' => 'camp-section',
		'hide_empty' => false,
		'parent' => 0
	]);

	foreach ($camp_ages as $age) {
		$filter['age'][] = [
			'id' => $age->term_id,
			'name' => $age->name,
			'slug' => $age->slug,
		];
	}

	foreach ($camp_section as $section) {
		$filter['section'][] = [
			'id' => $section->term_id,
			'name' => $section->name,
			'slug' => $section->slug,
		];
	}

	$args = ['post_type' => 'camp', 'posts_per_page' => -1];
	$loop = new WP_Query($args);
	$newArray = [];
	while ($loop->have_posts()) : $loop->the_post();
		$newArray[] = get_field('period', get_the_ID());
	endwhile;
	wp_reset_postdata();
	// Убрать дубликаты значений из массива $newArray
	$period = array_unique($newArray);
	// Сортирую массив в порядке возрастания с учетом цифр в названии
	natsort($period);

	usort($filter['age'], build_sorter('id'));
	usort($filter['section'], build_sorter('id'));
	$filter['period'] = $period;

	$data['id_page'] = $id_page;
	$data['background_img'] = $background_img;
	$data['background_video'] = $background_video;
	$data['content'] = $content;
	$data['camps'] = $arrayCamps;
	$data['review'] = $review;
	$data['merch'] = $merch;
	$data['docs'] = $arrayDocs;
	$data['filter'] = $filter;

	return $data;
}

function art_page_contacts()
{

	$data = [];
	$gallery_contacts = [];

	$my_page = get_page_by_path('contacts', OBJECT, 'page');
	$id_contacts = $my_page->ID;

	$phone = get_field('phone', $id_contacts);
	$e_mail = get_field('e-mail', $id_contacts);
	$working_hours = get_field('working-hours', $id_contacts);
	$post = get_post($id_contacts);
	$content = apply_filters('the_content', $post->post_content);

	$image_ofise = get_field('image-ofise', $id_contacts);

	$images = get_field('slajder', $id_contacts);

	foreach ($images as $image) {
		$url = $image['url'];
		$title = $image['title'];
		$gallery_contacts[] = ['url' => $url, 'alt' => $title];
	}

	$data['id_contacts'] = $id_contacts;
	$data['phone'] = $phone;
	$data['e_mail'] = $e_mail;
	$data['content'] = $content;
	$data['working_hours'] = $working_hours;
	$data['gallery_contacts'] = $gallery_contacts;
	$data['image_ofise'] = ['url' => $image_ofise['url'], 'alt' => $image_ofise['title']];

	return $data;
}

function art_page_home()
{

	$data = [];
	$sections = [];

	$id_front_page = get_option('page_on_front');
	$my_page = get_page_by_path('contacts', OBJECT, 'page');
	$id_contacts = $my_page->ID;

	$phone = get_field('phone', $id_contacts);
	$e_mail = get_field('e-mail', $id_contacts);

	$banner = get_field('banner', $id_front_page);
	$id_video = get_field('id_video', $id_front_page);

	$post = get_post($id_front_page);
	$content = apply_filters('the_content', $post->post_content);
	$get_sections = get_field('sections', $id_front_page);

	foreach ($get_sections as $section) {
		$image_section = ['url' => $section['image-section']['url'], 'alt' => $section['image-section']['title']];
		$title_section_card = $section['title-section-card'];
		$link_to_page_section = $section['link-to-page-section'];
		$title_section_description = $section['title-section-description'];
		$description_section = $section['description-section'];

		$sections[] = [
			'image_section' => $image_section,
			'title_section_card' => $title_section_card,
			'link_to_page_section' => $link_to_page_section,
			'title_section_description' => $title_section_description,
			'description_section' => $description_section,
		];
	}

	$data['banner'] = ['url' => $banner['url'], 'alt' => $banner['title']];
	$data['id_video'] = $id_video;
	$data['content'] = $content;
	$data['sections'] = $sections;

	$data['id_contacts'] = $id_contacts;
	$data['phone'] = $phone;
	$data['e_mail'] = $e_mail;

	return $data;
}

function art_page_blogs()
{
	$data = [];

	$my_page = get_page_by_path('blogs', OBJECT, 'page');
	$id_page = $my_page->ID;

	$post = get_post($id_page);
	$content = apply_filters('the_content', $post->post_content);

	$background = get_field('background_blogs', $id_page);
	$background_video = get_field('video_blogs', $id_page);

	$args = [
		'post_type' => 'post',
		'numberposts' 	=> 6,
	];

	$posts = get_posts($args);
	$i = 0;

	foreach ($posts as $post) {
		$id = $post->ID;
		$the_excerpt = get_the_excerpt($id);
		$get_the_post_thumbnail_url = get_the_post_thumbnail_url($id);

		// Added to api
		$data[$i]['id'] = $id;
		$data[$i]['title'] = $post->post_title;
		$data[$i]['the_excerpt'] = $the_excerpt;
		$data[$i]['get_the_post_thumbnail_url'] = $get_the_post_thumbnail_url;
		$data[$i]['slug'] = $post->post_name;

		$i++;
	}

	$data2 = [
		'content' => $content,
		'background_img' => ['url' => $background['url'], 'alt' => $background['title']],
		'background_video' => $background_video,
		'posts' => $data
	];

	return $data2;
}

function art_page_blogs_post($slug)
{
	$data = [];
	$args = [
		'post_type' => 'post',
		'name' 	=> $slug['slug'],
	];
	$post = get_posts($args);
	$id = $post[0]->ID;
	$get_the_post_thumbnail_url = get_the_post_thumbnail_url($id);

	$content = $post[0]->post_content;
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);

	// Added to api
	$data['id'] = $id;
	$data['title'] = $post[0]->post_title;
	$data['get_the_post_thumbnail_url'] = $get_the_post_thumbnail_url;
	$data['content'] = $content;
	$data['slug'] = $post[0]->post_name;

	return $data;
}

function art_page_psychologist()
{
	$data = [];

	$my_page = get_page_by_path('psychologist', OBJECT, 'page');
	$id_page = $my_page->ID;

	$post = get_post($id_page);
	$content = apply_filters('the_content', $post->post_content);
	$title_first = get_field('title_psychologist', $id_page);

	$get_resolved = get_field('issues_resolved', $id_page);

	foreach ($get_resolved['vaprosy_1'] as $item) {
		$vaprosy_1[] = $item['vopros'];
	}
	foreach ($get_resolved['price_1'] as $item) {
		$price_1[] = $item['price'];
	}

	$for_kids = [
		'vaprosy_1' => $vaprosy_1,
		'price_1' => $price_1
	];

	foreach ($get_resolved['vaprosy_2'] as $item) {
		$vaprosy_2[] = $item['vopros'];
	}
	foreach ($get_resolved['price_2'] as $item) {
		$price_2[] = $item['price'];
	}

	$for_parents = [
		'vaprosy_1' => $vaprosy_2,
		'price_1' => $price_2
	];

	$issues_addressed = [
		'for_kids' => $for_kids,
		'for_parents' => $for_parents
	];

	$title_psychologist_art_lichnost = get_field('title_psychologist_art_lichnost', $id_page);
	$psihologi_art_lichnosti = get_field('psihologi_art_lichnosti', $id_page);

	foreach ($psihologi_art_lichnosti as $item) {
		$image_item = ['url' => $item['izobrazhenie']['url'], 'alt' => $item['izobrazhenie']['title']];
		$title_item = $item['imya'];
		$description = $item['opisanie'];
		$job_title = $item['dolzhnost'];

		$psihologi_art[] = [
			'image' => $image_item,
			'title_item' => $title_item,
			'job_title' => $job_title,
			'description' => $description,
		];
	}

	$steps_form_title = get_field('steps-form-title', $id_page);
	$steps_form = get_field('steps-form', $id_page);

	foreach ($steps_form as $item) {
		$steps_form_items[] = $item['title'];
	}

	$img_steps_form = get_field('bg-form-psychologist', $id_page);

	$data['id_page'] = $id_page;
	$data['content'] = $content;
	$data['title_first'] = $title_first;
	$data['issues_addressed'] = $issues_addressed;

	$data['title_psychologist_art_lichnost'] = $title_psychologist_art_lichnost;
	$data['psihologi_art_lichnosti'] = $psihologi_art;

	$data['steps_form_title'] = $steps_form_title;
	$data['steps_form_items'] = $steps_form_items;
	$data['img_steps_form'] = ['url' => $img_steps_form['url'], 'alt' => $img_steps_form['title']];

	return $data;
}
