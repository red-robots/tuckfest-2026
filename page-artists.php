<?php
/**
 * Template Name: Artists
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bellaworks
 */
get_header(); 

$comingSoon = get_field('coming_soon');
$soon = ( isset($comingSoon[0]) ) ? $comingSoon[0] : '';

?>

<?php get_template_part('parts/hero-subpage'); ?>
<div id="primary" class="content-area default-template">
	<main id="main" class="site-main">
		<?php while ( have_posts() ) : the_post(); ?>
      <?php if($soon == 'soon') : 
              get_template_part('inc/coming-soon'); 
            else: ?>
      <section class="entry-content ">
        <header class="entry-title ">
          <h1><?php the_title(); ?></h1>
        </header>

        <div class="wrapper">
        	<div class="spotify-wrap">
            
        		  
        		  <?php echo do_shortcode('[feeds post="music"  perpage="-1"  filter="music_day"]'); ?>
              <?php the_content(); ?>
            
        	</div>
          
        </div>
      </section>
      <?php endif; ?>
      <?php //} ?>
		<?php endwhile; ?>
    <section class="entry-content ">
         <?php //include( locate_template('parts/mc-signup.php') ); ?>
         <?php 
         $past_lineups_title = get_field('past_lineups_title');
          $past_lineups = get_field('past_lineups'); 
          ?>  
        <header class="entry-title ">
          <h1><?php echo $past_lineups_title; ?></h1>
        </header>

      <div class="wrapper">
        <?php echo $past_lineups; ?>
      </div>
    </section>
	</main>
</div>
<?php

get_footer();
