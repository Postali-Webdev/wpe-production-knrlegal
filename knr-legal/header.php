<?php
/**
 * Theme header.
 *
 * @package KNR Legal
 * @author Postali LLC
**/

if (is_tree('19502')) { 
    $location = 'akron';
    $location_url = "/akron/";
} elseif (is_tree('12402')) { 
    $location = 'beachwood';
    $location_url = "/beachwood/";
} elseif (is_tree('12400')) {
    $location = 'canton';
    $location_url = "/canton/";
} elseif (is_tree('12392')) {
    $location = 'cincinnati';
    $location_url = "/cincinnati/";
} elseif (is_tree('12388')) {
    $location = 'cleveland';
    $location_url = "/cleveland/";
} elseif (is_tree('12390')) {
    $location = 'columbus';
    $location_url = "/columbus/";
} elseif (is_tree('12394')) {
    $location = 'dayton';
    $location_url = "/dayton/";
} elseif (is_tree('12405')) {
    $location = 'independence';
    $location_url = "/independence/";
} elseif (is_tree('12396')) {
    $location = 'toledo';
    $location_url = "/toledo/";
} elseif (is_tree('12473')) {
    $location = 'westlake';
    $location_url = "/westlake/";
} elseif (is_tree('12398')) {
    $location = 'youngstown';
    $location_url = "/youngstown/";
} else {
    $location = 'global';
    $location_url="/";
} 

$_SESSION['office_location'] = $location;

?>

<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>

<link href="https://www.googletagmanager.com/gtag/js?id=G-2S6DKC53M1&cx=c&gtm=4e5ao1" rel="preload" as="script">
<link rel="dns-prefetch" href="https://www.googletagmanager.com/" >

<!--viewport -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="canonical" href="https://www.knrlegal.com<?php echo $_SERVER['REQUEST_URI']; ?>"/>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;700;900&display=swap" rel="stylesheet"> 

<?php if (is_page('12383')) { ?>
<?php $GLOBALS['banner_img'] = get_field('hero_background_image') . '.webp'; ?>
<link rel="preload" as="image" href="<?php echo $GLOBALS['banner_img']; ?>" fetchpriority="high">
<?php } ?>

<!-- WebLift Tracking Pixel -->
<img src="https://sync.extend.tv/conv/?pixel_tag=140" alt="" style="display:none">
<!-- WebLift Match Pixel -->
<?php if(is_page('12383','13628','13716','14254','14183','12388','14846','14878')) { ?>
<iframe src="//pd.trysera.com/p/14871727037319479322" style="width:1px;height:1px;border:0;display:block;" frameborder="0" scrolling="no"></iframe>
<?php } ?>
<!-- WebLift supression Pixel -->
<?php if(is_page('12383','13628','13716','14254','14183')) { ?>
<img src="//pd.trysera.com/c/14871727037319479322" style="width:1px;height:1px;border:0;display:block;" /><?php } ?>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TLCFPN');</script>
<!-- End Google Tag Manager -->

