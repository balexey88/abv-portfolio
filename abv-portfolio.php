<?php
/*
Plugin Name: Portfolio Plugin By Alexey
Plugin URI: http://codetiburon.com
Description: Portfolio Plugin for learning Wordpress
Version: 1.0
Author: Alexey Bolgunovsky
Author URI: https://www.linkedin.com/in/alexey-bolgunovsky-877042a8/
Text Domain: abv-portfolio
*/

require_once plugin_dir_path(__FILE__) . 'post_types.php';
require_once plugin_dir_path(__FILE__) . 'taxonomy.php';
require_once plugin_dir_path(__FILE__) . 'widgets.php';
require_once plugin_dir_path(__FILE__) . 'custom_fields.php';
require_once plugin_dir_path(__FILE__) . 'roles.php';

add_action('admin_enqueue_scripts', 'abv_admin_scripts');

function abv_admin_scripts() {
  wp_enqueue_script('jquery-ui-datepicker');

  wp_enqueue_script('abv-admin', plugin_dir_url(__FILE__) . 'js/admin.js');
  wp_enqueue_style('abv-datepicker-style', '//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css');
}
