<?php if( have_rows('the_flexible_content') ) { ?>
<div class="flexible-content-wrapper">
<?php $ctr=1; while( have_rows('the_flexible_content') ): the_row(); 
  include( locate_template('parts-flexible/part_fullscreen_hero_image.php') );
  include( locate_template('parts-flexible/part_fullwidth_video.php') );
  include( locate_template('parts-flexible/part_event_cards.php') );
$ctr++; endwhile; ?>
</div>  
<?php } ?>