<?php

class Qualia_Migration_310
{

	public function migrate()
	{
		update_option( 'qualia_save_options', '1' );
	}

}

/**
 * EOF
 */