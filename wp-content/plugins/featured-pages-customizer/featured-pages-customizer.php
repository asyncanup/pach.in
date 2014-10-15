<?php
/**
 * Plugin Name: Featured Pages Customizer
 * Description: Design a beautiful home page with featured pages, right from the WordPress customizer.
 * Version: 1.3
 * Author: nikeo
 * Author URI: http://www.themesandco.com
 * License: GPLv2 or later
 */


/**
* The tc__f() function is an extension of WP built-in apply_filters() where the $value param becomes optional.
* It is shorter than the original apply_filters() and only used on already defined filters.
* Can pass up to five variables to the filter callback.
*
* @since FPC 1.0
*/

if( !function_exists( 'tc__f' )) :
    function tc__f ( $tag , $value = null , $arg_one = null , $arg_two = null , $arg_three = null , $arg_four = null , $arg_five = null) {
       return apply_filters( $tag , $value , $arg_one , $arg_two , $arg_three , $arg_four , $arg_five );
    }
endif;



/**
* Fires the plugin
* @package      FPC
* @author Nicolas GUILLAUME
* @since 1.0
*/
class TC_fpc {
    //Access any method or var of the class with classname::$instance -> var or method():
    static $instance;

    public $version;
    public $plug_file;
    public $plug_version;
    public $plug_lang;

    public static $theme_name;
    public $plug_option_prefix;
    public $fpc_ids;
    public $fpc_size;

    function __construct() {

        self::$instance =& $this;

        //USEFUL CONSTANTS
        if( ! defined( 'TC_FPC_DIR_NAME' ) )      { define( 'TC_FPC_DIR_NAME' , basename( dirname( __FILE__ ) ) ); }

        $this -> plug_file              = __FILE__; //main plugin root file.
        $this -> plug_version           = '1.3';
        $this -> plug_lang              = 'tc_fpc';

         //gets the theme name (or parent if child)
        $tc_theme                       = wp_get_theme();
        self::$theme_name               = $tc_theme -> parent() ? $tc_theme -> parent() -> Name : $tc_theme-> Name;
        self::$theme_name               = strtolower(self::$theme_name);
        //gets the version of the theme or parent if using a child theme
        $this -> version                = ( $tc_theme -> parent() ) ? $tc_theme -> parent() -> Version : $tc_theme -> Version;
        //define the plug option key
        $this -> plug_option_prefix     = 'tc_fpc_options';
        //Default featured pages ids
        $this -> fpc_ids                = array( 'one' , 'two' , 'three' );
        //Default images sizes
        $this -> fpc_size               = array('width' => 270 , 'height' => 250, 'crop' => true );

        $plug_classes = array(
            'TC_utils_fpc'              => array('/utils/classes/class_utils_fpc.php'),
            'TC_back_fpc'               => array('/back/classes/class_back_fpc.php'),
            'TC_front_fpc'              => array('/front/classes/class_front_fpc.php')
        );//end of plug_classes array


        //checks if is customizing : two context, admin and front (preview frame)
        global $pagenow;
        $is_customizing = false;
        if ( is_admin() && isset( $pagenow ) && 'customize.php' == $pagenow ) {
              $is_customizing = true;
        } else if ( ! is_admin() && isset($_REQUEST['wp_customize']) ) {
              $is_customizing = true;
        }

        //loads and instanciates the plugin classes
        foreach ($plug_classes as $name => $params) {
            //don't load admin classes if not admin && not customizing
            if ( is_admin() && ! $is_customizing ) {
                if ( false != strpos($params[0], 'front') )
                    continue;
            }

            if ( ! is_admin() && ! $is_customizing ) {
                if ( false != strpos($params[0], 'back') )
                    continue;
            }

            if( !class_exists( $name ) )
                require_once ( dirname( __FILE__ ) . $params[0] );

            $args = isset( $params[1] ) ? $params[1] : null; 
            if ( $name !=  'TC_plug_updater' )
                new $name( $args );
        }

        //adds setup on init
        add_action( 'plugins_loaded'                    , array( $this , 'tc_setup' ) );
        //reset option on theme switch
        add_action ( 'after_switch_theme'               , array( $this , 'tc_reset_fp_options' ));
        //delete options if theme = Customizr
        add_filter('tc_front_page_option_map'           , array( $this , 'tc_delete_fp_options' ) );
        //disable front end rendering if theme = customizr
        add_action ('wp_head'                           , array( $this , 'tc_disable_fp_rendering') );
         //copy options from previous plugin version if needed
        register_activation_hook( __FILE__              , array( __CLASS__ , 'tc_move_previous_options' ) );
        //delete the hook's transient and default options
        register_activation_hook( __FILE__              , array( __CLASS__ , 'tc_clean_plugin_settings' ) );
        //deactivation : delete the hook's transient and default options
        register_deactivation_hook( __FILE__            , array( __CLASS__ , 'tc_clean_plugin_settings' ) );
    }//end of construct


