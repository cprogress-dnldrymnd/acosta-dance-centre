<?php $doro_options = get_option('doro'); ?>
<?php while (have_posts()):
  the_post(); ?>
  <div class="doro-about xxxx">
    <div class="container-fluid">
      <?php get_template_part('template-parts/header/title-section'); ?>
      <div class="page-content">
        <?php the_content();
        wp_link_pages(
          array(
            'before'      => '<div class="page-links">',
            'after'       => '</div>',
            'link_before' => '<span>',
            'link_after'  => '</span>',
            'pagelink'    => '%',
            'separator'   => '',
          ));
        ?>
      </div>
      <?php if (comments_open() || get_comments_number()) { ?>
        <div id="comments" class="single-post-comm fl-wrap">
          <?php comments_template(); ?>
        </div><!-- /.comments-section -->
      <?php } ?>
    </div>
  </div>
<?php endwhile; // end of the loop. ?>
<?php wp_reset_postdata(); ?>