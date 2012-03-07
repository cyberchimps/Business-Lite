<?php
/**
* Hook wrappers used by Business lite
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
* Sidebar init. 
*
* @since 3.0
*/
function business_sidebar_init() {
	do_action ('business_sidebar_init');
}

/**
* Placed before the 404 message content (404.php).
*
* @since 3.0
*/
function business_before_404() {
	do_action('business_before_404');
}

/**
* 404 page template message content (404.php).
*
* @since 3.0
*/
function business_404() {
	do_action('business_404');
}

/**
* Placed after the 404 message content (404.php).
*
* @since 3.0
*/
function business_after_404() {
	do_action('business_after_404');
}

/**
* Placed before the archive template content (archive.php). 
*
* @since 3.0
*/
function business_before_archive() {
	do_action('business_before_archive');
}

/**
* Conditionals for various archive page title types (archive.php).
*
* @since 3.0
*/
function business_archive_title() {
	do_action('business_archive_title');
}

/**
* Archive template loop content (archive.php).
*
* @since 3.0
*/
function business_archive() {
	do_action('business_archive');
}

/**
* Placed after the archive template content (archive.php). 
*
* @since 3.0
*/
function business_after_archive() {
	do_action('business_after_archive');
}

/**
* Placed after the comment section content (comments.php). 
*
* @since 3.0
*/
function business_before_comments() {
	do_action('business_before_comments');
}

/**
* Creates the comment section (comments.php). 
*
* @since 3.0
*/
function business_comments() {
	do_action('business_comments');
}

/**
* Placed after the comment section (comments.php). 
*
* @since 3.0
*/
function business_after_comments() {
	do_action('business_after_comments');
}

/**
* For use before main page content. 
*
* @since 3.0
*/
function business_before_page_content() {
	do_action('business_before_page_content');
}

/**
* For use after main page content. 
*
* @since 3.0
*/
function business_after_page_content() {
	do_action('business_after_page_content');
}

/**
* Placed after post entry (sets up sidebar). 
*
* @since 3.0
*/
function business_after_entry() {
	do_action('business_after_entry');
}

/**
* For use before the loop. 
*
* @since 3.0
*/
function business_before_loop() {
	do_action('business_before_loop');
}

/**
* The loop. 
*
* @since 3.0
*/
function business_loop() {
	do_action('business_loop');
}

/**
* The loop (single.php). 
*
* @since 3.0
*/
function business_single_loop() {
	do_action('business_single_loop');
}

/**
* For use after the loop. 
*
* @since 3.0
*/
function business_after_loop() {
	do_action('business_after_loop');
}

/**
* For use before the footer content. 
*
* @since 3.0
*/
function business_before_footer() {
	do_action('business_before_footer_content');
}

/**
* Footer content. 
*
* @since 3.0
*/
function business_footer() {
	do_action('business_footer');
}

/**
* For use after the footer content. 
*
* @since 3.0
*/
function business_after_footer() {
	do_action('business_after_footer_content');
}

/**
* Contains the secondary footer elements. 
*
* @since 3.0
*/
function business_secondary_footer() { 
	do_action('business_secondary_footer');
}

/**
* Post byline content (single.php). 
*
* @since 3.0
*/
function business_single_post_byline() {
	do_action('business_single_post_byline');
}

/**
* Post byline content (archive.php). 
*
* @since 3.0
*/
function business_archive_post_byline() {
	do_action('business_archive_post_byline');
}


/**
* Calls post tags (single.php). 
*
* @since 3.0
*/
function business_single_post_tags() {
	do_action('business_single_post_tags');
}

/**
* Post byline content. 
*
* @since 3.0
*/
function business_post_byline() {
	do_action('business_post_byline');
}

/**
* Calls post tags. 
*
* @since 3.0
*/
function business_post_tags() {
	do_action('business_post_tags');
}

/**
* Calls post tags (archive.php). 
*
* @since 3.0
*/
function business_archive_post_tags() {
	do_action('business_archive_post_tags');
}

/**
* Post pagination. 
*
* @since 3.0
*/
function business_link_pages() {
	do_action('business_link_pages');
}

/**
* Creates admin edit link for pages and posts. 
*
* @since 3.0
*/
function business_edit_link() {
	do_action('business_edit_link');
}

/**
* Contains HTML, title, rel and meta elements. 
*
* @since 3.0
*/
function business_head_tag() {
	do_action('business_head_tag');
}

/**
* Placed after closing HEAD tag, contains font function. 
*
* @since 3.0
*/
function business_after_head_tag() {
	do_action('business_after_head_tag');
}

/**
* For adding content before the main header content. 
*
* @since 3.0
*/
function business_before_header() {
	do_action('business_before_header');
}

/**
* For adding content after the main header content. 
*
* @since 3.0
*/
function business_after_header() {
	do_action('business_after_header');
}

/**
* Sitename/logo content. 
*
* @since 3.0
*/
function business_header_sitename() {
	do_action('business_header_sitename');
}

/**
* Site description. 
*
* @since 3.0
*/
function business_header_site_description() {
	do_action('business_header_site_description');
}

/**
* Header social icon section. 
*
* @since 3.0
*/
function business_header_social_icons() {
	do_action('business_header_social_icons');
}

/**
* Site menu. 
*
* @since 3.0
*/
function business_navigation() {
	do_action('business_navigation');
}

/**
* Index pagination. 
*
* @since 3.0
*/
function business_pagination() { 
	do_action('business_pagination');
}

/**
* Post page pagination. 
*
* @since 3.0
*/
function business_links_pages() { 
	do_action('business_links_pages');
}

/**
* Next/Prev post links for single.php. 
*
* @since 3.0
*/
function business_post_pagination() { 
	do_action('business_post_pagination');
}

/**
* Sets up the page section for page.php. 
*
* @since 3.0
*/
function business_page_section() {
	do_action('business_page_section');
}

/**
* Placed before the search result content. 
*
* @since 3.0
*/
function business_before_search() {
	do_action('business_before_search');
}

/**
* Sets up the search result content. 
*
* @since 3.0
*/
function business_search() {
	do_action('business_search');
}

/**
* Placed after the search result content. 
*
* @since 3.0
*/
function business_after_search() {
	do_action('business_after_search');
}

/**
* Generates the lite version of the iFeature slider. 
*
* @since 3.0
*/
function business_blog_slider_lite() {
	do_action('business_blog_slider_lite');
}

/**
* Generates the Twitter Bar page element. 
*
* @since 3.0
*/
function business_twitterbar_section() {
	do_action ('business_twitterbar_section');
}

/**
* Generates the before content sidebar. 
*
* @since 3.0
*/
function business_before_content_sidebar() {
	do_action ('business_before_content_sidebar');
}

/**
* Generates the after content sidebar. 
*
* @since 3.0
*/
function business_after_content_sidebar() {
	do_action ('business_after_content_sidebar');
}

/**
* Post content. 
*
* @since 3.0
*/
function business_post() {
	do_action ('business_post');
}

/**
* Postbar. 
*
* @since 3.0
*/
function business_post_bar() {
	do_action ('business_post_bar');
}

function business_logo_menu() {
	do_action('business_logo_menu');
}

function business_description_icons() {
	do_action('business_description_icons');
}

function business_box_section() {
	do_action ('business_box_section');
}

function business_callout_section() {
	do_action ('business_callout_section');
}

function business_page_slider() {
	do_action ('business_page_slider');
}
/**
* End
*/

?>