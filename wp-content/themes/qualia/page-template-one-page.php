<?php

/*
 * Template Name: One Page
 * Description: Create the famous One Page site with multiple sections and jump-to-section navigation
 */

get_header();

if (have_posts()) :
	while(have_posts()) :
		the_post();
		?><article id="page-<?php the_ID(); ?>" <?php post_class('one-page-content'); ?>><?php
		the_content();
		?></article><?php
	endwhile;
endif; ?>

<script type="text/javascript">
;(function($) {
	"use strict";

	$(document).on('ready', function() {

		$('body.one-page-preloader').jpreLoader({
			loaderVPos: '50%'
		}, function() {
			$(window).resize();
		});

		var $header = $('#header'),
		    $header_spacer = $('#header-spacer'),
		    $menus = $('a[href^="#"]').parent('li'),
		    $sections = $('.section'),
			html_margin_top = parseInt($('html').css('marginTop'), 10),
			header_height = $header.hasClass('header-floating') ? <?php echo qualia_option('one_page_header_floating_height') ?> : 0,
			min_scroll_top = $header_spacer.offset().top + $header_spacer.outerHeight(); // minimum value for auto select first section

		// anchor click
		$('a[href^="#"]').on('click', function(e) {
			e.preventDefault();

			var $this = $(this),
			    $target = $($this.attr('href')),
			    jumpTo;

			// nav toggle is exceptional and close if the target is not found
			if ($target.length < 1 || $this.attr('id') === 'nav-responsive-toggle') return;

			// animate
			if ($target.offset().top <= min_scroll_top) {
				jumpTo = $target.offset().top;
			} else {
				jumpTo = $target.offset().top - header_height - html_margin_top;
			}
			$('html, body').stop().animate({ scrollTop: jumpTo }, 1000);
		});

		// scroll spy
		$(window).on('scroll', function() {
			var $current, $pasts, scroll_top = min_scroll_top;

			if ($(this).scrollTop() > scroll_top) {
				scroll_top = $(this).scrollTop() + $header.outerHeight() + html_margin_top; // actual scrollTop for the rest sections
			}

			// get current section
			$pasts = $sections.map(function() {
				if ($(this).offset().top <= scroll_top) return $(this);
			});
			$current = $pasts[$pasts.length - 1]

			// no current section? leave! 
			if (!$current) return;
				
			// reset class
			$menus.removeClass('menu-current-item');

			// get the matched menu
			var id = $current.attr('id'), $menu;
			if (!id) return;
			$menu = $('a[href="#'+id+'"]').parent('li');
			$menu.addClass('menu-current-item');
		});
		$(window).scroll();

		$(window).on('resize', function() {
			$(window).scroll();
		});
	});

}(jQuery));
</script>

<?php get_footer(); ?>