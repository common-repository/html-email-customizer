<?php
/*
Plugin Name: HTML Email Customizer 
Plugin URI: http://wrgcoder.com/
Description: Responsive mails for your  store
Version: 1.0
Author: Yasir Ghafoor
Author URI: http://wrgcoder.com.com
License: GPLv2 or later
*/

/*  Copyright 2015 Wrgcoder Technology (email : info@wrgcoder.com) */

include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); 

function wphtmlmail_admin_core_notice() {
    ?>
    <div class="updated">
        <p style="background-color:#d70022; color:#fff;"><?php printf( 
                    __( '<strong >Notice:</strong> Wordpress HTML Email Customizer - 1) Please Install and Activate free WP HTML Mail plugin then our plugin will work. <a href="%s">Install Plugin</a> for more visit <a href="http://www.wrgcoder.com" target="new">Wrgcoder Technology </a> or Send us email at <a href="#">info@wrgcoder.com</a>', 'haet_mail_admin' ), 
                    wp_nonce_url( network_admin_url( 'update.php?action=install-plugin&plugin=wp-html-mail' ), 'install-plugin_wp-html-mail' )
            ); ?></p>
    </div>
    <?php
}
if(!is_plugin_active( 'wp-html-mail/wp-html-mail.php' )){
    add_action( 'admin_notices', 'wphtmlmail_admin_core_notice' );
}else{

    define( 'HAET_MAIL_admin_PATH', plugin_dir_path(__FILE__) );
    define( 'HAET_MAIL_admin_URL', plugin_dir_url(__FILE__) );


    require HAET_MAIL_admin_PATH . 'includes/class-haet-sender-plugin-wrg.php';
}

function wphtmlmail_admin_load_textdomain() {
    load_plugin_textdomain('haet_mail_admin', false, dirname( plugin_basename( __FILE__ ) ) . '/translations' );
} 
add_action('plugins_loaded', 'wphtmlmail_admin_load_textdomain');


function wphtmlmail_admin_activate_after_wphtmlmail() {
    // ensure path to this file is via main wp plugin path
    $wp_path_to_this_file = preg_replace('/(.*)plugins\/(.*)$/', WP_PLUGIN_DIR."/$2", __FILE__);
    $this_plugin = plugin_basename(trim($wp_path_to_this_file));
    $active_plugins = get_option('active_plugins');
    $this_plugin_key = array_search($this_plugin, $active_plugins);
    if (false !== $this_plugin_key) { 
        array_splice($active_plugins, $this_plugin_key, 1);
        array_push($active_plugins, $this_plugin);
        update_option('active_plugins', $active_plugins);
    }
}
add_action('activated_plugin', 'wphtmlmail_admin_activate_after_wphtmlmail');




function haet_mail_register_plugin_admin($plugins){

    $plugins['easy-digital-downloads']   =  array(
        'name'      =>  'easy-digital-downloads',
        'file'      =>  'easy-digital-downloads/easy-digital-downloads.php',
        'class'     =>  'Haet_Sender_Plugin_admin',
        'display_name' => 'Wordpress HTML Email'
    );
    return $plugins;
}
add_filter( 'haet_mail_available_plugins', 'haet_mail_register_plugin_admin');


