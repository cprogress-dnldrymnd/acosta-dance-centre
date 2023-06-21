<?php $doro_options = get_option('doro'); ?>
<?php while ( have_posts() ) : the_post(); ?>	
	<?php get_template_part('template-parts/header/title-section-1');?>									
		<div class="full-page-content">
		<?php the_content();
			 wp_link_pages( array(
			'before'      => '<div class="page-links">',
			'after'       => '</div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
			'pagelink'    => '%',
			'separator'   => '',
			) );													
			?>	
		</div>	
		<?php if ( comments_open() || get_comments_number() ) { ?>
		<div id="comments" class="single-post-comm fl-wrap">
			<?php comments_template();?>
		</div><!-- /.comments-section -->
		<?php }?>									
<?php endwhile; // end of the loop. ?>
<?php wp_reset_postdata();?>