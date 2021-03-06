;(function($) {
	"use strict";

	// ==========================================================
	// Init Values
	// ==========================================================
	qualia.swipers = [];

	// ==========================================================
	// Includes
	// ==========================================================
	
	/*
		By Osvaldas Valutis, www.osvaldas.info
		Available for use under the MIT License
	*/
	$.fn.doubleTapToGo = function( params )	{
		if( !( 'ontouchstart' in window ) &&
			!navigator.msMaxTouchPoints &&
			!navigator.userAgent.toLowerCase().match( /windows phone os 7/i ) ) return false;

		this.each( function()
		{
			var curItem = false;

			$( this ).on( 'click', function( e )
			{
				if( $('#nav-responsive-toggle').is(':visible') )
					return;

				var item = $( this );
				if( item[ 0 ] != curItem[ 0 ] )
				{
					e.preventDefault();
					curItem = item;
				}
			});

			$( document ).on( 'click touchstart MSPointerDown', function( e )
			{
				var resetItem = true,
					parents	  = $( e.target ).parents();

				for( var i = 0; i < parents.length; i++ )
					if( parents[ i ] == curItem[ 0 ] )
						resetItem = false;

				if( resetItem )
					curItem = false;
			});
		});
		return this;
	};

	// ==========================================================
	// Helper Functions
	// ==========================================================
	
	function isNumber(n) {
		return !isNaN(parseFloat(n)) && isFinite(n);
	}

	
	// ==========================================================
	// Ready
	// ==========================================================
	
	$(document).on('ready', function() {

		$('.menu li:has(ul)').doubleTapToGo();

		var initFlexSlider = function() {
			$('.js-flexslider').each(function() {
				var setup = $(this).data('setup');

				$(this).imagesLoaded(function() {
					$(this).flexslider(setup);
				});
			});
		};
		initFlexSlider();

		var fixIsotopeItemWidth = function() {
			$('.js-isotope-portfolio').children().each(function(i, el){
				$(el).outerWidth('');
				var size = getSize(el);
				$(el).outerWidth(Math.floor(size.width))
			});
			$('.js-isotope').children().each(function(i, el){
				$(el).outerWidth('');
				var size = getSize(el);
				$(el).outerWidth(Math.floor(size.width))
			});
			$('.js-isotope-portfolio.isotope').isotope('reLayout');
			$('.js-isotope.isotope').isotope('reLayout');
		};
		fixIsotopeItemWidth();

		$('.js-isotope').each(function() {

			var $this = $(this);

			$this.imagesLoaded(function() {
				$this.isotope({
					containerStyle : { overflow: 'visible', position: 'relative' },
				});
			});
		});;

		var initIsotopePortfolio = function() {
			$('.js-isotope-portfolio').each(function() {

				var $this = $(this),
				    $filters = $this.parent().prev('.js-isotope-filters').find('li > a');

				$this.imagesLoaded(function() {
					$this.isotope({
						containerStyle : { overflow: 'visible' },
					});

					$filters.on('click', function(e) {
						e.preventDefault();
						$this.isotope({ filter: $(this).data('filter') });
						$filters.parent('li').removeClass('active');
						$(this).parent('li').addClass('active');
					});
				});
			});
		};
		initIsotopePortfolio();

		var initMediaElement = function() {
			$('.video-wrapper.internal video, .audio-wrapper.internal audio').mediaelementplayer({
				videoHeight: '100%',
				videoWidth: '100%',
				audioHeight: '100%',
				audioWidth: '100%',
			});
		};
		initMediaElement();

		// Responsive Navigation
		$('.js-nav-responsive-toggle').on('click', function(e) {
			e.preventDefault();

			var $this = $(this),
			    $target = $($this.attr('href'));

			$this.toggleClass('active');
			$target.slideToggle();
		});

		// Header
		var calculateFloatingHeader = function() {
			var scroll_top = $(document).scrollTop(),
			    $doc = $('#doc'),
			    $header = $('#header'),
			    $header_spacer = $('#header-spacer'),
			    floating_offset = $header_spacer.offset().top + $header_spacer.outerHeight(),
			    html_margin_top = parseInt($('html').css('marginTop'), 10);

			if ($header.hasClass('header-floating')) {
				if (scroll_top > floating_offset - html_margin_top) {
					$header.addClass('floating').css('top', html_margin_top).css('width', $doc.width());
				}
				else {
					$header.removeClass('floating').css('top', '').css('width', '');
				}
			}

		};
		$(window).on('scroll', calculateFloatingHeader);
		$(window).on('resize', calculateFloatingHeader);
		$(window).on('resize', fixIsotopeItemWidth);
		calculateFloatingHeader();

		// Portfolio Archive Load More
		$('.js-portfolio-archive-load-more').each(function(i, el) {

			var $el = $(el),
			    $load_more_button = $el.find('.js-load-more'),
			    $icon = $load_more_button.find('.fa-refresh'),
			    $loop = $el.find('.js-isotope-portfolio');

			$load_more_button.on('click', function(e) {
				e.preventDefault();

				var posts_per_page = $el.data('perpage'),
				    mode = $el.data('mode'),
				    columns = $el.data('columns'),
				    paged = $el.data('paged'),
				    logic = $el.data('logic'),
				    ajaxurl = $(this).attr('href'),
				    $new_archive = $('<div/>');

				$icon.addClass('fa-spin');

				$new_archive.load(ajaxurl + ' .portfolio-archive[data-logic="' + logic + '"]:first', undefined, function() {

					$new_archive = $new_archive.children('.portfolio-archive');
					var $new_items = $new_archive.find('.js-isotope-portfolio > article');

					$new_items.css('visibility', 'hidden');
					$new_items.css('height', 0);
					$loop.append($new_items);
					fixIsotopeItemWidth();
					$new_items.imagesLoaded(function() {
						$new_items.css('visibility', '');
						$new_items.css('height', '');
						$loop.isotope('appended', $new_items);
						$icon.removeClass('fa-spin');
						if (!$new_archive.data('next')) {
							$load_more_button.stop().fadeOut(1000);
						}
					});

					$el.data('paged', $new_archive.data('paged'));
					$el.data('next', $new_archive.data('next'));
					if ($new_archive.data('next')) {
						$load_more_button.attr('href', $new_archive.data('next'));
					}
				});
			});
		});

		// Blog Archive Load More
		$('.js-blog-archive-load-more').each(function(i, el) {

			var $el = $(el),
			    $load_more_button = $el.find('.js-load-more'),
			    $end_pagination = $el.find('.end.pagination'),
			    $icon = $load_more_button.find('.fa-refresh'),
			    $loop = $el.find('.blog-loop');

			$load_more_button.on('click', function(e) {
				e.preventDefault();

				var posts_per_page = $el.data('perpage'),
				    archive_mode = $el.data('archivemode'),
				    paged = $el.data('paged'),
				    logic = $el.data('logic'),
				    ajaxurl = $(this).attr('href'),
				    $new_archive = $('<div/>');

				$icon.addClass('fa-spin');

				$new_archive.load(ajaxurl + ' .blog-archive[data-logic="' + logic + '"]:first', undefined, function() {

					$new_archive = $new_archive.children('.blog-archive');
					var $new_items = $new_archive.find('.blog-loop > article');

					if (archive_mode == 'masonry') {
						$new_items.css('visibility', 'hidden');
						$new_items.css('height', 0);
						$loop.append($new_items);
					}
					else {
						$new_items.css('display', 'none');
						$loop.append($new_items);
						$new_items.fadeIn(1000);
					}
					fixIsotopeItemWidth();
					initFlexSlider();
					initMediaElement();
					if (archive_mode == 'masonry') {
						$new_items.imagesLoaded(function() {
							$new_items.css('visibility', '');
							$new_items.css('height', '');
							$loop.isotope('appended', $new_items);
							$icon.removeClass('fa-spin');
							if (!$new_archive.data('next')) {
								$load_more_button.hide();
							}
						});
					}else {
						$icon.removeClass('fa-spin');
						if (!$new_archive.data('next')) {
							$load_more_button.hide();
							if (archive_mode == 'timeline') $end_pagination.show();
						}
					}
					$el.data('paged', $new_archive.data('paged'));
					$el.data('next', $new_archive.data('next'));

					if ($new_archive.data('next')) {
						$load_more_button.attr('href', $new_archive.data('next'));
					}
				});
			});
		});

		// swiper
		$('.swiper-container').each(function(){		
			var mySwiper = $(this).swiper({
				mode:'horizontal',
				loop: false,
				slidesPerView: 'auto',
				autoResize: false,
				grabCursor: true,
				wrapperClass: 'swiper-wrapper',
			});
			$(this).siblings('.swiper-left:first').on('click', function(e){
				e.preventDefault();
				mySwiper.swipePrev();
			});
			$(this).siblings('.swiper-right:first').on('click', function(e){
				e.preventDefault();
				mySwiper.swipeNext();
			});
			qualia.swipers.push(mySwiper);
		})

		// add to cart
		$('body').on('added_to_cart', function(e, fragments, cart_hash) {
			var $icon = $('.cart-icon');

			$icon.removeClass('added-animation').addClass('added-animation');
		});


	});

}(jQuery));