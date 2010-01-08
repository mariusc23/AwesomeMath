<?php
include_once('contact_form.php');
if ( function_exists('register_sidebar') ) {
    $footer_widgets = array(
          'news' => 'Footer (News)'
        , 'contact-form' => 'Footer (Contact)'
    );
    foreach ($footer_widgets as $ww_id => $ww_name) {
        register_sidebar(array(
            'name' => $ww_name,
            'id' => $ww_id,
            'before_widget' => "<div id=\"{$ww_id}\" class=\"footer-widget\">",
            'after_widget' => '</div>',
            'before_title' => '<h2>',
            'after_title' => '</h2>',
        ));
    }
    register_sidebar(array(
        'name' => 'Sidebar',
        'id' => 'sidebar-dynamic',
        'before_widget' => "<div class=\"widget sidebar\">",
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => 'Header',
        'id' => 'header-dynamic',
        'before_widget' => "<div class=\"widget header\">",
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));
}
/** @ignore */
function awm_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
     <div class="comment-id" id="comment-<?php comment_ID(); ?>">
		<div class="comment-content" id="comment-content-<?php comment_ID(); ?>">
			<?php comment_text() ?>
			<?php if ($comment->comment_approved == '0') : ?>
				<em><?php _e('Your comment is awaiting moderation.') ?></em>
			<?php endif; ?>
            <div class="reply">
                <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
            </div>
		</div>
        <div class="comment-meta commentmetadata">
            <a class="comment-author" href="<?php comment_author_url(); ?>"><?php comment_author(); ?></a><br/>
            <?php printf( ('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?><br/>
            -- <?php edit_comment_link(__('Edit'),'  ','') ?>
        </div>
    </div>
	</li>
<?php
        }
