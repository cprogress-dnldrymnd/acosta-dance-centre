<?php $doro_options = get_option('doro'); ?>
<?php get_header();?>
	<!-- Blog -->
	<div class="doro-blog">
		<div class="container-fluid">
            <?php get_template_part('template-parts/header/title-section-3');?>
			<?php get_template_part('template-parts/post/post-page');?>
		</div>
	</div>				
<?php get_footer(); ?>	