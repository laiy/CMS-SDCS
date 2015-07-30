<?php if (have_comments()) : ?>
<div class="comments-list">	
	<?php ob_start(); comments_number(
		__('No Comments', 'qualia_td'),
		__('1 Comment', 'qualia_td'),
		__('% Comments', 'qualia_td')
	); $html = ob_get_clean() . ' &nbsp; '; ?>
	<?php echo qualia_divider(array('mode' => 'bold'), $html); ?>

	<ul class="root">
		<?php wp_list_comments(array('callback' => 'qualia_render_comment_list_item')); ?>
	</ul>

	<?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
	<nav id="comment-nav-below" class="navigation" role="navigation">
		<h1 class="assistive-text section-heading"><?php _e('Comment navigation', 'qualia_td'); ?></h1>
		<div class="nav-previous"><?php previous_comments_link(__('&larr; Older Comments', 'qualia_td')); ?></div>
		<div class="nav-next"><?php next_comments_link(__('Newer Comments &rarr;', 'qualia_td')); ?></div>
	</nav>
	<?php endif; ?>

</div>
<?php endif; ?>

<?php if (comments_open()) : ?>
<div id="comments-respond" class="comments-respond">
	<?php

	$commenter = wp_get_current_commenter();
	$req = get_option('require_name_email');
	$aria_req = ($req ? " aria-required='true'" : '');

	$fields['author'] = '
		<p class="respond-author-field">
			<label for="respond-author">' . __('Name', 'qualia_td') . ($req ? ' <span class="required">*</span>' : '') . '</label>
			<input id="respond-author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30"' . $aria_req . ' autocomplete="off" />
		</p>
	';

	$fields['email'] = '
		<p class="respond-author-field">
			<label for="respond-email">' . __('Email', 'qualia_td') . ($req ? ' <span class="required">*</span>' : '') . '</label>
			<input id="respond-email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) . '" size="30"' . $aria_req . ' autocomplete="off" />
		</p>
	';

	$fields['url'] = '
		<p class="respond-author-field last">
			<label for="respond-url">' . __('Website', 'qualia_td') . '</label>
			<input id="respond-url" name="url" type="text" value="' . esc_attr($commenter['comment_author_url']) . '" size="30" autocomplete="off" />
		</p>
	';

	$comment = '
		<p class="respond-comment">
			<label for="respond-comment">' . _x('Comment', 'noun', 'qualia_td') . '</label>
			<textarea id="respond-comment" name="comment" cols="45" rows="8" aria-required="true" autocomplete="off"></textarea>
		</p>
	';

	$must_log_in = '
		<p class="respond-must-log-in">' . sprintf(__('You must be <a href="%s">logged in</a> to post a comment.'), wp_login_url(apply_filters('the_permalink', get_permalink()))) . '</p>
	';

	$logged_in_as = '
		<p class="respond-logged-in-as">' . sprintf(__('Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>'), admin_url('profile.php'), $user_identity, wp_logout_url(apply_filters('the_permalink', get_permalink()))) . '</p>
	';

	$comment_notes_before = '';
	$comment_notes_after = '';

	comment_form(array(
		'fields'               => $fields,
		'comment_field'        => $comment,
		'must_log_in'          => $must_log_in,
		'logged_in_as'         => $logged_in_as,
		'comment_notes_before' => $comment_notes_before,
		'comment_notes_after'  => $comment_notes_after,
		'id_form'              => 'comment-form',
		'id_submit'            => 'respond-submit',
		'title_reply'          => __('Leave a Reply', 'qualia_td'),
		'title_reply_to'       => __('Leave a Reply to %s', 'qualia_td'),
		'cancel_reply_link'    => '<i class="fa fa-times"></i> ' . __('Cancel Reply', 'qualia_td'),
		'label_submit'         => __('Post Comment', 'qualia_td'),
	)); ?>
</div>

<?php endif; ?>