<?php
get_header(); 

if (!is_front_page()) {
    get_sidebar();
} ?>

	<div id="content" class="<?php if (is_front_page()) { ?>page-front<?php } else { ?>page<?php } ?>">
    <div id="content-inner">
<?php if (is_front_page()) { edit_post_link('(edit)',' <span class="edit-link">','</span>'); } ?>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="page-post" id="post-<?php the_ID(); ?>">
		<?php if (!is_front_page()) { ?><h2 class="thetitle"><?php the_title(); ?>
				<?php edit_post_link('(edit)',' <span class="edit-link">','</span>'); ?></h2>
        <?php } ?>
			<div class="entry">
				<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

			</div>
		</div>
		<?php endwhile; endif; ?>
	</div>
    </div>


<?php get_footer(); ?>