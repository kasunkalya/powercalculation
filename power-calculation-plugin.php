<?php
/*
   Plugin Name: Kpower calculation plugin
   description: A simple custom plugin. Short code [kpower]
   Version: 1.0.0
   Author: Kasun Kalya
   Author URI: https://kasun Kalya.com/about
   Short Code: [kpower]
*/
// Create a new table
function kpower_table(){

  global $wpdb;
  $charset_collate = $wpdb->get_charset_collate();

  $tablename = $wpdb->prefix."kpower_configs";

  $sql = "CREATE TABLE $tablename (
    id mediumint(11) NOT NULL AUTO_INCREMENT,
    `unitChargers` varchar(50) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
    `currencyType` varchar(50) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
    `mainTitle` varchar(50) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
    `subTitle` varchar(50) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
    PRIMARY KEY (`id`)
  ) $charset_collate;";



  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
  dbDelta( $sql );

}
register_activation_hook( __FILE__, 'kpower_table' );

// Add menu
function kpower_menu() {

    add_menu_page("kpower", "kpower","manage_options", "kpower", "addpowerEntry",plugins_url('/kpowercalculation/img/icon.png'));
    // add_submenu_page("myplugin","All Entries", "All entries","manage_options", "allentries", "displayList");
    // add_submenu_page("kpower","Configuration", "Configuration","manage_options", "addpowerEntry", "addpowerEntry");

}
add_action("admin_menu", "kpower_menu");

// function displayList(){
//   include "displaylist.php";
// }

function addpowerEntry(){
  include "addPowerentry.php";
}

// function that runs when shortcode is called
function wpb_kpower_shortcode() { 
include "powercalculation.php";
}
// register shortcode
add_shortcode('kpower', 'wpb_kpower_shortcode');