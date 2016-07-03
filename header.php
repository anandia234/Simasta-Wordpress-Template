<!DOCTYPE html>

<html lang="en">

<head>

<style>

    /* iMasta Color Scheme 1 */

    #header-top {

        background-color: <?php echo ot_get_option('imasta_color_scheme') ?>;

    }

    .page-bottom {

        background-color: <?php echo ot_get_option('imasta_color_scheme') ?>;

    }



    /* iMasta Color Scheme 2 */

    #header-top{

        border-bottom: 7px solid <?php echo ot_get_option('imasta_color_scheme_2') ?>;

    }   

    .column-b .widgettitle{

        border-top: 7px solid <?php echo ot_get_option('imasta_color_scheme_2') ?>;

    }

    .column-b .widgettitle span{

        color: <?php echo ot_get_option('imasta_color_scheme_2') ?>;

    }

    .more-link{

        color: <?php echo ot_get_option('imasta_color_scheme_2') ?>;

    }

    .entry-categories{

        color: <?php echo ot_get_option('imasta_color_scheme_2') ?>;

    }

    .widget .recent-comments li header a{

        color: <?php echo ot_get_option('imasta_color_scheme_2') ?>;

    }

    #back-top a{

        background: <?php echo ot_get_option('imasta_color_scheme_2') ?> url("<?php bloginfo('template_url');?>/images/background/back-top-bg.png") no-repeat scroll center center;    }

    .breadcrumb .current-page, .breadcrumb a{

        color: <?php echo ot_get_option('imasta_color_scheme_2') ?>;

    }

    .widget .other-categories li .entry-categories, .widget .other-categories li a:hover {

        color: <?php echo ot_get_option('imasta_color_scheme_2') ?>;

    }



    /* iMasta Color Scheme 3 */

    .column-a .widgettitle {

        background-color: <?php echo ot_get_option('imasta_color_scheme_3') ?>;

    }



/*     Logo Color

h1#logo-text {

    color: <?php echo ot_get_option('imasta_textcolorlogo') ?>;

}



Logo Description Color

#logo-description{

    color: <?php echo ot_get_option('imasta_description') ?>;

} */



    /* Font Logo */

    h1#logo-text {

        color: <?php echo ot_get_option('imasta_fontheader')['font-color']; ?>;

        font-family: <?php echo ot_get_option('imasta_fontheader')['font-family']; ?>;

        font-style: <?php echo ot_get_option('imasta_fontheader')['font-style']; ?>;

    }



    /* Font Description */

    #logo-description{

        color: <?php echo ot_get_option('imasta_fontheader')['font-color']; ?>;

        font-family: <?php echo ot_get_option('imasta_fontheader')['font-family']; ?>;

        font-style: <?php echo ot_get_option('imasta_fontheader')['font-style']; ?>;

    } 



    /* Font Post */



    p{

        color: <?php echo ot_get_option('imasta_fontgeneral')['font-color']; ?>;

        font-family: <?php echo ot_get_option('imasta_fontgeneral')['font-family']; ?>;

        font-size: <?php echo ot_get_option('imasta_fontgeneral')['font-size']; ?>;

        font-style: <?php echo ot_get_option('imasta_fontgeneral')['font-style']; ?>;

    }





</style>



    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

    <?php 

    if (is_search()) {

        ?>

        <meta name="robots" content="noindex, nofollow"/>

        <?php

    }



    if ( is_home() || is_front_page()) {

        if (ot_get_option('kode_verifikasi_google_webmaster_tools') != null) {?>

    <meta name="google-site-verification" content="<?php echo ot_get_option('kode_verifikasi_google_webmaster_tools'); ?>" />    

    <?php

        }

        if (ot_get_option('kode_verifikasi_bing_webmaster') != null) {?>

    <meta name="msvalidate.01" content="<?php echo ot_get_option('kode_verifikasi_bing_webmaster'); ?>" />

    <?php

        }

        if (ot_get_option('kode_verifikasi_pinterest') != null) {?>

    <meta name="p:domain_verify" content="<?php echo ot_get_option('kode_verifikasi_pinterest'); ?>" />

    <?php

        }

        if (ot_get_option('kode_verifikasi_alexa') != null) {?>

    <meta name="alexaVerifyID" content="<?php echo ot_get_option('kode_verifikasi_alexa'); ?>" />

    <?php

        }

        if (ot_get_option('imasta_all_seo_keywords') != null) {?>

    <meta name="keywords" content="<?php echo ot_get_option('imasta_all_seo_keywords'); ?>" />

    <?php

        }

    }

    ?>



    <title>

        <?php 

        if (function_exists('is_tag') && is_tag( )) {

            single_tag_title("Tag Archive for &quot;" ); echo "&quot; - ";

        }elseif (is_archive()) {

            wp_title(''); echo " Archive - ";

        }elseif (is_search()) {

            echo "Search for &quot;".wp_specialchars_decode($s).'&quot; - ';

        }elseif (!(is_404()) && (is_single()) || (is_page())) {

            wp_title(''); echo " - ";

        }elseif (is_404()) {

            echo "Not Found - ";

        }



        if (is_home()) {

            bloginfo('name'); echo " - "; bloginfo('description');

        }else{

            bloginfo('name');

        }



        if ($paged > 1) {

            echo " - page ". $paged;

        }

        ?>

    </title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="<?php bloginfo('description'); ?>">

    <meta name="author" content="<?php bloginfo('' ); ?>">

    <link href="<?php bloginfo('template_url');?>/css/reset.css" rel="stylesheet">

    <link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/prettyPhoto.css" type="text/css" media="screen" />

    <link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/flexslider.css" type="text/css" media="screen" />

    <link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/adipoli.css" type="text/css" media="screen" />

    <link href="<?php bloginfo('template_url');?>/style.css" rel="stylesheet">

    <link href="<?php bloginfo('template_url');?>/css/custom.css" rel="stylesheet">

    <link href="<?php bloginfo('template_url');?>/css/responsive.css" rel="stylesheet">



    <link href='http://fonts.googleapis.com/css?family=Coda:400,800' rel='stylesheet' type='text/css'>



    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->

    <!--[if IE 7]><link rel="stylesheet" href="css/ie7.css" type="text/css" media="all" /><![endif]-->

    <!--[if IE 8]><link rel="stylesheet" href="css/ie8.css" type="text/css" media="all" /><![endif]-->

