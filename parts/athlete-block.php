<?php
$title = get_the_title();
$text = get_the_content();
// $buttons = get_sub_field('buttons');
$image = get_field('image');
if( $image !== '' ) {
	$imgCheck = 'yes';
}
$column_class = ( ($title || $text) &&  $image ) ? 'half':'full';
if( ($title || $text) ||  $image ) { ?>
<div class="content-block half <?php //echo $column_class ?>">
<?php if ( $title || $text ) { ?>
<div class="textcol block athlete">
  <div class="inside">
    <?php if ($title) { ?>
     <h2 class="rb_title"><span><b><?php echo $title ?></b></span></h2> 
    <?php } ?>

    <?php //if ($text) { ?>
     <div class="rb_content"><?php the_content(); ?></div> 
    <?php //} ?>

    <?php if ($buttons) { ?>
     <div class="rb_buttons">
       <?php foreach ($buttons as $btn) { 
        $b = $btn['button'];
        $btn_target = ( isset($b['target']) && $b['target'] ) ? $b['target'] : '_self';
        $btn_text = ( isset($b['title']) && $b['title'] ) ? $b['title'] : '';
        $btn_link = ( isset($b['url']) && $b['url'] ) ? $b['url'] : '';
        if( $btn_text && $btn_link ) { ?>
          <a href="<?php echo $btn_link ?>" targe="<?php echo $btn_target ?>" class="btn2 btn-green"><?php echo $btn_text ?></a>
        <?php } ?>
       <?php } ?>
     </div> 
    <?php } ?>
  </div>
</div> 
<?php } ?>

<?php if ( $imgCheck == 'yes' ) { ?>
    <div class="imagecol block">
      <div class="imagediv" >
        <img src="<?php echo $image['url'] ?>" alt=" <?php echo $image['title'] ?>">
      </div>
    </div> 
<?php } else { 
	$aImage = get_bloginfo('template_url');
?>
	<div class="imagecol block">
      <div class="imagediv" style="background-image:url('<?php echo $aImage . '/images/athlete.png' ?>')">
        <img src="<?php echo $aImage . '/images/athlete.png' ?>" alt=" <?php echo $image['title'] ?>">
      </div>
    </div> 
<?php } ?>
</div>
<?php } ?>