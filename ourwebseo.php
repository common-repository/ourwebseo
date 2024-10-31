<?php

/*
Plugin Name: Ourwebseo
Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
Description: A simple SEO plugin and sitemap
Version: 1.0.0
Author: Bill Banks
Author URI: http://ourweb.net
*/

if (!function_exists('add_action')) {
	echo "Can not run";
	exit();
}

// Setup

define( 'ourwebseo_SEO_URL' , plugin_dir_path(__FILE__));

// Includes
include (ourwebseo_SEO_URL . '/inc/activation.php');
include (ourwebseo_SEO_URL.'/inc/deactivation.php');
include (ourwebseo_SEO_URL.'/inc/admin/admin_menu.php');
include (ourwebseo_SEO_URL.'/inc/admin/admin_init.php');
include (ourwebseo_SEO_URL.'/inc/admin/admin_enqueue_scripts.php');

include (ourwebseo_SEO_URL.'/inc/admin/opts_page.php');

include (ourwebseo_SEO_URL.'/inc/cron.php');
include (ourwebseo_SEO_URL.'/inc/head.php');

include (ourwebseo_SEO_URL.'/inc/saveoptions.php');

// Hooks
register_activation_hook(__FILE__,'ourwebseo_activation');
register_deactivation_hook(__FILE__,'`ourwebseo_deactivation');
add_action('ourwebseo_cron_hook', 'ourwebseo_cron');
add_action('admin_init','ourwebseo_admin_init');
add_action('admin_menu','ourwebseo_admin_menu');
add_action('wp_head', 'ourwebseo_wp_head');

// Shortcodes