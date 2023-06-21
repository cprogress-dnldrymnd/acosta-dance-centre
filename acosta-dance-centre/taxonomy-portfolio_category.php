<?php $doro_options = get_option('doro'); ?>
<?php get_header(); ?>	

	<!-- Projects -->
	<div class="doro-projects">
		<div class="container-fluid">
		    <div class="page-content">
				<div class="section-padding">			
					<div class="section-wrapper container-fluid">			
						<div class="row">
							<div class="col-md-12"> 
								<?php if (doro_AfterSetupTheme::return_thme_option('index-header-animate')=='yes'){ ?>
									<span class="heading-meta">
									<?php if(!empty($doro_options['port-page-subtitle'])): ?>
										<?php echo esc_html(($doro_options['port-page-subtitle']));?>
									<?php endif;?>							
									</span>
									<h2 class="doro-heading animate-box" data-animate-effect="fadeInLeft">
										<?php single_cat_title( '', true ); ?>
									</h2> 				
								<?php } else { ?>
									<span class="heading-meta">
									<?php if(!empty($doro_options['port-page-subtitle'])): ?>
										<?php echo esc_html(($doro_options['port-page-subtitle']));?>
									<?php endif;?>							
									</span>                
									<h2 class="doro-heading">
										<?php single_cat_title( '', true ); ?>
									</h2> 			
								<?php } ?>				
							</div>
						</div>
						<div class="row">
							<?php global $loop; 
							$args = array_merge( $wp_query->query, array( 'post_type' => 'portfolio', 'posts_per_page'=>-1, ) );
							query_posts( $args );?>	
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<?php $doro_portfolio_category = wp_get_post_terms($post->ID,'portfolio_category');?>
							<?php 
							$doro_class = ""; 
							$doro_categories = ""; 
							foreach ($doro_portfolio_category as $doro_item) {
							$doro_class.=esc_attr($doro_item->slug . ' ');
							$doro_categories.='<span class="cat-divider">';
							$doro_categories.=esc_html($doro_item->name . '  ');
							$doro_categories.='</span>';
							}?>
							<?php if (has_post_thumbnail( $post->ID ) ):
							$doro_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'doro_portfolio_image' );?>			
							<div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
								<a href="<?php the_permalink();?>">
									<div class="project"> 
										<img class="img-fluid" src="<?php echo esc_url($doro_image[0]);?>" alt="<?php the_title();?>" />
										<div class="desc">
											<div class="con">
												<h3><?php the_title();?></h3> <span><?php echo $doro_categories;?></span> 
											</div>
										</div>
									</div>
								</a>
							</div>
							
							<?php endif;?>
							<?php  endwhile; endif; wp_reset_postdata(); ?> 
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


<?php get_footer(); ?>