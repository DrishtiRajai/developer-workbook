<?php
// Version Check while plugin installation
if(!function_exists('wpex_activation_plugin')){
  function wpex_activation_plugin(){
    // Version Check 
    if(version_compare(get_bloginfo('version'),'5.0','<')){
        wp_die(__("You must update WordPress to use this plugin.",'book_store'));
    }
  }
}