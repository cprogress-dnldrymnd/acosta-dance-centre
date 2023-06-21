<?php
add_action('wp_enqueue_scripts', 'doro_add_stylesheet', 20);
function doro_add_stylesheet()
{
	wp_enqueue_style('doro-child-style', get_stylesheet_directory_uri() . '/style.css', false, '1.0', 'all');
}

function social_network()
{
	$doro_options = get_option('doro');
	ob_start();
	?>
	<?php if (Doro_AfterSetupTheme::return_thme_option('social-footer') != 'no') { ?>
		<ul class="social-network">
			<?php if (!empty($doro_options['facebook'])): ?>
				<li><a href="<?php echo esc_url($doro_options['facebook']); ?>" target="_blank"><i
							class="ti-facebook font-14px black-icon"></i></a></li>
			<?php endif; ?>

			<?php if (!empty($doro_options['twitter'])): ?>
				<li><a href="<?php echo esc_url($doro_options['twitter']); ?>" target="_blank"><i
							class="ti-twitter-alt font-14px black-icon"></i></a></li>
			<?php endif; ?>

			<?php if (!empty($doro_options['google-plus'])): ?>
				<li><a href="<?php echo esc_url($doro_options['google-plus']); ?>" target="_blank"><i
							class="ti-google font-14px black-icon"></i></a></li>
			<?php endif; ?>

			<?php if (!empty($doro_options['linkedin'])): ?>
				<li><a href="<?php echo esc_url($doro_options['linkedin']); ?>" target="_blank"><i
							class="ti-linkedin font-14px black-icon"></i></a></li>
			<?php endif; ?>

			<?php if (!empty($doro_options['instagram'])): ?>
				<li><a href="<?php echo esc_url($doro_options['instagram']); ?>" target="_blank"><i
							class="ti-instagram font-14px black-icon"></i></a></li>
			<?php endif; ?>

			<?php if (!empty($doro_options['pinterest'])): ?>
				<li><a href="<?php echo esc_url($doro_options['pinterest']); ?>" target="_blank"><i
							class="ti-pinterest-alt font-14px black-icon"></i></a></li>
			<?php endif; ?>

			<?php if (!empty($doro_options['soundcloud'])): ?>
				<li><a href="<?php echo esc_url($doro_options['soundcloud']); ?>" target="_blank"><i
							class="ti-soundcloud font-14px black-icon"></i></a></li>
			<?php endif; ?>

			<?php if (!empty($doro_options['skype'])): ?>
				<li><a href="<?php echo esc_url($doro_options['skype']); ?>" target="_blank"><i
							class="ti-skype font-14px black-icon"></i></a></li>
			<?php endif; ?>

			<?php if (!empty($doro_options['dribbble'])): ?>
				<li><a href="<?php echo esc_url($doro_options['dribbble']); ?>" target="_blank"><i
							class="ti-dribbble font-14px black-icon"></i></a></li>
			<?php endif; ?>

			<?php if (!empty($doro_options['youtube'])): ?>
				<li><a href="<?php echo esc_url($doro_options['youtube']); ?>" target="_blank"><i
							class="ti-youtube font-14px black-icon"></i></a></li>
			<?php endif; ?>

			<?php if (!empty($doro_options['vimeo'])): ?>
				<li><a href="<?php echo esc_url($doro_options['vimeo']); ?>" target="_blank"><i
							class="ti-vimeo font-14px black-icon"></i></a></li>
			<?php endif; ?>

			<?php if (!empty($doro_options['dropbox'])): ?>
				<li><a href="<?php echo esc_url($doro_options['dropbox']); ?>" target="_blank"><i
							class="ti-dropbox font-14px black-icon"></i></a></li>
			<?php endif; ?>

			<?php if (!empty($doro_options['github'])): ?>
				<li><a href="<?php echo esc_url($doro_options['github']); ?>" target="_blank"><i
							class="ti-github font-14px black-icon"></i></a></li>
			<?php endif; ?>
			<?php if (!empty($doro_options['tumblr'])): ?>
				<li><a href="<?php echo esc_url($doro_options['tumblr']); ?>" target="_blank"><i
							class="ti-tumblr-alt font-14px black-icon"></i></a></li>
			<?php endif; ?>

			<?php if (!empty($doro_options['email'])): ?>
				<li><a href="mailto:<?php echo esc_attr($doro_options['email']); ?>" target="_blank"><i
							class="ti-email font-14px black-icon"></i></a></li>
			<?php endif; ?>

			<?php
			$doro_more_social = Doro_AfterSetupTheme::return_thme_option('opt_add_more_social', '');
			if (!empty($doro_more_social)) {
				foreach ($doro_more_social as $doro_more_socials) {
					; ?>
					<?php echo balanceTags($doro_more_socials); ?>
				<?php }
			}
			; ?>
		</ul>
	<?php } ?>
	<?php

	return ob_get_clean();
}

add_shortcode('social_network', 'social_network');