<?php

class Qualia_Migration_200
{

	public function migrate()
	{
		update_option( 'qualia_save_options'            , '1' );
		update_option( 'qualia_vp_plugins_update_notice', '1' );
	}

}

/**
 * EOF
 */