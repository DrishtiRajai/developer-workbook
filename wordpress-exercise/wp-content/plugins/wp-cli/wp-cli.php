<?php
/*
Plugin Name: WP-CLI 
Description: Custom plugin to generate random client projects.
Version: 1.0
Author: Drishti Rajai
*/
if (defined('WP_CLI') && WP_CLI) {
    require_once plugin_dir_path(__FILE__) . '/vendor/fzaninotto/faker/src/autoload.php';
    
    class WPC_CLI {
        /**
         * Generate random client projects.
         *
         * ## OPTIONS
         *
         * <foo>
         * : The foo argument.
         *
         * <bar>
         * : The bar argument.
         *
         * [--amount=<amount>]
         * : The amount option.
         * ---
         * default: 1
         * ---
         *
         * @param array $args
         * @param array $assoc_args
         */
        public function generate_portfolios($args, $assoc_args) {
            $foo = $args[0];
            $bar = $args[1];
            $amount = isset($assoc_args['amount']) ? intval($assoc_args['amount']) : 1;
            
            WP_CLI::line("Foo: $foo");
            WP_CLI::line("Bar: $bar");
            WP_CLI::line("Amount: $amount");
        }
    }
    
    WP_CLI::add_command('wpc', 'WPC_CLI');
}
?>
