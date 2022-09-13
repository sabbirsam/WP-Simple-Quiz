<?php

namespace  BPT\Inc;

defined('ABSPATH') or die('Hey, what are you doing here? You silly human!');

class BPT_AdminDashboard{
    function __construct(){
        add_action("admin_menu", array($this, 'add_admin_pages'));
    }

    public function add_admin_pages(){
        add_menu_page( 
            'Block Pattern Template', //page title
            'Block Pattern',  //menus title
            'manage_options', //capa
            'block_pattern_template', //slug
            array($this, 'bpt_pages'),//function 
            'dashicons-editor-paste-word',
                90 );
       
    }
  
    public function bpt_pages()
    {
        require_once plugin_dir_path(__FILE__).'../template/dashboard.php';
    }

}