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
class Doro_Map extends Widget_Base {

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
		return 'doro-map';
	}

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_title() {
		return __( 'Doro Google Map', 'doro-plugin' );
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
		return 'eicon-google-maps';
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
			'map-min',
			'elementor-map-script',
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
				'label' => __( 'Content', 'doro-plugin' ),
			]
		);
		
		$this->add_control(
			'latitude',
			[
				'label' => __( 'Latitude, Longitude', 'doro-plugin' ),
				'type' => Controls_Manager::TEXT,
				'default' => '48.859003, 2.345275',
				'description' => __( 'Inster location google map latitude longitude here. Ex: 48.859003, 2.345275', 'doro-plugin' ),
				'label_block' => true,
			]
		);
		
		$this->add_control(
			'address',
			[
				'label' => __( 'Location Address', 'doro-plugin' ),
				'type' => Controls_Manager::TEXT,
				'default' => '27th Brooklyn New York, NY 10065',
				'description' => __( 'Inster location address here. Ex: 27th Brooklyn New York, NY 10065', 'doro-plugin' ),
				'label_block' => true,
			]
		);
		
		$this->add_control(
			'image',
			[
				'label' => __( 'Marker', 'doro-plugin' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => 'https://webredox.net/images/mapmarker.png',
				],
				'label_block' => true,
			]
		);		

		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_map_settings',
			[
				'label' => __( 'Map Style', 'doro-plugin' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'map_url',
			[
				'label' => __( 'Color Scheme', 'doro-plugin' ),
				'description' => __( 'Select map color scheme.', 'doro-plugin' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'st1' => 'Default',
					'st2' => 'Light',
					'st3' => 'Dark',
				],
				'default' => 'st1',
				'label_block' => true,
			]
		);	

		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_style_text',
			[
				'label' => __( 'Text Style', 'doro-plugin' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'text_color',
			[
				'label' => __( 'Color', 'doro-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .leaflet-popup-content' => 'color: {{VALUE}};',
					'{{WRAPPER}} .leaflet-popup-content-wrapper' => 'color: {{VALUE}};',
				],
				'default' =>'',
			]
		);
		$this->add_control(
			'text_bg_color',
			[
				'label' => __( 'Background', 'doro-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .leaflet-popup-content-wrapper' => 'background: {{VALUE}};',
				],
				'default' =>'',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'text_typography',
				'selector' => '{{WRAPPER}} .leaflet-popup-content',
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

		<?php 
		$map_url_opt='';
		if( $settings['map_url'] == 'st2' ) {
		$map_url_opt='//{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}.png';
		}
		else if( $settings['map_url'] == 'st3' ) {
		$map_url_opt='//{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}.png';
		}
		else {
		$map_url_opt='//{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
		}
		?>			
		
		<div class="sec-gmap">
            <div class="map-container">
				<div id="map-single" class="map" data-map-back="<?php echo esc_attr($map_url_opt);?>" data-latlog="[<?php echo esc_attr($settings['latitude']); ?>]" data-popuptext="<?php echo esc_attr($settings['address']); ?>"  data-popupicon="<?php echo esc_url($settings['image']['url']); ?>"></div>				
		    </div>			
		</div>		
		
			
        <?php
		

	}

}