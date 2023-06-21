<?php $doro_options = get_option('doro'); ?>
<?php
if ( post_password_required() ) {
	return;
}
?>
<?php if ( have_comments() ) : ?>
    <?php get_template_part('template-parts/animate/animate-div-start'); ?> 
	<?php
	global $doro_comment_meta_text, $doro_comment_meta_text2, $doro_comment_meta_text3;
	if(!empty($doro_options['translet_opt_10'])):
	$doro_comment_meta_text= esc_html(Doro_AfterSetupTheme::return_thme_option('translet_opt_10',''));;
	else: 
	$doro_comment_meta_text='One comment on';
	endif;
	if(!empty($doro_options['translet_opt_11'])):
	$doro_comment_meta_text2= esc_html(Doro_AfterSetupTheme::return_thme_option('translet_opt_11',''));;
	else: 
	$doro_comment_meta_text2='Comment on';
	endif;
	if(!empty($doro_options['translet_opt_12'])):
	$doro_comment_meta_text3= esc_html(Doro_AfterSetupTheme::return_thme_option('translet_opt_12',''));;
	else: 
	$doro_comment_meta_text3='Comments on';
	endif;
	?>	
	<div class="row">
	    <div class="col-md-12 col-sm-12">
	        <div class="clear" id="comment-list">
			    <div class="comments-area" id="comments">	
					<h2 class="comments-title">
						<?php
						$comment_count = get_comments_number();
						if ( 1 === $comment_count ) {
							printf(
								
								esc_html_e( ''.$doro_comment_meta_text.' &ldquo; %1$s &rdquo;', 'doro' ),
								'<span>' . get_the_title() . '</span>'
							);
						} else {
							printf( 
								esc_html( _nx( '%1$s '.$doro_comment_meta_text2.' &ldquo; %2$s &rdquo;', '%1$s '.$doro_comment_meta_text3.' &ldquo; %2$s &rdquo;', $comment_count, 'comments title', 'doro' ) ),
								number_format_i18n( $comment_count ),
								'<span>' . get_the_title() . '</span>'
							);
						}
						?>							
					</h2>

					<?php the_comments_navigation(); ?>
					
					<ol class="comment-list">			
						<?php
							wp_list_comments( array(
								'callback'   => 'doro_comment',
								'short_ping' => true,
							) );
						?>
					</ol><!-- .comment-list -->
		            <div class="clearfix"></div>
		
		            <?php the_comments_navigation();?>

					<?php if ( ! comments_open() ) : ?>
						<p class="no-comments"><?php if(!empty($doro_options['translet_opt_13'])):?><?php echo esc_html(Doro_AfterSetupTheme::return_thme_option('translet_opt_13',''));?><?php else: ?><?php esc_html_e( 'Comments are closed.', 'doro' ); ?><?php endif;?></p>
					<?php endif; ?>

				</div>
			</div>
		</div>					
	</div>		
	<?php get_template_part('template-parts/animate/animate-div-end'); ?> 
<?php endif; // Check for have_comments(). ?>
    <?php get_template_part('template-parts/animate/animate-div-start'); ?> 
    <div class="row">
        <div class="col-md-8">	
		 
			<?php
			global $doro_comment_your_name, $doro_comment_your_email, $doro_comment_your_comment, $doro_comment_send_commen;
			if(!empty($doro_options['translet_opt_14'])):
			$doro_comment_your_name= esc_html(Doro_AfterSetupTheme::return_thme_option('translet_opt_14',''));;
			else: 
			$doro_comment_your_name='Name';
			endif;
			if(!empty($doro_options['translet_opt_15'])):
			$doro_comment_your_email= esc_html(Doro_AfterSetupTheme::return_thme_option('translet_opt_15',''));;
			else: 
			$doro_comment_your_email='Email';
			endif;
			if(!empty($doro_options['translet_opt_16'])):
			$doro_comment_your_comment= esc_html(Doro_AfterSetupTheme::return_thme_option('translet_opt_16',''));;
			else: 
			$doro_comment_your_comment='Your Comment';
			endif;
			if(!empty($doro_options['translet_opt_17'])):
			$doro_comment_send_comment= esc_html(Doro_AfterSetupTheme::return_thme_option('translet_opt_17',''));;
			else: 
			$doro_comment_send_comment='Leave a Comment';
			endif;

			$doro_args = array(
				'fields' => apply_filters(
				'comment_form_default_fields', array(
					
					'author' =>'<div class="row"><div class="col-sm-6">' . '<input id="author"  placeholder="'. $doro_comment_your_name .'*" name="author" type="text" value="' .
						esc_attr( $commenter['comment_author'] ) . '" size="40"/>'.
						
						'</div>'
						,
					'email'  => '<div class="col-sm-6">' . '<input id="email" placeholder="'.$doro_comment_your_email.'*" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
						'" size="40"/>'  .
						
						'</div></div>',
					
				)
				),
				'comment_field' => '' .
				'<textarea id="comment" class="form-control" name="comment" cols="40" rows="7" placeholder="'.$doro_comment_your_comment.'*" aria-required="true"></textarea>' .
				'',
				'comment_notes_after' => '<input type="submit" class="btn btn-contact"  placeholder="'. esc_attr__( 'Submit Comment', 'doro' ) .'" />'. '',
				'title_reply' => '<h3 class="doro-about-heading">'.$doro_comment_send_comment.'</h3>'
				
			); comment_form($doro_args); ?>
	
        </div>
    </div>
    <?php get_template_part('template-parts/animate/animate-div-end'); ?> 

