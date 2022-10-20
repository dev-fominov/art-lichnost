<?php

add_action('rest_api_init', function () {

	$prefix = 'art/v1';

	// Главная
	register_rest_route($prefix, 'page/home', [
		'methods' => 'GET',
		'callback' => 'art_page_home',
		'permission_callback' => '__return_true'
	]);
	// Контакты
	register_rest_route($prefix, 'page/contacts', [
		'methods' => 'GET',
		'callback' => 'art_page_contacts',
		'permission_callback' => '__return_true'
	]);
	// Блоги + отдельная статья
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
	// Психолог
	register_rest_route($prefix, 'page/psychologist', [
		'methods' => 'GET',
		'callback' => 'art_page_psychologist',
		'permission_callback' => '__return_true'
	]);
	// Лагерь
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
	// Лагерь навыков
	register_rest_route($prefix, 'page/skills', [
		'methods' => 'GET',
		'callback' => 'art_page_skills',
		'permission_callback' => '__return_true'
	]);
	// Лагерь профессий
	register_rest_route($prefix, 'page/professions', [
		'methods' => 'GET',
		'callback' => 'art_page_professions',
		'permission_callback' => '__return_true'
	]);
	// Туристические каникулы
	register_rest_route($prefix, 'page/tourist-holidays', [
		'methods' => 'GET',
		'callback' => 'art_page_tourist_holidays',
		'permission_callback' => '__return_true'
	]);
	// Мерч
	register_rest_route($prefix, 'page/merch', [
		'methods' => 'GET',
		'callback' => 'art_page_merch',
		'permission_callback' => '__return_true'
	]);
	// Курсы
	register_rest_route($prefix, 'page/courses', [
		'methods' => 'GET',
		'callback' => 'art_page_courses',
		'permission_callback' => '__return_true'
	]);
	register_rest_route($prefix, 'courses/filter', [
		'methods' => 'GET',
		'callback' => 'art_courses_filter',
		'permission_callback' => '__return_true'
	]);
	// Профтестирование
	register_rest_route($prefix, 'page/proftestirovanie', [
		'methods' => 'GET',
		'callback' => 'art_page_proftestirovanie',
		'permission_callback' => '__return_true'
	]);
	// Онлайн тестирование
	register_rest_route($prefix, 'page/online-test', [
		'methods' => 'GET',
		'callback' => 'art_page_online_test',
		'permission_callback' => '__return_true'
	]);
	// Офлайн тестирование
	register_rest_route($prefix, 'page/offline-test', [
		'methods' => 'GET',
		'callback' => 'art_page_offline_test',
		'permission_callback' => '__return_true'
	]);
	// О компании
	register_rest_route($prefix, 'page/about', [
		'methods' => 'GET',
		'callback' => 'art_page_about',
		'permission_callback' => '__return_true'
	]);
	// Команда
	register_rest_route($prefix, 'page/team', [
		'methods' => 'GET',
		'callback' => 'art_page_team',
		'permission_callback' => '__return_true'
	]);
});

// Для сортировки многомерных массивов по ключу
function build_sorter($key)
{
	return function ($a, $b) use ($key) {
		return strnatcmp($a[$key], $b[$key]);
	};
}

