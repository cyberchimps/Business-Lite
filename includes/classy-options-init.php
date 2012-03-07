<?php
/**
* Initializes the Business lite Theme Options
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
		->info("<h1>Business 3</h1>
		
<p><strong>Business Professional Responsive WordPress Theme</strong></p>

<p>Business 3 from CyberChimps WordPress Themes is a Free Professional Responsive WordPress Theme perfect for any business on any device. It gives your company the tools to turn WordPress into a modern Drag and Drop Content Management System (CMS).</p>

<p>To get started simply work your way through the menus to the left, select your options, add your content, and always remember to hit save after making any changes.</p>

<p>The Content Feature Slider options are under the Business Pro Page Options which are available below the Page content entry area in WP-Admin when you edit a page. This way you can configure each page individually. You will also find the Drag & Drop Page Elements editor within the Business Pro Page Options as well.</p>

<p>We tried to make Business Pro as easy to use as possible, but if you still need help please read the <a href='http://cyberchimps.com/businesspro/docs/' target='_blank'>documentation</a>, and visit our <a href='http://cyberchimps.com/forum/pro/' target='_blank'>support forum</a>.</p>

<p>Thank you for using Business Pro.</p>

<p><strong>A Professional Business WordPress Theme</strong></p>
")
	->section("Design")
		->open_outersection()
			->select($themeslug."_color_scheme", "Select a Skin Color", array( 'options' => array("light" => "Light (default)", "dark" => "Dark"), 'default' => 'light'))
		->close_outersection()
		->subsection("Typography")
			->select($themeslug."_font", "Choose a Font", array( 'options' => array("Arial" => "Arial (default)", "Courier New" => "Courier New", "Georgia" => "Georgia", "Helvetica" => "Helvetica", "Lucida Grande" => "Lucida Grande", "Tahoma" => "Tahoma", "Times New Roman" => "Times New Roman", "Verdana" => "Verdana", "Maven+Pro" => "Maven Pro", "Ubuntu" => "Ubuntu")))
		->subsection_end()
			->open_outersection()
				->checkbox($themeslug."_lazy_load", "Lazy Load Image Effect", array('default' => true))
			->close_outersection()
	->section("Header")
		->open_outersection()
			->section_order("header_section_order", "Drag & Drop Elements", array('options' => array("business_logo_menu" => "Logo + Menu", "business_description_icons" => "Description + Icons"), 'default' => 'business_logo_menu'))
		->close_outersection()
			->subsection("Header Options")
			->checkbox($themeslug."_custom_logo", "Custom Logo" , array('default' => true))
			->upload($themeslug."_logo", "Logo", array('default' => array('url' => TEMPLATE_URL . '/images/logo.png')))
			->upload($themeslug."_favicon", "Custom Favicon")
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
			->section_order($themeslug."_front_section_order", "Drag & Drop Elements", array('options' => array("business_page_slider" => "Content Slider", "business_callout_section" => "Callout Section", "business_box_section" => "Boxes"), "default" => 'business_page_slider,business_callout_section,business_box_section'))
		->close_outersection()
		->subsection("Slider")
			->select($themeslug.'_front_customslider_category', 'Slide Category', array( 'options' => $customslider ))
			->text($themeslug."_front_slider_height", "Slider Height", array('default' => '300'))
			->text($themeslug."_front_slider_delay", "Slider Delay", array('default' => '3500'))
			->select($themeslug."_front_slider_animation", "Slider Animation", array( 'options' => array("key1" => "Horizontal-Push", "key2" => "Fade", "key3" => "Horizontal-Slide", "key4" => "Vertical-Slide")))
			->select($themeslug."_front_slider_nav", "Slider Navigation", array( 'options' => array("key1" => "Dots","key3" => "none")))
			->checkbox($themeslug."_front_hide_slider_arrows", "Slider Arrows", array('default' => true))
			->checkbox($themeslug."_front_enable_wordthumb", "WordThumb Image Resizing")
		->subsection_end()
		->subsection("Callout")
			->textarea($themeslug."_front_callout_text", "Enter your Callout text")
		->subsection_end()
		->section("Blog")
		->open_outersection()
			->section_order($themeslug."_blog_section_order", "Drag & Drop Elements", array('options' => array("business_post" => "Post Page", "business_page_slider" => "Content Slider","business_callout_section" => "Callout Section","business_box_section" => "Boxes"), "default" => 'business_post'))
		->close_outersection()
		->subsection("Blog Options")
			->images($themeslug."_blog_sidebar", "Sidebar Options", array( 'options' => array("none" => TEMPLATE_URL . '/images/options/none.png',"two-right" => TEMPLATE_URL . '/images/options/tworight.png', "right-left" => TEMPLATE_URL . '/images/options/rightleft.png', "left" => TEMPLATE_URL . '/images/options/left.png',  "right" => TEMPLATE_URL . '/images/options/right.png'), 'default' => 'right'))
			->checkbox($themeslug."_post_formats", "Post Format Icons",  array('default' => true))
			->checkbox($themeslug."_show_excerpts", "Post Excerpts")
			->text($themeslug."_excerpt_link_text", "Excerpt Link Text", array('default' => 'Continue Reading…'))
			->text($themeslug."_excerpt_length", "Excerpt Character Length", array('default' => '55'))
			->checkbox($themeslug."_show_featured_images", "Featured Images")
			->multicheck($themeslug."_hide_byline", "Post Byline Elements", array( 'options' => array($themeslug."_hide_author" => "Author" , $themeslug."_hide_categories" => "Categories", $themeslug."_hide_date" => "Date", $themeslug."_hide_comments" => "Comments", $themeslug."_hide_share" => "Share", $themeslug."_hide_tags" => "Tags"), 'default' => array( $themeslug."_hide_tags" => true, $themeslug."_hide_share" => true, $themeslug."_hide_author" => true, $themeslug."_hide_date" => true, $themeslug."_hide_comments" => true, $themeslug."_hide_categories" => true ) ) )
		->subsection_end()
		->subsection("Blog Slider")
			->select($themeslug.'_blog_customslider_category', 'Custom slide category', array( 'options' => $customslider ))
			->text($themeslug."_blog_slider_height", "Slider height", array('default' => '300'))
			->text($themeslug."_blog_slider_delay", "Slider Delay", array('default' => '3500'))
			->select($themeslug."_blog_slider_animation", "Slider Animation", array( 'options' => array("key1" => "Horizontal-Push", "key2" => "Fade", "key3" => "Horizontal-Slide", "key4" => "Vertical-Slide")))
			->select($themeslug."_blog_slider_nav", "Slider Navigation", array( 'options' => array("key1" => "Dots", "key3" => "none")))
			->checkbox($themeslug."_blog_hide_slider_arrows", "Slider Arrows", array('default' => true))
			->checkbox($themeslug."_blog_enable_wordthumb", "WordThumb Image Resizing")
		->subsection_end()
		->subsection("Callout Options")
			->textarea($themeslug."_blog_callout_text", "Enter your Callout text")
		->subsection_end()
		->subsection("SEO")
			->textarea($themeslug."_home_description", "Home Description")
			->textarea($themeslug."_home_keywords", "Home Keywords")
			->text($themeslug."_home_title", "Optional Home Title")
		->subsection_end()
	->section("Templates")
		->subsection("Single Post")
			->images($themeslug."_single_sidebar", "Sidebar Options", array( 'options' => array("none" => TEMPLATE_URL . '/images/options/none.png',"two-right" => TEMPLATE_URL . '/images/options/tworight.png', "right-left" => TEMPLATE_URL . '/images/options/rightleft.png', "left" => TEMPLATE_URL . '/images/options/left.png',  "right" => TEMPLATE_URL . '/images/options/right.png'), 'default' => 'right'))
			->checkbox($themeslug."_single_breadcrumbs", "Breadcrumbs", array('default' => true))
			->checkbox($themeslug."_single_show_featured_images", "Featured Images")
			->checkbox($themeslug."_single_post_formats", "Post Format Icons",  array('default' => true))
			->multicheck($themeslug."_single_hide_byline", "Post Byline Elements", array( 'options' => array($themeslug."_hide_author" => "Author" , $themeslug."_hide_categories" => "Categories", $themeslug."_hide_date" => "Date", $themeslug."_hide_comments" => "Comments", $themeslug."_hide_share" => "Share", $themeslug."_hide_tags" => "Tags"), 'default' => array( $themeslug."_hide_tags" => true, $themeslug."_hide_share" => true, $themeslug."_hide_author" => true, $themeslug."_hide_date" => true, $themeslug."_hide_comments" => true, $themeslug."_hide_categories" => true ) ) )
			->checkbox($themeslug."_post_pagination", "Post Pagination Links",  array('default' => true))
		->subsection_end()	
		->subsection("Archive")
			->images($themeslug."_archive_sidebar", "Sidebar Options", array( 'options' => array("none" => TEMPLATE_URL . '/images/options/none.png',"two-right" => TEMPLATE_URL . '/images/options/tworight.png', "right-left" => TEMPLATE_URL . '/images/options/rightleft.png', "left" => TEMPLATE_URL . '/images/options/left.png',  "right" => TEMPLATE_URL . '/images/options/right.png'), 'default' => 'right'))
			->checkbox($themeslug."_archive_breadcrumbs", "Breadcrumbs", array('default' => true))
			->checkbox($themeslug."_archive_show_excerpts", "Post Excerpts", array('default' => true))
			->checkbox($themeslug."_archive_post_formats", "Post Format Icons",  array('default' => true))
			->multicheck($themeslug."_archive_hide_byline", "Post Byline Elements", array( 'options' => array($themeslug."_hide_author" => "Author" , $themeslug."_hide_categories" => "Categories", $themeslug."_hide_date" => "Date", $themeslug."_hide_comments" => "Comments", $themeslug."_hide_share" => "Share", $themeslug."_hide_tags" => "Tags"), 'default' => array( $themeslug."_hide_tags" => true, $themeslug."_hide_share" => true, $themeslug."_hide_author" => true, $themeslug."_hide_date" => true, $themeslug."_hide_comments" => true, $themeslug."_hide_categories" => true ) ) )
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
