<?php
get_header(); ?>

<?php get_sidebar(); ?>

	<div id="content" class="post-listing">
    <div id="content-inner">

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
		
		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<div class="post-header box-container-1">
				<h2 class="thetitle">
					<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
					<?php edit_post_link('(edit)',' <span class="edit-link">','</span>'); ?>
				</h2>
                <div class="submitted-info">
                    <span class="submitted-author">posted by
                    <a href="<?php bloginfo('url') ?>/wp-admin/profile.php"><?php echo the_author_link(); ?></a></span> -
                    <span class="submitted-date"><?php the_date('', '', ''); ?></span>
                </div>
				<div class="post-ratings-container">
					<?php if(function_exists('the_ratings')) { the_ratings(); } ?>  
				</div>
			</div>
				<div class="entry">
					<?php the_content('Read the rest of this entry &raquo;'); ?>
				</div>

				<p class="postmetadata"><?php the_tags('Tags: ', ', ', '<br />'); ?> Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
		</div>
		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php get_search_form(); ?>

	<?php endif; ?>
    </div>
	</div>

<?php get_footer(); ?>
