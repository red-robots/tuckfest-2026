<?php $foot_social = get_field('social_media_links','option');
if($foot_social) { ?>
<div class="socialMediaLinks">
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