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
class Doro_Image extends Widget_Base {

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
		return 'doro-image';
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
		return __( 'Doro Image', 'doro-plugin' );
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
		return 'eicon-image';
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
			'section_image',
			[
				'label' => __( 'Image', 'doro-plugin' ),
			]
		);		
		$this->add_control(
			'image',
			[
				'label' => __( 'Image', 'doro-plugin' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => '',
				],
				'label_block' => true,			
			]
		);
			
		$this->add_control(
			'button_url',
			[
				'label' => __( 'Custom URL', 'doro-plugin' ),
				'type' => Controls_Manager::TEXT,
				'default' => '',
				'label_block' => true,
                'condition' => [
					'image[url]!' => '',
				],
			]
		);		
		$this->add_control(
			'button_target',
			[
				'label' => __( 'Custom URL Target', 'doro-plugin' ),
				'description' => __( '', 'doro-plugin' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'_self' => 'Self',
					'_blank' => 'Blank',
					'_parent' => 'Parent',
					'_top' => 'Top',
				],
				'default' => '_self',
				'label_block' => true,
				'condition' => [
					'button_url!' => '',
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

			<div class="sec-image">
				<?php if ( $settings['button_url'] ) { ?>
				<a href="<?php echo esc_url($settings['button_url']); ?>" target="<?php echo esc_attr($settings['button_target']); ?>">
				<?php } ;?>			
				<img src="<?php echo esc_url($settings['image']['url']); ?>" class="img-fluid" alt="<?php echo esc_attr($settings['image']['alt']); ?>" />
				<?php if ( $settings['button_url'] ) { ?>
				</a>
				<?php } ;?>					
			</div>						
			
        <?php
		

	}

}