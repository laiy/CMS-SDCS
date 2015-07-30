<?php

class Qualia_Widget_Related_Posts extends WP_Widget {

	function __construct() {
		parent::__construct(
			'qualia_related_posts',
			__('Qualia Related Posts', 'qualia_td'),
			array('description' => __('Related Posts Widget, Powered by YARPP', 'qualia_td'))
		);

		add_action('save_post', array($this, 'flush_widget_cache'));
		add_action('deleted_post', array($this, 'flush_widget_cache'));
		add_action('switch_theme', array($this, 'flush_widget_cache'));
	}

	public function widget($args, $instance) {
		$cache = wp_cache_get('widget_qualia_related_posts', 'widget');

		if (!is_array($cache))
			$cache = array();

		if (!isset($args['widget_id']))
			$args['widget_id'] = $this->id;

		if (isset($cache[$args['widget_id']])) {
			echo $cache[$args['widget_id']];
			return;
		}

		$title = apply_filters('widget_title', $instance['title']);
		if (empty($instance['number']) || !$number = absint($instance['number'])) $number = 5;
		$show_date = isset($instance['show_date']) ? $instance['show_date'] : false;

		if (strpos($args['before_widget'], 'class') === false) {
			$args['before_widget'] = str_replace('>', (($show_date) ? ' class="show-date"' : '>'), $args['before_widget']);
		}
		else {
			$args['before_widget'] = str_replace(' class="', (($show_date) ? ' class="show-date ' : ' class="'), $args['before_widget']);
		}

		// YARPP
		if (class_exists('YARPP')) {

			echo $args['before_widget'];
			if (!empty($title)) echo $args['before_title'] . $title . $args['after_title'];
			yarpp_related(
				array(
					'post_type' => array('post'),
					'past_only' => false,
					'exclude' => array(),
					'recent' => '12 month',
					
					'template' => 'loop-widget-post-list.php',
					'limit' => $number,
					'order' => 'score DESC'
				), '', true
			);
			$args['after_widget'];
		}

		// 
		else {
			global $wp_query; $temp = $wp_query;
			$cat_ids = VP_Util_Array::deep_values(get_the_category(), 'cat_ID');
			$wp_query = new WP_Query(array(
				'post_type'           => 'post',
				'posts_per_page'      => $number,
				'ignore_sticky_posts' => 1,
				'category__in'        => $cat_ids,
			));

			ob_start();
			
			echo $args['before_widget'];
			if (!empty($title)) echo $args['before_title'] . $title . $args['after_title'];
			include(locate_template('loop-widget-post-list.php'));
			echo $args['after_widget'];

			$wp_query = $temp; wp_reset_postdata();

			$cache[$args['widget_id']] = ob_get_flush();
		}
		
		wp_cache_set('widget_qualia_related_posts', $cache, 'widget');
	}

	public function form($instance) {
		$title     = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$number    = isset($instance['number']) ? absint($instance['number']) : 5;
		$show_date = isset($instance['show_date']) ? (bool) $instance['show_date'] : false;
		
		?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'qualia_td'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to show:', 'qualia_td'); ?></label>
		<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>

		<p><input class="checkbox" type="checkbox" <?php checked($show_date); ?> id="<?php echo $this->get_field_id('show_date'); ?>" name="<?php echo $this->get_field_name('show_date'); ?>" />
		<label for="<?php echo $this->get_field_id('show_date'); ?>"><?php _e('Display post date?', 'qualia_td'); ?></label></p>
		<?php
	}

	public function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = (int) $new_instance['number'];
		$instance['show_date'] = (bool) $new_instance['show_date'];
		$this->flush_widget_cache();

		return $instance;
	}

	function flush_widget_cache() {
		wp_cache_delete('widget_recent_posts', 'widget');
	}

}

// register
function register_widget_qualia_related_posts() {
    register_widget('Qualia_Widget_Related_Posts');
}
add_action('widgets_init', 'register_widget_qualia_related_posts');