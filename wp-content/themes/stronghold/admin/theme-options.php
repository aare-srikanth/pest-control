<?php
/**
 * Created by PhpStorm.
 * User: venkat
 * Date: 2/5/16
 * Time: 4:32 PM        
 */
include_once( get_template_directory() . '/admin/kirki/kirki.php' );     
include_once( get_template_directory() . '/admin/kirki-helpers/class-stronghold-kirki.php' );
       
Stronghold_Kirki::add_config( 'stronghold', array(     
	'capability'    => 'edit_theme_options',                  
	'option_type'   => 'theme_mod',          
) );                
     
// stronghold option start //   

//  site identity section // 

Stronghold_Kirki::add_section( 'title_tagline', array(
	'title'          => __( 'Site Identity','stronghold' ),
	'description'    => __( 'Site Header Options', 'stronghold'),       
	'priority'       => 8,         															
) );

Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'logo_title',
	'label'    => __( 'Enable Logo as Title', 'stronghold' ),
	'section'  => 'title_tagline',
	'type'     => 'switch',
	'priority' => 5,
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'stronghold' ),
		'off' => esc_attr__( 'Disable', 'stronghold' )
	),
	'default'  => 'off',   
) );
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'tagline',
	'label'    => __( 'Show site Tagline', 'stronghold' ), 
	'section'  => 'title_tagline',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'stronghold' ),
		'off' => esc_attr__( 'Disable', 'stronghold' )
	),
	'default'  => 'on',
) );

// home panel //

Stronghold_Kirki::add_panel( 'home_options', array(     
	'title'       => __( 'Home', 'stronghold' ),
	'description' => __( 'Home Page Related Options', 'stronghold' ),     
) );  

// home page type section

Stronghold_Kirki::add_section( 'home_type_section', array(
	'title'          => __( 'General Settings','stronghold' ),
	'description'    => __( 'Home Page options', 'stronghold'),
	'panel'          => 'home_options', // Not typically needed. 
) );

Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'enable_home_default_content',
	'label'    => __( 'Enable Home Page Default Content', 'stronghold' ),
	'section'  => 'home_type_section',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'stronghold' ),
		'off' => esc_attr__( 'Disable', 'stronghold' ) 
	),
	'default'  => 'off',
	'tooltip' => __('Enable home page default content ( home page content )','stronghold'),
) );
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'home_sidebar',
	'label'    => __( 'Enable sidebar on the Home page', 'stronghold' ),
	'section'  => 'home_type_section',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'stronghold' ),
		'off' => esc_attr__( 'Disable', 'stronghold' )
	),
	
	'default'  => 'off',
	'tooltip' => __('Disable by default. If you want to display the sidebars in your frontpage, turn this Enable.','stronghold'),
) );
 

// Slider section

Stronghold_Kirki::add_section( 'slider_section', array(
	'title'          => __( 'Slider Section','stronghold' ),
	'description'    => __( 'Home Page Slider Related Options', 'stronghold'),
	'panel'          => 'home_options', // Not typically needed. 
) );
Stronghold_Kirki::add_field( 'stronghold', array(  
	'settings' => 'enable_slider',
	'label'    => __( 'Enable Slider Post ( Section )', 'stronghold' ),
	'section'  => 'slider_section',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'stronghold' ),
		'off' => esc_attr__( 'Disable', 'stronghold' ),
	),
	'default'  => 'on',
	
	'tooltip' => __('Enable Slider Post in home page','stronghold'),
) );

Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'slider_cat',
	'label'    => __( 'Slider Posts category', 'stronghold' ),
	'section'  => 'slider_section',
	'type'     => 'select',
	'choices' => Kirki_Helper::get_terms( 'category' ),
	'active_callback' => array(
		array(
			'setting'  => 'enable_slider',
			'operator' => '==',
			'value'    => true,
		),
    ),
    'tooltip' => __('Create post ( Goto Dashboard => Post => Add New ) and Post Featured Image ( Preferred size is 1200 x 450 pixels ) as taken as slider image and Post Content as taken as Flexcaption.','stronghold'),
) );
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'slider_count',
	'label'    => __( 'No. of Sliders', 'stronghold' ),
	'section'  => 'slider_section',
	'type'     => 'number',
	'choices' => array(
		'min' => 1,
		'max' => 999,
		'step' => 1,
	),
	'default'  => 2,
	'active_callback' => array(
		array(
			'setting'  => 'enable_slider',
			'operator' => '==',
			'value'    => true,
		),
    ),
    'tooltip' => __('Enter number of slides you want to display under your selected Category','stronghold'),
) );

// magazine page content section 

Stronghold_Kirki::add_section( 'sidebar-widgets-magazine-page', array(   
	'title'          => __( 'Magazine Content Section','stronghold' ),
	'description'    => __( 'You can use the following widgets here ( stronghold: Featured Category Slider, stronghold: Highlighted Post, stronghold: Magazine Posts Boxed )', 'stronghold'),
	'panel'          => 'home_options', // Not typically needed.
) );
     
// service section 

Stronghold_Kirki::add_section( 'service_section', array(
	'title'          => __( 'Service Section','stronghold' ),
	'description'    => __( 'Home Page - Service Related Options', 'stronghold'),
	'panel'          => 'home_options', // Not typically needed. 
) );

Stronghold_Kirki::add_field( 'stronghold', array( 
	'settings' => 'enable_service',
	'label'    => __( 'Enable Service Section', 'stronghold' ),
	'section'  => 'service_section',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'stronghold' ),
		'off' => esc_attr__( 'Disable', 'stronghold' ) 
	),
	
	'default'  => 'on',
	'tooltip' => __('Enable service section in home page','stronghold'),
) ); 
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'service_count',
	'label'    => __( 'No. of Service Section', 'stronghold' ),
	'description' => __('Save the Settings, and Reload this page to Configure the service section','stronghold'),
	'section'  => 'service_section',
	'type'     => 'number',
	'choices' => array(
		'min' => 3,
		'max' => 99,
		'step' => 3,
	),
	'default'  => 3,
	'active_callback' => array(
		array(
			'setting'  => 'enable_service',
			'operator' => '==',
			'value'    => true,
		),
    ),
    'tooltip' => __('Enter number of service page you want to display','stronghold'),
) );

if ( get_theme_mod('service_count') > 0 ) {
 $service = get_theme_mod('service_count');
 		for ( $i = 1 ; $i <= $service ; $i++ ) {
             //Create the settings Once, and Loop through it.
 			Stronghold_Kirki::add_field( 'stronghold', array(
				'settings' => 'service_'.$i,
				'label'    => sprintf(__( 'Service Section #%1$s', 'stronghold' ), $i ),
				'section'  => 'service_section',
				'type'     => 'dropdown-pages',	
				//'tooltip' => __('Create Page ( Goto Dashboard => Page =>Add New ) and Page Featured Image ( Preferred size is 100 x 100 pixels )','stronghold'),
				'active_callback' => array(
					array(
						'setting'  => 'enable_service',
						'operator' => '==',
						'value'    => true,
					),
					
                ), 
               // 'description' => __('Create Page ( Goto Dashboard => Page =>Add New ) and Page Featured Image ( Preferred size is 100 x 100 pixels )','stronghold'),
        
			) );
 		}
}

// latest blog section 

Stronghold_Kirki::add_section( 'latest_blog_section', array(
	'title'          => __( 'Latest Blog Section','stronghold' ),
	'description'    => __( 'Home Page - Latest Blog Options', 'stronghold'),
	'panel'          => 'home_options', // Not typically needed. 
) );

Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'enable_recent_post_service',
	'label'    => __( 'Enable Recent Post Section', 'stronghold' ),
	'section'  => 'latest_blog_section',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'stronghold' ),
		'off' => esc_attr__( 'Disable', 'stronghold' ) 
	),
	
	'default'  => 'on',
	'tooltip' => __('Enable recent post section in home page','stronghold'),
) );

Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'recent_posts_count',
	'label'    => __( 'No. of Recent Posts', 'stronghold' ),
	'section'  => 'latest_blog_section',
	'type'     => 'number',
	'choices' => array(
		'min' => 3,
		'max' => 99,
		'step' => 3,
	),
	'default'  => 4,
	'active_callback' => array(
		array(
			'setting'  => 'enable_recent_post_service',
			'operator' => '==',
			'value'    => true,
		),
		
    ),
) );


Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'recent_posts_exclude', 
	'label'    => __( 'Exclude the Posts from Home Page. Post IDs, separated by commas', 'stronghold' ),
	'section'  => 'latest_blog_section',
	'type'     => 'text',
	'active_callback' => array(
		array(
			'setting'  => 'enable_recent_post_service',
			'operator' => '==',
			'value'    => true,
		),
    ),
) );
// general panel   

Stronghold_Kirki::add_panel( 'general_panel', array(   
	'title'       => __( 'General Settings', 'stronghold' ),  
	'description' => __( 'general settings', 'stronghold' ),         
) );

//  Page title bar section // 

Stronghold_Kirki::add_section( 'header-pagetitle-bar', array(   
	'title'          => __( 'Page Title Bar & Breadcrumb','stronghold' ),
	'description'    => __( 'Page Title bar related options', 'stronghold'),
	'panel'          => 'general_panel', // Not typically needed.
) );

Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'page_titlebar',  
	'label'    => __( 'Page Title Bar', 'stronghold' ),
	'section'  => 'header-pagetitle-bar', 
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		1 => __( 'Show Bar and Content', 'stronghold' ),
		2 => __( 'Show Content Only ', 'stronghold' ),
		3 => __('Hide','stronghold'),
    ),
    'default' => 1,
) );
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'page_titlebar_text',  
	'label'    => __( 'Page Title Bar Text', 'stronghold' ),
	'section'  => 'header-pagetitle-bar', 
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		1 => __( 'Show', 'stronghold' ),
		2 => __( 'Hide', 'stronghold' ), 
    ),
    'default' => 1,
) );
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'breadcrumb',  
	'label'    => __( 'Breadcrumb', 'stronghold' ),
	'section'  => 'header-pagetitle-bar', 
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'stronghold' ),
		'off' => esc_attr__( 'Disable', 'stronghold' ),
	),
	'default'  => 'on',
) ); 

Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'breadcrumb_char',
	'label'    => __( 'Breadcrumb Character', 'stronghold' ),
	'section'  => 'header-pagetitle-bar',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		1 => __( ' >> ', 'stronghold' ),
		2 => __( ' / ', 'stronghold' ),
		3 => __( ' > ', 'stronghold' ),
	),
	'default'  => 1,
	'active_callback' => array(
		array(
			'setting'  => 'breadcrumb',
			'operator' => '==',
			'value'    => true,
		),
	),
	//'sanitize_callback' => 'allow_htmlentities'
) );

//  pagination section // 

Stronghold_Kirki::add_section( 'general-pagination', array(   
	'title'          => __( 'Pagination','stronghold' ),
	'description'    => __( 'Pagination related options', 'stronghold'),
	'panel'          => 'general_panel', // Not typically needed.
) );
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'numeric_pagination',
	'label'    => __( 'Numeric Pagination', 'stronghold' ),   
	'section'  => 'general-pagination',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Numbered', 'stronghold' ),
		'off' => esc_attr__( 'Next/Previous', 'stronghold' )
	),
	'default'  => 'on',
) );

// skin color panel 

Stronghold_Kirki::add_panel( 'skin_color_panel', array(   
	'title'       => __( 'Skin Color', 'stronghold' ),  
	'description' => __( 'Color Settings', 'stronghold' ),         
) );

// Change Color Options

