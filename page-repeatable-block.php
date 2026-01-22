<?php
/**
 * Template Name: Repeatable Block
 */

get_header(); 
get_template_part('inc/coming-soon');
$comingSoon = get_field('coming_soon');
$soon = ( isset($comingSoon[0]) ) ? $comingSoon[0] : '';
if($soon !== 'soon') :
?>

<?php get_template_part('parts/hero-subpage'); ?>
<div id="primary" class="content-area default-template">

  <main id="main" class="site-main">
    <?php while ( have_posts() ) : the_post(); ?>
      <?php //if ( get_the_content() ) { ?>
      <section class="entry-content page-content">
          <header class="entry-title">
            <h1><?php the_title(); ?></h1>
          </header>
        <div class="wrapper"><?php the_content(); ?></div>
      </section>
      <?php //} ?>

      <?php if( have_rows('repeatable_block') ) { ?>
      <div class="repeatable-content-blocks">
        <div class="wrapper">
        <?php $n=1; while ( have_rows('repeatable_block') ) : the_row(); 
          $title = get_sub_field('title');
          $text = get_sub_field('text');
          $buttons = get_sub_field('buttons');
          $gallery = get_sub_field('gallery');
          $column_class = ( ($title || $text) &&  $gallery ) ? 'half':'full';
          if( ($title || $text) ||  $gallery ) { ?>
          <div class="content-block <?php echo $column_class ?>">
            <?php if ( $title || $text ) { ?>
            <div class="textcol block">
              <div class="inside">
                <?php if ($title) { ?>
                 <h2 class="rb_title"><span><b><?php echo $title ?></b></span></h2> 
                <?php } ?>

                <?php if ($text) { ?>
                 <div class="rb_content"><?php echo anti_email_spam($text); ?></div> 
                <?php } ?>

                <?php if ($buttons) { ?>
                 <div class="rb_buttons">
                   <?php foreach ($buttons as $btn) { 
                    $b = $btn['button'];
                    $btn_target = ( isset($b['target']) && $b['target'] ) ? $b['target'] : '_self';
                    $btn_text = ( isset($b['title']) && $b['title'] ) ? $b['title'] : '';
                    $btn_link = ( isset($b['url']) && $b['url'] ) ? $b['url'] : '';
                    if( $btn_text && $btn_link ) { ?>
                      <a href="<?php echo $btn_link ?>" targe="<?php echo $btn_target ?>" class=""><?php echo $btn_text ?></a>
                    <?php } ?>
                   <?php } ?>
                 </div> 
                <?php } ?>
              </div>
            </div> 
            <?php } ?>

            <?php if ( $gallery ) { ?>
            <div class="imagecol block">
              <?php foreach( $gallery as $image ) { ?>
                <div class="imagediv" >
                  <img src="<?php echo $image['url'] ?>" alt=" <?php echo $image['title'] ?>">
                </div>
              <?php } ?>
            </div> 
            <?php } ?>
          </div>
          <?php } ?>
        <?php endwhile; ?>
        </div>
      </div>
      <?php } ?>

    <?php endwhile; ?>  
  </main>
</div><!-- #primary -->

<?php
endif;
get_footer();
