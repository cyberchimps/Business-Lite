<?php
/**
* Metabox markup used by Business lite
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

/********************* BEGIN DEFINITION OF META BOXES ***********************/

add_action('init', 'initialize_the_meta_boxes');

function initialize_the_meta_boxes() {

	global  $themename, $themeslug, $themenamefull, $options; // call globals.
		
	// End taxonomy call
	
	$meta_boxes = array();
	$mb = new Chimps_Metabox('pages', $themenamefull.' Page Options', array('pages' => array('page')));
	$mb
		->tab("Page Options")
			->image_select('page_sidebar', 'Select Page Layout', '',  array('options' => array(TEMPLATE_URL . '/images/options/right.png' , TEMPLATE_URL . '/images/options/left.png', TEMPLATE_URL . '/images/options/rightleft.png', TEMPLATE_URL . '/images/options/tworight.png', TEMPLATE_URL . '/images/options/none.png')))
			->checkbox('hide_page_title', 'Page Title', '', array('std' => 'on'))
			->section_order('page_section_order', 'Page Elements', '', array('options' => array(
					'page_section' => 'Page',
					'breadcrumbs' => 'Breadcrumbs',
					'page_slider' => 'Slider',
					'callout_section' => 'Callout',
					'box_section' => 'Boxes'		
					),
					'std' => 'page_section,breadcrumbs'
				))
			->pagehelp('', 'Need Help?', '')
		->tab("Slider Options")
			->single_image('page_slide_one_image', 'Slide One Image', '', array('std' =>  TEMPLATE_URL . '/images/slide_default_1.jpg'))
			->text('page_slide_one_url', 'Slide One Link', '', array('std' => 'http://wordpress.org'))
			->single_image('page_slide_two_image', 'Slide Two Image', '', array('std' =>  TEMPLATE_URL . '/images/slide_default_2.jpg'))
			->text('page_slide_two_url', 'Slide Two Link', '', array('std' => 'http://wordpress.org'))
			->single_image('page_slide_three_image', 'Slide Three Image', '', array('std' =>  TEMPLATE_URL . '/images/slide_default_3.jpg'))
			->checkbox('hide_arrows', 'Navigation Arrows', '', array('std' => 'on'))
			->text('page_slide_three_url', 'Slide Three Link', '', array('std' => 'http://wordpress.org'))
			->sliderhelp('', 'Need Help?', '')
		->tab("Callout Options")
			->textarea('callout_text', 'Callout Text', '')
			->pagehelp('', 'Need help?', '')
		->tab("SEO Options")
			->text('seo_title', 'SEO Title', '')
			->textarea('seo_description', 'SEO Description', '')
			->textarea('seo_keywords', 'SEO Keywords', '')
			->pagehelp('', 'Need help?', '')
		->end();

	foreach ($meta_boxes as $meta_box) {
		$my_box = new RW_Meta_Box_Taxonomy($meta_box);
	}

}