Stronghold_Kirki::add_section( 'primary_color_field', array(
	'title'          => __( 'Change Color Options','stronghold' ),
	'description'    => __( 'This will reflect in links, buttons,Navigation and many others. Choose a color to match your site.', 'stronghold'),
	'panel'          => 'skin_color_panel', // Not typically needed.
) );

Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'enable_primary_color',
	'label'    => __( 'Enable Custom Primary color', 'stronghold' ),
	'section'  => 'primary_color_field',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'stronghold' ),
		'off' => esc_attr__( 'Disable', 'stronghold' )
	),
	'default'  => 'off',
) );
Stronghold_Kirki::add_field( 'stronghold', array(  
	'settings' => 'primary_color',
	'label'    => __( 'Primary color', 'stronghold' ),
	'section'  => 'primary_color_field',
	'type'     => 'color',   
	'default'  => '#00c1cf',
	'choices'  => array (
		'alpha' => true,
	),
	'active_callback' => array(
		array (
			'setting'  => 'enable_primary_color',
			'operator' => '==',
			'value'    => true,
		),
	),
	'output' => array(
		array(
			'element'  => 'button,.dropcap-box,.dropcap-book,.widget_image-box-widget a.more-button:hover,
							input[type="button"],.ui-accordion .ui-accordion-header-active,.cnt-form .wpcf7-form input[type="text"]:focus,
							input[type="reset"],.widget_recent-work-widget .portfolio3col .img-wrap > a:before,
							input[type="submit"],input[type="text"]:focus,.icon-horizontal,
							.icon-vertical,.widget_testimonial-widget ul li img,.widget_image-box-widget .image-box img,
							input[type="email"]:focus,.widget_recent-work-widget .portfolio3col .overlay_icon a,
							input[type="url"]:focus, #filters ul.filter-options li a:hover::before, #filters ul.filter-options li a.selected::before,
							input[type="password"]:focus,.ui-accordion h3:hover,
							input[type="search"]:focus,.portfolioeffects:hover .portfolio_link_icons a:hover,
							textarea:focus,.sticky,.tabs-container .ui-tabs-panel,.tabs-container ul.ui-tabs-nav li.ui-tabs-active a',
			'property' => 'border-color',
		),
		array(
			'element'  => 'button,.sidebar .widget.widget_recent-work-widget ul.flex-direction-nav li a.flex-prev,
							.sidebar .widget.widget_recent-work-widget ul.flex-direction-nav li a.flex-next,.portfolioeffects .portfolio_overlay,
							input[type="button"],.widget_social-networks-widget ul li a,.widget_recent-posts-gallery-widget .recent-post:hover .post-title,#filters ul.filter-options li a:hover,
							#filters ul.filter-options li a.selected,.widget_testimonial-widget .flex-control-nav a.flex-active,
							.icon-horizontal:hover .fa-stack,.sidebar .dropcap-circle,button.menu-toggle,
							.sidebar .dropcap-box,.site-footer .widget.widget_recent-work-widget ul.flex-direction-nav li a.flex-prev,
							.site-footer .widget.widget_recent-work-widget ul.flex-direction-nav li a.flex-next,
							.icon-vertical:hover .fa-stack,.widget_recent-posts-gallery-widget .recent-post .post-overlay,
							input[type="reset"],.widget.widget_skill-widget .skill-container .skill .skill-percentage,
							input[type="submit"],.main-navigation ul ul li,.main-navigation ul ul a,.main-navigation .current_page_item > a,
							.main-navigation .current-menu-item > a,#secondary.sidebar .callout-widget,.flexslider .flex-direction-nav a,.widget .ei-slider-thumbs li.ei-slider-element,
							ul.ei-slider-thumbs li.ei-slider-element,.hr_fancy:before,.hr_fancy2:before, .hr_fancy2:after,
							.widget_button-widget .btn,a.btn-white:hover,.dropcap-circle,.toggle .toggle-title,.home .flexslider .flex-direction-nav li a,.home .flexslider .flex-direction-nav li a,.latest-posts .latest-post .latest-post-content p a,
							.dropcap-box,.dropcap-book,.sep:before,.circle-icon-box .more-button a,  
							.widget_button-widget .btn.white:hover,.cnt-form .wpcf7-form input[type="submit"],.entry-header .header-entry-meta span,
							.entry-body .header-entry-meta span,.site-footer .callout-widget p.call-btn a:hover,.site-footer .footer-bottom ul.menu li a:hover,.site-footer .footer-bottom ul.menu li.current_page_item a,.site-footer .icon-horizontal .fa-stack,
							.site-footer .icon-vertical .fa-stack,.sidebar .icon-horizontal .fa-stack,
							.sidebar .icon-vertical .fa-stack,.flexslider .flex-control-nav a.flex-active,.site-info ul a:hover,
							.main-navigation .current_page_ancestor > a,.share-box ul li a,.main-navigation ul.nav-menu > li a:hover,.post-navigation .nav-links a:hover,
							.paging-navigation .nav-links a:hover,.widget_calendar table caption,.tabs-container ul.ui-tabs-nav li.ui-tabs-active a,
							.comment-navigation .nav-links a:hover,.widget_calendar table td#today,.slicknav_menu .slicknav_btn,
							.woocommerce #content input.button,
							.woocommerce #respond input#submit,  
							.woocommerce a.button,
							.woocommerce button.button,
							.woocommerce input.button,
							.woocommerce-page #content input.button,
							.woocommerce-page #respond input#submit,
							.woocommerce-page a.button,
							.woocommerce-page button.button,
							.woocommerce-page input.button,.woocommerce #content table.cart a.remove:hover,
							.woocommerce table.cart a.remove:hover,
							.woocommerce-page #content table.cart a.remove:hover,
							.woocommerce-page table.cart a.remove:hover,.woocommerce #content nav.woocommerce-pagination ul li a,
							.woocommerce #content nav.woocommerce-pagination ul li span,
							.woocommerce nav.woocommerce-pagination ul li a,
							.woocommerce nav.woocommerce-pagination ul li span,
							.woocommerce-page #content nav.woocommerce-pagination ul li a,
							.woocommerce-page #content nav.woocommerce-pagination ul li span,
							.woocommerce-page nav.woocommerce-pagination ul li a,
							.woocommerce-page nav.woocommerce-pagination ul li span,.woocommerce #content nav.woocommerce-pagination ul li,
							.woocommerce #content nav.woocommerce-pagination ul,.woocommerce #content div.product .woocommerce-tabs ul.tabs li,.flex-caption a,
							.woocommerce div.product .woocommerce-tabs ul.tabs li,
							.woocommerce-page #content div.product .woocommerce-tabs ul.tabs li,
							.woocommerce-page div.product .woocommerce-tabs ul.tabs li,.site-footer .scroll-to-top:hover,.site-footer .scroll-to-top',
			'property' => 'background-color',
		),
		array(
			'element'  => '.widget-area .left-sidebar ul li a:hover,.site-footer .icon-vertical .icon-title,.site-footer .widget_list-widget ul li i,.columns.breadcrumb #breadcrumb a,
							.ui-accordion h3:hover span.ui-icon.fa,.pullleft:before,.icon-horizontal a.link-title i,#secondary .btn-white:hover,
							 #secondary .widget_button-widget .btn.white:hover,.callout-widget .call-btn a:hover,
							.icon-horizontal .icon-title i,.widget_testimonial-widget ul.flex-direction-nav li a,.content-area .widget_list-widget ul li i, .content-area .widget_list-widget ol li i,
							.icon-horizontal .fa-stack i,.related-posts ul#webulous-related-posts li a:hover,
							.icon-vertical a.link-title i,.sidebar .dropcap,.site-footer .widget.widget_ourteam-widget .team-content h4,
							.icon-vertical .icon-title i,.sidebar .icon-horizontal .icon-title,#secondary.sidebar .widget_testimonial-widget ul li .client,
							.sidebar .icon-vertical .icon-title,.site-footer .widget_testimonial-widget ul li .client,
							.icon-vertical .fa-stack i,.copy-write a,.circle-icon-box .icon-wrapper p.fa-stack i,.circle-icon-box:hover .service h4,
							.pullright:before,#recentcomments a,.ui-accordion h3:hover,.sidebar .widget_list-widget ul li i,.widget.widget_ourteam-widget:hover .team-content p,.sidebar .widget_recent_comments li a,.sidebar .widget_rss li a,ol.webulous_page_navi li a:hover,.sidebar a:hover,ol.comment-list .reply a,
							ol.comment-list .comment-metadata a:hover,.woocommerce ul.products li.product .price,
							.woocommerce-page ul.products li.product .price,
							.woocommerce #content div.product p.price,
							.woocommerce #content div.product span.price,
							.woocommerce div.product p.price,.site-info .copyright a,
							.woocommerce div.product span.price,.services-wrapper div:hover h1, .services-wrapper div:hover h2, .services-wrapper div:hover h3, .services-wrapper div:hover h4, .services-wrapper div:hover h5, .services-wrapper div:hover h6,
							.woocommerce-page #content div.product p.price,
							.woocommerce-page #content div.product span.price,.site-footer a:hover,a,
							.woocommerce-page div.product p.price,.star-rating,
							.woocommerce-page div.product span.price,ol.comment-list .fn,ol.comment-list li.byuser .comment-metadata a,ol.comment-list li.byuser .comment-metadata a:hover,ol.webulous_page_navi li.bpn-current,.site-header .site-title a:hover,.site-header #header-top a:hover',
			'property' => 'color',
		),
		
		array(
			'element' => '.widget.widget_skill-widget .skill-container .skill .skill-percentage:after,.pullleft,.pullright',
			'property' => 'border-top-color',
		),
	),
) );

Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'enable_nav_hover_color',
	'label'    => __( 'Enable Navigation Hover color', 'stronghold' ),
	'section'  => 'primary_color_field',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'stronghold' ),
		'off' => esc_attr__( 'Disable', 'stronghold' )
	),
	'default'  => 'off',
) );    
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'nav_hover_color',
	'label'    => __( 'Navigation Hover Color', 'stronghold' ),
	'section'  => 'primary_color_field',
	'type'     => 'color',
	'default'  => '#198b93',
	'choices'  => array (
		'alpha' => true,
	),
	'active_callback' => array(
		array(
			'setting'  => 'enable_nav_hover_color',
			'operator' => '==',
			'value'    => true,
		),
	),
	'output' => array(
		array(
			'element' => '#site-navigation ul li a:hover',
			'property' => 'background-color',
			
		),
	),
) );
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'enable_nav_dropdown_bg_color',
	'label'    => __( 'Enable Navigation Dropdown Background color', 'stronghold' ),
	'section'  => 'primary_color_field',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'stronghold' ),
		'off' => esc_attr__( 'Disable', 'stronghold' )
	),
	'default'  => 'off',
) );
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'nav_dropdown_bg_color',
	'label'    => __( 'Navigation Dropdown Background color', 'stronghold' ),
	'section'  => 'primary_color_field',
	'type'     => 'color',
	'default'  => '',
	'choices'  => array (
		'alpha' => true,
	),
	'active_callback' => array(
		array(
			'setting'  => 'enable_nav_dropdown_bg_color',
			'operator' => '==',
			'value'    => true,
		),
	),
	'output' => array(
		array(
			'element' => '.main-navigation ul.menu li:hover li a ',
			'property' => 'background-color',
		),
	),
) );



Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'enable_nav_dropdown_hover_color',
	'label'    => __( 'Enable Navigation Dropdown Hover color', 'stronghold' ),
	'section'  => 'primary_color_field',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'stronghold' ),
		'off' => esc_attr__( 'Disable', 'stronghold' )
	),
	'default'  => 'off',
) );
Stronghold_Kirki::add_field( 'stronghold', array(  
	'settings' => 'nav_bar_color' ,
	'label'    => __( 'Navigation Dropdown Hover color', 'stronghold' ),
	'section'  => 'primary_color_field',
	'type'     => 'color',
	'default'  => '',
	'choices'  => array (
		'alpha' => true,
	),
	'active_callback' => array(
		array(
			'setting'  => 'enable_nav_dropdown_hover_color',
			'operator' => '==',
			'value'    => true,
		),
	),
	'output' => array(
		array(
			'element' => '#site-navigation ul li .sub-menu li a:hover',
			'property' => 'background-color',
			'suffix' => '!important',
		),
	),
) );

Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'enable_secondary_color',
	'label'    => __( 'Enable Custom Secondary color', 'stronghold' ),
	'section'  => 'primary_color_field',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'stronghold' ),
		'off' => esc_attr__( 'Disable', 'stronghold' )
	),
	'default'  => 'off',
) );
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'secondary_color',
	'label'    => __( 'Secondary Color', 'stronghold' ),
	'section'  => 'primary_color_field',
	'type'     => 'color',
	'default'  => '#1e1e1e',
	'choices'  => array (
		'alpha' => true,
	),
	'active_callback' => array(
		array(
			'setting'  => 'enable_secondary_color',
			'operator' => '==',
			'value'    => true,
		),
	),
	'output' => array(
		array(
			'element' => 'input,
						select,
						textarea,ol.comment-list a:hover,#respond .comment-form label,
						.sidebar .circle-icon-box:hover .icon-wrapper p.fa-stack i:before,.sidebar a,#secondary .widget ul li:before, #secondary .widget ol li:before,
						.site-footer .widget ul li:before,.callout-widget a,.ui-accordion h3,.widget_recent-work-widget .portfolio3col h4,.flexslider .flex-caption a,.columns.breadcrumb #breadcrumb #crumbs,
						.site-footer .widget ol li:before,.alert-message,.circle-icon-box:hover .icon-wrapper p.fa-stack i,
						.widget.widget_ourteam-widget .team-content p,.sidebar .widget_rss li a:hover,.search-form input.search-field,.widget_tag_cloud .tagcloud a:hover,.sidebar .widget_recent_comments li a:hover',
			'property' => 'color',
		),
		array(
			'element' => 'button:hover,.slicknav_menu,,#secondary.sidebar .callout-widget p.call-btn a:hover,
						input[type="button"]:hover,.error-404.not-found .page-header,.not-found-inner a:hover,
						input[type="reset"]:hover,.widget.widget_skill-widget .skill-container .skill,
						input[type="submit"]:hover,.site-footer,.site-footer .search-form input,.site-footer .footer-top:after',
			'property' => 'background-color',
		),
       array(
			'element' => 'button:hover,
							input[type="button"]:hover,
							input[type="reset"]:hover,
							input[type="submit"]:hover,button:focus,
							input[type="button"]:focus,
							input[type="reset"]:focus,
							input[type="submit"]:focus,
							button:active,
							input[type="button"]:active,
							input[type="reset"]:active,
							input[type="submit"]:active,.left-sidebar',
			'property' => 'border-color',
			'suffix' => '!important',
		),
        array(
			'element' => 'abbr, acronym',
			'property' => 'border-bottom-color',
		),
	),
) );
// typography panel //

