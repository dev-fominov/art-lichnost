<?php

add_action('rest_api_init', function () {
	// register_rest_route('art/v1', 'camp/page', [
	// 	'methods' => 'GET',
	// 	'callback' => 'art_camp_page',
	// ]);
	// register_rest_route('art/v1', 'camp/card', [
	// 	'methods' => 'GET',
	// 	'callback' => 'art_camp_card',
	// ]);
	// register_rest_route('art/v1', 'menu', [
	// 	'methods' => 'GET',
	// 	'callback' => 'art_menu',
	// ]);


	register_rest_route('art/v1', 'page/contacts', [
		'methods' => 'GET',
		'callback' => 'art_page_contacts',
		'permission_callback' => '__return_true'
	]);
	register_rest_route('art/v1', 'page/home', [
		'methods' => 'GET',
		'callback' => 'art_page_home',
		'permission_callback' => '__return_true'
	]);
	register_rest_route('art/v1', 'page/blogs', [
		'methods' => 'GET',
		'callback' => 'art_page_blogs',
		'permission_callback' => '__return_true'
	]);
	register_rest_route('art/v1', 'page/blogs/(?P<slug>[a-zA-Z0-9-]+)', [
		'methods' => 'GET',
		'callback' => 'art_page_blogs_post',
		'permission_callback' => '__return_true'
	]);
	register_rest_route('art/v1', 'page/psychologist', [
		'methods' => 'GET',
		'callback' => 'art_page_psychologist',
		'permission_callback' => '__return_true'
	]);

	// Лагеря
	register_rest_route('art/v1', 'page/camp', [
		'methods' => 'GET',
		'callback' => 'art_page_camp',
		'permission_callback' => '__return_true'
	]);

	register_rest_route('art/v1', 'camp/filter', [
		'methods' => 'GET',
		'callback' => 'art_camp_filter',
		'permission_callback' => '__return_true'
	]);
});




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







// function art_menu()
// {
// 	$data = [];

// 	$locations = get_nav_menu_locations()['header_menu'];
// 	$items = wp_get_nav_menu_items( $locations );
	
// 	$menu = [];

// 	foreach($items as $item) {
// 		$menu[] = [
// 			'ID' => $item->ID,
// 			'parent_id' => intval($item->menu_item_parent),
// 			'title' => $item->title,
// 			'url' => $item->url
// 		];
// 	}


// 	$data['menu'] = $menu;

// 	return $data;
// }


// function art_camp_page()
// {
// 	$args = [
// 		'post_type' => 'camp'
// 	];

// 	$camps = get_posts($args);
// 	$data = [];
// 	$i = 0;

// 	foreach ($camps as $camp) {
// 		$id = $camp->ID;

// 		$ages = [];
// 		$sections = [];
// 		$cardProfi = [];
// 		$cardProfstart = [];

// 		$campAges = get_the_terms($id, 'camp-ages');
// 		$campSection = get_the_terms($id, 'camp-section');

// 		foreach ($campAges as $age) {
// 			$ages[] = $age->name;
// 		}
// 		foreach ($campSection as $section) {
// 			$sections[] = [
// 				'name' => $section->name,
// 				'slug' => $section->slug,
// 			];
// 		}

// 		// Added acf to api
// 		$imageMiniatyura = get_field('image_miniatyura', $id);
// 		$imageInfo = [
// 			'url' => $imageMiniatyura['url'],
// 			'title' => $imageMiniatyura['title']
// 		];
// 		$location = get_field('location', $id);
// 		$nalichie_sertifikata = get_field('nalichie_sertifikata', $id);
// 		$change_price = get_field('change_price', $id);
// 		$price_per_certificate = get_field('price_per_certificate', $id);
// 		$text_without_action = get_field('text_without_action', $id);
// 		$description_box_profi = get_field('description_box_profi', $id);
// 		$description_box_profstart = get_field('description_box_profstart', $id);

// 		if (have_rows('profi_cards', $id)) {
// 			while (have_rows('profi_cards', $id)) {
// 				the_row();
// 				$image_card = get_sub_field('image_card');
// 				$cardProfi[] = [
// 					'title_card' => get_sub_field('title_card'),
// 					'description_card' => get_sub_field('description_card'),
// 					'nalichie_mest_card' => get_sub_field('nalichie_mest_card'),
// 					'image_card' => ['url' => $image_card['url'], 'title' => $image_card['title']],
// 				];
// 			}
// 		}

// 		if (have_rows('profstart_cards', $id)) {
// 			while (have_rows('profstart_cards', $id)) {
// 				the_row();
// 				$image_card = get_sub_field('image_card');

// 				$cardProfstart[] = [
// 					'title_card' => get_sub_field('title_card'),
// 					'description_card' => get_sub_field('description_card'),
// 					'nalichie_mest_card' => get_sub_field('nalichie_mest_card'),
// 					'image_card' => ['url' => $image_card['url'], 'title' => $image_card['title']]
// 				];
// 			}
// 		}

