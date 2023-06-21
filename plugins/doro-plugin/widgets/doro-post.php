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

if (!defined('ABSPATH'))
	exit; // Exit if accessed directly

/**
 * Elementor Hello World
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class Doro_Post extends Widget_Base
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
		return 'doro-post';
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
		return __('Doro Post', 'doro-plugin');
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
		return 'eicon-posts-carousel';
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
			'eicon-posts-grid',
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
				'label' => __('Post Options', 'doro-plugin'),
			]
		);
		$this->add_control(
			'postcount',
			[
				'label'       => __('Number of posts to show', 'doro-plugin'),
				'type'        => Controls_Manager::TEXT,
				'default'     => __('3', 'doro-plugin'),
				'description' => __('(Optional) Insert number of post show in format: 8', 'doro-plugin'),
				'label_block' => true,
			]
		);
		$this->add_control(
			'categoryname',
			[
				'label'       => __('Include Category', 'doro-plugin'),
				'type'        => Controls_Manager::TEXT,
				'default'     => __('', 'doro-plugin'),
				'description' => __('(Optional) Insert category name in format: Graphic', 'doro-plugin'),
				'label_block' => true,
			]
		);
		$this->add_control(
			'postoffset',
			[
				'label'       => __('Post Offset', 'doro-plugin'),
				'type'        => Controls_Manager::TEXT,
				'default'     => __('', 'doro-plugin'),
				'description' => __('(Optional)', 'doro-plugin'),
				'label_block' => true,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'port_item',
			[
				'label' => __('Post Options', 'doro-plugin'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'image_resize',
			[
				'label'       => __('Image Resize', 'doro-plugin'),
				'description' => __('', 'doro-plugin'),
				'type'        => Controls_Manager::SELECT,
				'options'     => [
					'st1' => 'Enable',
					'st2' => 'Disable',
				],
				'default'     => 'st1',
				'label_block' => true,
			]
		);
		$this->add_control(
			'bg_color',
			[
				'label'     => __('Background', 'doro-plugin'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .doro-blog .blog-entry' => 'background-color: {{VALUE}} !important;',
				],
				'default'   => '',
			]
		);
		$this->add_control(
			'title_tag',
			[
				'label'       => __('Title Tag', 'doro-plugin'),
				'description' => __('', 'doro-plugin'),
				'type'        => Controls_Manager::SELECT,
				'options'     => [
					'1' => 'h1',
					'2' => 'h2',
					'3' => 'h3',
					'4' => 'h4',
					'5' => 'h5',
					'6' => 'h6',
				],
				'default'     => '3',
				'label_block' => true,
			]
		);
		$this->add_control(
			'title_color',
			[
				'label'     => __('Title Color', 'doro-plugin'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .doro-blog .blog-entry .desc h1 a' => 'color: {{VALUE}};',
					'{{WRAPPER}} .doro-blog .blog-entry .desc h2 a' => 'color: {{VALUE}};',
					'{{WRAPPER}} .doro-blog .blog-entry .desc h3 a' => 'color: {{VALUE}};',
					'{{WRAPPER}} .doro-blog .blog-entry .desc h4 a' => 'color: {{VALUE}};',
					'{{WRAPPER}} .doro-blog .blog-entry .desc h5 a' => 'color: {{VALUE}};',
					'{{WRAPPER}} .doro-blog .blog-entry .desc h6 a' => 'color: {{VALUE}};',
				],
				'default'   => '',
			]
		);
		$this->add_control(
			'title_color-hv',
			[
				'label'     => __('Title Hover Color', 'doro-plugin'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .doro-blog .blog-entry .desc h1 a:hover' => 'color: {{VALUE}};',
					'{{WRAPPER}} .doro-blog .blog-entry .desc h2 a:hover' => 'color: {{VALUE}};',
					'{{WRAPPER}} .doro-blog .blog-entry .desc h3 a:hover' => 'color: {{VALUE}};',
					'{{WRAPPER}} .doro-blog .blog-entry .desc h4 a:hover' => 'color: {{VALUE}};',
					'{{WRAPPER}} .doro-blog .blog-entry .desc h5 a:hover' => 'color: {{VALUE}};',
					'{{WRAPPER}} .doro-blog .blog-entry .desc h6 a:hover' => 'color: {{VALUE}};',
				],
				'default'   => '',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'title_typography',
				'selector' => '{{WRAPPER}} .doro-blog .blog-entry .desc h1 a, {{WRAPPER}} .doro-blog .blog-entry .desc h2 a, {{WRAPPER}} .doro-blog .blog-entry .desc h3 a, {{WRAPPER}} .doro-blog .blog-entry .desc h4 a, {{WRAPPER}} .doro-blog .blog-entry .desc h5 a, {{WRAPPER}} .doro-blog .blog-entry .desc h6 a',
			]
		);
		$this->add_control(
			'meta_info_color',
			[
				'label'     => __('Meta Info Color', 'doro-plugin'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .doro-blog .blog-entry .desc span'   => 'color: {{VALUE}}!important;',
					'{{WRAPPER}} .doro-blog .blog-entry .desc span a' => 'color: {{VALUE}}!important;',
				],
				'default'   => '',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'meta_info_typography',
				'selector' => '{{WRAPPER}} .doro-blog .blog-entry .desc span',
			]
		);
		$this->add_control(
			'content_color',
			[
				'label'     => __('Content Color', 'doro-plugin'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .doro-blog .blog-entry .desc p' => 'color: {{VALUE}};',
				],
				'default'   => '',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'content_typography',
				'selector' => '{{WRAPPER}} .doro-blog .blog-entry .desc p',
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

		<div class="sec-blog doro-blog">
			<div class="row">
				<?php
				global $post, $doro_image;
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$loop = new \WP_Query(array('post_type' => 'post', 'category_name' => $settings['categoryname'], 'posts_per_page' => $settings['postcount'], 'post_status' => 'publish', 'offset' => $settings['postoffset']));
				while ($loop->have_posts()):
					$loop->the_post();
					if (has_post_thumbnail($post->ID)):
						$doro_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'doro_blog_image');
						$doro_image_full = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), '');
						?>
						<div class="col-md-4 col-sm-4">
							<div class="blog-entry">
								<a href="<?php the_permalink(); ?>" class="blog-img">
									<div class="date">
										<div class="d"><?php the_time('d'); ?></div>
										<div class="m"><?php the_time('M'); ?></div>
									</div>
									<?php if ($settings['image_resize'] == 'st2') { ?>
										<img src="<?php echo esc_url($doro_image_full[0]); ?>" alt="<?php the_title(); ?>" class="img-fluid" />
									<?php }
									else { ?>
										<img src="<?php echo esc_url($doro_image[0]); ?>" alt="<?php the_title(); ?>" class="img-fluid" />
									<?php }
									; ?>
								</a>
								<div class="desc">
									<h<?php echo esc_attr($settings['title_tag']); ?>><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</h<?php echo esc_attr($settings['title_tag']); ?>>

									<?php the_excerpt(); ?>
								</div>
							</div>
						</div>
						<?php
					endif;
				endwhile;
				wp_reset_postdata();
				?>
			</div>
		</div>

		<?php


	}

}