function art_page_team()
{
	$data = [];
	$my_page = get_page_by_path('team', OBJECT, 'page');
	$id_page = $my_page->ID;
	$post = get_post($id_page);
	$content = apply_filters('the_content', $post->post_content);
	$id_video = get_field('id_video_komanda', $id_page);
	$banner = get_field('img_komanda', $id_page);
	$ideology = [
		'title' => get_field('idealogiya_komandy_title', $id_page),
		'description' => get_field('idealogiya_komandy', $id_page)
	];

	$list_principles_array = get_field('princzipy', $id_page);
	$list_principles = null;
	foreach ($list_principles_array as $item) {
		$list_principles[] = [
			'title' => $item['zagolovok'],
			'description' => $item['opisanie']
		];
	}
	$principles = [
		'title' => get_field('title_princzipy', $id_page),
		'list_principles' => $list_principles
	];

	$list_team_array = get_field('komanda_menedzhmenta', $id_page);
	$list_team = null;
	foreach ($list_team_array as $item) {
		$img = $item['izobrazhenie-man'];
		$list_team[] = [
			'title' => $item['imya'],
			'description' => $item['opisanie'],
			'img' => ['url' => $img['url'], 'alt' => $img['title']]
		];
	}
	$team_manager = [
		'title' => get_field('title_managers', $id_page),
		'list_team' => $list_team
	];

	$list_team_psiholog_array = get_field('komanda_psihologov_i_pedagogov', $id_page);
	$list_team_psiholog = null;
	foreach ($list_team_psiholog_array as $item) {
		$img = $item['izobrazhenie'];
		$list_team_psiholog[] = [
			'title' => $item['imya'],
			'description' => $item['opisanie'],
			'img' => ['url' => $img['url'], 'alt' => $img['title']]
		];
	}
	$team_psiholog = [
		'title' => get_field('title_psihology', $id_page),
		'list_team' => $list_team_psiholog
	];

	$list_leadership_array = get_field('slajder-smena', $id_page);
	$list_leadership = null;
	foreach ($list_leadership_array as $item) {
		$img = $item['slajd-12'];
		$list_leadership[] = ['url' => $img['url'], 'alt' => $img['title']];
	}
	$team_leadership = [
		'title' => get_field('title_rukovoditel', $id_page),
		'description' => get_field('opisanie-smena', $id_page),
		'list_team' => $list_leadership
	];

	$list_leadership_array = get_field('slajder-smena', $id_page);
	$list_leadership = null;
	foreach ($list_leadership_array as $item) {
		$img = $item['slajd-12'];
		$list_leadership[] = ['url' => $img['url'], 'alt' => $img['title']];
	}
	$team_leadership = [
		'title' => get_field('title_rukovoditel', $id_page),
		'description' => get_field('opisanie-smena', $id_page),
		'list_team' => $list_leadership
	];

	$list_counselors_array = get_field('slajder-vajat', $id_page);
	$list_counselors = null;
	foreach ($list_counselors_array as $item) {
		$img = $item['slajd'];
		$list_counselors[] = ['url' => $img['url'], 'alt' => $img['title']];
	}
	$list_tags_array = get_field('tegi-vajat', $id_page);
	$list_tags = null;
	foreach ($list_tags_array as $item) {
		$list_tags[] = $item['teg'];
	}
	$team_counselors = [
		'title' => get_field('title_vazati', $id_page),
		'description' => get_field('opisanie-vajat', $id_page),
		'list_tags' => $list_tags,
		'list_team' => $list_counselors
	];

	$requirements = get_field('trebovaniya', $id_page);
	$req_list = null;
	foreach ($requirements as $item) {
		$req_list[] = $item['trebovanie'];
	}

	$duties_array = get_field('obyazannosti-timlid', $id_page);
	$duties = null;
	foreach ($duties_array as $item) {
		$duties[] = $item['obyazannost'];
	}
	$img = get_field('izobrazhenie-timlid', $id_page);
	$team_leaders = [
		'requirements' => $req_list,
		'description' => get_field('opisanie-timlid', $id_page),
		'duties' => $duties,
		'img' => ['url' => $img['url'], 'alt' => $img['title']]
	];

	$part_team = [
		'who_waiting' => get_field('kogo_my_zhdem_i_chto_predlagaem_2', $id_page),
		'no_vacancies' => get_field('oj_podhodyajshhej_vakansii_net', $id_page),
		'email' => get_field('napishite_nam_2', $id_page)
	];

	$data['id_page'] = $id_page;
	$data['content'] = $content;
	$data['banner'] = ['url' => $banner['url'], 'alt' => $banner['title']];
	$data['id_video'] = $id_video;
	$data['ideology'] = $ideology;
	$data['principles'] = $principles;
	$data['principles'] = $principles;
	$data['team_manager'] = $team_manager;
	$data['team_psiholog'] = $team_psiholog;
	$data['team_leadership'] = $team_leadership;
	$data['team_counselors'] = $team_counselors;
	$data['team_leaders'] = $team_leaders;
	$data['part_team'] = $part_team;

	return $data;
}

