<?php
define('DORO_THEME_PATH',		get_template_directory());
define('DORO_THEME_URL',		get_template_directory_uri());
require (DORO_THEME_PATH . '/includes/style.php');
require (DORO_THEME_PATH . '/includes/js.php');
require (DORO_THEME_PATH . '/includes/AfterSetupTheme.php');
require (DORO_THEME_PATH . '/includes/functions.php');
require (DORO_THEME_PATH . '/includes/ini/doro-base.php'); 
require (DORO_THEME_PATH . '/pagination.php');

if ( ! isset( $content_width ) ) $content_width = 900;	

$doro_options = get_option('doro');

// register nav menu
function doro_register_menus() {
register_nav_menus( array( 
'top-menu' => esc_html__( 'Primary menu','doro' ),
'main-menu' => esc_attr__('One Page Menu ','doro'),
)
		);
}


add_action( 'after_setup_theme', 'doro_setup' );
function doro_setup() {
	
    // Add support for Block Styles.
	add_theme_support( 'wp-block-styles' );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );

	// Add support for editor styles.
	add_theme_support( 'editor-styles' );
	// Enqueue editor styles.
	add_editor_style( 'style-editor.css' );
	
	// Add custom editor font sizes.
	add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => esc_html__( 'Small', 'doro' ),
					'shortName' => esc_html__( 'S', 'doro' ),
					'size'      => 10,
					'slug'      => 'small',
				),
				array(
					'name'      => esc_html__( 'Normal', 'doro' ),
					'shortName' => esc_html__( 'M', 'doro' ),
					'size'      => 12,
					'slug'      => 'normal',
				),
				array(
					'name'      => esc_html__( 'Large', 'doro' ),
					'shortName' => esc_html__( 'L', 'doro' ),
					'size'      => 36,
					'slug'      => 'large',
				),
				array(
					'name'      => esc_html__( 'Huge', 'doro' ),
					'shortName' => esc_html__( 'XL', 'doro' ),
					'size'      => 49,
					'slug'      => 'huge',
				),
			)
		);
	
	add_theme_support( 'editor-color-palette', array(
        array(
            'name' => esc_html__( 'Green', 'doro' ),
            'slug' => 'color-green',
            'color' => '#ffc815',
        ),
        array(
            'name' => esc_html__( 'Grey', 'doro' ),
            'slug' => 'color-grey',
            'color' => '#292929',
        ),
        
    ) );
	
	add_action( 'after_setup_theme', 'doro_lang_setup' );
	function doro_lang_setup(){
    load_theme_textdomain('doro', get_template_directory() . '/languages');
    }
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( "title-tag" );
	remove_theme_support( 'widgets-block-editor' );
}
// Word Limit 
	function doro_string_limit_words($string, $word_limit)
	{
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
	}
// Add post thumbnail functionality
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 559, 220, true ); // Normal post thumbnails
	add_image_size( 'doro_blog_image', 315, 205, true ); // Blog Thumbnail
	add_image_size( 'doro_portfolio_image', 758, 520, true ); // Portfolio Thumbnail
	
function doro_move_comment_field_to_bottom( $fields ) {
$comment_field = $fields['comment'];
unset( $fields['comment'] );
$fields['comment'] = $comment_field;
return $fields;
}
 
add_filter( 'comment_form_fields', 'doro_move_comment_field_to_bottom' );

// How comments are displayed
function doro_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);
if ( 'div' == $args['style'] ) {
      $tag = 'div';
      $add_below = 'comment';
    } else {
      $tag = 'li';
      $add_below = 'div-comment';
    }
