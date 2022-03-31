/**
 * jQuery.miniNoty - ÃÂ¡Ã‘Æ’ÃÂ¿ÃÂµÃ‘â‚¬ ÃÂ¿Ã‘â‚¬ÃÂ¾Ã‘ÂÃ‘â€šÃÂ¾ÃÂ¹/ÃÂ¼ÃÂ°ÃÂ»ÃÂµÃÂ½Ã‘Å’ÃÂºÃÂ¸ÃÂ¹ ÃÂ² ÃÂ¸Ã‘ÂÃÂ¿ÃÂ¾ÃÂ»Ã‘Å’ÃÂ·ÃÂ¾ÃÂ²ÃÂ°ÃÂ½ÃÂ¸ÃÂ¸ Ã‘Æ’ÃÂ²ÃÂµÃÂ´ÃÂ¾ÃÂ¼ÃÂ¸Ã‘â€šÃÂµÃÂ»Ã‘Å’
 * ÃÂ¡ÃÂ°ÃÂ¹Ã‘â€š ÃÂ¿ÃÂ»ÃÂ°ÃÂ³ÃÂ¸ÃÂ½ÃÂ° - https://github.com/StepanMas/jQuery.miniNoty
 */

 ;(function($){

	$.miniNoty = function(message, type){

		// settings
		var timeToHide = 3000,  // ÃÂ²Ã‘â‚¬ÃÂµÃÂ¼Ã‘Â ÃÂ´ÃÂ¾ Ã‘ÂÃÂºÃ‘â‚¬Ã‘â€¹Ã‘â€šÃÂ¸Ã‘Â
			timeAnimEnd = 500, // ÃÂ²Ã‘â‚¬ÃÂµÃÂ¼Ã‘Â ÃÂ°ÃÂ½ÃÂ¸ÃÂ¼ÃÂ°Ã‘â€ ÃÂ¸ÃÂ¹ ÃÂ² SCSS
			padding = 10 // css padding-bottom ÃÂ·ÃÂ°ÃÂ´ÃÂ°ÃÂ½ÃÂ½Ã‘â€¹ÃÂ¹ .miniNoty ÃÂ² SCSS

		var cls = 'miniNoty miniNoty-' + (type ? type : 'success'),
			node = $('<div/>', {
				'class': cls,
				html: message
			})

		// Ãâ€¢Ã‘ÂÃÂ»ÃÂ¸ Ã‘Æ’ÃÂ¶ÃÂµ ÃÂµÃ‘ÂÃ‘â€šÃ‘Å’ Ã‘Æ’ÃÂ²ÃÂµÃÂ´ÃÂ¾ÃÂ¼ÃÂ»ÃÂµÃÂ½ÃÂ¸Ã‘Â
		if($('.miniNoty').length){

			var elLast = $('.miniNoty:last-child'),
				elLastBottom = parseInt(elLast.css('bottom')),
				elLastHeight = elLast.outerHeight()

			node.css('bottom', elLastBottom + elLastHeight + padding + 'px')
		}

		$('body').append(node)

		// delete on click
		node.click(function(){
			node.removeClass('miniNoty-show')
			setTimeout(function () {

				node.remove()

			}, timeAnimEnd)
		})

		// push stack
		setTimeout(function(){
			node.addClass('miniNoty-show')
		}, 10)

		// timeout to hide
		setTimeout(function(){

			node.removeClass('miniNoty-show')
			setTimeout(function () {

				node.remove()

			}, timeAnimEnd)

		}, timeToHide)
	}

})(jQuery);