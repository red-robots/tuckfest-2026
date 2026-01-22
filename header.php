<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Plus+Jakarta+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.1.0/swiper-bundle.css">
<?php if ( is_singular(array('post')) ) { 
global $post;
$post_id = $post->ID;
$thumbId = get_post_thumbnail_id($post_id); 
$featImg = wp_get_attachment_image_src($thumbId,'full'); ?>
<!-- SOCIAL MEDIA META TAGS -->
<meta property="og:site_name" content="<?php bloginfo('name'); ?>"/>
<meta property="og:url"		content="<?php echo get_permalink(); ?>" />
<meta property="og:type"	content="article" />
<meta property="og:title"	content="<?php echo get_the_title(); ?>" />
<meta property="og:description"	content="<?php echo (get_the_excerpt()) ? strip_tags(get_the_excerpt()):''; ?>" />
<?php if ($featImg) { ?>
<meta property="og:image"	content="<?php echo $featImg[0] ?>" />
<?php } ?>
<!-- end of SOCIAL MEDIA META TAGS -->
<?php } ?>
<script>
var siteURL = '<?php echo get_site_url();?>';
var currentURL = '<?php echo get_permalink();?>';
var params={};location.search.replace(/[?&]+([^=&]+)=([^&]*)/gi,function(s,k,v){params[k]=v});
</script>
<!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '236370623380911');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=236370623380911&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->
<script>!function(e,t,n,s,a,c,p,i,o,u){e[a]||((i=e[a]=function(){i.process?i.process.apply(i,arguments):i.queue.push(arguments)}).queue=[],i.pixelId="cbd42ac9-c947-41a0-a340-cc2163106c8c",i.t=1*new Date,(o=t.createElement(n)).async=1,o.src="https://found.ee/dmp/pixel.js?t="+864e5*Math.ceil(new Date/864e5),(u=t.getElementsByTagName(n)[0]).parentNode.insertBefore(o,u))}(window,document,"script",0,"foundee");foundee('', 'Y');</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
  <script src="https://unpkg.com/@studio-freight/lenis@1.0.33/dist/lenis.min.js"></script>

<?php wp_head(); ?>
</head>
<?php 
$extraClass = '';
if(is_page()) {
  $extraClass .= (get_field('header_image')) ? ' has-banner':' no-banner';
}

