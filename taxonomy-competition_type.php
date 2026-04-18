<?php
get_header(); 
get_template_part('inc/coming-soon');
$comingSoon = get_field('coming_soon');
$soon = ( isset($comingSoon[0]) ) ? $comingSoon[0] : '';
$obj = get_queried_object_id();
$currentTerm = ($obj) ? get_term($obj) : '';
$currentTaxonomy = ( isset($currentTerm->taxonomy) ) ? $currentTerm->taxonomy : '';
$currentTermId = ( isset($currentTerm->term_id) ) ? $currentTerm->term_id : '';
$currentTermName = ( isset($currentTerm->name) ) ? $currentTerm->name : '';
$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

$args = array();
if($currentTermId) {
  $perpage = 12;
  $args = array(
    'post_type'   => 'competition', 
    'post_status' => 'publish',
    'posts_per_page'  => $perpage,
    'paged'       => $paged,
    'tax_query'   => array(
      array(
        'taxonomy' => $currentTaxonomy, 
        'field'    => 'term_id',  
        'terms'    => $currentTermId,       
      ),
    )
  );
}
$query = ($args) ? new WP_Query($args) : '';

if($soon !== 'soon') :?>
<?php if ($currentTermName) { ?>
  <header class="entry-title">
    <h1><?php echo $currentTermName ?></h1>
  </header>
<?php } ?>
<?php get_template_part('parts/hero-subpage'); ?>
<div id="primary" class="content-area default-template">
	<main id="main" class="site-main">
      <section class="entry-content ">
        <div class="wrapper">
          <?php if ( $query && $query->have_posts() ) { ?>
          <div class="feeds-wrapper feeds-wrapper--new">
            <div class="columns">
              <?php while ($query->have_posts()) : $query->the_post(); 
                $post_id  = get_the_ID();
                $thumbnail_id = get_post_thumbnail_id($post_id);
                $featImage = wp_get_attachment_image_src($thumbnail_id,'large');
                $imageStyle = ($featImage) ? ' style="background-image:url('.$featImage[0].')"':'';
                $pagelink = get_permalink();
              ?>
              <div data-postid="<?php echo $post_id ?>" class="column">
                <div class="inner">
                  <div class="image">
                    <figure<?php echo $imageStyle ?>>
                      <a href="<?php echo $pagelink ?>" aria-label="<?php echo get_the_title() ?>">
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/square.png" class="helper" alt="" role="decoraion" aria-hidden="true">
                      </a>
                    </figure>
                  </div>
                  <h4 class="title"><a href="<?php echo $pagelink ?>"><?php the_title(); ?></a></h4>
                </div>
              </div>
              <?php endwhile; wp_reset_postdata(); ?>
            </div>
          </div>

          <?php $total_pages = $query->max_num_pages;
            if ($total_pages > 1){ ?>
              <div id="pagination" class="pagination-feeds">
                <?php
                $pagination = array(
                  'base' => @add_query_arg('paged','%#%'),
                  'format' => '?paged=%#%',
                  'mid-size' => 1,
                  'current' => $paged,
                  'total' => $total_pages,
                  'prev_next' => True,
                  'prev_text' => __( '<span class="fa fa-arrow-left"></span>' ),
                  'next_text' => __( '<span class="fa fa-arrow-right"></span>' )
                );
                echo paginate_links($pagination); ?>
              </div>
            <?php } ?>
          <?php } ?>
        </div>
      </section>
	</main>
</div>
<?php
endif;
get_footer();
