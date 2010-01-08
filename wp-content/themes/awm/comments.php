<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
	<?php
		return;
	}
?>

<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?>
	<div class="comments-header box-container-1">
        <div class="comments-header-l"></div>
        <div class="comments-header-m">
            <span class="comments-count">
                <?php comments_number('no comments', '1 comment', '% comments' );?>
            </span>
            <span class="separator">|</span>
            <span class="comments-reply">
            <a href="#respond">reply</a>
            </span>
        </div>
        <div class="comments-header-r"></div>
	</div>


	<ol class="commentlist" id="comments">
	<?php wp_list_comments('type=comment&callback=ccys_comment'); ?>
	</ol>

	<div class="navigation comments-navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>
 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">Comments are closed.</p>

	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>

<div id="respond">

<h3><label for="comment"><?php comment_form_title( 'Leave a Comment', 'Leave a Reply to %s' ); ?></label></h3>
<div class="cancel-comment-reply">
	<small><?php cancel_comment_reply_link(); ?></small>
</div>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
<div class="comment-login-details">
<?php if ( $user_ID ) : ?>

<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>.<br/> <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>

<?php else : ?>
<div class="comment-authorinfo">
    <input type="text" name="author" id="author" value="<?php 
        if (!empty($comment_author)) echo $comment_author;
        else {
            echo "Name";
            if ($req) echo " (required)"; 
        }
        ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />

    <input type="text" name="email" id="email" value="<?php
        if (!empty($comment_author_email)) echo $comment_author_email;
        else {
            echo "Email";
            if ($req) echo " (required)";
        }
        ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />

    <input type="text" name="url" id="url" value="<?php
        if (!empty($comment_author_url)) echo $comment_author_url;
        else {
            echo "Website";
            if ($req) echo " (required)";
        }
        ?>" size="22" tabindex="3" />
</div>

<?php endif; ?>

<input name="submit" type="submit" id="csubmit" tabindex="5" value="Add comment" />
</div>
<textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea>
<?php comment_id_fields(); ?>

<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>
</div>

<?php endif; // if you delete this the sky will fall on your head ?>
