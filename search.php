
<?php 
if (isset($_REQUEST['s'])) {
    $termstring = urldecode($_REQUEST['s']);
} else {
    $termstring = '';}

get_header(); ?>
<div class="main-content-bottom clearfix">
<?php if ( ot_get_option('imasta_sb_layout') == 'left-sidebar' ) : get_sidebar(); endif; ?>
    <div class="column-b">
        <section class="widget">
            <h3 class="widgettitle"><span>Search Result</span></h3>
            <div class="column-b-inner">
                <?php if (have_posts()) : while(have_posts()) : 
                the_post();
                $do_not_duplicate = $post->ID;
                $excerpt = get_the_excerpt(); 
                ?>
                    <article class="entry-item" id="post-<?php the_id(); ?>">
                <div class="column-b-left">
                        <header class="clearfix">
                            <a href="<?php the_permalink(); ?>">
                                <?php 
                                if (has_post_thumbnail( )) {
                                    imasta_featured_img();
                                }else{
                                    ?>
                                    <img src="<?php bloginfo('template_url');?>/placeholders/329x194/329x194-1.jpg" class="responsive-img hover-img" alt="" /></a>
                                    <?php
                                }
                                ?>
                                <p><strong><?php the_time('d') ?> /</strong><span><?php the_time('M'); ?> <?PHP the_time('Y' ); ?></span></p>
                                <a href="#" class="entry-comments"><?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;' ); ?></a>
                            </header>
                </div><!--column-b-left-->
                <div class="column-b-right">
                            <div class="entry-content">
                                <h6 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title( ); ?></a></h6>
                                <p>
                                    <?php 
                                    $article = substr($excerpt, 0, 400);
                                    $short = substr($article, 0, strrpos($article, " "));
                                    echo $short . "...";
                                    ?>
                                </p>
                                <a class="more-link" href="<?php the_permalink(); ?>"><?php echo ot_get_option('kata_read_more_teks') ?></a>
                            </div><!--entry-content-->
                </div><!--column-b-left-->
                <div class="clearfix"></div>
                <div>&nbsp;</div>
                        </article><!--entry-item-->
                    
                <?php endwhile; ?>
                <div class="clear"></div>
                <div class="divider"></div>
            </div><!--column-b-inner-->
            <center>
            <?php keren_navigation(); ?>                         
            </center>
        <?php else : $termstring = $s;
                if (ot_get_option('imasta_agcactived') == "yes") {?>
                <style type="text/css">
                .column-b-inner {
                    width:100%;
                    background:url("<?php bloginfo('template_url' ); ?>/images/background/line-1.gif") repeat-x;
                }
                </style>
                <?php
                    if ($s!='') {
                        $googleresults = perform_google_web_search($termstring);
                        if (is_array($googleresults))
                        {
                            foreach ($googleresults as $result) {
                                $link = urldecode(CleanFileNameBan(strip_tags($result['Oriurl'])));
                                print '<div class="box-post ktz-agc-search">';
                                print '<h2><a href="'.get_search_link(CleanFileNameBan(hilangkan_spesial_karakter($result['title']))).'">'.CleanFileNameBan(hilangkan_spesial_karakter($result['title'])).'</a></h2>';
                                print '<p>'.CleanFileNameBan(hilangkan_spesial_karakter($result['abstract'])).'</p>';
                                print '<p>Sumber: '.$result['Oriurl'].'</p>';
                                print '</div>';
                                echo "<div class='clearfix'></div><div>&nbsp;</div>";

                            }
                            keren_navigation();
                        }
                    } 
                } else {
                    echo "<h2>Not Found</h2>";
                } 
         ?>
         <center>

             <?php keren_navigation(); ?>

         </center>
        <?php endif; ?>
    </section><!--widget-->

</div><!--column-b-->
<?php if ( ot_get_option('imasta_sb_layout') == 'right-sidebar' ) : get_sidebar(); endif; ?>
<!-- <?php get_sidebar(); ?> -->
<div class="clear"></div>
</div><!--main-content-bottom-->

</div><!--main-content-inner-->
</div><!--main-content-->
</div><!--wrapper-->

<?php get_footer( ); ?>
