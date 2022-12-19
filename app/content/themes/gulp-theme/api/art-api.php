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
	// Лагерь + фильтр + страница документа + страница прошлой смены
	register_rest_route($prefix, 'page/camp', [
		'methods' => 'GET',
		'callback' => 'art_page_camp',
		'permission_callback' => '__return_true'
	]);
	register_rest_route($prefix, 'page/camp/(?P<slug>[a-zA-Z0-9-]+)', [
		'methods' => 'GET',
		'callback' => 'art_page_camp_post',
		'permission_callback' => '__return_true'
	]);
	register_rest_route($prefix, 'page/docs/(?P<slug>[a-zA-Z0-9-]+)', [
		'methods' => 'GET',
		'callback' => 'art_page_doc_post',
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
	// Курсы + страница курса
	register_rest_route($prefix, 'page/courses', [
		'methods' => 'GET',
		'callback' => 'art_page_courses',
		'permission_callback' => '__return_true'
	]);
	register_rest_route($prefix, 'page/courses/(?P<slug>[a-zA-Z0-9-]+)', [
		'methods' => 'GET',
		'callback' => 'art_page_courses_post',
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
	// Вакансии + Вакансия
	register_rest_route($prefix, 'page/vacancies', [
		'methods' => 'GET',
		'callback' => 'art_page_vacancies',
		'permission_callback' => '__return_true'
	]);
	register_rest_route($prefix, 'page/vacancies/(?P<slug>[a-zA-Z0-9-]+)', [
		'methods' => 'GET',
		'callback' => 'art_page_vacancies_post',
		'permission_callback' => '__return_true'
	]);

	// Проекты + Проект
	register_rest_route($prefix, 'page/projects', [
		'methods' => 'GET',
		'callback' => 'art_page_projects',
		'permission_callback' => '__return_true'
	]);
	register_rest_route($prefix, 'page/projects/(?P<slug>[a-zA-Z0-9-]+)', [
		'methods' => 'GET',
		'callback' => 'art_page_projects_post',
		'permission_callback' => '__return_true'
	]);

	// Все договора + страница 1 договора
	register_rest_route($prefix, 'page/contract', [
		'methods' => 'GET',
		'callback' => 'art_page_contract',
		'permission_callback' => '__return_true'
	]);
	register_rest_route($prefix, 'page/contract/(?P<slug>[a-zA-Z0-9-]+)', [
		'methods' => 'GET',
		'callback' => 'art_page_contract_post',
		'permission_callback' => '__return_true'
	]);

	// Политика конфиденциальности 
	register_rest_route($prefix, 'page/privacy-policy', [
		'methods' => 'GET',
		'callback' => 'art_page_privacy_policy',
		'permission_callback' => '__return_true'
	]);
	// Пользовательское соглашение 
	register_rest_route($prefix, 'page/user-agreement', [
		'methods' => 'GET',
		'callback' => 'art_page_user_agreement',
		'permission_callback' => '__return_true'
	]);

	// Базовые настройки 
	register_rest_route($prefix, 'camp-changes', [
		'methods' => 'GET',
		'callback' => 'art_camp_changes',
		'permission_callback' => '__return_true'
	]);

	register_rest_route($prefix, 'send-mail', [
		'methods' => 'POST',
		'callback' => 'art_sendmail',
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

// function art_sendmail($params)
// {
// 	$data = [];

// 	$parentsName = $params->get_param('parentsName');
// 	$childName = $params->get_param('childName');
// 	$birthdate = $params->get_param('birthdate');
// 	$userEmail = $params->get_param('userEmail');
// 	$userPhone = $params->get_param('userPhone');
// 	$hiddenText = $params->get_param('hiddenText');
// 	$themeMessage = $params->get_param('themeMessage');

// 	// if ($parentsName) {
// 		$mail = new PHPMailer(true);
// 		$mail->CharSet = 'UTF-8';
// 		$mail->setLanguage('ru', 'phpmailer/language/');
// 		$mail->isHTML(true);

// 		//Server settings
// 		$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Включить подробный вывод отладки
// 		$mail->isSMTP();                                            //Отправка с помощью SMTP
// 		$mail->Host       = 'smtp.yandex.ru';                       //Установите SMTP-сервер для отправки через
// 		$mail->SMTPAuth   = true;                                   //Включить аутентификацию SMTP
// 		$mail->Username   = 'alexvolkov72305@yandex.ru';                     //SMTP username
// 		$mail->Password   = 'jbffztbuhbcbrhym';                               //SMTP password
// 		$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Включить неявное шифрование TLS
// 		$mail->Port       = 465;                                    //TCP-порт для подключения; используйте 587, если вы установили `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`.

// 		//Получатели
// 		// От кого
// 		$mail->setFrom('alexvolkov72305@yandex.ru', 'art-lichnost');
// 		// $mail->addAddress('joe@example.net', 'Joe User');     //Добавить получателя
// 		$mail->addAddress('mail@alex-volkov.ru');               //Имя необязательно
// 		$mail->addReplyTo('info@art-lichnost.ru', 'art-lichnost');
// 		// $mail->addCC('cc@example.com');
// 		// $mail->addBCC('bcc@example.com');

// 		//Вложения
// 		// $mail->addAttachment('/var/tmp/file.tar.gz');         //Добавить вложения
// 		// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

// 		$body = '<h1>Информация о пользователе</h1>';

// 		if ($parentsName) {
// 			$body .= '<p><strong>Фамилия и имя родителя: </strong>' . $parentsName . '</p>';
// 		}
// 		if ($childName) {
// 			$body .= '<p><strong>Фамилия и имя ребенка: </strong>' . $childName . '</p>';
// 		}
// 		if ($birthdate) {
// 			$body .= '<p><strong>Дата рождения ребенка: </strong>' . $birthdate . '</p>';
// 		}
// 		if ($userEmail) {
// 			$body .= '<p><strong>E-mail: </strong>' . $userEmail . '</p>';
// 		}
// 		if ($userPhone) {
// 			$body .= '<p><strong>Телефон: </strong>' . $userPhone . '</p>';
// 		}
// 		if ($hiddenText) {
// 			$body .= '<p><strong>Какая форма: </strong>' . $hiddenText . '</p>';
// 		}
// 		if ($themeMessage) {
// 			$subject = $themeMessage;
// 		} else {
// 			$subject = 'Заявка с сайта';
// 		}

// 		//Контент
// 		$mail->isHTML(true);                                  //Установите формат электронной почты на HTML
// 		$mail->Subject = $subject;
// 		$mail->Body    = $body;
// 		$mail->AltBody = 'Ваш почтовый клиент не поддерживает HTML';

// 		if (!$mail->send()) {
// 			$message = 'Ошибка';
// 		} else {
// 			$message = 'Данные отправлены!';
// 		}

// 		$response = ['message' => $message];

		
		

// 		$data['response'] = json_encode($response);
// 	// }

// 	return $data;
// }


function art_camp_changes($params)
{
	$data = [];

	$terms = $params->get_param('camp');
	$campChange = $params->get_param('slug');
	$campChange = str_replace('/', '', $campChange);

	$args_shift = [
		'post_type' => 'camp',
		'numberposts' 	=> -1,
		'tax_query' => [[
			'taxonomy' => 'camp-section',
			'field'    => 'slug',
			'terms'    => $terms
		]],
	];

	$posts_shift = query_posts($args_shift);

	if ($posts_shift) {

		foreach ($posts_shift as $post) {

			if ($post->post_name == $campChange) {
				$id = $post->ID;
				$card_profstart_array = get_field('profstart_cards', $id);
				$card_profstart = [];
				if ($card_profstart_array) {
					foreach ($card_profstart_array as $item) {
						$img_shift = $item['image_card'];

						$course_ages = $item['vozrast'];
						$period_ages = [];
						$name_ages = [];
						if ($course_ages) {
							$pattern = '/[^0-9]/';

							foreach ($course_ages as $item12) {
								$name_ages[] = (int)preg_replace($pattern, "", $item12->name);
							}
							$period_ages = min($name_ages) . '-' . max($name_ages) . ' лет';
						}

						$card_profstart[] = [
							'title' => $item['title_card'],
							'period' => get_field('period', $id),
							'location' => get_field('location', $id),
							'ages' => $name_ages,
							'description' => $item['description_card'],
							'seats' => $item['nalichie_mest_card'],
							'price' => get_field('change_price', $id),
							'price_certificate' => get_field('price_per_certificate', $id),
							'thumbnail_url' => ['url' => $img_shift['url'], 'alt' => $img_shift['title']],
							'age_title' => $period_ages,
						];
					}
				}

				$card_profi_array = get_field('profi_cards', $id);
				$card_profi = [];
				if ($card_profi_array) {

					foreach ($card_profi_array as $item) {
						$img_shift = $item['image_card'];

						$course_ages = $item['vozrast'];
						$period_ages = [];
						$name_ages = [];
						if ($course_ages) {
							$pattern = '/[^0-9]/';
							foreach ($course_ages as $item12) {
								$name_ages[] = (int)preg_replace($pattern, "", $item12->name);
							}
							$period_ages = min($name_ages) . '-' . max($name_ages) . ' лет';
						}

						$card_profi[] = [
							'title' => $item['title_card'],
							'period' => get_field('period', $id),
							'location' => get_field('location', $id),
							'ages' => $name_ages,
							'description' => $item['description_card'],
							'seats' => $item['nalichie_mest_card'],
							'price' => get_field('change_price', $id),
							'price_certificate' => get_field('price_per_certificate', $id),
							'thumbnail_url' => ['url' => $img_shift['url'], 'alt' => $img_shift['title']],
							'age_title' => $period_ages,
						];
					}
				}

				$profi_array = [
					'description' => get_field('description_box_profi', $id),
					'card' => $card_profi
				];
				$profstart_array = [
					'description' => get_field('description_box_profstart', $id),
					'card' => $card_profstart
				];

				// Added to api
				$data['id'] = $id;
				$data['title'] = $post->post_title;
				$data['slug'] = $post->post_name;
				$data['price'] = get_field('change_price', $id);
				$data['price_certificate'] = get_field('price_per_certificate', $id);
				$data['no_certificate'] = get_field('text_without_action', $id);
				$data['profi'] = $profi_array;
				$data['profstart'] = $profstart_array;
			}
		}
	}

	return $data;
}

function art_page_user_agreement()
{
	$data = [];
	$my_page = get_page_by_path('polzovatelskoe-soglashenie', OBJECT, 'page');

	if ($my_page) {
		$id_page = $my_page->ID;
		$post = get_post($id_page);

		$content = $post->post_content;
		$content = apply_filters('the_content', $content);
		$content = str_replace(']]>', ']]&gt;', $content);

		$data['id'] = $id_page;
		$data['title'] = $post->post_title;
		$data['slug'] = $post->post_name;
		$data['content'] = $content;

		$metadata = [
			'title' => get_field('title_meta', $id_page),
			'description' => get_field('description_meta', $id_page),
			'keywords' => get_field('keywords_meta', $id_page),
			'image' => get_field('img_meta', $id_page),
		];

		$data['metadata'] = $metadata;
	}

	return $data;
}

function art_page_privacy_policy()
{
	$data = [];
	$my_page = get_page_by_path('privacy-policy', OBJECT, 'page');

	if ($my_page) {
		$id_page = $my_page->ID;
		$post = get_post($id_page);

		$content = $post->post_content;
		$content = apply_filters('the_content', $content);
		$content = str_replace(']]>', ']]&gt;', $content);

		$data['id'] = $id_page;
		$data['title'] = $post->post_title;
		$data['slug'] = $post->post_name;
		$data['content'] = $content;

		$metadata = [
			'title' => get_field('title_meta', $id_page),
			'description' => get_field('description_meta', $id_page),
			'keywords' => get_field('keywords_meta', $id_page),
			'image' => get_field('img_meta', $id_page),
		];

		$data['metadata'] = $metadata;
	}


	return $data;
}

function art_page_contract_post($slug)
{
	$data = [];
	$args = [
		'post_type' => 'contract',
		'name' 	=> $slug['slug'],
	];
	$post = get_posts($args);
	$id = $post[0]->ID;

	$content = $post[0]->post_content;
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);

	$data['id'] = $id;
	$data['title'] = $post[0]->post_title;
	$data['slug'] = $post[0]->post_name;
	$data['content'] = $content;

	$metadata = [
		'title' => get_field('title_meta', $id),
		'description' => get_field('description_meta', $id),
		'keywords' => get_field('keywords_meta', $id),
		'image' => get_field('img_meta', $id),
	];

	$data['metadata'] = $metadata;

	return $data;
}

function art_page_contract()
{
	$data = [];
	$args = [
		'post_type' => 'contract',
		'numberposts' 	=> -1,
	];
	$contract = get_posts($args);
	$i = 0;
	if ($contract) {
		foreach ($contract as $post) {
			$id = $post->ID;
			// Added to api
			$data[$i]['id'] = $id;
			$data[$i]['title'] = $post->post_title;
			$data[$i]['slug'] = $post->post_name;

			$i++;
		}
	}

	return $data;
}

function art_page_projects()
{
	$data = [];
	$my_page = get_page_by_path('projects', OBJECT, 'page');
	if ($my_page) {

		$id_page = $my_page->ID;
		$post = get_post($id_page);
		$content = $post->post_content ? apply_filters('the_content', $post->post_content) : null;
		$id_video = get_field('video_blogs', $id_page) ? get_field('video_blogs', $id_page) : null;
		$banner = get_field('background_blogs', $id_page) ? get_field('background_blogs', $id_page) : null;

		$args = [
			'post_type' => 'projects',
			'numberposts' 	=> 6,
		];

		$projects = get_posts($args);
		$i = 0;
		$data_projects = [];
		if ($projects) {
			foreach ($projects as $post) {
				$id = $post->ID;
				$description = get_field('zagolovok_dlya_anonsa', $id);
				$img = get_field('izobrazhenie_dlya_anonsa', $id);
				$type_project = get_field('span_dlya_anonsa', $id);

				// Added to api
				$data_projects[$i]['id'] = $id;
				$data_projects[$i]['title'] = $post->post_title;
				$data_projects[$i]['type_project'] = $type_project;
				$data_projects[$i]['description'] = $description;
				$data_projects[$i]['slug'] = $post->post_name;
				$data_projects[$i]['img'] = $img ? ['url' => $img['url'], 'alt' => $img['title']] : null;

				$i++;
			}
		}

		$my_issled = get_page_by_path('issledovanie', OBJECT, 'page');
		$issledovanie = [];
		if ($my_issled) {
			$id_issled = $my_issled->ID;
			$post_issled = get_post($id_issled);
			$img_issled = get_field('izobrazhenie-3', $id_issled) ? get_field('izobrazhenie-3', $id_issled) : null;
			$description_issled = get_field('description-3', $id_issled) ? get_field('description-3', $id_issled) : null;
			$issledovanie = [
				[
					'id' => $id_issled,
					'title' => $post_issled->post_title,
					'type_project' => '*на основании опроса на сайте hh.ru',
					'description' => $description_issled,
					'slug' => $post_issled->post_name,
					'img' => $img_issled ? ['url' => $img_issled['url'], 'alt' => $img_issled['title']] : null
				]
			];
		}
		$all_projects = array_merge($issledovanie, $data_projects);

		$data['id_page'] = $id_page;
		$data['content'] = $content;
		$data['banner'] = $banner ? ['url' => $banner['url'], 'alt' => $banner['title']] : null;
		$data['id_video'] = $id_video;
		$data['projects'] = $all_projects;

		$metadata = [
			'title' => get_field('title_meta', $id_page),
			'description' => get_field('description_meta', $id_page),
			'keywords' => get_field('keywords_meta', $id_page),
			'image' => get_field('img_meta', $id_page),
		];

		$data['metadata'] = $metadata;
	}

	return $data;
}

function art_page_projects_post($slug)
{
	$data = [];

	if ($slug['slug'] === 'issledovanie') {
		$data = [];
		$my_page = get_page_by_path('issledovanie', OBJECT, 'page');
		if ($my_page) {
			$id_page = $my_page->ID;
			$post = get_post($id_page);
			$content = apply_filters('the_content', $post->post_content);
			$id_video = get_field('id_video', $id_page) ? get_field('id_video', $id_page) : null;
			$banner = get_field('image_issled', $id_page) ? get_field('image_issled', $id_page) : null;

			$studies = [
				'title_hh' => get_field('title-hh', $id_page),
				'description_hh' => get_field('description-hh', $id_page),
				'title_art' => get_field('title-art', $id_page),
				'description_art' => get_field('description-art', $id_page),
			];

			$staff_array = get_field('psihologi_art_lichnosti', $id_page);
			$staff = [];
			if ($staff_array) {
				foreach ($staff_array as $item) {
					$img = $item['izobrazhenie'] ? $item['izobrazhenie'] : null;
					$staff[] = [
						'photo' => $img ? ['url' => $img['url'], 'alt' => $img['title']] : null,
						'name' => $item['imya'],
						'position' => $item['dolzhnost'],
						'description' => $item['opisanie']
					];
				}
			}

			$img_1 = get_field('izobrazhenie-3', $id_page);
			$study_description = [
				'title' => get_field('title-isl-3', $id_page),
				'description' => get_field('description-3', $id_page),
				'img' => ['url' => $img_1['url'], 'alt' => $img_1['title']]
			];

			$list_thanks_array = get_field('chto_predlagaem', $id_page);
			$list_thanks = [];
			if ($list_thanks_array) {
				foreach ($list_thanks_array as $item) {
					$list_thanks[] = $item['naimenovanie'];
				}
			}

			$thanks_block = [
				'title' => get_field('title-isl-4', $id_page),
				'list' => $list_thanks
			];

			$list_introduction_array = get_field('chto_predlagaem_2', $id_page);
			$list_introduction = [];
			if ($list_introduction_array) {
				foreach ($list_introduction_array as $item) {
					$img_2 = $item['izobrazhenie-5'];
					$list_introduction[] = [
						'title' => $item['naimenovanie_2'],
						'img' => ['url' => $img_2['url'], 'alt' => $img_2['title']]
					];
				}
			}

			$introduction_block = [
				'title' => get_field('title-isl-5', $id_page),
				'list' => $list_introduction
			];

			$img_block = get_field('izobrazhenie-6', $id_page);

			$img_7 = get_field('izobrazhenie-7', $id_page);
			$important_criteria = [
				'title' => get_field('title-isl-7', $id_page),
				'description' => get_field('description-isl-7', $id_page),
				'img' => ['url' => $img_7['url'], 'alt' => $img_7['title']]
			];

			$img_8 = get_field('izobrazhenie-8', $id_page);
			$important_criteria_teen = [
				'title' => get_field('title-isl-8', $id_page),
				'img' => ['url' => $img_8['url'], 'alt' => $img_8['title']]
			];

			$img_9 = get_field('izobrazhenie-9', $id_page);
			$soft_skills = [
				'title' => get_field('title-isl-9', $id_page),
				'description' => get_field('description-isl-7', $id_page),
				'img' => ['url' => $img_9['url'], 'alt' => $img_9['title']],
				'text' => get_field('text-9', $id_page)
			];

			$img_10 = get_field('izobrazhenie-10', $id_page);
			$img_11 = get_field('izobrazhenie-11', $id_page);
			$skills_assessment = [
				'title' => get_field('title-isl-10', $id_page),
				'description' => get_field('subtitle-isl-10-1', $id_page),
				'img' => ['url' => $img_10['url'], 'alt' => $img_10['title']],
				'text' => get_field('subtitle-isl-10-2', $id_page),
				'description2' => get_field('subtitle-isl-11-1', $id_page),
				'img2' => ['url' => $img_11['url'], 'alt' => $img_11['title']],
				'description3' => get_field('subtitle-isl-11-2', $id_page),
			];

			$img_12 = get_field('izobrazhenie-12', $id_page);
			$img_13 = get_field('izobrazhenie-13', $id_page);
			$work_direction = [
				'title' => get_field('title-isl-12', $id_page),
				'description' => get_field('subtitle-isl-12-1', $id_page),
				'img' => ['url' => $img_12['url'], 'alt' => $img_12['title']],
				'description2' => get_field('subtitle-isl-12-2', $id_page),
				'img2' => ['url' => $img_13['url'], 'alt' => $img_13['title']],
				'description3' => get_field('subtitle-isl-13', $id_page),
			];

			$img_14 = get_field('izobrazhenie-14', $id_page);
			$img_15 = get_field('izobrazhenie-15', $id_page);
			$img_16 = get_field('izobrazhenie-16', $id_page);
			$feedback = [
				'title' => get_field('title-isl-14', $id_page),
				'description' => get_field('description-isl-14', $id_page),
				'img' => ['url' => $img_14['url'], 'alt' => $img_14['title']],
				'img2' => ['url' => $img_15['url'], 'alt' => $img_15['title']],
				'title2' => get_field('title-isl-16', $id_page),
				'description2' => get_field('subtitle-isl-16', $id_page),
				'img3' => ['url' => $img_16['url'], 'alt' => $img_16['title']],
			];

			$img_17 = get_field('izobrazhenie-17', $id_page);
			$hire = [
				'title' => get_field('title-isl-17', $id_page),
				'description' => get_field('subtitle-isl-17', $id_page),
				'img' => ['url' => $img_17['url'], 'alt' => $img_17['title']],
			];

			$popular_skills = [
				'title' => get_field('title-isl-18', $id_page),
				'description' => get_field('description-isl-18', $id_page),
			];

			$img_19 = get_field('izobrazhenie-19', $id_page);
			$where_to_work = [
				'title' => get_field('title-isl-19', $id_page),
				'description' => get_field('subtitle-isl-19', $id_page),
				'img' => ['url' => $img_19['url'], 'alt' => $img_19['title']],
			];

			$img_20 = get_field('izobrazhenie-20', $id_page);
			$position = [
				'title' => get_field('title-isl-20', $id_page),
				'description' => get_field('subtitle-isl-20', $id_page),
				'img' => ['url' => $img_20['url'], 'alt' => $img_20['title']],
			];

			$img_21 = get_field('izobrazhenie-21', $id_page);
			$occupation = [
				'title' => get_field('title-isl-21', $id_page),
				'description' => get_field('subtitle-isl-21', $id_page),
				'img' => ['url' => $img_21['url'], 'alt' => $img_21['title']],
			];

			$img_22 = get_field('izobrazhenie-22', $id_page);
			$img_23 = get_field('izobrazhenie-23', $id_page);
			$img_24 = get_field('izobrazhenie-24', $id_page);
			$img_25 = get_field('izobrazhenie-25', $id_page);
			$img_26 = get_field('izobrazhenie-26', $id_page);
			$img_27 = get_field('izobrazhenie-27', $id_page);
			$img_28 = get_field('izobrazhenie-28', $id_page);
			$skills = [
				'title' => get_field('title-isl-22', $id_page),
				'description' => get_field('subtitle-isl-22', $id_page),
				'img' => ['url' => $img_22['url'], 'alt' => $img_22['title']],

				'title_diligence' => get_field('title-isl-23', $id_page),
				'description_diligence' => get_field('subtitle-isl-23', $id_page),
				'img_diligence' => ['url' => $img_23['url'], 'alt' => $img_23['title']],

				'title_logical_thinking' => get_field('title-isl-24', $id_page),
				'description_logical_thinking' => get_field('subtitle-isl-24', $id_page),
				'img_logical_thinking' => ['url' => $img_24['url'], 'alt' => $img_24['title']],

				'title_self_criticism' => get_field('title-isl-25', $id_page),
				'description_self_criticism' => get_field('subtitle-isl-25', $id_page),
				'img_self_criticism' => ['url' => $img_25['url'], 'alt' => $img_25['title']],

				'title_erudition' => get_field('title-isl-26', $id_page),
				'description_erudition' => get_field('subtitle-isl-26', $id_page),
				'img_erudition' => ['url' => $img_26['url'], 'alt' => $img_26['title']],

				'title_intuition' => get_field('title-isl-27', $id_page),
				'description_intuition' => get_field('subtitle-isl-27', $id_page),
				'img_intuition' => ['url' => $img_27['url'], 'alt' => $img_27['title']],

				'title_еvaluation' => get_field('title-isl-28', $id_page),
				'img_еvaluation' => ['url' => $img_28['url'], 'alt' => $img_28['title']],
			];

			$img_29 = get_field('izobrazhenie-29', $id_page);
			$img_30 = get_field('izobrazhenie-29_2', $id_page);
			$img_31 = get_field('izobrazhenie-29_3', $id_page);
			$teenager_at_work = [
				'title' => get_field('title-isl-29', $id_page),
				'description' => get_field('description-isl-29', $id_page),
				'img1' => ['url' => $img_29['url'], 'alt' => $img_29['title']],
				'img2' => ['url' => $img_30['url'], 'alt' => $img_30['title']],
				'img3' => ['url' => $img_31['url'], 'alt' => $img_31['title']],
			];

			$img_32 = get_field('izobrazhenie-30', $id_page);
			$employment_benefits = [
				'title' => get_field('title-isl-30', $id_page),
				'description' => get_field('subtitle-isl-30', $id_page),
				'img' => ['url' => $img_32['url'], 'alt' => $img_32['title']],
			];

			$img_33 = get_field('izobrazhenie-31', $id_page);
			$employment_disadvantages = [
				'title' => get_field('title-isl-31', $id_page),
				'description' => get_field('subtitle-isl-31', $id_page),
				'img' => ['url' => $img_33['url'], 'alt' => $img_33['title']],
			];



			$data['id_page'] = $id_page;
			$data['slug'] = 'issledovanie';
			$data['content'] = $content;
			$data['banner'] = ['url' => $banner['url'], 'alt' => $banner['title']];
			$data['id_video'] = $id_video;
			$data['studies'] = $studies;
			$data['staff'] = $staff;
			$data['study_description'] = $study_description;
			$data['thanks_block'] = $thanks_block;
			$data['introduction_block'] = $introduction_block;
			$data['img_block'] = ['url' => $img_block['url'], 'alt' => $img_block['title']];
			$data['important_criteria'] = $important_criteria;
			$data['important_criteria_teen'] = $important_criteria_teen;
			$data['soft_skills'] = $soft_skills;
			$data['skills_assessment'] = $skills_assessment;
			$data['work_direction'] = $work_direction;
			$data['feedback'] = $feedback;
			$data['hire'] = $hire;
			$data['popular_skills'] = $popular_skills;
			$data['where_to_work'] = $where_to_work;
			$data['position'] = $position;
			$data['occupation'] = $occupation;
			$data['skills'] = $skills;
			$data['teenager_at_work'] = $teenager_at_work;
			$data['employment_benefits'] = $employment_benefits;
			$data['employment_disadvantages'] = $employment_disadvantages;

			$metadata = [
				'title' => get_field('title_meta', $id_page),
				'description' => get_field('description_meta', $id_page),
				'keywords' => get_field('keywords_meta', $id_page),
				'image' => get_field('img_meta', $id_page),
			];

			$data['metadata'] = $metadata;
		}
	} else {
		$args = [
			'post_type' => 'projects',
			'name' 	=> $slug['slug'],
		];
		$post = get_posts($args);

		if ($post) {
			$id = $post[0]->ID;
			$content = $post[0]->post_content;
			$content = apply_filters('the_content', $content);
			$content = str_replace(']]>', ']]&gt;', $content);

			$list_numbers_array = get_field('spisok_dostizhenij', $id);
			$list_numbers = [];
			if ($list_numbers_array) {
				foreach ($list_numbers_array as $item) {
					$img = $item['ikonka'];
					$list_numbers[] = [
						'qty' => $item['kolichestvo'],
						'description' => $item['opisanie'],
						'icon' => ['url' => $img['url'], 'alt' => $img['title']]
					];
				}
			}

			$project_numbers = [
				'title' => get_field('zagolovok', $id),
				'list' => $list_numbers
			];

			$list_important_array = get_field('spisok_miss', $id);
			$list_important = [];
			if ($list_important_array) {
				foreach ($list_important_array as $item) {
					$list_important[] = $item['naimenovanie'];
				}
			}
			$important = [
				'title' => get_field('zagolovok_miss', $id),
				'list' => $list_important
			];

			$img_history = get_field('izobrazhenie', $id);
			$history = [
				'title' => get_field('zagolovok_2', $id),
				'description' => get_field('tekst_2', $id),
				'img' => ['url' => $img_history['url'], 'alt' => $img_history['title']]
			];

			$list_convention_array = get_field('spisok_3', $id);
			$list_convention = [];
			if ($list_convention_array) {
				foreach ($list_convention_array as $item) {
					$list_convention[] = $item['nazvanie'];
				}
			}
			$what_convention = [
				'title' => get_field('zagolovok_3', $id),
				'list' => $list_convention
			];

			$list_do_array = get_field('spisok_4', $id);
			if ($list_do_array) {
				foreach ($list_do_array as $item) {
					$img = $item['izobrazhenie'];
					$list_item_array = $item['spisok'];
					$list_item = [];
					if ($list_item_array) {
						foreach ($list_item_array as $item2) {
							$list_item[] = $item2['nazvanie'];
						}
					}
					$list_do[] = [
						'title_item' => $item['nazvanie'],
						'img_item' => ['url' => $img['url'], 'alt' => $img['title']],
						'list_item' => $list_item
					];
				}
			}

			$what_do = [
				'title' => get_field('zagolovok_4', $id),
				'list' => $list_do
			];

			$data['id'] = $id;
			$data['title'] = $post[0]->post_title;
			$data['slug'] = $post[0]->post_name;
			$data['project_numbers'] = $project_numbers;
			$data['important'] = $important;
			$data['history'] = $history;
			$data['what_convention'] = $what_convention;
			$data['what_do'] = $what_do;

			$metadata = [
				'title' => get_field('title_meta', $id),
				'description' => get_field('description_meta', $id),
				'keywords' => get_field('keywords_meta', $id),
				'image' => get_field('img_meta', $id),
			];

			$data['metadata'] = $metadata;
		}
	}

	return $data;
}

function art_page_vacancies()
{
	$data = [];
	$my_page = get_page_by_path('jobs', OBJECT, 'page');
	if ($my_page) {
		$id_page = $my_page->ID;
		$post = get_post($id_page);
		$content = apply_filters('the_content', $post->post_content);
		$id_video = get_field('id_video', $id_page);
		$banner = get_field('izobrazhenie_bac', $id_page);
		$args = [
			'post_type' => 'vacancies',
			'numberposts' 	=> 6,
		];

		$vacancies = get_posts($args);
		$i = 0;
		if ($vacancies) {
			foreach ($vacancies as $post) {
				$id = $post->ID;
				$description = get_field('kratkoe_opisanie', $id);
				$benefits_array = get_field('preimushhestva-job', $id);
				$benefits = [];
				if ($benefits_array) {
					foreach ($benefits_array as $item) {
						$benefits[] = $item['preimushhestvo'];
					}
				}

				$img_array = get_field('images-job', $id);
				$img_list = [];
				if ($img_array) {
					foreach ($img_array as $item) {
						$img = $item['image'];
						$img_list[] = ['url' => $img['url'], 'alt' => $img['title']];
					}
				}

				// Added to api
				$data_vacancies[$i]['id'] = $id;
				$data_vacancies[$i]['title'] = $post->post_title;
				$data_vacancies[$i]['description'] = $description;
				$data_vacancies[$i]['slug'] = $post->post_name;
				$data_vacancies[$i]['benefits'] = $benefits;
				$data_vacancies[$i]['img'] = $img_list[0];

				$i++;
			}
		}

		$img = get_field('izobrazhenie_jobs', $id_page);
		$novacancies = [
			'title' => get_field('zagolovok', $id_page),
			'description' => get_field('description_jobs', $id_page),
			'email' => get_field('pochta_jobs', $id_page),
			'img' => ['url' => $img['url'], 'alt' => $img['title']]
		];

		$data['id_page'] = $id_page;
		$data['content'] = $content;
		$data['banner'] = ['url' => $banner['url'], 'alt' => $banner['title']];
		$data['id_video'] = $id_video;
		$data['vacancies'] = $data_vacancies;
		$data['no_vacancies'] = $novacancies;

		$metadata = [
			'title' => get_field('title_meta', $id_page),
			'description' => get_field('description_meta', $id_page),
			'keywords' => get_field('keywords_meta', $id_page),
			'image' => get_field('img_meta', $id_page),
		];

		$data['metadata'] = $metadata;
	}

	return $data;
}

function art_page_vacancies_post($slug)
{
	$data = [];
	$args = [
		'post_type' => 'vacancies',
		'name' 	=> $slug['slug'],
	];
	$post = get_posts($args);
	if ($post) {

		$id = $post[0]->ID;

		$content = $post[0]->post_content;
		$content = apply_filters('the_content', $content);
		$content = str_replace(']]>', ']]&gt;', $content);

		$place_work = get_field('mesto_raboty', $id);
		$description = get_field('kratkoe_opisanie', $id);

		$benefits_array = get_field('preimushhestva-job', $id);
		$benefits = [];
		if ($benefits_array) {
			foreach ($benefits_array as $item) {
				$benefits[] = $item['preimushhestvo'];
			}
		}


		$first_title = get_field('zagolovok_pervogo_bloka', $id);
		$first_list_array = get_field('chto_nuzhno_delat', $id);
		if ($first_list_array) {
			foreach ($first_list_array as $item) {
				$first_list[] = $item['naimenovanie'];
			}
		}

		$first_block = [
			'title' => $first_title,
			'first_list' => $first_list
		];

		$second_title = get_field('zagolovok_vtorogo_bloka', $id);
		$second_list_array = get_field('chego_my_zhdem', $id);
		$second_list = [];
		if ($second_list_array) {
			foreach ($second_list_array as $item) {
				$second_list[] = $item['naimenovanie'];
			}
		}

		$second_block = [
			'title' => $second_title,
			'second_list' => $second_list
		];

		$third_title = get_field('zagolovok_tri_bloka', $id);
		$third_list_array = get_field('chto_predlagaem', $id);
		$img_array = get_field('images-job', $id);
		$img_list = [];
		if ($img_array) {
			foreach ($img_array as $item) {
				$img = $item['image'];
				$img_list[] = ['url' => $img['url'], 'alt' => $img['title']];
			}
		}
		$third_list = [];
		if ($third_list_array) {
			foreach ($third_list_array as $item) {
				$third_list[] = $item['naimenovanie'];
			}
		}

		$third_block = [
			'title' => $third_title,
			'third_list' => $third_list,
			'img_list' => $img_list
		];

		$send_resume = [
			'title' => get_field('otpravit_rezyume', $id),
			'email' => get_field('svyazatsya_s_nami', $id)
		];

		$data['id'] = $id;
		$data['title'] = $post[0]->post_title;
		$data['slug'] = $post[0]->post_name;
		$data['description'] = $description;
		$data['place_work'] = $place_work;
		$data['description'] = $description;
		$data['benefits'] = $benefits;
		$data['first_block'] = $first_block;
		$data['second_block'] = $second_block;
		$data['third_block'] = $third_block;
		$data['send_resume'] = $send_resume;

		$metadata = [
			'title' => get_field('title_meta', $id),
			'description' => get_field('description_meta', $id),
			'keywords' => get_field('keywords_meta', $id),
			'image' => get_field('img_meta', $id),
		];

		$data['metadata'] = $metadata;
	} else {
		$data['error'] = '404';
	}

	return $data;
}

function art_page_team()
{
	$data = [];
	$my_page = get_page_by_path('team', OBJECT, 'page');
	if ($my_page) {
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
		$list_principles = [];
		if ($list_principles_array) {
			foreach ($list_principles_array as $item) {
				$list_principles[] = [
					'title' => $item['zagolovok'],
					'description' => $item['opisanie']
				];
			}
		}

		$principles = [
			'title' => get_field('title_princzipy', $id_page),
			'list_principles' => $list_principles
		];

		$list_team_array = get_field('komanda_menedzhmenta', $id_page);
		$list_team = [];
		if ($list_team_array) {
			foreach ($list_team_array as $item) {
				$img = $item['izobrazhenie-man'];
				$list_team[] = [
					'title' => $item['imya'],
					'description' => $item['opisanie'],
					'img' => ['url' => $img['url'], 'alt' => $img['title']]
				];
			}
		}

		$team_manager = [
			'title' => get_field('title_managers', $id_page),
			'list_team' => $list_team
		];

		$list_team_psiholog_array = get_field('komanda_psihologov_i_pedagogov', $id_page);
		$list_team_psiholog = [];
		if ($list_team_psiholog_array) {
			foreach ($list_team_psiholog_array as $item) {
				$img = $item['izobrazhenie'];
				$list_team_psiholog[] = [
					'title' => $item['imya'],
					'description' => $item['opisanie'],
					'img' => ['url' => $img['url'], 'alt' => $img['title']]
				];
			}
		}

		$team_psiholog = [
			'title' => get_field('title_psihology', $id_page),
			'list_team' => $list_team_psiholog
		];

		$list_leadership_array = get_field('slajder-smena', $id_page);
		$list_leadership = [];
		if ($list_leadership_array) {
			foreach ($list_leadership_array as $item) {
				$img = $item['slajd-12'];
				$list_leadership[] = ['url' => $img['url'], 'alt' => $img['title']];
			}
		}

		$team_leadership = [
			'title' => get_field('title_rukovoditel', $id_page),
			'description' => get_field('opisanie-smena', $id_page),
			'list_team' => $list_leadership
		];

		$list_leadership_array = get_field('slajder-smena', $id_page);
		$list_leadership = [];
		if ($list_leadership_array) {
			foreach ($list_leadership_array as $item) {
				$img = $item['slajd-12'];
				$list_leadership[] = ['url' => $img['url'], 'alt' => $img['title']];
			}
		}

		$team_leadership = [
			'title' => get_field('title_rukovoditel', $id_page),
			'description' => get_field('opisanie-smena', $id_page),
			'list_team' => $list_leadership
		];

		$list_counselors_array = get_field('slajder-vajat', $id_page);
		$list_counselors = [];
		if ($list_counselors_array) {
			foreach ($list_counselors_array as $item) {
				$img = $item['slajd'];
				$list_counselors[] = ['url' => $img['url'], 'alt' => $img['title']];
			}
		}

		$list_tags_array = get_field('tegi-vajat', $id_page);
		$list_tags = [];
		if ($list_tags_array) {
			foreach ($list_tags_array as $item) {
				$list_tags[] = $item['teg'];
			}
		}

		$team_counselors = [
			'title' => get_field('title_vazati', $id_page),
			'description' => get_field('opisanie-vajat', $id_page),
			'list_tags' => $list_tags,
			'list_team' => $list_counselors
		];

		$requirements = get_field('trebovaniya', $id_page);
		$req_list = [];
		if ($requirements) {
			foreach ($requirements as $item) {
				$req_list[] = $item['trebovanie'];
			}
		}

		$duties_array = get_field('obyazannosti-timlid', $id_page);
		$duties = [];
		if ($duties_array) {
			foreach ($duties_array as $item) {
				$duties[] = $item['obyazannost'];
			}
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

		$metadata = [
			'title' => get_field('title_meta', $id_page),
			'description' => get_field('description_meta', $id_page),
			'keywords' => get_field('keywords_meta', $id_page),
			'image' => get_field('img_meta', $id_page),
		];

		$data['metadata'] = $metadata;
	}

	return $data;
}

function art_page_about()
{

	$data = [];
	$my_page = get_page_by_path('about', OBJECT, 'page');
	if ($my_page) {
		$id_page = $my_page->ID;
		$post = get_post($id_page);
		$content = apply_filters('the_content', $post->post_content);
		$id_video = get_field('id_video', $id_page);
		$banner = get_field('izobrazhenie', $id_page);

		$list_records_array = get_field('spisok_rekordov', $id_page);
		$list_records = [];
		if ($list_records_array) {
			foreach ($list_records_array as $item) {
				$img = $item['izobrazhenie'];
				$list_records[] = [
					'title' => $item['zagolovok'],
					'description' => $item['opisanie'],
					'img' => ['url' => $img['url'], 'alt' => $img['title']]
				];
			}
		}
		$our_records = [
			'title' => get_field('zagolovok', $id_page),
			'list_records' => $list_records
		];
		$list_mission_array = get_field('spisok_punktov_miss', $id_page);
		$list_mission = [];
		if ($list_mission_array) {
			foreach ($list_mission_array as $item) {
				$list_mission[] = $item['nazvanie'];
			}
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
		$our_targets = [];
		if ($list_targets_array) {
			foreach ($list_targets_array as $item) {
				$our_targets[] = $item['nazvanie'];
			}
		}
		$list_awards_array = get_field('nagrady', $id_page);
		$our_awards = [];
		if ($list_awards_array) {
			foreach ($list_awards_array as $item) {
				$our_awards[] = [
					'year' => $item['god'],
					'award' => $item['nagrada']
				];
			}
		}
		$list_successes_array = get_field('spisok_pobed', $id_page);
		$our_successes_array = [];
		if ($list_successes_array) {
			foreach ($list_successes_array as $item) {
				$successes = $item['opisanie_uspehi'];
				$img = $item['izobrazhenie_uspehi'];
				$list_successes = [];
				if ($successes) {
					foreach ($successes as $item2) {
						$list_successes[] = $item2['nazvanie'];
					}
				}
				$our_successes_array[] = [
					'title' => $item['zagolovok_uspehi'],
					'list_successes' => $list_successes,
					'img' => ['url' => $img['url'], 'alt' => $img['title']]
				];
			}
		}
		$our_successes = [
			'title' => get_field('title_about', $id_page),
			'our_successes_array' => $our_successes_array,
		];
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

		$metadata = [
			'title' => get_field('title_meta', $id_page),
			'description' => get_field('description_meta', $id_page),
			'keywords' => get_field('keywords_meta', $id_page),
			'image' => get_field('img_meta', $id_page),
		];

		$data['metadata'] = $metadata;
	}

	return $data;
}

function art_page_offline_test()
{
	$data = [];

	$my_page = get_page_by_path('proftestirovanie/offline-test', OBJECT, 'page');
	if ($my_page) {
		$id_page = $my_page->ID;
		$post = get_post($id_page);
		$content = apply_filters('the_content', $post->post_content);
		$id_video = get_field('id_video_test', $id_page);
		$banner = get_field('img_test', $id_page);
		$benefits_array = get_field('preimushhestva_test', $id_page);
		$benefits = [];
		if ($benefits_array) {
			foreach ($benefits_array as $item) {
				$benefits[] = $item['nazvanie'];
			}
		}
		$list_array = get_field('spisok_punktov', $id_page);
		$list = [];
		if ($list_array) {
			foreach ($list_array as $item) {
				$list[] = $item['nazvanie'];
			}
		}
		$need_test[] = [
			'title' => get_field('title_block_test', $id_page),
			'list' => $list
		];

		$type_of_test = [];
		$type_array = get_field('tests_block', $id_page);
		if ($type_array) {
			foreach ($type_array as $item) {
				$list_descr_array = $item['spisok_opisanie'];
				$list_descr = [];
				if ($list_descr_array) {
					foreach ($list_descr_array as $item2) {
						$list_descr[] = $item2['nazvanie'];
					}
				}
				$type_of_test[] = [
					'title' => $item['zagolovok'],
					'for_whom' => $item['dlya_kakih_klassov'],
					'list_descr' => $list_descr,
					'time' => $item['vremya'],
					'price' => $item['czena'],
				];
			}
		}
		$stages_test_array = get_field('list_etapy', $id_page);
		$stages_test = [];
		if ($stages_test_array) {
			foreach ($stages_test_array as $item) {
				$img = $item['izobrazhenie'];
				$stages_test[] = [
					'title' => $item['zagolovok'],
					'description' => $item['opisanie'],
					'img' => ['url' => $img['url'], 'alt' => $img['title']],
				];
			}
		}
		$need_list_array = get_field('neobhodimyj_spisok', $id_page);
		$need_list = [];
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
		$consultants = [];
		if ($consultants_array) {
			foreach ($consultants_array as $item) {
				$img = $item['foto'];

				$consultants[] = [
					'name' => $item['fio'],
					'job_title' => $item['dolzhnost'],
					'description' => $item['opisanie'],
					'img' => ['url' => $img['url'], 'alt' => $img['title']],
				];
			}
		}
		$faq_array = get_field('spisok_voprosov', $id_page);
		$faq = [];
		if ($faq_array) {
			foreach ($faq_array as $item) {
				$faq[] = [
					'answer' => $item['otvet'],
					'question' => $item['vopros'],
				];
			}
		}
		$my_page_proff = get_page_by_path('proftestirovanie', OBJECT, 'page');
		$step_form = [];
		if ($my_page_proff) {
			$id_page_proff = $my_page_proff->ID;
			$steps_form = get_field('spisok_punktov', $id_page_proff);
			$steps_form_items = [];
			if ($steps_form) {
				foreach ($steps_form as $item) {
					$steps_form_items[] = $item['nazvanie'];
				}
			}
			$img_steps_form = get_field('izobrazhenie_zayavka', $id_page_proff);
			$link_to_oferta = get_field('link_to_oferta', $id_page_proff);
			$step_form['steps_form_title'] = get_field('zagolovok_zayavka', $id_page_proff);
			$step_form['steps_form_items'] = $steps_form_items;
			$step_form['img_steps_form'] = ['url' => $img_steps_form['url'], 'alt' => $img_steps_form['title']];
			$step_form['link_to_oferta'] = $link_to_oferta;
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
		$data['step_form'] = $step_form;

		$metadata = [
			'title' => get_field('title_meta', $id_page),
			'description' => get_field('description_meta', $id_page),
			'keywords' => get_field('keywords_meta', $id_page),
			'image' => get_field('img_meta', $id_page),
		];

		$data['metadata'] = $metadata;
	}

	return $data;
}

function art_page_online_test()
{

	$data = [];

	$my_page = get_page_by_path('proftestirovanie/online-test', OBJECT, 'page');
	if ($my_page) {
		$id_page = $my_page->ID;
		$post = get_post($id_page);
		$content = apply_filters('the_content', $post->post_content);
		$id_video = get_field('id_video_test', $id_page);
		$banner = get_field('img_test', $id_page);
		$benefits_array = get_field('preimushhestva_test', $id_page);
		$benefits = [];
		if ($benefits_array) {
			foreach ($benefits_array as $item) {
				$benefits[] = $item['nazvanie'];
			}
		}
		$list_array = get_field('spisok_punktov', $id_page);
		$list = [];
		if ($list_array) {
			foreach ($list_array as $item) {
				$list[] = $item['nazvanie'];
			}
		}
		$need_test[] = [
			'title' => get_field('title_block_test', $id_page),
			'list' => $list
		];

		$type_of_test = [];
		$type_array = get_field('tests_block', $id_page);
		if ($type_array) {
			foreach ($type_array as $item) {
				$list_descr_array = $item['spisok_opisanie'];
				$list_descr = [];
				if ($list_descr_array) {
					foreach ($list_descr_array as $item2) {
						$list_descr[] = $item2['nazvanie'];
					}
				}
				$type_of_test[] = [
					'title' => $item['zagolovok'],
					'for_whom' => $item['dlya_kakih_klassov'],
					'list_descr' => $list_descr,
					'time' => $item['vremya'],
					'price' => $item['czena'],
				];
			}
		}
		$stages_test = [];
		$stages_test_array = get_field('list_etapy', $id_page);
		if ($stages_test_array) {
			foreach ($stages_test_array as $item) {
				$img = $item['izobrazhenie'];
				$stages_test[] = [
					'title' => $item['zagolovok'],
					'description' => $item['opisanie'],
					'img' => ['url' => $img['url'], 'alt' => $img['title']],
				];
			}
		}
		$need_list_array = get_field('neobhodimyj_spisok', $id_page);
		$need_list = [];
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
		$consultants = [];
		if ($consultants_array) {
			foreach ($consultants_array as $item) {
				$img = $item['foto'];

				$consultants[] = [
					'name' => $item['fio'],
					'job_title' => $item['dolzhnost'],
					'description' => $item['opisanie'],
					'img' => ['url' => $img['url'], 'alt' => $img['title']],
				];
			}
		}


		$faq_array = get_field('spisok_voprosov', $id_page);
		$faq = [];
		if ($faq_array) {
			foreach ($faq_array as $item) {
				$faq[] = [
					'answer' => $item['otvet'],
					'question' => $item['vopros'],
				];
			}
		}

		$my_page_proff = get_page_by_path('proftestirovanie', OBJECT, 'page');
		$step_form = [];
		if ($my_page_proff) {
			$id_page_proff = $my_page_proff->ID;
			$steps_form = get_field('spisok_punktov', $id_page_proff);
			$steps_form_items = [];
			if ($steps_form) {
				foreach ($steps_form as $item) {
					$steps_form_items[] = $item['nazvanie'];
				}
			}
			$img_steps_form = get_field('izobrazhenie_zayavka', $id_page_proff);
			$link_to_oferta = get_field('link_to_oferta', $id_page_proff);
			$step_form['steps_form_title'] = get_field('zagolovok_zayavka', $id_page_proff);
			$step_form['steps_form_items'] = $steps_form_items;
			$step_form['img_steps_form'] = ['url' => $img_steps_form['url'], 'alt' => $img_steps_form['title']];
			$step_form['link_to_oferta'] = $link_to_oferta;
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
		$data['step_form'] = $step_form;

		$metadata = [
			'title' => get_field('title_meta', $id_page),
			'description' => get_field('description_meta', $id_page),
			'keywords' => get_field('keywords_meta', $id_page),
			'image' => get_field('img_meta', $id_page),
		];

		$data['metadata'] = $metadata;
	}

	return $data;
}

function art_page_proftestirovanie()
{

	$data = [];

	$my_page = get_page_by_path('proftestirovanie', OBJECT, 'page');
	if ($my_page) {
		$id_page = $my_page->ID;
		$post = get_post($id_page);
		$content = apply_filters('the_content', $post->post_content);
		$id_video = get_field('id_video', $id_page);
		$banner = get_field('izobrazhenie', $id_page);

		$tests = get_field('vid_test', $id_page);

		$all_tests = [];
		if ($tests) {
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
		}

		$why_title = get_field('zagolovok_test', $id_page);
		$questions = get_field('spisok_voprosov', $id_page);

		if ($questions) {
			foreach ($questions as $item) {
				$list_questions[] = [
					'question' => $item['zagolovok'],
					'answer' => $item['opisanie']
				];
			}
		}


		$steps_form = get_field('spisok_punktov', $id_page);
		$steps_form_items = [];
		if ($steps_form) {
			foreach ($steps_form as $item) {
				$steps_form_items[] = $item['nazvanie'];
			}
		}

		$img_steps_form = get_field('izobrazhenie_zayavka', $id_page);
		$link_to_oferta = get_field('link_to_oferta', $id_page);
		$step_form['steps_form_title'] = get_field('zagolovok_zayavka', $id_page);
		$step_form['steps_form_items'] = $steps_form_items;
		$step_form['img_steps_form'] = ['url' => $img_steps_form['url'], 'alt' => $img_steps_form['title']];
		$step_form['link_to_oferta'] = $link_to_oferta;

		$id_page_online = get_page_by_path('proftestirovanie/online-test', OBJECT, 'page')->ID;
		$id_page_ofline = get_page_by_path('proftestirovanie/offline-test', OBJECT, 'page')->ID;

		$online = get_field('konsultanty_test', $id_page_online);
		$offline = get_field('konsultanty_test', $id_page_ofline);
		$consultants_online = [];
		$consultants_offline = [];
		if ($online) {
			foreach ($online as $item) {
				$img = $item['foto'];
				$consultants_online[] = [
					'title' => $item['fio'],
					'job_title' => $item['dolzhnost'],
					'description' => $item['opisanie'],
					'img' => ['url' => $img['url'], 'alt' => $img['title']]
				];
			}
		}
		if ($offline) {
			foreach ($offline as $item) {
				$img = $item['foto'];
				$consultants_offline[] = [
					'title' => $item['fio'],
					'job_title' => $item['dolzhnost'],
					'description' => $item['opisanie'],
					'img' => ['url' => $img['url'], 'alt' => $img['title']]
				];
			}
		}
		$array_merge_consultants = array_merge($consultants_online, $consultants_offline);

		$consultants = [];
		$test = [];

		if ($array_merge_consultants) {
			foreach ($array_merge_consultants as $value) {
				if (!in_array($value['title'], $test)) {
					$test[] = $value['title'];
					$consultants[] = $value;
				}
			}
		}


		$reviews_array = get_field('reviews', $id_page);
		$reviews = [];
		if ($reviews_array) {
			foreach ($reviews_array as $item) {
				$review = $item['format_otzyva'] ? ['id_video' => $item['id_video'], 'url_img' => $item['img_video']['url'], 'url_img_2' => ''] : ['id_video' => '', 'url_img' => $item['img_review']['url'], 'url_img_2' => $item['img_review_2']['url']];
				$reviews[] = $review;
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
		$data['reviews'] = $reviews;

		$data['step_form'] = $step_form;

		$metadata = [
			'title' => get_field('title_meta', $id_page),
			'description' => get_field('description_meta', $id_page),
			'keywords' => get_field('keywords_meta', $id_page),
			'image' => get_field('img_meta', $id_page),
		];

		$data['metadata'] = $metadata;
	}


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

	if ($courses->posts) {
		foreach ($courses->posts as $course) {
			$id = $course->ID;
			$thumbnail = get_field('img_problem', $id);

			$course_ages = get_the_terms($id, 'courses-ages');
			$pattern = '/[^0-9]/';
			$name_ages = [];
			if ($course_ages) {
				foreach ($course_ages as $item) {
					$name_ages[] = (int)preg_replace($pattern, "", $item->name);
				}
			}

			$period_ages = min($name_ages) . '-' . max($name_ages) . ' лет';

			$data[$i]['id'] = $id;
			$data[$i]['post_title'] = $course->post_title;
			$data[$i]['post_slug'] = $course->post_name;
			$data[$i]['ages'] = $period_ages;
			$data[$i]['thumbnail'] = ['url' => $thumbnail['url'], 'alt' => $thumbnail['title']];

			$i++;
		}
	}

	return $data;
}

function art_page_courses_post($slug)
{
	$data = [];
	$args = [
		'post_type' => 'courses',
		'name' 	=> $slug['slug'],
	];
	$post = get_posts($args);

	if ($post) {
		$id = $post[0]->ID;
		$description = get_field('description_course', $id);
		$$title_problem = get_field('title_problem', $id);

		$course_ages = get_the_terms($id, 'courses-ages');
		$pattern = '/[^0-9]/';
		$name_ages = [];
		if ($course_ages) {
			foreach ($course_ages as $item) {
				$name_ages[] = (int)preg_replace($pattern, "", $item->name);
			}
		}
		$period_ages = min($name_ages) . '-' . max($name_ages) . ' лет';
		$list_problem_array = get_field('list_problem', $id);
		$list_problem = [];
		if ($list_problem_array) {
			foreach ($list_problem_array as $item) {
				$list_problem[] = $item['nazvanie'];
			}
		}

		$img = get_field('img_problem', $id);
		$description_course = [
			'description' => $description,
			'ages' => $period_ages,
			'title' => $title_problem,
			'list_problem' => $list_problem,
			'img' => ['url' => $img['url'], 'alt' => $img['title']]
		];

		$to_do_list_array = get_field('spisok_del', $id);
		$to_do_list = [];
		if ($to_do_list_array) {
			foreach ($to_do_list_array as $item) {
				$to_do_list[] = $item['nazvanie'];
			}
		}

		$course_outcome_list_array = get_field('spisok_del', $id);
		$course_outcome_list = [];
		if ($course_outcome_list_array) {
			foreach ($course_outcome_list_array as $item) {
				$course_outcome_list[] = $item['nazvanie'];
			}
		}

		$about_course_array = get_field('spisok_del', $id);
		$about_course = [];
		if ($about_course_array) {
			foreach ($about_course_array as $item) {
				$about_course[] = $item['nazvanie'];
			}
		}

		$what_we_do = [
			'to_do_title' => get_field('title_doing', $id),
			'to_do_list' => $to_do_list,
			'course_outcome_title' => get_field('zagolovok_rezultata_kursa', $id),
			'course_outcome_list' => $course_outcome_list,
			'about_course' => $about_course
		];

		$photo = get_field('photo', $id);
		$educator = [
			'name' => get_field('fio', $id),
			'position' => get_field('dolzhnost', $id),
			'photo' => ['url' => $photo['url'], 'alt' => $photo['title']],
			'price' => get_field('czena', $id),
			'one_time_fee' => get_field('edinorazovaya_plata', $id),
		];

		$my_page = get_page_by_path('courses', OBJECT, 'page');
		if ($my_page) {
			$id_page = $my_page->ID;
			$steps_form = get_field('spisok_punktov', $id_page);
			$steps_form_items = [];
			if ($steps_form) {
				foreach ($steps_form as $item) {
					$steps_form_items[] = $item['nazvanie'];
				}
			}
			$img_steps_form = get_field('izobrazhenie_razdel_lagerya', $id_page);
			$step_form['steps_form_title'] = get_field('zagolovok_zayavka', $id_page);
			$step_form['steps_form_items'] = $steps_form_items;
			$step_form['img_steps_form'] = ['url' => $img_steps_form['url'], 'alt' => $img_steps_form['title']];
		}

		$data['id'] = $id;
		$data['title'] = $post[0]->post_title;
		$data['slug'] = $post[0]->post_name;
		$data['description_course'] = $description_course;
		$data['what_we_do'] = $what_we_do;
		$data['educator'] = $educator;
		$data['step_form'] = $step_form;

		$metadata = [
			'title' => get_field('title_meta', $id_page),
			'description' => get_field('description_meta', $id_page),
			'keywords' => get_field('keywords_meta', $id_page),
			'image' => get_field('img_meta', $id_page),
		];

		$data['metadata'] = $metadata;
	}

	return $data;
}

function art_page_courses()
{
	$data = [];

	$my_page = get_page_by_path('courses', OBJECT, 'page');
	if ($my_page) {
		$id_page = $my_page->ID;

		$background_img = ['url' => get_field('image_page_courses', $id_page)['url'], 'alt' => get_field('image_page_courses', $id_page)['title']];
		$background_video = get_field('video_page_courses', $id_page);

		$post = get_post($id_page);
		$content = apply_filters('the_content', $post->post_content);
		$description = get_field('description_courses', $id_page);

		$arrayCourses = [];
		$launch_group = [];

		$terms = get_terms([
			'taxonomy' => 'courses-category',
			'hide_empty' => false,
		]);

		if ($terms) {
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
				$launch_group_card = [];
				if ($courses) {
					foreach ($courses as $course) {
						$id = $course->ID;
						$image_miniatyura = get_field('img_problem', $id);
						$course_ages = get_the_terms($id, 'courses-ages');
						$pattern = '/[^0-9]/';
						$name_ages = [];
						if ($course_ages) {
							foreach ($course_ages as $item) {
								$name_ages[] = (int)preg_replace($pattern, "", $item->name);
							}
						}
						$period_ages = min($name_ages) . '-' . max($name_ages) . ' лет';
						$availability_seats = get_field('availability_seats', $id);
						$newCourses[] = [
							'ID' => $id,
							'post_title' => $course->post_title,
							'post_slug' => $course->post_name,
							'thumbnail' => ['url' => $image_miniatyura['url'], 'alt' => $image_miniatyura['title']],
							'ages' => $period_ages
						];
						$launch_group_card[] = [
							'ID' => $id,
							'post_title' => $course->post_title,
							'post_slug' => $course->post_name,
							'ages' => $period_ages,
							'availability_seats' => $availability_seats
						];
					}
				}
				$arrayCourses[] = [
					'term_id' => $term->term_id,
					'name' => $term->name,
					'slug' => $term->slug,
					'description' => $term->description,
					'count' => $term->count,
					'camp_card' => $newCourses
				];
				$launch_group[] = [
					'term_id' => $term->term_id,
					'name' => $term->name,
					'count' => $term->count,
					'camp_card' => $launch_group_card
				];
			}
		}

		$review = '';

		$video_about_courses = get_field('video_about_courses', $id_page);
		$video_courses = [];
		if ($video_about_courses) {
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
		}
		$about_courses = [
			'description' => get_field('description_about_courses', $id_page),
			'video_courses' => $video_courses
		];

		$filter = [];

		$courses_ages = get_terms([
			'taxonomy' => 'courses-ages',
			'hide_empty' => false,
			'parent' => 0
		]);

		if ($courses_ages) {
			foreach ($courses_ages as $age) {
				$filter['age'][] = [
					'id' => $age->term_id,
					'name' => $age->name,
					'slug' => $age->slug,
				];
			}
		}


		$courses_category = get_terms([
			'taxonomy' => 'courses-category',
			'hide_empty' => false,
			'parent' => 0
		]);

		if ($courses_category) {
			foreach ($courses_category as $category) {
				$filter['category'][] = [
					'id' => $category->term_id,
					'name' => $category->name,
					'slug' => $category->slug,
				];
			}
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
		$steps_form_items = [];
		if ($steps_form) {
			foreach ($steps_form as $item) {
				$steps_form_items[] = $item['nazvanie'];
			}
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
		$data['filter'] = $filter;
		$data['launch_group'] = $launch_group;
		$data['courses'] = $arrayCourses;
		$data['review'] = $review;
		$data['about_courses'] = $about_courses;
		$data['step_form'] = $step_form;

		$metadata = [
			'title' => get_field('title_meta', $id_page),
			'description' => get_field('description_meta', $id_page),
			'keywords' => get_field('keywords_meta', $id_page),
			'image' => get_field('img_meta', $id_page),
		];

		$data['metadata'] = $metadata;
	}

	return $data;
}

function art_page_merch()
{
	$data = [];

	$my_page = get_page_by_path('merch', OBJECT, 'page');
	if ($my_page) {
		$id_page = $my_page->ID;

		$post = get_post($id_page);
		$title = apply_filters('the_content', $post->post_content);

		$array_description_merch = get_field('kak_kupit', $id_page);
		$description_merch = [];
		if ($array_description_merch) {
			foreach ($array_description_merch as $item) {
				$description_merch[] = $item['punkty'];
			}
		}

		$description = [
			'title_merch' => get_field('title_merch', $id_page),
			'description_merch' => $description_merch,
		];

		$array_merch = get_field('aleksandr-merch', $id_page) ? get_field('aleksandr-merch', $id_page) : null;
		if ($array_merch) {
			foreach ($array_merch as $item) {
				$gallery_images = $item['gallery_images'];
				$images = [];
				if ($gallery_images) {
					foreach ($gallery_images as $item_image) {
						$images[] = [
							'url' => $item_image['images']['url'],
							'alt' => $item_image['images']['title']
						];
					}
				}
				$array_size = $item['razmery'];
				$size = [];
				if ($array_size) {
					foreach ($array_size as $item_size) {
						$stock = $item_size['nalichie'][0] ? $item_size['nalichie'][0] : 0;
						$size[] = [
							'title' => $item_size['nazvanie'],
							'stock' => (int)$stock
						];
					}
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

		$metadata = [
			'title' => get_field('title_meta', $id_page),
			'description' => get_field('description_meta', $id_page),
			'keywords' => get_field('keywords_meta', $id_page),
			'image' => get_field('img_meta', $id_page),
		];

		$data['metadata'] = $metadata;
	}

	return $data;
}

function art_page_skills()
{
	$data = [];

	$my_page = get_term_by('slug', 'skills', 'camp-section');
	if ($my_page) {
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
		$benefits_parents = [];
		$benefits_children = [];
		if ($array_benefits_parents) {
			foreach ($array_benefits_parents as $item) {
				$benefits_parents[] = $item['nazvanie'];
			}
		}
		if ($array_benefits_children) {
			foreach ($array_benefits_children as $item) {
				$benefits_children[] = $item['nazvanie'];
			}
		}

		$mesta_prozhivaniya_title = get_field('title_section_block_video', $id_page);
		$mesta_prozhivaniya_description = get_field('description_section_block_video', $id_page);
		$array_video_mesta_prozhivaniya = get_field('video_mesta_prozhivaniya', $id_page);
		$mesta_prozhivaniya = [];
		if ($array_video_mesta_prozhivaniya) {
			foreach ($array_video_mesta_prozhivaniya as $item) {
				$mesta_prozhivaniya[] = [
					'title' => $item['zagolovok'],
					'description' => $item['opisanie'],
					'id_video' => $item['id_video'],
					'oblozhka' => ['url' => $item['oblozhka']['url'], 'alt' => $item['oblozhka']['title']]
				];
			}
		}


		$programm_title = get_field('zagolovok_bloka_programm', $id_page);
		$array_programm = get_field('opisanie_bloka_programm', $id_page);
		$programm = [];
		if ($array_programm) {
			foreach ($array_programm as $item) {
				$programm[] = $item['nazvanie'];
			}
		}
		$programm_img = ['url' => get_field('izobrazhenie_programm', $id_page)['url'], 'alt' => get_field('izobrazhenie_programm', $id_page)['title']];

		$daily_regime_title = get_field('zagolovok_bloka_rezim', $id_page);
		$array_daily_regime = get_field('rasporyadok_dnya', $id_page);
		$daily_regime = [];
		if ($array_daily_regime) {
			foreach ($array_daily_regime as $item) {
				$daily_regime[] = $item['vremya_i_meropriyatie'];
			}
		}

		$includ_title = get_field('zagolovok_bloka_price', $id_page);
		$includ_post = get_field('opisanie_bloka_price', $id_page);
		$includ_content = apply_filters('the_content', $includ_post);

		$array_faq = get_field('faq', $id_page);
		$faq = [];
		if ($array_faq) {
			foreach ($array_faq as $item) {
				$faq[] = ['question' => $item['vopros'], 'answer' => $item['otvet']];
			}
		}

		$request_title = get_field('zagolovok_zayavka', $id_page);
		$array_request = get_field('spisok_punktov', $id_page);
		$request = [];
		if ($array_request) {
			foreach ($array_request as $item) {
				$request[] = $item['nazvanie'];
			}
		}
		$request_img = ['url' => get_field('izobrazhenie_razdel_lagerya', $id_page)['url'], 'alt' => get_field('izobrazhenie_razdel_lagerya', $id_page)['title']];
		$request_link_to_oferta  = get_field('link_to_oferta', $id_page);
		if (is_string($request_link_to_oferta)) {
			$request_link_to_oferta2 = explode('contract', $request_link_to_oferta)[1];
			$request_link_to_oferta = str_replace('/', '', $request_link_to_oferta2);
		}
		$past_shifts = [];
		$args = [
			'post_type' => 'camp',
			'numberposts' 	=> -1,
			'post_status'    => 'draft',
			'tax_query' => [[
				'taxonomy' => 'camp-section',
				'field'    => 'slug',
				'terms'    => 'skills'
			]],
		];

		$posts = query_posts($args);
		if ($posts) {
			$i = 0;
			foreach ($posts as $post) {
				$id = $post->ID;
				$thumbnail_url = get_field('image_miniatyura', $id);
				// Added to api
				$past_shifts[$i]['id'] = $id;
				$past_shifts[$i]['title'] = $post->post_title;
				$past_shifts[$i]['thumbnail_url'] = ['url' => $thumbnail_url['url'], 'alt' => $thumbnail_url['title']];
				$past_shifts[$i]['slug'] = $post->post_name;

				$i++;
			}
		}

		$shift_selection = [];
		$args_shift = [
			'post_type' => 'camp',
			'numberposts' 	=> -1,
			'tax_query' => [[
				'taxonomy' => 'camp-section',
				'field'    => 'slug',
				'terms'    => 'skills'
			]],
		];

		$posts_shift = query_posts($args_shift);
		if ($posts_shift) {
			$i = 0;

			foreach ($posts_shift as $post) {
				$id = $post->ID;
				$card_profstart_array = get_field('profstart_cards', $id);
				$card_profstart = [];
				if ($card_profstart_array) {
					foreach ($card_profstart_array as $item) {
						$img_shift = $item['image_card'];

						$course_ages = $item['vozrast'];
						$period_ages = [];
						$name_ages = [];
						if ($course_ages) {
							$pattern = '/[^0-9]/';

							foreach ($course_ages as $item12) {
								$name_ages[] = (int)preg_replace($pattern, "", $item12->name);
							}
							$period_ages = min($name_ages) . '-' . max($name_ages) . ' лет';
						}

						$card_profstart[] = [
							'title' => $item['title_card'],
							'period' => get_field('period', $id),
							'location' => get_field('location', $id),
							'ages' => $name_ages,
							'description' => $item['description_card'],
							'seats' => $item['nalichie_mest_card'],
							'price' => get_field('change_price', $id),
							'price_certificate' => get_field('price_per_certificate', $id),
							'thumbnail_url' => ['url' => $img_shift['url'], 'alt' => $img_shift['title']],
							'age_title' => $period_ages,
						];
					}
				}

				$card_profi_array = get_field('profi_cards', $id);
				$card_profi = [];
				if ($card_profi_array) {

					foreach ($card_profi_array as $item) {
						$img_shift = $item['image_card'];

						$course_ages = $item['vozrast'];
						$period_ages = [];
						$name_ages = [];
						if ($course_ages) {
							$pattern = '/[^0-9]/';
							foreach ($course_ages as $item12) {
								$name_ages[] = (int)preg_replace($pattern, "", $item12->name);
							}
							$period_ages = min($name_ages) . '-' . max($name_ages) . ' лет';
						}

						$card_profi[] = [
							'title' => $item['title_card'],
							'period' => get_field('period', $id),
							'location' => get_field('location', $id),
							'ages' => $name_ages,
							'description' => $item['description_card'],
							'seats' => $item['nalichie_mest_card'],
							'price' => get_field('change_price', $id),
							'price_certificate' => get_field('price_per_certificate', $id),
							'thumbnail_url' => ['url' => $img_shift['url'], 'alt' => $img_shift['title']],
							'age_title' => $period_ages,
						];
					}
				}

				$profi_array = [
					'description' => get_field('description_box_profi', $id),
					'card' => $card_profi
				];
				$profstart_array = [
					'description' => get_field('description_box_profstart', $id),
					'card' => $card_profstart
				];
				// Added to api
				$shift_selection[$i]['id'] = $id;
				$shift_selection[$i]['title'] = $post->post_title;
				$shift_selection[$i]['slug'] = $post->post_name;
				$shift_selection[$i]['price'] = get_field('change_price', $id);
				$shift_selection[$i]['price_certificate'] = get_field('price_per_certificate', $id);
				$shift_selection[$i]['no_certificate'] = get_field('text_without_action', $id);
				$shift_selection[$i]['profi'] = $profi_array;
				$shift_selection[$i]['profstart'] = $profstart_array;

				$i++;
			}
		}

		$data['id_page'] = $my_page->term_id;
		$data['background_img'] = $background_img;
		$data['background_video'] = $background_video;
		$data['content'] = $content;

		$data['description_text'] = $content_description_section;
		$data['description_img'] = $izobrazhenie;
		$data['description_video'] = $id_video;

		$data['shift_selection'] = $shift_selection;

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
		$data['link_to_oferta'] = $request_link_to_oferta;

		$data['past_shifts'] = $past_shifts;

		$metadata = [
			'title' => get_field('title_meta', $id_page),
			'description' => get_field('description_meta', $id_page),
			'keywords' => get_field('keywords_meta', $id_page),
			'image' => get_field('img_meta', $id_page),
		];

		$data['metadata'] = $metadata;
	}

	return $data;
}

function art_page_professions()
{
	$data = [];

	$my_page = get_term_by('slug', 'professions', 'camp-section');
	if ($my_page) {
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
		$benefits_parents = [];
		$benefits_children = [];
		if ($array_benefits_parents) {
			foreach ($array_benefits_parents as $item) {
				$benefits_parents[] = $item['nazvanie'];
			}
		}
		if ($array_benefits_children) {
			foreach ($array_benefits_children as $item) {
				$benefits_children[] = $item['nazvanie'];
			}
		}
		$mesta_prozhivaniya_title = get_field('title_section_block_video', $id_page);
		$mesta_prozhivaniya_description = get_field('description_section_block_video', $id_page);
		$array_video_mesta_prozhivaniya = get_field('video_mesta_prozhivaniya', $id_page);
		$mesta_prozhivaniya = [];
		if ($array_video_mesta_prozhivaniya) {
			foreach ($array_video_mesta_prozhivaniya as $item) {
				$mesta_prozhivaniya[] = [
					'title' => $item['zagolovok'],
					'description' => $item['opisanie'],
					'id_video' => $item['id_video'],
					'oblozhka' => ['url' => $item['oblozhka']['url'], 'alt' => $item['oblozhka']['title']]
				];
			}
		}
		$programm_title = get_field('zagolovok_bloka_programm', $id_page);
		$array_programm = get_field('opisanie_bloka_programm', $id_page);
		$programm = [];
		if ($array_programm) {
			foreach ($array_programm as $item) {
				$programm[] = $item['nazvanie'];
			}
		}

		$programm_img = ['url' => get_field('izobrazhenie_programm', $id_page)['url'], 'alt' => get_field('izobrazhenie_programm', $id_page)['title']];

		$daily_regime_title = get_field('zagolovok_bloka_rezim', $id_page);
		$array_daily_regime = get_field('rasporyadok_dnya', $id_page);
		$daily_regime = [];
		if ($array_daily_regime) {
			foreach ($array_daily_regime as $item) {
				$daily_regime[] = $item['vremya_i_meropriyatie'];
			}
		}


		$includ_title = get_field('zagolovok_bloka_price', $id_page);
		$includ_post = get_field('opisanie_bloka_price', $id_page);
		$includ_content = apply_filters('the_content', $includ_post);

		$array_faq = get_field('faq', $id_page);
		$faq = [];
		if ($array_faq) {
			foreach ($array_faq as $item) {
				$faq[] = ['question' => $item['vopros'], 'answer' => $item['otvet']];
			}
		}
		$request_title = get_field('zagolovok_zayavka', $id_page);
		$array_request = get_field('spisok_punktov', $id_page);
		$request = [];
		if ($array_request) {
			foreach ($array_request as $item) {
				$request[] = $item['nazvanie'];
			}
		}

		$request_img = ['url' => get_field('izobrazhenie_razdel_lagerya', $id_page)['url'], 'alt' => get_field('izobrazhenie_razdel_lagerya', $id_page)['title']];
		$request_link_to_oferta  = get_field('link_to_oferta', $id_page);
		if (is_string($request_link_to_oferta)) {
			$request_link_to_oferta2 = explode('contract', $request_link_to_oferta)[1];
			$request_link_to_oferta = str_replace('/', '', $request_link_to_oferta2);
		}
		$past_shifts = [];
		$args = [
			'post_type' => 'camp',
			'numberposts' 	=> -1,
			'post_status'    => 'draft',
			'tax_query' => [[
				'taxonomy' => 'camp-section',
				'field'    => 'slug',
				'terms'    => 'professions'
			]],
		];

		$posts = query_posts($args);
		if ($posts) {
			$i = 0;
			foreach ($posts as $post) {
				$id = $post->ID;
				$thumbnail_url = get_field('image_miniatyura', $id);;
				// Added to api
				$past_shifts[$i]['id'] = $id;
				$past_shifts[$i]['title'] = $post->post_title;
				$past_shifts[$i]['thumbnail_url'] = ['url' => $thumbnail_url['url'], 'alt' => $thumbnail_url['title']];
				$past_shifts[$i]['slug'] = $post->post_name;

				$i++;
			}
		}

		$shift_selection = [];
		$args_shift = [
			'post_type' => 'camp',
			'numberposts' 	=> -1,
			'tax_query' => [[
				'taxonomy' => 'camp-section',
				'field'    => 'slug',
				'terms'    => 'professions'
			]],
		];

		$posts_shift = query_posts($args_shift);
		if ($posts_shift) {
			$i = 0;

			foreach ($posts_shift as $post) {
				$id = $post->ID;
				$card_profstart_array = get_field('profstart_cards', $id);
				$card_profstart = [];
				if ($card_profstart_array) {
					foreach ($card_profstart_array as $item) {
						$img_shift = $item['image_card'];

						$course_ages = $item['vozrast'];
						$period_ages = [];
						$name_ages = [];
						if ($course_ages) {
							$pattern = '/[^0-9]/';

							foreach ($course_ages as $item12) {
								$name_ages[] = (int)preg_replace($pattern, "", $item12->name);
							}
							$period_ages = min($name_ages) . '-' . max($name_ages) . ' лет';
						}

						$card_profstart[] = [
							'title' => $item['title_card'],
							'period' => get_field('period', $id),
							'location' => get_field('location', $id),
							'ages' => $name_ages,
							'description' => $item['description_card'],
							'seats' => $item['nalichie_mest_card'],
							'price' => get_field('change_price', $id),
							'price_certificate' => get_field('price_per_certificate', $id),
							'thumbnail_url' => ['url' => $img_shift['url'], 'alt' => $img_shift['title']],
							'age_title' => $period_ages,
						];
					}
				}

				$card_profi_array = get_field('profi_cards', $id);
				$card_profi = [];
				if ($card_profi_array) {

					foreach ($card_profi_array as $item) {
						$img_shift = $item['image_card'];

						$course_ages = $item['vozrast'];
						$period_ages = [];
						$name_ages = [];
						if ($course_ages) {
							$pattern = '/[^0-9]/';
							foreach ($course_ages as $item12) {
								$name_ages[] = (int)preg_replace($pattern, "", $item12->name);
							}
							$period_ages = min($name_ages) . '-' . max($name_ages) . ' лет';
						}

						$card_profi[] = [
							'title' => $item['title_card'],
							'period' => get_field('period', $id),
							'location' => get_field('location', $id),
							'ages' => $name_ages,
							'description' => $item['description_card'],
							'seats' => $item['nalichie_mest_card'],
							'price' => get_field('change_price', $id),
							'price_certificate' => get_field('price_per_certificate', $id),
							'thumbnail_url' => ['url' => $img_shift['url'], 'alt' => $img_shift['title']],
							'age_title' => $period_ages,
						];
					}
				}

				$profi_array = [
					'description' => get_field('description_box_profi', $id),
					'card' => $card_profi
				];
				$profstart_array = [
					'description' => get_field('description_box_profstart', $id),
					'card' => $card_profstart
				];
				// Added to api
				$shift_selection[$i]['id'] = $id;
				$shift_selection[$i]['title'] = $post->post_title;
				$shift_selection[$i]['slug'] = $post->post_name;
				$shift_selection[$i]['price'] = get_field('change_price', $id);
				$shift_selection[$i]['price_certificate'] = get_field('price_per_certificate', $id);
				$shift_selection[$i]['no_certificate'] = get_field('text_without_action', $id);
				$shift_selection[$i]['profi'] = $profi_array;
				$shift_selection[$i]['profstart'] = $profstart_array;

				$i++;
			}
		}


		$data['id_page'] = $my_page->term_id;
		$data['background_img'] = $background_img;
		$data['background_video'] = $background_video;
		$data['content'] = $content;

		$data['description_text'] = $content_description_section;
		$data['description_img'] = $izobrazhenie;
		$data['description_video'] = $id_video;

		$data['shift_selection'] = $shift_selection;

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
		$data['link_to_oferta'] = $request_link_to_oferta;


		$data['past_shifts'] = $past_shifts;

		$metadata = [
			'title' => get_field('title_meta', $id_page),
			'description' => get_field('description_meta', $id_page),
			'keywords' => get_field('keywords_meta', $id_page),
			'image' => get_field('img_meta', $id_page),
		];

		$data['metadata'] = $metadata;
	}

	return $data;
}

function art_page_tourist_holidays()
{
	$data = [];

	$my_page = get_term_by('slug', 'tourist-holidays', 'camp-section');
	if ($my_page) {
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
		$benefits_parents = [];
		if ($array_benefits_parents) {
			foreach ($array_benefits_parents as $item) {
				$benefits_parents[] = $item['nazvanie'];
			}
		}
		$benefits_children = [];
		if ($array_benefits_children) {
			foreach ($array_benefits_children as $item) {
				$benefits_children[] = $item['nazvanie'];
			}
		}

		$mesta_prozhivaniya_title = get_field('title_section_block_video', $id_page);
		$mesta_prozhivaniya_description = get_field('description_section_block_video', $id_page);
		$array_video_mesta_prozhivaniya = get_field('video_mesta_prozhivaniya', $id_page);
		$mesta_prozhivaniya = [];
		if ($array_video_mesta_prozhivaniya) {
			foreach ($array_video_mesta_prozhivaniya as $item) {
				$mesta_prozhivaniya[] = [
					'title' => $item['zagolovok'],
					'description' => $item['opisanie'],
					'id_video' => $item['id_video'],
					'oblozhka' => ['url' => $item['oblozhka']['url'], 'alt' => $item['oblozhka']['title']]
				];
			}
		}


		$programm_title = get_field('zagolovok_bloka_programm', $id_page);
		$array_programm = get_field('opisanie_bloka_programm', $id_page);
		$programm = [];
		if ($array_programm) {
			foreach ($array_programm as $item) {
				$programm[] = $item['nazvanie'];
			}
		}

		$programm_img = ['url' => get_field('izobrazhenie_programm', $id_page)['url'], 'alt' => get_field('izobrazhenie_programm', $id_page)['title']];

		$daily_regime_title = get_field('zagolovok_bloka_rezim', $id_page);
		$array_daily_regime = get_field('rasporyadok_dnya', $id_page);
		$daily_regime = [];
		if ($array_daily_regime) {
			foreach ($array_daily_regime as $item) {
				$daily_regime[] = $item['vremya_i_meropriyatie'];
			}
		}


		$includ_title = get_field('zagolovok_bloka_price', $id_page);
		$includ_post = get_field('opisanie_bloka_price', $id_page);
		$includ_content = apply_filters('the_content', $includ_post);

		$array_faq = get_field('faq', $id_page);
		$faq = [];
		if ($array_faq) {
			foreach ($array_faq as $item) {
				$faq[] = ['question' => $item['vopros'], 'answer' => $item['otvet']];
			}
		}

		$request_title = get_field('zagolovok_zayavka', $id_page);
		$array_request = get_field('spisok_punktov', $id_page);
		$request = [];
		if ($array_request) {
			foreach ($array_request as $item) {
				$request[] = $item['nazvanie'];
			}
		}

		$request_img = ['url' => get_field('izobrazhenie_razdel_lagerya', $id_page)['url'], 'alt' => get_field('izobrazhenie_razdel_lagerya', $id_page)['title']];
		$request_link_to_oferta  = get_field('link_to_oferta', $id_page);
		if (is_string($request_link_to_oferta)) {
			$request_link_to_oferta2 = explode('contract', $request_link_to_oferta)[1];
			$request_link_to_oferta = str_replace('/', '', $request_link_to_oferta2);
		}

		$past_shifts = [];
		$args = [
			'post_type' => 'camp',
			'numberposts' 	=> -1,
			'post_status'    => 'draft',
			'tax_query' => [[
				'taxonomy' => 'camp-section',
				'field'    => 'slug',
				'terms'    => 'tourist-holidays'
			]],
		];

		$posts = query_posts($args);
		if ($posts) {
			$i = 0;

			foreach ($posts as $post) {
				$id = $post->ID;
				$thumbnail_url = get_field('image_miniatyura', $id);;
				// Added to api
				$past_shifts[$i]['id'] = $id;
				$past_shifts[$i]['title'] = $post->post_title;
				$past_shifts[$i]['thumbnail_url'] = ['url' => $thumbnail_url['url'], 'alt' => $thumbnail_url['title']];
				$past_shifts[$i]['slug'] = $post->post_name;

				$i++;
			}
		}

		$shift_selection = [];
		$args_shift = [
			'post_type' => 'camp',
			'numberposts' 	=> -1,
			'tax_query' => [[
				'taxonomy' => 'camp-section',
				'field'    => 'slug',
				'terms'    => 'tourist-holidays'
			]],
		];

		$posts_shift = query_posts($args_shift);
		if ($posts_shift) {
			$i = 0;

			foreach ($posts_shift as $post) {
				$id = $post->ID;
				$card_profstart_array = get_field('profstart_cards', $id);
				$card_profstart = [];
				if ($card_profstart_array) {
					foreach ($card_profstart_array as $item) {
						$img_shift = $item['image_card'];

						$course_ages = $item['vozrast'];
						$period_ages = [];
						$name_ages = [];
						if ($course_ages) {
							$pattern = '/[^0-9]/';

							foreach ($course_ages as $item12) {
								$name_ages[] = (int)preg_replace($pattern, "", $item12->name);
							}
							$period_ages = min($name_ages) . '-' . max($name_ages) . ' лет';
						}

						$card_profstart[] = [
							'title' => $item['title_card'],
							'period' => get_field('period', $id),
							'location' => get_field('location', $id),
							'ages' => $name_ages,
							'description' => $item['description_card'],
							'seats' => $item['nalichie_mest_card'],
							'price' => get_field('change_price', $id),
							'price_certificate' => get_field('price_per_certificate', $id),
							'thumbnail_url' => ['url' => $img_shift['url'], 'alt' => $img_shift['title']],
							'age_title' => $period_ages,
						];
					}
				}

				$card_profi_array = get_field('profi_cards', $id);
				$card_profi = [];
				if ($card_profi_array) {

					foreach ($card_profi_array as $item) {
						$img_shift = $item['image_card'];

						$course_ages = $item['vozrast'];
						$period_ages = [];
						$name_ages = [];
						if ($course_ages) {
							$pattern = '/[^0-9]/';
							foreach ($course_ages as $item12) {
								$name_ages[] = (int)preg_replace($pattern, "", $item12->name);
							}
							$period_ages = min($name_ages) . '-' . max($name_ages) . ' лет';
						}

						$card_profi[] = [
							'title' => $item['title_card'],
							'period' => get_field('period', $id),
							'location' => get_field('location', $id),
							'ages' => $name_ages,
							'description' => $item['description_card'],
							'seats' => $item['nalichie_mest_card'],
							'price' => get_field('change_price', $id),
							'price_certificate' => get_field('price_per_certificate', $id),
							'thumbnail_url' => ['url' => $img_shift['url'], 'alt' => $img_shift['title']],
							'age_title' => $period_ages,
						];
					}
				}

				$profi_array = [
					'description' => get_field('description_box_profi', $id),
					'card' => $card_profi
				];
				$profstart_array = [
					'description' => get_field('description_box_profstart', $id),
					'card' => $card_profstart
				];
				// Added to api
				$shift_selection[$i]['id'] = $id;
				$shift_selection[$i]['title'] = $post->post_title;
				$shift_selection[$i]['slug'] = $post->post_name;
				$shift_selection[$i]['price'] = get_field('change_price', $id);
				$shift_selection[$i]['price_certificate'] = get_field('price_per_certificate', $id);
				$shift_selection[$i]['no_certificate'] = get_field('text_without_action', $id);
				$shift_selection[$i]['profi'] = $profi_array;
				$shift_selection[$i]['profstart'] = $profstart_array;

				$i++;
			}
		}

		$data['id_page'] = $my_page->term_id;
		$data['background_img'] = $background_img;
		$data['background_video'] = $background_video;
		$data['content'] = $content;

		$data['description_text'] = $content_description_section;
		$data['description_img'] = $izobrazhenie;
		$data['description_video'] = $id_video;

		$data['shift_selection'] = $shift_selection;

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
		$data['link_to_oferta'] = $request_link_to_oferta;

		$data['past_shifts'] = $past_shifts;

		$metadata = [
			'title' => get_field('title_meta', $id_page),
			'description' => get_field('description_meta', $id_page),
			'keywords' => get_field('keywords_meta', $id_page),
			'image' => get_field('img_meta', $id_page),
		];

		$data['metadata'] = $metadata;
	}

	return $data;
}

function art_page_doc_post($slug)
{
	$data = [];
	$args = [
		'post_type' => 'docs',
		'name' 	=> $slug['slug'],
	];
	$post = get_posts($args);
	if ($post) {
		$id = $post[0]->ID;
		$subtitle_docs = get_field('subtitle_docs', $id);
		$content = apply_filters('the_content', get_field('content_docs', $id));

		$arrayDocs = [];
		$argsDocs = [
			'post_type' => 'docs'
		];

		$docs = query_posts($argsDocs);
		if ($docs) {
			foreach ($docs as $doc) {
				$id = $doc->ID;
				$arrayDocs[] = [
					'id' => $id,
					'slug' => $doc->post_name,
					'title' => $doc->post_title,
					'subtitle' => get_field('subtitle_docs', $id)
				];
			}
		}

		$data['id'] = $id;
		$data['title'] = $post[0]->post_title;
		$data['slug'] = $post[0]->post_name;
		$data['subtitle_docs'] = $subtitle_docs;
		$data['content'] = $content;
		$data['docs'] = $arrayDocs;

		$metadata = [
			'title' => get_field('title_meta', $id),
			'description' => get_field('description_meta', $id),
			'keywords' => get_field('keywords_meta', $id),
			'image' => get_field('img_meta', $id),
		];

		$data['metadata'] = $metadata;
	}

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

	if ($camps) {
		$i = 0;

		foreach ($camps->posts as $camp) {
			$id = $camp->ID;
			$thumbnail = get_field('image_miniatyura', $id);

			$data[$i]['id'] = $id;
			$data[$i]['post_title'] = $camp->post_title;
			// $data[$i]['camp_section'] = $section;
			// $data[$i]['term_id'] = $section;
			$data[$i]['post_slug'] = $section . '/' . $camp->post_name;
			$data[$i]['location'] = get_field('location', $id);
			$data[$i]['thumbnail'] = ['url' => $thumbnail['url'], 'alt' => $thumbnail['title']];

			$i++;
		}
	}
	return $data;
}

function art_page_camp_post($slug)
{
	$data = [];

	$args = [
		'post_type' 		=> 'camp',
		'post_status'   => 'draft',
		'name' 					=> $slug['slug'],
	];
	$post = get_posts($args);
	if ($post) {
		$id = $post[0]->ID;
		$content = $post[0]->post_content;
		$content = apply_filters('the_content', $content);
		$content = str_replace(']]>', ']]&gt;', $content);

		$photo_slider = get_field('photo-slider', $id);
		$slider = [];
		if ($photo_slider) {
			foreach ($photo_slider as $item) {
				$slider[] = [$item['photo']['url'], $item['photo']['title']];
			}
		}

		// Added to api
		$data['id'] = $id;
		$data['title'] = $post[0]->post_title;
		$data['slug'] = $post[0]->post_name;
		$data['content'] = $content;
		$data['photo_slider'] = $slider;

		$metadata = [
			'title' => get_field('title_meta', $id),
			'description' => get_field('description_meta', $id),
			'keywords' => get_field('keywords_meta', $id),
			'image' => get_field('img_meta', $id),
		];

		$data['metadata'] = $metadata;
	}

	return $data;
}

function art_page_camp()
{
	$data = [];

	$my_page = get_page_by_path('camp', OBJECT, 'page');
	if ($my_page) {
		$id_page = $my_page->ID;
		$background_img = ['url' => get_field('image_page_camp', $id_page)['url'], 'alt' => get_field('image_page_camp', $id_page)['title']];
		$background_video = get_field('video_page_camp', $id_page);
		$post = get_post($id_page);
		$content = apply_filters('the_content', $post->post_content);
		$arrayCamps = [];

		$terms = get_terms([
			'taxonomy' => 'camp-section',
			'hide_empty' => false,
		]);

		if ($terms) {
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
				if ($camps) {
					foreach ($camps as $camp) {

						$id = $camp->ID;

						$image_miniatyura = get_field('image_miniatyura', $id);
						$info = get_field('info-card', $id);

						$newCamps[] = [
							'ID' => $id,
							'post_title' => $camp->post_title,
							'post_slug' => $camp->post_name,
							'info' => $info,
							'thumbnail' => ['url' => $image_miniatyura['url'], 'alt' => $image_miniatyura['title']],
							'location' => get_field('location', $id)
						];
					}
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
		}

		$reviews_array = get_field('reviews', $id_page);
		$reviews = [];
		if ($reviews_array) {
			foreach ($reviews_array as $item) {
				$review = $item['format_otzyva'] ? ['id_video' => $item['id_video'], 'url_img' => $item['img_video']['url'], 'url_img_2' => ''] : ['id_video' => '', 'url_img' => $item['img_review']['url'], 'url_img_2' => $item['img_review_2']['url']];
				$reviews[] = $review;
			}
		}

		$merch = [
			'title' => get_field('title_merch', $id_page),
			'description' => get_field('description_merch', $id_page),
			'image' => ['url' => get_field('image_merch', $id_page)['url'], 'alt' => get_field('image_merch', $id_page)['title']],
		];

		$arrayDocs = [];
		$argsDocs = [
			'post_type' => 'docs'
		];

		$docs = query_posts($argsDocs);
		if ($docs) {
			foreach ($docs as $doc) {
				$id = $doc->ID;
				$arrayDocs[] = [
					'id' => $id,
					'slug' => $doc->post_name,
					'title' => $doc->post_title,
					'subtitle' => get_field('subtitle_docs', $id)
				];
			}
		}

		$filter = [];

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

		if ($camp_ages) {
			foreach ($camp_ages as $age) {
				$filter['age'][] = [
					'id' => $age->term_id,
					'name' => $age->name,
					'slug' => $age->slug,
				];
			}
		}
		if ($camp_section) {
			foreach ($camp_section as $section) {
				$filter['section'][] = [
					'id' => $section->term_id,
					'name' => $section->name,
					'slug' => $section->slug,
				];
			}
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
		if ($newArray) {
			foreach ($newArray as $value) {
				if (!in_array($value['name'], $test)) {
					$test[] = $value['name'];
					$period[] = $value;
				}
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
		$data['reviews'] = $reviews;
		$data['merch'] = $merch;
		$data['docs'] = $arrayDocs;
		$data['filter'] = $filter;

		$metadata = [
			'title' => get_field('title_meta', $id_page),
			'description' => get_field('description_meta', $id_page),
			'keywords' => get_field('keywords_meta', $id_page),
			'image' => get_field('img_meta', $id_page),
		];

		$data['metadata'] = $metadata;
	}

	return $data;
}

function art_page_contacts()
{

	$data = [];

	$my_page = get_page_by_path('contacts', OBJECT, 'page');
	if ($my_page) {
		$id_contacts = $my_page->ID;
		$phone = get_field('phone', $id_contacts);
		$e_mail = get_field('e-mail', $id_contacts);
		$working_hours = get_field('working-hours', $id_contacts);
		$post = get_post($id_contacts);
		$content = apply_filters('the_content', $post->post_content);
		$image_ofise = get_field('image-ofise', $id_contacts);
		$images = get_field('slajder', $id_contacts);
		$gallery_contacts = [];
		if ($images) {
			foreach ($images as $image) {
				$url = $image['url'];
				$title = $image['title'];
				$gallery_contacts[] = ['url' => $url, 'alt' => $title];
			}
		}

		$data['id_contacts'] = $id_contacts;
		$data['phone'] = $phone;
		$data['e_mail'] = $e_mail;
		$data['content'] = $content;
		$data['working_hours'] = $working_hours;
		$data['gallery_contacts'] = $gallery_contacts;
		$data['image_ofise'] = ['url' => $image_ofise['url'], 'alt' => $image_ofise['title']];

		$metadata = [
			'title' => get_field('title_meta', $id_contacts),
			'description' => get_field('description_meta', $id_contacts),
			'keywords' => get_field('keywords_meta', $id_contacts),
			'image' => get_field('img_meta', $id_contacts),
		];

		$data['metadata'] = $metadata;
	}

	return $data;
}

function art_page_home()
{

	$data = [];


	$id_front_page = get_option('page_on_front');

	if ($id_front_page) {
		$banner = get_field('banner', $id_front_page);
		$id_video = get_field('id_video', $id_front_page);

		$post = get_post($id_front_page);
		$content = apply_filters('the_content', $post->post_content);
		$get_sections = get_field('sections', $id_front_page);
		$sections = [];
		if ($get_sections) {
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
		}

		$data['banner'] = ['url' => $banner['url'], 'alt' => $banner['title']];
		$data['id_video'] = $id_video;
		$data['content'] = $content;
		$data['sections'] = $sections;

		$metadata = [
			'title' => get_field('title_meta', $id_front_page),
			'description' => get_field('description_meta', $id_front_page),
			'keywords' => get_field('keywords_meta', $id_front_page),
			'image' => get_field('img_meta', $id_front_page),
		];

		$data['metadata'] = $metadata;
	}

	$my_page = get_page_by_path('contacts', OBJECT, 'page');
	if ($my_page) {

		$id_contacts = $my_page->ID;

		$phone = get_field('phone', $id_contacts);
		$e_mail = get_field('e-mail', $id_contacts);

		$data['id_contacts'] = $id_contacts;
		$data['phone'] = $phone;
		$data['e_mail'] = $e_mail;
	}

	return $data;
}

function art_page_blogs()
{
	$data = [];

	$my_page = get_page_by_path('blogs', OBJECT, 'page');
	if ($my_page) {
		$data2 = [];
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
		if ($posts) {
			$i = 0;
			foreach ($posts as $post12) {
				$id = $post12->ID;
				$the_excerpt = get_the_excerpt($id);
				$get_the_post_thumbnail_url = get_the_post_thumbnail_url($id);
				// Added to api
				$data2[$i]['id'] = $id;
				$data2[$i]['title'] = $post12->post_title;
				$data2[$i]['the_excerpt'] = $the_excerpt;
				$data2[$i]['get_the_post_thumbnail_url'] = $get_the_post_thumbnail_url;
				$data2[$i]['slug'] = $post12->post_name;

				$i++;
			}
		}

		$data = [
			'content' => $content,
			'background_img' => ['url' => $background['url'], 'alt' => $background['title']],
			'background_video' => $background_video,
			'posts' => $data2
		];

		$metadata = [
			'title' => get_field('title_meta', $id_page),
			'description' => get_field('description_meta', $id_page),
			'keywords' => get_field('keywords_meta', $id_page),
			'image' => get_field('img_meta', $id_page),
		];

		$data['metadata'] = $metadata;
	}

	return $data;
}

function art_page_blogs_post($slug)
{
	$data = [];
	$args = [
		'post_type' => 'post',
		'name' 	=> $slug['slug'],
	];
	$post = get_posts($args);
	if ($post) {
		$id = $post[0]->ID;
		$get_the_post_thumbnail_url = get_the_post_thumbnail_url($id);
		$content = $post[0]->post_content;
		$content = apply_filters('the_content', $content);
		$content = str_replace(']]>', ']]&gt;', $content);
		// Added to api
		$data['id'] = $id;
		$data['title'] = $post[0]->post_title;
		$data['slug'] = $post[0]->post_name;
		$data['get_the_post_thumbnail_url'] = $get_the_post_thumbnail_url;
		$data['content'] = $content;

		$metadata = [
			'title' => get_field('title_meta', $id),
			'description' => get_field('description_meta', $id),
			'keywords' => get_field('keywords_meta', $id),
			'image' => get_field('img_meta', $id),
		];

		$data['metadata'] = $metadata;
	}
	return $data;
}

function art_page_psychologist()
{
	$data = [];

	$my_page = get_page_by_path('psychologist', OBJECT, 'page');
	if ($my_page) {
		$id_page = $my_page->ID;
		$post = get_post($id_page);
		$content = apply_filters('the_content', $post->post_content);
		$banner = get_field('izobrazhenie_psyh', $id_page);
		$id_video = get_field('id_video_psyh', $id_page);
		$title_first = get_field('title_psychologist', $id_page);
		$get_resolved = get_field('issues_resolved', $id_page);
		$vaprosy_1 = [];
		$price_1 = [];
		if ($get_resolved['vaprosy_1']) {
			foreach ($get_resolved['vaprosy_1'] as $item) {
				$vaprosy_1[] = $item['vopros'];
			}
		}
		if ($get_resolved['price_1']) {
			foreach ($get_resolved['price_1'] as $item) {
				$price_1[] = $item['price'];
			}
		}
		$for_kids = [];
		$for_kids = [
			'vaprosy_1' => $vaprosy_1,
			'price_1' => $price_1
		];
		$vaprosy_2 = [];
		$price_2 = [];
		if ($get_resolved['vaprosy_2']) {
			foreach ($get_resolved['vaprosy_2'] as $item) {
				$vaprosy_2[] = $item['vopros'];
			}
		}
		if ($get_resolved['price_2']) {
			foreach ($get_resolved['price_2'] as $item) {
				$price_2[] = $item['price'];
			}
		}
		$for_parents = [];
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
		$psihologi_art = [];
		if ($psihologi_art_lichnosti) {
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
		}
		$steps_form_title = get_field('steps-form-title', $id_page);
		$steps_form = get_field('steps-form', $id_page);
		$steps_form_items = [];
		if ($steps_form) {
			foreach ($steps_form as $item) {
				$steps_form_items[] = $item['title'];
			}
		}
		$img_steps_form = get_field('bg-form-psychologist', $id_page);
		$link_to_oferta = get_field('link_to_oferta', $id_page);
		if (is_string($link_to_oferta)) {
			$link_to_oferta2 = explode('contract', $link_to_oferta)[1];
			$link_to_oferta = str_replace('/', '', $link_to_oferta2);
		}

		$data['id_page'] = $id_page;
		$data['content'] = $content;

		$data['banner'] = ['url' => $banner['url'], 'alt' => $banner['title']];
		$data['id_video'] = $id_video;
		$data['title_first'] = $title_first;
		$data['issues_addressed'] = $issues_addressed;

		$data['title_psychologist_art_lichnost'] = $title_psychologist_art_lichnost;
		$data['psihologi_art_lichnosti'] = $psihologi_art;

		$data['steps_form_title'] = $steps_form_title;
		$data['steps_form_items'] = $steps_form_items;
		$data['img_steps_form'] = ['url' => $img_steps_form['url'], 'alt' => $img_steps_form['title']];
		$data['link_to_oferta'] = $link_to_oferta;

		$metadata = [
			'title' => get_field('title_meta', $id_page),
			'description' => get_field('description_meta', $id_page),
			'keywords' => get_field('keywords_meta', $id_page),
			'image' => get_field('img_meta', $id_page),
		];

		$data['metadata'] = $metadata;
	}

	return $data;
}
