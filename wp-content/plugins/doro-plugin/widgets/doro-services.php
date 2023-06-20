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
class Doro_Services extends Widget_Base {

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
		return 'doro-services';
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
		return __( 'Doro Icon & Text', 'doro-plugin' );
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
		return 'eicon-icon-box';
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
			'icon_type',
			[
				'label' => __( 'Icon Type', 'doro-plugin' ),
				'description' => __( 'Select icon type.', 'doro-plugin' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'st1' => 'ET Line',
					'st2' => 'Fontawesome',
				],
				'default' => 'st1',
				'label_block' => true,
			]
		);		
		
		$this->add_control(
			'icon_class',
			[
				'label' => __( 'Icon Class', 'doro-plugin' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'et-lightbulb',
				'description' => __( 'Insert <strong><a href="https://museomix.be/doc/Icons-ET-LineIcons.html" target="_blank">ET Line</a></strong> Icon Class here. <br> Ex: et-lightbulb ', 'doro-plugin' ),
				'label_block' => true,
				'condition' => [
					'icon_type' => 'st1',
				],				
			]
		);			
		$this->add_control(
			'icon_class2',
			[
				'label' => esc_html__( 'Icon', 'doro-plugin' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fal fa-bullhorn',
					'library' => 'solid',
				],
				
                'skin' =>'inline',
				'label_block' => false,
				'condition' => [
					'icon_type' => 'st2',
				],					
			]
		);			
		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'doro-plugin' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'Add Title',
				'description' => __( 'Ex: Web App', 'doro-plugin' ),
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
			]
		);	

		$this->add_control(
			'block-content',
			[
				'label' => __( 'Content', 'doro-plugin' ),
				'type' => Controls_Manager::WYSIWYG,
				'default' => '',				
			]				
		);	
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_style_icon',
			[
				'label' => __( 'Icon', 'doro-plugin' ),
				'tab' => Controls_Manager::TAB_STYLE,							
			]
		);
		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Color', 'doro-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .doro-feature .doro-icon' => 'color: {{VALUE}};',
					'{{WRAPPER}} .doro-feature .doro-icon i' => 'color: {{VALUE}};',
				],
				'default' =>'',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'icon_typography',
				'selector' => '{{WRAPPER}} .doro-feature .doro-icon .font-35px, {{WRAPPER}} .doro-feature .doro-icon .font-35px i',
			]
		);
		
		$this->end_controls_section();			
		
		$this->start_controls_section(
			'section_style_title',
			[
				'label' => __( 'Title Options', 'doro-plugin' ),
				'tab' => Controls_Manager::TAB_STYLE,
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
		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'doro-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .doro-feature .doro-text h1' => 'color: {{VALUE}};',
					'{{WRAPPER}} .doro-feature .doro-text h2' => 'color: {{VALUE}};',
					'{{WRAPPER}} .doro-feature .doro-text h3' => 'color: {{VALUE}};',
					'{{WRAPPER}} .doro-feature .doro-text h4' => 'color: {{VALUE}};',
					'{{WRAPPER}} .doro-feature .doro-text h5' => 'color: {{VALUE}};',
					'{{WRAPPER}} .doro-feature .doro-text h6' => 'color: {{VALUE}};',
				],				
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .doro-feature .doro-text h1, {{WRAPPER}} .doro-feature .doro-text h2, {{WRAPPER}} .doro-feature .doro-text h3, {{WRAPPER}} .doro-feature .doro-text h4, {{WRAPPER}} .doro-feature .doro-text h5, {{WRAPPER}} .doro-feature .doro-text h6',
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
			'content_color',
			[
				'label' => __( 'Color', 'doro-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .doro-text-p' => 'color: {{VALUE}};',
					'{{WRAPPER}} .doro-text-p p' => 'color: {{VALUE}};',
				],
				'default' =>'',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'text_typography',
				'selector' => '{{WRAPPER}} .doro-text-p, {{WRAPPER}} .doro-text-p p',
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

		<div class="sec-icon doro-feature">			    
			<div class="doro-icon">
				<?php if ( $settings['icon_type'] == 'st2' ) { ?>
				    <span class="font-35px"><?php \Elementor\Icons_Manager::render_icon( $settings['icon_class2'], [ 'aria-hidden' => 'true' ] ); ?></span>
				<?php } 
				else { ?>	
					<span class="<?php echo esc_attr($settings['icon_class']); ?> font-35px"></span>	
				<?php } ;?>							    
			</div>			
			<div class="doro-text">
			    <?php if ( $settings['button_url'] ) { ?>
				<a href="<?php echo esc_url($settings['button_url']); ?>" target="<?php echo esc_attr($settings['button_target']); ?>">
				<?php } ;?>	
					<?php if ( $settings['title'] ) { ?>
					<h<?php echo esc_attr($settings['title_tag']); ?>><?php echo do_shortcode($settings['title']); ?></h<?php echo esc_attr($settings['title_tag']); ?>>
					<?php }; ?>	
				<?php if ( $settings['button_url'] ) { ?>
				</a>
				<?php } ;?>		
				<?php if ( $settings['block-content'] ) { ?>
				    <div class="doro-text-p"><?php echo do_shortcode($settings['block-content']); ?></div>	
				<?php }; ?>	
			</div>	
	    </div>		

        <?php		

	}

}