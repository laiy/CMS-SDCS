<?php

/*
 * Template Name: Multi Sections
 * Description: Instead of only 1 section, use this template to build multi sections layout of your page. But please remember to wrap your content with [section] shortcode
 */

get_header();

if (have_posts()) :
	while(have_posts()) :
		the_post();
		?><article id="page-<?php the_ID(); ?>" <?php post_class('mutli-sections-content'); ?>><?php
		the_content();
		?></article><?php
	endwhile;
endif;

get_footer(); ?>