<?php if( get_row_layout() == 'text_content_buttons' ) {
$textContent = get_sub_field('text_content');
$buttons = get_sub_field('buttons');
$backgroundImage = get_sub_field('background_image');
$background_overlay = get_sub_field('background_overlay');
$repeatableClass = 'repeatable--'.get_row_layout().' repeatable--'.get_row_layout().$ctr;
if($textContent) { ?>
<section data-group="<?php echo get_row_layout() ?>" class="repeatable <?php echo $repeatableClass ?>">
  <?php if ($textContent) { ?>
  <div class="wrapper textContainer">
    <div class="textWrap"><?php echo anti_email_spam($textContent) ?></div>
    <?php if ($buttons) { ?>
    <div class="buttons">
      <?php foreach ($buttons as $b) { 
        $btn = $b['button'];
        $btnLink = (isset($btn['url']) && $btn['url']) ? $btn['url'] : '';
        $btnName = (isset($btn['title']) && $btn['title']) ? $btn['title'] : '';
        $btnTarget = (isset($btn['target']) && $btn['target']) ? ' target="'.$btn['target'].'"' : '';
        if($btnLink && $btnName) { ?>
        <a href="<?php echo $btnLink ?>" target="<?php echo $btnTarget ?>" class="button-yellow"><?php echo $btnName ?></a>
        <?php } ?>
      <?php } ?>
    </div>
    <?php } ?>
  </div>
  <?php } ?>

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