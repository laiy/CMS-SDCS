<div class="vp-field" style="text-align: right;">
	<div class="field">
		<div class="input">
			<button class="qualia-js-binding-button vp-button button button-primary" value="<?php echo $item->value; ?>" name="<?php echo $name; ?>"><i class="fa fa-refresh"></i>&nbsp;&nbsp;<?php _e('Load Preview', 'qualia_td') ?></button>
		</div>
		<div class="vp-js-bind-loader vp-field-loader vp-hide"><img src="<?php VP_Util_Res::img_out('ajax-loader.gif', ''); ?>"></div>
	</div>
</div>