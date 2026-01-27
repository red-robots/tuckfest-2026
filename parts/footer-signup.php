<?php 
$signup_form_html = get_field("signup_form_html","option");
if ($signup_form_html) { ?>
<!-- SUBSCRIBE FORM -->
<div class="signUpContainer">
  <span class="formText">Sign up for Tuck Fest updates</span>
  <?php echo $signup_form_html; ?>
</div>
<?php } ?>