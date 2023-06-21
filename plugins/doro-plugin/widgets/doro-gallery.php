<?php
namespace DOROEL\Widgets;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Typography;
use Elementor\Utils;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Border;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Hello World
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class Doro_Gallery extends Widget_Base {

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
		return 'doro-gallery';
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
		return __( 'Doro Gallery', 'doro-plugin' );
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
			'fancybox',
			'elementor-load-more',
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
				'label' => __( 'Gallery Images', 'doro-plugin' ),
			]
		);
		
		$this->add_control(
			'gallery',
			[
				'label' => esc_html__( 'Add Images', 'doro-plugin' ),
				'type' => \Elementor\Controls_Manager::GALLERY,
				'default' => [],
				'description' => __( 'Upload same size images.', 'doro-plugin' ),
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
				'default' => '3',
				'description' => __( 'Ex: 3', 'doro-plugin' ),
				'label_block' => true,
				'condition' => [
					'post_pagination' => 'st2',
				],
			]
		);
		
		$this->add_control(
			'grid_column',
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
				'default' => 'col-md-4',
				'label_block' => true,
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
		
		<?php if ( $settings['post_pagination'] == 'st2' ) { 
			$load_main_count= $settings['post_show_before_loadmore'];
		}
		else {
			$load_main_count='10000000';
		}
		?>
		<div class="container-after-gallery sec-gallery">
		<div class="row isotope-items-wrap  no-hide-last loadmore-wrapper-gallery" data-load-item="<?php echo esc_attr($load_main_count); ?>" >	
			<?php foreach ( $settings['gallery'] as $doro_image ) { ?>	
			<?php $doro_caption = wp_get_attachment_caption( $doro_image['id'] );?>			
			<?php $doro_alt =  get_post_meta( $doro_image['id'], '_wp_attachment_image_alt', true);?>			
				<div class="<?php echo esc_attr($settings['grid_column']); ?> gallery-item isotope-item ">					
					<figure>	
						<a class="d-block mb-4" data-fancybox="images" href="<?php echo esc_url($doro_image['url']);?>" data-caption="<?php echo esc_attr($doro_caption);?>"> <img class="img-fluid" src="<?php echo esc_url($doro_image['url']);?>" alt="<?php echo esc_attr($doro_alt);?>" /> </a>											
					</figure>	
				</div>	
			<?php } ;?>	
		</div>		
		</div>		

        <?php		

	}

}