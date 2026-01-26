<?php if( get_row_layout() == 'vendors_carousel' ) {
$vendors = get_sub_field('vendors');
$bottomText = get_sub_field('bottom_text');
$buttons = get_sub_field('buttons');
$backgroundImage = get_sub_field('background_image');
$background_overlay = get_sub_field('background_overlay');
$repeatableClass = 'repeatable--'.get_row_layout().' repeatable--'.get_row_layout().$ctr;
if($video_thumbnail && $video_url) { ?>
<section data-group="<?php echo get_row_layout() ?>" class="repeatable <?php echo $repeatableClass ?>">
  <?php if ($vendors) { ?>
  <div class="wrapper carouselWrapper">
    <div id="vendor-carousel" class="vendor-carousel slick-carousel">
      <?php $vi=1; foreach ($vendors as $v) { 
        $vendor_logo = $v['vendor_logo'];
        $vendor_link = $v['vendor_link'];
        $vLink = (isset($vendor_link['url']) && $vendor_link['url']) ? $vendor_link['url'] : '';
        //$vName = (isset($vendor_link['title']) && $vendor_link['title']) ? $vendor_link['title'] : '';
        $vTarget = (isset($vendor_link['target']) && $vendor_link['target']) ? ' target="'.$vendor_link['target'].'"' : '';
        // $decoration = '';
        // if(isset($v['decoration']) && $v['decoration']) {
        //   foreach($v['decoration'] as $vd) {
        //     $decoration .= ' d-' . $vd;
        //   }
        // }
        if($vendor_logo) { ?>
        <div class="vendor-item">
          <?php if(isset($v['decoration']) && $v['decoration']) { ?>
          <div class="decoration">
            <?php foreach($v['decoration'] as $decor) { ?>
            <span class="<?php echo $decor ?>"></span>
            <?php } ?>
          </div>
          <?php } ?>
          <figure class="vendor">
            <?php if ($vLink) { ?>
             <a href="<?php echo $vLink ?>" target="<?php echo $vTarget ?>">
               <img src="<?php echo $vendor_logo['url'] ?>" alt="<?php echo $vendor_logo['title'] ?>" />
             </a> 
            <?php } else { ?>
              <img src="<?php echo $vendor_logo['url'] ?>" alt="<?php echo $vendor_logo['title'] ?>" />
            <?php } ?>
          </figure>
          <div class="count">
            <span class="text">USNWC</span>
            <span class="number"><?php echo str_pad($vi, 2, "0", STR_PAD_LEFT); ?></span>
          </div>
        </div>
        <?php $vi++; } ?>
      <?php } ?>
    </div>
  </div>
  <?php } ?>

  <?php if ($bottomText) { ?>
  <div class="wrapper textContainer">
    <div class="textWrap"><?php echo anti_email_spam($bottomText) ?></div>
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