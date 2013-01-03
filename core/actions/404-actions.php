<?php
/**
* 404 actions used by Business lite
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
* Business 404 actions
*/
add_action( 'business_404', 'business_404_content' );

/**
* Sets up the 404 content message
*
* @since 3.0 
*/
function business_404_content() {
	global $options, $themeslug; // call globals
	
	if ($options->get($themeslug.'_custom_404') != '') {
		$message_text = $options->get($themeslug.'_custom_404');
	}
	else {
		$message_text = apply_filters( 'business_404_message', __( 'Error 404', 'business' ) );
	} ?>
	<div class="error"><?php echo $message_text; ?><br />	</div> 
	<?php
}

/**
* End
*/

?>