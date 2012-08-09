<?php
/**
* Pagination actions used by Business lite
*
* Author: Tyler Cunningham
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

/**
* business pagination actions
*/
add_action('business_pagination', 'business_previous_posts');
add_action('business_pagination', 'business_newer_posts');
add_action('business_link_pages', 'business_link_pages_content');
add_action('business_post_pagination', 'business_post_pagination_content');

/**
* Sets up the previous post link and applies a filter to the link text.
*
* @since 3.0
*/
function business_previous_posts() {
	$previous_text = apply_filters('business_previous_posts_text', '&laquo; Older Entries' ); 
	
	echo "<div class='pagnext-posts'>";
	next_posts_link( $previous_text );
	echo "</div>";
}

/**
* Sets up the next post link and applies a filter to the link text. 
*
* @since 3.0
*/
function business_newer_posts() {
	$newer_text = apply_filters('business_newer_posts_text', 'Newer Entries &raquo;' );
	
	echo "<div class='pagprev-posts'>";
	previous_posts_link( $newer_text );
	echo "</div>";
}

/**
* Sets up the WP link pages
*
* @since 3.0
*/
function business_link_pages_content() {
	 wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number'));
}

/**
* Post pagination links 
*
* @since 3.0
*/
function business_post_pagination_content() {
	global $options, $themeslug?>
	
	<?php if ($options->get($themeslug.'_post_pagination') != "0"):?>
	<div class="prev-posts-single"><?php previous_post_link(); ?></div> <div class="next-posts-single"><?php next_post_link(); ?></div>
	<?php endif; 
}

/**
* End
*/

?>