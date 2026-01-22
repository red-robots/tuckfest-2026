<?php
/**
 * The template for Home Page
 */ 
$flexible_content = get_field('the_flexible_content');
if($flexible_content) {
  get_header('2026');
} else {
  get_header();
}
?>
<?php while ( have_posts() ) : the_post(); ?>
  <?php if($flexible_content) { ?>
    <?php include( locate_template('parts-flexible/home-content.php') ); ?>
  <?php } else { ?>
  	<?php if( !isTuckFestLandingPage() ) { ?>
  		<main id="main" class="site-main">
    		<?php include( locate_template('parts/mc-signup.php') ); ?>
    		<?php if ( get_the_content() ) { ?>
    		  <div class="hometext"><div class="inside"><?php the_content(); ?></div></div>
    		<?php } ?>
  		</main>
    	<?php } ?>
  <?php } ?>
<?php endwhile; ?>  
<?php
get_footer();
