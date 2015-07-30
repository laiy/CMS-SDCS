<?php

function vp_an_render_animation($atts, $content = null) {
	extract(shortcode_atts(array(
		'trigger'        => 'loaded',
		'effect'         => 'fade-in',
		'timing'         => 'ease',
		'duration'       => '0s',
		'delay'          => '0s',
		'iteration'      => '1',
		'full_container' => 'false',
		'direction'      => 'normal',
		'fill_mode'      => 'none',
		'class'          => '',
	), $atts));

	if (is_numeric($duration)) $duration = $duration . 's';
	if (is_numeric($delay))    $delay    = $delay . 's';

	$style = array();
	$style[] = "animation-name: animation-$effect;";
	$style[] = "animation-timing-function: $timing;";
	$style[] = "animation-duration: $duration;";
	$style[] = "animation-delay: $delay;";
	$style[] = "animation-iteration-count: $iteration;";
	$style[] = "animation-direction: $direction;";
	$style[] = "animation-fill-mode: $fill_mode;";

	foreach ($style as &$s) {
		$s_prefix = array();
		foreach (array('-webkit-', '-moz-', '-o-', '') as $prefix) {
			$s_prefix[] = $prefix . $s;
		}
		$s = implode(' ', $s_prefix);
	}
	$style = implode(' ', $style);

	if($full_container === 'true')
		$style .= ' display: block;';

	ob_start();
	if( ! Mobile_Detect::is_mobile_or_tablet() ) : ?>
		<div class="animation js-animation <?php echo "animation-$effect"; echo (($class != '') ? " $class" : ""); ?>"
			data-trigger="<?php echo $trigger; ?>" style="<?php echo $style; ?>">
			<?php echo do_shortcode($content); ?>
		</div>
	<?php else: ?>
 		<div class="animation<?php echo (($class != '') ? " $class" : ""); ?>">
			<?php echo do_shortcode($content); ?>
		</div>
	<?php endif; ?>
 	<?php return ob_get_clean();
}
add_shortcode('animation', 'vp_an_render_animation');

/**
 * EOF
 */