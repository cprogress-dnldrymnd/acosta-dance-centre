<?php $doro_options = get_option('doro'); ?>
		<!-- Footer -->
		<?php if (Doro_AfterSetupTheme::return_thme_option('footer-section')!='no'){ ?>
		<div id="doro-footer2">
			<div class="doro-narrow-content">			
				<?php if (Doro_AfterSetupTheme::return_thme_option('index-footer-animate')=='yes'){ ?>
				<div class="animate-box" data-animate-effect="fadeInLeft">		   
				<?php } ?>				
				<div class="row">
				    <div class="col-md-4">
					<?php if (Doro_AfterSetupTheme::return_thme_option('footer-copyright')!='no'){ ?>
					    <div class="doro-lead">
						<?php if(!empty($doro_options['copyright'])): ?>
							<span><?php echo do_shortcode(($doro_options['copyright']));?></span>
						<?php else:?>
							<span><?php esc_html_e('&#169; Doro 2023 | All rights reserved.','doro');?></span>
						<?php endif;?>					
						</div>
					<?php } ?>	
					</div>
					<div class="col-md-4">	
					<?php if (Doro_AfterSetupTheme::return_thme_option('footer-logo')!='no'){ ?>
						<?php if (Doro_AfterSetupTheme::return_thme_option('textlogo2')=='st2'){ ?> 
						<h2 class="text-center footer-logo-img">
							<a class="logo-holder logo-footer-img" href="<?php if(!empty($doro_options['logopic2_url'])):?> <?php echo esc_url($doro_options['logopic2_url']); ?> <?php else:?> <?php echo esc_url( home_url( '/' ) ); ?> <?php endif;?>"><img src="<?php echo esc_url(Doro_AfterSetupTheme::return_thme_option('logopic2','url'));?>" alt="<?php  bloginfo('name'); ?>"></a>
						</h2>	
						<?php } else { ?>
						<h2 class="text-center">
							<a class="text-logo-footer" href="<?php if(!empty($doro_options['logopic2_url'])):?> <?php echo esc_url($doro_options['logopic2_url']); ?> <?php else:?> <?php echo esc_url( home_url( '/' ) ); ?> <?php endif;?>">
							<?php if(!empty($doro_options['logotext3'])):?>
								<?php echo esc_html(($doro_options['logotext3']));?>
							<?php else:?>
							  <?php  bloginfo('name'); ?>
							<?php endif;?>	  			
							</a>
						</h2>	
						<?php } ;?>	
					<?php };?>		
					</div>	
					
					<div class="col-md-4">	
					<?php if (Doro_AfterSetupTheme::return_thme_option('social-footer')!='no'){ ?>
						<ul class="social-network">
							<?php if(!empty($doro_options['facebook'])):?> 
							<li><a href="<?php echo esc_url($doro_options['facebook']); ?>" target="_blank"><i class="ti-facebook font-14px black-icon"></i></a></li>
							<?php endif;?>

							<?php if(!empty($doro_options['twitter'])):?> 
							<li><a href="<?php echo esc_url($doro_options['twitter']); ?>" target="_blank"><i class="ti-twitter-alt font-14px black-icon"></i></a></li>
							<?php endif;?>

							<?php if(!empty($doro_options['google-plus'])):?> 
							<li><a href="<?php echo esc_url($doro_options['google-plus']); ?>" target="_blank"><i class="ti-google font-14px black-icon"></i></a></li>
							<?php endif;?>		

							<?php if(!empty($doro_options['linkedin'])):?> 
							<li><a href="<?php echo esc_url($doro_options['linkedin']); ?>" target="_blank"><i class="ti-linkedin font-14px black-icon"></i></a></li>
							<?php endif;?>	

							<?php if(!empty($doro_options['instagram'])):?> 
							<li><a href="<?php echo esc_url($doro_options['instagram']); ?>" target="_blank"><i class="ti-instagram font-14px black-icon"></i></a></li>
							<?php endif;?>	

							<?php if(!empty($doro_options['pinterest'])):?> 
							<li><a href="<?php echo esc_url($doro_options['pinterest']); ?>" target="_blank"><i class="ti-pinterest-alt font-14px black-icon"></i></a></li>
							<?php endif;?>	

							<?php if(!empty($doro_options['soundcloud'])):?> 
							<li><a href="<?php echo esc_url($doro_options['soundcloud']); ?>" target="_blank"><i class="ti-soundcloud font-14px black-icon"></i></a></li>
							<?php endif;?>			

							<?php if(!empty($doro_options['skype'])):?> 
							<li><a href="<?php echo esc_url($doro_options['skype']); ?>" target="_blank"><i class="ti-skype font-14px black-icon"></i></a></li>
							<?php endif;?>	
				
							<?php if(!empty($doro_options['dribbble'])):?> 
							<li><a href="<?php echo esc_url($doro_options['dribbble']); ?>" target="_blank"><i class="ti-dribbble font-14px black-icon"></i></a></li>
							<?php endif;?>				

							<?php if(!empty($doro_options['youtube'])):?> 
							<li><a href="<?php echo esc_url($doro_options['youtube']); ?>" target="_blank"><i class="ti-youtube font-14px black-icon"></i></a></li>
							<?php endif;?>	

							<?php if(!empty($doro_options['vimeo'])):?> 
							<li><a href="<?php echo esc_url($doro_options['vimeo']); ?>" target="_blank"><i class="ti-vimeo font-14px black-icon"></i></a></li>
							<?php endif;?>
				
							<?php if(!empty($doro_options['dropbox'])):?> 
							<li><a href="<?php echo esc_url($doro_options['dropbox']); ?>" target="_blank"><i class="ti-dropbox font-14px black-icon"></i></a></li>
							<?php endif;?>	

							<?php if(!empty($doro_options['github'])):?> 
							<li><a href="<?php echo esc_url($doro_options['github']); ?>" target="_blank"><i class="ti-github font-14px black-icon"></i></a></li>
							<?php endif;?>	
							<?php if(!empty($doro_options['tumblr'])):?> 
							<li><a href="<?php echo esc_url($doro_options['tumblr']); ?>" target="_blank"><i class="ti-tumblr-alt font-14px black-icon"></i></a></li>
							<?php endif;?>

							<?php if(!empty($doro_options['email'])):?> 
							<li><a href="mailto:<?php echo esc_attr($doro_options['email']); ?>" target="_blank"><i class="ti-email font-14px black-icon"></i></a></li>
							<?php endif;?>							
							
							<?php
							$doro_more_social = Doro_AfterSetupTheme::return_thme_option('opt_add_more_social','');
							if ( ! empty( $doro_more_social ) ) {
							foreach ( $doro_more_social as $doro_more_socials ) { ;?>
							<?php echo balanceTags($doro_more_socials);?>
							<?php } } ;?> 									
						</ul>
					<?php };?>		
					</div>
				</div>				
				<?php if (Doro_AfterSetupTheme::return_thme_option('index-footer-animate')=='yes'){ ?>
				</div>			
				<?php } ?>					
			</div>
		</div>
		<?php };?>
	</div>  
</div>
<!-- Main end -->

<?php wp_footer(); ?>
</body>
</html>