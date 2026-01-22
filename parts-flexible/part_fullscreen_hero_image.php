<?php if( get_row_layout() == 'fullscreen_hero_image' ) {
$bgImage = get_sub_field('background_image');
$middleImage = get_sub_field('middle_image');
$heroText = get_sub_field('hero_text');
$bottomInfo = get_sub_field('bottom_information');
$leftText = ( isset($bottomInfo['left_text']) ) ? $bottomInfo['left_text'] : '';
$centerText = ( isset($bottomInfo['center_text']) ) ? $bottomInfo['center_text'] : '';
$rightText = ( isset($bottomInfo['right_text']) ) ? $bottomInfo['right_text'] : '';
$repeatableClass = 'repeatable--'.get_row_layout().' repeatable--'.get_row_layout().$ctr;
if($bgImage) { ?>
<section data-group="<?php echo get_row_layout() ?>" class="repeatable <?php echo $repeatableClass ?>">
  <div class="background-image" style="background-image:url('<?php echo $bgImage['url']?>')"></div>
  <?php if ($middleImage || $heroText) { ?>
  <div class="middleImage">
    <div class="wrap">
      <?php if ($middleImage) { ?>
        <figure><img src="<?php echo $middleImage['url'] ?>" alt="<?php echo $middleImage['title'] ?>"></figure>
      <?php } ?>
      <?php if ($heroText) { ?>
      <div class="heroText"><?php echo $heroText ?></div>
      <?php } ?>
    </div>
  </div> 
  <?php } ?>

  <?php if ($leftText || $centerText || $rightText) { ?>
  <div class="bottomContent">
    <div class="wrap">
      <?php if ($leftText) { ?>
      <div class="text leftText"><?php echo $leftText ?></div>
      <?php } ?>
      <?php if ($centerText) { ?>
      <div class="text centerText"><?php echo $centerText ?></div>
      <?php } ?>
      <?php if ($rightText) { ?>
      <div class="text rightText"><?php echo $rightText ?></div>
      <?php } ?>
    </div>
    <span class="stripes">
      <span class="s1"></span>
      <span class="s2"></span>
    </span>
  </div>
  <?php } ?>
</section>
<?php } ?>
<?php } ?>