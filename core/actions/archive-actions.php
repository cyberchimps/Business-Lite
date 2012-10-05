<?php
/**
* Archive actions used by Business lite
*
* Author: Tyler Cunningham
* Copyright: &#169; 2012
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
* Business archive actions
*/
add_action( 'business_archive_title', 'business_archive_page_title' );

/**
* Output archive page title based on archive type. 
*
* @since 3.0
*/
function business_archive_page_title() { 
	global $post; ?>
	
		<?php if (is_category()) { ?>
			<h2 class="archivetitle"><?php _e( 'Archive for the &#8216;', 'business' ); ?><?php single_cat_title(); ?><?php _e( '&#8217; Category:', 'business' ); ?></h2><br />

		<?php } elseif( is_tag() ) { ?>
			<h2 class="archivetitle"><?php _e( 'Posts Tagged &#8216;', 'business' ); ?><?php single_tag_title(); ?><?php _e( '&#8217;:', 'business' ); ?></h2><br />

		<?php } elseif (is_day()) { ?>
			<h2 class="archivetitle"><?php _e( 'Archive for', 'business' ); ?> <?php the_time('F jS, Y'); ?>:</h2><br />

		<?php } elseif (is_month()) { ?>
			<h2 class="archivetitle"><?php _e( 'Archive for', 'business' ); ?> <?php the_time('F, Y'); ?>:</h2><br />

		<?php } elseif (is_year()) { ?>
			<h2 class="archivetitle"><?php _e( 'Archive for:', 'business' ); ?> <?php the_time('Y'); ?>:</h2><br />

		<?php } elseif (is_author()) { ?>
			<h2 class="archivetitle"><?php _e( 'Author Archive:', 'business' ); ?></h2><br />

		<?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			<h2 class="archivetitle"><?php _e('Blog Archives:', 'business' ); ?></h2><br />
	
		<?php } 
}

/**
* End
*/

?>