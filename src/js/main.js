(function ($) {
	'use strict'

	const campHTML = $('#camp')

	campHTML.html(`<div class="menu-tab"></div>
	<div class="content-tab">
		
	</div>`)

	const menuTab = $('.menu-tab')
	const contentTab = $('.content-tab')
	const root = $('.root')

	fetch('http://art.loc/wp-json/art/v1/page/blogs')
		.then(response => response.json())
		.then(cards => {
			console.log(cards)
			// contentTabAdded(cards, cards[0].id)
			return root.html(`<div>Title: ${cards[0].id}</div>`)
		})

	// $('#camp').on('click', '.item-tab', function () {
	// 	const id = $(this).data('id')

	// 	fetch('http://art.loc/wp-json/art/v1/camp/page')
	// 		.then(response => response.json())
	// 		.then(cards => contentTabAdded(cards, id))

	// })

	// // let arr = []

	// const contentTabAdded = (cards, id) => {
	// 	console.log(cards)
	// 	const arr = cards.filter(t => id === t.id)[0]
	// 	// const 
	// 	return contentTab.html(arr.card_box.map(t => (`<div class="content-box">
	// 			<h4>${t.description_box ? 'Система PROFI' : 'Система PROFSTART'}</h4>
	// 			<ul class="list-cards"></ul>
	// 			<p>${t.description_box}</p>
	// 		</div>`))
	// 	)
	// }

})(jQuery);