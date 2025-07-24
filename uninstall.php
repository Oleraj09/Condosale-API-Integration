<?php

/**
 * Uninstall Plugin
 * 
 * @package Condosale Marketing Contact
 */

if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}
global $wpdb;
$table_name = $wpdb->prefix . 'crm';
$wpdb->query("DROP TABLE IF EXISTS $table_name");
$table_name = $wpdb->prefix . 'crm_visitor';
$wpdb->query("DROP TABLE IF EXISTS $table_name");
$table_name = $wpdb->prefix . 'crm_radio';
$wpdb->query("DROP TABLE IF EXISTS $table_name");
$table_name = $wpdb->prefix . 'crm_broker';
$wpdb->query("DROP TABLE IF EXISTS $table_name");
$table_name = $wpdb->prefix . 'crm_agent';
$wpdb->query("DROP TABLE IF EXISTS $table_name");
$table_name = $wpdb->prefix . 'crm_form';
$wpdb->query("DROP TABLE IF EXISTS $table_name");
$wpdb->query("DELETE FROM wp_posts WHERE post_type ='crm'");
$wpdb->query("DELETE FROM wp_postmeta WHERE post_id NOT IN (SELECT id FROM wp_posts)");
$wpdb->query("DELETE FROM wp_term_relationships WHERE object_id NOT IN (SELECT id FROM wp_posts)");
register_deactivation_hook(__FILE__, 'my_plugin_remove_database');