Stronghold_Kirki::add_panel( 'typography', array( 
	'title'       => __( 'Typography', 'stronghold' ),
	'description' => __( 'Typography and Link Color Settings', 'stronghold' ),
) );
   
    Stronghold_Kirki::add_section( 'typography_section', array(
		'title'          => __( 'General Settings','stronghold' ),
		'description'    => __( 'General Settings', 'stronghold'),
		'panel'          => 'typography', // Not typically needed.
	) );
	Stronghold_Kirki::add_field( 'stronghold', array(
		'settings' => 'custom_typography',
		'label'    => __( 'Enable Custom Typography', 'stronghold' ),
		'description' => __('Save the Settings, and Reload this page to Configure the typography section','stronghold'),
		'section'  => 'typography_section',
		'type'     => 'switch',
		'choices' => array(
			'on'  => esc_attr__( 'Enable', 'stronghold' ),
			'off' => esc_attr__( 'Disable', 'stronghold' )
		),
		'tooltip' => __('Turn on to customize typography and turn off for default typography','stronghold'),
		'default'  => 'off',
	) );

$typography_setting = get_theme_mod('custom_typography',false );
if( $typography_setting ) :

        $body_font = get_theme_mod('body_family','Lora');		        
	    $body_color = get_theme_mod( 'body_color','#1e1e1e' );   
		$body_size = get_theme_mod( 'body_size','16');
		$body_weight = get_theme_mod( 'body_weight','regular');
		$body_weight == 'bold' ? $body_weight = '400':  $body_weight = 'regular';
		

	Stronghold_Kirki::add_section( 'body_font', array(
		'title'          => __( 'Body Font','stronghold' ),
		'description'    => __( 'Specify the body font properties', 'stronghold'),
		'panel'          => 'typography', // Not typically needed.
	) ); 


	Stronghold_Kirki::add_field( 'stronghold', array(
		'settings' => 'body',
		'label'    => __( 'Body Settings', 'stronghold' ),
		'section'  => 'body_font', 
		'type'     => 'typography',
		'default'     => array(
			'font-family'    => $body_font,
			'variant'        => $body_weight,
			'font-size'      => $body_size.'px',
			'line-height'    => '1.5',
			'letter-spacing' => '0',
			'color'          => $body_color,
		),
		'output'      => array(
			array(
				'element' => 'body',
				//'suffix' => '!important',
			),
		),
	) );


	Stronghold_Kirki::add_section( 'heading_section', array(
		'title'          => __( 'Heading Font','stronghold' ),
		'description'    => __( 'Specify typography of H1, H2, H3, H4, H5, H6', 'stronghold'),
		'panel'          => 'typography', // Not typically needed.
	) );
	

	$h1_font = get_theme_mod('h1_family','Exo');
	$h1_color = get_theme_mod( 'h1_color','#242424' );
	$h1_size = get_theme_mod( 'h1_size','48');
	$h1_weight = get_theme_mod( 'h1_weight','700');
	$h1_weight == 'bold' ? $h1_weight = '700' : $h1_weight = 'regular';

	Stronghold_Kirki::add_field( 'stronghold', array(
		'settings' => 'h1',
		'label'    => __( 'H1 Settings', 'stronghold' ),
		'section'  => 'heading_section',
		'type'     => 'typography',
		'default'     => array(
			'font-family'    => $h1_font,
			'variant'        => $h1_weight,
			'font-size'      => $h1_size.'px',
			'line-height'    => '1.8',
			'letter-spacing' => '0',
			'color'          => $h1_color,
		),
		'output'      => array(
			array(
				'element' => 'h1',
			),
		),
	
	) );

	$h2_font = get_theme_mod('h2_family','Exo');
	$h2_color = get_theme_mod( 'h2_color','#242424' );
	$h2_size = get_theme_mod( 'h2_size','36');
	$h2_weight = get_theme_mod( 'h2_weight','700');
	$h2_weight == 'bold' ? $h2_weight = '700' : $h2_weight = 'regular';

	Stronghold_Kirki::add_field( 'stronghold', array(
		'settings' => 'h2',
		'label'    => __( 'H2 Settings', 'stronghold' ),
		'section'  => 'heading_section',
		'type'     => 'typography',
		'default'     => array(
			'font-family'    => $h2_font,
			'variant'        => $h2_weight,
			'font-size'      => $h2_size.'px',
			'line-height'    => '1.8',
			'letter-spacing' => '0',
			'color'          => $h2_color,
		),
		'output'      => array(
			array(
				'element' => 'h2',
			),
		),
		
	) );

	$h3_font = get_theme_mod('h3_family','Exo');
	$h3_color = get_theme_mod( 'h3_color','#242424' );
	$h3_size = get_theme_mod( 'h3_size','30');
	$h3_weight = get_theme_mod( 'h3_weight','700');
	$h3_weight == 'bold' ? $h3_weight = '700' : $h3_weight = 'regular';

	Stronghold_Kirki::add_field( 'stronghold', array(
		'settings' => 'h3',
		'label'    => __( 'H3 Settings', 'stronghold' ),
		'section'  => 'heading_section',
		'type'     => 'typography',
		'default' => array(
			'font-family'    => $h3_font,
			'variant'        => $h3_weight,
			'font-size'      => $h3_size.'px',
			'line-height'    => '1.8',
			'letter-spacing' => '0',
			'color'          => $h3_color,
		),
		'output'      => array(
			array(
				'element' => 'h3',
			),
		),
	
	) );

	$h4_font = get_theme_mod('h4_family','Exo');
	$h4_color = get_theme_mod( 'h4_color','#242424' );
	$h4_size = get_theme_mod( 'h4_size','24');
	$h4_weight = get_theme_mod( 'h4_weight','700');
	$h4_weight == 'bold' ? $h4_weight = '700' : $h4_weight = 'regular';


	Stronghold_Kirki::add_field( 'stronghold', array(
		'settings' => 'h4',
		'label'    => __( 'H4 Settings', 'stronghold' ),
		'section'  => 'heading_section',
		'type'     => 'typography',
		'default'     => array(
			'font-family'    => $h4_font,
			'variant'        => $h4_weight,
			'font-size'      => $h4_size.'px',
			'line-height'    => '1.8',
			'letter-spacing' => '0',
			'color'          => $h4_color,
		),
		'output'      => array(
			array(
				'element' => 'h4',
			),
		),
		
	) );

    $h5_font = get_theme_mod('h5_family','Exo');
	$h5_color = get_theme_mod( 'h5_color','#242424' );
	$h5_size = get_theme_mod( 'h5_size','18');
	$h5_weight = get_theme_mod( 'h5_weight','700');
	$h5_weight == 'bold' ? $h5_weight = '700' : $h5_weight = 'regular';


	Stronghold_Kirki::add_field( 'stronghold', array(
		'settings' => 'h5',
		'label'    => __( 'H5 Settings', 'stronghold' ),
		'section'  => 'heading_section',
		'type'     => 'typography',
		'default'     => array(
			'font-family'    => $h5_font,
			'variant'        => $h5_weight,
			'font-size'      => $h5_size.'px',
			'line-height'    => '1.8',
			'letter-spacing' => '0',
			'color'          => $h5_color,
		),
		'output'      => array(
			array(
				'element' => 'h5',
			),
		),
	
	) );

	$h6_font = get_theme_mod('h6_family','Exo');
	$h6_color = get_theme_mod( 'h6_color','#242424' );
	$h6_size = get_theme_mod( 'h6_size','16');
	$h6_weight = get_theme_mod( 'h6_weight','700');
	$h6_weight == 'bold' ? $h6_weight = '700' : $h6_weight = 'regular';


	Stronghold_Kirki::add_field( 'stronghold', array(
		'settings' => 'h6',
		'label'    => __( 'H6 Settings', 'stronghold' ),
		'section'  => 'heading_section',
		'type'     => 'typography',
		'default'     => array(
			'font-family'    => $h6_font,
			'variant'        => $h6_weight,
			'font-size'      => $h6_size.'px',
			'line-height'    => '1.8',
			'letter-spacing' => '0',
			'color'          => $h6_color,
		),
		'output'      => array(
			array(
				'element' => 'h6',
			),
		),
		
	) );

	// navigation font 
	Stronghold_Kirki::add_section( 'navigation_section', array(
		'title'          => __( 'Navigation Font','stronghold' ),
		'description'    => __( 'Specify Navigation font properties', 'stronghold'),
		'panel'          => 'typography', // Not typically needed.
	) );

	Stronghold_Kirki::add_field( 'stronghold', array(
		'settings' => 'navigation_font',
		'label'    => __( 'Navigation Font Settings', 'stronghold' ),
		'section'  => 'navigation_section',
		'type'     => 'typography',
		'default'     => array(
			'font-family'    => 'Lora',
			'variant'        => '400',
			'font-size'      => '16px',
			'line-height'    => '1.8', 
			'letter-spacing' => '0',
			'color'          => '#ffffff',
		),
		'output'      => array(
			array(
				'element' => '.main-navigation a',
			),
		),
	) );
endif; 


// header panel //

Stronghold_Kirki::add_panel( 'header_panel', array(     
	'title'       => __( 'Header', 'stronghold' ),
	'description' => __( 'Header Related Options', 'stronghold' ), 
) );  

/*Stronghold_Kirki::add_section( 'header', array(
	'title'          => __( 'General Header','stronghold' ),
	'description'    => __( 'Header options', 'stronghold'),
	'panel'          => 'header_panel', // Not typically needed.  
) );    

Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'header_text_color',
	'label'    => __( 'Header Text Color', 'stronghold' ),
	'section'  => 'header',
	'type'     => 'color',
	'choices'  => array (
		'alpha' => true,
	),
	'default'  => '#ffffff', 
	'output'   => array(
		array(
			'element'  => '.main-navigation a,.site-header .branding .site-branding .site-title a,.main-navigation ul ul a,.main-navigation a:hover, .main-navigation .current_page_item > a, .main-navigation .current-menu-item > a, .main-navigation .current-menu-parent > a, .main-navigation .current_page_ancestor > a, .main-navigation .current_page_parent > a',
			'property' => 'color',
		),
	),
) );*/
/*Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'header_search',
	'label'    => __( 'Enable to Show Search box in Header', 'stronghold' ), 
	'section'  => 'header',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'stronghold' ),
		'off' => esc_attr__( 'Disable', 'stronghold' )
	),
	'default'  => 'on',
) );*/
/* Breaking News section  */
/*Stronghold_Kirki::add_section( 'header_breaking_news', array(
	'title'          => __( 'Breaking News','stronghold' ),
	'description'    => __( 'Breaking News', 'stronghold'),
	'panel'          => 'header_panel', // Not typically needed.
) );
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'header_breaking_news',
	'label'    => __( 'Enable Breaking News', 'stronghold' ), 
	'section'  => 'header_breaking_news',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'stronghold' ),
		'off' => esc_attr__( 'Disable', 'stronghold' )
	),
	'active_callback' => array(
		array(
			'setting'  => 'home-page-type',
			'operator' => '==',
			'value'    => 'magazine',
		),
    ),
	'default'  => 'off',
) );
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'header_breaking_news_title',
	'label'    => __( 'Breaking News Title', 'stronghold' ),
	'section'  => 'header_breaking_news',
	'type'     => 'text',
	'active_callback' => array(
		array(
			'setting'  => 'home-page-type', 
			'operator' => '==',
			'value'    => 'magazine',
		),
		array(
			'setting'  => 'header_breaking_news', 
			'operator' => '==',
			'value'    => true,
		),
    ),
    'default' => __('LATEST NEWS','stronghold'),   
) );*/
/* STICKY HEADER section */   

Stronghold_Kirki::add_section( 'stricky_header', array(
	'title'          => __( 'Sticky Menu','stronghold' ),
	'description'    => __( 'sticky header', 'stronghold'),
	'panel'          => 'header_panel', // Not typically needed.
) );
Stronghold_Kirki::add_field( 'stronghold', array(    
	'settings' => 'sticky_header',
	'label'    => __( 'Enable Sticky Header', 'stronghold' ),
	'section'  => 'stricky_header',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'stronghold' ),
		'off' => esc_attr__( 'Disable', 'stronghold' )
	),
	'default'  => 'on',
) );
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'sticky_header_position',
	'label'    => __( 'Enable Sticky Header Position', 'stronghold' ),
	'section'  => 'stricky_header',
	'type'     => 'radio-buttonset',
	'choices' => array(
		'top'  => esc_attr__( 'Top', 'stronghold' ),
		'bottom' => esc_attr__( 'Bottom', 'stronghold' )
	),
	'active_callback'    => array(
		array(
			'setting'  => 'sticky_header',
			'operator' => '==',
			'value'    => true,
		),
	),
	'default'  => 'top',
) );

Stronghold_Kirki::add_section( 'scroll_to_top', array(
	'title'          => __( 'Scroll to Top','stronghold' ),
	'description'    => __( 'Scroll to Top Button', 'stronghold'),
	'panel'          => 'header_panel', // Not typically needed.
) );
Stronghold_Kirki::add_field( 'stronghold', array(    
	'settings' => 'scroll_to_top_button',
	'label'    => __( 'Enable Scroll to Top', 'stronghold' ),
	'section'  => 'scroll_to_top',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'stronghold' ),
		'off' => esc_attr__( 'Disable', 'stronghold' )
	),
	'default'  => 'on',
) );

/*
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'header_top_margin',
	'label'    => __( 'Header Top Margin', 'stronghold' ),
	'description' => __('Select the top margin of header in pixels','stronghold'),
	'section'  => 'header',
	'type'     => 'number',
	'choices' => array(
		'min' => 1,
		'max' => 1000,
		'step' => 1,
	),
	//'default'  => '213',
) );
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'header_bottom_margin',
	'label'    => __( 'Header Bottom Margin', 'stronghold' ),
	'description' => __('Select the bottom margin of header in pixels','stronghold'),
	'section'  => 'header',
	'type'     => 'number',
	'choices' => array(
		'min' => 1,
		'max' => 1000,
		'step' => 1,
	),
	//'default'  => '213',
) );*/

Stronghold_Kirki::add_section( 'header_image', array(
	'title'          => __( 'Header Background Image & Video','stronghold' ),
	'description'    => __( 'Custom Header Image & Video options', 'stronghold'),
	'panel'          => 'header_panel', // Not typically needed.  
) );

Stronghold_Kirki::add_field( 'stronghold', array(   
	'settings' => 'header_bg_size',
	'label'    => __( 'Header Background Size', 'stronghold' ),
	'section'  => 'header_image',
	'type'     => 'radio-buttonset', 
    'choices' => array(
		'cover'  => esc_attr__( 'Cover', 'stronghold' ),
		'contain' => esc_attr__( 'Contain', 'stronghold' ),
		'auto'  => esc_attr__( 'Auto', 'stronghold' ),
		'inherit'  => esc_attr__( 'Inherit', 'stronghold' ),
	),
	'output'   => array(
		array(
			'element'  => '.site-header-sticky .branding',
			'property' => 'background-size',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'header_image',
			'operator' => '!=',
			'value'    => 'remove-header',
		),
	),
	'default'  => 'cover',
	'tooltip' => __('Header Background Image Size','stronghold'),
) );

/*Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'header_height',
	'label'    => __( 'Header Background Image Height', 'stronghold' ),
	'section'  => 'header_image',
	'type'     => 'number',
	'choices' => array(
		'min' => 100,
		'max' => 600,
		'step' => 1,
	),
	'default'  => '213',
) ); */
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'header_bg_repeat',
	'label'    => __( 'Header Background Repeat', 'stronghold' ),
	'section'  => 'header_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'no-repeat' => esc_attr__('No Repeat', 'stronghold'),
        'repeat' => esc_attr__('Repeat', 'stronghold'),
        'repeat-x' => esc_attr__('Repeat Horizontally','stronghold'),
        'repeat-y' => esc_attr__('Repeat Vertically','stronghold'),
	),
	'output'   => array(
		array(
			'element'  => '.header-image',
			'property' => 'background-repeat',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'header_image',
			'operator' => '!=',
			'value'    => 'remove-header',
		),
	),
	'default'  => 'repeat',  
) );
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'header_bg_position', 
	'label'    => __( 'Header Background Position', 'stronghold' ),
	'section'  => 'header_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'center top' => esc_attr__('Center Top', 'stronghold'),
        'center center' => esc_attr__('Center Center', 'stronghold'),
        'center bottom' => esc_attr__('Center Bottom', 'stronghold'),
        'left top' => esc_attr__('Left Top', 'stronghold'),
        'left center' => esc_attr__('Left Center', 'stronghold'),
        'left bottom' => esc_attr__('Left Bottom', 'stronghold'),
        'right top' => esc_attr__('Right Top', 'stronghold'),
        'right center' => esc_attr__('Right Center', 'stronghold'),
        'right bottom' => esc_attr__('Right Bottom', 'stronghold'),
	),
	'output'   => array(
		array(
			'element'  => '.header-image',
			'property' => 'background-position',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'header_image',
			'operator' => '!=',
			'value'    => 'remove-header',
		),
	),
	'default'  => 'center center',  
) );
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'header_bg_attachment',
	'label'    => __( 'Header Background Attachment', 'stronghold' ),
	'section'  => 'header_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'scroll' => esc_attr__('Scroll', 'stronghold'),
        'fixed' => esc_attr__('Fixed', 'stronghold'),
	),
	'output'   => array(
		array(
			'element'  => '.header-image',
			'property' => 'background-attachment',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'header_image',
			'operator' => '!=',
			'value'    => 'remove-header',
		),
	),
	'default'  => 'scroll',  
) );
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'header_overlay',
	'label'    => __( 'Enable Header( Background ) Overlay', 'stronghold' ),
	'section'  => 'header_image',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'stronghold' ),
		'off' => esc_attr__( 'Disable', 'stronghold' )
	),
	'default'  => 'off',
) );
  
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'header_overlay_color',
	'label'    => __( 'Header Overlay ( Background )color', 'stronghold' ),
	'section'  => 'header_image',
	'type'     => 'color',
	'choices'  => array (
		'alpha' => true,
	),
	'default'  => '#E5493A', 
	'output'   => array(
		array(
			'element'  => '.overlay-header',
			'property' => 'background-color',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'header_overlay',
			'operator' => '==',
			'value'    => true,
		),
	),
) );

/*
/* e-option start */
/*
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'custon_favicon',
	'label'    => __( 'Custom Favicon', 'stronghold' ),
	'section'  => 'header',
	'type'     => 'upload',
	'default'  => '',
) ); */
/* e-option start */ 
/* Blog page section */


/* Blog panel */

Stronghold_Kirki::add_panel( 'blog_panel', array(     
	'title'       => __( 'Blog', 'stronghold' ),
	'description' => __( 'Blog Related Options', 'stronghold' ),     
) ); 
Stronghold_Kirki::add_section( 'blog', array(
	'title'          => __( 'Blog Page','stronghold' ),
	'description'    => __( 'Blog Related Options', 'stronghold'),
	'panel'          => 'blog_panel', // Not typically needed.
) );
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'blog-slider',
	'label'    => __( 'Enable to show the slider on blog page', 'stronghold' ),
	'section'  => 'blog',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'stronghold' ),
		'off' => esc_attr__( 'Disable', 'stronghold' ) 
	),
	'default'  => 'off',
	'tooltip' => __('To show the slider on posts page','stronghold'),
) );
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'blog_slider_cat',
	'label'    => __( 'Blog Slider Posts category', 'stronghold' ),
	'section'  => 'blog',
	'type'     => 'select',
	'choices' => Kirki_Helper::get_terms( 'category' ),
	'active_callback' => array(
		array(
			'setting'  => 'blog-slider',
			'operator' => '==',
			'value'    => true,
		),
    ),
    'tooltip' => __('Create post ( Goto Dashboard => Post => Add New ) and Post Featured Image ( Preferred size is 1200 x 450 pixels ) as taken as slider image and Post Content as taken as Flexcaption.','stronghold'),
) );
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'blog_slider_count',
	'label'    => __( 'No. of Sliders', 'stronghold' ),
	'section'  => 'blog',
	'type'     => 'number',
	'choices' => array(
		'min' => 1,
		'max' => 999,
		'step' => 1,
	),
	'default'  => 2,
	'active_callback' => array(
		array(
			'setting'  => 'blog-slider',
			'operator' => '==',
			'value'    => true,
		),
    ),
    'tooltip' => __('Enter number of slides you want to display under your selected Category','stronghold'),
) );
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'blog_layout',
	'label'    => __( 'Select Blog Page Layout you prefer', 'stronghold' ),
	'section'  => 'blog',
	'type'     => 'select',
	'multiple'  => 1,
	'choices' => array(
		1  => esc_attr__( 'Default ( One Column )', 'stronghold' ),
		2 => esc_attr__( 'Two Columns ', 'stronghold' ),
		3 => esc_attr__( 'Three Columns ( Without Sidebar ) ', 'stronghold' ),
		4 => esc_attr__( 'Two Columns With Masonry', 'stronghold' ),
		5 => esc_attr__( 'Three Columns With Masonry ( Without Sidebar ) ', 'stronghold' ),
	),
	'default'  => 1,
) );
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'featured_image',
	'label'    => __( 'Enable Featured Image', 'stronghold' ),
	'section'  => 'blog',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'stronghold' ),
		'off' => esc_attr__( 'Disable', 'stronghold' ) 
	),
	'default'  => 'on',
	'tooltip' => __('Enable Featured Image for blog page','stronghold'),
) );
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'more_text',
	'label'    => __( 'More Text', 'stronghold' ),
	'section'  => 'blog',
	'type'     => 'text',
	'description' => __('Text to display in case of text too long','stronghold'),
	'default' => __('Read More','stronghold'),
) );
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'featured_image_size',
	'label'    => __( 'Choose the Featured Image Size for Blog Page', 'stronghold' ),
	'section'  => 'blog',
	'type'     => 'select',
	'multiple'  => 1,
	'choices' => array(
		1 => esc_attr__( 'Large Featured Image', 'stronghold' ),
		2 => esc_attr__( 'Small Featured Image', 'stronghold' ),
		3 => esc_attr__( 'Original Size', 'stronghold' ),
		4 => esc_attr__( 'Medium', 'stronghold' ),
		5 => esc_attr__( 'Large', 'stronghold' ), 
	),
	'default'  => 1,
	'active_callback' => array(
		array(
			'setting'  => 'featured_image',
			'operator' => '==',
			'value'    => true,
		),
    ),
    'tooltip' => __('Set large and medium image size: Goto Dashboard => Settings => Media', 'stronghold') ,
) );
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'enable_single_post_top_meta',
	'label'    => __( 'Enable to display top post meta data', 'stronghold' ),
	'section'  => 'blog',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'stronghold' ),
		'off' => esc_attr__( 'Disable', 'stronghold' ) 
	),
	'default'  => 'on',
	'tooltip' => __('Enable to Display Top Post Meta Details. This will reflect for blog page, single blog page, blog full width & blog large templates','stronghold'),
) );
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'single_post_top_meta',
	'label'    => __( 'Activate and Arrange the Order of Top Post Meta elements', 'stronghold' ),
	'section'  => 'blog',
	'type'     => 'sortable',
	'choices'     => array(
		1 => esc_attr__( 'date', 'stronghold' ),
		2 => esc_attr__( 'author', 'stronghold' ),
		3 => esc_attr__( 'comment', 'stronghold' ),
		4 => esc_attr__( 'category', 'stronghold' ),
		5 => esc_attr__( 'tags', 'stronghold' ),
		6 => esc_attr__( 'edit', 'stronghold' ),
	),
	'default'  => array(1, 2, 6),
	'active_callback' => array(
		array(
			'setting'  => 'enable_single_post_top_meta',
			'operator' => '==',
			'value'    => true,
		),
    ),
    'tooltip' => __('Click above eye icon in order to activate the field, This will reflect for blog page, single blog page, blog full width & blog large templates','stronghold'),

) );
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'enable_single_post_bottom_meta',
	'label'    => __( 'Enable to display bottom post meta data', 'stronghold' ),
	'section'  => 'blog', 
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'stronghold' ),
		'off' => esc_attr__( 'Disable', 'stronghold' ) 
	),
	'tooltip' => __('Enable to Display Top Post Meta Details. This will reflect for blog page, single blog page, blog full width & blog large templates','stronghold'),
	'default'  => 'on',
) );
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'single_post_bottom_meta',
	'label'    => __( 'Activate and arrange the Order of Bottom Post Meta elements', 'stronghold' ),
	'section'  => 'blog',
	'type'     => 'sortable',
	'choices'     => array(
		1 => esc_attr__( 'date', 'stronghold' ),
		2 => esc_attr__( 'author', 'stronghold' ),
		3 => esc_attr__( 'comment', 'stronghold' ),
		4 => esc_attr__( 'category', 'stronghold' ),
		5 => esc_attr__( 'tags', 'stronghold' ),
		6 => esc_attr__( 'edit', 'stronghold' ),
	),
	'default'  => array(3,4,5),
	'active_callback' => array(
		array(
			'setting'  => 'enable_single_post_bottom_meta',
			'operator' => '==',
			'value'    => true,
		),
    ),
    'tooltip' => __('Click above eye icon in order to activate the field, This will reflect for blog page, single blog page, blog full width & blog large templates','stronghold'),
) );


/* Single Blog page section */   

Stronghold_Kirki::add_section( 'single_blog', array(
	'title'          => __( 'Single Blog Page','stronghold' ),
	'description'    => __( 'Single Blog Page Related Options', 'stronghold'),
	'panel'          => 'blog_panel', // Not typically needed.
) );
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'single_featured_image',
	'label'    => __( 'Enable Single Post Featured Image', 'stronghold' ),
	'section'  => 'single_blog',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'stronghold' ),
		'off' => esc_attr__( 'Disable', 'stronghold' ) 
	),
	'default'  => 'on',
	'tooltip' => __('Enable Featured Image for Single Post Page','stronghold'),
) );
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'single_featured_image_size',
	'label'    => __( 'Choose the featured image display type for Single Post Page', 'stronghold' ),
	'section'  => 'single_blog',
	'type'     => 'radio',
	'choices' => array(
		1  => esc_attr__( 'Large Featured Image', 'stronghold' ),
		2 => esc_attr__( 'Small Featured Image', 'stronghold' ),
		3 => esc_attr__( 'FullWidth Featured Image', 'stronghold' ),
	),
	'default'  => 1, 
	'active_callback' => array(
		array(
			'setting'  => 'single_featured_image',
			'operator' => '==',
			'value'    => true,
		),
    ),
) );

Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'author_bio_box',
	'label'    => __( 'Enable Author Bio Box below single post', 'stronghold' ),
	'section'  => 'single_blog',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'stronghold' ),
		'off' => esc_attr__( 'Disable', 'stronghold' ) 
	),
	'default'  => 'off',
) );
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'social_sharing_box',
	'label'    => __( 'Show social sharing options box below single post', 'stronghold' ),
	'section'  => 'single_blog',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'stronghold' ),
		'off' => esc_attr__( 'Disable', 'stronghold' ) 
	),
	'default'  => 'on',
) );
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'related_posts',
	'label'    => __( 'Show Related Posts', 'stronghold' ),
	'section'  => 'single_blog',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'stronghold' ),
		'off' => esc_attr__( 'Disable', 'stronghold' ) 
	),
	'default'  => 'off',
	'tooltip' => __('Show the Related Post for Single Blog Page','stronghold'),
) );
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'related_posts_hierarchy',
	'label'    => __( 'Related Posts Must Be Shown As:', 'stronghold' ),
	'section'  => 'single_blog',
	'type'     => 'radio',
	'choices' => array(
		1  => esc_attr__( 'Related Posts By Tags', 'stronghold' ),
		2 => esc_attr__( 'Related Posts By Categories', 'stronghold' ) 
	),
	'default'  => 1,
	'active_callback' => array(
		array(
			'setting'  => 'related_posts',
			'operator' => '==',
			'value'    => true,
		),
    ),
    'tooltip' => __('Select the Hierarchy','stronghold'),

) );
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'comments',
	'label'    => __( ' Show Comments', 'stronghold' ),
	'section'  => 'single_blog',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'stronghold' ),
		'off' => esc_attr__( 'Disable', 'stronghold' ) 
	),
	'default'  => 'on',
	'tooltip' => __('Show the Comments for Single Blog Page','stronghold'),
) );
//  social network panel //

Stronghold_Kirki::add_panel( 'social_panel', array(
	'title'        =>__( 'Social Networks', 'stronghold'),
	'description'  =>__( 'social networks', 'stronghold'),
	'priority'  =>11,	
));

//social sharing box section

Stronghold_Kirki::add_section( 'social_sharing_box', array(
	'title'          =>__( 'Social Sharing Box', 'stronghold'),
	'description'   =>__('Social Sharing box related options', 'stronghold'),
	'panel'			 =>'social_panel',
));

Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'facebook_sb',
	'label'    => __( 'Enable facebook sharing option below single post', 'stronghold' ),
	'section'  => 'social_sharing_box',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'stronghold' ),
		'off' => esc_attr__( 'Disable', 'stronghold' ) 
	),
	'default'  => 'on',
) );
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'twitter_sb',
	'label'    => __( 'Enable twitter sharing option below single post', 'stronghold' ),
	'section'  => 'social_sharing_box',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'stronghold' ),
		'off' => esc_attr__( 'Disable', 'stronghold' ) 
	),
	'default'  => 'on',
) );
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'linkedin_sb',
	'label'    => __( 'Enable linkedin sharing option below single post', 'stronghold' ),
	'section'  => 'social_sharing_box',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'stronghold' ),
		'off' => esc_attr__( 'Disable', 'stronghold' ) 
	),
	'default'  => 'on',
) );
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'google-plus_sb',
	'label'    => __( 'Enable googleplus sharing option below single post', 'stronghold' ),
	'section'  => 'social_sharing_box',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'stronghold' ),
		'off' => esc_attr__( 'Disable', 'stronghold' ) 
	),
	'default'  => 'on',
) );

Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'email_sb',
	'label'    => __( 'Enable email sharing option below single post', 'stronghold' ),
	'section'  => 'social_sharing_box',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'stronghold' ),
		'off' => esc_attr__( 'Disable', 'stronghold' ) 
	),
	'default'  => 'on',
) );
/* FOOTER SECTION 
footer panel */

Stronghold_Kirki::add_panel( 'footer_panel', array(     
	'title'       => __( 'Footer', 'stronghold' ),
	'description' => __( 'Footer Related Options', 'stronghold' ),     
) );  

Stronghold_Kirki::add_section( 'footer', array(
	'title'          => __( 'Footer','stronghold' ),
	'description'    => __( 'Footer related options', 'stronghold'),
	'panel'          => 'footer_panel', // Not typically needed.
) );

Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'footer_widgets',
	'label'    => __( 'Footer Widget Area', 'stronghold' ),
	'description' => sprintf(__('Select widgets, Goto <a href="%1$s"target="_blank"> Customizer </a> => Widgets','stronghold'),admin_url('customize.php') ),
	'section'  => 'footer',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'stronghold' ),
		'off' => esc_attr__( 'Disable', 'stronghold' ) 
	),
	'default'  => 'on',
) );
/* Choose No.Of Footer area */
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'footer_widgets_count',
	'label'    => __( 'Choose No.of widget area you want in footer', 'stronghold' ),
	'section'  => 'footer',
	'type'     => 'radio-buttonset',
	'choices' => array(
		1  => esc_attr__( '1', 'stronghold' ),
		2  => esc_attr__( '2', 'stronghold' ),
		3  => esc_attr__( '3', 'stronghold' ),
		4  => esc_attr__( '4', 'stronghold' ),
	),
	'default'  => 4,
) );

Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'copyright',
	'label'    => __( 'Footer Copyright Text', 'stronghold' ),
	'section'  => 'footer',
	'type'     => 'textarea',
) );
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'footer_top_margin',
	'label'    => __( 'Footer Top Margin', 'stronghold' ),
	'description' => __('Select the top margin of footer in pixels','stronghold'),
	'section'  => 'footer',
	'type'     => 'number',
	'choices' => array(
		'min' => 1,
		'max' => 1000,
		'step' => 1, 
	),
	'output'   => array(
		array(
			'element'  => '.site-footer',
			'property' => 'margin-top',
			'units' => 'px',
		),
	),
	'default'  => 0,
) );

/* CUSTOM FOOTER BACKGROUND IMAGE 
footer background image section  */

Stronghold_Kirki::add_section( 'footer_image', array(
	'title'          => __( 'Footer Image','stronghold' ),
	'description'    => __( 'Custom Footer Image options', 'stronghold'),
	'panel'          => 'footer_panel', // Not typically needed.
) );

Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'footer_bg_image',
	'label'    => __( 'Upload Footer Background Image', 'stronghold' ),
	'section'  => 'footer_image',
	'type'     => 'upload',
	'default'  => '',
	'output'   => array(
		array(
			'element'  => '.site-footer .footer-widgets',
			'property' => 'background-image',
		),
	),
) );
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'footer_bg_size',
	'label'    => __( 'Footer Background Size', 'stronghold' ),
	'section'  => 'footer_image',
	'type'     => 'radio-buttonset',
    'choices' => array(
		'cover'  => esc_attr__( 'Cover', 'stronghold' ),
		'contain' => esc_attr__( 'Contain', 'stronghold' ),
		'auto'  => esc_attr__( 'Auto', 'stronghold' ),
		'inherit'  => esc_attr__( 'Inherit', 'stronghold' ),
	),
	'output'   => array(
		array(
			'element'  => '.footer-image',
			'property' => 'background-size',
		),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'footer_bg_image',
			'operator' => '=',
			'value'    => true,
		),
	),
	'default'  => 'cover',
	'tooltip' => __('Footer Background Image Size','stronghold'),
) );
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'footer_bg_repeat',
	'label'    => __( 'Footer Background Repeat', 'stronghold' ),
	'section'  => 'footer_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'no-repeat' => esc_attr__('No Repeat', 'stronghold'),
        'repeat' => esc_attr__('Repeat', 'stronghold'),
        'repeat-x' => esc_attr__('Repeat Horizontally','stronghold'),
        'repeat-y' => esc_attr__('Repeat Vertically','stronghold'),
	),
	'output'   => array(
		array(
			'element'  => '.footer-image',
			'property' => 'background-repeat',
		),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'footer_bg_image',
			'operator' => '=',
			'value'    => true,
		),
	),
	'default'  => 'repeat',  
) );
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'footer_bg_position',
	'label'    => __( 'Footer Background Position', 'stronghold' ),
	'section'  => 'footer_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'center top' => esc_attr__('Center Top', 'stronghold'),
        'center center' => esc_attr__('Center Center', 'stronghold'),
        'center bottom' => esc_attr__('Center Bottom', 'stronghold'),
        'left top' => esc_attr__('Left Top', 'stronghold'),
        'left center' => esc_attr__('Left Center', 'stronghold'),
        'left bottom' => esc_attr__('Left Bottom', 'stronghold'),
        'right top' => esc_attr__('Right Top', 'stronghold'),
        'right center' => esc_attr__('Right Center', 'stronghold'),
        'right bottom' => esc_attr__('Right Bottom', 'stronghold'),
	),
	'output'   => array(
		array(
			'element'  => '.footer-image',
			'property' => 'background-position',
		),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'footer_bg_image',
			'operator' => '=',
			'value'    => true,
		),
	),
	'default'  => 'center center',  
) );
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'footer_bg_attachment',
	'label'    => __( 'Footer Background Attachment', 'stronghold' ),
	'section'  => 'footer_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'scroll' => esc_attr__('Scroll', 'stronghold'),
        'fixed' => esc_attr__('Fixed', 'stronghold'),
	),
	'output'   => array(
		array(
			'element'  => '.footer-image',
			'property' => 'background-attachment',
		),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'footer_bg_image',
			'operator' => '=',
			'value'    => true,
		),
	),
	'default'  => 'scroll',  
) );
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'footer_overlay',
	'label'    => __( 'Enable Footer( Background ) Overlay', 'stronghold' ),
	'section'  => 'footer_image',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'stronghold' ),
		'off' => esc_attr__( 'Disable', 'stronghold' )
	),
	'default'  => 'off',
) );
  
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'footer_overlay_color',
	'label'    => __( 'Footer Overlay ( Background )color', 'stronghold' ),
	'section'  => 'footer_image',
	'type'     => 'color',
	'choices'  => array (
		'alpha' => true,
	),
	'default'  => '#E5493A', 
	'active_callback' => array(
		array(
			'setting'  => 'footer_overlay',
			'operator' => '==',
			'value'    => true,
		),
	),
	'output'   => array(
		array(
			'element'  => '.overlay-footer,.site-footer .footer-bottom,.site-footer .site-info',
			'property' => 'background-color',
			'suffix' => '!important',  
		),
	),
) );


// single page section //

Stronghold_Kirki::add_section( 'single_page', array(
	'title'          => __( 'Single Page','stronghold' ),
	'description'    => __( 'Single Page Related Options', 'stronghold'),
) );
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'single_page_featured_image',
	'label'    => __( 'Enable Single Page Featured Image', 'stronghold' ),
	'section'  => 'single_page',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'stronghold' ),
		'off' => esc_attr__( 'Disable', 'stronghold' ) 
	),
	'default'  => 'on',
) );
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'single_page_featured_image_size',
	'label'    => __( 'Single Page Featured Image Size', 'stronghold' ),
	'section'  => 'single_page',
	'type'     => 'radio-buttonset',
	'choices' => array(
		1  => esc_attr__( 'Normal', 'stronghold' ),
		2 => esc_attr__( 'FullWidth', 'stronghold' ) 
	),
	'default'  => 1,
	'active_callback' => array(
		array(
			'setting'  => 'single_page_featured_image',
			'operator' => '==',
			'value'    => true,
		),
    ),
) );

// Layout section //

Stronghold_Kirki::add_section( 'layout', array(
	'title'          => __( 'Layout','stronghold' ),
	'description'    => __( 'Layout Related Options', 'stronghold'),
) );
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'site-style',
	'label'    => __( 'Site Style', 'stronghold' ),
	'section'  => 'layout',
	'type'     => 'radio-buttonset',
	'choices' => array(
		'wide' =>  esc_attr__('Wide', 'stronghold'),
        'boxed' =>  esc_attr__('Boxed', 'stronghold'),
        'fluid' =>  esc_attr__('Fluid', 'stronghold'),  
        //'static' =>  esc_attr__('Static ( Non Responsive )', 'stronghold'),
    ),
	'default'  => 'wide',
	'tooltip' => __('Select the default site layout. Defaults to "Wide".','stronghold'),
) );
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'sidebar_position',
	'label'    => __( 'Main Layout', 'stronghold' ),
	'section'  => 'layout',
	'type'     => 'radio-image',   
	'description' => __('Select main content and sidebar arranstrongholdent.','stronghold'),
	'choices' => array(
		'left' =>  get_template_directory_uri() . '/admin/kirki/assets/images/2cl.png',
        'right' =>  get_template_directory_uri() . '/admin/kirki/assets/images/2cr.png',
        'two-sidebar' =>  get_template_directory_uri() . '/admin/kirki/assets/images/3cm.png',  
        'two-sidebar-left' =>  get_template_directory_uri() . '/admin/kirki/assets/images/3cl.png',
        'two-sidebar-right' =>  get_template_directory_uri() . '/admin/kirki/assets/images/3cr.png',
        'fullwidth' =>  get_template_directory_uri() . '/admin/kirki/assets/images/1c.png',
        'no-sidebar' =>  get_template_directory_uri() . '/images/no-sidebar.png',
    ),
	'default'  => 'right',
	'tooltip' => __('This layout will be reflected in all pages unless unique layout template is set for specific page','stronghold'),
) );

Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'body_top_margin',
	'label'    => __( 'Body Top Margin', 'stronghold' ),
	'description' => __('Select the top margin of body element in pixels','stronghold'),
	'section'  => 'layout',
	'type'     => 'number',
	'choices' => array(
		'min' => 0,
		'max' => 200,
		'step' => 1,
	),
	'active_callback'    => array(
		array(
			'setting'  => 'site-style',
			'operator' => '==',
			'value'    => 'boxed',
		),
	),
	'output'   => array(
		array(
			'element'  => 'body',
			'property' => 'margin-top',
			'units'    => 'px',
		),
	),
	'default'  => 0,
) );
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'body_bottom_margin',
	'label'    => __( 'Body Bottom Margin', 'stronghold' ),
	'description' => __('Select the bottom margin of body element in pixels','stronghold'),
	'section'  => 'layout',
	'type'     => 'number',
	'choices' => array(
		'min' => 0,
		'max' => 200,
		'step' => 1,
	),
	'active_callback'    => array(
		array(
			'setting'  => 'site-style',
			'operator' => '==',
			'value'    => 'boxed',
		),
	),
	'output'   => array(
		array(
			'element'  => 'body',
			'property' => 'margin-bottom',
			'units'    => 'px',
		),
	),
	'default'  => 0,
) );

/* LAYOUT SECTION  */
/*
Stronghold_Kirki::add_section( 'layout', array(
	'title'          => __( 'Layout','stronghold' ),   
	'description'    => __( 'Layout settings that affects overall site', 'stronghold'),
	'panel'          => 'stronghold_options', // Not typically needed.
) );



Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'primary_sidebar_width',
	'label'    => __( 'Primary Sidebar Width', 'stronghold' ),
	'section'  => 'layout',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'1' => __( 'One Column', 'stronghold' ),
		'2' => __( 'Two Column', 'stronghold' ),
		'3' => __( 'Three Column', 'stronghold' ),
		'4' => __( 'Four Column', 'stronghold' ),
		'5' => __( 'Five Column ', 'stronghold' ),
	),
	'default'  => '5',  
	'tooltip' => __('Select the width of the Primary Sidebar. Please note that the values represent grid columns. The total width of the page is 16 columns, so selecting 5 here will make the primary sidebar to have a width of approximately 1/3 ( 4/16 ) of the total page width.','stronghold'),
) );
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'secondary_sidebar_width',
	'label'    => __( 'Secondary Sidebar Width', 'stronghold' ),
	'section'  => 'layout',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'1' => __( 'One Column', 'stronghold' ),
		'2' => __( 'Two Column', 'stronghold' ),
		'3' => __( 'Three Column', 'stronghold' ),
		'4' => __( 'Four Column', 'stronghold' ),
		'5' => __( 'Five Column ', 'stronghold' ),
	),            
	'default'  => '5',  
	'tooltip' => __('Select the width of the Secondary Sidebar. Please note that the values represent grid columns. The total width of the page is 16 columns, so selecting 5 here will make the primary sidebar to have a width of approximately 1/3 ( 4/16 ) of the total page width.','stronghold'),
) ); 

*/

