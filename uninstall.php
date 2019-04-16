<?php

if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

global $wpdb;
$table_name_prepared = $wpdb->prefix . "property";
$the_removal_query = "DROP TABLE IF EXISTS {$table_name_prepared}";
$wpdb->query( $the_removal_query );