function art_page_about()
{

	$data = [];
	$my_page = get_page_by_path('about', OBJECT, 'page');
	$id_page = $my_page->ID;
	$post = get_post($id_page);
	$content = apply_filters('the_content', $post->post_content);
	$id_video = get_field('id_video', $id_page);
	$banner = get_field('izobrazhenie', $id_page);

	$list_records_array = get_field('spisok_rekordov', $id_page);
	$list_records = null;
	foreach ($list_records_array as $item) {
		$img = $item['izobrazhenie'];
		$list_records[] = [
			'title' => $item['zagolovok'],
			'description' => $item['opisanie'],
			'img' => ['url' => $img['url'], 'alt' => $img['title']]
		];
	}

	$our_records = [
		'title' => get_field('zagolovok', $id_page),
		'list_records' => $list_records
	];

	$list_mission_array = get_field('spisok_punktov_miss', $id_page);
	$list_mission = null;
	foreach ($list_mission_array as $item) {
		$list_mission[] = $item['nazvanie'];
	}

	$our_mission = [
		'title' => get_field('zagolovok_missiya', $id_page),
		'list_mission' => $list_mission
	];

	$img = get_field('izobrazhenie_istoriya', $id_page);
	$our_history = [
		'title' => get_field('zagalovok_istoriya', $id_page),
		'description' => get_field('opisanie_istoriya', $id_page),
		'img' => ['url' => $img['url'], 'alt' => $img['title']]
	];

	$list_targets_array = get_field('czeli_kompanii', $id_page);
	$our_targets = null;
	foreach ($list_targets_array as $item) {
		$our_targets[] = $item['nazvanie'];
	}

	$list_awards_array = get_field('nagrady', $id_page);
	$our_awards = null;
	foreach ($list_awards_array as $item) {
		$our_awards[] = [
			'year' => $item['god'],
			'award' => $item['nagrada']
		];
	}

	$list_successes_array = get_field('spisok_pobed', $id_page);
	$our_successes = null;
	foreach ($list_successes_array as $item) {

		$successes = $item['opisanie_uspehi'];
		$img = $item['izobrazhenie_uspehi'];
		$list_successes = null;
		foreach ($successes as $item2) {
			$list_successes[] = $item2['nazvanie'];
		}
		$our_successes[] = [
			'title' => $item['zagolovok_uspehi'],
			'list_successes' => $list_successes,
			'img' => ['url' => $img['url'], 'alt' => $img['title']]
		];
	}

	$data['id_page'] = $id_page;
	$data['content'] = $content;
	$data['banner'] = ['url' => $banner['url'], 'alt' => $banner['title']];
	$data['id_video'] = $id_video;
	$data['our_records'] = $our_records;
	$data['our_mission'] = $our_mission;
	$data['our_history'] = $our_history;
	$data['our_targets'] = $our_targets;
	$data['our_awards'] = $our_awards;
	$data['our_successes'] = $our_successes;

	return $data;
}

