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
	]);
	register_rest_route('art/v1', 'page/home', [
		'methods' => 'GET',
		'callback' => 'art_page_home',
	]);
	register_rest_route('art/v1', 'page/blogs', [
		'methods' => 'GET',
		'callback' => 'art_page_blogs',
	]);
});

function art_page_contacts()
{

	$data = [];
	$gallery_contacts = [];

	$id_contacts = 70;

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
	$id_contacts = 70;

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

	$args = [
		'post_type' => 'post'
	];

	$posts = get_posts($args);
	$data = [];
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
		$data[$i]['content'] = $post->post_content;
		$data[$i]['the_permalink'] = $post->post_name;

		$i++;
	}


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
