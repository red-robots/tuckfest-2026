  </div><!-- #content -->
  
  <?php 
  $footer_sponsors = get_field("footer_sponsors","option");
  $footer_logo = get_field("footer_logo","option");
  $footer_logo_website = get_field("footer_logo_website","option");
  ?>
  <footer id="colophon" class="Footer site-footer" role="contentinfo">
    <div class="footerInner">
      <div class="footInfo flexwrap">
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

      <?php if ($footer_sponsors) { ?>
      <div class="footPartners">
        <ul class="footer-partners">
        <?php while( have_rows('footer_sponsors', 'option') ) : the_row();
          $icon = get_sub_field('icon', 'option');
          $link = get_sub_field('link', 'option');
          if($icon) { ?>
          <li>
            <?php if ($link) { ?>
            <a href="<?php echo $link; ?>" target="_blank">
              <img src="<?php echo $icon['url']; ?>">
            </a>
            <?php } else { ?>
            <img src="<?php echo $icon['url']; ?>">
            <?php } ?>
          </li>
          <?php } ?>
        <?php endwhile; ?>
        </ul>
      </div>
      <?php } ?>
    </div>

  </footer><!-- #colophon -->
</div><!-- #page -->

<script>
if (document.querySelector('[data-group="fullwidth_video"]')) {
  const container = document.querySelector('[data-group="fullwidth_video"]');
  const video = document.querySelector('.sticky-video video');

  // Create Progress Bar
  const progressBar = document.querySelector(".progress-bar");  
  // progressBar.style.position = 'fixed';
  // progressBar.style.top = '0';
  // progressBar.style.left = '0';
  // progressBar.style.height = '4px';
  // progressBar.style.width = '0%';
  // progressBar.style.background = '#00ffcc';
  // progressBar.style.zIndex = '999999';
  // progressBar.style.transition = 'width 0.1s linear';

  document.body.appendChild(progressBar);

  window.addEventListener('scroll', () => {

    const distanceFromTop = window.scrollY - container.offsetTop;
    const totalScrollableHeight = container.offsetHeight - window.innerHeight;

    let scrollFraction = distanceFromTop / totalScrollableHeight;

    scrollFraction = Math.max(0, Math.min(1, scrollFraction));

    // Update video playback
    // if (video && video.duration) {
    //   video.currentTime = video.duration * scrollFraction;
    // }

    // Update progress bar
    progressBar.style.width = (scrollFraction * 100) + '%';

  });


  document.addEventListener("DOMContentLoaded", function () {  
    const pinnedSection = document.querySelector(".pinned-section");  
    const progressBar = document.querySelector(".progress-bar");  

    function checkVisibility() {
      const rect = pinnedSection.getBoundingClientRect();

      const completelyOut =
        rect.bottom <= 0 || rect.top >= window.innerHeight;

      if (completelyOut) {
        progressBar.classList.add("hidden");
      } else {
        progressBar.classList.remove("hidden");
      }
    }
    window.addEventListener("scroll", checkVisibility);
    window.addEventListener("resize", checkVisibility);
    checkVisibility();
  });

}

//Type Out effect
document.addEventListener("DOMContentLoaded", function () {
  const elements = document.querySelectorAll(".has-text-effect");
  elements.forEach(el => {
    const speed = parseInt(el.dataset.speed) || 35;
    const text = el.textContent.trim();
    el.textContent = "";
    el.classList.add("cursor-blink");
    let index = 0;

    function type() {
      if (index < text.length) {
        el.textContent += text.charAt(index);
        index++;
        setTimeout(type, speed);
      } else {
        // Remove cursor completely when finished
        el.classList.remove("cursor-blink");
        el.style.borderRight = "none";
      }
    }

    setTimeout(function(){
      type();
    },800);
    
  });
});
</script>
<?php wp_footer(); ?>
</body>
</html>
