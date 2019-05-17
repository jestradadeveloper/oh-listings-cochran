<?php

/*
Plugin Name: OH MLS Listings Cochran Plugin
Plugin URI:  
Description: Plugin with all the property data from RETS mls
Author: Jose Estrada
Version: 0.1
Author URI: http://oh.marketing
*/

defined('ABSPATH') or die("Sorry just aliens can access to this file");

//Plugin Activation
register_activation_hook( __FILE__, 'oh_listings_cochran' ); 
register_activation_hook( __FILE__, 'oh_listings_cochran_install_data' ); 
//define('CR_RUTA',plugin_dir_path(__FILE__));
//define('CR_NOMBRE','oh_listings_cr');
 // Create the table
function oh_listings_cochran() {
   
    global $wpdb;
    $nombreTabla = $wpdb->prefix . "property";
    $charset_collate = $wpdb->get_charset_collate();
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    $created = dbDelta(  
    "CREATE TABLE $nombreTabla (
      ID bigint(20) unsigned NOT NULL AUTO_INCREMENT,
      listing_mls varchar(150),
      listing_type varchar(10),
      listing_name varchar(130),
      listing_headline varchar(250),
      listing_subheadline varchar(250),
      listing_preconstruction varchar(10),
      listing_image varchar(250),
      listing_link varchar(100),
      listing_preview text,
      listing_size varchar(120),
      listing_location varchar(150),
      listing_area varchar(150),
      listing_bedrooms varchar(10),
      listing_bathrooms varchar(10),
      listing_address varchar(250),
      listing_price decimal(18,2),
      listing_long varchar(150),
      listing_lat varchar(150),
      listing_beachfront varchar(100),
      listing_petfriendly varchar(10),
      listing_agent varchar(100),
      listing_thumb varchar(100),
      listing_timestamp datetime,
      listing_database_date date,
      PRIMARY KEY (ID)
    ) $charset_collate;"
  );
}


function oh_listings_cochran_install_data() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'property';
    $url = 'https://rets-api.herokuapp.com';
	$datosCochranListing = wp_remote_get($url);
	if(is_wp_error($datosCochranListing)){
		echo  "Error al leer";
	} else {
        $arrayDatosCochran= json_decode($datosCochranListing['body'], true); 
        foreach ($arrayDatosCochran as $post) {
            setup_postdata($post);
            $listing_mls =  $post['id'];
            $listing_size      =  $post['size'];
            $listing_bedrooms  = $post['bedrooms'];
            $listing_bathrooms = $post['bathrooms'];
            $listing_address   = $post['address'];
            $listing_price =  $post['price'];
            $listing_image = $post['image'];
            $listing_long = $post['long'];
            $listing_lat = $post['lat'];
            $listing_name= $post['name'];
            $listing_preview = $post['preview'];
            $listing_location = $post['area'];
            $listing_area = $post['community'];
            $listing_beachfront = $post['beachfront'];
            $listing_petfriendly = $post['petfriendly'];
            $listing_type= $post['type'];
            $listing_link= $post['link'];
            $listing_headline= $post['headline'];
            $listing_subheadline= $post['subheadline'];
            $listing_preconstruction = $post['preconstruction'];
            $listing_agent= $post['agent'];
            $listing_thumb= $post['thumbnail'];
            $listing_timestamp= $post['timestamp'];
            $wpdb->insert( 
                $table_name, 
                array( 
                    'listing_mls' => $listing_mls, 
                    'listing_type'=> $listing_type,
                    'listing_name' => $listing_name, 
                    'listing_headline'=>$listing_headline,
                    'listing_subheadline'=> $listing_subheadline,
                    'listing_preconstruction'=> $listing_preconstruction,
                    'listing_image' => $listing_image,      
                    'listing_link' => $listing_link,
                    'listing_preview' => $listing_preview,  
                    'listing_size'=> $listing_size,
                    'listing_location'=>$listing_location,
                    'listing_area' => $listing_area,
                    'listing_bedrooms' => $listing_bedrooms,
                    'listing_bathrooms' => $listing_bathrooms,
                    'listing_address' => $listing_address,
                    'listing_price' => $listing_price,
                    'listing_long' => $listing_long,
                    'listing_lat' => $listing_lat,
                    'listing_beachfront' => $listing_beachfront,
                    'listing_petfriendly' => $listing_petfriendly,
                    'listing_agent'=> $listing_agent,
                    'listing_thumb'=>$listing_thumb,
                    'listing_timestamp'=>$listing_timestamp,
                    'listing_database_date' => current_time( 'mysql')
                ) 
            );
        }
    
    }
   // $wpdb->print_error();
    //die;


}


register_deactivation_hook( __FILE__, 'oh_listings_cochran_deactivation' );
//when user deactive the plugin
function oh_listings_cochran_deactivation(){
    global $wpdb;
    $table_name_prepared = $wpdb->prefix . "property";
    $the_removal_query = "DROP TABLE IF EXISTS {$table_name_prepared}";
    $wpdb->query( $the_removal_query );
    
    }

    	
//include(CR_RUTA.'/includes/options.php');


