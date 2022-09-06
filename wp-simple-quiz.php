<?php
/*
Plugin Name: WP Simple Quiz
Plugin URI: https://github.com/sabbirsam/Simple-Form/tree/free
Description: its mainly made for learning.
Version: 1.0.0
Author: SABBIRSAM
Author URI: https://www.techsambd.com
Requires at least: 5.4
Requires PHP: 5.6
License: GPL-2.0+ or later
License URI: http://www.gnu.org/licenses/gpl-2.0.txt
Text Domain: wp-simple-quiz
*/

defined('ABSPATH') or die('Hey, what are you doing here? You silly human!');

if (file_exists(dirname(__FILE__).'/vendor/autoload.php')) {
    require_once dirname(__FILE__).'/vendor/autoload.php';
}


use Inc\Activate;
use Inc\Deactivate;

if(!class_exists('WPSimpleQuiz')){
    class WPSimpleQuiz{
        public $wp_simple_quiz_base;
        public function __construct(){
            $this->includes();
            $this->wp_simple_quiz_base = plugin_basename(__FILE__); 
        }
        function register(){
            add_action("plugins_loaded", array( $this, 'wp_simple_quiz_lang' )); 
        }
        function wp_simple_quiz_lang(){
            load_plugin_textdomain('simple_form', false,dirname(__FILE__)."languages");
        }
        /**
         * Classes 
         */
        public function includes() {
            
        }
        function activate(){   
            Activate::activate();
        }
        function deactivate(){ 
            Deactivate::deactivate(); 
        }
    }
    $wpsimplequiz = new WPSimpleQuiz;
    $wpsimplequiz ->register();
    
    register_activation_hook (__FILE__, array( $wpsimplequiz, 'activate' ) );
    register_deactivation_hook (__FILE__, array( $wpsimplequiz, 'deactivate' ) );
}