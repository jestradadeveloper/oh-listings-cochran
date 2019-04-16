<?php

defined('ABSPATH') or die("Sorry just aliens can access to this file");

class options_page {

	function __construct() {
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
	}

	function admin_menu() {
		add_options_page(
			'RETS Settings for update database',
			'Oh Listings Cochran',
			'manage_options',
            'options_page_oh_rets',
            __DIR__.'/admin/configuration.php'
		);
	}

	function  settings_page() {
		echo 'This is the page content';
	}
}

new options_page;