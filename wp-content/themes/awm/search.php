<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>

<?php get_sidebar(); ?>

	<div id="content" class="post-listing post-listing-search">
    <div class="top-bar">
        <div class="top-bar-l"></div>
        <div class="top-bar-m"></div>
        <div class="top-bar-r"></div>
    </div>
    <div id="content-inner">

	<?php if (have_posts()) : ?>

		<h2 class="pagetitle">Search Results</h2>

		<?php while (have_posts()) : the_post(); ?>

		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<div class="post-header box-container-1">
				<h2 class="thetitle">
					<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
					<?php edit_post_link('(edit)',' <span class="edit-link">','</span>'); ?>
				</h2>
				<?php if(get_post_type(get_the_ID()) != 'page') { ?>
				<div class="submitted-info">
					<span class="submitted-date"><?php the_date("m-d-y", '', ''); ?></span> |
					<span class="submitted-author">posted by <?php the_author_link(); ?></span>
				</div>
				<?php } ?>
				
				<div class="post-ratings-container">
					<?php if(function_exists('the_ratings')) { the_ratings(); } ?>  
				</div>
			</div>
				<div class="entry">
					<?php the_excerpt(); ?>
				</div>

				<p class="postmetadata"><?php the_tags('Tags: ', ', ', '<br />'); ?> Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
		</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h2 class="center">No posts found. Try a different search?</h2>
		<?php get_search_form(); ?>

	<?php endif; ?>

	</div>
    <div class="bot-bar">
        <div class="bot-bar-l"></div>
        <div class="bot-bar-m"></div>
        <div class="bot-bar-r"></div>
    </div>
    </div>

<?php get_footer(); ?>