?>
    <<?php echo esc_attr($tag); ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?>>
    <?php if ( 'div' != $args['style'] ) : ?>	
    <?php endif; ?>    
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
		<div class="comment-author vcard"> 
		    <?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, '70' ); ?>
			<h3 class="name"><?php printf(__('%s','doro'), get_comment_author_link()) ?></h3> 
		</div>
		<div class="comment-meta"><?php comment_date(get_option( 'date_format')); ?></div>	
		<div class="comment-text fl-wrap">
			<?php comment_text() ?>
		</div>	
		<div class="reply"> <i class="ti-back-left"></i> <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?> </div> 
	</div>
    <div class="clearfix"></div>
      <?php if ($comment->comment_approved == '0') : ?>
    <em class="comment-awaiting-moderation"><?php esc_html_e('Your comment is awaiting moderation.','doro') ?></em>
    <br />
	
   <?php endif; ?>    
<?php if ( 'div' != $args['style'] ) : ?>
    
    <?php endif; ?>
<?php
        }
// create sidebar & widget area
if(function_exists('register_sidebar')) {
function doro_theme_slug_widgets_init() {
    register_sidebar( array(
        'name' => esc_html__( 'Blog Sidebar', 'doro' ),
        'id' => 'sidebar-1',
        'description' => esc_html__( 'This area for blog widgets.', 'doro' ),
        'before_widget' => '<div id="%1$s" class="widget widget-block doro-sidebar-block %2$s"><div class="doro-sidebar-block-content">',
		'after_widget'  => '</div></div>', 
		'before_title'  => '<div class="doro-sidebar-block-title">', 
		'after_title'   => '</div>'
    ) );
}
add_action( 'widgets_init', 'doro_theme_slug_widgets_init' );

function doro_widgets_init() {
    register_sidebar( array(
        'name' => esc_html__( 'Page Sidebar', 'doro' ),
        'id' => 'sidebar-2',
        'description' => esc_html__( 'This area for pages widgets.', 'doro' ),
        'before_widget' => '<div id="%1$s" class="widget widget-block doro-sidebar-block %2$s"><div class="doro-sidebar-block-content">',
		'after_widget'  => '</div></div>', 
		'before_title'  => '<div class="doro-sidebar-block-title">', 
		'after_title'   => '</div>'
    ) );
}
add_action( 'widgets_init', 'doro_widgets_init' );

}
function doro_excerpt_more( $more ) {
    return '...';
}
add_filter('excerpt_more', 'doro_excerpt_more');
function doro_excerpt_length( $length ) {
    return 25;
}
add_filter( 'excerpt_length', 'doro_excerpt_length', 999 );

if(function_exists('vc_set_as_theme')) vc_set_as_theme();
// Initialising Shortcodes
if (class_exists('WPBakeryVisualComposerAbstract')) {
  function requireVcExtend(){
    require_once get_template_directory() . '/extendvc/extend-vc.php';
  }
}

function doro_my_search_form( $form ) {
$doro_options = get_option('doro_wp');
if(!empty($doro_options['translet_opt_22'])) {
$doro_search_text = esc_html(Doro_AfterSetupTheme::return_thme_option('translet_opt_22',''));
}
else {
$doro_search_text ='Search...';
}
    $doro_form = '<form role="search" method="get" id="searchform" class="searh-inner fl-wrap" action="' . esc_url(home_url( '/' )) . '" >
    <div><label class="screen-reader-text" for="s">' . esc_html__( 'Search for:','doro' ) . '</label>
    <input type="text" value="' . get_search_query() . '" name="s" id="s" class="search fl-wrap" placeholder="'. esc_attr($doro_search_text).'" />
    </div>
    </form>';
 
    return $doro_form;
}
add_filter( 'get_search_form', 'doro_my_search_form' );

function doro_body_classes( $classes ) {
	if (doro_AfterSetupTheme::return_thme_option('colorstyle')=='yes'){ 
    $classes[] = 'dark-version';
    } else {
	$classes[] = 'light-version';	
	}	
    return $classes;
}
add_filter( 'body_class','doro_body_classes' );

add_filter("use_block_editor_for_post_type", "doro_disable_gutenberg_editor");
function doro_disable_gutenberg_editor()
{
return false;
}

if (is_admin() && isset($_GET['activated'])){
	wp_redirect(admin_url("themes.php?page=doro"));
}