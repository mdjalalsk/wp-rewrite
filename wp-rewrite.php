<?php
/*
Plugin Name: WP Rewrite
Version: 0.0.1
Author: jalal
Author URI: http://www.wpgoplugins.com
*/

class Wp_Rewrite_test {

    public function __construct() {
        add_action( 'init', array( $this, 'init' ) );
        add_filter( 'template_include', array( $this, 'template_include' ) );

        // Flush rewrite rules on activation and deactivation
        register_activation_hook( __FILE__, array( $this, 'rewrite_activation' ) );
        register_deactivation_hook( __FILE__, array( $this, 'rewrite_deactivation' ) );
    }

    public function init() {
        add_rewrite_tag('%test-rewrite%', '([^&]+)');
        add_rewrite_tag('%rewrite_value%', '([^&]+)');

        add_rewrite_rule(
            'test-rewrite/([^/]+)/?$',
            'index.php?test-rewrite=true&rewrite_value=$matches[1]',
            'top'
        );
    }

    // Flush rewrite rules on plugin activation
    public function rewrite_activation() {
        $this->init();
        flush_rewrite_rules();
    }

    // Flush rewrite rules on plugin deactivation
    public function rewrite_deactivation() {
        flush_rewrite_rules();
    }
    public function template_include( $template ) {
        if('true'=== get_query_var( 'test-rewrite' ) ){
            return __DIR__.'/template/test-rewrite.php';
        }
        return $template;
    }
}

new Wp_Rewrite_test();
