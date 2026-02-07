<?php
/**
 * The template for Home Page
 */ 
$flexible_content = pageHasFlexibleContent();
get_header();

while ( have_posts() ) : the_post();
  if( $flexible_content ) {
    include( locate_template('parts-flexible/home-content.php') );
  } else { ?>

    <?php if( !isTuckFestLandingPage() ) { ?>
      <main id="main" class="site-main">
        <?php include( locate_template('parts/mc-signup.php') ); ?>
        <?php if ( get_the_content() ) { ?>
          <div class="hometext"><div class="inside"><?php the_content(); ?></div></div>
        <?php } ?>
      </main>
    <?php } ?>

  <?php }
endwhile;


get_footer();