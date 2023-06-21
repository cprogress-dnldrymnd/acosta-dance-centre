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
class Doro_Form extends Widget_Base {

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
		return 'doro-form';
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
		return __( 'Doro Form', 'doro-plugin' );
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
		return 'eicon-form-horizontal';
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
			'title',
			[
				'label' => __( 'Title', 'doro-plugin' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'Add Title',
				'description' => __( 'Ex: Contact Form', 'doro-plugin' ),
				'label_block' => true,
			]
		);		
		$this->add_control(
			'form_shortcode',
			[
				'label' => __( 'Form Shortcode', 'doro-plugin' ),
				'type' => Controls_Manager::TEXTAREA,
				'description' => 'Ex: [contact-form-7 id="5" title="Contact form 1"]',
				'default' => '',
				'label_block' => true,
			]
		);
		$this->end_controls_section();				
		
		$this->start_controls_section(
			'section_form_label',
			[
				'label' => __( 'Lable', 'doro-plugin' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'lable_color',
			[
				'label' => __( 'Lable Color', 'doro-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} form label' => 'color: {{VALUE}};',
				],
				
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'lable_typography',
				'selector' => '{{WRAPPER}} form label',
			]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_form_input',
			[
				'label' => __( 'Input', 'doro-plugin' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'input_color',
			[
				'label' => __( 'Text Color', 'doro-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vc_template textarea' => 'color: {{VALUE}};',
					'{{WRAPPER}} .vc_template input[type="text"]' => 'color: {{VALUE}};',
					'{{WRAPPER}} .vc_template input[type=email]' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'input_border_color',
			[
				'label' => __( 'Border Color', 'doro-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vc_template textarea' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .vc_template input[type="text"]' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .vc_template input[type=email]' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'input_typo',
				'selector' => '{{WRAPPER}} .vc_template textarea, {{WRAPPER}} .vc_template input[type="text"], {{WRAPPER}} .vc_template input[type=email]',
			]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_form_placeholder',
			[
				'label' => __( 'Placeholder', 'doro-plugin' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'placeholder_color',
			[
				'label' => __( 'Color', 'doro-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vc_template input::-webkit-input-placeholder, .vc_template textarea::-webkit-input-placeholder, .vc_template input[type="email"]::-webkit-input-placeholder, .vc_template input[type="text"]::-webkit-input-placeholder' => 'color: {{VALUE}}!important;',
					'{{WRAPPER}} .vc_template input:-moz-placeholder, .vc_template textarea:-moz-placeholder, .vc_template input[type="text"]:-moz-placeholder, .vc_template input[type="email"]:-moz-placeholder' => 'color: {{VALUE}}!important;',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => __( 'Chrome Placeholder', 'doro-plugin' ),
				'name' => 'placeholder_typography_webkit',
				'selector' => '{{WRAPPER}} .vc_template input::-webkit-input-placeholder, .vc_template textarea::-webkit-input-placeholder',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => __( 'Mozila Placeholder', 'doro-plugin' ),
				'name' => 'placeholder_typography_moz',
				'selector' => '{{WRAPPER}} .vc_template input:-moz-placeholder, .vc_template textarea:-moz-placeholder',
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
				'label' => __( 'Color', 'doro-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} form input[type=submit]' => 'color: {{VALUE}};',
				],
			]
		);	
		$this->add_control(
			'button_background',
			[
				'label' => __( 'Background Color', 'doro-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} form input[type=submit]' => 'background: {{VALUE}};',
				],
			]
		);			
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'button_typo',
				'selector' => '{{WRAPPER}} form input[type=submit]',
			]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_form_valid',
			[
				'label' => __( 'Valid & Response', 'doro-plugin' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'required_color',
			[
				'label' => __( 'Required Field Color', 'doro-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpcf7-not-valid-tip' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'response_color',
			[
				'label' => __( 'Response Color', 'doro-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpcf7 form.invalid .wpcf7-response-output' => 'color: {{VALUE}};',
					'{{WRAPPER}} .wpcf7 form.unaccepted .wpcf7-response-output' => 'color: {{VALUE}};',
				],
			]
		);		
		$this->add_control(
			'response_border',
			[
				'label' => __( 'Response Border Color', 'doro-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpcf7 form.invalid .wpcf7-response-output' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .wpcf7 form.unaccepted .wpcf7-response-output' => 'border-color: {{VALUE}};',
				],
			]
		);			
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'response_typo',
				'selector' => '{{WRAPPER}} .wpcf7-not-valid-tip, {{WRAPPER}} .wpcf7 form.invalid .wpcf7-response-output, {{WRAPPER}} .wpcf7 form.unaccepted .wpcf7-response-output',
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
		<div  class="sec-contact-form">
			<div class="custom-form row">
				<div  class="vc_template">
				   <?php echo do_shortcode($settings['form_shortcode']); ?>
				</div>	
			</div>	
		</div>	
		
        <?php		

	}

}