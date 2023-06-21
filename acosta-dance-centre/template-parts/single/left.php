<?php $doro_options = get_option('doro'); ?>
	<div class="doro-projects single-post">
		<div class="container-fluid">
		    <?php if(have_posts()) : while ( have_posts() ) : the_post();?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
			    <?php get_template_part('template-parts/animate/animate-div-start'); ?> 
				<div class="row">
					<div class="col-md-12"> 	
					    <?php $doro_post_title= get_the_title(); ?>
						    <span class="meta-info custom-single">
                                <span class="date"><?php the_time( get_option( 'date_format' ) ); ?></span>
								<?php if( has_category() ) {?>
								   <span class="datee"><?php esc_html_e(' | ','doro');?> </span> <?php echo the_category($separator = ", "); ?>
								<?php }?>
								<?php if( has_tag() ) {?>
									<span class="datee"><?php esc_html_e(' | ','doro');?> </span> <?php the_tags( ' ', ', ', '' ); ?>
								<?php }?>								
						    </span>						
                        <?php $doro_post_title= get_the_title(); ?>
						<?php if($doro_post_title != '') { ?>
						<h2 class="doro-post-heading"><?php the_title()?></h2>
						<?php } ?>	
					</div>
				</div>
				<?php get_template_part('template-parts/animate/animate-div-end'); ?> 
				<?php if (has_post_thumbnail( $post->ID ) ):;?>	
				<?php $doro_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' );?>	
				<?php $doro_image_id = get_post($id); $doro_image_title = $doro_image_id->post_title; ?>
				<?php get_template_part('template-parts/animate/animate-div-start'); ?> 
				<div class="row">
					<div class="col-md-12 image-content"> <img src="<?php echo esc_url($doro_image[0]);?>" class="img-fluid mt-30 mb-30" alt="<?php echo esc_attr($doro_image_title);?>"> </div>
				</div>
				<?php get_template_part('template-parts/animate/animate-div-end'); ?> 
				<?php endif;?>	
				<?php get_template_part('template-parts/animate/animate-div-start'); ?> 
				<div class="row">
					<div class="col-md-12">
						<div class="post-content">												
							<?php the_content();
								wp_link_pages( array(
								'before'      => '<div class="page-links">',
								'after'       => '</div>',
								'link_before' => '<span>',
								'link_after'  => '</span>',
								'pagelink'    => '%',
								'separator'   => '',
								) );
							?>								
						</div>	
					</div>
				</div>
				<?php get_template_part('template-parts/animate/animate-div-end'); ?> 					
			</div>
			<?php endwhile;  endif; wp_reset_postdata(); ?>
			<?php if ( comments_open() || get_comments_number() ) { ?>				
				<div class="single-post-comment">
					<?php comments_template();?>
				</div>		
			<?php }?>
		</div>
	</div>