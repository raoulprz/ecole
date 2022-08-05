<?php
/**
 * Elementor Blog Template WordPress Plugin
 *
 * @package ElementorCustomButtons
 *
 * Plugin Name: Elementor Custom Buttons Module
 * Description: Module to display custom buttons in Elementor
 * Plugin URI:  https://kalysto.ch/
 * Version:     1.0.0
 * Author:      Raoul Pérez
 * Author URI:  https://kalysto.ch/
 * Text Domain: elementor-extension
 */

define( 'ELEMENTOR_BLOG_TEMPLATE', __FILE__ );

/**
 * Include the ELEMENTOR_BLOG_TEMPLATE class.
 */
require plugin_dir_path( ELEMENTOR_BLOG_TEMPLATE ) . 'class-elementor-custom-buttons.php';
