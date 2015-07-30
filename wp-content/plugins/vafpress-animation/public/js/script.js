;(function($) {
	"use strict";

	// ==========================================================
	// Ready
	// ==========================================================
	
	$(document).on('ready', function() {

		// Animation
		$('.js-animation').each(function(i, el) {

			var $el = $(el),
			    trigger = $el.data('trigger');

			switch (trigger) {

				case 'loaded':
					$el.imagesLoaded(function() {
						$el.addClass('animation-running');
					});
				break;

				case 'inview':
					$el.imagesLoaded(function() {
						$el.one('inview', function() {
							$el.addClass('animation-running');
						});
					});
				break;

				case 'toggle-hover':
					$el.imagesLoaded(function() {
						$el.on('hover',function() {
							$el.addClass('animation-running');
						}, function() {
							$el.removeClass('animation-running');
						});
					});
				break;

				case 'hovered':
					$el.imagesLoaded(function() {
						$el.on('hover', function() {
							$el.addClass('animation-running');
						});
					});
				break;

				case 'toggle-click':
					$el.imagesLoaded(function() {
						$el.on('click',function(e) {
							$el.toggleClass('animation-running');
							e.preventDefault();
						});
					});
				break;

				case 'clicked':
					$el.imagesLoaded(function() {
						$el.on('click', function(e) {
							$el.addClass('animation-running');
							e.preventDefault();
						});
					});
				break;
			}
		});
	});

}(jQuery));