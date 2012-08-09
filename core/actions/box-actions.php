<?php
/**
* Box section actions used by Business lite
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
* business Box Section actions
*/
add_action( 'business_box_section', 'business_box_section_content' );

/**
* Sets up the Box Section wigetized area
*
* @since 3.0
*/
function business_box_section_content() { 
	global $post; //call globals
	
	$root = get_template_directory_uri(); ?>
<div class="container">
<div class="row boxes">
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Box 1") ) : ?>
		<div id="box1" class="three columns">
			<h2 class="box-widget-title">Responsive Design</h2>	
			<p class="boxtext"><img src="<?php echo $root ; ?>/images/icons/iphone.png" height="24" alt="slider" class="alignleft" />Business lites&#39;s Modern Responsive Design automatically adjusts to any mobile device including the iPhone, iPad, and Android devices.</p>
		</div><!--end box1-->
		<?php endif; ?>
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Box 2") ) : ?>
		<div id="box2" class="three columns">
			<h2 class="box-widget-title">Content Feature Slider </h2>
			<p class="boxtext"><img src="<?php echo $root ; ?>/images/icons/home.png" height="24" alt="slider" class="alignleft" />Business lite comes with a SEO and iOS friendly Responsive Feature Slider that displays content professionally and beautifully on any device.</p>
		</div><!--end box2-->
		<?php endif; ?>
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Box 3") ) : ?>
		<div id="box3" class="three columns">
			<h2 class="box-widget-title">Drag and Drop Elements</h2>
			<p class="boxtext"><img src="<?php echo $root ; ?>/images/icons/cogs.png" height="24" alt="slider" class="alignleft" />Business lite includes a variety of Drag and Drop Page Elements make mananaging content easy and can be used on a per-page basis.</p>
		</div><!--end box3-->
		<?php endif; ?>
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Box 4") ) : ?>
		<div id="box4" class="three columns">
			<h2 class="box-widget-title">Excellent Support</h2>
			<p class="boxtext"><img src="<?php echo $root ; ?>/images/icons/search.png" height="24" alt="slider" class="alignleft" />Business lite is built for any business, and offers intuitive theme options. If you do run into trouble we provide a <a href="http://cyberchimps.com/forum/pro/">Support Forum</a>, and precise <a title="Business Pro Docs" href="http://cyberchimps.com/businesslite/docs/">Documentation</a>.</p>
		</div><!--end box3-->
		<?php endif; ?>
</div>
</div>
<?php
	}


/**
* End
*/

?>