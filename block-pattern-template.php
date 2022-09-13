<?php
/*
Plugin Name: Block Pattern Template
Plugin URI: https://github.com/sabbirsam/Simple-Form/tree/free
Description: its mainly made for learning.
Version: 1.0.0
Author: SABBIRSAM
Author URI: https://www.techsambd.com
Requires at least: 5.4
Requires PHP: 5.6
License: GPL-2.0+ or later
License URI: http://www.gnu.org/licenses/gpl-2.0.txt
Text Domain: bpt
*/

defined('ABSPATH') or die('Hey, what are you doing here? You silly human!');

if (file_exists(dirname(__FILE__).'/vendor/autoload.php')) {
    require_once dirname(__FILE__).'/vendor/autoload.php';
}

require_once untrailingslashit( plugin_dir_path( __FILE__ ) ) . '/inc/BPT_CustomFunction.php';

/**
 * All Classes 
 */
use BPT\Inc\BPT_Pattern;
use BPT\Inc\BPT_Activate;
use BPT\Inc\BPT_Deactivate;
use BPT\Inc\BPT_AdminDashboard;

/**
 * Main Class
 */
if(!class_exists('BPT_BlockPatternTemplate')){
    class BPT_BlockPatternTemplate{
        public $wp_block_pattern_template;
        public function __construct(){
            $this->includes();
            $this->wp_block_pattern_template = plugin_basename(__FILE__); 
        }
        function register(){
        /**
         * Actions.
		 */
            add_action("plugins_loaded", array( $this, 'bpt_lang' )); 
        }
        function bpt_lang(){
        /**
         * Text Dpmain.
		 */
            load_plugin_textdomain('bpt', false,dirname(__FILE__)."languages");
        }
        /**
         * Classes 
         */
        public function includes() {
            new BPT_AdminDashboard(); 
            new BPT_Pattern(); 
            
        }
         /**
         * Activation .
		 */
        function bpt_activate(){   
            BPT_Activate::bpt_activate();
        }
          /**
         * Deacctivation
		 */
        function bpt_deactivate(){ 
            BPT_Deactivate::bpt_deactivate(); 
        }
    }
    
    $BPT_BlockPatternTemplate = new BPT_BlockPatternTemplate;
    $BPT_BlockPatternTemplate ->register();
    /**
     * Register activation and deactivation hook
     */
    register_activation_hook (__FILE__, array( $BPT_BlockPatternTemplate, 'bpt_activate' ) );
    register_deactivation_hook (__FILE__, array( $BPT_BlockPatternTemplate, 'bpt_deactivate' ) );
}