function art_page_offline_test()
{
	$data = [];

	$my_page = get_page_by_path('proftestirovanie/offline-test', OBJECT, 'page');
	$id_page = $my_page->ID;
	$post = get_post($id_page);
	$content = apply_filters('the_content', $post->post_content);
	$id_video = get_field('id_video_test', $id_page);
	$banner = get_field('img_test', $id_page);
	$benefits_array = get_field('preimushhestva_test', $id_page);
	$benefits = null;

	foreach ($benefits_array as $item) {
		$benefits[] = $item['nazvanie'];
	}

	$list_array = get_field('spisok_punktov', $id_page);
	$list = null;

	foreach ($list_array as $item) {
		$list[] = $item['nazvanie'];
	}

	$need_test[] = [
		'title' => get_field('title_block_test', $id_page),
		'list' => $list
	];

	$type_of_test = null;
	$type_array = get_field('tests_block', $id_page);

	foreach ($type_array as $item) {
		$list_descr_array = $item['spisok_opisanie'];
		$list_descr = null;
		foreach ($list_descr_array as $item2) {
			$list_descr[] = $item2['nazvanie'];
		}

		$type_of_test[] = [
			'title' => $item['zagolovok'],
			'for_whom' => $item['dlya_kakih_klassov'],
			'list_descr' => $list_descr,
			'time' => $item['vremya'],
			'price' => $item['czena'],
		];
	}

	$stages_test = null;

	$stages_test_array = get_field('list_etapy', $id_page);

	foreach ($stages_test_array as $item) {
		$img = $item['izobrazhenie'];

		$stages_test[] = [
			'title' => $item['zagolovok'],
			'description' => $item['opisanie'],
			'img' => ['url' => $img['url'], 'alt' => $img['title']],
		];
	}

	$need_list_array = get_field('neobhodimyj_spisok', $id_page) ? get_field('neobhodimyj_spisok', $id_page) : null;

	$need_list = null;

	if ($need_list_array) {
		foreach ($need_list_array as $item) {
			$need_list[] = $item['nazvanie'];
		}
	}

	$what_need = [
		'title' => get_field('title_what', $id_page),
		'description' => get_field('opisanie_what', $id_page),
		'description_2' => get_field('opisanie_what_2', $id_page),
		'need_list' => $need_list,
	];

	$consultants_array = get_field('konsultanty_test', $id_page);
	$consultants = null;

	foreach ($consultants_array as $item) {
		$img = $item['foto'];

		$consultants[] = [
			'name' => $item['fio'],
			'job_title' => $item['dolzhnost'],
			'description' => $item['opisanie'],
			'img' => ['url' => $img['url'], 'alt' => $img['title']],
		];
	}

	$faq_array = get_field('spisok_voprosov', $id_page);
	$faq = null;

	foreach ($faq_array as $item) {
		$faq[] = [
			'answer' => $item['vopros'],
			'question' => $item['otvet'],
		];
	}


	$data['id_page'] = $id_page;
	$data['content'] = $content;
	$data['banner'] = ['url' => $banner['url'], 'alt' => $banner['title']];
	$data['id_video'] = $id_video;
	$data['benefits'] = $benefits;
	$data['need_test'] = $need_test;
	$data['type_of_test'] = $type_of_test;
	$data['stages_test'] = $stages_test;
	$data['what_need'] = $what_need;
	$data['consultants'] = $consultants;
	$data['faq'] = $faq;

	return $data;
}

function art_page_online_test()
{

	$data = [];

	$my_page = get_page_by_path('proftestirovanie/online-test', OBJECT, 'page');
	$id_page = $my_page->ID;
	$post = get_post($id_page);
	$content = apply_filters('the_content', $post->post_content);
	$id_video = get_field('id_video_test', $id_page);
	$banner = get_field('img_test', $id_page);
	$benefits_array = get_field('preimushhestva_test', $id_page);
	$benefits = null;

	foreach ($benefits_array as $item) {
		$benefits[] = $item['nazvanie'];
	}

	$list_array = get_field('spisok_punktov', $id_page);
	$list = null;

	foreach ($list_array as $item) {
		$list[] = $item['nazvanie'];
	}

	$need_test[] = [
		'title' => get_field('title_block_test', $id_page),
		'list' => $list
	];

	$type_of_test = null;
	$type_array = get_field('tests_block', $id_page);

	foreach ($type_array as $item) {
		$list_descr_array = $item['spisok_opisanie'];
		$list_descr = null;
		foreach ($list_descr_array as $item2) {
			$list_descr[] = $item2['nazvanie'];
		}

		$type_of_test[] = [
			'title' => $item['zagolovok'],
			'for_whom' => $item['dlya_kakih_klassov'],
			'list_descr' => $list_descr,
			'time' => $item['vremya'],
			'price' => $item['czena'],
		];
	}

	$stages_test = null;

	$stages_test_array = get_field('list_etapy', $id_page);

	foreach ($stages_test_array as $item) {
		$img = $item['izobrazhenie'];

		$stages_test[] = [
			'title' => $item['zagolovok'],
			'description' => $item['opisanie'],
			'img' => ['url' => $img['url'], 'alt' => $img['title']],
		];
	}

	$need_list_array = get_field('neobhodimyj_spisok', $id_page);
	$need_list = null;

	foreach ($need_list_array as $item) {
		$need_list[] = $item['nazvanie'];
	}

	$what_need = [
		'title' => get_field('title_what', $id_page),
		'description' => get_field('opisanie_what', $id_page),
		'description_2' => get_field('opisanie_what_2', $id_page),
		'need_list' => $need_list,
	];

	$consultants_array = get_field('konsultanty_test', $id_page);
	$consultants = null;

	foreach ($consultants_array as $item) {
		$img = $item['foto'];

		$consultants[] = [
			'name' => $item['fio'],
			'job_title' => $item['dolzhnost'],
			'description' => $item['opisanie'],
			'img' => ['url' => $img['url'], 'alt' => $img['title']],
		];
	}

	$faq_array = get_field('spisok_voprosov', $id_page);
	$faq = null;

	foreach ($faq_array as $item) {
		$faq[] = [
			'answer' => $item['vopros'],
			'question' => $item['otvet'],
		];
	}


	$data['id_page'] = $id_page;
	$data['content'] = $content;
	$data['banner'] = ['url' => $banner['url'], 'alt' => $banner['title']];
	$data['id_video'] = $id_video;
	$data['benefits'] = $benefits;
	$data['need_test'] = $need_test;
	$data['type_of_test'] = $type_of_test;
	$data['stages_test'] = $stages_test;
	$data['what_need'] = $what_need;
	$data['consultants'] = $consultants;
	$data['faq'] = $faq;

	return $data;
}

