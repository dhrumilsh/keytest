<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; 
}

function register_recent_posts_elementor_widget( $widgets_manager ) {
    require_once( __DIR__ . '/recent-posts-elementor-widget-class.php' );
    $widgets_manager->register( new \Recent_Posts_Elementor_Widget() );
}
add_action( 'elementor/widgets/register', 'register_recent_posts_elementor_widget' );


function recent_posts_elementor_widget_styles() {
    wp_enqueue_style( 'recent-posts-elementor-widget-style', plugins_url( 'recent-posts-elementor-widget.css', __FILE__ ) );
}
add_action( 'wp_enqueue_scripts', 'recent_posts_elementor_widget_styles' );
