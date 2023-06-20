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
class Doro_Title extends Widget_Base {

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
		return 'doro-title';
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
		return __( 'Doro Section Title', 'doro-plugin' );
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
		return 'eicon-t-letter';
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
			'section_content',
			[
				'label' => __( 'Content', 'doro-plugin' ),
			]
		);		
		$this->add_control(
			'style_type',
			[
				'label' => __( 'Title Style', 'doro-plugin' ),
				'description' => __( 'Select style type.', 'doro-plugin' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'st1' => 'Style 1',
					'st2' => 'Style 2',
				],
				'default' => 'st1',
				'label_block' => true,
			]
		);					
		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'doro-plugin' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => 'Add Title',
				'description' => __( 'Ex: About Us', 'doro-plugin' ),
				'label_block' => true,
			]
		);	
		$this->add_control(
			'subtitle',
			[
				'label' => __( 'Subtitle', 'doro-plugin' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => 'Add Subtitle',
				'description' => __( 'Ex: We Are Agency', 'doro-plugin' ),
				'label_block' => true,
			]
		);		
        $this->add_control(
			'text_align',
			[
				'label' => esc_html__( 'Alignment', 'doro-plugin' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'text-left' => [
						'title' => esc_html__( 'Left', 'doro-plugin' ),
						'icon' => 'eicon-text-align-left',
					],
					'text-center' => [
						'title' => esc_html__( 'Center', 'doro-plugin' ),
						'icon' => 'eicon-text-align-center',
					],
					'text-right' => [
						'title' => esc_html__( 'Right', 'doro-plugin' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'text-left',
				'toggle' => true,
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
				'default' => '2',
				'label_block' => true,
			]
		);			
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_style_title',
			[
				'label' => __( 'Title', 'doro-plugin' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'doro-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .doro-heading' => 'color: {{VALUE}};',
					'{{WRAPPER}} .doro-about-heading' => 'color: {{VALUE}};',
				],
				'default' =>'',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',			
				'selector' => '{{WRAPPER}} .doro-heading, {{WRAPPER}} .doro-about-heading',
			]
		);
		$this->end_controls_section();		
		
		$this->start_controls_section(
			'section_style_subtitle',
			[
				'label' => __( 'Subtitle', 'doro-plugin' ),
				'tab' => Controls_Manager::TAB_STYLE,				
			]
		);
		
		$this->add_control(
			'subtitle_color',
			[
				'label' => __( 'Color', 'doro-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .heading-meta' => 'color: {{VALUE}};',
				],
				'default' =>'',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'subtitle_typography',
				'selector' => '{{WRAPPER}} .heading-meta',
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
		
		<div class="sec-title <?php echo esc_attr($settings['text_align']); ?>">
            <?php if ( $settings['subtitle'] ) { ?>
				<span class="heading-meta"><?php echo esc_html($settings['subtitle']); ?></span>
			<?php }; ?>			
			<?php if ( $settings['style_type'] == 'st2' ) { ?>
				<?php if ( $settings['title'] ) { ?>
				<h<?php echo esc_attr($settings['title_tag']); ?> class="doro-about-heading"><?php echo do_shortcode($settings['title']); ?></h<?php echo esc_attr($settings['title_tag']); ?>>
				<?php }; ?>								
			<?php } 
			else { ?>	
				<?php if ( $settings['title'] ) { ?>
				<h<?php echo esc_attr($settings['title_tag']); ?> class="doro-heading"><?php echo do_shortcode($settings['title']); ?></h<?php echo esc_attr($settings['title_tag']); ?>>
				<?php }; ?>	
			<?php } ;?>	
        </div> 
			
        <?php
		

	}

}