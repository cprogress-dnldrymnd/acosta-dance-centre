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
class Doro_Team extends Widget_Base {

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
		return 'doro-team';
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
		return __( 'Doro Team', 'doro-plugin' );
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
		return 'eicon-person';
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
			'image',
			[
				'label' => __( 'Member Image', 'doro-plugin' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => '',
				],
				'label_block' => true,			
			]
		);		
		$this->add_control(
			'title',
			[
				'label' => __( 'Member Name', 'doro-plugin' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'Add Name',
				'description' => __( 'Ex: Robert Lee', 'doro-plugin' ),
				'label_block' => true,
				'condition' => [
					'image[url]!' => '',
				],					
			]
		);	
		$this->add_control(
			'subtitle',
			[
				'label' => __( 'Member Designation', 'doro-plugin' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'Add Designation',
				'description' => __( 'Ex: Founder & CEO', 'doro-plugin' ),
				'label_block' => true,
				'condition' => [
					'image[url]!' => '',
				],					
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
		$repeater = new \Elementor\Repeater();
		
		$repeater->add_control(
			'icon_type',
			[
				'label' => __( 'Icon Type', 'doro-plugin' ),
				'description' => __( 'Select icon type.', 'doro-plugin' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'st1' => 'Themify',
					'st2' => 'Fontawesome',
				],
				'default' => 'st1',
				'label_block' => true,
			]
		);		
		$repeater->add_control(
			'icon_class',
			[
				'label' => __( 'Icon Class', 'doro-plugin' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'ti-facebook',
				'description' => __( 'Insert <strong><a href="https://themify.me/themify-icons" target="_blank">Themify</a></strong> Icon Class here. <br> Ex: ti-facebook ', 'doro-plugin' ),
				'label_block' => true,
				'condition' => [
					'icon_type' => 'st1',
				],				
			]
		);			
		$repeater->add_control(
			'icon_class2',
			[
				'label' => esc_html__( 'Icon', 'doro-plugin' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fa fa-twitter',
					'library' => 'solid',
				],
				
                'skin' =>'inline',
				'label_block' => false,
				'condition' => [
					'icon_type' => 'st2',
				],					
			]
		);			
		$repeater->add_control(
			'icon_url',
			[
				'label' => __( 'Icon URL', 'doro-plugin' ),
				'type' => Controls_Manager::TEXT,
				'default' => '',
				'description' => __( 'Insert icon url here.', 'doro-plugin' ),
				'label_block' => true,
			]
		);	
		$repeater->add_control(
			'icon_url_target',
			[
				'label' => __( 'Icon URL Target', 'doro-plugin' ),
				'description' => __( '', 'doro-plugin' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'_self' => 'Self',
					'_blank' => 'Blank',
					'_parent' => 'Parent',
					'_top' => 'Top',
				],
				'default' => '_blank',
				'label_block' => true,
                'condition' => [
					'icon_url!' => '',
				],					
			]
		);			
		$this->add_control(
			'social_icons',
			[
				'label' => __( 'Social Icons', 'doro-plugin' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),	
				'condition' => [
					'image[url]!' => '',
				],	
			]
		);		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_style_title',
			[
				'label' => __( 'Name Options', 'doro-plugin' ),
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
					'{{WRAPPER}} .team .desc h1' => 'color: {{VALUE}};',
					'{{WRAPPER}} .team .desc h2' => 'color: {{VALUE}};',
					'{{WRAPPER}} .team .desc h3' => 'color: {{VALUE}};',
					'{{WRAPPER}} .team .desc h4' => 'color: {{VALUE}};',
					'{{WRAPPER}} .team .desc h5' => 'color: {{VALUE}};',
					'{{WRAPPER}} .team .desc h6' => 'color: {{VALUE}};',
				],				
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .team .desc h1, {{WRAPPER}} .team .desc h2, {{WRAPPER}} .team . h3, {{WRAPPER}} .team .desc h4, {{WRAPPER}} .team .desc h5, {{WRAPPER}} .team .desc h6',
			]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_style_subtitle',
			[
				'label' => __( 'Designation Options ', 'doro-plugin' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);		
		$this->add_control(
			'subtitle_color',
			[
				'label' => __( 'Color', 'doro-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .team .desc span' => 'color: {{VALUE}};',
				],				
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'subtitle_typography',
				'selector' => '{{WRAPPER}} .team .desc span',
			]
		);
		$this->end_controls_section();	

		$this->start_controls_section(
			'section_style_icon',
			[
				'label' => __( 'Social Icon Options', 'doro-plugin' ),
				'tab' => Controls_Manager::TAB_STYLE,					
			]
		);			
		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Icon Color', 'doro-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .team .desc .con .icon i' => 'color: {{VALUE}};',
				],
				'default' =>'',
			]
		);				
		$this->end_controls_section();	

		$this->start_controls_section(
			'section_style_background',
			[
				'label' => __( 'Overlay Color', 'doro-plugin' ),
				'tab' => Controls_Manager::TAB_STYLE,					
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'back_block_color',
				'label' => esc_html__( 'Overlay Color', 'bauen-plugin' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .team .desc',
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

		<div class="sec-team team">
            <img src="<?php echo esc_url($settings['image']['url']); ?>" class="img-fluid" alt="<?php echo esc_attr($settings['image']['alt']); ?>" />		
		    <div class="desc">
			    <div class="con">
					<?php if ( $settings['title'] ) { ?>
						<?php if ( $settings['button_url'] ) { ?><a href="<?php echo esc_url($settings['button_url']); ?>" target="<?php echo esc_attr($settings['button_target']); ?>"><?php } ;?>						
						   <h<?php echo esc_attr($settings['title_tag']); ?>><?php echo do_shortcode($settings['title']); ?></h<?php echo esc_attr($settings['title_tag']); ?>>
				       <?php if ( $settings['button_url'] ) { ?></a><?php } ;?>							
					<?php }; ?>	
					<?php if ( $settings['subtitle'] ) { ?>
						<span><?php echo esc_html($settings['subtitle']); ?></span>
					<?php }; ?>	
					<p class="icon">
						<?php foreach( $settings['social_icons'] as $social_icon ) { ?>
							<?php if ( $social_icon['icon_url'] ) { ?> 
							<a href="<?php echo esc_url($social_icon['icon_url']); ?>" target="<?php echo esc_attr($social_icon['icon_url_target']); ?>">
							<?php if ( $social_icon['icon_type'] == 'st2' ) { ?>
								<?php \Elementor\Icons_Manager::render_icon( $social_icon['icon_class2'], [ 'aria-hidden' => 'true' ] ); ?>
							<?php } 
							else { ?>	
								<i class="<?php echo esc_attr($social_icon['icon_class']); ?>"></i>
							<?php } ;?>								
							</a>		
							<?php } ;?>	
						<?php } ;?>
					</p>					
			    </div>	
			</div>	
		</div>		

        <?php		

	}

}