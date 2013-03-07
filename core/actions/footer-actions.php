<?php
/**
* Footer actions used by Business lite
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
* Business footer actions
*/
add_action ( 'business_footer', 'business_footer_widgets' );
add_action ( 'business_secondary_footer', 'business_secondary_footer_credit' );
add_action ( 'business_secondary_footer', 'business_secondary_footer_copyright' );


/**
* Set the footer widgetized area.
*
* @since 3.0
*/
function business_footer_widgets() { 

   	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer") ) { ?>
		
		<div class="three columns footer-widgets">
			<h3 class="footer-widget-title"><?php _e( 'Footer Widgets', 'business' ); ?></h3>
			<ul>
				<li>To customize this widget area login to your admin account, go to Appearance, then Widgets and drag new widgets into Footer Widgets</li>
			</ul>
		</div>

		<div class="three columns footer-widgets">
			<h3 class="footer-widget-title"><?php _e( 'Recent Posts', 'business' ); ?></h3>
			<ul>
				<?php wp_get_archives('type=postbypost&limit=4'); ?>
			</ul>
		</div>

		<div class="three columns footer-widgets">
			<h3 class="footer-widget-title"><?php _e( 'WordPress', 'business' ); ?></h3>
			<ul>
    		<?php wp_register(); ?>
    		<li><?php wp_loginout(); ?></li>
    		<li><a href="<?php echo esc_url( __('http://wordpress.org/', 'business' )); ?>" target="_blank" title="<?php esc_attr_e('Powered by WordPress, state-of-the-art semantic personal publishing platform.', 'business'); ?>"> <?php _e('WordPress', 'business' ); ?></a></li>
    		<?php wp_meta(); ?>
    		</ul>
		</div>
		
		<div class="three columns footer-widgets">
			<h3 class="footer-widget-title"><?php _e( 'Search', 'business' ); ?></h3>
			<?php get_search_form(); ?>
		</div>
		
			<?php }
			
			echo "<div class='clear'></div> ";
}

/**
* Adds the afterfooter copyright area. 
*
* @since 3.0
*/
function business_secondary_footer_copyright() {
	global $options, $themeslug; //call globals
		
	if ($options->get($themeslug.'_footer_text') == "") {
		$copyright =  get_bloginfo('name');
	}
	else {
		$copyright = $options->get($themeslug.'_footer_text');
	}
	
	echo "<div id='afterfootercopyright' class='six columns'>";
		echo "&copy; $copyright";
	echo "</div>";
}

/**
* Adds the CyberChimps credit.
*
* @since 3.0
*/
function business_secondary_footer_credit() { 	
?>
	<div id="credit" class="six columns">
		<a href="http://cyberchimps.com/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/achimps.png" alt="credit" /></a>
	</div> 
<?php 
}
/**
* End
*/

?>