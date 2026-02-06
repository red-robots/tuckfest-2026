<?php if( get_row_layout() == 'fullwidth_video' ) {
$video_thumbnail = get_sub_field('video_thumbnail');
$video_url = get_sub_field('video_url');
$video_type = get_sub_field('video_type');
$video_mp4_url = get_sub_field('mp4_url');
$has_video = false;
if($video_type=='embed') {
  $has_video = ($video_url) ? true : '';
} else {
  $has_video = ($video_mp4_url) ? true : '';
}

$repeatableClass = 'repeatable--'.get_row_layout().' repeatable--'.get_row_layout().$ctr;
if($video_thumbnail && $has_video) { ?>
<section data-group="<?php echo get_row_layout() ?>" class="repeatable <?php echo $repeatableClass ?>">
  <?php if ($video_type=='embed' && $video_url) { 
    $youtubeId = getYouTubeId($video_url);
    ?>
    <?php if (strpos($video_url, 'youtube.com') !== false) { ?>
    <div class="iframeVideo">
      <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/video-resizer.png" role="presentation" alt="" class="video-resizer">
      <img src="<?php echo $video_thumbnail['url'] ?>" alt="Video poster" class="video-poster" />
      <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $youtubeId ?>?autoplay=1&mute=1&controls=0&rel=0&loop=1&modestbranding=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </div>
    <?php } ?>
    
  <?php } else { ?>
    
    <?php if ($video_type=='mp4' && $video_mp4_url) { ?>
    <div class="videoContainer">
      <div class="video">
        <video autoplay muted loop playsinline poster="<?php echo $video_thumbnail['url'] ?>">
          <source src="<?php echo $video_mp4_url ?>" type="video/mp4">
          Your browser does not support the video tag.
        </video>
      </div>
      <img src="<?php echo $video_thumbnail['url'] ?>" alt="Video poster" class="video-placeholder" />
      <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/video-resizer.png" role="presentation" alt="" class="video-resizer">
    </div>
    <?php } ?>
  <?php } ?>

</section>
<?php } ?>
<?php } ?>