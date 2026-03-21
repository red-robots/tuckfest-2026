<?php
/**
 * Template Name: Athletes
 */

get_header(); 
get_template_part('inc/coming-soon');
$comingSoon = get_field('coming_soon');
$soon = ( isset($comingSoon[0]) ) ? $comingSoon[0] : '';
if($soon !== 'soon') : ?>
<header class="entry-title">
  <h1><?php the_title(); ?></h1>
</header>
<?php get_template_part('parts/hero-subpage'); ?>
<div id="primary" class="content-area default-template">

  <?php  
    $taxonomy = 'athlete-type';
    $args = array(
      'taxonomy'   => $taxonomy, 
      'slug'       => array('dirty-crit','deep-water-solo','boatercross'), 
      'hide_empty' => false, 
    );
    $terms = get_terms($args);
    // echo "<pre style='color:#FFF'>";
    // print_r($terms);
    // echo "</pre>";
    if($terms) { ?>
    <section class="anchors">
      <ul class="terms">
        <li>//</li>
      <?php foreach ($terms as $term) { ?>
        <li>
          <a href="#<?php echo $term->slug ?>"><span><?php echo $term->name ?></span></a>
        </li>
      <?php } ?>
        <li>//</li>
      </ul>
    </section>
    <?php } ?>

  <main id="main" class="site-main">
    <?php while ( have_posts() ) : the_post(); ?>
    <?php if ( get_the_content() ) { ?>
    <section class="entry-content page-content">
      <div class="wrapper"><?php the_content(); ?></div>
    </section>
    <?php } ?>
    <?php endwhile; ?> 

    <?php if($terms) { ?>
      <?php foreach ($terms as $term) { 
        $post_arg = array(
          'post_type'=>'athletes',
          'posts_per_page' => -1,
          'post_status'=>'publish',
          'orderby' => 'menu_order',
          'order' => 'ASC',
          'tax_query' => array(
            array(
              'taxonomy' => $taxonomy, 
              'field'    => 'term_id',
              'terms' => array($term->term_id) 
            )
          )
        );
        $wp_query = new WP_Query();
        $wp_query->query($post_arg);
        if( $wp_query->have_posts() ) { ?>
        <div class="repeatable-content-blocks" id="<?php echo $term->slug ?>">
          <div class="wrapper">
            <header class="entry-title">
              <h2><?php echo $term->name ?></h2>
            </header>
            <?php $n=1; while ( $wp_query->have_posts() ) : $wp_query->the_post(); 
              include(locate_template('parts/athlete-block.php')); ?>
            <?php endwhile; ?>
          </div>
        </div>
        <?php } ?>
      <?php } ?>
    <?php } ?>
  </main>
</div><!-- #primary -->
<script>
jQuery(document).ready(function($){
  $('a[href*="#"]').not('[href="#"]').not('[href="#0"]').click(function(event) {
    // On-page links
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      // Does a scroll target exist?
      // if (target.length) {
      //   // Only prevent default if animation is actually gonna happen
      //   event.preventDefault();
      //   $('html, body').animate({
      //     scrollTop: target.offset().top - 100
      //   }, 1000, function() {
      //     // Callback after animation
      //     // Must change focus!
      //     var $target = $(target);
      //     $target.focus();
      //     if ($target.is(":focus")) { // Checking if the target was focused
      //       return false;
      //     } else {
      //       $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
      //       $target.focus(); // Set focus again
      //     };
      //   });
      // }
      smoothScrollTo($(target),event);
      setTimeout(function(){
        smoothScrollTo($(target),event);
      },50);
    }
  });

  function smoothScrollTo(target,event) {
    if (target.length) {
      if(event) event.preventDefault();

      let topOffset = target.offset().top - 100;
      // if( $('.site-header.sticky').length ) {
      //   let headerHeight = $('.site-header').outerHeight();
      //   topOffset = target.offset().top - headerHeight;
      // }
      
      $('html, body').animate({
        scrollTop: topOffset
      }, 500, function() {
        target.focus();
        if (target.is(":focus")) { 
          return false;
        } else {
          target.attr('tabindex','-1'); 
          target.focus();
        };
      });
    }
  }
});
</script>


<?php
endif;
get_footer();
