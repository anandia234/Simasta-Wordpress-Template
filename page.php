<?php get_header( ); ?>
            <div class="main-content-bottom clearfix">
            <?php if ( ot_get_option('imasta_sb_layout') == 'left-sidebar' ) : get_sidebar(); endif; ?>
                <div class="column-b">
                <?php if(have_posts()) : the_post(); ?>
                    <section class="entry-box">
                        <header class="clearfix">
                            <span class="entry-meta">Update:&nbsp;</span>
                            <span class="entry-date"><?php the_time('M d, Y' ); ?></span>
                            <span class="entry-meta">&nbsp;&nbsp;I&nbsp;&nbsp;&nbsp;By:&nbsp;</span>
                            <a class="entry-author" href="#"><?php the_author( ); ?></a>
                            <div class="entry-comments"><?php comments_popup_link('0', '1', '%' ); ?><span>&nbsp;</span></div>

                        </header>
                        <div class="entry-content clearfix">
                            <a href="<?php the_permalink(); ?>"><h3 class="entry-title"><?php the_title( ); ?></h3></a>
                            <?php the_post_thumbnail( ); ?>
                            <?php the_content(); ?>
                        </div><!--entry-content-->

                        <div class="kopa-tag-box">
                        <?php the_tags( ); ?>
                        
                        </div><!--kopa-tag-->
                    </section><!--entry-box-->
                
                    <article class="about-author clearfix">
                        <img src="placeholders/avatar/author.jpg" alt="" class="kopa-border-1 author-avatar" />
                        <h3>About the author</h3>
                        <a href="<?php the_author_link() ?>"><?php the_author( ); ?></a>
                        <?php the_author_description() ?>
                        <ul class="clearfix about-social-link">
                            <li class="facebook-icon">
                                <a target="_blank" title="Facebook" class="facebook" href="#"><img src="<?php bloginfo('template_url' ); ?>/images/icons/about-facebook-icon.png" alt="" /></a>
                            </li>
                            <li class="twitter-icon">
                                <a target="_blank" title="Twitter" class="twitter" href="#"><img src="<?php bloginfo('template_url' ); ?>/images/icons/about-twitter-icon.png" alt="" /></a>
                            </li>
                        </ul><!--about-social-link-->
                    </article><!--about-author-->
                    <?php comments_template(); ?>
                    <?php endif; ?>
                    <?php if(ot_get_option('related_post') == 'yes') : ?>
                      <?php imasta_relpost() ?>
                    <?php endif; ?>
                </div><!--column-b-->
                <?php if ( ot_get_option('imasta_sb_layout') == 'right-sidebar' ) : get_sidebar(); endif; ?>
                <!-- <?php get_sidebar(); ?> -->
                <div class="clear"></div>
            </div><!--main-content-bottom-->            
        </div><!--main-content-inner-->
    </div><!--main-content-->
</div><!--wrapper-->
<?php get_footer( ); ?>
