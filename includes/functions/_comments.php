<?php 
// Do not load directly...
if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }

if ( ! function_exists( 'ktz_comments' ) ) :
function imasta_comments($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment;?>
	<li <?php comment_class(); ?> id=comment-<?php comment_id(); ?>>
	    <article class="comment-wrap clearfix"> 
	        <?php echo get_avatar($comment, $size = '52', '', $alt='author' ); ?>
	        <div class="comment-body">
	            <div class="comment-meta">
	                <span class="author"><?php comment_author_link( ); ?></span>
	                <span class="date">/&nbsp;&nbsp; <?php echo human_time_diff( get_comment_time('U' ), current_time('timestamp' )).' ago'; ?></span>
	            </div><!-- end:comment-meta -->

	            <?php if ($comment->comment_approved == '0') : ?>
	            <p>Your comment is awaiting moderation. </p>
	            <?php endif; ?>  

	            <?php comment_text(); ?>
	            
	            <footer class="clearfix">
	                <p class="clearfix">
	                    <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text' => 'Reply'))); ?>
	                    <?php edit_comment_link( 'Edit' ); ?>
	                </p>
	            </footer>
	            <span class="commnet-list-arrow">&nbsp;</span>
	        </div><!-- end:comment-body -->
	    </article>                                                                               
	</li>  
<?php
}
endif;
 ?>