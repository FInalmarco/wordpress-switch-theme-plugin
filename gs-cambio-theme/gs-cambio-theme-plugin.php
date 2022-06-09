<?php
/**
 * Plugin Name:       Theme Switcher Live
 * Description:       Advanced theme Switcher for Developers
 * Version:           1.0
 * Requires PHP:      7.0
 * Author:            Marco Martinelli
 * Author URI:        https://finalmarco.com
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


  add_action( 'setup_theme', function() {

  
	  require_once plugin_dir_path(__FILE__) . 'include/motore.php';


    /*
    if (get_current_user_id() == 2){

      $theme = wp_get_theme();
      $theme_padre = $theme->parent() ? $theme->parent() : $theme;

      echo '<pre><br><br><br><br><br><br><br><br><br><br>';
      echo '$theme->name -->'.$theme->name.'<br>';
      echo '$theme->parent_theme -->'.$theme->parent_theme.'<br>';
      echo '$theme->texdomain (pater) -->'.$theme_padre->get( 'TextDomain' ).'<br>';
      echo '$theme->texdomain (child) -->'.$theme->get( 'TextDomain' ).'<br>';
      echo 'get_template_directory() -->'.get_template_directory().'<br>';
      echo 'get_template_directory_uri() -->'.get_template_directory_uri().'<br>';
      echo 'get_stylesheet_directory() -->'.get_stylesheet_directory().'<br>';
      echo 'get_theme_root() -->'.get_theme_root().'<br>';
      echo 'get_template() -->'.get_template().'<br>';
      echo 'home url() -->'.get_home_url(null, '', null).'<br>';

      //echo 'textdomain -->'.get_template().'<br>';
      
      var_dump($theme);
      echo '</pre>';
      }	*/
  
	

  } );
