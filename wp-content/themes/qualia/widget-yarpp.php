<?php

echo $args['before_widget'];
if (!empty($title)) echo $args['before_title'] . $title . $args['after_title'];
include(locate_template('loop-widget-post-list.php')); ?>
echo $args['after_widget'];