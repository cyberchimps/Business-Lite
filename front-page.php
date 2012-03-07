<?php
/**
* Front Page template used by Business lite
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

	global $options, $themeslug, $post; // call globals
	
	$reorder = $options->get($themeslug.'_front_section_order');
	$slidersize = $options->get($themeslug.'_slider_size');
			
/* Set slider hook based on page option */

	if (preg_match("/business_blog_slider/", $reorder ) && $slidersize != "key2" ) {
		remove_action ( 'business_blog_slider', 'business_slider_content' );
		add_action ( 'business_blog_content_slider', 'business_slider_content');
	}
	
/* End set slider hook*/

?>

<?php get_header(); ?>

		<?php
			foreach(explode(",", $options->get($themeslug.'_front_section_order')) as $fn) {
				if(function_exists($fn)) {
					call_user_func_array($fn, array());
				}
			}
		?>

<?php get_footer(); ?>