<!--[if lt IE 9]>

    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>

    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>

    <link rel="stylesheet" href="css/ie.css" type="text/css" media="all" />

    <![endif]-->

    <!-- Le fav and touch icons -->



    <link rel="shortcut icon" href="<?php echo ot_get_option('imasta_favicon') ?>">

    <link rel="apple-touch-icon" href="<?php bloginfo('template_url');?>/img/apple-touch-icon.png">

    <link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo('template_url');?>/img/apple-touch-icon-72x72.png">

    <link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('template_url');?>/img/apple-touch-icon-114x114.png">







</head>

<body class="home-page">		

    <header id="header">

     <div id="header-top">

         <div class="wrapper">

             <nav id="main-nav" class="clearfix">

                 <ul id="main-menu" class="clearfix">

                     <!-- <li class=""><a href="<?php echo get_option('home' ); ?>">Home</a></li> -->

                    <?php    /**

                        * Displays a navigation menu

                        * @param array $args Arguments

                        */

                    $args = array(

                        'theme_location' => 'header-menu',

                        'menu' => 'Menu Header',

                        'container' => '',

                        'container_class' => '',

                        'container_id' => '',

                        'menu_class' => 'menu',

                        'menu_id' => '',

                        'echo' => true,

                        'fallback_cb' => 'wp_page_menu',

                        'before' => '',

                        'after' => '',

                        'link_before' => '',

                        'link_after' => '',

                        'items_wrap' => '<li id = "%1$s" class = "%2$s">%3$s</li>',

                        'depth' => 0,

                        'walker' => ''

                        );

                    
                    if (has_nav_menu('header-menu')) {
                        wp_nav_menu( $args ); 
                    }
                    ?>

                    </ul><!--main-menu-->

                </nav><!--main-nav-->

            </div><!--wrapper-->

        </div><!--header-top-->

        <div id="header-bottom">

         <div class="wrapper clearfix">

            <?php 

            if (ot_get_option('imasta_logo_actived') == 'yes') {?>

            <div id="logo-image">

                <a href="<?php echo get_option('home' ); ?>"><img class="responsive-img" src="http://oi67.tinypic.com/walq2v.jpg" alt="header-logo" /></a>

            </div>

            <?php

        }else{?>

        <hgroup>

        <a href="<?php echo get_option('home' ); ?>">

            <h1 id="logo-text"><?php echo get_bloginfo('name'); ?></h1>

            <div class="clearfix"></div>

            <h3 id="logo-description"><?php bloginfo('description'); ?></h3>

        </a>

        </hgroup>

        <?php

    }

    ?>



    <div id="top-banner">

        <?php echo ot_get_option('imasta_hdr_bnr'); ?>

    </div><!--top-banner-->        



</div><!--wrapper-->

</div><!--header-bottom-->

</header><!--header-->

<div class="wrapper clearfix">

	<div id="main-content">

     <div id="main-content-inner">

        <div class="main-content-top clearfix">

            <div class="breadcrumb clearfix">

                

                <!-- <span><?php print_r(ot_get_option('imasta_fontgeneral')); ?></span> -->

                <!-- <span><?php echo ot_get_option('imasta_fontgeneral')['font-color']; ?></span> -->

                <?php echo imasta_crumbs() ?>

            </div><!--breadcrumb-->

            <div id="search-social" class="clearfix">				 

                <ul class="social-links clearfix">

                    <?php 

                    if (ot_get_option('imasta_socialactived') == 'yes') {

                        if (ot_get_option('imasta_twitter') != null ) {?>

                        <li class="twitter-icon">

                            <a target="_blank" title="Twitter" class="twitter" href="<?php echo ot_get_option('imasta_twitter'); ?>"></a>

                        </li>

                        <?php

                    }



                    if (ot_get_option('imasta_fb') != null ) {?>

                    <li class="facebook-icon">

                        <a target="_blank" title="Facebook" class="facebook" href="<?php echo ot_get_option('imasta_fb'); ?>"></a>

                    </li>

                    <?php

                        }

                    }

                    ?>                                     

        </ul><!--end:social-links-->

        <div class="search-box clearfix">

            <form action="<?php bloginfo('siteurl' ); ?>" class="search-form" method="get">

                <input type="text" onBlur="if(this.value=='')this.value=this.defaultValue;" onFocus="if(this.value==this.defaultValue)this.value='';" value="Search" name="s" class="search-text">

                <button type="submit" class="search-submit">Submit</button>

            </form><!-- search-form -->

        </div><!--end:search-box-->	

    </div><!--search-social-->

            </div><!--main-content-top-->