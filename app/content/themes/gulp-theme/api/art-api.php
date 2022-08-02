<?php

add_action('rest_api_init', function () {
	register_rest_route('art/v1', 'camp/page', [
		'methods' => 'GET',
		'callback' => 'art_camp_page',
	]);
	register_rest_route('art/v1', 'camp/card', [
		'methods' => 'GET',
		'callback' => 'art_camp_card',
	]);
});

function art_camp_page()
{
	$args = [
		'post_type' => 'camp'
	];

	$camps = get_posts($args);
	$data = [];
	$i = 0;

	foreach ($camps as $camp) {
		$id = $camp->ID;

		$ages = [];
		$sections = [];
		$cardProfi = [];
		$cardProfstart = [];

		$campAges = get_the_terms($id, 'camp-ages');
		$campSection = get_the_terms($id, 'camp-section');

		foreach ($campAges as $age) {
			$ages[] = $age->name;
		}
		foreach ($campSection as $section) {
			$sections[] = [
				'name' => $section->name,
				'slug' => $section->slug,
			];
		}

		// Added acf to api
		$imageMiniatyura = get_field('image_miniatyura', $id);
		$imageInfo = [
			'url' => $imageMiniatyura['url'],
			'title' => $imageMiniatyura['title']
		];
		$location = get_field('location', $id);
		$nalichie_sertifikata = get_field('nalichie_sertifikata', $id);
		$change_price = get_field('change_price', $id);
		$price_per_certificate = get_field('price_per_certificate', $id);
		$text_without_action = get_field('text_without_action', $id);
		$description_box_profi = get_field('description_box_profi', $id);
		$description_box_profstart = get_field('description_box_profstart', $id);

		if (have_rows('profi_cards', $id)) {
			while (have_rows('profi_cards', $id)) {
				the_row();
				$image_card = get_sub_field('image_card');
				$cardProfi[] = [
					'title_card' => get_sub_field('title_card'),
					'description_card' => get_sub_field('description_card'),
					'nalichie_mest_card' => get_sub_field('nalichie_mest_card'),
					'image_card' => ['url' => $image_card['url'], 'title' => $image_card['title']],
				];
			}
		}

		if (have_rows('profstart_cards', $id)) {
			while (have_rows('profstart_cards', $id)) {
				the_row();
				$image_card = get_sub_field('image_card');

				$cardProfstart[] = [
					'title_card' => get_sub_field('title_card'),
					'description_card' => get_sub_field('description_card'),
					'nalichie_mest_card' => get_sub_field('nalichie_mest_card'),
					'image_card' => ['url' => $image_card['url'], 'title' => $image_card['title']]
				];
			}
		}

		$card_profi_box = ['description_box' => $description_box_profi, 'card' =>  $cardProfi];
		$card_profstart_box = ['description_box' => $description_box_profstart, 'card' =>  $cardProfstart];

		// Added to api
		$data[$i]['id'] = $id;
		$data[$i]['title'] = $camp->post_title;
		$data[$i]['camp_ages'] = $ages;
		$data[$i]['camp_section'] = $sections;
		$data[$i]['image_miniatyura'] = $imageInfo;
		$data[$i]['location'] = $location;
		$data[$i]['nalichie_sertifikata'] = $nalichie_sertifikata;
		$data[$i]['change_price'] = $change_price;
		$data[$i]['price_per_certificate'] = $price_per_certificate;
		$data[$i]['text_without_action'] = $text_without_action;

		$data[$i]['card_box'] = [$card_profi_box, $card_profstart_box];

		$i++;
	}

	return $data;
}


function art_camp_card()
{
	$args = [
		'post_type' => 'camp'
	];

	$camps = get_posts($args);
	$data = [];
	$i = 0;

	foreach ($camps as $camp) {
		$id = $camp->ID;

		$ages = [];
		$periods = [];
		$sections = [];
		$cardProfi = [];
		$cardProfstart = [];

		$campAges = get_the_terms($id, 'camp-ages');
		$campPeriod = get_the_terms($id, 'camp-period');
		$campSection = get_the_terms($id, 'camp-section');

		foreach ($campAges as $age) {
			$ages[] = $age->name;
		}
		foreach ($campPeriod as $period) {
			$periods[] = $period->name;
		}
		foreach ($campSection as $section) {
			$sections[] = $section->name;
		}

		// Added acf to api
		$imageMiniatyura = get_field('image_miniatyura', $id);
		$imageInfo = [
			'url' => $imageMiniatyura['url'],
			'title' => $imageMiniatyura['title']
		];
		$location = get_field('location', $id);
		$nalichie_sertifikata = get_field('nalichie_sertifikata', $id);
		$change_price = get_field('change_price', $id);
		$price_per_certificate = get_field('price_per_certificate', $id);
		$text_without_action = get_field('text_without_action', $id);
		$description_box_profi = get_field('description_box_profi', $id);
		$description_box_profstart = get_field('description_box_profstart', $id);

		if (have_rows('profi_cards', $id)) {
			while (have_rows('profi_cards', $id)) {
				the_row();
				$image_card = get_sub_field('image_card');
				$cardProfi[] = [
					'title_card' => get_sub_field('title_card'),
					'description_card' => get_sub_field('description_card'),
					'nalichie_mest_card' => get_sub_field('nalichie_mest_card'),
					'image_card' => ['url' => $image_card['url'], 'title' => $image_card['title']],
				];
			}
		}

		if (have_rows('profstart_cards', $id)) {
			while (have_rows('profstart_cards', $id)) {
				the_row();
				$image_card = get_sub_field('image_card');

				$cardProfstart[] = [
					'title_card' => get_sub_field('title_card'),
					'description_card' => get_sub_field('description_card'),
					'nalichie_mest_card' => get_sub_field('nalichie_mest_card'),
					'image_card' => ['url' => $image_card['url'], 'title' => $image_card['title']]
				];
			}
		}

		// Added to api
		$data[$i]['id'] = $id;
		$data[$i]['title'] = $camp->post_title;
		$data[$i]['camp_ages'] = $ages;
		$data[$i]['camp_period'] = $periods;
		$data[$i]['camp_section'] = $sections;
		$data[$i]['image_miniatyura'] = $imageInfo;
		$data[$i]['location'] = $location;
		$data[$i]['nalichie_sertifikata'] = $nalichie_sertifikata;
		$data[$i]['change_price'] = $change_price;
		$data[$i]['price_per_certificate'] = $price_per_certificate;
		$data[$i]['text_without_action'] = $text_without_action;
		$data[$i]['card_profi_box'] = ['description_box_profi' => $description_box_profi, 'card_profi' =>  $cardProfi];
		$data[$i]['card_profstart_box'] = ['description_box_profstart' => $description_box_profstart, 'card_profstart' =>  $cardProfstart];

		$i++;
	}

	return $data;
}
