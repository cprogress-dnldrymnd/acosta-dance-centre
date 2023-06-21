<?php $doro_options = get_option('doro'); ?>
<?php get_header();?>
	<?php if(get_post_meta($post->ID,'rnr_page_layout',true)=='st1'){ ?> 
        <?php get_template_part('template-parts/page/page-right');?>
	<?php } else if(get_post_meta($post->ID,'rnr_page_layout',true)=='st3') { ?>
         <?php get_template_part('template-parts/page/page-full');?>	
	<?php } else if(get_post_meta($post->ID,'rnr_page_layout',true)=='st2'){ ?> 
	    <?php get_template_part('template-parts/page/page-one');?>				 
	<?php } else  { ?>
		<?php get_template_part('template-parts/page/page-default');?>
	<?php }?>
<?php get_footer(); ?>
       
  

