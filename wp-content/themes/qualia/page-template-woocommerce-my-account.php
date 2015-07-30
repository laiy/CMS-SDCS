<?php
/*
 * Template Name: [WooCommerce] My Account
 * Description: Do not use for other page.
 */

if ( ! class_exists( 'WooCommerce' ) ) return;

get_header(); global $qualia_content_separator, $qualia_content_top_spacing, $qualia_content_bottom_spacing; ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php global $current_user;

$myaccount_page_id = wc_get_page_id( 'myaccount' );

$myaccount_page_url = $myaccount_page_id ? get_permalink( $myaccount_page_id ) : null;
$edit_account_page_url = wc_get_endpoint_url( WC()->query->query_vars['edit-account'], '', $myaccount_page_url );
$edit_address_page_url = wc_get_endpoint_url( WC()->query->query_vars['edit-address'], '', $myaccount_page_url );
$logout_page_url = wc_get_endpoint_url( WC()->query->query_vars['customer-logout'], '', $myaccount_page_url ); ?>

<section id="content"<?php echo qualia_build_class(array("content", "section", "color-palette-1", "separator-{$qualia_content_separator}")); ?>>
	<div class="section-inner">
		<?php echo qualia_spacer(array('size' => $qualia_content_top_spacing)); ?>
		<div class="wrapper">

			<div class="my-account">

				<div class="vp-tabs vp-tabs-nav-position-left vp-mode-outline vp-clear">
					<ul class="vp-tabs-nav my-account-menus vp-clear">
						<li class="profile">
							<div class="gravatar">
								<?php echo get_avatar( $current_user->ID, '50' ); ?>
							</div>
							<h3><?php echo $current_user->display_name; ?></h3>
							<a href="<?php echo $logout_page_url; ?>"><?php _e( 'Logout', 'qualia_td' ); ?></a>
						</li>
						<li class="vp-tabs-nav-item"><a href="<?php echo $myaccount_page_url; ?>"><i class="fa fa-th-large fa-lg"></i><?php _e( 'Dashboard', 'qualia_td' ); ?></a></li>
						<li class="vp-tabs-nav-item"><a href="<?php echo $edit_account_page_url; ?>"><i class="fa fa-user fa-lg"></i><?php _e( 'Edit Account', 'qualia_td' ); ?></a></li>
						<li class="vp-tabs-nav-item"><a href="<?php echo $edit_address_page_url; ?>"><i class="fa fa-truck fa-lg"></i><?php _e( 'Edit Address', 'qualia_td' ); ?></a></li>
						<?php
						$other_pages = qualia_get_myaccount_pages();
						foreach ( $other_pages as $key => $other_page ) : ?>
							<li class="vp-tabs-nav-item"><a href="<?php echo get_permalink($other_page->ID); ?>"><i class="fa fa-chevron-circle-right fa-lg"></i><?php echo get_the_title( $other_page->ID );; ?></a></li>
						<?php endforeach; ?>
					</ul>
					<div class="vp-tabs-panels">
						<?php echo qualia_spacer( array( 'size' => '2rem') ); ?>

						<?php the_content(); ?>

						<?php echo qualia_spacer( array( 'size' => '2rem') ); ?>
					</div>
				</div>

			</div>
		</div>
		<?php echo qualia_spacer(array('size' => $qualia_content_bottom_spacing)); ?>
	</div>
</section>

<?php endwhile; endif; ?>

<?php get_footer(); ?>