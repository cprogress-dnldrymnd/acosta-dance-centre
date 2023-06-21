<?php
namespace DOROEL\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Typography;
use Elementor\Utils;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Border;

if (!defined('ABSPATH'))
	exit; // Exit if accessed directly

/**
 * Elementor Hello World
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class Doro_Image_Slider extends Widget_Base
{

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name()
	{
		return 'doro-image-slider';
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
	public function get_title()
	{
		return __('Doro Image Slider', 'doro-plugin');
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
	public function get_icon()
	{
		return 'eicon-slider-album';
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
	public function get_categories()
	{
		return ['doro-addons'];
	}

	/**
	 * A list of scripts that the widgets is depended in
	 **/
	public function get_script_depends()
	{
		return [
			'flexslider-min',
			'elementor-image-slider',
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
	protected function register_controls()
	{
		$this->start_controls_section(
			'section_content',
			[
				'label' => __('Content', 'doro-plugin'),
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'image',
			[
				'label'       => __('Image', 'doro-plugin'),
				'type'        => Controls_Manager::MEDIA,
				'default'     => [],
				'description' => __('Upload same size images.', 'doro-plugin'),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'video_url',
			[
				'label'       => __('Self Hosted Video URL', 'doro-plugin'),
				'type'        => Controls_Manager::TEXT,
				'default'     => '',
				'description' => __('Ex: http://yoursite.com/background.mp4', 'doro-plugin'),
				'label_block' => true,
				'condition'   => [
					'image[url]!' => '',
				],
			]
		);
		$repeater->add_control(
			'data_title',
			[
				'label'       => __('Data Title', 'doro-plugin'),
				'type'        => Controls_Manager::TEXT,
				'default'     => __('Add Title', 'doro-plugin'),
				'label_block' => true,
				'condition'   => [
					'image[url]!' => '',
				],
			]
		);
		$repeater->add_control(
			'button_text_1',
			[
				'label'       => __('Button Text[1]', 'doro-plugin'),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'condition'   => [
					'image[url]!' => '',
				],
			]
		);
		$repeater->add_control(
			'button_link_1',
			[
				'label'       => __('Button Link[1]', 'doro-plugin'),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'condition'   => [
					'image[url]!' => '',
				],
			]
		);
		$repeater->add_control(
			'button_text_2',
			[
				'label'       => __('Button Text[1]', 'doro-plugin'),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'condition'   => [
					'image[url]!' => '',
				],
			]
		);
		$repeater->add_control(
			'button_link_2',
			[
				'label'       => __('Button Link[2]', 'doro-plugin'),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'condition'   => [
					'image[url]!' => '',
				],
			]
		);
		$repeater->add_control(
			'overlay',
			[
				'label'       => __('Overlay', 'doro-plugin'),
				'description' => __('Background dark overlay', 'doro-plugin'),
				'type'        => Controls_Manager::SELECT,
				'options'     => [
					'st1' => 'Enable',
					'st2' => 'Disable',
				],
				'default'     => 'st1',
				'label_block' => true,
				'condition'   => [
					'image[url]!' => '',
				],
			]
		);
		$repeater->add_control(
			'data_url',
			[
				'label'       => __('Custom URL', 'doro-plugin'),
				'type'        => Controls_Manager::TEXT,
				'default'     => __('', 'doro-plugin'),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'data_target',
			[
				'label'       => __('Custom URL Target', 'doro-plugin'),
				'description' => __('', 'doro-plugin'),
				'type'        => Controls_Manager::SELECT,
				'options'     => [
					'_self'   => 'Self',
					'_blank'  => 'Blank',
					'_parent' => 'Parent',
					'_top'    => 'Top',
				],
				'default'     => '_self',
				'label_block' => true,
				'condition'   => [
					'data_url!' => '',
				],
			]
		);

		$this->add_control(
			'doro_sliders',
			[
				'label'   => __('Slider Info', 'doro-plugin'),
				'type'    => Controls_Manager::REPEATER,
				'fields'  => $repeater->get_controls(),
				'default' => [

				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_settings',
			[
				'label' => __('Slider Settings', 'doro-plugin'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'slider_slideshow',
			[
				'label'       => __('Slider Autoplay', 'doro-plugin'),
				'description' => __('', 'doro-plugin'),
				'type'        => Controls_Manager::SELECT,
				'options'     => [
					'true'  => 'Enable',
					'false' => 'Disable',
				],
				'default'     => 'true',
				'label_block' => true,
			]
		);
		$this->add_control(
			'slider_speed',
			[
				'label'       => __('Slider Speed', 'doro-plugin'),
				'type'        => Controls_Manager::TEXT,
				'default'     => '5000',
				'description' => __('Default: 5000', 'doro-plugin'),
				'label_block' => true,
				'condition'   => [
					'slider_slideshow' => 'true',
				],
			]
		);

		$this->add_control(
			'carousel_dots_bg_color',
			[
				'label'     => __('Pagination Color', 'doro-plugin'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} #doro-hero .flexslider .flex-control-nav li a' => 'background: {{VALUE}};',
				],
				'default'   => '',
			]
		);
		$this->add_control(
			'carousel_dots_border_color',
			[
				'label'     => __('Pagination Active Color', 'doro-plugin'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} #doro-hero .flexslider .flex-control-nav li a.flex-active' => 'background: {{VALUE}};',
				],
				'default'   => '',
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_main_title',
			[
				'label' => __('Data Title', 'doro-plugin'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'data_title_color',
			[
				'label'     => __('Color', 'doro-plugin'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} #doro-hero .flexslider .slider-text > .slider-text-inner h1' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'data_title_typography',
				'selector' => '{{WRAPPER}} #doro-hero .flexslider .slider-text > .slider-text-inner h1',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_background',
			[
				'label' => __('Overlay Color', 'doro-plugin'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'back_block_color',
				'label'    => esc_html__('Overlay Color', 'bauen-plugin'),
				'types'    => ['classic', 'gradient'],
				'selector' => '{{WRAPPER}} .overlay, {{WRAPPER}} .overlay-color',
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
	protected function render()
	{
		$settings = $this->get_settings();

		?>
		<div class="sec-slider">
			<aside id="doro-hero" class="js-fullheight">
				<div class="flexslider js-fullheight" data-slider-speed="<?php echo esc_attr($settings['slider_speed']); ?>"
					data-slider-slideshow="<?php echo esc_attr($settings['slider_slideshow']); ?>">
					<?php if ($settings['doro_sliders']) { ?>
						<ul class="slides">
							<?php foreach ($settings['doro_sliders'] as $doro_slide) { ?>
								<?php if ($doro_slide['video_url']) { ?>
									<li>
										<?php if ($doro_slide['data_url']) { ?>
											<a href="<?php echo esc_html($doro_slide['data_url']); ?>"
												target="<?php echo esc_attr($doro_slide['data_target']); ?>">
											<?php }
										; ?>
											<div class="overlay-video">
												<video playsinline autoplay loop muted poster="<?php echo esc_url($doro_slide['image']['url']); ?>'">
													<source src="<?php echo esc_url($doro_slide['video_url']); ?>" type="video/mp4">
												</video>
											</div>
											<?php if ($doro_slide['overlay'] == 'st1') { ?>
												<div class="overlay-color"></div>
											<?php }
											; ?>
											<div class="container-fluid">
												<div class="row">
													<div class="col-md-12 js-fullheight slider-text">
														<div class="slider-text-inner">
															<div class="desc">
																<?php if ($doro_slide['data_title']) { ?>
																	<h1><?php echo esc_html($doro_slide['data_title']); ?></h1>
																<?php }
																; ?>
																<div class="button-group-box d-flex flex-wrap">
																	<?php if ($doro_slide['button_text_1'] && $doro_slide['button_link_1']) { ?>
																		<div class="button-box button-black">
																			<a href="<?= $doro_slide['button_link_1'] ?>"><?= $doro_slide['button_text_1'] ?></a>
																		</div>
																	<?php } ?>
																	<?php if ($doro_slide['button_text_2'] && $doro_slide['button_link_2']) { ?>
																		<div class="button-box button-white">
																			<a href="<?= $doro_slide['button_link_2'] ?>"><?= $doro_slide['button_text_2'] ?></a>
																		</div>
																	<?php } ?>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<?php if ($doro_slide['data_url']) { ?>
											</a>
										<?php }
											; ?>
									</li>
								<?php }
								else { ?>
									<li style="background-image: url(<?php echo esc_url($doro_slide['image']['url']); ?>);">
										<?php if ($doro_slide['data_url']) { ?>
											<a href="<?php echo esc_html($doro_slide['data_url']); ?>"
												target="<?php echo esc_attr($doro_slide['data_target']); ?>">
											<?php }
										; ?>
											<?php if ($doro_slide['overlay'] == 'st1') { ?>
												<div class="overlay"></div>
											<?php }
											; ?>
											<div class="container-fluid">
												<div class="row">
													<div class="col-md-12 js-fullheight slider-text">
														<div class="slider-text-inner">
															<div class="desc">
																<?php if ($doro_slide['data_title']) { ?>
																	<h1><?php echo esc_html($doro_slide['data_title']); ?></h1>
																<?php }
																; ?>
																<div class="button-group-box d-flex flex-wrap">
																	<?php if ($doro_slide['button_text_1'] && $doro_slide['button_link_1']) { ?>
																		<div class="button-box button-black">
																			<a href="<?= $doro_slide['button_link_1'] ?>"><?= $doro_slide['button_text_1'] ?></a>
																		</div>
																	<?php } ?>
																	<?php if ($doro_slide['button_text_2'] && $doro_slide['button_link_2']) { ?>
																		<div class="button-box button-white">
																			<a href="<?= $doro_slide['button_link_2'] ?>"><?= $doro_slide['button_text_2'] ?></a>
																		</div>
																	<?php } ?>
																</div>
															</div>

														</div>
													</div>
												</div>
											</div>
											<?php if ($doro_slide['data_url']) { ?>
											</a>
										<?php }
											; ?>
									</li>
								<?php }
								; ?>
							<?php }
							; ?>

						</ul>
					<?php }
					; ?>
				</div>
			</aside>
		</div>
		<?php

	}

}