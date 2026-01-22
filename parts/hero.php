<?php if( is_front_page() || is_home() ) { 
  $home_banner = get_field('home_banner');
  $mobile_home_banner = get_field('mobile_home_banner');
  $buttons = get_field('home_buttons');
  // echo '<pre>';
  // print_r($buttons);
  // echo '</pre>';
  ?>
  <?php if( $home_banner || $buttons ) { ?>


    <?php if ($home_banner) { ?>
    <div class="home-banner">
      
        <figure>
          <img class="desktop" src="<?php echo $home_banner['url'] ?>" alt="<?php echo $home_banner['title'] ?>">
          <img class="mobile" src="<?php echo $mobile_home_banner['url'] ?>" alt="<?php echo $mobile_home_banner['title'] ?>">
        </figure>
      
    </div>
    <?php } ?>

    <?php if ($buttons) { ?>
    <div class="home-buttons">
      <div class="wrapper-bak">
        <div class="flexwrap">
          <?php $i=1; foreach ($buttons as $btn) { 
            // $color = ($btn['color']) ? $btn['color'] : '#000';
            $pol_pic = ( isset($btn['pol_pic']['url']) && $btn['pol_pic']['url'] ) ? $btn['pol_pic']['url'] : '';
            // $image_hover = $btn['image_hover'];
            $image_title = ( isset($btn['pol_pic']['title']) && $btn['pol_pic']['title'] ) ? $btn['pol_pic']['title'] : '';
            $image = (isset($btn['image']) && $btn['image']) ? $btn['image'] : '';
            $div_id = $btn['id'];
            $link = ($btn['link']) ? $btn['link'] : '';
            $pagelink = ( isset($link['url']) && $link['url'] ) ? $link['url'] : 'javascript:void(0)';
            $link_title = ( isset($link['title']) && $link['title'] ) ? $link['title'] : '';
            $target = ( isset($link['target']) && $link['target'] ) ? $link['target'] : '_self';
            $bgcolor = (isset($color) && $color) ? ' style="background-color:'.$color.'"':'';
            ?>
              <!-- <a data-i="<?php echo $i; ?>" href="<?php echo $pagelink ?>" target="<?php echo $target ?>" class="<?php echo $div_id; ?>-icon">
                  
                </a> -->
               

              <div class="polaroid home-pol" >
                <a href="<?php echo $pagelink ?>">
                  <div class="p-pic">
                    <div class="tape"></div>
                    <div class="pol-info"><?php echo $link_title ?></div>
                    <img src="<?php bloginfo('template_url'); ?>/images/Polaroid-Frame.png">
                  </div>
                  <?php if ($pol_pic) { ?>
                  <div class="behind-polaroid">
                    <img src="<?php echo $pol_pic; ?>" alt=" <?php echo $image_title ?>">
                  </div>
                  <?php } ?>
                </a>
              </div>


            <?php //} ?>
          <?php $i++; } ?>
        </div>
      </div>
    </div>
    <?php } ?>
    
  <?php } ?>
<?php } ?>
<?php  if( have_rows( 'boxes' ) ) : ?>
        <section class="extra-boxes">
          <div class="home-buttons">
              <div class="wrapper">
                <div class="flexwrap">
                  <?php while( have_rows( 'boxes' ) ): the_row();
                    $box_color = get_sub_field('box_color');
                    $title = get_sub_field('title');
                    $link = get_sub_field('link');
                    $image = get_sub_field('image'); 
                    $cClass = 'white';
                    ?>
                    <!-- <div class="button extra"> -->
                      <div class="polaroid " >
                      <a href="<?php echo $link ?>">
                        <div class="p-pic">
                          <div class="tape"></div>
                          <img src="<?php bloginfo('template_url'); ?>/images/Polaroid-Frame.png">
                        </div>
                        <div class="behind-polaroid">
                          <img src="<?php echo $image['url'] ?>" alt=" <?php echo $image['title'] ?>">
                        </div>
                        <!-- <img src="<?php echo $image['url'] ?>"> -->
                        <!-- <div class="bottom <?php //echo $cClass; ?>">
                          <div class="title"><?php echo $title; ?></div>
                        </div> -->
                      </a>
                    </div>
                  <?php endwhile; ?>
                </div>
              </div>
            </div>
        </section>
    
<?php endif; ?>