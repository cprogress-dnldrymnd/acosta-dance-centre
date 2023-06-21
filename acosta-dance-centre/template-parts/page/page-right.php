<?php $doro_options = get_option('doro'); ?>
<?php while ( have_posts() ) : the_post(); ?>	
	<div class="doro-blog">
		<div class="container-fluid">
			<div class="row">
				<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
				<div class="col-md-8 col-sm-8">
				<?php else : ?>
				<div class="col-md-22">
				<?php endif;?>	
					<?php get_template_part('template-parts/header/title-section');?>
					<div class="page-content">
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
					
				<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
				</div>
				<?php else : ?>
				</div>
				<?php endif;?>	
				
				<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
				<div class="col-sm-4">
					<?php if (Doro_AfterSetupTheme::return_thme_option('index-sidebar-animate')=='yes'){ ?>
					<div class="doro-sidebar-part animate-box" data-animate-effect="fadeInLeft">
					<?php } else { ?>
					<div class="doro-sidebar-part">
					<?php } ?>				

                        <?php dynamic_sidebar( 'sidebar-2' ); ?>
						
					<?php if (Doro_AfterSetupTheme::return_thme_option('index-sidebar-animate')=='yes'){ ?>
					</div>				
					<?php } else { ?>
					</div>
					<?php } ?>	
				</div>
				<?php endif; ?>
			</div>
		</div>					
	</div>					
<?php endwhile; // end of the loop. ?>
<?php wp_reset_postdata();?>		