<!-- Add JSON Schema here -->
<?php if (is_tree('19502')) { 
    if( have_rows('akron_details','options') ):
    while( have_rows('akron_details','options') ): the_row(); 
        $local_schema = get_sub_field('local_schema','options');
        $review_schema = get_sub_field('review_schema','options');
        echo '<script type="application/ld+json">' . $local_schema . '</script>';
        echo '<script type="application/ld+json">' . $review_schema . '</script>';
    endwhile;
    endif;
} elseif (is_tree('12402')) { 
    if( have_rows('beachwood_details','options') ):
    while( have_rows('beachwood_details','options') ): the_row(); 
        $local_schema = get_sub_field('local_schema','options');
        $review_schema = get_sub_field('review_schema','options');
        echo '<script type="application/ld+json">' . $local_schema . '</script>';
        echo '<script type="application/ld+json">' . $review_schema . '</script>';
    endwhile;
    endif;
} elseif (is_tree('12400')) {
    if( have_rows('canton_details','options') ):
    while( have_rows('canton_details','options') ): the_row(); 
        $local_schema = get_sub_field('local_schema','options');
        $review_schema = get_sub_field('review_schema','options');
        echo '<script type="application/ld+json">' . $local_schema . '</script>';
        echo '<script type="application/ld+json">' . $review_schema . '</script>';
    endwhile;
    endif;
} elseif (is_tree('12392')) {
    if( have_rows('cincinnati_details','options') ):
    while( have_rows('cincinnati_details','options') ): the_row(); 
        $local_schema = get_sub_field('local_schema','options');
        $review_schema = get_sub_field('review_schema','options');
        echo '<script type="application/ld+json">' . $local_schema . '</script>';
        echo '<script type="application/ld+json">' . $review_schema . '</script>';
    endwhile;
    endif;
} elseif (is_tree('12388')) {
    if( have_rows('cleveland_details','options') ):
    while( have_rows('cleveland_details','options') ): the_row(); 
        $local_schema = get_sub_field('local_schema','options');
        $review_schema = get_sub_field('review_schema','options');
        echo '<script type="application/ld+json">' . $local_schema . '</script>';
        echo '<script type="application/ld+json">' . $review_schema . '</script>'; 
    endwhile;
    endif;
} elseif (is_tree('12390')) {
    if( have_rows('columbus_details','options') ):
    while( have_rows('columbus_details','options') ): the_row(); 
        $local_schema = get_sub_field('local_schema','options');
        $review_schema = get_sub_field('review_schema','options');
        echo '<script type="application/ld+json">' . $local_schema . '</script>';
        echo '<script type="application/ld+json">' . $review_schema . '</script>';
    endwhile;
    endif;
} elseif (is_tree('12394')) {
    if( have_rows('dayton_details','options') ):
    while( have_rows('dayton_details','options') ): the_row(); 
        $local_schema = get_sub_field('local_schema','options');
        $review_schema = get_sub_field('review_schema','options');
        echo '<script type="application/ld+json">' . $local_schema . '</script>';
        echo '<script type="application/ld+json">' . $review_schema . '</script>';
    endwhile;
    endif;
} elseif (is_tree('12405')) {
    if( have_rows('independence_details','options') ):
    while( have_rows('independence_details','options') ): the_row(); 
        $local_schema = get_sub_field('local_schema','options');
        $review_schema = get_sub_field('review_schema','options');
        echo '<script type="application/ld+json">' . $local_schema . '</script>';
        echo '<script type="application/ld+json">' . $review_schema . '</script>';
    endwhile;
    endif;
} elseif (is_tree('12396')) {
    if( have_rows('toledo_details','options') ):
    while( have_rows('toledo_details','options') ): the_row(); 
        $local_schema = get_sub_field('local_schema','options');
        $review_schema = get_sub_field('review_schema','options');
        echo '<script type="application/ld+json">' . $local_schema . '</script>';
        echo '<script type="application/ld+json">' . $review_schema . '</script>';
    endwhile;
    endif;
} elseif (is_tree('12398')) {
    if( have_rows('youngstown_details','options') ):
    while( have_rows('youngstown_details','options') ): the_row(); 
        $local_schema = get_sub_field('local_schema','options');
        $review_schema = get_sub_field('review_schema','options');
        echo '<script type="application/ld+json">' . $local_schema . '</script>';
        echo '<script type="application/ld+json">' . $review_schema . '</script>';
    endwhile;
    endif;
} elseif (is_tree('12473')) { //westlake address 
    if( have_rows('westlake_details','options') ):
    while( have_rows('westlake_details','options') ): the_row(); 
        $local_schema = get_sub_field('local_schema','options');
        $review_schema = get_sub_field('review_schema','options');
        echo '<script type="application/ld+json">' . $local_schema . '</script>';
        echo '<script type="application/ld+json">' . $review_schema . '</script>';
    endwhile;
    endif;
} else {
    // Global Schema
    $global_schema = get_field('global_schema','options');
    if ( !empty($global_schema) ) :
        echo '<script type="application/ld+json">' . $global_schema . '</script>';
    endif;
    // review Schema
    $review_schema = get_field('review_schema','options');
    if ( !empty($review_schema) ) :
        echo '<script type="application/ld+json">' . $review_schema . '</script>';
    endif;
}?>

<!-- Single Page Schema -->
<?php 
    $single_schema = get_field('single_schema');
    if ( !empty($single_schema) ) {
        echo '<script type="application/ld+json">' . $single_schema . '</script>';
    }
?>

