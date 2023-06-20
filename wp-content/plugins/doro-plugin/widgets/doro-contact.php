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
class Doro_Contact extends Widget_Base {

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
		return 'doro-contact';
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
		return __( 'Doro Contact', 'doro-plugin' );
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
		return 'eicon-device-mobile';
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
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'content_type', [
				'label' => __( 'Content Type', 'doro-plugin' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
						'st1' => 'Email',
						'st2' => 'Phone',
						'st3' => 'Location',
					],
				'default' => 'st1',
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'data_address',
			[
				'label' => __( 'Location Name', 'doro-plugin' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'Add Content',
				'description' => __( 'Ex: 24 King St, Charleston, 29401 USA', 'doro-plugin' ),
				'label_block' => true,
				'condition' => [
					'content_type' => 'st3',
				],				
			]
		);
		$repeater->add_control(
			'data_url',
			[
				'label' => __( 'Location URL', 'doro-plugin' ),
				'type' => Controls_Manager::TEXT,
				'default' => '',
				'description' => __( 'Ex: yoursite.com', 'doro-plugin' ),
				'label_block' => true,
				'condition' => [
					'content_type' => 'st3',
				],
			]
		);
		$repeater->add_control(
			'button_target', [
				'label' => __( 'Location URL Target', 'doro-plugin' ),
				'type' => Controls_Manager::SELECT,
				'description' => 'Works only for content type Custom URL.',
				'options' => [
						'_self' => 'Self',
						'_blank' => 'Blank',
						'_parent' => 'Parent',
						'_top' => 'Top',
					],
				'default' => '_self',
				'label_block' => true,
				'condition' => [
					'content_type' => 'st3',
					'data_url!' => '',
				],			
			]
		);		
		$repeater->add_control(
			'data_email',
			[
				'label' => __( 'Email Address', 'doro-plugin' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'yourmail@domain.com',
				'description' => __( 'Ex: yourmail@domain.com', 'doro-plugin' ),
				'label_block' => true,
				'condition' => [
					'content_type' => 'st1',
				],
			]
		);
		$repeater->add_control(
			'data_phone',
			[
				'label' => __( 'Phone Number', 'doro-plugin' ),
				'type' => Controls_Manager::TEXT,
				'default' => '+1-650-444-0000',
				'description' => __( 'Ex: +1-650-444-0000', 'doro-plugin' ),
				'label_block' => true,
				'condition' => [
					'content_type' => 'st2',
				],
			]
		);			
		$this->add_control(
			'contact_info_loop',
			[
				'label' => __( 'Contact Information', 'doro-plugin' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);
		
		$this->end_controls_section();			
		
		$this->start_controls_section(
			'section_style_content',
			[
				'label' => __( 'Content', 'doro-plugin' ),
				'tab' => Controls_Manager::TAB_STYLE,				
			]
		);
		
		$this->add_control(
			'text_color',
			[
				'label' => __( 'Color', 'doro-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sec-contact-info p' => 'color: {{VALUE}};',
					'{{WRAPPER}} .sec-contact-info a' => 'color: {{VALUE}};',
				],
				'default' =>'',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'text_typography',
				'selector' => '{{WRAPPER}} p',
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
        
		<div class="sec-contact-info">		    
			<?php if ( $settings['contact_info_loop'] ) { ?>			
				<?php foreach( $settings['contact_info_loop'] as $contact_info_loops ) { ?>
					<?php if( $contact_info_loops['content_type'] == 'st3' ) { ?>
					    <p><i class="et-map-pin"></i> <?php if ( $contact_info_loops['data_url'] ) { ?><a href="<?php echo esc_url($contact_info_loops['data_url']); ?>" target="<?php echo esc_attr($contact_info_loops['button_target']); ?>"><?php } ;?>	 <?php echo esc_html($contact_info_loops['data_address']); ?><?php if ( $contact_info_loops['data_url'] ) { ?></a><?php } ;?>	 </p>
					<?php } 
					else if( $contact_info_loops['content_type'] == 'st2' ) { ?>						
					    <p><i class="et-phone"></i> <a href="tel:<?php echo esc_attr($contact_info_loops['data_phone']); ?>"><?php echo esc_html($contact_info_loops['data_phone']); ?></a></p> 					
					<?php } 
					else { ?>						 
						<p><i class="et-envelope"></i> <a href="mailto:<?php echo esc_attr($contact_info_loops['data_email']); ?>"><?php echo esc_html($contact_info_loops['data_email']); ?></a></p> 
					<?php } ;?>	 

				<?php } ;?>
			<?php } ;?>	
        </div>
		
        <?php		

	}

}