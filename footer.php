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
          <?php include( locate_template('parts/social-media-links.php') ); ?>
        </div>
      </div>
    </div>

  </footer><!-- #colophon -->
</div><!-- #page -->
<script>
if( document.querySelector('[data-group="fullwidth_video"]').length ) {
  const container = document.querySelector('repeatable--fullwidth_video');
  const video = document.querySelector('.sticky-video video');

  window.addEventListener('scroll', () => {
    // 1. Calculate how far down the container we have scrolled
    const distanceFromTop = window.scrollY - container.offsetTop;
    const totalScrollableHeight = container.offsetHeight - window.innerHeight;
    
    // 2. Turn that into a percentage (0 to 1)
    let scrollFraction = distanceFromTop / totalScrollableHeight;
    
    // 3. Constrain the fraction between 0 and 1
    scrollFraction = Math.max(0, Math.min(1, scrollFraction));

    // 4. Update video playback (optional: remove if you just want it to play normally)
    if (video.duration) {
      video.currentTime = video.duration * scrollFraction;
    }
  });
}
</script>
<?php wp_footer(); ?>
</body>
</html>
