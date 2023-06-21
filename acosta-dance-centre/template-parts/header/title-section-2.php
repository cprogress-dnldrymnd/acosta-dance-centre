<?php $doro_options = get_option('doro'); ?> <!-- Index Page -->    
<!-- Page Header AREA START -->
<?php if (Doro_AfterSetupTheme::return_thme_option('index-header-show')!='no'){ ?>
	<div class="row">
		<div class="col-md-12"> 
		    <?php if(!empty($doro_options['blog-page-subtitle'])): ?>
			<span class="heading-meta"><?php echo esc_html(($doro_options['blog-page-subtitle']));?></span>
			<?php endif;?>
			<?php if (Doro_AfterSetupTheme::return_thme_option('index-header-animate')=='yes'){ ?>
				<h2 class="doro-heading animate-box" data-animate-effect="fadeInLeft">
					<?php if(!empty($doro_options['blog-page-title'])): ?>
					   <?php echo esc_html(($doro_options['blog-page-title']));?>
					<?php else:?>
						<?php esc_html_e('Blog','doro');?>
					<?php endif;?>	
				</h2> 				
			<?php } else { ?>
				<h2 class="doro-heading">
					<?php if(!empty($doro_options['blog-page-title'])): ?>
					   <?php echo esc_html(($doro_options['blog-page-title']));?>
					<?php else:?>
						<?php esc_html_e('Blog','doro');?>
					<?php endif;?>	
				</h2> 			
			<?php } ?>
		</div>
	</div>		
<?php } ?>
<!-- /Page Header AREA END -->	