<?php $doro_options = get_option('doro'); ?>
<?php get_header();?>
	<div class="doro-about">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12"> 		
					<div class="error-page">
					    <?php if (Doro_AfterSetupTheme::return_thme_option('index-content-animate')=='yes'){ ?>
						<div class="animate-box" data-animate-effect="fadeInLeft">		   
						<?php } ?>						
							<span class="heading-meta">
							<?php if(!empty($doro_options['error-page-sbtitle'])): ?>
								<?php echo esc_html(($doro_options['error-page-sbtitle']));?>
							<?php else:?>
								<?php esc_html_e('Error','doro');?>
							<?php endif;?>
							</span>
							<h2 class="doro-heading"> 
							<?php if(!empty($doro_options['error-page-title'])): ?>
								<?php echo esc_html(($doro_options['error-page-title']));?>
							<?php else:?>
								<?php esc_html_e('404','doro');?>
							<?php endif;?>
							</h2>
							<p>
							<?php if(!empty($doro_options['error-page-subtitle'])): ?>      
								<?php echo esc_html(($doro_options['error-page-subtitle']));?>
							<?php else:?>   
								<?php esc_html_e('The page you were looking for, could not be found.','doro');?>	
							<?php endif;?>	
							</p>
						<?php if (Doro_AfterSetupTheme::return_thme_option('index-content-animate')=='yes'){ ?>
						</div>				
						<?php } ?>
					</div>									
		        </div>
		    </div>
		</div>
	</div>
<?php get_footer(); ?>	