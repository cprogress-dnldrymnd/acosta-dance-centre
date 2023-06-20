<?php $doro_options = get_option('doro'); ?>
<?php get_header();?>
<?php if(have_posts()) : while ( have_posts() ) : the_post();?>
	<div class="doro-projects">
		<div class="container-fluid">
		<?php get_template_part('template-parts/header/title-section-8');?>	
			<div class="row">
			    <?php if(get_post_meta($post->ID,'rnr_port_gallery_block_section',true)!='no'){ ?>
					<?php if(get_post_meta($post->ID,'rnr_port_gallery_block_animate',true)=='yes'){ ?>
						<div class="col-md-8 col-sm-12 image-content animate-box fadeInLeft animated" data-animate-effect="fadeInLeft"> 
						<?php $doro_images = rwmb_meta( 'rnr_portfolio_gallery_images','type=image&size=' );
						foreach ( $doro_images as $doro_image ){ ?>			
							<img class="img-fluid mb-30" src="<?php echo esc_url(($doro_image['url']));?>" alt=""> 
						<?php } ;?>
						</div>	
					<?php } else { ?>
						<div class="col-md-8 col-sm-12 image-content"> 
						<?php $doro_images = rwmb_meta( 'rnr_portfolio_gallery_images','type=image&size=' );
						foreach ( $doro_images as $doro_image ){ ?>			
							<img class="img-fluid mb-30" src="<?php echo esc_url(($doro_image['url']));?>" alt=""> 
						<?php } ;?>
						</div>				
					<?php } ;?>
				<?php } ;?>
				
				<?php if(get_post_meta($post->ID,'rnr_port_content_block_section',true)=='no'){ ?>
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
				<?php } else { ?>
					<?php if(get_post_meta($post->ID,'rnr_port_content_block_animate',true)=='yes'){ ?>
					<div class="col-md-4 col-sm-12 animate-box fadeInLeft animated" data-animate-effect="fadeInLeft">
						<div id="sticky_item">
							<div class="project-desc">
								<?php if (( get_post_meta($post->ID,'rnr_port_content_header_title',true))):?>
								<h2><?php echo esc_html(get_post_meta($post->ID,'rnr_port_content_header_title',true)); ?></h2>
								<?php endif;?>
								<p><?php the_content();?> </p>

								<?php $doro_project_info = rwmb_meta( 'rnr_portfolio_column_grid_project_info_main' );
									if ( ! empty( $doro_project_info ) ) {
									foreach ( $doro_project_info as $doro_project_infos ) { ;?>
									<?php $doro_port_column_grid_title = isset( $doro_project_infos['rnr_port_column_grid_dt_in_title'] ) ? $doro_project_infos['rnr_port_column_grid_dt_in_title'] : ''; ?>
									<?php $doro_port_column_grid_subtitle = isset( $doro_project_infos['rnr_port_column_grid_dt_in_subtitle'] ) ? $doro_project_infos['rnr_port_column_grid_dt_in_subtitle'] : ''; ?>
									<?php if ( !empty( $doro_port_column_grid_title ) ) { ?>
									<?php if ( !empty( $doro_port_column_grid_subtitle ) ) { ?>
									<b><?php echo esc_html($doro_port_column_grid_title);?></b> <?php echo esc_html($doro_port_column_grid_subtitle);?><br>
								<?php } ?> <?php } ?> <?php } } ;?>								
							</div>
						</div>
					</div>					
					<?php } else { ?>
					<div class="col-md-4 col-sm-12">
						<div id="sticky_item">
							<div class="project-desc">
								<?php if (( get_post_meta($post->ID,'rnr_port_content_header_title',true))):?>
								<h2><?php echo esc_html(get_post_meta($post->ID,'rnr_port_content_header_title',true)); ?></h2>
								<?php endif;?>
								<p><?php the_content();?> </p>

								<?php $doro_project_info = rwmb_meta( 'rnr_portfolio_column_grid_project_info_main' );
									if ( ! empty( $doro_project_info ) ) {
									foreach ( $doro_project_info as $doro_project_infos ) { ;?>
									<?php $doro_port_column_grid_title = isset( $doro_project_infos['rnr_port_column_grid_dt_in_title'] ) ? $doro_project_infos['rnr_port_column_grid_dt_in_title'] : ''; ?>
									<?php $doro_port_column_grid_subtitle = isset( $doro_project_infos['rnr_port_column_grid_dt_in_subtitle'] ) ? $doro_project_infos['rnr_port_column_grid_dt_in_subtitle'] : ''; ?>
									<?php if ( !empty( $doro_port_column_grid_title ) ) { ?>
									<?php if ( !empty( $doro_port_column_grid_subtitle ) ) { ?>
									<b><?php echo esc_html($doro_port_column_grid_title);?></b> <?php echo esc_html($doro_port_column_grid_subtitle);?><br>
								<?php } ?> <?php } ?> <?php } } ;?>								
							</div>
						</div>
					</div>				
					<?php } ;?>
				<?php } ;?>	
				
			</div>
		</div>
	</div>		
<?php endwhile;  endif; wp_reset_postdata(); ?>		
<?php get_footer(); ?>