    function tc_setup() {
        //Add image size
        $fpc_size       = apply_filters( 'fpc_size' , $this -> fpc_size );
        add_image_size( 'fpc-size' , $fpc_size['width'] , $fpc_size['height'], $fpc_size['crop'] );
        //set current theme name
        self::$theme_name = $this -> tc_get_theme_name();
        //declares the plugin translation domain
        load_plugin_textdomain( $this -> plug_lang , false, basename( dirname( __FILE__ ) ) . '/lang' );
    }


    function tc_delete_fp_options( $front_page_option_map ) {
        if ( 'customizr' != self::$theme_name || true !== apply_filters('fpc_disable_customizr_fp' , true ) )
            return;

        $to_delete = array(
            'tc_theme_options[tc_show_featured_pages]',
            'tc_theme_options[tc_show_featured_pages_img]',
            'tc_theme_options[tc_featured_page_button_text]',
            'tc_theme_options[tc_featured_page_one]',
            'tc_theme_options[tc_featured_page_two]',
            'tc_theme_options[tc_featured_page_three]',
            'tc_theme_options[tc_featured_text_one]',
            'tc_theme_options[tc_featured_text_two]',
            'tc_theme_options[tc_featured_text_three]'
        );
        foreach ($front_page_option_map as $key => $value) {
            if ( in_array( $key, $to_delete) ) {
                unset($front_page_option_map[$key]);
            }
        }
        return $front_page_option_map;
    }//end of callback



    function tc_disable_fp_rendering() {
        if ( 'customizr' != self::$theme_name || true !== apply_filters('fpc_disable_customizr_fp' , true ) )
            return;

        remove_action  ( '__before_main_container'     , array( TC_featured_pages::$instance , 'tc_fp_block_display'), 10 );
    }//end of callback



    /**
    * Checks if we use a child theme. Uses a deprecated WP functions (get_theme_data) for versions <3.4
    * @return boolean
    * 
    */
    function tc_is_child() {
        // get themedata version wp 3.4+
        if( function_exists( 'wp_get_theme' ) ) {
            //get WP_Theme object
            $tc_theme       = wp_get_theme();
            //define a boolean if using a child theme
            $is_child       = ( $tc_theme -> parent() ) ? true : false;
         }
         else {
            $tc_theme       = get_theme_data( get_stylesheet_directory() . '/style.css' );
            $is_child       = ( ! empty($tc_theme['Template']) ) ? true : false;
        }
        return $is_child;
    }



    function tc_get_theme_name() {
        if( function_exists( 'wp_get_theme' ) ) {
            $tc_theme       = wp_get_theme();
            $theme_name     =  $this -> tc_is_child() ? $tc_theme -> parent() -> Name : $tc_theme -> Name;
        } else {
            $tc_theme       = get_theme_data( get_stylesheet_directory() . '/style.css' );
            $theme_name     =  $this -> tc_is_child() ? $tc_theme['Template'] : $tc_theme['Name'];
        }
        return strtolower($theme_name);
    }


    //reset some theme related options on theme switch
    function tc_reset_fp_options() {
        $prefix = TC_fpc::$instance -> plug_option_prefix;

        $fpc_options = get_option($prefix);

        $to_reset = array(
            'tc_fp_position' , 
            'tc_fp_background',
            'tc_fp_text_color'
        );
        foreach ($to_reset as $opt) {
            if ( isset($fpc_options[$opt]) ) {
                unset($fpc_options[$opt]);
            }
        }
        update_option ( TC_fpc::$instance -> plug_option_prefix , $fpc_options );
        delete_option ( "{$prefix}_default" );
    }


    //clean default and hook transient on plugin activation/desactivation
    public static function tc_clean_plugin_settings() {
        $prefix             = TC_fpc::$instance -> plug_option_prefix;
        delete_option("{$prefix}_default");
        delete_transient( 'tc_fpc_config' );
    }

    //move previous options if
    //1) theme is customizr
    //2) has_copy boolean is not set or false in options
    public static function tc_move_previous_options() {
        if ( 'customizr' != self::$theme_name )
            return;

        $plug_options = get_option(TC_fpc::$instance -> plug_option_prefix);
        if ( isset($plug_options['has_moved_options']) && $plug_options['has_moved_options'] )
            return;
        
        $customizr_options = get_option('tc_theme_options');
        
        $options_key_mapping = array(//Customizr => plugin
            'tc_show_featured_pages'        => 'tc_show_fp',
            'tc_show_featured_pages_img'    => 'tc_show_fp_img',
        );

        //parse current customizr options and copy the FP options into the plug_options
        foreach ($customizr_options as $key => $value) {
            if ( false !== strpos( $key, 'tc_featured_text_') || false !== strpos( $key, 'tc_featured_page_') ) {
                $plug_options[$key] = $value;
            }//endif
            if ( isset($options_key_mapping[$key]) ) {
                //we define the new key or we keep the customizr one if not mapped
                $plug_key = isset($options_key_mapping[$key]) ? $options_key_mapping[$key] : $key;
                $plug_options[$plug_key] = $value;
            }
        }//end for each

        //add the has_moved_options boolean
        $plug_options['has_moved_options'] = true;
        //update options in db
        update_option( TC_fpc::$instance -> plug_option_prefix , $plug_options );
    }

} //end of class

//Creates a new instance of front and admin
new TC_fpc;
