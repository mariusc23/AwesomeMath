<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header();
?>

<?php get_sidebar(); ?>

	<div id="content" class="page-404 page">
    <div id="content-inner">

		<h2 style="line-height: 1.3em">Sorry, the page you were looking for was not found. Try using the search below to find what you need, or check the sidebar for common pages.</h2>
        <?php get_search_form(); ?>
    </div>

	</div>

<?php get_footer(); ?>
