<?php
/**
 * Template Name: Competitions
 */

get_header(); 
get_template_part('inc/coming-soon');
$comingSoon = get_field('coming_soon');
$soon = ( isset($comingSoon[0]) ) ? $comingSoon[0] : '';
if($soon !== 'soon') :
?>

<?php get_template_part('parts/hero-subpage'); ?>
<div id="primary" class="content-area default-template">

  <section class="anchors">
    <ul>
      <li>//</li>
      <li>
        <a href="#pro-comps">Pro Comps</a>
      </li>
      <li>
        <a href="#citizen-comps">Citizen Comps</a>
      </li>
      <li>
        <a href="#all-comps">All Comps</a>
      </li>
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

      <?php if( have_rows('repeatable_block') ) { ?>
      <div class="repeatable-content-blocks" id="pro-comps">
        <div class="wrapper">
        <?php $n=1; while ( have_rows('repeatable_block') ) : the_row(); 
          $title = get_sub_field('title');
          $text = get_sub_field('text');
          $date = get_sub_field('date');
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

                <?php if($date){ ?>
                  <div class="rb_date">
                    <?php echo $date; ?>
                  </div>
                <?php } ?>

                <?php if ($text) { ?>
                 <div class="rb_content"><?php echo $text; ?></div> 
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

    <div id="citizen-comps">&nbsp;</div>
    <?php 
      $cit_title = get_field('cit_title');
      $cit_copy = get_field('cit_copy');
      if( $cit_title || $cit_copy ) { ?>
        <div class="wrapper">
        <div class="entry-content page-content">
          <h2><?php echo $cit_title; ?></h2>
          <?php echo $cit_copy; ?>
        </div>
        </div>
     <?php  }
     ?>


    <?php 
    	$reg_section_title = get_field('reg_section_title'); 
    	$registration_box = get_field('registration_box'); 
    	// echo '<pre>';
    	// print_r($registration_box);
    	// echo '</pre>';

    	if( $registration_box ) {
    ?>
	    <section class="registration-boxes">
	    	<?php if( $reg_section_title ){ echo '<h2>'.$reg_section_title.'</h2>';} ?>
	    	<div class="reg-wrap">
		    	<?php foreach( $registration_box as $box ){ ?>
		    		<div class="reg-box">
		    			<h3><?php echo $box['title']; ?></h3>
		    			<div class="content"><?php echo $box['content']; ?></div>
		    			<?php if( $box['button_link'] ){ ?>
		    				<div class="other-links-btn">
		    					<a href="<?php echo $box['button_link']['url']; ?>"><?php echo $box['button_link']['title']; ?></a>
		    				</div>
		    				
		    			<?php } ?>
		    		</div>
		    	<?php } ?>
	    	</div>
	    </section>
	<?php } ?>






  <?php if( have_rows('repeatable_block_b_c') ) { ?>
      <div class="repeatable-content-blocks" id="pro-comps">
        <div class="wrapper">
        <?php $n=1; while ( have_rows('repeatable_block_b_c') ) : the_row(); 
          $title = get_sub_field('title');
          $text = get_sub_field('text');
          $date = get_sub_field('date');
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

                <?php if($date){ ?>
                  <div class="rb_date">
                    <?php echo $date; ?>
                  </div>
                <?php } ?>

                <?php if ($text) { ?>
                 <div class="rb_content"><?php echo $text; ?></div> 
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








    <?php while( have_posts() ): the_post(); ?>
	    <section class="competitions" id="all-comps">
	    	<h2>Competitions</h2>
        <!--<h2>Coming Soon</h2>-->
	    	<div class="wrapper">
	    		<?php echo do_shortcode('[feeds post="competition" perpage="-1" filter="competition_type,competition_day"]'); ?>
	    	</div>
	    </section>
	<?php endwhile; ?>


  </main>
</div><!-- #primary -->

<?php
endif;
get_footer();
