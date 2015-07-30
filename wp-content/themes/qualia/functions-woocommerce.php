<?php

/**
 * Vafpress Portfolio Supports
 */

if ( class_exists( 'Woocommerce' ) ) {

	// Do not load WooCommerce default styles, instaed load our own
	add_filter( 'woocommerce_enqueue_styles', '__return_false' );

	add_action( 'wp_enqueue_scripts', 'qualia_woocommerce_dequeue_styles' );
	function qualia_woocommerce_dequeue_styles() {
		// wp_dequeue_style( 'woocommerce_chosen_styles' );
	}

	// Remove WooCommerce breadcrumb
	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );

	// Remove Page Title
	add_filter( 'woocommerce_show_page_title', '__return_false' );

	// Set Catalog / Archive Columns
	add_filter( 'loop_shop_columns', 'qualia_woocommerce_loop_columns' );
	function qualia_woocommerce_loop_columns() {
		return qualia_woocommerce_option('product_archive_columns');
	}

	// Remove Catalog Rating
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );

	// Swap Add to Cart Location
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

	// Set Catalog / Archive Posts per page
	add_filter( 'loop_shop_per_page', 'qualia_woocommerce_loop_shop_per_page', 20 );
	function qualia_woocommerce_loop_shop_per_page() {
		return qualia_woocommerce_option('product_archive_posts_per_page');
	}

	// Placeholder Thumbnail
	add_filter('woocommerce_placeholder_img_src', 'qualia_woocommerce_placeholder_img_src');
	function qualia_woocommerce_placeholder_img_src( $src ) {
		$thumbnail = qualia_woocommerce_option( 'thumbnail_image_placeholder' );
		if ( !empty( $thumbnail ) ) {
			$src = $thumbnail;
		} else {
			$src = QUALIA_IMAGES . 'woocommerce-image-placeholder.jpg';
		}
		return $src;
	}

	// Catalog Image Thumbnail
	remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
	add_action( 'woocommerce_before_shop_loop_item_title', 'qualia_woocommerce_template_loop_product_thumbnail', 10 );
	function qualia_woocommerce_template_loop_product_thumbnail() {
		global $post; $size = 'woocommerce-thumbnail-default';

		$image = '';
		if ( has_post_thumbnail() )
			$image = get_the_post_thumbnail( $post->ID, $size );
		elseif ( woocommerce_placeholder_img_src() )
			$image = woocommerce_placeholder_img( $size );

		if (!empty($image)) : ?>
		<div class="product-image">
			<a href="<?php the_permalink(); ?>">
				<?php echo $image; ?>
			</a>
			<div class="actions">
				<?php woocommerce_template_loop_add_to_cart(); ?>
			</div>
		</div>
		<?php endif;
	}

	// Category Image Thumbnail
	function woocommerce_subcategory_thumbnail( $category ) {
		global $woocommerce;

		$small_thumbnail_size  	= 'woocommerce-thumbnail-default';
		$dimensions    			= wc_get_image_size( $small_thumbnail_size );
		$thumbnail_id  			= get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true  );

		if ( empty( $thumbnail_id ) ) {
			global $wpdb;
			$query = "SELECT ID FROM {$wpdb->posts} WHERE guid = '" . woocommerce_placeholder_img_src() . "'";
			$thumbnail_id = $wpdb->get_var($query);
		}
		$image = wp_get_attachment_image_src( $thumbnail_id, $small_thumbnail_size );
		$image = $image[0];
		
		if ( $image ) : ?>
		<div class="product-image">
			<a href="<?php echo get_term_link( $category->slug, 'product_cat' ); ?>">
				<img src="<?php echo $image; ?>" alt="<?php echo $category->name; ?>" width="<?php echo $dimensions['width']; ?>" height="<?php echo $dimensions['height']; ?>" />
				<div class="actions">
					<div class="label">
						<h4><?php echo $category->name; ?></h4>
						<?php if ( $category->count > 0 ) : ?>
						<span><?php echo apply_filters( 'woocommerce_subcategory_count_html', $category->count, $category ); ?></span>
						<?php endif; ?>
					</div>
				</div>
			</a>
		</div>
		<?php endif;
	}

	// Category Count HTML
	add_filter( 'woocommerce_subcategory_count_html', 'qualia_woocommerce_subcategory_count_html', 10, 2 );
	function qualia_woocommerce_subcategory_count_html( $count, $category) {
		if ( $count === 1) {
			return $count . ' ' . __('item', 'qualia_td');
		} else {
			return $count . ' ' . __('items', 'qualia_td');
		}
	}

	// Catalog Sale Flash
	add_filter( 'woocommerce_sale_flash', 'qualia_woocommerce_sale_flash' );
	function qualia_woocommerce_sale_flash( $html ) { ?>
		<?php ob_start(); ?><span class="sale ribbon"><span><?php echo qualia_woocommerce_option('product_sale_label'); ?></span></span>
		<?php return ob_get_clean();
	}

	// Single Product Image Size
	add_filter( 'single_product_large_thumbnail_size', 'qualia_single_product_large_thumbnail_size');
	function qualia_single_product_large_thumbnail_size() {
		return 'woocommerce-single-primary';
	}
	add_filter( 'single_product_small_thumbnail_size', 'qualia_single_product_small_thumbnail_size');
	function qualia_single_product_small_thumbnail_size() {
		return 'woocommerce-single-thumbnail';
	}

	// Image Size
	function qualia_woocommerce_add_image_sizes() {
		add_image_size('woocommerce-thumbnail-default', 600, floor(qualia_woocommerce_option('thumbnail_image_height_ratio', 0.75) * 600), true);
		add_image_size('woocommerce-single-primary', 600, floor(qualia_woocommerce_option('thumbnail_image_height_ratio', 0.75) * 600), true);
		add_image_size('woocommerce-single-thumbnail', 200, floor(qualia_woocommerce_option('thumbnail_image_height_ratio', 0.75) * 200), true);

		add_filter( 'woocommerce_get_image_size_woocommerce-thumbnail-default', 'qualia_woocommerce_get_image_size_thumbnail_default' );
		add_filter( 'woocommerce_get_image_size_woocommerce-single-primary', 'qualia_woocommerce_get_image_size_single_primary' );
		add_filter( 'woocommerce_get_image_size_woocommerce-single-thumbnail', 'qualia_woocommerce_get_image_size_single_thumbnail' );
		function qualia_woocommerce_get_image_size_thumbnail_default() { return 'woocommerce-thumbnail-default'; }
		function qualia_woocommerce_get_image_size_single_primary() { return 'woocommerce-single-primary'; }
		function qualia_woocommerce_get_image_size_single_thumbnail() { return 'woocommerce-single-thumbnail'; }

		function qualia_woocommerce_get_image_size( $size_name ) {
			return get_option( $size_name . '_image_size', array() );
		}
	}
	add_action('init', 'qualia_woocommerce_add_image_sizes');

	// Move Single Product Tabs
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
	add_action( 'woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 35 );

	// Move Single Product Rating
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
	add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 15 );

	// Call for Price
	add_action( 'woocommerce_product_options_pricing', 'qualia_wwoocommerce_product_options_pricing_call_for_price' );
	function qualia_wwoocommerce_product_options_pricing_call_for_price() {
		woocommerce_wp_checkbox( array( 'id' => '_call_for_price', 'wrapper_class' => '', 'label' => __('Enable Call for Price?', 'woocommerce' ), 'description' => __( 'Customize this option at WooCommerce Settings (Qualia) Page', 'qualia_td' ) ) );
	}

	add_action( 'woocommerce_process_product_meta', 'qualia_woocommerce_process_pricing_call_for_price' );
	function qualia_woocommerce_process_pricing_call_for_price( $post_id ) {
		$call_for_price = ( $_POST['_call_for_price'] ) ? 'yes' : 'no';
		update_post_meta( $post_id, '_call_for_price', esc_attr( $call_for_price ) );
	}

	// Cross Sell
	add_filter( 'woocommerce_cross_sells_total', 'qualia_woocommerce_cross_sells_total' );
	function qualia_woocommerce_cross_sells_total() {
		return qualia_woocommerce_option('cross_sells_posts_per_page');
	}
	add_filter( 'woocommerce_cross_sells_columns', 'qualia_woocommerce_cross_sells_columns' );
	function qualia_woocommerce_cross_sells_columns() {
		return qualia_woocommerce_option('cross_sells_columns');
	}

	// Widget Cart
	add_filter('add_to_cart_fragments', 'qualia_woocommerce_header_add_to_cart_fragment');
	function qualia_woocommerce_header_add_to_cart_fragment( $fragments ) {
		global $woocommerce;
		
		ob_start(); ?>
		<span class="cart-icon"><b></b><?php echo $woocommerce->cart->cart_contents_count; ?></span>
		<?php $fragments['.cart-icon'] = ob_get_clean();
		
		ob_start(); ?>
		<span class="update-total">(<?php echo $woocommerce->cart->get_cart_total(); ?>)</span>
		<?php $fragments['.update-total'] = ob_get_clean();
		
		return $fragments;
	}

	// Overriding Widget Cart
	add_action( 'widgets_init', 'qualia_override_woocommerce_widgets', 15 );
	function qualia_override_woocommerce_widgets() { 

		if ( class_exists( 'WC_Widget_Cart' ) ) {
			unregister_widget( 'WC_Widget_Cart' );
			require_once QUALIA_WIDGETS_DIR . 'woocommerce/widget-woocommerce-cart.php';
			register_widget( 'Qualia_WC_Widget_Cart' );
		}
	}

	function qualia_get_myaccount_pages() {
		$myaccount_page_id = wc_get_page_id( 'myaccount' );
		$children = get_page_children( $myaccount_page_id, get_pages() );
		$templates = get_pages( array(
			'meta_key' => '_wp_page_template',
			'meta_value' => 'page-template-woocommerce-my-account.php'
		) );

		return array_merge(
			$children,
			$templates
		);
	}

	// My Account Page Template Redirect
	function qualia_woocommerce_my_account_template_redirect() {
		if ( ! is_page() ) return;

		// myaccount page
		$myaccount_page_id = intval( wc_get_page_id( 'myaccount' ) );

		// page template
		$related = qualia_get_myaccount_pages();
		$related_ids = array();
		foreach ( $related as $obj ) {
			$related_ids[] = $obj->ID;
		}

		// merge all
		$account_pages = array_merge(
			array($myaccount_page_id),
			$related_ids
		);

		// meet criteria
		if ( in_array( get_the_ID(), $account_pages ) ) {

			if ( ! is_user_logged_in() && get_the_ID() !== $myaccount_page_id ) {
				wp_redirect( get_permalink( $myaccount_page_id ) );
			}
			elseif ( is_user_logged_in() ) {
				// print template
				include( get_template_directory() . '/page-template-woocommerce-my-account.php' );
				exit();
			}
		}
	}
	add_action( 'template_redirect', 'qualia_woocommerce_my_account_template_redirect' );

	// fix all those demanding script asking for post
	function qualia_woocommerce_template_fake_post_object($query) {
	  	if( is_shop() || is_product_category() || is_product_tag() ) {
			// missing post object workaround
			global $post;
			if( is_null($post) ) {
				$post = new StdClass;
				$post->ID = -1;
				$post->post_type = 'product';
			}
		}
	}
	add_action( 'wp', 'qualia_woocommerce_template_fake_post_object' );

}

/**
 * EOF
 */