$brand_name = (get_field('brand_name','option')) ? get_field('brand_name','option') : get_bloginfo('name');
$brand_image = get_field('brand_image','option');
$brandStyle = ($brand_image) ? ' style="background-image:url('.$brand_image['url'].')"':'';
$landing_page_logo = get_field('landing_page_logo');
$landing_page_text = get_field('landing_page_text');
$is_landing_page = ( isTuckFestLandingPage() ) ? isTuckFestLandingPage() : false;
if($is_landing_page) { $extraClass .= ' is--landing--page'; ?>
<style>
	body {
		background-image: url('<?php echo $is_landing_page ?>');
		background-size: cover;
		background-position:center;
		background-repeat: no-repeat;
		background-attachment:fixed;
	}
	.banner-subpage,
	.site-footer,
	.entry-title {
		display: none!important;
	}
	#page.site {
		height:100vh;
		position:relative;
	}
	.landing-page-logo {
		width: 100%;
		display: flex;
		flex-wrap:wrap;
		flex-direction: column;
		align-items: center;
		justify-content: center;
		text-align: center;
		position: absolute;
		top: 50%;
		left: 0;
		transform: translatey(-50%);
	}
	.landing-page-logo img {
		width: 50vw;
		height: auto;
	}
	.landing-page-text .lp-text {
		font-family: "Work Sans", sans-serif;
		font-size: 35px;
		font-weight: 600;
		text-transform: uppercase;
		color: #FFF;
		letter-spacing: 0.05em;
		margin-top: 10px;
	}
	.lp-site-footer {
		position:absolute;
		bottom: 0;
		left: 0;
		width: 100%;
		z-index: 10;
		padding: 30px 5vw 50px;
	}
	.lp-site-footer #mc_embed_shell {
		margin: 0 auto!important;
	}
	.lp-site-footer #mc_embed_shell ::placeholder {
		font-family: "Work Sans", sans-serif;
		font-size: 14px;
		color: #969696;
	}
	.lp-site-footer #mc_embed_shell #mc_embed_signup_scroll {
		display: flex;
		align-items:center;
		justify-content:center;
	}
	.lp-site-footer #mc_embed_shell #mc_embed_signup_scroll input {
		border: none!important;
		appearance:none;
		height: 44px!important;
		padding: 5px 10px!important;
	}
	.lp-site-footer #mc_embed_shell #mc_embed_signup_scroll [type="submit"] {
		font-family: TuckfestHand;
		font-size: 12px;
		color: #000;
		padding: 5px 20px!important;
	}
	.lp-site-footer #mc_embed_shell input#mce-EMAIL {
		width: 235px;
	}
	.lp-flexwrap {
		display:flex;
		flex-wrap: wrap;
		justify-content: space-between;
		align-items: center;
		position: relative;
	}
	.lp-flexwrap .lp-block {
		width:33.3333%;
		display: flex;
    	align-items: center;
	}
	.lp-foot-logo {
		display:inline-flex;
		align-items:center;
	}
	.lp-foot-logo img {
		width:auto;
		height:35px;
	}
	.lp-block.lp-block-social {
		display: flex;
		flex-wrap: wrap;
		justify-content: flex-end;
		align-items: center;
		gap: .35rem;
	}
	.lp-block.lp-block-social a {
		display: inline-flex;
		justify-content: center;
		width: 28px;
		height: 30px;
		position: relative;
		transition: all ease .3s;
	}
	.lp-block.lp-block-social a:hover,
	.lp-block.lp-block-social a:focus {
		transform: translatey(-3px);
	}
	.lp-block.lp-block-social a img {
		width: 100%;
		height: 100%;
		display: inline-block;
		filter: brightness(0) invert(1);
		position:absolute;
		top: 0;
		left: 0;
		object-fit: contain;
		object-position:center;
		transform: scale(0.75);
	}
	.lp-block.lp-block-social a[aria-label="youtube"] img {
		transform: scale(1);
	}
	.lp-block.lp-block-social a[aria-label="youtube"] {
		left: 5px;
	}
	.lp-block.lp-block-form {
		position:relative;
	}
	.lp-block.lp-block-form .dashes {
		display:inline-flex;
		justify-content:center;
		gap: .45rem;
		width: 100px;
		height: 12px;
		position:absolute;
		top: 50%;
    	transform: translateY(-50%);
		pointer-events:none;
	}
	.lp-block.lp-block-form .dashes.dash-left {
		left: -8vw;
	}
	.lp-block.lp-block-form .dashes.dash-right {
		right: -13vw;
	}
	.lp-block.lp-block-form .dashes i {
		display: inline-block;
		width: 3px;
		height: 100%;
		background: #feff00;
		transform: skewX(-20deg);
	}
	@media screen and (max-width:1024px) {
		/*
		.lp-flexwrap .lp-block {
			width: 100%;
			display: flex;
			flex-wrap: wrap;
			align-items: center;
			flex-direction: column;
			margin: 25px 0;
		}
		*/
		
		.lp-flexwrap .lp-block.lp-block-form {
			width: 100%;
			position: absolute;
			top: -65px;
		}
		
		.lp-flexwrap .lp-block.lp-block-social {
			flex-wrap: unset;
			flex-direction: row;
			justify-content: center;
			margin-top: 40px;
		}
		.lp-block.lp-block-form .dashes {
			transform: none;
			width: 100%;
		}
		.lp-block.lp-block-form .dashes.dash-left {
			left: 0;
			top: -38px;
		}
		.lp-block.lp-block-form .dashes.dash-right {
			right: 0;
			top: unset;
			bottom: -40px;
		}
		.lp-site-footer {
			padding-bottom: 10px;
		}
		.lp-site-footer #mc_embed_shell #mc_embed_signup_scroll [type="submit"] {
			padding-left: 10px!important;
			padding-right: 10px!important;
		}
		.landing-page-logo img {
			width: 70vw;
		}
	}
	@media screen and (max-width:768px) {
		.landing-page-text .lp-text {
			font-size: 20px!important;
			letter-spacing: 0.2em!important;
		}
		.lp-foot-logo img {
			width:160px;
			height:auto;
		}
		.lp-flexwrap .lp-block.lp-block-social {
			margin-top: 0;
		}
		.lp-block.lp-block-form .dashes.dash-left {
			display:none;
		}
		.lp-site-footer {
			padding-bottom: 25px;
		}
		.lp-block.lp-block-form .dashes.dash-right {
			right: -6vw;
			bottom: -58px;
		}
		.lp-flexwrap .lp-block.lp-block-form {
			top: -80px;
		}
	}
	@media screen and (max-width:480px) {
		.landing-page-text .lp-text {
			font-size: 18px!important;
		}
		.lp-block.lp-block-form .dashes.dash-right {
			right: -6vw;
		}
		.lp-site-footer #mc_embed_shell input#mce-EMAIL {
			width: 240px;
		}
	}
