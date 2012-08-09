<?php 
/**
* Header template used by Business lite
*
* Authors: Tyler Cunningham, Trent Lapinski
* Copyright: © 2012
* {@link http://cyberchimps.com/ CyberChimps LLC}
*
* Released under the terms of the GNU General Public License.
* You should have received a copy of the GNU General Public License,
* along with this software. In the main directory, see: /licensing/
* If not, see: {@link http://www.gnu.org/licenses/}.
*
* @package Business lite
* @since 3.0
*/

/* Call globals. */	

	global $themename, $themeslug, $options;
	
/* End globals. */
	
?>

	<?php business_head_tag(); ?>
	

<?php wp_head(); ?> <!-- wp_head();-->
	
</head><!-- closing head tag-->

<!-- Begin @business after_head_tag hook content-->
	<?php business_after_head_tag(); ?>
<!-- End @business after_head_tag hook content-->
	
<!-- Begin @business before_header hook  content-->
	<?php business_before_header(); ?> 
<!-- End @business before_header hook content -->
	
<!-- Adding wrapper class for sticky footer -->
<div class="wrapper">	
	
<header>		
	<?php
		foreach(explode(",", $options->get('header_section_order')) as $fn) {
			if(function_exists($fn)) {
				call_user_func_array($fn, array());
			}
		}
	?>
</header>

<!-- Begin @business after_header hook -->
	<?php business_after_header(); ?> 
<!-- End @business after_header hook -->
