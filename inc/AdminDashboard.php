<?php

namespace Inc;

class AdminDashboard{
    function __construct(){
        add_action("admin_menu", array($this, 'add_admin_pages'));
    }

    public function add_admin_pages(){
        add_menu_page( 
            'Quiz', //page title
            'Quiz',  //menus title
            'manage_options', //capa
            'quiz', //slug
            array($this, 'quiz_form_pages'),//function 
            'dashicons-editor-paste-word',
                90 );
       
    }
  
    public function quiz_form_pages()
    {
        require_once plugin_dir_path(__FILE__).'../template/dashboard.php';
    }

}