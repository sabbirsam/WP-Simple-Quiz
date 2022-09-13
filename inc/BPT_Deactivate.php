<?php
/**
 * Deactivate Hook
 */

namespace  BPT\Inc;
defined('ABSPATH') or die('Hey, what are you doing here? You silly human!');

class BPT_Deactivate{

    public static function bpt_deactivate(){ 
        flush_rewrite_rules();
    }
}