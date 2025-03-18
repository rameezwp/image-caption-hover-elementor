<?php
/**
 * Plugin Name: Image Caption Hover for Elementor
 * Description: An Elementor widget to display images with stylish captions and hover effects.
 * Plugin URI:  https://classicaddons.com/image-caption-hover-elementor
 * Version:     1.0
 * Author:      Classic Addons
 * Author URI:  https://classicaddons.com/
 * Text Domain: image-caption-hover-elementor
 * 
 * Requires Plugins: elementor
 * Elementor tested up to: 3.20.0
 * Elementor Pro tested up to: 3.27.6
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Define Plugin Constants
define('CAICHE_PATH', untrailingslashit(plugin_dir_path( __FILE__ )) );
define('CAICHE_URL', untrailingslashit(plugin_dir_url( __FILE__ )) );
define('CAICHE_VERSION', '1.0' );

// Register Widget Class
function caiche_register_widget($widgets_manager) {
    require_once plugin_dir_path(__FILE__) . 'widgets/class-image-caption-hover-widget.php';
    $widgets_manager->register(new \CA_Image_Caption_Hover_Elementor\Widget());
}

add_action('elementor/widgets/register', 'caiche_register_widget');

// Enqueue Scripts & Styles
function caiche_enqueue_assets() {
    wp_register_style('caiche-style', plugin_dir_url(__FILE__) . 'assets/style.css');
    wp_register_script('caiche-script', plugin_dir_url(__FILE__) . 'assets/script.js', array('jquery'), null, true);
}

add_action('wp_enqueue_scripts', 'caiche_enqueue_assets');