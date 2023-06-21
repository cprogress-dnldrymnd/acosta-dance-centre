<?php $doro_options = get_option('doro'); ?> <!-- Archives, Category, Tag & Search Page --> 
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

				<?php if(!empty($doro_options['src-page-title'])): ?>
				   <?php echo esc_html(($doro_options['src-page-title']));?> <em><?php printf( esc_html__( ' "%s"', 'doro' ), '<strong>' . get_search_query() . '</strong>' ); ?></em>
				<?php else:?>
					<?php esc_html_e('Search Results For : ','doro');?> <em><?php printf( esc_html__( ' "%s"', 'doro' ), '<strong>' . get_search_query() . '</strong>' ); ?></em>
				<?php endif;?>
					
			<?php if (Doro_AfterSetupTheme::return_thme_option('index-header-animate')=='yes'){ ?>		
			</h2> 
			<?php } else { ?>
			</h2> 
			<?php } ?>

		</div>
	</div>	
