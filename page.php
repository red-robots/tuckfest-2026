<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bellaworks
 */

get_header();
$flexible_content = pageHasFlexibleContent();
while ( have_posts() ) : the_post();
  if( $flexible_content ) {
    include( locate_template('parts-flexible/home-content.php') );
  } else { 

    get_template_part('parts/hero-subpage');
    get_template_part('inc/coming-soon');
    $comingSoon = get_field('coming_soon');
    $soon = ( isset($comingSoon[0]) ) ? $comingSoon[0] : '';
    if($soon !== 'soon') { ?>

      <div id="primary" class="content-area default-template">
        <main id="main" class="site-main">
          <section class="entry-content ">
          <header class="entry-title ">
            <h1><?php the_title(); ?></h1>
          </header>
          <div class="wrapper"><?php the_content(); ?></div>
          </section>
        </main>
      </div>

    <?php } ?>

  <?php } 
endwhile;
get_footer();
