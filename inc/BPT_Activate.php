<?php
/**
 * Activate Hook
 */
namespace BPT\Inc;

class BPT_Activate{

    public static function bpt_activate(){ //make it static so I can call it direct on a function
        flush_rewrite_rules();
    }
}