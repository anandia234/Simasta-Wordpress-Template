<div class="page-bottom">
	<div class="wrapper">
        <section class="bottom-sidebar">
            <?php if (ot_get_option('imasta_ft_layout') == 'four-footers') {?>
            <div class="one-forth">
               <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Widget Bawah 1' )) : else : ?>

               <?php endif; ?>
           </div><!--one-forth-->
           <div class="one-forth">
               <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Widget Bawah 2' )) : else : ?>

               <?php endif; ?>
           </div><!--one-forth-->
           <div class="one-forth">
            <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Widget Bawah 3' )) : else : ?>

            <?php endif; ?>
        </div><!--one-forth-->
        <div class="one-forth last">
            <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Widget Bawah 4' )) : else : ?>

            <?php endif; ?>
        </div><!--one-forth-->
        <div class="clear"></div>
        <?php
        }else{?>
            <div class="one-third">
             <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Widget Bawah 1' )) : else : ?>

             <?php endif; ?>
         </div><!--one-third-->
         <div class="one-third">
             <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Widget Bawah 2' )) : else : ?>

             <?php endif; ?>
         </div><!--one-third-->
        <div class="one-third last">
            <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Widget Bawah 4' )) : else : ?>

            <?php endif; ?>
        </div><!--one-third-->
        <div class="clear"></div>
        <?php
        } ?>

</section><!--bottom-sidebar-->        
<footer id="footer" class="clearfix">
    <p id="copyrights"><?php echo ot_get_option('imasta_footcredits'); ?></p>
    <nav id="bottom-nav">
        <ul class="bottom-menu clearfix">
         <?php    /**
            * Displays a navigation menu
            * @param array $args Arguments
            */
        $args = array(

            'theme_location' => 'footer-menu',

            'menu' => 'Menu Footer',

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
        
        </ul>
    </nav><!--bottom-nav-->
</footer><!--footer-->
</div><!--wrapper-->
<p id="back-top">
    <a href="#top">Back to Top</a>
</p>
</div><!--page-bottom-->
<style type="text/css">

    /* Sidebar Style */
    <?php 
    if ( ot_get_option('imasta_sb_layout') == 'left-sidebar' ){?>
        .main-content-bottom {
            background:url("<?php bloginfo('template_url' ); ?>/images/background/line-1.gif") repeat-y 380px 0;
        }
        @media only screen and (min-width: 980px) and (max-width: 1145px) {
            .main-content-bottom {
                background: url("<?php bloginfo('template_url' ); ?>/images/background/line-1.gif") repeat-y scroll 33.333333% 0 transparent;
            }
        }
        @media only screen and (min-width: 768px) and (max-width: 979px) {
            .main-content-bottom {
                background: url("<?php bloginfo('template_url' ); ?>/images/background/line-1.gif") repeat-y scroll 33.333333% 0 transparent;
            }
        }
        @media only screen and (min-width: 480px) and (max-width: 767px) {
            .main-content-bottom {
                background: url("<?php bloginfo('template_url' ); ?>/images/background/line-1.gif") repeat-y scroll 0 0 transparent;
            }
        }
        @media only screen and (max-width: 479px) {
            .main-content-bottom {
                background: url("<?php bloginfo('template_url' ); ?>/images/background/line-1.gif") repeat-y scroll 0 0 transparent;
            }
        }
        <?php
    }
    ?>
</style>
<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/jquery.tweet.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/jflickrfeed.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/jquery.flexslider.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/modernizr.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/jquery.carouFredSel-5.6.4.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/jquery.form.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/jquery.adipoli.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/custom.js" charset="utf-8"></script>

</body>
</html>