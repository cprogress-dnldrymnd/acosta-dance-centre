<?php $doro_options = get_option('doro'); ?> <!-- Tag Page --> 
	<div class="row">
		<div class="col-md-12"> 
		
		    <?php if(!empty($doro_options['blog-page-subtitle'])): ?>
			<span class="heading-meta"><?php echo esc_html(($doro_options['blog-page-subtitle']));?></span>
			<?php endif;?>
			
			<?php if (Doro_AfterSetupTheme::return_thme_option('index-header-animate')=='yes'){ ?>
			<h2 class="doro-heading animate-box" data-animate-effect="fadeInLeft">
			<?php } else { ?>
            <h2 class="doro-heading">    
			<?php } ?>

				<?php if(!empty($doro_options['tag-page-title'])): ?>
				   <?php echo esc_html(($doro_options['tag-page-title']));?> <em><?php single_tag_title(); ?></em>
				<?php else:?>
					<?php esc_html_e('Tag : ','doro');?> <em><?php single_tag_title(); ?></em>
				<?php endif;?>					
					
			<?php if (Doro_AfterSetupTheme::return_thme_option('index-header-animate')=='yes'){ ?>		
			</h2> 
			<?php } else { ?>
			</h2> 
			<?php } ?>

		</div>
	</div>	
