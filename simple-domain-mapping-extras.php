<?php
/*
Plugin Name: Simple Domain Mapping Extras
Plugin URI: http://plugins.findingsimple.com
Description: Drop in for additional domain mapping features. 
Version: 1.0
Author: Finding Simple
Author URI: http://findingsimple.com
License: GPL2
*/
/*
Copyright 2013  Finding Simple  (email : plugins@findingsimple.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if ( ! class_exists( 'Simple_Domain_Mapping_Extras' ) ) :

/**
 * Plugin Main Class.
 *
 * @package Simple WP Stack CDN Multisite
 * @author Jason Conroy <jason@findingsimple.com>
 * @since 1.0
 */
class Simple_Domain_Mapping_Extras {
	
	/**
	 * Initialise
	 */
	function Simple_Domain_Mapping_Extras() {
		
		add_filter( 'get_the_image', array( &$this , 'filter_get_the_image' ) );

	}

	/**
	 * Apply domain mapping url to hybrid core get the image
	 */
	function filter_get_the_image( $image ) {
	
  		if ( is_multisite() ) {
    		
    		if ( function_exists('domain_mapping_post_content') ) {
    		
      			$image = domain_mapping_post_content( $image );
      			
    		}
    		
  		}
  		
  		return $image;
		
	}		

}

$Simple_Domain_Mapping_Extras = new Simple_Domain_Mapping_Extras();

endif;
