<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "doro";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'doro/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
		'class'                => 'admin-color-pimax',
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_html__( 'Doro Options', 'doro' ),
        'page_title'           => esc_html__( 'Doro Options', 'doro' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => 'AIzaSyCN8bSGZHdbSOXu0HbhXf8j0SnswTmbCNw',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => false,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => 90,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the doro. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'doro'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'doro'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    
    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( esc_html__( '', 'doro' ), $v );
    } else {
        $args['intro_text'] = esc_html__( '', 'doro' );
    }

    // Add content after the form.
    $args['footer_text'] = esc_html__( '', 'doro' );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => esc_html__( 'Support', 'doro' ),
            'content' => esc_html__( 'Send us a mail by using our item support form.', 'doro' )
        ),
        
    );
    Redux::set_help_tab( $opt_name, $tabs );

    // Set the help sidebar
    $content = esc_html__( 'Send us a mail by using our item support form.', 'stukram' );
    Redux::set_help_sidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */

    // ACTUAL DECLARATION OF SECTIONS
                Redux::setSection( $opt_name, array(
                    'title'  => esc_html__( 'General Settings', 'doro' ),
                    'desc'   => esc_html__( '', 'doro' ),
                    'icon'   => 'el-icon-home-alt',
                    // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
                    'fields' => array(
					
					array(
							'id' => 'textlogo',
							'type' => 'button_set',
							'title' => esc_html__('Select Logo Format', 'doro'),
							'subtitle' => esc_html__('', 'doro'),
							'desc' => '',
							'options' => array(
									'st1'=> esc_html__('Text Logo', 'doro'),
									'st2' => esc_html__('Image Logo', 'doro'),
									
							),
							'default'  => 'st1'
					),
					 
					array(
							'id' => 'logopic',
							'type' => 'media',
							'compiler' => 'true',
							'title' => esc_html__('Logo Image', 'doro'),
							'subtitle' => esc_html__('Image Size 150x80', 'doro'),
							'required' => array('textlogo', '=' , 'st2')
					),
					
					$fields = array(
							'id'       => 'opt_logo_dimensions',
							'type'     => 'dimensions',
							'units'    => array('em','px','%'),
							'output' => array('.logo-holder img'),
							'title'    => esc_html__('Logo Size', 'doro'),
							'subtitle' => esc_html__('.', 'doro'),
							'desc'     => esc_html__('Optional', 'doro'),
							'default'  => array(
								'Width'   => '110', 
								'Height'  => '22'
							),
							'required' => array('textlogo', '=' , 'st2')
				    ),					
					array(
							'id' => 'logotext',
							'type' => 'text',
							'title' => esc_html__('Logo Text ', 'doro'),
							'subtitle' => esc_html__('', 'doro'),
							'required' => array('textlogo', '=' , 'st1')
					
					),
					array(
							'id' => 'logotext2',
							'type' => 'text',
							'title' => esc_html__('Logo Tag Line', 'doro'),
							'subtitle' => esc_html__('Insert logo tag line text here. Ex: Innovative Agency', 'doro'),
                            'desc' => esc_html__(' ', 'doro')
					
					),					
					array(
			                'id' => 'notice_header_theme_color',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Color Scheme Options', 'doro'),
			                'desc' => esc_html__('Choose theme color scheme style.', 'doro')
			            ),					
			        array(
							'id' => 'colorstyle',
							'type' => 'button_set',
							'title' => esc_attr__('Color Scheme', 'doro'),
							'subtitle' => esc_attr__('Choose theme color scheme style.', 'doro'),
							'default'  => 'no',
							'options' => array(
							        'no'=> esc_html__('Light Version', 'doro'),
									'yes'=> esc_html__('Dark Version', 'doro'),
							),							
					),	
						array(
									'id' => 'notice_site_preloader',
									'type' => 'info',
									'notice' => true,
									'style' => 'success',
									'title' => esc_html__('Preloader Options.', 'doro'),
									'desc' => esc_html__('', 'doro'),
									
						),						
						array(
								'id' => 'enable_preloader',
								'type' => 'button_set',
								'title' => esc_html__('Preloader', 'doro'),
								'subtitle' => esc_html__('', 'doro'),
								'desc' => '',
								'options' => array(
										'no'=> esc_html__('Disable', 'doro'),
										'yes' => esc_html__('Enable', 'doro'),
								),
								'default'  => 'yes'
						),	
						array(
									'id' => 'notice_site_scrollbar',
									'type' => 'info',
									'notice' => true,
									'style' => 'success',
									'title' => esc_html__('Scrollbar Options.', 'doro'),
									'desc' => esc_html__('', 'doro'),
									
						),						
			        array(
							'id' => 'scrollbar',
							'type' => 'button_set',
							'title' => esc_attr__('Scrollbar Style', 'doro'),
							'subtitle' => esc_attr__('Choose theme cursors style.', 'doro'),
							'default'  => 'no',
							'options' => array(
							        'no'=> esc_html__('Disable', 'doro'),
									'yes'=> esc_html__('Enable', 'doro'),
							),							
					),						
					
				  )
               ) );
			   
				 Redux::setSection( $opt_name, array(
                    'icon'   => 'el-icon-cogs',
                    'title'  => esc_html__( 'Page Settings', 'doro' ),
                    'fields' => array(		
					array(
							'id' => 'header-animate',
							'type' => 'info',
		                    'notice' => true,
		                    'style' => 'info',
							'title' => esc_attr__('Page Animation Option', 'doro'),
							
					),	
			        array(
							'id' => 'index-header-animate',
							'type' => 'button_set',
							'title' => esc_html__('Header Animate Style', 'doro'),
							'subtitle' => esc_html__('Enable/Disable header section animate style for blog single, archives, category, tag & search page.', 'doro'),
							'default'  => 'no',
							'options' => array(
									'yes'=> esc_html__('Enable', 'doro'),
									'no'=> esc_html__('Disable', 'doro'),
							),
					),	
					
			        array(
							'id' => 'index-content-animate',
							'type' => 'button_set',
							'title' => esc_html__('Content Animate Style', 'doro'),
							'subtitle' => esc_html__('Enable/Disable content section animate style for pages, blog single, archives, category, tag & search page.', 'doro'),
							'default'  => 'no',
							'options' => array(
									'yes'=> esc_html__('Enable', 'doro'),
									'no'=> esc_html__('Disable', 'doro'),
							),
					),	
			        array(
							'id' => 'index-sidebar-animate',
							'type' => 'button_set',
							'title' => esc_html__('Sidebar Animate Style', 'doro'),
							'subtitle' => esc_html__('Enable/Disable sidebar section animate style for pages, blog single, archives, category, tag & search page.', 'doro'),
							'default'  => 'no',
							'options' => array(
									'yes'=> esc_html__('Enable', 'doro'),
									'no'=> esc_html__('Disable', 'doro'),
							),
					),	
			        array(
							'id' => 'index-footer-animate',
							'type' => 'button_set',
							'title' => esc_html__('Footer Animate Style', 'doro'),
							'subtitle' => esc_html__('Enable/Disable footer section animate style for pages, blog single, archives, category, tag & search page.', 'doro'),
							'default'  => 'no',
							'options' => array(
									'yes'=> esc_html__('Enable', 'doro'),
									'no'=> esc_html__('Disable', 'doro'),
							),
					),						
					array(
							'id' => 'header-error',
							'type' => 'info',
		                    'notice' => true,
		                    'style' => 'info',
							'title' => esc_attr__('404 Error Page Option', 'doro'),
							
					),															
					array(
							'id' => 'error-page-title',
							'type' => 'text',
							'title' => esc_attr__('Title Text', 'doro'),
							'subtitle' => esc_attr__('Change/Repalce "404" text here.', 'doro'),
							'default' => '',
							
					),	
					array(
							'id' => 'error-page-sbtitle',
							'type' => 'text',
							'title' => esc_attr__('Subtitle Text', 'doro'),
							'subtitle' => esc_attr__('Change/Repalce "Page Error" text here.', 'doro'),
							'default' => '',
							
					),					
					array(
							'id' => 'error-page-subtitle',
							'type' => 'textarea',
							'title' => esc_attr__('Content Text', 'doro'),
							'subtitle' => esc_attr__('Change/Repalce "Page not Found" text here.', 'doro'),
							'default' => '',
							
					),
					array(
							'id' => 'header-portfolio',
							'type' => 'info',
		                    'notice' => true,
		                    'style' => 'info',
							'title' => esc_attr__('Portfolio Category Page Option', 'doro'),
							
					),					
					array(
							'id' => 'port-page-subtitle',
							'type' => 'text',
							'title' => esc_html__('Portfolio Category Subtitle Text', 'doro'),
							'subtitle' => esc_html__('Insert Portfolio category page header subtitle text here for portfolio category page.', 'doro'),
							
					),				
					
                    )
                ));				   
			   
				
				Redux::setSection( $opt_name, array(
                    'icon'   => 'el-icon-bullhorn',
                    'title'  => esc_html__( 'Blog Settings', 'doro' ),
                    'fields' => array(
					array(
							'id' => 'blogtyle',
							'type' => 'button_set',
							'title' => esc_html__('Blog Single Page Layout', 'doro'),
							'subtitle' => esc_html__('', 'doro'),
							'desc' => '',
							'options' => array(									
									'st2' => esc_html__('Full Width', 'doro'),
									'st1'=> esc_html__('Right Sidebar', 'doro'),

							),
							'default'  => 'st1'
					),									
			        array(
							'id' => 'index-header-show',
							'type' => 'button_set',
							'title' => esc_html__('Blog Header Section', 'doro'),
							'subtitle' => esc_html__('Enable/Disable header section for blog single, archives, category, tag & search page.', 'doro'),
							'default'  => 'yes',
							'options' => array(
									'yes'=> esc_html__('Enable', 'doro'),
									'no'=> esc_html__('Disable', 'doro'),
							),
							
					),												
					array(
							'id' => 'blog-page-title',
							'type' => 'text',
							'title' => esc_html__('Blog Title Text', 'doro'),
							'subtitle' => esc_html__('Insert blog page header title text here.', 'doro'),
							'required' => array('index-header-show', '=' , 'yes')
							
					),					
					array(
							'id' => 'blog-page-subtitle',
							'type' => 'text',
							'title' => esc_html__('Blog Subtitle Text', 'doro'),
							'subtitle' => esc_html__('Insert blog page header subtitle text here for blog single, archives, category, tag & search page.', 'doro'),
							'required' => array('index-header-show', '=' , 'yes')
							
					),				
			        array(
							'id' => 'index_scroll_swipe_show',
							'type' => 'button_set',
							'title' => esc_html__('Scroll Down', 'doro'),
							'subtitle' => esc_html__('Enable/Disable header section for blog single, archives, category, tag & search page.', 'doro'),
							'default'  => 'yes',
							'options' => array(
									'yes'=> esc_html__('Enable', 'doro'),
									'no'=> esc_html__('Disable', 'doro'),
							),
							'required' => array('blogtyle', '=' , 'st3')
					),	
					array(
			                'id' => 'notice_blog-scroll_swipe_translation',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Translation Options', 'doro'),
			                'desc' => esc_html__('Default Text Translate Here.', 'doro'),
			        ),					
					array(
							'id' => 'blog-read-more',
							'type' => 'text',
							'title' => __('Read More Text', 'doro'),
							'subtitle' => __('Change/Repalce blog post "Read More" text here.', 'doro'),
							'default' => '',
							
					),						
					array(
							'id' => 'arch-page-title',
							'type' => 'text',
							'title' => esc_html__('Archive Page Title', 'doro'),
							'subtitle' => esc_html__('Write header title for blog archive page here. Ex: Archive : ', 'doro'),
							'default' => '',
					),	
					array(
							'id' => 'cat-page-title',
							'type' => 'text',
							'title' => esc_html__('Category Page Title', 'doro'),
							'subtitle' => esc_html__('Write header title for blog category page here. Ex: Category : ', 'doro'),
							'default' => '',
					),	
	
					array(
							'id' => 'tag-page-title',
							'type' => 'text',
							'title' => esc_html__('Tag Page Title', 'doro'),
							'subtitle' => esc_html__('Write header title for blog tag page here. Ex: Tag : ', 'doro'),
							'default' => '',
					),						

					array(
							'id' => 'src-page-title',
							'type' => 'text',
							'title' => esc_html__('Search Page Title', 'doro'),
							'subtitle' => esc_html__('Write header title for blog search page title here. Ex: Search Results for :', 'doro'),
							'default' => '',
					),		
					array(
							'id' => 'translet_opt_10',
							'type' => 'text',
							'title' => esc_html__('One Comment on', 'doro'),
							'subtitle' => esc_html__('Post Comment Section.', 'doro'),
					),
					
					array(
							'id' => 'translet_opt_11',
							'type' => 'text',
							'title' => esc_html__('Comment on', 'doro'),
							'subtitle' => esc_html__('Post Comment Section.', 'doro'),
					),
					
					array(
							'id' => 'translet_opt_12',
							'type' => 'text',
							'title' => esc_html__('Comments on', 'doro'),
							'subtitle' => esc_html__('Post Comment Section.', 'doro'),
					),
					
					array(
							'id' => 'translet_opt_13',
							'type' => 'text',
							'title' => esc_html__('Comments are closed.', 'doro'),
							'subtitle' => esc_html__('Post Comment Section.', 'doro'),
					),
					
					array(
							'id' => 'translet_opt_14',
							'type' => 'text',
							'title' => esc_html__('Your Name', 'doro'),
							'subtitle' => esc_html__('Post Comment Section Form.', 'doro'),
					),
					
					array(
							'id' => 'translet_opt_15',
							'type' => 'text',
							'title' => esc_html__('Your Email', 'doro'),
							'subtitle' => esc_html__('Post Comment Section Form.', 'doro'),
					),
					
					array(
							'id' => 'translet_opt_16',
							'type' => 'text',
							'title' => esc_html__('Your Comment', 'doro'),
							'subtitle' => esc_html__('Post Comment Section Form.', 'doro'),
					),
					
					array(
							'id' => 'translet_opt_17',
							'type' => 'text',
							'title' => esc_html__('Leave a Comment', 'doro'),
							'subtitle' => esc_html__('Post Comment Section Form.', 'doro'),
					),
					
					array(
							'id' => 'translet_opt_22',
							'type' => 'text',
							'title' => esc_html__('Search...', 'doro'),
							'subtitle' => esc_html__('Search Widget Placeholder.', 'doro'),
					),						
					
                    )
                ) );			
            Redux::setSection( $opt_name, array(
                    'icon'   => 'el-icon-smiley-alt',
                    'title'  => esc_attr__( 'Social Icons Settings', 'doro' ),
                    'fields' => array(									
					array(					
						   'id' => 'social-icon-site',
						   'type' => 'button_set',
						   'title' => esc_attr__('Social Icons', 'doro'),
						   'desc' => '',
						   'subtitle' => esc_attr__('Enable/Disable social icons.', 'doro'),
						   'options' => array(
							 'yes'=> esc_attr__('Enable', 'doro'),
							 'no'=> esc_attr__('Disable', 'doro'),
						   ),
						   'default'  => 'no'
					
					),		
			        array(
							'id' => 'social-header',
							'type' => 'button_set',
							'title' => esc_attr__('Social Icon Navigation Sidebar', 'doro'),
							'default'  => 'no',
							'options' => array(
								'yes'=> esc_attr__('Enable', 'doro'),	
								'no'=> esc_attr__('Disable', 'doro'),	
							),
							'required' => array('social-icon-site', '=' , 'yes')
					),
			        array(
							'id' => 'social-footer',
							'type' => 'button_set',
							'title' => esc_attr__('Social Icon Footer', 'doro'),
							'default'  => 'no',
							'options' => array(
								'yes'=> esc_attr__('Enable', 'doro'),	
								'no'=> esc_attr__('Disable', 'doro'),	
							),
							'required' => array('social-icon-site', '=' , 'yes')
					),						
					array(
						'id'        => 'facebook',
						'type'      => 'text',
						'title'     => esc_attr__('Facebook Link', 'doro'),
						'subtitle'  => esc_attr__('Insert facebook url here.', 'doro'),
						'dece'      => esc_attr__('','doro'),
						'validate'  => '',
						'required' => array('social-icon-site', '=' , 'yes')
					),

					 array(
						'id'        => 'twitter',
						'type'      => 'text',
						'title'     => esc_attr__('Twitter Link', 'doro'),
						'subtitle'  => esc_attr__('Insert twitter url here.', 'doro'),
						'dece'      => esc_attr__('','doro'),
						'validate'  => '',
						'required' => array('social-icon-site', '=' , 'yes')
					),

					 array(
						'id'        => 'google-plus',
						'type'      => 'text',
						'title'     => esc_attr__('Google+ Link', 'doro'),
						'subtitle'  => esc_attr__('Insert google+ url here.', 'doro'),
						'dece'      => esc_attr__('','doro'),
						'validate'  => '',
						'required' => array('social-icon-site', '=' , 'yes')
					),

					 array(
						'id'        => 'linkedin',
						'type'      => 'text',
						'title'     => esc_attr__('LinkedIn Link', 'doro'),
						'subtitle'  => esc_attr__('Insert linkedin url here.', 'doro'),
						'dece'      => esc_attr__('','doro'),
						'validate'  => '',
						'required' => array('social-icon-site', '=' , 'yes')
					),

					 array(
						'id'        => 'instagram',
						'type'      => 'text',
						'title'     => esc_attr__('Instagram Link', 'doro'),
						'subtitle'  => esc_attr__('Insert instagram url here.', 'doro'),
						'dece'      => esc_attr__('','doro'),
						'validate'  => '',
						'required' => array('social-icon-site', '=' , 'yes')
					),

					 array(
						'id'        => 'pinterest',
						'type'      => 'text',
						'title'     => esc_attr__('Pinterest Link', 'doro'),
						'subtitle'  => esc_attr__('Insert pinterest url here.', 'doro'),
						'dece'      => esc_attr__('','doro'),
						'validate'  => '',
						'required' => array('social-icon-site', '=' , 'yes')
					),
					 array(
						'id'        => 'youtube',
						'type'      => 'text',
						'title'     => esc_attr__('Youtube Link', 'doro'),
						'subtitle'  => esc_attr__('Insert youtube url here.', 'doro'),
						'dece'      => esc_attr__('','doro'),
						'validate'  => '',
						'required' => array('social-icon-site', '=' , 'yes')
					),	
					 array(
						'id'        => 'vimeo',
						'type'      => 'text',
						'title'     => esc_attr__('Vimeo Link', 'doro'),
						'subtitle'  => esc_attr__('Insert vimeo url here.', 'doro'),
						'dece'      => esc_attr__('','doro'),
						'validate'  => '',
						'required' => array('social-icon-site', '=' , 'yes')
					),	
					 array(
						'id'        => 'soundcloud',
						'type'      => 'text',
						'title'     => esc_attr__('Soundcloud link', 'doro'),
						'subtitle'  => esc_attr__('Insert soundcloud url here.', 'doro'),
						'dece'      => esc_attr__('','doro'),
						'validate'  => '',
						'required' => array('social-icon-site', '=' , 'yes')
					),			

					 array(
						'id'        => 'skype',
						'type'      => 'text',
						'title'     => esc_attr__('Skype Link', 'doro'),
						'subtitle'  => esc_attr__('Insert skype url here.', 'doro'),
						'dece'      => esc_attr__('','doro'),
						'validate'  => '',
						'required' => array('social-icon-site', '=' , 'yes')
					),
					 array(
						'id'        => 'dribbble',
						'type'      => 'text',
						'title'     => esc_attr__('Dribbble Link', 'doro'),
						'subtitle'  => esc_attr__('Insert dribbble url here.', 'doro'),
						'dece'      => esc_attr__('','doro'),
						'validate'  => '',
						'required' => array('social-icon-site', '=' , 'yes')
					),

					 array(
						'id'        => 'dropbox',
						'type'      => 'text',
						'title'     => esc_attr__('Dropbox Link', 'doro'),
						'subtitle'  => esc_attr__('Insert dropbox url here.', 'doro'),
						'dece'      => esc_attr__('','doro'),
						'validate'  => '',
						'required' => array('social-icon-site', '=' , 'yes')
					),			
					 array(
						'id'        => 'github',
						'type'      => 'text',
						'title'     => esc_attr__('Github Link:', 'doro'),
						'subtitle'  => esc_attr__('Insert github url here.', 'doro'),
						'dece'      => esc_attr__('','doro'),
						'validate'  => '',
						'required' => array('social-icon-site', '=' , 'yes')
					),
					
					array(
						'id'        => 'tumblr',
						'type'      => 'text',
						'title'     => esc_attr__('Tumblr Link:', 'doro'),
						'subtitle'  => esc_attr__('Insert tumblr url here.', 'doro'),
						'dece'      => esc_attr__('','doro'),
						'validate'  => '',
						'required' => array('social-icon-site', '=' , 'yes')
					),

					 array(
						'id'        => 'email',
						'type'      => 'text',
						'title'     => esc_attr__('E-mail:', 'doro'),
						'subtitle'  => esc_attr__('Insert e-mail address here.', 'doro'),
						'dece'      => esc_attr__('','doro'),
						'validate'  => '',
						'required' => array('social-icon-site', '=' , 'yes')
					),   

					array(
							'id'       => 'opt_add_more_social',
							'type'     => 'multi_text',
							'title'    => esc_html__( 'Add More Social Icons', 'doro' ),
							'subtitle' => esc_html__( '', 'doro' ),
							'desc'     => __( 'Ex: &lt;a target="_blank" href="#"&gt;&lt;i class="fab fa-facebook-f font-14px "&gt;&lt;/i&gt;&lt;/a&gt;<br>Use <a href="https://fontawesome.com/icons?d=listing" target="_blank">Fontawesome</a> Icon Class', 'foxeresto' ),
							'required' => array('social-icon-site', '=' , 'yes')
					),
					
					)
				));	

            Redux::setSection( $opt_name, array(
                    'icon'   => 'el-icon-text-width',
                    'title'  => __( 'Typography', 'doro' ),
                    'fields' => array(     
						array(
                            'id'          => 'typo_body',
                            'type'        => 'typography', 
                            'title'       => __('Body', 'doro'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('body'),
                            'units'       =>'px',
                            'line-height'       =>false,
                            'subtitle'    => esc_attr__('Specify the Body Text font properties.', 'doro'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						array(
			                'id' => 'notice_critical11',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => __('Entry Headings', 'doro'),
			                'desc' => __('Entry Headings in posts/pages', 'doro')
			            ),								
                        array(
                            'id'          => 'typography-h1',
                            'type'        => 'typography', 
                            'title'       => __('H1', 'doro'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('h1'),
                            'units'       =>'px',
                            'subtitle'    => __('Specify the Heading font properties.', 'doro'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),	
                        array(
                            'id'          => 'typography-h2',
                            'type'        => 'typography', 
                            'title'       => __('H2', 'doro'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('h2'),
                            'units'       =>'px',
                            'subtitle'    => __('Specify the Heading font properties.', 'doro'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),      
                        ),
                        array(
                            'id'          => 'typography-h3',
                            'type'        => 'typography', 
                            'title'       => __('H3', 'doro'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('h3'),
                            'units'       =>'px',
                            'subtitle'    => __('Specify the Heading font properties.', 'doro'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),	
                        array(
                            'id'          => 'typography-h4',
                            'type'        => 'typography', 
                            'title'       => __('H4', 'doro'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('h4'),
                            'units'       =>'px',
                            'subtitle'    => __('Specify the Heading font properties.', 'doro'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),                        	
                        array(
                            'id'          => 'typography-h5',
                            'type'        => 'typography', 
                            'title'       => __('H5', 'doro'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('h5'),
                            'units'       =>'px',
                            'subtitle'    => __('Specify the Heading font properties.', 'doro'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),	
                        array(
                            'id'          => 'typography-h6',
                            'type'        => 'typography', 
                            'title'       => __('H6', 'doro'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('h6'),
                            'units'       =>'px',
                            'subtitle'    => __('Specify the Heading font properties.', 'doro'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),	
						  
						array(
			                'id' => 'notice_critical13',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => __('Page', 'doro'),
			                'desc' => __('', 'doro')
			            ),
                        array(
                            'id'          => 'typography-pgtl',
                            'type'        => 'typography', 
                            'title'       => __('Page Title', 'doro'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.doro-heading'),
                            'units'       =>'px',
                            'subtitle'    => __('Specify the page title font properties.', 'doro'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),						

                        array(
                            'id'          => 'typography-pgcontentl',
                            'type'        => 'typography', 
                            'title'       => __('Content', 'doro'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('p, .page-content p'),
                            'units'       =>'px',
                            'subtitle'    => __('Specify the page content text font properties.', 'doro'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),							
						),						
                        array(
                            'id'          => 'typography-pgsecwdtl',
                            'type'        => 'typography', 
                            'title'       => __('Sidebar Widget Title', 'doro'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.doro-sidebar-block .doro-sidebar-block-title'),
                            'units'       =>'px',
                            'subtitle'    => __('Specify the page section title font properties.', 'doro'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),							
						), 						
						array(
			                'id' => 'notice_critical14',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => __('Post', 'doro'),
			                'desc' => __('', 'doro')
			            ),	
                        array(
                            'id'          => 'typography-bltl',
                            'type'        => 'typography', 
                            'title'       => __('Title', 'doro'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.single-post .doro-post-heading'),
                            'units'       =>'px',
                            'subtitle'    => __('Specify the blog post title font properties.', 'doro'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),							
						),						
                        array(
                            'id'          => 'typography-blcon',
                            'type'        => 'typography', 
                            'title'       => __('Content', 'doro'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.post-content p, .comment-text p'),
                            'units'       =>'px',
                            'subtitle'    => __('Specify the blog post content font properties.', 'doro'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),							
						),	
						array(
			                'id' => 'notice_critical1_permalink1',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => __('Permalink', 'doro'),
			                'desc' => __('', 'doro')
			            ),	
                        array(
                            'id'          => 'typography-lnurl',
                            'type'        => 'typography', 
                            'title'       => __('Link URL', 'doro'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('a'),
                            'units'       =>'px',
                            'subtitle'    => __('Specify the permalink link url font properties.', 'doro'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),							
						),		
						array(
                            'id'          => 'typography-a-hover',
                            'type'        => 'typography', 
                            'title'       => esc_attr__('Link URL Hover', 'doro'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('a:focus, a:hover'),
                            'units'       =>'px',
                            'subtitle'    => esc_attr__('Specify the permalink font properties.', 'doro'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),	
                        array(
                            'id'          => 'typography-readlnurl',
                            'type'        => 'typography', 
                            'title'       => __('Read More Link URL', 'doro'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.blog-entry .desc a.lead'),
                            'units'       =>'px',
                            'subtitle'    => __('Specify the permalink link url font properties.', 'doro'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),							
						),
                        array(
                            'id'          => 'typography-readlnurlhover',
                            'type'        => 'typography', 
                            'title'       => __('Read More Link Hover', 'doro'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.blog-entry .desc a.lead:hover'),
                            'units'       =>'px',
                            'subtitle'    => __('Specify the permalink link url font properties.', 'doro'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),							
						),						
						array(
			                'id' => 'notice_critical1_intro',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => __('Intro Slider', 'doro'),
			                'desc' => __('', 'doro')
			            ),
						array(
                            'id'          => 'typography-intro-slide',
                            'type'        => 'typography', 
                            'title'       => esc_attr__('Intro Slider Title', 'doro'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('#doro-hero .flexslider .slider-text > .slider-text-inner h1, #doro-hero .flexslider .slider-text > .slider-text-inner h1'),
                            'units'       =>'px',
                            'subtitle'    => esc_attr__('Specify the permalink font properties.', 'doro'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),	
						array(
			                'id' => 'notice_critical1_heading',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => __('Section Heading', 'doro'),
			                'desc' => __('', 'doro')
			            ),
						array(
                            'id'          => 'typography-heading-title',
                            'type'        => 'typography', 
                            'title'       => esc_attr__('Heading Title', 'doro'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.doro-heading'),
                            'units'       =>'px',
                            'subtitle'    => esc_attr__('Specify the permalink font properties.', 'doro'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),	
						array(
                            'id'          => 'typography-heading-subtitle',
                            'type'        => 'typography', 
                            'title'       => esc_attr__('Heading Subtitle', 'doro'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.heading-meta'),
                            'units'       =>'px',
                            'subtitle'    => esc_attr__('Specify the permalink font properties.', 'doro'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),						
						array(
			                'id' => 'notice_critical1_navmenu',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => __('Navigation', 'doro'),
			                'desc' => __('', 'doro')
			            ),		
						array(
                            'id'          => 'typography-a-navmenu',
                            'type'        => 'typography', 
                            'title'       => esc_attr__('Navigation Menu', 'doro'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('#doro-aside #doro-main-menu > ul > li > a'),
                            'units'       =>'px',
                            'subtitle'    => esc_attr__('Specify the permalink font properties.', 'doro'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),	
						array(
                            'id'          => 'typography-a-navmenu-hover',
                            'type'        => 'typography', 
                            'title'       => esc_attr__('Navigation Menu Hover', 'doro'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('#doro-aside #doro-main-menu > ul > li > a:hover, #doro-aside #doro-main-menu > ul > li.active > a, #doro-aside #doro-main-menu > ul > li.open > a'),
                            'units'       =>'px',
                            'subtitle'    => esc_attr__('Specify the permalink font properties.', 'doro'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),	
						array(
			                'id' => 'notice_critical1_footer',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => __('Copyright', 'doro'),
			                'desc' => __('', 'doro')
			            ),
						array(
                            'id'          => 'typography-footer-copy',
                            'type'        => 'typography', 
                            'title'       => esc_attr__('Footer Copyright', 'doro'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.doro-lead, .doro-lead p'),
                            'units'       =>'px',
                            'subtitle'    => esc_attr__('Specify the permalink font properties.', 'doro'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						array(
                            'id'          => 'typography-nav-copy',
                            'type'        => 'typography', 
                            'title'       => esc_attr__('Nav Copyright', 'doro'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('#doro-aside .doro-footer small, #doro-aside .doro-footer small p'),
                            'units'       =>'px',
                            'subtitle'    => esc_attr__('Specify the permalink font properties.', 'doro'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),						
                    )
               ) );					

				 Redux::setSection( $opt_name, array(
                    'icon'   => 'el-icon-th-large',
                    'title'  => esc_html__( 'Footer Settings', 'doro' ),
                    'fields' => array(
					array(
							'id' => 'theme-cus-footer',
							'type' => 'info',
		                    'notice' => true,
		                    'style' => 'info',
							'title' => esc_html__('Footer Section', 'doro'),
							'desc' => esc_html__('', 'doro')
							
					),	
			        array(
							'id' => 'footer-section',
							'type' => 'button_set',
							'title' => esc_attr__('Footer Section', 'doro'),
							'default'  => 'yes',
							'options' => array(
									'yes'=> esc_attr__('Enable', 'doro'),
									'no'=> esc_attr__('Disable', 'doro'),
							),							
					),						
					array(
							'id' => 'theme-cus-copy',
							'type' => 'info',
		                    'notice' => true,
		                    'style' => 'info',
							'title' => esc_html__('Copyright Text', 'doro'),
							'desc' => esc_html__('', 'doro')
							
					  ),
			        array(
							'id' => 'footer-copyright',
							'type' => 'button_set',
							'title' => esc_attr__('Footer Copyright', 'doro'),
							'default'  => 'yes',
							'options' => array(
									'yes'=> esc_attr__('Enable', 'doro'),
									'no'=> esc_attr__('Disable', 'doro'),
							),	
							'required' => array('footer-section', '=' , 'yes')
					),					  
					array(
							'id' => 'copyright',
							'type' => 'textarea',
							'title' => esc_html__('Footer Copyright', 'doro'),
							'subtitle' => esc_html__('Insert footer copyright text here.', 'doro'),
							'required' => array('footer-copyright', '=' , 'yes')
					),
			        array(
							'id' => 'nav-copyright',
							'type' => 'button_set',
							'title' => esc_attr__('Navigation Copyright', 'doro'),
							'default'  => 'yes',
							'options' => array(
									'yes'=> esc_attr__('Enable', 'doro'),
									'no'=> esc_attr__('Disable', 'doro'),
							),	
					),					
					array(
							'id' => 'copyright2',
							'type' => 'textarea',
							'title' => esc_html__('Navigation Sidebar Copyright', 'doro'),
							'subtitle' => esc_html__('Insert navigation sidebar copyright text here.', 'doro'),
							'required' => array('nav-copyright', '=' , 'yes')
					),							
					array(
			                'id' => 'notice_footer_logo',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Footer Options', 'doro'),	
							'required' => array('footer-section', '=' , 'yes')
			        ),	
			        array(
							'id' => 'footer-logo',
							'type' => 'button_set',
							'title' => esc_attr__('Footer Logo', 'doro'),
							'default'  => 'yes',
							'options' => array(
									'yes'=> esc_attr__('Enable', 'doro'),
									'no'=> esc_attr__('Disable', 'doro'),
							),
							'required' => array('footer-section', '=' , 'yes')
					),						
					array(
							'id' => 'textlogo2',
							'type' => 'button_set',
							'title' => esc_html__('Select Logo Format', 'doro'),
							'subtitle' => esc_html__('', 'doro'),
							'desc' => '',
							'options' => array(
									'st1'=> esc_html__('Text Logo', 'doro'),
									'st2' => esc_html__('Image Logo', 'doro'),
									
							),
							'default'  => 'st1',
							'required' => array('footer-logo', '=' , 'yes')
					),
					 
					array(
							'id' => 'logopic2',
							'type' => 'media',
							'compiler' => 'true',
							'title' => esc_html__('Logo Image', 'doro'),
							'subtitle' => esc_html__('Image Size 150x30', 'doro'),
							'required' => array('textlogo2', '=' , 'st2')
					),
					
					$fields = array(
							'id'       => 'opt_footer_logo_dimensions',
							'type'     => 'dimensions',
							'units'    => array('em','px','%'),
							'output' => array('.logo-holder.logo-footer-img img'),
							'title'    => esc_html__('Logo Size', 'doro'),
							'subtitle' => esc_html__('.', 'doro'),
							'desc'     => esc_html__('Optional', 'doro'),
							'default'  => array(
								'Width'   => '150', 
								'Height'  => '30'
							),
							'required' => array('textlogo2', '=' , 'st2')
				    ),					
					array(
							'id' => 'logotext3',
							'type' => 'text',
							'title' => esc_html__('Logo Text ', 'doro'),
							'subtitle' => esc_html__('', 'doro'),
							'required' => array('textlogo2', '=' , 'st1')
					
					),					
					array(
							'id' => 'logopic2_url',
							'type' => 'text',
							'title' => esc_html__('Logo URL ', 'doro'),
							'subtitle' => esc_html__('Optional', 'doro'),
							'required' => array('footer-logo', '=' , 'yes')
					
					),	

					array(
						'id' => 'notice_site_to_top',
						'type' => 'info',
						'notice' => true,
						'style' => 'success',
						'title' => esc_html__('Scroll To Top Button Option', 'doro'),
						'desc' => esc_html__('Enable/Disable to top button.', 'doro'),
					),
							
					array(
						'id' => 'enable_scroll_top',
						'type' => 'button_set',
						'title' => esc_attr__('Scroll To Top Button', 'doro'),
						'subtitle' => esc_attr__('', 'doro'),
						'desc' => '',
						'options' => array(
							'st1'=> esc_html__('Enable', 'doro'),
							'st2' => esc_html__('Disable', 'doro'),
						),
						'default'  => 'st1'
					),
					
					)
                ) );
				
				Redux::setSection( $opt_name, array(
                    'icon'   => 'el-icon-key',
                    'title'  => esc_html__( 'Documentation', 'doro' ),
                    'fields' => array(										
					array(
							'id' => 'docs',
							'type' => 'info',
		                    'notice' => true,
		                    'style' => 'info',
							'title' => esc_html__('Doro Theme Documentation', 'doro'),
							'desc' => __('<a href="http://webredox.net/demo/wp/doro/doc/documentation.html" target="_blank">Click Here</a> To get the theme documentation.', 'doro')
							
					),	
			
					)
                ));
				
				
    /*
     * <--- END SECTIONS
     */


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */

    /*
    *
    * --> Action hook examples
    *
    */

    // If Redux is running as a plugin, this will remove the demo notice and links
    //add_action( 'redux/loaded', 'remove_demo' );

    // Function to test the compiler hook and demo CSS output.
    // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
    //add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);

    // Change the arguments after they've been declared, but before the panel is created
    //add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );

    // Change the default value of a field after it's been set, but before it's been useds
    //add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );

    // Dynamically add a section. Can be also used to modify sections/fields
    //add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $return['error'] = $field;
                $field['msg']    = 'your custom error message';
            }

            if ( $warning == true ) {
                $return['warning'] = $field;
                $field['msg']      = 'your custom warning message';
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => esc_html__( 'Section via hook', 'doro' ),
                'desc'   => esc_html__( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'doro' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-doro plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }

