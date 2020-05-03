<?php

function stronghold_custom_styles($custom) {
$custom = '';	
	$sticky_header_position = get_theme_mod('sticky_header_position');
	if( $sticky_header_position == 'bottom') {
		$custom .= ".site-header.site-header-sticky .branding {  top: auto!important;
			bottom:0; }"."\n";	
              
		$custom .= ".site-header.site-header-sticky .branding .nav-menu .sub-menu {  top: auto;
			bottom:100%; }"."\n";	
	}	
     
     $footer_bg_image = get_theme_mod('footer_bg_image');
     $footer_overlay = get_theme_mod('footer_overlay') ;

     if( $footer_bg_image || $footer_overlay ) {
       $custom .= ".site-footer .footer-widgets::after {  display: none; }"."\n";   
     }

     $page_title_bar = get_theme_mod('page_titlebar');
     switch ($page_title_bar) {
     	case 2:
     		$custom .= ".columns.breadcrumb {
     			background-color: transparent;
                    background-image: none;
     		}"."\n";
     		break;     	
     	case 3:
     		$custom .= ".columns.breadcrumb {
     			display: none;
     		}"."\n";
     		break;		
     }

     $page_title_bar_status = get_theme_mod('page_titlebar_text');
     if( $page_title_bar_status == 2 ) {
     	    $custom .= ".columns.breadcrumb .entry-header {
     			display: none;
     		}"."\n";
     }

     $home_header_bg = get_theme_mod('header_image');
     if( ! $home_header_bg ) {
         $custom .= ".home .site-header {
               background-image:none;
          }"."\n";
     }

     $sticky_header = get_theme_mod('sticky_header');
     if( ! $sticky_header ) {
         $custom .= ".home .site-header {
               position: relative!important; 
          }"."\n";
     }


	//Output all the styles
	wp_add_inline_style( 'stronghold-style', $custom );    	
}


add_action( 'wp_enqueue_scripts', 'stronghold_custom_styles' );  
