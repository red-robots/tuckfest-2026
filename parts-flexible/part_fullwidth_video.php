<?php if( get_row_layout() == 'fullwidth_video' ) {
$video_thumbnail = get_sub_field('video_thumbnail');
$video_url = get_sub_field('video_url');
$repeatableClass = 'repeatable--'.get_row_layout().' repeatable--'.get_row_layout().$ctr;
if($video_thumbnail && $video_url) { ?>
<section data-group="<?php echo get_row_layout() ?>" class="repeatable <?php echo $repeatableClass ?>">
  <a href="<?php echo $video_url ?>" data-width="100%" data-height="100%" class="video-fancybox">
    <img src="<?php echo $video_thumbnail['url'] ?>" alt="Video poster" />
    <span class="play"></span>
  </a>
</section>
<?php } ?>
<?php } ?>