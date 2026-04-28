<?php if( get_row_layout() == 'contact_information' ) {
$sectionTitle = get_sub_field('section_title');
$mapEmbed = get_sub_field('map_embed');
$textBlock = get_sub_field('text_block');
$buttons = get_sub_field('buttons');
$backgroundImage = get_sub_field('background_image');
$repeatableClass = 'repeatable--'.get_row_layout().' repeatable--'.get_row_layout().$ctr;
if($mapEmbed && $textBlock) { ?>
<section data-group="<?php echo get_row_layout() ?>" class="repeatable <?php echo $repeatableClass ?>">
  <div class="wrapper">
    <?php if ($sectionTitle) { ?>
    <div class="titleDiv">
      <h2 class="sectionTitle"><?php echo $sectionTitle ?></h2>
    </div>
    <?php } ?>
    <div class="flexwrap">
    <?php if ($mapEmbed) { ?>
      <div class="mapCol">
        <?php echo $mapEmbed ?>
      </div>
    <?php } ?>
    <?php if ($textBlock) { ?>
      <div class="textCol">
        <div class="text"><?php echo anti_email_spam($textBlock) ?></div>
        <?php if ($buttons) { ?>
        <div class="buttons-hidden-shortcode buttons-hidden" aria-hidden="true">
          <div class="buttons">
          <?php foreach ($buttons as $b) { 
            $btn = $b['button'];
            $btnLink = (isset($btn['url']) && $btn['url']) ? $btn['url'] : '';
            $btnName = (isset($btn['title']) && $btn['title']) ? $btn['title'] : '';
            $btnTarget = (isset($btn['target']) && $btn['target']) ? ' target="'.$btn['target'].'"' : '';
            if($btnName && $btnLink) { ?>
            <a href="<?php echo $btnLink ?>" class="button-outline-white"<?php echo $btnTarget ?>><?php echo $btnName ?></a>
            <?php } ?>
          <?php } ?>
          </div>
        </div>
        <?php } ?>
      </div>
    <?php } ?>
    </div>
  </div>
</section>
<?php } ?>
<?php } ?>