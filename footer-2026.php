  </div><!-- #content -->
  
  <?php 
  $footer_logo = get_field("footer_logo","option");
  $footer_logo_website = get_field("footer_logo_website","option");
  ?>
  <footer id="colophon" class="Footer site-footer" role="contentinfo">
    <div class="footerInner">
      <div class="flexwrap">
        <?php if ($footer_logo) { ?>
        <div class="footcol left">
          <div id="footlogo">
            <?php if ($footer_logo_website) { ?>
              <a href="<?php echo $footer_logo_website ?>" target="_blank"><img src="<?php echo $footer_logo['url'] ?>" alt="<?php echo $footer_logo['title'] ?>" class="footlogo"></a>
            <?php } else { ?>
              <img src="<?php echo $footer_logo['url'] ?>" alt="<?php echo $footer_logo['title'] ?>" class="footlogo"> 
            <?php } ?>
          </div>
        </div>
        <?php } ?>

        <div class="footcol right">
          <?php include( locate_template('parts/footer-signup.php') ); ?>
          <?php
          $foot_social = get_field('social_media_links','option');
          if($foot_social) { ?>
            <div class="footSocialMedia">
            <?php foreach($foot_social as $fs) { 
              $fs_link = $fs['link'];
              $fs_icon = $fs['icon'];
                if($fs_link && $fs_icon) { 
                  $fs_root_name = get_root_name_from_url($fs_link); ?>
                <a href="<?php echo $fs_link?>" target="_blank" aria-label="<?php echo $fs_root_name?>">
                  <img src="<?php echo $fs_icon?>" alt="<?php echo $fs_root_name?>" />
                </a>
                        <?php } ?> 
            <?php } ?>
            </div>
           <?php } ?>
        </div>
      </div>
    </div>

  </footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>
