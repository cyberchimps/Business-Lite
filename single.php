<?php 
/**
* Single template used by Business lite
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

/* End variable definition. */	

get_header(); ?>

<div class="container">
	<div class="row">
	<!--Begin @Core post area-->
		<?php business_post(); ?>
	<!--End @Core post area-->
	
	</div>
<?php if ($options->get($themeslug.'_single_breadcrumbs') == "1") { business_breadcrumbs();}?>
</div><!--end container-->

<?php get_footer(); ?>