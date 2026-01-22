<?php if( get_row_layout() == 'event_cards' ) {
$cards = get_sub_field('cards');
$repeatableClass = 'repeatable--'.get_row_layout().' repeatable--'.get_row_layout().$ctr;
if($cards) { ?>
<section data-group="<?php echo get_row_layout() ?>" class="repeatable <?php echo $repeatableClass ?>">
  <div class="wrapper">
    <div class="eventCards">
    <?php foreach ($cards as $c) { 
      $image = $c['image'];
      $title = $c['title'];
      $description = $c['description'];
      $buttons = $c['buttons'];
      $containerWidth = ($c['container_width']) ? $c['container_width'] : 100;
      if($image || $title || $description) { ?>
      <div class="eventCard" style="width:<?php echo $containerWidth ?>%">
        <div class="inside">
          <?php if ($image) { ?>
          <img src="<?php echo $image['url'] ?>" alt="" class="image">
          <?php } ?>
          <?php if ($title || $description) { ?>
          <div class="text">
            <div class="wrap">
              <?php if ($title) { ?>
              <div class="title"><?php echo $title ?></div>
              <?php } ?>
              <?php if ($description) { ?>
              <div class="description"><?php echo $description ?></div>
              <?php } ?>
              <?php if ($buttons) { ?>
              <div class="buttons">
                <?php foreach ($buttons as $b) { 
                  $btn = $b['button'];
                  $btnLink = (isset($btn['url']) && $btn['url']) ? $btn['url'] : '';
                  $btnName = (isset($btn['title']) && $btn['title']) ? $btn['title'] : '';
                  $btnTarget = (isset($btn['target']) && $btn['target']) ? ' target="'.$btn['target'].'"' : '';
                  if($btnName && $btnLink) { ?>
                  <a href="<?php echo $btnLink ?>" class="button"<?php echo $btnTarget ?>><?php echo $btnName ?></a>
                  <?php } ?>
                <?php } ?>
              </div>
              <?php } ?>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
      <?php } ?>
    <?php } ?>
    </div>
  </div>
</section>
<?php } ?>
<?php } ?>