</style>	
<?php } ?>
<body <?php body_class($extraClass);?>>
<div id="page" class="site cf">
	<div id="overlay"></div>
	<a class="skip-link sr" href="#content"><?php esc_html_e( 'Skip to content', 'bellaworks' ); ?></a>
    
	<?php if($is_landing_page) { ?>
		<?php if($landing_page_logo || $landing_page_text) { ?>
	    <div class="landing-page-logo">
			<?php if($landing_page_logo) { ?>
		   	<img src="<?php echo $landing_page_logo?>" alt="" class="lp-logo" />
			<?php } ?>
			<?php if($landing_page_text) { ?>
			<div class="landing-page-text">
			   <div class="lp-text"><?php echo $landing_page_text?></div>
			</div>
			<?php } ?>
	    </div>
	    <?php } ?>
	<?php } else { ?>
	<header id="masthead" class="site-header" role="banner">
		<div class="wrapper wide">
      <div class="burger"><span></span></div>
      <div class="flexwrap">

        <?php //if ( !is_front_page() && !is_home() ) { ?>
          <div class="logo">
            <a href="<?php echo get_site_url() ?>" class="site-logo">
              <img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="TuckFest">
            </a> 
          </div>
        <?php //} ?>
  			
        <a class="mobile-menu" id="menutoggle" href="javascript:void(0)"><span class="bar"></span><i>Menu</i></a>

        <?php if ( has_nav_menu( 'primary' ) ||  $topNavs ) { ?>
        <div id="site-navigation">

          <?php if ( has_nav_menu( 'primary' ) ) { ?>
    			<nav id="navigation" class="main-navigation animated fadeIn" role="navigation">
            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'container'=>false, 'menu_id' => 'primary-menu','link_before'=>'<span>','link_after'=>'</span>') ); ?>
          </nav>

          <nav class="mobilemenu">
            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu-mobile','link_before'=>'<span>','link_after'=>'</span>','container'=>false) ); ?>
          </nav>

          <?php } ?>

          <span id="closeMobileNav"></span>
        </div>
        <?php } ?>
      
  		</div>
    </div>	
    <div id="subNavs"><div id="subnavdata" class=""></div></div>
	</header>

	<?php get_template_part('parts/hero'); ?>

  <?php 
  $id = array();
  $ID = 0;
  if(27 == $post->post_parent ) { // About
    $id[] = 'has parent';
  } elseif(32 == $post->post_parent ) { // Music
    $id[] = 'has parent';
  } elseif(21 == $post->post_parent ) { // buy
    $id[] = 'has parent';
  }
  // echo '<pre>';
  // print_r($id);
  // echo '</pre>';
  if( $id != '') {
    if ( is_page() && $post->post_parent ) {
      $ID = wp_get_post_parent_id($ID);
      // Get Child pages
      $pageArgs = array(
        'child_of' => $ID,
        'title_li' => ''
      );

      if( $post->post_parent )  { ?>
      <!-- <div class="drops-wrap">
        <div class="drops">
          <div class="select">
            <div class="select-styled blue"><?php the_title(); ?></div>
            <ul class="select-options blue">
              <?php wp_list_pages($pageArgs); ?>
            </ul>
          </div>
        </div>
      </div> -->
      <?php } ?>
    <?php } ?>

  <?php } ?>
    
 <?php } /* end of $is_landing_page */ ?>
	
	<div id="content" class="site-content">
