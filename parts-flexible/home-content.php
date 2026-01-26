<?php if( have_rows('the_flexible_content') ) { ?>
<div class="flexible-content-wrapper">
<?php $ctr=1; while( have_rows('the_flexible_content') ): the_row(); 
  include( locate_template('parts-flexible/part_fullscreen_hero_image.php') );
  include( locate_template('parts-flexible/part_fullwidth_video.php') );
  include( locate_template('parts-flexible/part_event_cards.php') );
  include( locate_template('parts-flexible/part_vendors_carousel.php') );
  include( locate_template('parts-flexible/part_contact_information.php') );
  include( locate_template('parts-flexible/part_text_content_buttons.php') );
  include( locate_template('parts-flexible/part_gallery_collage.php') );
$ctr++; endwhile; ?>
</div>  
<?php } ?>

<script>
if( document.querySelectorAll('.buttons-hidden-shortcode') ) {
  const buttonsShortCodes = document.querySelectorAll('.buttons-hidden-shortcode');
  buttonsShortCodes.forEach((button, index) => {
    let parentDiv = button.parentNode;
    let buttons = button.querySelector('.buttons');
    if( parentDiv.querySelectorAll('.buttonsContainer') ) {
      let buttonsContainer = parentDiv.querySelectorAll('.buttonsList');
      buttonsContainer[index].append(buttons);
    }
  });
}
</script>