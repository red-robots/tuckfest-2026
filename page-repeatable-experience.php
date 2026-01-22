<?php
/**
 * Template Name: Repeatable Experience
 */

get_header(); 
get_template_part('inc/coming-soon');
$comingSoon = get_field('coming_soon');
$soon = ( isset($comingSoon[0]) ) ? $comingSoon[0] : '';
if($soon !== 'soon') :
?>

<?php get_template_part('parts/hero-subpage'); ?>
<div id="primary" class="content-area default-template">


	<?php 
	$blocks = get_field('repeatable_block'); 
	// echo '<pre>';
	// print_r($blocks);
	// echo '</pre>';
	
	
	?>
	<section class="anchors">
    <ul>
      <li>//</li>
      <?php foreach( $blocks as $b ) { 
      		$secTitle = $b['title'];
			if( $secTitle ){
				$santi = sanitize_title_with_dashes($secTitle);
			}
      	?>
      	<li>
      		<a href="#<?php echo $santi; ?>"><?php echo $secTitle; ?></a>
      	</li>
      <?php } ?>
      <!-- <li>
        <a href="#pro-comps">Pro Comps</a>
      </li>
      <li>
        <a href="#citizen-comps">Citizen Comps</a>
      </li>
      <li>
        <a href="#all-comps">All Comps</a>
      </li> -->
      <li>//</li>
    </ul>
  </section>

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

      <?php if( have_rows('repeatable_block_x') ) { ?>
      <div class="repeatable-content-blocks">
        <div class="wrapper">
        <?php $n=1; while ( have_rows('repeatable_block_x') ) : the_row(); 
          $image_above_title = get_sub_field('image_above_title');
          $title = get_sub_field('title');
          $sani = sanitize_title_with_dashes($title);
          $text = get_sub_field('text');
          $buttons = get_sub_field('buttons');
          $gallery = get_sub_field('gallery');
          $column_class = ( ($title || $text) &&  $gallery ) ? 'half':'full';
          if( ($title || $text) ||  $gallery ) { ?>
          <div class="content-block <?php echo $column_class ?>"  >
          	
            <?php if ( $title || $text ) { ?>
            <div class="textcol block">
              <div class="inside">
              	<?php if( $image_above_title ) { ?>
	          		<div class="image-above">
	          			<img src="<?php echo $image_above_title['url']; ?>">
	          		</div>
	          	<?php } ?>
                <?php if ($title) { ?>
                 <h2 class="rb_title" id="<?php echo $sani; ?>"><span><b><?php echo $title ?></b></span></h2> 
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
