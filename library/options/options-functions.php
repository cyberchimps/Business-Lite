<?php
/* 
	Options	Functions
	Author: Tyler Cuningham
	Establishes the theme options functions.
	Copyright (C) 2011 CyberChimps
	Version 2.0
	
*/

/* Widget title background */
 
/* Plus 1 Allignment */

function business_plusone_alignment() {

	global $options;
	
	if ($options['bu_show_fb_like'] == "1" AND $options['bu_show_gplus'] == "1" ) {

		echo '<style type="text/css">';
		echo ".gplusone {float: right; margin-right: -38px;}";
		echo '</style>';
		
	}
	
}
add_action( 'wp_head', 'business_plusone_alignment');


/* Featured Image Alignment */

function business_featured_image_alignment() {

	global $options;
	
	if ($options['bu_featured_images'] == "right" ) {

		echo '<style type="text/css">';
		echo ".featured-image {float: right;}";
		echo '</style>';
		
	}
	
	elseif ($options['bu_featured_images'] == "center" ) {

		echo '<style type="text/css">';
		echo ".featured-image {text-align: center;}";
		echo '</style>';
		
	}
	
	else {

		echo '<style type="text/css">';
		echo ".featured-image {float: left;}";
		echo '</style>';
		
	}

	
}
add_action( 'wp_head', 'business_featured_image_alignment');


/* Link Color */

function business_add_link_color() {

	global $options;

	if ($options['if_link_color'] == "") 
		$link = '717171';
	

	else 
		$link = $options['if_link_color']; 
					
	
		echo '<style type="text/css">';
		echo "a {color: #$link;}";
		echo '</style>';
		
}
add_action( 'wp_head', 'business_add_link_color');
