(function ($) {
	'use strict'

	const campHTML = $('#camp')

	campHTML.html(`<div class="menu-tab"></div>
	<div class="content-tab">
		
	</div>`)

	const menuTab = $('.menu-tab')
	const contentTab = $('.content-tab')

	fetch('http://art.loc/wp-json/art/v1/camp/page')
		.then(response => response.json())
		.then(cards => {
			console.log(cards)
			contentTabAdded(cards, cards[0].id)
			return (
				menuTab.html(cards.map(camp => {
					return (
						`<div data-id="${camp.id}" 
							class="item-tab">${camp.title}</div>`)
				}))
			)
		})

	$('#camp').on('click', '.item-tab', function () {
		const id = $(this).data('id')

		fetch('http://art.loc/wp-json/art/v1/camp/page')
			.then(response => response.json())
			.then(cards => contentTabAdded(cards, id))

	})

	// let arr = []

	const contentTabAdded = (cards, id) => {
		console.log(cards)
		const arr = cards.filter(t => id === t.id)[0]
		// const 
		return contentTab.html(arr.card_box.map(t => (`<div class="content-box">
				<h4>${t.description_box ? 'Система PROFI' : 'Система PROFSTART'}</h4>
				<ul class="list-cards"></ul>
				<p>${t.description_box}</p>
			</div>`))
		)
	}

})(jQuery);