/* FOOTER SECTION 
footer panel */

Stronghold_Kirki::add_panel( 'footer_panel', array(     
	'title'       => __( 'Footer', 'stronghold' ),
	'description' => __( 'Footer Related Options', 'stronghold' ),     
) );  

Stronghold_Kirki::add_section( 'footer', array(
	'title'          => __( 'Footer','stronghold' ),
	'description'    => __( 'Footer related options', 'stronghold'),
	'panel'          => 'footer_panel', // Not typically needed.
) );

Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'footer_widgets',
	'label'    => __( 'Footer Widget Area', 'stronghold' ),
	'description' => sprintf(__('Select widgets, Goto <a href="%1$s"target="_blank"> Customizer </a> => Widgets','stronghold'),admin_url('customize.php') ),
	'section'  => 'footer',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'stronghold' ),
		'off' => esc_attr__( 'Disable', 'stronghold' ) 
	),
	'default'  => 'on',
) );
/* Choose No.Of Footer area */
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'footer_widgets_count',
	'label'    => __( 'Choose No.of widget area you want in footer', 'stronghold' ),
	'section'  => 'footer',
	'type'     => 'radio-buttonset',
	'choices' => array(
		1  => esc_attr__( '1', 'stronghold' ),
		2  => esc_attr__( '2', 'stronghold' ),
		3  => esc_attr__( '3', 'stronghold' ),
		4  => esc_attr__( '4', 'stronghold' ),
	),
	'default'  => 4,
) );

Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'copyright',
	'label'    => __( 'Footer Copyright Text', 'stronghold' ),
	'section'  => 'footer',
	'type'     => 'textarea',
) );
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'footer_top_margin',
	'label'    => __( 'Footer Top Margin', 'stronghold' ),
	'description' => __('Select the top margin of footer in pixels','stronghold'),
	'section'  => 'footer',
	'type'     => 'number',
	'choices' => array(
		'min' => 1,
		'max' => 1000,
		'step' => 1, 
	),
	'output'   => array(
		array(
			'element'  => '.site-footer',
			'property' => 'margin-top',
			'units' => 'px',
		),
	),
	'default'  => 0,
) );

/* CUSTOM FOOTER BACKGROUND IMAGE 
footer background image section  */

Stronghold_Kirki::add_section( 'footer_image', array(
	'title'          => __( 'Footer Image','stronghold' ),
	'description'    => __( 'Custom Footer Image options', 'stronghold'),
	'panel'          => 'footer_panel', // Not typically needed.
) );

Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'footer_bg_image',
	'label'    => __( 'Upload Footer Background Image', 'stronghold' ),
	'section'  => 'footer_image',
	'type'     => 'upload',
	'default'  => '',
	'output'   => array(
		array(
			'element'  => '.footer-image',
			'property' => 'background-image',
		),
	),
) );
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'footer_bg_size',
	'label'    => __( 'Footer Background Size', 'stronghold' ),
	'section'  => 'footer_image',
	'type'     => 'radio-buttonset',
    'choices' => array(
		'cover'  => esc_attr__( 'Cover', 'stronghold' ),
		'contain' => esc_attr__( 'Contain', 'stronghold' ),
		'auto'  => esc_attr__( 'Auto', 'stronghold' ),
		'inherit'  => esc_attr__( 'Inherit', 'stronghold' ),
	),
	'output'   => array(
		array(
			'element'  => '.footer-image',
			'property' => 'background-size',
		),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'footer_bg_image',
			'operator' => '=',
			'value'    => true,
		),
	),
	'default'  => 'cover',
	'tooltip' => __('Footer Background Image Size','stronghold'),
) );
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'footer_bg_repeat',
	'label'    => __( 'Footer Background Repeat', 'stronghold' ),
	'section'  => 'footer_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'no-repeat' => esc_attr__('No Repeat', 'stronghold'),
        'repeat' => esc_attr__('Repeat', 'stronghold'),
        'repeat-x' => esc_attr__('Repeat Horizontally','stronghold'),
        'repeat-y' => esc_attr__('Repeat Vertically','stronghold'),
	),
	'output'   => array(
		array(
			'element'  => '.footer-image',
			'property' => 'background-repeat',
		),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'footer_bg_image',
			'operator' => '=',
			'value'    => true,
		),
	),
	'default'  => 'repeat',  
) );
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'footer_bg_position',
	'label'    => __( 'Footer Background Position', 'stronghold' ),
	'section'  => 'footer_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'center top' => esc_attr__('Center Top', 'stronghold'),
        'center center' => esc_attr__('Center Center', 'stronghold'),
        'center bottom' => esc_attr__('Center Bottom', 'stronghold'),
        'left top' => esc_attr__('Left Top', 'stronghold'),
        'left center' => esc_attr__('Left Center', 'stronghold'),
        'left bottom' => esc_attr__('Left Bottom', 'stronghold'),
        'right top' => esc_attr__('Right Top', 'stronghold'),
        'right center' => esc_attr__('Right Center', 'stronghold'),
        'right bottom' => esc_attr__('Right Bottom', 'stronghold'),
	),
	'output'   => array(
		array(
			'element'  => '.footer-image',
			'property' => 'background-position',
		),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'footer_bg_image',
			'operator' => '=',
			'value'    => true,
		),
	),
	'default'  => 'center center',  
) );
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'footer_bg_attachment',
	'label'    => __( 'Footer Background Attachment', 'stronghold' ),
	'section'  => 'footer_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'scroll' => esc_attr__('Scroll', 'stronghold'),
        'fixed' => esc_attr__('Fixed', 'stronghold'),
	),
	'output'   => array(
		array(
			'element'  => '.footer-image',
			'property' => 'background-attachment',
		),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'footer_bg_image',
			'operator' => '=',
			'value'    => true,
		),
	),
	'default'  => 'scroll',  
) );
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'footer_overlay',
	'label'    => __( 'Enable Footer( Background ) Overlay', 'stronghold' ),
	'section'  => 'footer_image',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'stronghold' ),
		'off' => esc_attr__( 'Disable', 'stronghold' )
	),
	'default'  => 'off',
) );
  
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'footer_overlay_color',
	'label'    => __( 'Footer Overlay ( Background )color', 'stronghold' ),
	'section'  => 'footer_image',
	'type'     => 'color',
	'choices'  => array (
		'alpha' => true,
	),
	'default'  => '#E5493A', 
	'active_callback' => array(
		array(
			'setting'  => 'footer_overlay',
			'operator' => '==',
			'value'    => true,
		),
	),
	'output'   => array(
		array(
			'element'  => '.overlay-footer',
			'property' => 'background-color',
		),
	),
) );

//  slider panel //

Stronghold_Kirki::add_panel( 'slider_panel', array(   
	'title'       => __( 'Slider Settings', 'stronghold' ),  
	'description' => __( 'Flex slider related options', 'stronghold' ), 
	'priority'    => 11,    
) );

//  flexslider section  //

Stronghold_Kirki::add_section( 'flex_caption_section', array(
	'title'          => __( 'Flexcaption Settings','stronghold' ),
	'description'    => __( 'Flexcaption Related Options', 'stronghold'),
	'panel'          => 'slider_panel', // Not typically needed.
) );
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'enable_flex_caption_edit',
	'label'    => __( 'Enable Custom Flexcaption Settings', 'stronghold' ),
	'section'  => 'flex_caption_section',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'stronghold' ),
		'off' => esc_attr__( 'Disable', 'stronghold' ) 
	),
	'default'  => 'off',
) );
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'flexcaption_bg',   
	'label'    => __( 'Select Flexcaption Background Color', 'stronghold' ),
	'section'  => 'flex_caption_section',
	'type'     => 'color',
	'default'  => '',
	'choices'  => array (
		'alpha' => true,
	),
	'output'   => array(
		array(
			'element'  => '.flex-caption',
			'property' => 'background-color',
			'suffix' => '!important',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'enable_flex_caption_edit',
			'operator' => '==',
			'value'    => true,
		),
    ),
) );
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'flexcaption_align',
	'label'    => __( 'Select Flexcaption Alignment', 'stronghold' ),
	'section'  => 'flex_caption_section',
	'type'     => 'select',
	'default'  => 'center',
	'choices' => array(
		'left' => esc_attr__( 'Left', 'stronghold' ),
		'right' => esc_attr__( 'Right', 'stronghold' ),
		'center' => esc_attr__( 'Center', 'stronghold' ),
		'justify' => esc_attr__( 'Justify', 'stronghold' ),
	),
	'output'   => array(
		array(
			'element'  => '.home .flexslider .slides .flex-caption p,.home .flexslider .slides .flex-caption h1, .home .flexslider .slides .flex-caption h2, .home .flexslider .slides .flex-caption h3, .home .flexslider .slides .flex-caption h4, .home .flexslider .slides .flex-caption h5, .home .flexslider .slides .flex-caption h6,.flexslider .slides .flex-caption,.flexslider .slides .flex-caption h1, .flexslider .slides .flex-caption h2, .flexslider .slides .flex-caption h3, .flexslider .slides .flex-caption h4, .flexslider .slides .flex-caption h5, .flexslider .slides .flex-caption h6,.flexslider .slides .flex-caption p,.flexslider .slides .flex-caption',
			'property' => 'text-align',
			//'suffix' => '!important',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'enable_flex_caption_edit',
			'operator' => '==',
			'value'    => true,
		),
    ),
) );
 Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'flexcaption_bg_position',
	'label'    => __( 'Select Flexcaption Background Horizontal Position', 'stronghold' ),
	'tooltip' => __('Select how far from right','stronghold'),
	'section'  => 'flex_caption_section',
	'type'     => 'number',
	'default'  => '0',
	'choices'     => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1, 
	),
	'output'   => array( 
		array(
			'element'  => '.flexslider .slides .flex-caption,.home .flexslider .slides .flex-caption',
			'property' => 'left',
			'suffix' => '%',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'enable_flex_caption_edit',
			'operator' => '==',
			'value'    => true,
		),
    ),
) ); 
 Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'flexcaption_bg_vertical_position',
	'label'    => __( 'Select Flexcaption Background Vertical Position', 'stronghold' ),
	'tooltip' => __('Select how far from top','stronghold'),
	'section'  => 'flex_caption_section',
	'type'     => 'number',
	'default'  => '30',
	'choices'     => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1, 
	),
	'output'   => array(
		array(
			'element'  => '.flexslider .slides .flex-caption,.home .flexslider .slides .flex-caption',
			'property' => 'top',
			'suffix' => '%',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'enable_flex_caption_edit',
			'operator' => '==',
			'value'    => true,
		),
    ),
) ); 
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'flexcaption_bg_width',
	'label'    => __( 'Select Flexcaption Background Width', 'stronghold' ),
	'section'  => 'flex_caption_section',
	'type'     => 'number',
	'default'  => '100',
	'tooltip' => __('Select Flexcaption Background Width ','stronghold'),
	'choices'     => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1, 
	),
	'output'   => array(
		array(
			'element'  => '.flexslider .slides .flex-caption,.home .flexslider .slides .flex-caption',
			'property' => 'width',
			'suffix' => '%',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'enable_flex_caption_edit',
			'operator' => '==',
			'value'    => true,
		),
    ),
) ); 
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'flexcaption_responsive_bg_width',
	'label'    => __( 'Select Responsive Flexcaption Background Width', 'stronghold' ),
	'section'  => 'flex_caption_section',
	'type'     => 'number',
	'default'  => '100',
	'tooltip' => __('Select Responsive Flexcaption Background Width, Default width value 100 ( This value will apply for max-width: 768px )','stronghold'),
	'choices'     => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1, 
	),
	'output'   => array(
		array(
			'element'  => '.flexslider .slides .flex-caption,.home .flexslider .slides .flex-caption',
			'property' => 'width',
			'media_query' => '@media (max-width: 768px)',
			'value_pattern' => 'calc($%)',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'enable_flex_caption_edit',
			'operator' => '==',
			'value'    => true,
		),
    ),
) );
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'flexcaption_color',
	'label'    => __( 'Select Flexcaption Font Color', 'stronghold' ),
	'section'  => 'flex_caption_section',
	'type'     => 'color',
	'default'  => '#ffffff',
	'choices'  => array (
		'alpha' => true,
	),
	'output'   => array(
		array(
			'element'  => '.flex-caption,.home .flexslider .slides .flex-caption p,
			.flexslider .slides .flex-caption p a,
			.flexslider .slides .flex-caption p,.home .flexslider .slides .flex-caption h1, .home .flexslider .slides .flex-caption h2, .home .flexslider .slides .flex-caption h3, .home .flexslider .slides .flex-caption h4, .home .flexslider .slides .flex-caption h5, .home .flexslider .slides .flex-caption h6,.flexslider .slides .flex-caption h1,.flexslider .slides .flex-caption h2,.flexslider .slides .flex-caption h3,.flexslider .slides .flex-caption h4,.flexslider .slides .flex-caption h5,.flexslider .slides .flex-caption h6',
			'property' => 'color',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'enable_flex_caption_edit',
			'operator' => '==',
			'value'    => true,
		),
    ), 
) );

 if( class_exists( 'WooCommerce' ) ) {
	Stronghold_Kirki::add_section( 'woocommerce_section', array(
		'title'          => __( 'WooCommerce','stronghold' ),
		'description'    => __( 'Theme options related to woocommerce', 'stronghold'),
		'priority'       => 11, 

		'theme_supports' => '', // Rarely needed.
	) );
	Stronghold_Kirki::add_field( 'woocommerce', array(
		'settings' => 'woocommerce_sidebar',
		'label'    => __( 'Enable Woocommerce Sidebar', 'stronghold' ),
		'description' => __('Enable Sidebar for shop page','stronghold'),
		'section'  => 'woocommerce_section',
		'type'     => 'switch',
		'choices' => array(
			'on'  => esc_attr__( 'Enable', 'stronghold' ),
			'off' => esc_attr__( 'Disable', 'stronghold' ) 
		),

		'default'  => 'on',
	) );
}
	
