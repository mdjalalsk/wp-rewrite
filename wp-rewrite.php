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
        // Flush rewrite rules on activation and deactivation
        register_activation_hook( __FILE__, array( $this, 'rewrite_activation' ) );
        register_deactivation_hook( __FILE__, array( $this, 'rewrite_deactivation' ) );
    }

    public function init() {
        add_rewrite_rule(
            'something',
            'index.php?pagename=sample-page',
            'top'
        );
    }

    // Flush rewrite rules on plugin activation
    public function rewrite_activation() {
        $this->init();  // Ensure the rule is added before flushing
        flush_rewrite_rules();
    }

    // Flush rewrite rules on plugin deactivation
    public function rewrite_deactivation() {
        flush_rewrite_rules();
    }
}

new Wp_Rewrite_test();
