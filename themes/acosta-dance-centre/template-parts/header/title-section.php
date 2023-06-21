<?php $doro_options = get_option('doro'); ?> <!-- Default Page -->     
	<?php if(get_post_meta($post->ID,'rnr_page_header_block',true)!='no'){ ?>
	<div class="row">
		<div class="col-md-12"> 
		    <?php if (( get_post_meta($post->ID,'rnr_page_right_block_header_subtitle',true))):?>
			<span class="heading-meta"><?php echo esc_html(get_post_meta($post->ID,'rnr_page_right_block_header_subtitle',true)); ?></span>
			<?php endif;?>
			<?php if(get_post_meta($post->ID,'rnr_page_header_block_animate',true)=='yes'){ ?>
				<h2 class="doro-heading animate-box" data-animate-effect="fadeInLeft">
					<?php if (( get_post_meta($post->ID,'rnr_page_right_block_header_title',true))):?>
						<?php echo esc_html(get_post_meta($post->ID,'rnr_page_right_block_header_title',true)); ?>
					<?php else : ?>	 
						<?php the_title(); ?>
					<?php endif;?>	
				</h2> 				
			<?php } else { ?>
				<h2 class="doro-heading">
					<?php if (( get_post_meta($post->ID,'rnr_page_right_block_header_title',true))):?>
						<?php echo esc_html(get_post_meta($post->ID,'rnr_page_right_block_header_title',true)); ?>
					<?php else : ?>	 
						<?php the_title(); ?>
					<?php endif;?>	
				</h2> 			
			<?php } ?>
		</div>
	</div>		
	<?php } ?>
		