// background color ( rename )

Stronghold_Kirki::add_section( 'colors', array(
	'title'          => __( 'Background Color','stronghold' ),
	'description'    => __( 'This will affect overall site background color', 'stronghold'),
	//'panel'          => 'skin_color_panel', // Not typically needed.
	'priority' => 11,
) );
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'general_background_color',
	'label'    => __( 'General Background Color', 'stronghold' ),
	'section'  => 'colors',
	'type'     => 'color',
	'choices'  => array (
		'alpha' => true,
	),
	'default'  => '#ffffff',
	'output'   => array(
		array(
			'element'  => 'body',
			'property' => 'background-color',
		),
	),
) );
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'content_background_color',
	'label'    => __( 'Content Background Color', 'stronghold' ),
	'section'  => 'colors',
	'type'     => 'color',
	'description' => __('when you are select boxed layout content background color will reflect the grid area','stronghold'), 
	'choices'  => array (
		'alpha' => true,
	), 
	'default'  => '#ffffff',
	'output'   => array(
		array(
			'element'  => '.boxed-container',
			'property' => 'background-color',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'site-style',
			'operator' => '==',
			'value'    => 'boxed',
		),
	),
) );

Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'general_background_image',
	'label'    => __( 'General Background Image', 'stronghold' ),
	'section'  => 'background_image',
	'type'     => 'upload',
	'default'  => '',
	'output'   => array(
		array(
			'element'  => 'body',
			'property' => 'background-image',
		),
	),
) );

// background image ( general & boxed layout ) //


Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'general_background_repeat',
	'label'    => __( 'General Background Repeat', 'stronghold' ),
	'section'  => 'background_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'no-repeat' => esc_attr__('No Repeat', 'stronghold'),
        'repeat' => esc_attr__('Repeat', 'stronghold'),
        'repeat-x' => esc_attr__('Repeat Horizontally','stronghold'),
        'repeat-y' => esc_attr__('Repeat Vertically','stronghold'),
	),
	'output'   => array(
		array(
			'element'  => 'body',
			'property' => 'background-repeat',
		),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'general_background_image',
			'operator' => '==',
			'value'    => true,
		),
	),
	'default'  => 'repeat',  
) );

Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'general_background_size',
	'label'    => __( 'General Background Size', 'stronghold' ),
	'section'  => 'background_image',
	'type'     => 'select',
	'multiple'    => 1,
    'choices' => array(
		'cover'  => esc_attr__( 'Cover', 'stronghold' ),
		'contain' => esc_attr__( 'Contain', 'stronghold' ),
		'auto'  => esc_attr__( 'Auto', 'stronghold' ),
		'inherit'  => esc_attr__( 'Inherit', 'stronghold' ),
	),
	'output'   => array(
		array(
			'element'  => 'body',
			'property' => 'background-size',
		),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'general_background_image',
			'operator' => '==',
			'value'    => true,
		),
	),
	'default'  => 'cover',  
) );

Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'general_background_attachment',
	'label'    => __( 'General Background Attachment', 'stronghold' ),
	'section'  => 'background_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'scroll' => esc_attr__('Scroll', 'stronghold'),
        'fixed' => esc_attr__('Fixed', 'stronghold'),
	),
	'output'   => array(
		array(
			'element'  => 'body',
			'property' => 'background-attachment',
		),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'general_background_image',
			'operator' => '==',
			'value'    => true,
		),
	),
	'default'  => 'fixed',  
) );
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'general_background_position',
	'label'    => __( 'General Background Position', 'stronghold' ),
	'section'  => 'background_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'center top' => esc_attr__('Center Top', 'stronghold'),
        'center center' => esc_attr__('Center Center', 'stronghold'),
        'center bottom' => esc_attr__('Center Bottom', 'stronghold'),
        'left top' => esc_attr__('Left Top', 'stronghold'),
        'left center' => esc_attr__('Left Center', 'stronghold'),
        'left bottom' => esc_attr__('Left Bottom', 'stronghold'),
        'right top' => esc_attr__('Right Top', 'stronghold'),
        'right center' => esc_attr__('Right Center', 'stronghold'),
        'right bottom' => esc_attr__('Right Bottom', 'stronghold'),
	),
	'output'   => array(
		array(
			'element'  => 'body',
			'property' => 'background-position',
		),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'general_background_image', 
			'operator' => '==',
			'value'    => true,
		),
	),
	'default'  => 'center top',  
) );


/* CONTENT BACKGROUND ( boxed background image )*/

Stronghold_Kirki::add_field( 'stronghold', array(  
	'settings' => 'content_background_image',
	'label'    => __( 'Content Background Image', 'stronghold' ),
	'description' => __('when you are select boxed layout content background image will reflect the grid area','stronghold'),
	'section'  => 'background_image',
	'type'     => 'upload',
	'default'  => '',
	'output'   => array(
		array(
			'element'  => '.boxed-container',
			'property' => 'background-image',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'site-style',
			'operator' => '==',
			'value'    => 'boxed',
		),
	),
) );
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'content_background_repeat',
	'label'    => __( 'Content Background Repeat', 'stronghold' ),
	'section'  => 'background_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'no-repeat' => esc_attr__('No Repeat', 'stronghold'),
        'repeat' => esc_attr__('Repeat', 'stronghold'),
        'repeat-x' => esc_attr__('Repeat Horizontally','stronghold'),
        'repeat-y' => esc_attr__('Repeat Vertically','stronghold'),
	),
	'output'   => array(
		array(
			'element'  => '.boxed-container',
			'property' => 'background-repeat',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'site-style',
			'operator' => '==',
			'value'    => 'boxed',
		),
		array(
			'setting'  => 'content_background_image', 
			'operator' => '==',
			'value'    => true,
		),
	),
	'default'  => 'repeat',  
) );

Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'content_background_size',
	'label'    => __( 'Content Background Size', 'stronghold' ),
	'section'  => 'background_image',
	'type'     => 'select',
	'multiple'    => 1,
    'choices' => array(
		'cover'  => esc_attr__( 'Cover', 'stronghold' ),
		'contain' => esc_attr__( 'Contain', 'stronghold' ),
		'auto'  => esc_attr__( 'Auto', 'stronghold' ),
		'inherit'  => esc_attr__( 'Inherit', 'stronghold' ),
	),
	'output'   => array(
		array(
			'element'  => '.boxed-container',
			'property' => 'background-size',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'site-style',
			'operator' => '==',
			'value'    => 'boxed',
		),
		array(
			'setting'  => 'content_background_image', 
			'operator' => '==',
			'value'    => true,
		),
	),
	'default'  => 'cover',  
) );

Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'content_background_attachment',
	'label'    => __( 'Content Background Attachment', 'stronghold' ),
	'section'  => 'background_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'scroll' => esc_attr__('Scroll', 'stronghold'),
        'fixed' => esc_attr__('Fixed', 'stronghold'),
	),
	'output'   => array(
		array(
			'element'  => '.boxed-container',
			'property' => 'background-attachment',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'site-style',
			'operator' => '==',
			'value'    => 'boxed',
		),
		array(
			'setting'  => 'content_background_image', 
			'operator' => '==',
			'value'    => true,
		),
	),
	'default'  => 'fixed',  
) );
Stronghold_Kirki::add_field( 'stronghold', array(
	'settings' => 'content_background_position',
	'label'    => __( 'Content Background Position', 'stronghold' ),
	'section'  => 'background_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'center top' => esc_attr__('Center Top', 'stronghold'),
        'center center' => esc_attr__('Center Center', 'stronghold'),
        'center bottom' => esc_attr__('Center Bottom', 'stronghold'),
        'left top' => esc_attr__('Left Top', 'stronghold'),
        'left center' => esc_attr__('Left Center', 'stronghold'),
        'left bottom' => esc_attr__('Left Bottom', 'stronghold'),
        'right top' => esc_attr__('Right Top', 'stronghold'),
        'right center' => esc_attr__('Right Center', 'stronghold'),
        'right bottom' => esc_attr__('Right Bottom', 'stronghold'),
	),
	'output'   => array(
		array(
			'element'  => '.boxed-container',
			'property' => 'background-position',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'site-style',
			'operator' => '==',
			'value'    => 'boxed',
		),
		array(
			'setting'  => 'content_background_image', 
			'operator' => '==',
			'value'    => true,
		),
	),
	'default'  => 'center top',  
) );

do_action('wbls-stronghold_pro_customizer_options');
do_action('stronghold_child_customizer_options');