<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TLCFPN"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

	<header>
        <div id="header-top" class="container">
			<div id="header-top_left">      
                <a href="/" class="custom-logo-link" rel="home"><img src="/wp-content/uploads/2022/08/KNR_Logo.svg" class="custom-logo" alt="Kisling, Nestico &amp; Redick logo"></a>
			</div>
			
			<div id="header-top_right">
				<div id="header-top_menu">
                    <?php
                        $args = array( 'container' => false, 'theme_location' => 'main-nav-about' );
                        wp_nav_menu( $args );
                    ?>	
                    <?php
                        $args = array( 'container' => false, 'theme_location' => 'main-nav-' . $location . '-practice', );
                        wp_nav_menu( $args );
                    ?>
                    <?php
                        $args = array( 'container' => false, 'theme_location' => 'main-nav-results-locations-resources' );
                        wp_nav_menu( $args );
                    ?>	

                    <ul id="menu-main-nav-contact" class="menu">
                        <li class="main-nav-contact menu-item menu-item-type-custom">
                            <a href="<?php if ($location <> 'global') { ?>/<?php echo $location; ?><?php } ?>/contact/">Contact</a>
                        </li>
                    </ul>

                    <form class="navbar-form-search" role="search" method="get" action="/">
                        <div class="search-form-container hdn" id="search-input-container">
                            <div class="search-input-group">
                                <div class="form-group">
                                <input type="text" name="s" placeholder="Start typing..." id="search-input-5cab7fd94d469" value="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-search" id="search-button"><span class="icon-search-icon" aria-hidden="true"></span></button>
                        <button type="button" class="btn btn-search-close hdn" id="hide-search-input-container"><span class="icon-icon-close" aria-hidden="true"></span></button>
                    </form>	

                    <div class="search-background"></div>

                    <div id="header-utility-mobile">
                        <div class="container">
                            <div class="columns">
                                <div class="column-25 utility-left">
                                    <?if  ( $location <> 'global' ) { ?>
                                        <a href="/" title="Back to Main Site"><span class="icon-arrow-left"></span> Go to Main Site </a>
                                    <?php } ?>
                                </div>
                                <div class="column-75 utility-right">
                                    <?php
                                        $args = array( 'container' => false, 'theme_location' => 'header-nav-utility' );
                                        wp_nav_menu( $args );
                                    ?>
                                    <?php
                                        $args = array( 'container' => false, 'theme_location' => 'social-media-menu' );
                                        wp_nav_menu( $args );
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

				</div>

                <div id="header-top_mobile">
                    <div id="menu-icon" class="toggle-nav">
                        <span class="line line-1"></span>
                        <span class="line line-2"></span>
                        <span class="line line-3"></span>
                    </div>
                </div>
			</div>
            
		</div>
	</header>
    <?php if( !is_front_page() ) : 
        $review_banner = get_field('global_banner', 'options');
        $review_banner_badge = $review_banner['review_badge'];
        $enable_global_banner = $review_banner['enable_global_banner'];
        $review_banner_link = $review_banner['notice_banner_link'];
        if( $enable_global_banner ) : ?>
            <div class="review-banner">
                <p class="banner-text"><?php esc_html_e($review_banner['copy']); ?> 
                    <?php if( $review_banner_link ) : ?> <a href="<?php echo $review_banner_link['url']; ?>"><?php echo $review_banner_link['title']; ?></a> <?php endif; ?>
                </p>
            </div>
        <?php endif;
    endif; ?>

    <div class="desktop-left-contact">
        <span class="sidebar-name">Kisling, Nestico & Redick, LLC</span>
        <span class="sidebar-call">Hurt in a Car? Call KNR.</span>
    </div>

    <a href="tel:<?php the_field('global_phone','options'); ?>" class="call-follower">
        <div class="icon"><span class="icon-phone-icon"></span></div>
        <div class="number"><?php the_field('global_phone','options'); ?></div>
    </a>


<?php if ($location == 'akron') { ?>
    
    <?php if( have_rows('akron_details', 'options') ):
    while( have_rows('akron_details', 'options') ): the_row();

        $phone = get_sub_field('location_phone_number'); ?>
        <a href="tel:<?php echo $phone ?>" class="call-follower">
            <div class="icon"><span class="icon-phone-icon"></span></div>
            <div class="number"><?php echo $phone ?></div>
        </a>

    <?php endwhile; endif; ?>

<?php } ?>
<?php if ($location == 'beachwood') { ?>
    
    <?php if( have_rows('beachwood_details', 'options') ):
    while( have_rows('beachwood_details', 'options') ): the_row();

        $phone = get_sub_field('location_phone_number'); ?>
        <a href="tel:<?php echo $phone ?>" class="call-follower">
            <div class="icon"><span class="icon-phone-icon"></span></div>
            <div class="number"><?php echo $phone ?></div>
        </a>

    <?php endwhile; endif; ?>

<?php } ?>
<?php if ($location == 'canton') { ?>
    
    <?php if( have_rows('canton_details', 'options') ):
    while( have_rows('canton_details', 'options') ): the_row();

        $phone = get_sub_field('location_phone_number'); ?>
        <a href="tel:<?php echo $phone ?>" class="call-follower">
            <div class="icon"><span class="icon-phone-icon"></span></div>
            <div class="number"><?php echo $phone ?></div>
        </a>

    <?php endwhile; endif; ?>

<?php } ?>
<?php if ($location == 'cincinnati') { ?>
    
    <?php if( have_rows('cincinnati_details', 'options') ):
    while( have_rows('cincinnati_details', 'options') ): the_row();

        $phone = get_sub_field('location_phone_number'); ?>
        <a href="tel:<?php echo $phone ?>" class="call-follower">
            <div class="icon"><span class="icon-phone-icon"></span></div>
            <div class="number"><?php echo $phone ?></div>
        </a>

    <?php endwhile; endif; ?>

<?php } ?>
<?php if ($location == 'cleveland') { ?>
    
    <?php if( have_rows('cleveland_details', 'options') ):
    while( have_rows('cleveland_details', 'options') ): the_row();

        $phone = get_sub_field('location_phone_number'); ?>
        <a href="tel:<?php echo $phone ?>" class="call-follower">
            <div class="icon"><span class="icon-phone-icon"></span></div>
            <div class="number"><?php echo $phone ?></div>
        </a>

    <?php endwhile; endif; ?>

<?php } ?>
<?php if ($location == 'columbus') { ?>
    
    <?php if( have_rows('columbus_details', 'options') ):
    while( have_rows('columbus_details', 'options') ): the_row();

        $phone = get_sub_field('location_phone_number'); ?>
        <a href="tel:<?php echo $phone ?>" class="call-follower">
            <div class="icon"><span class="icon-phone-icon"></span></div>
            <div class="number"><?php echo $phone ?></div>
        </a>

    <?php endwhile; endif; ?>

<?php } ?>
<?php if ($location == 'dayton') { ?>
    
    <?php if( have_rows('dayton_details', 'options') ):
    while( have_rows('dayton_details', 'options') ): the_row();

        $phone = get_sub_field('location_phone_number'); ?>
        <a href="tel:<?php echo $phone ?>" class="call-follower">
            <div class="icon"><span class="icon-phone-icon"></span></div>
            <div class="number"><?php echo $phone ?></div>
        </a>

    <?php endwhile; endif; ?>

<?php } ?>
<?php if ($location == 'independence') { ?>
    
    <?php if( have_rows('independence_details', 'options') ):
    while( have_rows('independence_details', 'options') ): the_row();

        $phone = get_sub_field('location_phone_number'); ?>
        <a href="tel:<?php echo $phone ?>" class="call-follower">
            <div class="icon"><span class="icon-phone-icon"></span></div>
            <div class="number"><?php echo $phone ?></div>
        </a>

    <?php endwhile; endif; ?>

<?php } ?>
<?php if ($location == 'toledo') { ?>
    
    <?php if( have_rows('toledo_details', 'options') ):
    while( have_rows('toledo_details', 'options') ): the_row();

        $phone = get_sub_field('location_phone_number'); ?>
        <a href="tel:<?php echo $phone ?>" class="call-follower">
            <div class="icon"><span class="icon-phone-icon"></span></div>
            <div class="number"><?php echo $phone ?></div>
        </a>

    <?php endwhile; endif; ?>

<?php } ?>
<?php if ($location == 'westlake') { ?>

    <?php if( have_rows('westlake_details', 'options') ):
    while( have_rows('westlake_details', 'options') ): the_row();

        $phone = get_sub_field('location_phone_number'); ?>
        <a href="tel:<?php echo $phone ?>" class="call-follower">
            <div class="icon"><span class="icon-phone-icon"></span></div>
            <div class="number"><?php echo $phone ?></div>
        </a>

    <?php endwhile; endif; ?>

<?php } ?>
<?php if ($location == 'youngstown') { ?>

    <?php if( have_rows('youngstown_details', 'options') ):
    while( have_rows('youngstown_details', 'options') ): the_row();

        $phone = get_sub_field('location_phone_number'); ?>
        <a href="tel:<?php echo $phone ?>" class="call-follower">
            <div class="icon"><span class="icon-phone-icon"></span></div>
            <div class="number"><?php echo $phone ?></div>
        </a>

    <?php endwhile; endif; ?>

<?php } ?>
<?php if ($location == 'global') { ?>

    <a href="tel:<?php the_field('global_phone','options'); ?>" class="call-follower">
        <div class="icon"><span class="icon-phone-icon"></span></div>
        <div class="number"><?php the_field('global_phone','options'); ?></div>
    </a>

<?php } ?>


<a class="anniversary-tout" href="/about-us/#video">
    <img src="/wp-content/uploads/2025/02/knr-20-logo_v2.png" alt="KNR 20th Anniversary logo">
</a>
<div class="anniversary-tout-spacer"></div>