// 		$card_profi_box = ['description_box' => $description_box_profi, 'card' =>  $cardProfi];
// 		$card_profstart_box = ['description_box' => $description_box_profstart, 'card' =>  $cardProfstart];

// 		// Added to api
// 		$data[$i]['id'] = $id;
// 		$data[$i]['title'] = $camp->post_title;
// 		$data[$i]['camp_ages'] = $ages;
// 		$data[$i]['camp_section'] = $sections;
// 		$data[$i]['image_miniatyura'] = $imageInfo;
// 		$data[$i]['location'] = $location;
// 		$data[$i]['nalichie_sertifikata'] = $nalichie_sertifikata;
// 		$data[$i]['change_price'] = $change_price;
// 		$data[$i]['price_per_certificate'] = $price_per_certificate;
// 		$data[$i]['text_without_action'] = $text_without_action;

// 		$data[$i]['card_box'] = [$card_profi_box, $card_profstart_box];

// 		$i++;
// 	}

// 	return $data;
// }


// function art_camp_card()
// {
// 	$args = [
// 		'post_type' => 'camp'
// 	];

// 	$camps = get_posts($args);
// 	$data = [];
// 	$i = 0;

// 	foreach ($camps as $camp) {
// 		$id = $camp->ID;

// 		$ages = [];
// 		$periods = [];
// 		$sections = [];
// 		$cardProfi = [];
// 		$cardProfstart = [];

// 		$campAges = get_the_terms($id, 'camp-ages');
// 		$campPeriod = get_the_terms($id, 'camp-period');
// 		$campSection = get_the_terms($id, 'camp-section');

// 		foreach ($campAges as $age) {
// 			$ages[] = $age->name;
// 		}
// 		foreach ($campPeriod as $period) {
// 			$periods[] = $period->name;
// 		}
// 		foreach ($campSection as $section) {
// 			$sections[] = $section->name;
// 		}

// 		// Added acf to api
// 		$imageMiniatyura = get_field('image_miniatyura', $id);
// 		$imageInfo = [
// 			'url' => $imageMiniatyura['url'],
// 			'title' => $imageMiniatyura['title']
// 		];
// 		$location = get_field('location', $id);
// 		$nalichie_sertifikata = get_field('nalichie_sertifikata', $id);
// 		$change_price = get_field('change_price', $id);
// 		$price_per_certificate = get_field('price_per_certificate', $id);
// 		$text_without_action = get_field('text_without_action', $id);
// 		$description_box_profi = get_field('description_box_profi', $id);
// 		$description_box_profstart = get_field('description_box_profstart', $id);

// 		if (have_rows('profi_cards', $id)) {
// 			while (have_rows('profi_cards', $id)) {
// 				the_row();
// 				$image_card = get_sub_field('image_card');
// 				$cardProfi[] = [
// 					'title_card' => get_sub_field('title_card'),
// 					'description_card' => get_sub_field('description_card'),
// 					'nalichie_mest_card' => get_sub_field('nalichie_mest_card'),
// 					'image_card' => ['url' => $image_card['url'], 'title' => $image_card['title']],
// 				];
// 			}
// 		}

// 		if (have_rows('profstart_cards', $id)) {
// 			while (have_rows('profstart_cards', $id)) {
// 				the_row();
// 				$image_card = get_sub_field('image_card');

// 				$cardProfstart[] = [
// 					'title_card' => get_sub_field('title_card'),
// 					'description_card' => get_sub_field('description_card'),
// 					'nalichie_mest_card' => get_sub_field('nalichie_mest_card'),
// 					'image_card' => ['url' => $image_card['url'], 'title' => $image_card['title']]
// 				];
// 			}
// 		}

// 		// Added to api
// 		$data[$i]['id'] = $id;
// 		$data[$i]['title'] = $camp->post_title;
// 		$data[$i]['camp_ages'] = $ages;
// 		$data[$i]['camp_period'] = $periods;
// 		$data[$i]['camp_section'] = $sections;
// 		$data[$i]['image_miniatyura'] = $imageInfo;
// 		$data[$i]['location'] = $location;
// 		$data[$i]['nalichie_sertifikata'] = $nalichie_sertifikata;
// 		$data[$i]['change_price'] = $change_price;
// 		$data[$i]['price_per_certificate'] = $price_per_certificate;
// 		$data[$i]['text_without_action'] = $text_without_action;
// 		$data[$i]['card_profi_box'] = ['description_box_profi' => $description_box_profi, 'card_profi' =>  $cardProfi];
// 		$data[$i]['card_profstart_box'] = ['description_box_profstart' => $description_box_profstart, 'card_profstart' =>  $cardProfstart];

// 		$i++;
// 	}

// 	return $data;
// }
