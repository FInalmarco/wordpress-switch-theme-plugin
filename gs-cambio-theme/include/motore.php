<?php


if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


//Run 
$eseguo = new GSCambioTema();
//end

/**
 * 
 */
	class GSCambioTema{

	public $user_id;

	//Configuration
	public $user_diff_theme = [10710,10711]; //User ID who to change theme
	public $force_var = TRUE; //if true you can force a page with the new theme using ?themeprev=1 (any user)
	private $new_theme = 'understrap'; //New theme
	private $new_theme_child = 'understrap-child'; //new theme child
	//end config	

	//ovveride default theme (can kept empty)
	private $main_original_theme = '';
	private $main_original_child = '';
	

		public function __construct(){

			$this->main_original_theme = ($this->main_original_theme == '') ? get_template() : $this->main_original_theme ;
			$this->main_original_child = ($this->main_original_child == '') ? get_stylesheet() : $this->main_original_child ;
			$this->user_id = get_current_user_id();

		
			add_filter("template_directory", array($this,'wp_template_directory_filter'), 10,3);
       		add_filter("template_directory_uri", array($this,'wp_template_uri_filter'), 10,3);
			add_filter("template", array($this,'change_theme'), 10,3);
			add_filter("option_template", array($this,'change_theme'), 10,3);
			add_filter("option_stylesheet", array($this,'change_theme_figlio'), 10,3);
			add_filter("pre_option_stylesheet", array($this,'change_theme_figlio'), 10,3);	
		
		
			//Disable WP rocket cache if active
			if ($this->_controllo() == true){
				if ( function_exists( 'rocket_clean_domain' ) ) {
				add_filter( 'do_rocket_generate_caching_files', '__return_false' );
				}
			}	

		}


		private function _controllo(){

			if (in_array($this->user_id, $this->user_diff_theme)){

				return true;
			}

			if (($this->force_var == TRUE) && ($_GET['themeprev'] == true)){

				return true;
			}
		
		return false;	
		}

	
		
		public function wp_template_directory_filter( $template_dir, $template, $theme_root ){

			if ($this->_controllo() == true){
			
				$template     = $this->new_theme;
				$theme_root   = get_theme_root( $template );
				$template_dir = "$theme_root/$template";
			}	

		return $template_dir;
		}

		public function wp_template_uri_filter($template_dir_uri, $template, $theme_root_uri){

			if ($this->_controllo() == true){

			$template         = str_replace( '%2F', '/', rawurlencode( $this->new_theme ) );
    		$theme_root_uri   = get_theme_root_uri( $template );
    		$template_dir_uri = "$theme_root_uri/$template";

			}	

		return $template_dir_uri;
		}

		//Funzione cambio tema padre
		public function change_theme($theme) {
					
				if ($this->_controllo() == true){
					if ($theme === $this->main_original_child ){
						$theme = $this->new_theme;
					}			
				}	
			
		return $theme;
		}	
	
		//Funzione cambio tema padre
		public function change_theme_figlio($theme) {
						
			if ($this->_controllo() == true){
		
				if ($theme === $this->main_original_child ){
						$theme = $this->new_theme_child;
				}								
			}	
			
		return $theme;
		}	
	

	}



	///////////OLD WAY

/*add_filter('template', 'change_theme');
add_filter('option_template', 'change_theme');
add_filter('option_stylesheet', 'change_theme_figlio');
add_filter( 'pre_option_stylesheet', 'change_theme_figlio' );
add_filter( 'template_directory', 'wp_directory_filter', 10, 3 );*/
