<?php $doro_options = get_option('doro'); ?>
<?php get_header();?>
	<?php if (Doro_AfterSetupTheme::return_thme_option('blogtyle')=='st2'){ ?>
	    <?php get_template_part('template-parts/single/left');?>
	<?php } else { ?>
	    <?php get_template_part('template-parts/single/right');?>
	<?php } ;?>
<?php get_footer(); ?>