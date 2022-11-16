'use strict'

document.addEventListener('DOMContentLoaded', function() {
	const form = document.getElementById('ajaxform');
	form.addEventListener('submit', formSend)

	async function formSend(e) {
		e.preventDefault()

		// let error = formValidate(form)

		let formData = new FormData(form)
		form.classList.add('_sending')
		let response = await fetch('sendmail.php', {
			method: 'POST',
			body: formData
		})

		if(response.ok) {
			let result = await response.json()
			alert(result.message)
			// formPreview.innerHTML = ''
			form.reset()
			form.classList.remove('_sending')
		} else {
			alert(response)
			form.classList.remove('_sending')
		}

	}

})


(function () {




	
	const len = $('.steps__block').children().length*500

	
var sum = null
var rew = null
var stap = null
var deltaY = null
	$('.steps').on('wheel', function(e){
		deltaY = +e.originalEvent.deltaY
		sum += +e.originalEvent.deltaY

		if(sum >= 0) {
			rew = sum/Math.abs(deltaY)
		}

		stap += deltaY/6
	
		console.log(stap)
		console.log(rew)
		console.log(deltaY)

		$('.steps__box').css('transform', `matrix(1, 0, 0, 1, ${-stap}, 0)`)

		if(stap > 1000) {
			$('.steps').css('position', 'relative')
		} else {
			$('.steps').css('position', 'sticky')
		}

	});

	jQuery.ajax( {
		url        : REST_API_data.root + 'contact-form-7/v1/contact-forms',
		method     : 'POST',
		beforeSend : function ( xhr ) {
			xhr.setRequestHeader( 'X-WP-Nonce', REST_API_data.nonce );
		},
		data       : {
			'title' : 'Новый заголовок'
		}
	} )
	.done( function ( response ) {
		console.log( response );
	} );



	// console.log(rew)
})();




// (function ($) {
// 	'use strict'

// 	// const rew = $('.rew')

// 	// console.log(rew)

// 	// $('.rew').scroll(function () {
// 	// 	console.log(22)
// 	// 	$(this).addClass('wer')
// 	// })


// 	// function scrollHorizontally(e) {

// 	// 	var scrollPos = this.scrollLeft;  // Сколько прокручено по горизонтали, до прокрутки (не перемещать эту строку!)
		
// 	// 	// Горизонтальная прокрутка
// 	// 	e = window.event || e;
// 	// 	var delta = Math.max(-1, Math.min(1, (e.wheelDelta || -e.detail)));
// 	// 	this.scrollLeft -= (delta * 10); // Multiplied by 10

// 	// 	var widthElem = this.scrollWidth; // Ширина всего элемента
// 	// 	var widthBrowser = document.documentElement.clientWidth;  // Ширина окна минус размер вертикального скролла


// 	// 	// Прокрутка вверх, но элемент уже в крайней левой позиции, то двигаемся вверх
// 	// 	if ((delta == 1) && (this.scrollLeft == 0)) return;
// 	// 	// Прокрутка вниз, но элемент виден полностью. Или элемент до конца прокручен в правый край
// 	// 	if ((widthBrowser >= widthElem) || (scrollPos == this.scrollLeft)) return;
// 	// 	console.log(delta)
// 	// 	e.preventDefault(); // запрещает прокрутку по вертикали

// 	// }

// 	// var elems = document.querySelectorAll('.rew');
// 	// for (var a = 0; a < elems.length; a++) {
// 	// 	elems[a].addEventListener("mousewheel", scrollHorizontally, false);     // IE9, Chrome, Safari, Opera
// 	// 	elems[a].addEventListener("DOMMouseScroll", scrollHorizontally, false); // Firefox
// 	// }






















// 	// const campHTML = $('#camp')

// 	// campHTML.html(`<div class="menu-tab"></div>
// 	// <div class="content-tab">

// 	// </div>`)

// 	// const menuTab = $('.menu-tab')
// 	// const contentTab = $('.content-tab')
// 	// const root = $('.root')

// 	// fetch('http://art.loc/wp-json/art/v1/page/blogs')
// 	// 	.then(response => response.json())
// 	// 	.then(cards => {
// 	// 		console.log(cards)
// 	// 		// contentTabAdded(cards, cards[0].id)
// 	// 		return root.html(`<div>Title: ${cards[0].id}</div>`)
// 	// 	})

// 	// // $('#camp').on('click', '.item-tab', function () {
// 	// // 	const id = $(this).data('id')

// 	// // 	fetch('http://art.loc/wp-json/art/v1/camp/page')
// 	// // 		.then(response => response.json())
// 	// // 		.then(cards => contentTabAdded(cards, id))

// 	// // })

// 	// // // let arr = []

// 	// // const contentTabAdded = (cards, id) => {
// 	// // 	console.log(cards)
// 	// // 	const arr = cards.filter(t => id === t.id)[0]
// 	// // 	// const 
// 	// // 	return contentTab.html(arr.card_box.map(t => (`<div class="content-box">
// 	// // 			<h4>${t.description_box ? 'Система PROFI' : 'Система PROFSTART'}</h4>
// 	// // 			<ul class="list-cards"></ul>
// 	// // 			<p>${t.description_box}</p>
// 	// // 		</div>`))
// 	// // 	)
// 	// // }

// })(jQuery);