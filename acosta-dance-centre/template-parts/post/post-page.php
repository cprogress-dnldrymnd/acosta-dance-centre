<?php $doro_options = get_option('doro'); ?>
			<div class="row">
				<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
				<div class="col-md-8 col-sm-8">
				<?php else : ?>
				<div class="col-md-12">
				<?php endif;?>	
					<!-- post -->
					<?php global $post, $post_id;?>
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>					
					<?php if (Doro_AfterSetupTheme::return_thme_option('index-content-animate')=='yes'){ ?>
					<div class="blog-entry animate-box" data-animate-effect="fadeInLeft">
					<?php } else { ?>
					<div class="blog-entry">
					<?php } ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
						<?php if (has_post_thumbnail( $post->ID ) ):;?>	
						<?php $doro_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' );?>	
						<?php $doro_image_id = get_post($id); $doro_image_title = $doro_image_id->post_title; ?>					
						<a href="<?php the_permalink();?>" class="blog-img"><img src="<?php echo esc_url($doro_image[0]);?>" class="img-fluid" alt="<?php echo esc_attr($doro_image_title);?>"></a>
						<?php endif;?>	
						<div class="desc"> 
						    <span class="meta-info">
							    <?php $doro_post_title= get_the_title(); ?>
								<?php if($doro_post_title != '') { ?>
								    <span class="date"><?php the_time( get_option( 'date_format' ) ); ?> </span>
								<?php } else { ?>
									<span class="date"><a href="<?php the_permalink();?>"><?php the_time( get_option( 'date_format' ) ); ?></a> </span>									
								<?php } ?>	
								<?php if( has_category() ) {?>
								   <span class="datee"><?php esc_html_e(' | ','doro');?> </span> <?php echo the_category($separator = ", "); ?>
								<?php }?>
						    </span>
							<?php if($doro_post_title != '') { ?>
							<h3><a href="<?php the_permalink();?>"><?php the_title()?></a></h3>
							<?php } ?>	
							<div class="post-content">												
								<!-- excerpt -->
								<?php if( wp_link_pages('echo=0') ): ?>										
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
									<?php else : ?>
									<p class="blog-text"><?php the_excerpt(); ?></p>
								<?php endif;?>									
							</div>														
							<p><a href="<?php the_permalink();?>" class="lead">
							<?php if(!empty($doro_options['blog-read-more'])): ?>
							    <?php echo esc_html(($doro_options['blog-read-more']));?>
							<?php else:?>	
							    <?php esc_html_e('Read More','doro');?> 
							<?php endif; ?>	<i class="ti-shift-right-alt"></i></a></p>
						</div>
					</div>
					<?php if (Doro_AfterSetupTheme::return_thme_option('index-content-animate')=='yes'){ ?>
					</div>				
					<?php } else { ?>
					</div>
					<?php } ?>					
										
					<?php endwhile; endif; wp_reset_postdata(); ?>	
					<!-- Pagination -->
					<?php if (function_exists("doro_pagination")) { doro_pagination($wp_query->max_num_pages);}?>
				
				<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
				</div>
				<?php else : ?>
				</div>
				<?php endif;?>	
				
				<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
				<div class="col-sm-4">
					<?php if (Doro_AfterSetupTheme::return_thme_option('index-sidebar-animate')=='yes'){ ?>
					<div class="doro-sidebar-part animate-box" data-animate-effect="fadeInLeft">
					<?php } else { ?>
					<div class="doro-sidebar-part">
					<?php } ?>				

                        <?php dynamic_sidebar( 'sidebar-1' ); ?>
						
					<?php if (Doro_AfterSetupTheme::return_thme_option('index-sidebar-animate')=='yes'){ ?>
					</div>				
					<?php } else { ?>
					</div>
					<?php } ?>	
				</div>
				<?php endif; ?>
			</div>