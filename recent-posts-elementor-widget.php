<?php
/**
 * Plugin Name: Recent Posts Elementor Widget
 * Description: Registers a shortcode [recent_posts] to display the five most recent posts and an Elementor widget to render this shortcode.
 * Version: 1.0
 * Author: Dhrumil
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; 
}

function display_recent_posts() {
    
    $recent_posts = new WP_Query( array(
        'posts_per_page' => 5,
        'post_status'    => 'publish'
    ) );

  
    $output = '<ul class="recent-posts">';

    
    if ( $recent_posts->have_posts() ) {
        while ( $recent_posts->have_posts() ) {
            $recent_posts->the_post();
            $output .= '<li>';
            $output .= '<a href="' . get_permalink() . '">' . get_the_title() . '</a>';
            $output .= ' - ' . get_the_date();
            $output .= '</li>';
        }
        wp_reset_postdata();
    } else {
        $output .= '<li>No recent posts available.</li>';
    }

    $output .= '</ul>';

    return $output;
}

function register_recent_posts_shortcode() {
    add_shortcode( 'recent_posts', 'display_recent_posts' );
}

add_action( 'init', 'register_recent_posts_shortcode' );


require_once plugin_dir_path( __FILE__ ) . 'widget.php';
