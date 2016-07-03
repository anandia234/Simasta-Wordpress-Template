<?php

	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		This post is password protected. Enter the password to view comments.
	<?php
		return;
	}
?>

<?php if ( have_comments() ) : ?>
 <div id="comments">
     <h3><?php comments_number('No Comments', 'One Comment', '% Comments' ); ?></h3>
     <ol class="comments-list">
     	<?php
            wp_list_comments(array('callback' => 'imasta_comments'));
            //wp_list_comments( );
        ?>
     </ol><!--end:comments-list-->
     <div class="comment-pagination clearfix">
         <div class="prev"><?php previous_comments_link() ?></div>
         <div class="next"><?php next_comments_link() ?></div>
     </div>
     <div class="clear"></div>
 </div><!--end:comments-->
<?php else : // this is displayed if there are no comments so far ?>
	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<p>Comments are closed.</p>

	<?php endif; ?>
<?php endif; ?>

<?php if(comments_open()) : ?>

 <div id="respond" class="kopa-border-2">
     <h3>Leave a reply</h3>

     <?php if (get_option('comment_registration' ) && !is_user_logged_in()) : ?>
		<p>You must be <a href="<?php echo wp_login_url(get_permalink());?>">logged in</a> to post a comment.</p>
     <?php else : ?>

     <form id="comments-form" class="clearfix" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post"> 
     	<?php if(is_user_logged_in()) : ?>
     		<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" class="logout-button" title="Log out of this account">Logout</a></p>
            <p class="textarea-block">                        
                <label class="required" for="comment_message"><span>Your Message</span></label>
                <textarea rows="6" cols="80" id="comment_message" name="comment"></textarea>
            </p> 
     	<?php else : ?>  
        <p class="textarea-block">                        
            <label class="required" for="comment_message"><span>Your Message</span></label>
            <textarea rows="6" cols="80" id="comment_message" name="comment"></textarea>
        </p>  
         <p class="input-block clearfix">
             <label class="required" for="comment_name"><span>Your Name (required)</span></label>
             <input class="valid" type="text" name="author" id="comment_name" value="">
         </p>
         <p class="input-block">
             <label class="required" for="comment_email"><span>Your Email (required)</span></label>
             <input type="email" class="valid" name="email" id="comment_email" value="">
         </p>
         <p class="input-block last">
             <label class="required" for="comment_url"><span>Website</span></label>
             <input type="url" class="valid" name="url" id="comment_url" value="">
         </p>
         <?php endif; ?>
         <div class="clear"></div>                            
         <p class="comment-button clearfix">  
         	<?php comment_id_fields(); ?>                  
             <input type="submit" id="submit-comment" value="Submit">
         </p>  

		
     </form>
 	 <?php endif; ?>
     <div id="response"></div>
 </div><!--end:respond-->

 <?php endif; ?> <!-- /Comments Open -->