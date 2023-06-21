<?php
namespace DOROEL;

use DOROEL\Widgets\Doro_Title;
use DOROEL\Widgets\Doro_Text;
use DOROEL\Widgets\Doro_Image;
use DOROEL\Widgets\Doro_Image_Slider;
use DOROEL\Widgets\Doro_Services;
use DOROEL\Widgets\Doro_Post;
use DOROEL\Widgets\Doro_Portfolio_Grid;
use DOROEL\Widgets\Doro_List;
use DOROEL\Widgets\Doro_Team;
use DOROEL\Widgets\Doro_Gallery;
use DOROEL\Widgets\Doro_Contact;
use DOROEL\Widgets\Doro_Form;
use DOROEL\Widgets\Doro_Map;


if( ! defined('ABSPATH') ) exit;

class DoroCore{

    public function __construct() {
        $this->add_actions();
		add_action( 'elementor/frontend/after_register_scripts', [ $this, 'doro_after_register_scripts' ]);
    }


    public function add_actions() {
        add_action( 'elementor/init', [ $this, 'doro_elementor_helper_init' ] );
		add_action( 'elementor/editor/before_enqueue_scripts', [ $this, 'enqueue_widget_styles' ] );
        add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'enqueue_widget_styles' ] );
        add_action( 'elementor/widgets/register', [ $this, 'on_widgets_registered' ] );
    }


    public function doro_elementor_helper_init() {
        \Elementor\Plugin::instance()->elements_manager->add_category(
            'doro-addons',
            [
                'title'  => 'Doro Addons',
                'icon' => 'font'
            ],
            1
        );
    }
	
	 public function enqueue_widget_styles() {
	 }
    

    public function doro_after_register_scripts() {
        wp_register_script( 'elementor-map-script', DORO_URL . '/elementor-js/elementor-map-script.js', array('jquery'), null, true );
		wp_register_script( 'elementor-image-slider', DORO_URL . '/elementor-js/elementor-image-slider.js', array('jquery'), null, true );
		wp_register_script( 'elementor-load-more', DORO_URL . '/elementor-js/elementor-gallery-load-more.js', array('jquery'), null, true );
		wp_register_script( 'elementor-load-more-portfolio', DORO_URL . '/elementor-js/elementor-load-more-portfolio.js', array('jquery'), null, true );
     }

    public function on_widgets_registered() {
        $this->includes();
        $this->register_widget();
    }

    private function includes(){
        require __DIR__ . '/widgets/doro-title.php';
        require __DIR__ . '/widgets/doro-text.php';
        require __DIR__ . '/widgets/doro-image.php';
        require __DIR__ . '/widgets/doro-image-slider.php';
		require __DIR__ . '/widgets/doro-services.php';
		require __DIR__ . '/widgets/doro-post.php';
		require __DIR__ . '/widgets/doro-portfolio-grid.php';
        require __DIR__ . '/widgets/doro-list.php';		
        require __DIR__ . '/widgets/doro-team.php';  
		require __DIR__ . '/widgets/doro-gallery.php';
        require __DIR__ . '/widgets/doro-contact.php';
        require __DIR__ . '/widgets/doro-form.php';
        require __DIR__ . '/widgets/doro-map.php';
        
       }

    private function register_widget(){
        \Elementor\Plugin::instance()->widgets_manager->register( new Doro_Title() );
        \Elementor\Plugin::instance()->widgets_manager->register( new Doro_Text() );
        \Elementor\Plugin::instance()->widgets_manager->register( new Doro_Image() );
        \Elementor\Plugin::instance()->widgets_manager->register( new Doro_Image_Slider() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Doro_Services() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Doro_Post() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Doro_Portfolio_Grid() );
        \Elementor\Plugin::instance()->widgets_manager->register( new Doro_List() );
        \Elementor\Plugin::instance()->widgets_manager->register( new Doro_Team() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Doro_Gallery() );
        \Elementor\Plugin::instance()->widgets_manager->register( new Doro_Contact() );
        \Elementor\Plugin::instance()->widgets_manager->register( new Doro_Form() );
        \Elementor\Plugin::instance()->widgets_manager->register( new Doro_Map() );
        
    }

}


new DoroCore();