function art_page_proftestirovanie()
{

	$data = [];

	$my_page = get_page_by_path('proftestirovanie', OBJECT, 'page');
	$id_page = $my_page->ID;
	$post = get_post($id_page);
	$content = apply_filters('the_content', $post->post_content);
	$id_video = get_field('id_video', $id_page);
	$banner = get_field('izobrazhenie', $id_page);

	$tests = get_field('vid_test', $id_page);

	$all_tests = null;
	foreach ($tests as $test) {
		$img = $test['izobrazhenie'];

		$all_tests[] = [
			'title' => $test['nazvanie'],
			'link_to_page' => $test['link_to_page'],
			'for_whom' => $test['dlya_kogo'],
			'upcoming_dates' => $test['blizhajshie_daty'],
			'address' => $test['adres'],
			'price' => $test['czena'],
			'img_test' => ['url' => $img['url'], 'alt' => $img['title']]
		];
	}

	$why_title = get_field('zagolovok_test', $id_page);
	$questions = get_field('spisok_voprosov', $id_page);

	foreach ($questions as $item) {
		$list_questions[] = [
			'question' => $item['zagolovok'],
			'answer' => $item['opisanie']
		];
	}

	$steps_form = get_field('spisok_punktov', $id_page);
	foreach ($steps_form as $item) {
		$steps_form_items[] = $item['nazvanie'];
	}
	$img_steps_form = get_field('izobrazhenie_zayavka', $id_page);
	$step_form['steps_form_title'] = get_field('zagolovok_zayavka', $id_page);
	$step_form['steps_form_items'] = $steps_form_items;
	$step_form['img_steps_form'] = ['url' => $img_steps_form['url'], 'alt' => $img_steps_form['title']];

	$id_page_online = get_page_by_path('proftestirovanie/online-test', OBJECT, 'page')->ID;
	$id_page_ofline = get_page_by_path('proftestirovanie/offline-test', OBJECT, 'page')->ID;

	$online = get_field('konsultanty_test', $id_page_online);
	$offline = get_field('konsultanty_test', $id_page_ofline);
	$consultants_online = null;
	$consultants_offline = null;
	foreach ($online as $item) {

		$img = $item['foto'];
		$consultants_online[] = [
			'title' => $item['fio'],
			'job_title' => $item['dolzhnost'],
			'description' => $item['opisanie'],
			'img' => ['url' => $img['url'], 'alt' => $img['title']]
		];
	}

	foreach ($offline as $item) {

		$img = $item['foto'];
		$consultants_offline[] = [
			'title' => $item['fio'],
			'job_title' => $item['dolzhnost'],
			'description' => $item['opisanie'],
			'img' => ['url' => $img['url'], 'alt' => $img['title']]
		];
	}

	$array_merge_consultants = array_merge($consultants_online, $consultants_offline);

	$consultants = [];
	$test = [];

	foreach ($array_merge_consultants as $value) {
		if (!in_array($value['title'], $test)) {
			$test[] = $value['title'];
			$consultants[] = $value;
		}
	}

	$data['id_page'] = $id_page;
	$data['content'] = $content;
	$data['banner'] = ['url' => $banner['url'], 'alt' => $banner['title']];
	$data['id_video'] = $id_video;
	$data['tests'] = $all_tests;
	$data['why_title'] = $why_title;
	$data['list_questions'] = $list_questions;

	$data['consultants'] = $consultants;

	$data['step_form'] = $step_form;

	return $data;
}

