<?php
/**
 * Template Name: Artists
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bellaworks
 */
get_header(); 

$comingSoon = get_field('coming_soon');
$soon = ( isset($comingSoon[0]) ) ? $comingSoon[0] : '';

?>

<?php get_template_part('parts/hero-subpage'); ?>
<div id="primary" class="content-area default-template">
	<main id="main" class="site-main">
		<?php while ( have_posts() ) : the_post(); ?>
      <?php if($soon == 'soon') : 
              get_template_part('inc/coming-soon'); 
            else: ?>
      <section class="entry-content ">
        <header class="entry-title ">
          <h1><?php the_title(); ?></h1>
        </header>

        <div class="wrapper">
        	<div class="spotify-wrap">
            
        		  
        		  <?php echo do_shortcode('[feeds post="music"  perpage="-1"  filter="music_day"]'); ?>
              <?php the_content(); ?>
            
        	</div>
          
        </div>
      </section>
      <?php endif; ?>
      <?php //} ?>
		<?php endwhile; ?>

    <?php 
    $past_lineups_title = get_field('past_lineups_title');
    $past_lineups = get_field('past_lineups');
    if($past_lineups_title || $past_lineups) { ?>  
    <section class="entry-content ">
        <?php //include( locate_template('parts/mc-signup.php') ); ?>
        <?php if($past_lineups_title) { ?>  
        <header class="entry-title ">
          <h1><?php echo $past_lineups_title; ?></h1>
        </header>
        <?php } ?>
        <?php if($past_lineups) { ?>  
        <div class="wrapper">
          <div class="accordion-lineups">
            <?php echo $past_lineups; ?>
          </div>
        </div>
        <?php } ?>
    </section>
    <?php } ?>
	</main>
</div>
<script>
document.addEventListener("DOMContentLoaded", function () {
  const accordionHeaders = document.querySelectorAll("h2");
  if( accordionHeaders.length ) {
    accordionHeaders.forEach((header, index) => {
      const content = header.nextElementSibling;
      if (!content) return;

      // Create wrapper
      const wrapper = document.createElement("div");
      wrapper.className = "accordion-item";

      header.parentNode.insertBefore(wrapper, header);
      wrapper.appendChild(header);
      wrapper.appendChild(content);

      // Setup ARIA
      const contentId = "accordion-content-" + index;
      content.id = contentId;

      header.setAttribute("role", "button");
      header.setAttribute("aria-expanded", "false");
      header.setAttribute("aria-controls", contentId);
      header.setAttribute("tabindex", "0");

      content.classList.add("accordion-content");

      function closeAll() {
        document.querySelectorAll(".accordion-content").forEach(item => {
          item.style.maxHeight = null;
          item.classList.remove("active");
        });

        document.querySelectorAll("h2[aria-expanded]").forEach(h => {
          h.setAttribute("aria-expanded", "false");
        });
      }

      function toggle() {
        const isOpen = header.getAttribute("aria-expanded") === "true";

        closeAll();

        if (!isOpen) {
          content.classList.add("active");
          content.style.maxHeight = content.scrollHeight + "px";
          header.setAttribute("aria-expanded", "true");
        }
      }

      header.addEventListener("click", toggle);

      // Keyboard accessibility (Enter + Space)
      header.addEventListener("keydown", function (e) {
        if (e.key === "Enter" || e.key === " ") {
          e.preventDefault();
          toggle();
        }
      });
    });
  }
});
</script>
<?php get_footer(); ?>

