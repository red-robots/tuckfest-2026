	</div><!-- #content -->
	
<?php 
$footer_logo = get_field("footer_logo","option");
$footer_logo_website = get_field("footer_logo_website","option");
$is_landing_page = ( isTuckFestLandingPage() ) ? isTuckFestLandingPage() : false;
if($is_landing_page) { ?>
   <footer class="lp-site-footer" role="contentinfo">
	   <div class="lp-flexwrap">
		   <?php if ($footer_logo_website) { ?>
		   <div class="lp-block lp-block-logo">
			   <a href="<?php echo $footer_logo_website ?>" target="_blank" class="lp-foot-logo"><img src="<?php echo $footer_logo['url'] ?>" alt="<?php echo $footer_logo['title'] ?>" class="footlogo"></a>
		  </div>
		  <?php } ?>
		   
		  <div class="lp-block lp-block-form">
			  <span class="dashes dash-left"><i></i><i></i><i></i><i></i></span>
			  <span class="dashes dash-right"><i></i><i></i><i></i><i></i></span>
			  
			  <!-- SUBSCRIBE FORM -->
			  <div id="mc_embed_shell">
				  <form action="https://whitewater.us17.list-manage.com/subscribe/post?u=621991427ab3dab6fe3576a60&amp;id=3c8fcb087c&amp;f_id=0013e5e1f0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank">
					  <div id="mc_embed_signup_scroll">
						  <input type="email" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Sign up for event updates..." required="" value="">
						  <input type="submit" name="subscribe" id="mc-embedded-subscribe" class="button" value="Subscribe">
						  <div hidden=""><input type="hidden" name="tags" value="6316781"></div>
					  </div>
					  <div id="mce-responses" class="">
						  <div class="response" id="mce-error-response" style="display: none;"></div>
						  <div class="response" id="mce-success-response" style="display: none;"></div>
					  </div>
					  <div aria-hidden="true" style="position: absolute; left: -5000px;">
						  <input type="text" name="b_621991427ab3dab6fe3576a60_3c8fcb087c" tabindex="-1" value="">
					  </div>
				  </form>
			  </div>
			  <script type="text/javascript" src="//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js"></script><script type="text/javascript">(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[18]='MMERGE18';ftypes[18]='text';fnames[32]='MMERGE32';ftypes[32]='text';fnames[31]='MMERGE31';ftypes[31]='text';fnames[30]='MMERGE30';ftypes[30]='birthday';fnames[29]='MMERGE29';ftypes[29]='text';fnames[28]='MMERGE28';ftypes[28]='text';fnames[27]='MMERGE27';ftypes[27]='text';fnames[26]='MMERGE26';ftypes[26]='text';fnames[25]='MMERGE25';ftypes[25]='number';fnames[24]='MMERGE24';ftypes[24]='text';fnames[23]='MMERGE23';ftypes[23]='text';fnames[22]='MMERGE22';ftypes[22]='text';fnames[21]='MMERGE21';ftypes[21]='text';fnames[20]='MMERGE20';ftypes[20]='text';fnames[19]='MMERGE19';ftypes[19]='text';fnames[17]='MMERGE17';ftypes[17]='text';fnames[1]='FNAME';ftypes[1]='text';fnames[8]='MMERGE8';ftypes[8]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='BIRTHDAY';ftypes[3]='birthday';fnames[4]='MMERGE4';ftypes[4]='text';fnames[5]='MMERGE5';ftypes[5]='phone';fnames[6]='MMERGE6';ftypes[6]='phone';fnames[7]='MMERGE7';ftypes[7]='text';fnames[9]='MMERGE9';ftypes[9]='text';fnames[16]='MMERGE16';ftypes[16]='text';fnames[10]='MMERGE10';ftypes[10]='text';fnames[11]='MMERGE11';ftypes[11]='text';fnames[12]='MMERGE12';ftypes[12]='text';fnames[13]='MMERGE13';ftypes[13]='text';fnames[14]='MMERGE14';ftypes[14]='text';fnames[15]='MMERGE15';ftypes[15]='text';fnames[33]='MMERGE33';ftypes[33]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>

		   </div>
		   
		   <?php
		   	$foot_social = get_field('social_media_links','option');
			if($foot_social) { ?>
		   	<div class="lp-block lp-block-social">
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
   </footer>
<?php } else { ?>

  <footer id="colophon" class="site-footer" role="contentinfo">
    <div class="wrapper">
      <div class="flexwrap">
        <?php if ($footer_logo) { ?>
        <div id="footlogo" class="footcol left">
          <?php if ($footer_logo_website) { ?>
            <a href="<?php echo $footer_logo_website ?>" target="_blank"><img src="<?php echo $footer_logo['url'] ?>" alt="<?php echo $footer_logo['title'] ?>" class="footlogo"></a>
          <?php } else { ?>
            <img src="<?php echo $footer_logo['url'] ?>" alt="<?php echo $footer_logo['title'] ?>" class="footlogo"> 
          <?php } ?>
        </div>
        <?php } ?>

        <?php if ( has_nav_menu( 'footer' ) ) { ?>
          <nav id="footer-navigation" class="footer-navigation" role="navigation">
            <?php wp_nav_menu( array( 'theme_location' => 'footer', 'container'=>false, 'menu_id' => 'footer-menu') ); ?>
            <?php if ( $topNavs = get_field("topNavs","option") ) { ?>
            <ul class="menu other">
            <?php foreach ($topNavs as $n) { 
              if( $n['link'] ) { 
                $a = $n['link'];
                $target = ( isset($a['target']) && $a['target'] ) ? $a['target'] : '_self';
                $icon = ($n['icon']) ? $n['icon'] : '';
                $hasIcon = ($icon) ? 'has-icon':'no-icon';
                ?>
                <li class="foot-link <?php echo $hasIcon ?>"><a href="<?php echo $a['url'] ?>" target="<?php echo $target ?>"><?php echo $icon ?><?php echo $a['title'] ?></a></li>
              <?php } ?>
            <?php } ?>
            </ul>
            <?php } ?>
          </nav>
        <?php } ?>
      </div>
    </div>

    <?php 
      $sponsors_text = get_field("footer_sponsors_text","option"); 
      if( have_rows('footer_sponsors', 'option') ) : ?>
      <div class="footer-sponsors sponsors container rotator">
        <?php if ($sponsors_text) { ?>
          <div class="sponsor-text"><?php echo $sponsors_text ?></div> 
        <?php } ?>
        
        <?php while( have_rows('footer_sponsors', 'option') ) : the_row();

          $icon = get_sub_field('icon', 'option');
          $link = get_sub_field('link', 'option');

        ?>
            <li>
              <a href="<?php echo $link; ?>" target="_blank">
                <img src="<?php echo $icon['url']; ?>">
              </a>
            </li>
          <?php endwhile; ?>
        
      </div>
      <?php endif; ?>

	</footer><!-- #colophon -->
    
<?php } ?>
	
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>
