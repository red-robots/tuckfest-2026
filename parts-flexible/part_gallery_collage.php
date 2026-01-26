<?php if( get_row_layout() == 'gallery_collage' ) {
$gallery_images = get_sub_field('collage_images');
$backgroundImage = get_sub_field('background_image');
$background_overlay = get_sub_field('background_overlay');
$repeatableClass = 'repeatable--'.get_row_layout().' repeatable--'.get_row_layout().$ctr;
if($cards) { ?>
<section data-group="<?php echo get_row_layout() ?>" class="repeatable <?php echo $repeatableClass ?>">
  <div class="collageWrapper">
    <div class="collageImages">
    <?php foreach ($gallery_images as $c) { 
      $image = $c['image'];
      $btn = $c['clickthroughurl'];
      $btnLink = (isset($btn['url']) && $btn['url']) ? $btn['url'] : '';
      $btnTarget = (isset($btn['target']) && $btn['target']) ? ' target="'.$btn['target'].'"' : '';
      $containerWidth = ($c['container_width']) ? $c['container_width'] : 100;
      if($image || $title || $description) { ?>
      <div class="collage" style="width:<?php echo $containerWidth ?>%">
        <figure class="inside">
          <?php if ($image) { ?>
            <?php if ($btnLink) { ?>
            <a class="imageLink" href="<?php echo $btnLink ?>"<?php echo $btnTarget ?>>
              <img src="<?php echo $image['url'] ?>" alt="" class="image">
            </a>
            <?php } else { ?>
              <img src="<?php echo $image['url'] ?>" alt="" class="image">
            <?php } ?>
          <?php } ?>
        </figure>
      </div>
      <?php } ?>
    <?php } ?>
    </div>
  </div>
  <?php if ($backgroundImage) { ?>
  <div class="background-image" style="background-image:url('<?php echo $backgroundImage['url'] ?>')">
    <?php if ($background_overlay) { ?>
    <div class="background-overlay" style="background-color:<?php echo $background_overlay ?>"></div>
    <?php } ?>
  </div>
  <?php } ?>
</section>
<?php } ?>
<?php } ?>