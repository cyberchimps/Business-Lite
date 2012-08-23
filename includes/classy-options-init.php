<?php
/**
* Initializes the Business lite Theme Options
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

require( get_template_directory() . '/core/classy-options/classy-options-framework/classy-options-framework.php');

add_action('init', 'chimps_init_options');

function chimps_init_options() {

global $options, $themeslug, $themename, $themenamefull;
$options = new ClassyOptions($themename, $themenamefull." Options");

$terms2 = get_terms('category', 'hide_empty=0');
	$blogoptions = array();                                  
	$blogoptions['all'] = "All";
    	foreach($terms2 as $term) {
        	$blogoptions[$term->slug] = $term->name;
        }

$options
	->section("Welcome")
		->info("<h1>Business lite 3</h1>
		
<p><strong>Business lite Professional Responsive WordPress Theme</strong></p>

<p>Business lite 3 from CyberChimps WordPress Themes is a Free Professional Responsive Business WordPress Theme perfect for any business on any device. It gives your company the tools to turn WordPress into a modern Drag and Drop Content Management System (CMS).</p>

<p>If you want even more amazing new features <a href='http://cyberchimps.com/businesspro/' target='_blank'>upgrade to Business Pro 3</a> which includes a Responsive Content Feature Slider, Portfolio, Product Element, Page Content, Image Carousel, Twitter bar, Widgetized boxes, Callout section, expanded typography including TypeKit support, and many more powerful new features. Please visit <a href='http://cyberchimps.com/businesspro/' target='_blank'>CyberChimps.com</a> to learn more!</p>

<p>We tried to make Business lite as easy to use as possible, but if you still need help please read the <a href='http://cyberchimps.com/businesslite/docs/' target='_blank'>documentation</a>, and visit our <a href='http://cyberchimps.com/forum/' target='_blank'>support forum</a>.</p>

<p>Thank you for using Business lite.</p>

<p><strong>A Professional Business WordPress Theme</strong></p>
")
	->section("Design")
		->open_outersection()
			->select($themeslug."_color_scheme", "Select a Skin Color", array( 'options' => array("light" => "Light (default)", "dark" => "Dark"), 'default' => 'light'))
			->checkbox($themeslug."_responsive_video", "Responsive Videos")
		->close_outersection()
		->subsection("Typography")
			->select($themeslug."_font", "Choose a Font", array( 'options' => array("Arial" => "Arial (default)", "Courier New" => "Courier New", "Georgia" => "Georgia", "Helvetica" => "Helvetica", "Lucida Grande" => "Lucida Grande", "Tahoma" => "Tahoma", "Times New Roman" => "Times New Roman", "Verdana" => "Verdana", "Maven+Pro" => "Maven Pro", "Ubuntu" => "Ubuntu")))
		->subsection_end()
	->section("Header")
		->open_outersection()
			->section_order("header_section_order", "Drag & Drop Elements", array('options' => array("business_logo_menu" => "Logo + Menu", "business_description_icons" => "Description + Icons"), 'default' => 'business_logo_menu'))
		->close_outersection()
			->subsection("Header Options")
			->checkbox($themeslug."_custom_logo", "Custom Logo" , array('default' => true))
			->upload($themeslug."_logo", "Logo", array('default' => array('url' => TEMPLATE_URL . '/images/logo.png')))
			->checkbox($themeslug."_logo_url_toggle", "Logo Custom URL" , array('default' => false))
			->text($themeslug."_logo_url", "Custom URL")
			->checkbox($themeslug."_favicon_toggle", "Favicon" , array('default' => false))
			->upload($themeslug."_favicon", "Custom Favicon", array('default' => array('url' => TEMPLATE_URL . '/images/favicon.ico')))
			->checkbox($themeslug."_apple_touch_toggle", "Apple Touch Icon" , array('default' => false))
			->upload($themeslug."_apple_touch", "Apple Touch Icon", array('default' => array('url' => TEMPLATE_URL . '/images/apple-icon.png')))
		->subsection_end()
		->subsection("Social")
			->text($themeslug."_twitter", "Twitter Icon URL", array('default' => 'http://twitter.com'))
			->checkbox($themeslug."_hide_twitter_icon", "Hide Twitter Icon", array('default' => true))
			->text($themeslug."_facebook", "Facebook Icon URL", array('default' => 'http://facebook.com'))
			->checkbox($themeslug."_hide_facebook_icon", "Hide Facebook Icon" , array('default' => true))
			->text($themeslug."_gplus", "Google + Icon URL", array('default' => 'http://plus.google.com'))
			->checkbox($themeslug."_hide_gplus_icon", "Hide Google + Icon" , array('default' => true))
			->text($themeslug."_flickr", "Flickr Icon URL", array('default' => 'http://flikr.com'))
			->checkbox($themeslug."_hide_flickr", "Hide Flickr Icon")
			->text($themeslug."_pinterest", "Pinterest Icon URL", array('default' => 'http://pinterest.com'))
			->checkbox($themeslug."_hide_pinterest", "Hide Pinterest Icon")
			->text($themeslug."_linkedin", "LinkedIn Icon URL", array('default' => 'http://linkedin.com'))
			->checkbox($themeslug."_hide_linkedin", "Hide LinkedIn Icon")
			->text($themeslug."_youtube", "YouTube Icon URL", array('default' => 'http://youtube.com'))
			->checkbox($themeslug."_hide_youtube", "Hide YouTube Icon")
			->text($themeslug."_googlemaps", "Google Maps Icon URL", array('default' => 'http://maps.google.com'))
			->checkbox($themeslug."_hide_googlemaps", "Hide Google maps Icon")
			->text($themeslug."_email", "Email Address")
			->checkbox($themeslug."_hide_email", "Hide Email Icon")
			->text($themeslug."_rsslink", "RSS Icon URL")
			->checkbox($themeslug."_hide_rss_icon", "Hide RSS Icon" , array('default' => true))
		->subsection_end()
		->subsection("Tracking")
			->textarea($themeslug."_ga_code", "Google Analytics Code")
		->subsection_end()
		->section("Front Page")
		->open_outersection()
			->section_order($themeslug."_front_section_order", "Drag & Drop Elements", array('options' => array("business_page_slider" => "Slider", "business_callout_section" => "Callout Section", "business_box_section" => "Boxes"), "default" => 'business_page_slider,business_callout_section,business_box_section'))
		->close_outersection()
		->subsection("Slider")
			->upload($themeslug."_front_slide_one_image", "Slide One Image", array('default' => array('url' => TEMPLATE_URL . '/images/slide_default_1.jpg')))
			->text($themeslug."_front_slide_one_url", "Slide One Link", array('default' => 'http://wordpress.org'))
			->upload($themeslug."_front_slide_two_image", "Slide Two", array('default' => array('url' => TEMPLATE_URL . '/images/slide_default_2.jpg')))
			->text($themeslug."_front_slide_two_url", "Slide Two Link", array('default' => 'http://wordpress.org'))
			->upload($themeslug."_front_slide_three_image", "Slide Three", array('default' => array('url' => TEMPLATE_URL . '/images/slide_default_3.jpg')))
			->text($themeslug."_front_slide_three_url", "Slide Three Link", array('default' => 'http://wordpress.org'))
			->checkbox($themeslug."_front_hide_slider_arrows", "Slider Arrows", array('default' => true))
		->subsection_end()
		->subsection("Callout")
			->textarea($themeslug."_front_callout_text", "Enter your Callout text")
		->subsection_end()
		->section("Blog")
		->open_outersection()
			->section_order($themeslug."_blog_section_order", "Drag & Drop Elements", array('options' => array("business_post" => "Post Page", "business_page_slider" => "Slider","business_callout_section" => "Callout Section","business_box_section" => "Boxes"), "default" => 'business_post'))
		->close_outersection()
		->subsection("Blog Options")
			->images($themeslug."_blog_sidebar", "Sidebar Options", array( 'options' => array("none" => TEMPLATE_URL . '/images/options/none.png',"two-right" => TEMPLATE_URL . '/images/options/tworight.png', "right-left" => TEMPLATE_URL . '/images/options/rightleft.png', "left" => TEMPLATE_URL . '/images/options/left.png',  "right" => TEMPLATE_URL . '/images/options/right.png'), 'default' => 'right'))
			->checkbox($themeslug."_post_formats", "Post Format Icons",  array('default' => true))
			->checkbox($themeslug."_show_excerpts", "Post Excerpts")
			->text($themeslug."_excerpt_link_text", "Excerpt Link Text", array('default' => 'Continue Reading&#8230;'))
			->text($themeslug."_excerpt_length", "Excerpt Character Length", array('default' => '55'))
			->checkbox($themeslug."_show_featured_images", "Featured Images")
			->multicheck($themeslug."_hide_byline", "Post Byline Elements", array( 'options' => array($themeslug."_hide_author" => "Author" , $themeslug."_hide_categories" => "Categories", $themeslug."_hide_date" => "Date", $themeslug."_hide_comments" => "Comments",  $themeslug."_hide_tags" => "Tags"), 'default' => array( $themeslug."_hide_tags" => true, $themeslug."_hide_author" => true, $themeslug."_hide_date" => true, $themeslug."_hide_comments" => true, $themeslug."_hide_categories" => true ) ) )
		->subsection_end()
		->subsection("Feature Slider")
			->upload($themeslug."_blog_slide_one_image", "Slide One Image", array('default' => array('url' => TEMPLATE_URL . '/images/slide_default_1.jpg')))
			->text($themeslug."_blog_slide_one_url", "Slide One Link", array('default' => 'http://cyberchimps.com'))
			->upload($themeslug."_blog_slide_two_image", "Slide Two", array('default' => array('url' => TEMPLATE_URL . '/images/slide_default_2.jpg')))
			->text($themeslug."_blog_slide_two_url", "Slide Two Link", array('default' => 'http://cyberchimps.com'))
			->upload($themeslug."_blog_slide_three_image", "Slide Three", array('default' => array('url' => TEMPLATE_URL . '/images/slide_default_3.jpg')))
			->text($themeslug."_blog_slide_three_url", "Slide Three Link", array('default' => 'http://cyberchimps.com'))
			->checkbox($themeslug."_blog_hide_slider_arrows", "Slider Arrows", array('default' => true))
		->subsection_end()
		->subsection("Callout Options")
			->textarea($themeslug."_blog_callout_text", "Enter your Callout text")
		->subsection_end()
	->section("Templates")
		->subsection("Single Post")
			->images($themeslug."_single_sidebar", "Sidebar Options", array( 'options' => array("none" => TEMPLATE_URL . '/images/options/none.png',"two-right" => TEMPLATE_URL . '/images/options/tworight.png', "right-left" => TEMPLATE_URL . '/images/options/rightleft.png', "left" => TEMPLATE_URL . '/images/options/left.png',  "right" => TEMPLATE_URL . '/images/options/right.png'), 'default' => 'right'))
			->checkbox($themeslug."_single_breadcrumbs", "Breadcrumbs", array('default' => true))
			->checkbox($themeslug."_single_show_featured_images", "Featured Images")
			->checkbox($themeslug."_single_post_formats", "Post Format Icons",  array('default' => true))
			->multicheck($themeslug."_single_hide_byline", "Post Byline Elements", array( 'options' => array($themeslug."_hide_author" => "Author" , $themeslug."_hide_categories" => "Categories", $themeslug."_hide_date" => "Date", $themeslug."_hide_comments" => "Comments",  $themeslug."_hide_tags" => "Tags"), 'default' => array( $themeslug."_hide_tags" => true,  $themeslug."_hide_author" => true, $themeslug."_hide_date" => true, $themeslug."_hide_comments" => true, $themeslug."_hide_categories" => true ) ) )
			->checkbox($themeslug."_post_pagination", "Post Pagination Links",  array('default' => true))
		->subsection_end()	
		->subsection("Archive")
			->images($themeslug."_archive_sidebar", "Sidebar Options", array( 'options' => array("none" => TEMPLATE_URL . '/images/options/none.png',"two-right" => TEMPLATE_URL . '/images/options/tworight.png', "right-left" => TEMPLATE_URL . '/images/options/rightleft.png', "left" => TEMPLATE_URL . '/images/options/left.png',  "right" => TEMPLATE_URL . '/images/options/right.png'), 'default' => 'right'))
			->checkbox($themeslug."_archive_breadcrumbs", "Breadcrumbs", array('default' => true))
			->checkbox($themeslug."_archive_show_excerpts", "Post Excerpts", array('default' => true))
			->checkbox($themeslug."_archive_post_formats", "Post Format Icons",  array('default' => true))
			->multicheck($themeslug."_archive_hide_byline", "Post Byline Elements", array( 'options' => array($themeslug."_hide_author" => "Author" , $themeslug."_hide_categories" => "Categories", $themeslug."_hide_date" => "Date", $themeslug."_hide_comments" => "Comments",  $themeslug."_hide_tags" => "Tags"), 'default' => array( $themeslug."_hide_tags" => true, $themeslug."_hide_author" => true, $themeslug."_hide_date" => true, $themeslug."_hide_comments" => true, $themeslug."_hide_categories" => true ) ) )
			->subsection_end()
		->subsection("Search")
			->images($themeslug."_search_sidebar", "Sidebar Options", array( 'options' => array("none" => TEMPLATE_URL . '/images/options/none.png',"two-right" => TEMPLATE_URL . '/images/options/tworight.png', "right-left" => TEMPLATE_URL . '/images/options/rightleft.png', "left" => TEMPLATE_URL . '/images/options/left.png',  "right" => TEMPLATE_URL . '/images/options/right.png'), 'default' => 'right'))
			->checkbox($themeslug."_search_show_excerpts", "Post Excerpts", array('default' => true))
		->subsection_end()
		->subsection("404")
			->images($themeslug."_404_sidebar", "Sidebar Options", array( 'options' => array("none" => TEMPLATE_URL . '/images/options/none.png',"two-right" => TEMPLATE_URL . '/images/options/tworight.png', "right-left" => TEMPLATE_URL . '/images/options/rightleft.png', "left" => TEMPLATE_URL . '/images/options/left.png',  "right" => TEMPLATE_URL . '/images/options/right.png'), 'default' => 'right'))

			->textarea($themeslug."_custom_404", "Custom 404 Content")
		->subsection_end()
	->section("Footer")
		->open_outersection()
			->text($themeslug."_footer_text", "Footer Copyright Text")
		->close_outersection()
;
}