function art_courses_filter($params)
{

	$age = !empty($params->get_param('age')) ? $params->get_param('age') : null;
	$course = !empty($params->get_param('course')) ? $params->get_param('course') : null;
	$presenter = !empty($params->get_param('presenter')) ? $params->get_param('presenter') : null;

	$args = [
		'post_type' 			=> 'courses',
		'posts_per_page' 	=> '-1',
		'post_status' 		=> 'publish'
	];

	// // Filter params AGE
	if (isset($age) && $age != 'all') {
		$args['tax_query'][] = array(
			'taxonomy' => 'courses-ages',
			'field'    => 'slug',
			'terms'    => $age
		);
	} else {
		$args['tax_query'][] = array(
			'taxonomy' => 'courses-ages',
			'operator' => 'EXISTS'
		);
	}

	// Filter params PRESENTER
	if (isset($presenter) && $presenter != 'all') {
		$args['meta_query'][] = array(
			'key' => 'fio',
			'value' => $presenter,
			'type' => 'CHAR',
			'compare' => 'REGEXP'
		);
	}

	// Filter params COURSES
	if (isset($course) && $course != 'all') {
		$args['tax_query'][] = array(
			'taxonomy' => 'courses-category',
			'field'    => 'slug',
			'terms'    => $course
		);
	} else {
		$args['tax_query'][] = array(
			'taxonomy' => 'courses-category',
			'operator' => 'EXISTS'
		);
	}

	$courses = new WP_Query($args);

	$data = [];
	$i = 0;

	foreach ($courses->posts as $course) {
		$id = $course->ID;
		$thumbnail = get_field('img_problem', $id);

		$course_ages = get_the_terms($id, 'courses-ages');
		$pattern = '/[^0-9]/';
		$name_ages = null;
		foreach ($course_ages as $item) {
			$name_ages[] = (int)preg_replace($pattern, "", $item->name);
		}
		$period_ages = min($name_ages) . '-' . max($name_ages) . ' лет';

		$data[$i]['id'] = $id;
		$data[$i]['post_title'] = $course->post_title;
		$data[$i]['post_slug'] = $course->post_name;
		$data[$i]['ages'] = $period_ages;
		$data[$i]['thumbnail'] = ['url' => $thumbnail['url'], 'alt' => $thumbnail['title']];

		$i++;
	}

	return $data;
}

