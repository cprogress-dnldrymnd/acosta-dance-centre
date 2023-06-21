<?php $doro_options = get_option('doro'); ?>
	<!-- Sidebar Section -->
	<aside id="doro-aside">	    
		<!-- Logo -->
		<?php if (Doro_AfterSetupTheme::return_thme_option('textlogo')=='st2'){ ?> 
		<h1 id="doro-logo">
		    <a class="logo-holder text-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url(Doro_AfterSetupTheme::return_thme_option('logopic','url'));?>" alt="<?php  bloginfo('name'); ?>"> 
			<?php if(!empty($doro_options['logotext2'])):?>
			    <span><?php echo esc_html(($doro_options['logotext2']));?></span>			
            <?php endif;?></a>  			
		</h1>	
		<?php } else { ?>
		<h1 id="doro-logo">
			<a class="logo-holder text-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<?php if(!empty($doro_options['logotext'])):?>
			    <?php echo esc_html(($doro_options['logotext']));?>
			<?php else:?>
			  <?php  bloginfo('name'); ?>
			<?php endif;?>	
			<?php if(!empty($doro_options['logotext2'])):?>
			    <span><?php echo esc_html(($doro_options['logotext2']));?></span>			
            <?php endif;?>    			
			</a>
		</h1>	
		<?php } ;?>				
		
		<?php get_template_part('template-parts/header/menu-section'); ?> 

		<!-- Sidebar Footer -->
		<div class="doro-footer"> 
			<?php if (Doro_AfterSetupTheme::return_thme_option('social-header')=='yes'){ ?> 
			<ul>
				<?php if(!empty($doro_options['facebook'])):?> 
				<li><a href="<?php echo esc_url($doro_options['facebook']); ?>" target="_blank"><i class="ti-facebook font-14px gray-icon"></i></a></li>
				<?php endif;?>

				<?php if(!empty($doro_options['twitter'])):?> 
				<li><a href="<?php echo esc_url($doro_options['twitter']); ?>" target="_blank"><i class="ti-twitter-alt font-14px gray-icon"></i></a></li>
				<?php endif;?>

				<?php if(!empty($doro_options['google-plus'])):?> 
				<li><a href="<?php echo esc_url($doro_options['google-plus']); ?>" target="_blank"><i class="ti-google font-14px gray-icon"></i></a></li>
				<?php endif;?>		

				<?php if(!empty($doro_options['linkedin'])):?> 
				<li><a href="<?php echo esc_url($doro_options['linkedin']); ?>" target="_blank"><i class="ti-linkedin font-14px gray-icon"></i></a></li>
				<?php endif;?>	

				<?php if(!empty($doro_options['instagram'])):?> 
				<li><a href="<?php echo esc_url($doro_options['instagram']); ?>" target="_blank"><i class="ti-instagram font-14px gray-icon"></i></a></li>
				<?php endif;?>	

				<?php if(!empty($doro_options['pinterest'])):?> 
				<li><a href="<?php echo esc_url($doro_options['pinterest']); ?>" target="_blank"><i class="ti-pinterest-alt font-14px gray-icon"></i></a></li>
				<?php endif;?>	

				<?php if(!empty($doro_options['soundcloud'])):?> 
				<li><a href="<?php echo esc_url($doro_options['soundcloud']); ?>" target="_blank"><i class="ti-soundcloud font-14px gray-icon"></i></a></li>
				<?php endif;?>			

				<?php if(!empty($doro_options['skype'])):?> 
				<li><a href="<?php echo esc_url($doro_options['skype']); ?>" target="_blank"><i class="ti-skype font-14px gray-icon"></i></a></li>
				<?php endif;?>	
	
				<?php if(!empty($doro_options['dribbble'])):?> 
				<li><a href="<?php echo esc_url($doro_options['dribbble']); ?>" target="_blank"><i class="ti-dribbble font-14px gray-icon"></i></a></li>
				<?php endif;?>				

				<?php if(!empty($doro_options['youtube'])):?> 
				<li><a href="<?php echo esc_url($doro_options['youtube']); ?>" target="_blank"><i class="ti-youtube font-14px gray-icon"></i></a></li>
				<?php endif;?>	

				<?php if(!empty($doro_options['vimeo'])):?> 
				<li><a href="<?php echo esc_url($doro_options['vimeo']); ?>" target="_blank"><i class="ti-vimeo font-14px gray-icon"></i></a></li>
				<?php endif;?>
	
				<?php if(!empty($doro_options['dropbox'])):?> 
				<li><a href="<?php echo esc_url($doro_options['dropbox']); ?>" target="_blank"><i class="ti-dropbox font-14px gray-icon"></i></a></li>
				<?php endif;?>	

				<?php if(!empty($doro_options['github'])):?> 
				<li><a href="<?php echo esc_url($doro_options['github']); ?>" target="_blank"><i class="ti-github font-14px gray-icon"></i></a></li>
				<?php endif;?>	
				<?php if(!empty($doro_options['tumblr'])):?> 
				<li><a href="<?php echo esc_url($doro_options['tumblr']); ?>" target="_blank"><i class="ti-tumblr-alt font-14px gray-icon"></i></a></li>
				<?php endif;?>

				<?php if(!empty($doro_options['email'])):?> 
				<li><a href="mailto:<?php echo esc_attr($doro_options['email']); ?>" target="_blank"><i class="ti-email font-14px gray-icon"></i></a></li>
				<?php endif;?>
				
				<?php
				$doro_more_social = Doro_AfterSetupTheme::return_thme_option('opt_add_more_social','');
				if ( ! empty( $doro_more_social ) ) {
				foreach ( $doro_more_social as $doro_more_socials ) { ;?>
				<?php echo do_shortcode($doro_more_socials);?>
				<?php } } ;?> 				
				
            </ul>
			<?php } ;?>	
			<?php if (Doro_AfterSetupTheme::return_thme_option('nav-copyright')!='no'){ ?> 
			<p><small>
				<?php if(!empty($doro_options['copyright2'])): ?>
					<span><?php echo do_shortcode(($doro_options['copyright2']));?></span>
				<?php else:?>
					<span><?php esc_html_e('&#169; 2023 Doro By webRedox','doro');?></span>
				<?php endif;?>							
			</small></p>
			<?php } ?>	
		</div>
	</aside>