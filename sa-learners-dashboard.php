<?php
/**
 * Plugin Name:      SA Learners Dashboard
 * Plugin URI:        https://staffasia.org
 * Description:       This plugin  for custom learners dashboard for wplms theme . DO NOT DEACTIVATE THIS PLUGIN UNDER ANY CIRCUMSTANCE. Please contact the Technology Team for anything. 
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Technology Team
 * Author URI:        https://staffasia.org
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       sa-learners-dashboard
 */

 class SA_Learners_Dashboard {

    /**
     * The single instance of SA_Learners_Dashboard.
     * @var 	object
     * @access  private
     * @since 	1.0.0
     */
    private static $_instance = null;

    /**
     * The main plugin directory path.
     * @var 	string;
     * @access  public
     * @since 	1.0.0
     * @var 	string
     * @access  public
     * @since 	1.0.0
     * @var 	string
     * @access  public
     * @since 	1.0.0
     * @var 	string
     * @access  public
     * @since 	1.0.0
     
        */
    public $plugin_dir = '';    
    public $plugin_url = '';
    public $plugin_path = '';
    public $plugin_name = '';
    public $plugin_version = '';
    public $plugin_prefix = '';
    public $plugin_text_domain = '';
    public $plugin_settings_page = '';
    public $plugin_settings_tab = '';
    public $plugin_settings_tab_name = '';
    public $plugin_settings_tab_slug = '';

    function __construct() {
        $this->plugin_dir = plugin_dir_path( __FILE__ );
        $this->plugin_url = plugin_dir_url( __FILE__ );
        $this->plugin_path = plugin_basename( __FILE__ );
        $this->plugin_name = plugin_basename( dirname( __FILE__ ) );
        $this->plugin_version = '1.0.0';
        $this->plugin_prefix = 'sa_learner_dashboard_'; 
        $this->plugin_text_domain = 'sa-learners-dashboard';  // This is the text domain of the plugin.
        $this->plugin_settings_page = 'sa-learner-dashboard-settings';
        $this->plugin_settings_tab = 'sa-learner-dashboard-settings';
        $this->plugin_settings_tab_name = 'Learners Dashboard';
        $this->plugin_settings_tab_slug = 'learner-dashboard-settings';
        $this->load_plugin_textdomain();
        add_action('plugins_loaded',array($this,'load_plugin_textdomain'));
        add_action('wp_enqueue_scripts',array($this,'load_plugin_scripts_and_styles'));
        // add_filter( 'page_template', 'sa_create_page_template' );
        register_activation_hook( __FILE__, 'activate_sabd' );

    }
    function activate_sabd() {
        require_once plugin_dir_path( __FILE__ ) . 'includes/SabdActivator.php';
        SaLearnersDbActivator::activate();
        }
    // Load plugin text domain
    public function load_plugin_textdomain() {
        load_plugin_textdomain( $this->plugin_text_domain, FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
    }   
    // enquie plugin scripts and styles
    public function load_plugin_scripts_and_styles() {
        wp_enqueue_style( 'sa-learner-dashboard-style', $this->plugin_url . 'assets/css/learner-dashboard.css', array(), $this->plugin_version, 'all' );
        // cdn load css from bootstrap
        wp_enqueue_style( 'bootstrap-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css', array(), $this->plugin_version, 'all' );
  wp_enqueue_script( 'bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array( 'jquery' ), $this->plugin_version, true );
        wp_enqueue_script( 'sa-learner-dashboard-js', $this->plugin_url . 'assets/js/custom.js', array( 'jquery' ), $this->plugin_version, true );
    //  font awesome cdn
    wp_enqueue_style( 'font-awesome-css', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), $this->plugin_version, 'all' );
    // font awesome cdn js
    // wp_enqueue_script( 'font-awesome-js', 'https://kit.fontawesome.com/cdef73f959.js', array( 'jquery' ), $this->plugin_version, true );
        
    }
   
 
    // Load plugin dependencies
}