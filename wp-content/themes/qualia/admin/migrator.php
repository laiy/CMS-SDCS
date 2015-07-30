<?php

add_action( 'after_setup_theme'       , 'qualia_check_version' );
add_action( 'qualia_version_changed'  , 'qualia_version_changed', 10, 2 );
add_action( 'admin_init'              , 'qualia_notice_action' );
add_action( 'admin_notices'           , 'qualia_update_notice' );
add_action( 'init'                    , 'qualia_migrate_action' );

function qualia_version_changed($lv, $cv)
{

	if( $lv <= 0 )
		return;

	// normalize versions
	$cv = intval( str_pad( str_replace( '.', '', $cv ), 3, '0' ) );
	$lv = intval( str_pad( str_replace( '.', '', $lv ), 3, '0' ) );

	// setup available migrations
	$migrations = array();
	$migratable = array();
	foreach (glob(QUALIA_ADMIN_DIR . 'migrations/*.php') as $mig)
	{
		$mig          = intval( basename( $mig, '.php' ) );
		$migrations[] = $mig;
	}
	if( $cv >= $lv )
		sort($migrations, SORT_NUMERIC);
	else
		rsort($migrations, SORT_NUMERIC);

	// collect ordered list of to do migrations
	foreach ($migrations as $mig)
	{
		if( ( $mig <= $cv and $mig > $lv ) or ( $mig >= $cv and $mig < $lv ) )
		{
			$migratable[] = $mig;
		}
	}

	// do the migrations
	foreach ($migratable as $mig)
	{
		include QUALIA_ADMIN_DIR . "migrations/{$mig}.php";
		$mig = "Qualia_Migration_$mig";
		$mig = new $mig;
		$mig->migrate();
	}
}

function qualia_migrate_action()
{
	if( is_admin() and current_user_can( 'manage_options' ) )
	{
		if( get_option( 'qualia_save_options' ) )
		{
			// re-save options
			global $qualia_opt;
			$qualia_opt->init_options();
			$qualia_opt->save_and_reinit();
			delete_option( 'qualia_save_options' );
		}
	}
}

function qualia_update_notice()
{
	if( get_option( 'qualia_vp_plugins_update_notice' ) and current_user_can( 'manage_options' ) )
	{
		$msg = sprintf( __('Please update <em>%s</em> by doing deactivation and deletion to those plugins and re-install them via <em>%s</em> page under <em>Plugins Menu</em>.', 'qualia_td' ), 'Vafpress Shortcodes, Vafpress Animation, Vafpress Portfolio', __( 'Required Plugins', 'qualia_td') );
		?>
		<div class="updated">
			<p>
				<strong><?php echo $msg; ?></strong>
			</p>
			<p>
				<strong><a href="<?php echo add_query_arg( array('qualia_vp_plugins_update_notice_hide' => '1') ); ?>"><?php _e( 'Got it, dismiss!', 'qualia_td' ); ?></a></strong>
			</p>
		</div>
		<?php
	}
}

function qualia_notice_action()
{
	if( isset($_GET['qualia_vp_plugins_update_notice_hide']) and $_GET['qualia_vp_plugins_update_notice_hide'] )
	{
		delete_option( 'qualia_vp_plugins_update_notice' );
	}
}


function qualia_check_version()
{
	if( is_admin() )
	{
		// retrieve last version
		$lv = get_option( 'qualia_version', 0 );

		// get current version
		$cv = qualia_get_theme_version();

		// version diff
		$dv = version_compare( $cv, $lv );

		if( $dv !== 0 )
		{
			do_action( 'qualia_version_changed', $lv, $cv );
			if( $dv > 0 )
				do_action( 'qualia_version_upgrade', $lv, $cv );
			if( $dv < 0 )
				do_action( 'qualia_version_downgrade', $lv, $cv );
		}

		// save current version
		update_option( 'qualia_version', $cv );

	}
}

function qualia_get_theme_version()
{
	if( function_exists( 'wp_get_theme' ) )
	{
		$theme = wp_get_theme();

		if( isset( $theme->template ) && !empty( $theme->template ) && $theme->parent() )
			$version = $theme->parent()->get('Version');
		else
			$version = $theme->get('Version');
	}
	else
	{
		$theme = (object) get_theme_data( get_stylesheet_directory() . '/style.css' );

		if(isset($theme->Template) and $theme->Template !== '')
		{
			$parent_theme = (object) get_theme_data( get_stylesheet_directory() . '/../' . $theme->Template . '/style.css' );
			$version      = $parent_theme->Version;
		}
		else
		{
			$version = $theme->Version;
		}
	}
	return $version;
}

/**
 * EOF
 */