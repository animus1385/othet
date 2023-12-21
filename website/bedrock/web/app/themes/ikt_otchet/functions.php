<?php

/**
 * Ikt_otchet functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Ikt_otchet
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

//Global Init
function ikt_otchet_setup()
{
	//Custom Sizes via Shopify
	add_image_size('540', 540);
	add_image_size('1440', 1440);
	add_theme_support('automatic-feed-links');
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	//Register Menu
	register_nav_menus(array(
		'header_menu' => 'Header Menu',
	));
	//Deregister Taxonomy
	function deregister_taxonomy()
	{
		register_taxonomy('post_tag', array());
		register_taxonomy('post_format', array());
	}
	add_action('init', 'deregister_taxonomy');
}
add_action('after_setup_theme', 'ikt_otchet_setup');


function ikt_scripts_styles()
{
	wp_enqueue_style('styles', get_template_directory_uri() . '/css/styles.css', array(), '');
	wp_enqueue_style('nav', get_template_directory_uri() . '/css/nav.css', array(), '');
	wp_enqueue_style('edit-user', get_template_directory_uri() . '/css/edit-user.css', array(), '');
	wp_enqueue_style('login-css', get_template_directory_uri() . '/css/login.css', array(), '');
	wp_enqueue_style('page-hero', get_template_directory_uri() . '/css/page-hero.css', array(), '');
}
add_action('wp_enqueue_scripts', 'ikt_scripts_styles');

function get_user_role()
{
	global $current_user;

	$user_roles = $current_user->roles;
	$user_role = array_shift($user_roles);

	return $user_role;
}
