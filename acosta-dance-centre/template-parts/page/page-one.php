<?php $doro_options = get_option('doro'); ?>
<?php if(has_nav_menu('main-menu')) {?>
<?php 
    if ( ( $locations = get_nav_menu_locations() ) && $locations['main-menu'] ) {
        $menu = wp_get_nav_menu_object( $locations['main-menu'] );
        $menu_items = wp_get_nav_menu_items($menu->term_id);
        $include = array();
        foreach($menu_items as $item) {
            if($item->object == 'page')
                $include[] = $item->object_id;
        }
        $main_query = new WP_Query( array( 'post_type' => 'page', 'post__in' => $include, 'posts_per_page' => count($include), 'orderby' => 'post__in' ) );
    }
    
    $i = 1;
    while ($main_query->have_posts()) : $main_query->the_post();
    global $post, $separatepages;

    $post_name = $post->post_name;    
    $post_id = get_the_ID();
     ?>
	<?php $separatepages = get_post_meta($post->ID,'rnr_open_page',true);

    if (($separatepages != true ))
    { ?> 
		
		<div id="<?php echo $post->post_name;?>" class="section">

			<?php global $more; $more = 0; the_content('');?>
		
		</div>

    <?php $i++;}  endwhile; wp_reset_postdata(); ?>
<?php } ;?>