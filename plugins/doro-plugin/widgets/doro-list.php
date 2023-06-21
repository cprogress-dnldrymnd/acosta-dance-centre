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
class Doro_List extends Widget_Base {

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
		return 'doro-list';
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
		return __( 'Doro Project Info', 'doro-plugin' );
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
		return 'eicon-editor-list-ul';
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
				'type' => Controls_Manager::TEXTAREA,
				'default' => 'Add Title',
				'description' => __( 'Ex: 8 - Eight Inc.', 'doro-plugin' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'block-content',
			[
				'label' => __( 'Content', 'doro-plugin' ),
				'type' => Controls_Manager::WYSIWYG,
				'default' => 'I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.',
			]
		);		
		$repeater = new \Elementor\Repeater();
		
		$repeater->add_control(
			'list_item',
			[
				'label' => __( 'Data 1', 'doro-plugin' ),
				'type' => Controls_Manager::TEXT,
				'default' => '',
				'description' => __( 'Ex: Project Name: ', 'doro-plugin' ),
			]
		);
		$repeater->add_control(
			'list_item2',
			[
				'label' => __( 'Data 2', 'doro-plugin' ),
				'type' => Controls_Manager::TEXT,
				'default' => '',
				'description' => __( 'Ex: Corporate Identity', 'doro-plugin' ),
			]
		);		
		$this->add_control(
			'doro_lists',
			[
				'label' => __( 'List Items', 'doro-plugin' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
				
				],
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
					'{{WRAPPER}} .project-desc h2' => 'color: {{VALUE}};',
				],
				'default' =>'',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',			
				'selector' => '{{WRAPPER}} .project-desc h2',
			]
		);
		$this->end_controls_section();		

		$this->start_controls_section(
			'section_style_text',
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
					'{{WRAPPER}} .sec-text' => 'color: {{VALUE}};',
					'{{WRAPPER}} .sec-text p' => 'color: {{VALUE}};',
				],
				'default' =>'',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'text_typography',
				'selector' => '{{WRAPPER}} .sec-text p, {{WRAPPER}} .sec-text',
			]
		);
		$this->end_controls_section();		
		
		$this->start_controls_section(
			'section_style_list_item',
			[
				'label' => __( 'List Item', 'doro-plugin' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'list_item_color',
			[
				'label' => __( 'Color Data 1', 'doro-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} p.list_item strong' => 'color: {{VALUE}};',
				],
				'default' =>'',
			]
		);
		$this->add_control(
			'list_item_color2',
			[
				'label' => __( 'Color Data 2', 'doro-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} p.list_item' => 'color: {{VALUE}};',
				],
				'default' =>'',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'list_item_typography',
				'selector' => '{{WRAPPER}} p.list_item strong, {{WRAPPER}} p.list_item',
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
		
		<div id="sticky_item">
		    <div class="project-desc">
				<?php if ( $settings['title'] ) { ?>
				<h2><?php echo do_shortcode($settings['title']); ?></h2>
				<?php }; ?>	
				<div class="sec-text">
                    <?php echo do_shortcode($settings['block-content']); ?>
				</div>
				<?php foreach( $settings['doro_lists'] as $doro_list ) { ?>
					<p class="list_item"><strong><?php echo do_shortcode($doro_list['list_item']); ?></strong> <?php echo do_shortcode($doro_list['list_item2']); ?></p>				
				<?php } ;?>		

		    </div>
		</div>
			
        <?php
		

	}

}