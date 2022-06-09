![](https://www.finalmarco.com/wp-content/uploads/2015/12/cropped-cropped-cropped-Senza-nome-1.png)

### Plugin Features
- Switch  theme live to one ore more users (unaffecting the others)
- Switch theme for a single page passing a get variable (?themeprev=1)
- Compatibility with themes that use get_template_directory() and get_template_directory_uri()
- No database interaction (wp_option)

### Note
This plugin is intended for developers and tester, is not supposed to run on a production environment
tested on Wp 5.9
[Click here for more information about this plugn](https://www.finalmarco.com/wordpress-switch-theme-plugin-for-devs/)

### Configuration
File  includes/motore.php edit the following lines


    <?php
        //Configuration
	public $user_diff_theme = [10710,10711]; //User ID who to change theme
	public $force_var = TRUE; //if true you can force a page with the new theme using ?themeprev=1 (any user)
	private $new_theme = 'understrap'; //New theme
	private $new_theme_child = 'understrap-child'; //new theme child
	//end config	
    ?>
    
