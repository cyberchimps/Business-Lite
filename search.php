<?php 
/**
* Search template used by Business lite
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
* @package Business.
* @since 3.0
*/

global $options, $themeslug, $post, $sidebar, $content_grid; // call globals
	
business_sidebar_init();
get_header(); 

?>

<div class="container">
	<div class="row">
		<!--Begin @business before content sidebar hook-->
			<?php business_before_content_sidebar(); ?>
		<!--End @business before content sidebar hook-->
		<div id="content" class="<?php echo $content_grid; ?>">
			<!-- Begin @business before_search hook -->
				<?php business_before_search(); ?>
			<!-- End @business before_search hook -->
	
			<!-- Begin @business search hook -->
				<?php business_search(); ?>
			<!-- End @business search hook -->
	
			<!-- Begin @business after_search hook -->
				<?php business_after_search(); ?>
			<!-- End @business after_search hook -->		
		</div>	
		<!--Begin @business after content sidebar hook-->
			<?php business_after_content_sidebar(); ?>
		<!--End @business after content sidebar hook-->
	</div><!--end row-->
</div><!--end container-->

<?php get_footer(); ?>