<?php
/**
 * Template Name: Athletes
 */

get_header(); 
get_template_part('inc/coming-soon');
$comingSoon = get_field('coming_soon');
$soon = ( isset($comingSoon[0]) ) ? $comingSoon[0] : '';
if($soon !== 'soon') :
?>
<header class="entry-title">
  <h1><?php the_title(); ?></h1>
</header>
<?php get_template_part('parts/hero-subpage'); ?>
<div id="primary" class="content-area default-template">


  <section class="anchors">
    <ul>
      <li>//</li>
      <li>
        <a href="#deep-water-solo">Deep Water Solo</a>
      </li>
      <li>
        <a href="#boatercross">Boatercross</a>
      </li>
      <li>
        <a href="#dirty-crit">Dirty Crit</a>
      </li>
      <li>//</li>
    </ul>
  </section>

  <main id="main" class="site-main">
    <?php while ( have_posts() ) : the_post(); ?>
      <?php if ( get_the_content() ) { ?>
      <section class="entry-content page-content">
        <div class="wrapper"><?php the_content(); ?></div>
      </section>
      <?php } ?>
      <?php endwhile; ?> 

      <?php 
      $wp_query = new WP_Query();
		  $wp_query->query(array(
			'post_type'=>'athletes',
			'posts_per_page' => -1,
      'orderby' => 'menu_order',
      'order' => 'ASC',
      'tax_query' => array(
        array(
          'taxonomy' => 'athlete-type', // your custom taxonomy
          'field' => 'slug',
          'terms' => array( 'dirty-crit' ) // the terms (categories) you created
        )
      )
		));
      if( $wp_query->have_posts() ) { ?>
      <div class="repeatable-content-blocks" id="dirty-crit">
        <div class="wrapper">
          <header class="entry-title">
            <h2>Dirty Crit</h2>
          </header>
        <?php $n=1; while ( $wp_query->have_posts() ) : $wp_query->the_post(); 
          include(locate_template('parts/athlete-block.php')); ?>
        <?php endwhile; ?>
        </div>
      </div>
      <?php } ?>


      <?php 
      $wp_query = new WP_Query();
      $wp_query->query(array(
      'post_type'=>'athletes',
      'posts_per_page' => -1,
      'orderby' => 'menu_order',
      'order' => 'ASC',
      'tax_query' => array(
        array(
          'taxonomy' => 'athlete-type', // your custom taxonomy
          'field' => 'slug',
          'terms' => array( 'deep-water-solo' ) // the terms (categories) you created
        )
      )
    ));
      if( $wp_query->have_posts() ) { ?>
      <div class="repeatable-content-blocks" id="deep-water-solo">
        <div class="wrapper">
          <header class="entry-title">
            <h2>Deep Water Solo</h2>
          </header>
        <?php $n=1; while ( $wp_query->have_posts() ) : $wp_query->the_post(); 
          include(locate_template('parts/athlete-block.php')); ?>
        <?php endwhile; ?>
        </div>
      </div>
      <?php } ?>


      <?php 
      $wp_query = new WP_Query();
      $wp_query->query(array(
      'post_type'=>'athletes',
      'posts_per_page' => -1,
      'orderby' => 'menu_order',
      'order' => 'ASC',
      'tax_query' => array(
        array(
          'taxonomy' => 'athlete-type', // your custom taxonomy
          'field' => 'slug',
          'terms' => array( 'boatercross' ) // the terms (categories) you created
        )
      )
    ));
      if( $wp_query->have_posts() ) { ?>
      <div class="repeatable-content-blocks" id="boatercross">
        <div class="wrapper">
          <header class="entry-title">
            <h2>Boatercross</h2>
          </header>
        <?php $n=1; while ( $wp_query->have_posts() ) : $wp_query->the_post(); 
          include(locate_template('parts/athlete-block.php')); ?>
        <?php endwhile; ?>
        </div>
      </div>
      <?php } ?>

     
  </main>
</div><!-- #primary -->

<?php
endif;
get_footer();
