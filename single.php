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
         <a class="entry-author" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' )); ?>"><?php the_author( ); ?></a>
         <?php comments_popup_link('0<span>&nbsp;</span>', '1<span>&nbsp;</span>', '%<span>&nbsp;</span>', 'entry-comments' ); ?>
       </header>
       <div class="clearfix">

        <div class="banner-title">
          <?php echo ot_get_option('imasta_hdr_bnr_bfr_ttl'); ?>
        </div><!--banner-title-->

      </div>

      <div class="entry-content clearfix">
       <a href="<?php the_permalink(); ?>"><h2 class="entry-title"><?php the_title( ); ?></h2></a>

           

       <!-- <?php the_post_thumbnail( ); ?> -->
       <?php the_content(); ?>


     </div><!--entry-content-->

     <div class="kopa-tag-box">
      <?php the_tags('', ' ', '' );?>

    </div><!--kopa-tag-->
  </section><!--entry-box-->

  <article class="about-author clearfix">
   <!-- <img src="<?php bloginfo('template_url' ); ?>/placeholders/avatar/author.jpg" alt="" class="kopa-border-1 author-avatar" /> -->
   <?php echo get_avatar( get_the_author_meta( 'ID' )); ?>
   <h3>About the author</h3>
   <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' )); ?>"><?php the_author( ); ?></a>
   <p><?php the_author_description() ?></p>
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
<div class="twitter-widget">
    <div class='twitter_outer'>
        <?php echo ot_get_option('imasta_ftr_bnr'); ?>
    </div><!--twitter_outer-->
</div><!--twitter-widget-->         
</div><!--main-content-inner-->
</div><!--main-content-->
</div><!--wrapper-->
<?php get_footer( ); ?>
