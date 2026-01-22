<?php
/**
 * Template Name: Homepage 2026
 */
get_header(); 
?>
<div id="primary" class="content-area default-template">
	<main id="main" class="site-main">
		<?php while ( have_posts() ) : the_post(); ?>
	   
		<?php endwhile; ?>	
	</main>
</div>
<?php 
get_footer();
