<?php
namespace DOROEL\Widgets;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Typography;
use Elementor\Utils;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Border;
//use Elementor\WP_Query;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Hello World
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class Doro_Portfolio_Grid extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'doro-portfolio-grid';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Doro Portfolio Grid', 'doro-plugin' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-gallery-grid';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	 public function get_categories() {
 	    return [ 'doro-addons' ];
 	}
	
	/**
	 * A list of scripts that the widgets is depended in
	 **/
	public function get_script_depends() {
		return [ 
			'isotope',
			'imagesloaded',			
			'elementor-load-more-portfolio',
		 ];
	}
	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function register_controls() {
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Post Options', 'doro-plugin' ),
			]
		);	
		$this->add_control(
			'col_size',
			[
				'label' => __( 'Grid Column', 'doro-plugin' ),
				'description' => __( '', 'doro-plugin' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'col-md-6' => '1/2 Column',
					'col-md-4' => '1/3 Column',
					'col-md-3' => '1/4 Column',
					'col-md-12' => '1/1 Column',
				],
				'default' => 'col-md-6',
				'label_block' => true,
			]			
		);	

		$this->add_control(
			'post_pagination',
			[
				'label' => __( 'Load More Button', 'doro-plugin' ),
				'description' => __( '', 'doro-plugin' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'st1' => 'Disable',
					'st2' => 'Enable',
				],
				'default' => 'st1',
				'label_block' => true,
			]			
		);		
		$this->add_control(
			'post_show_before_loadmore',
			[
				'label' => __( 'Number of posts to show before load more button.', 'doro-plugin' ),
				'type' => Controls_Manager::TEXT,
				'default' => '2',
				'description' => __( 'Ex: 2', 'doro-plugin' ),
				'label_block' => true,
				'condition' => [
					'post_pagination' => 'st2',
				],
			]
		);
		
		$this->add_control(
			'postcount', [
				'label' => __( 'Number of posts to show', 'doro-plugin' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( '6' , 'doro-plugin' ),
				'description' => __( '(Optional) Insert number of post show in format: 8', 'doro-plugin' ),
				'label_block' => true,
			]
		);		
		$this->add_control(
			'categoryname', [
				'label' => __( 'Include Category', 'doro-plugin' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( '' , 'doro-plugin' ),
				'description' => __( '(Optional) Insert category name in format: Graphic', 'doro-plugin' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'categoryname_exclude', [
				'label' => __( 'Exclude Category Information', 'doro-plugin' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( '' , 'doro-plugin' ),
				'description' => __( 'Exclude category information from the portfolio item info. Ex: 6 <br>For multiple category ID Ex: 6 7', 'doro-plugin' ),
				'label_block' => true,
			]
		);		
		$this->add_control(
			'postoffset', [
				'label' => __( 'Post Offset', 'doro-plugin' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( '' , 'doro-plugin' ),
				'description' => __( '(Optional)', 'doro-plugin' ),
				'label_block' => true,
			]
		);			
        $this->add_control(
			'title_tag',
			[
				'label' => __( 'Title Tag', 'doro-plugin' ),
				'description' => __( '', 'doro-plugin' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'1' => 'h1',
					'2' => 'h2',
					'3' => 'h3',
					'4' => 'h4',
					'5' => 'h5',
					'6' => 'h6',
				],
				'default' => '3',
				'label_block' => true,
			]
		);	

		$this->end_controls_section();							
		
		$this->start_controls_section(
			'port_item',
			[
				'label' => __( 'Title', 'doro-plugin' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);			
		$this->add_control(
			'title_color',
			[
				'label' => __( 'Title Color', 'doro-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .project .desc h1' => 'color: {{VALUE}};',
					'{{WRAPPER}} .project .desc h2' => 'color: {{VALUE}};',
					'{{WRAPPER}} .project .desc h3' => 'color: {{VALUE}};',
					'{{WRAPPER}} .project .desc h4' => 'color: {{VALUE}};',
					'{{WRAPPER}} .project .desc h5' => 'color: {{VALUE}};',
					'{{WRAPPER}} .project .desc h6' => 'color: {{VALUE}};',
				],
				'default' =>'',
			]
		);		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .project .desc h1, {{WRAPPER}} .project .desc h2, {{WRAPPER}} .project .desc h3, {{WRAPPER}} .project .desc h4, {{WRAPPER}} .project .desc h5, {{WRAPPER}} .project .desc h6',
			]
		);	
		$this->end_controls_section();
		
		$this->start_controls_section(
			'port_item_cat',
			[
				'label' => __( 'Category', 'doro-plugin' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);	
		$this->add_control(
			'meta_info_color',
			[
				'label' => __( 'Category Color', 'doro-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .project .desc span' => 'color: {{VALUE}};',
				],
				'default' =>'',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'meta_info_typography',
				'selector' => '{{WRAPPER}} .project .desc span',
			]
		);	

		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_style_background',
			[
				'label' => __( 'Overlay', 'doro-plugin' ),
				'tab' => Controls_Manager::TAB_STYLE,					
			]
		);	
		
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'back_block_color',
				'label' => esc_html__( 'Overlay Color', 'bauen-plugin' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .project .desc',
			]
		);	
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_form_button',
			[
				'label' => __( 'Button', 'doro-plugin' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'button_color',
			[
				'label' => __( 'Icon Color', 'doro-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .plus' => 'background: {{VALUE}};',
					'{{WRAPPER}} .plus:after' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'button_color_hover',
			[
				'label' => __( 'Icon Color Hover', 'doro-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .doro-more-trigger:hover .plus, {{WRAPPER}} .doro-more-trigger:hover .plus:after' => 'background: {{VALUE}};',
				],
			]
		);		
		$this->add_control(
			'button_background',
			[
				'label' => __( 'Border Color', 'doro-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .doro-more-trigger' => 'border-color: {{VALUE}};',
				],
			]
		);		
		$this->add_control(
			'button_background_hover',
			[
				'label' => __( 'Background Color Hover', 'doro-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .doro-more-trigger:hover' => 'background: {{VALUE}}; border-color: {{VALUE}};',
				],
			]
		);			
		
		$this->end_controls_section();			
									
		
	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings();

        ?>

		<div class="sec-portfolio"> 
			<div class="container-after-gallery-port sec-gallery">
			<?php if ( $settings['post_pagination'] == 'st2' ) { 
			$load_main_count= $settings['post_show_before_loadmore'];
			}
			else {
				$load_main_count='10000000';
			}
			?>
			<div class="row isotope-items-wrap-port  no-hide-last loadmore-wrapper-gallery-port" data-load-item="<?php echo esc_attr($load_main_count); ?>">					
				<?php
				global $post, $doro_image, $post_show_before_loadmore;
				$doro_paged=(get_query_var('paged'))?get_query_var('paged'):1;
				$loop = new \WP_Query( array( 'post_type' => 'portfolio','portfolio_category'=> $settings['categoryname'], 'posts_per_page'=> $settings['postcount'], 'post_status' => 'publish', 'offset' => $settings['postoffset'], 'paged'=>$doro_paged) );				
				while ( $loop->have_posts() ) : $loop->the_post();	
				$doro_portfolio_category = wp_get_post_terms($post->ID,'portfolio_category', array('exclude' => $settings['categoryname_exclude']));	
				$doro_class = ""; 
				$doro_categories = ""; 
				foreach ($doro_portfolio_category as $doro_item) {
					$doro_class.=esc_attr($doro_item->slug . ' ');
					$doro_categories.='<span class="cat-divider">';
					$doro_categories.=esc_attr($doro_item->name . '  ');
					$doro_categories.='</span>';
				}			
				if (has_post_thumbnail( $post->ID ) ):
				$doro_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' );
				?>					
				<div class="<?php echo esc_attr($settings['col_size']); ?> isotope-item <?php echo esc_attr($doro_class);?>">
					<a href="<?php the_permalink();?>" class="desc">
						<div class="project">
							<img src="<?php echo esc_url($doro_image[0]);?>" class="img-fluid" alt="<?php the_title();?>" />
							<div class="desc">
								<div class="con">
									<h<?php echo esc_attr($settings['title_tag']); ?>><?php the_title();?></h<?php echo esc_attr($settings['title_tag']); ?>>
									 <span><?php echo do_shortcode($doro_categories);?></span>
								</div>
							</div>
						</div>
					</a>
				</div>			
				<?php
				endif;
				endwhile;
				wp_reset_postdata();
				?>					
		    </div> 			
		    </div> 			
		</div>
		
        <?php
		

	}

}