function art_page_courses()
{
	$data = [];

	$my_page = get_page_by_path('courses', OBJECT, 'page');
	$id_page = $my_page->ID;

	$background_img = ['url' => get_field('image_page_courses', $id_page)['url'], 'alt' => get_field('image_page_courses', $id_page)['title']];
	$background_video = get_field('video_page_courses', $id_page);

	$post = get_post($id_page);
	$content = apply_filters('the_content', $post->post_content);
	$description = get_field('description_courses', $id_page);

	$arrayCourses = null;

	$terms = get_terms([
		'taxonomy' => 'courses-category',
		'hide_empty' => false,
	]);

	foreach ($terms as $term) {

		$args = [
			'post_type' => 'courses',
			'numberposts' 	=> -1,
			'tax_query' => [[
				'taxonomy' => 'courses-category',
				'field'    => 'slug',
				'terms'    => $term->slug
			]],
		];

		$courses = query_posts($args);
		$newCourses = [];

		foreach ($courses as $course) {

			$id = $course->ID;

			$image_miniatyura = get_field('img_problem', $id);
			$course_ages = get_the_terms($id, 'courses-ages');
			$pattern = '/[^0-9]/';
			$name_ages = null;
			foreach ($course_ages as $item) {
				$name_ages[] = (int)preg_replace($pattern, "", $item->name);
			}
			$period_ages = min($name_ages) . '-' . max($name_ages) . ' лет';

			$newCourses[] = [
				'ID' => $id,
				'post_title' => $course->post_title,
				'post_slug' => $course->post_name,
				'thumbnail' => ['url' => $image_miniatyura['url'], 'alt' => $image_miniatyura['title']],
				'ages' => $period_ages
			];
		}

		$arrayCourses[] = [
			'term_id' => $term->term_id,
			'name' => $term->name,
			'slug' => $term->slug,
			'description' => $term->description,
			'count' => $term->count,
			'camp_card' => $newCourses
		];
	}

	$review = '';

	$video_about_courses = get_field('video_about_courses', $id_page);
	$video_courses = null;
	foreach ($video_about_courses as $item) {
		$video_courses[] = [
			'title' => $item['zagolovok'],
			'description' => $item['opisanie'],
			'id_video' => $item['id_video'],
			'img' => [
				'url' => $item['oblozhka']['url'],
				'alt' => $item['oblozhka']['title']
			]
		];
	}

	$about_courses = [
		'description' => get_field('description_about_courses', $id_page),
		'video_courses' => $video_courses
	];

	$filter = null;

	$courses_ages = get_terms([
		'taxonomy' => 'courses-ages',
		'hide_empty' => false,
		'parent' => 0
	]);

	foreach ($courses_ages as $age) {
		$filter['age'][] = [
			'id' => $age->term_id,
			'name' => $age->name,
			'slug' => $age->slug,
		];
	}

	$courses_category = get_terms([
		'taxonomy' => 'courses-category',
		'hide_empty' => false,
		'parent' => 0
	]);

	foreach ($courses_category as $category) {
		$filter['category'][] = [
			'id' => $category->term_id,
			'name' => $category->name,
			'slug' => $category->slug,
		];
	}

	$args = ['post_type' => 'courses', 'posts_per_page' => -1];
	$loop = new WP_Query($args);
	$newArray = [];
	while ($loop->have_posts()) : $loop->the_post();
		$newArray[] = [
			'id' => get_the_ID(),
			'name' => get_field('fio', get_the_ID()),
			'slug' => get_field('fio', get_the_ID())
		];
	endwhile;
	wp_reset_postdata();

	$presenter = [];
	$test = [];

	foreach ($newArray as $value) {
		if (!in_array($value['name'], $test)) {
			$test[] = $value['name'];
			$presenter[] = $value;
		}
	}

	usort($filter['age'], build_sorter('id'));
	$filter['presenter'] = $presenter;

	$steps_form = get_field('spisok_punktov', $id_page);
	foreach ($steps_form as $item) {
		$steps_form_items[] = $item['nazvanie'];
	}
	$img_steps_form = get_field('izobrazhenie_razdel_lagerya', $id_page);
	$step_form['steps_form_title'] = get_field('zagolovok_zayavka', $id_page);
	$step_form['steps_form_items'] = $steps_form_items;
	$step_form['img_steps_form'] = ['url' => $img_steps_form['url'], 'alt' => $img_steps_form['title']];

	$data['id_page'] = $id_page;
	$data['background_img'] = $background_img;
	$data['background_video'] = $background_video;
	$data['content'] = $content;
	$data['description'] = $description;
	$data['courses'] = $arrayCourses;
	$data['review'] = $review;
	$data['about_courses'] = $about_courses;
	$data['filter'] = $filter;
	$data['step_form'] = $step_form;

	return $data;
}

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
		$data[$i]['post_title'] = $camp->post_title;
		$data[$i]['post_slug'] = $camp->post_name;
		$data[$i]['location'] = get_field('location', $id);
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
		$newArray[] = [
			'id' => get_the_ID(),
			'name' => get_field('period', get_the_ID()),
			'slug' => get_field('period', get_the_ID())
		];
	endwhile;
	wp_reset_postdata();

	$period = [];
	$test = [];
	// Убрать дубликаты значений из массива $newArray
	foreach ($newArray as $value) {
		if (!in_array($value['name'], $test)) {
			$test[] = $value['name'];
			$period[] = $value;
		}
	}

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

	// сделать поле в админке izobrazhenie
	// $banner = get_field('izobrazhenie', $id_page); 
	$banner = '';

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

	// $data['banner'] = ['url' => $banner['url'], 'alt' => $banner['title']];
	$data['banner'] = '';
	$data['title_first'] = $title_first;
	$data['issues_addressed'] = $issues_addressed;

	$data['title_psychologist_art_lichnost'] = $title_psychologist_art_lichnost;
	$data['psihologi_art_lichnosti'] = $psihologi_art;

	$data['steps_form_title'] = $steps_form_title;
	$data['steps_form_items'] = $steps_form_items;
	$data['img_steps_form'] = ['url' => $img_steps_form['url'], 'alt' => $img_steps_form['title']];

	return $data;
}
