<?php
/**
 * Plugin Name: NX Gutenberg widget for AccessTrade Coupon plugin
 * Author: Dung Nguyen
 * Version: 1.0.0
 */
  
function nx_at_coupon_gutenberg_render_callback( $attributes, $content ) {
    $recent_posts = wp_get_recent_posts( array(
        'numberposts' => 1,
        'post_status' => 'publish',
    ) );
    if ( count( $recent_posts ) === 0 ) {
        return 'No posts';
    }
    $post = $recent_posts[ 0 ];
    $post_id = $post['ID'];
    return sprintf(
        '<a class="wp-block-my-plugin-latest-post" href="%1$s">%2$s</a>',
        esc_url( get_permalink( $post_id ) ),
        esc_html( get_the_title( $post_id ) )
    );
}
 
function nx_at_coupon_gutenberg() {
    wp_register_script(
        'nx-at-coupon-gutenberg',
        plugins_url( 'block.js', __FILE__ ),
        array( 'wp-blocks', 'wp-element', 'wp-data' )
    );
 
    register_block_type( 'nx-at-coupon-gutenberg-block', array(
        'editor_script' => 'nx-at-coupon-gutenberg',
        'render_callback' => 'nx_at_coupon_render_callback'
    ) );
 
}
add_action( 'init', 'nx_at_coupon_gutenberg' );
