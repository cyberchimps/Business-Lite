<?php 
/**
* 404 template used by Business lite
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

	global $options, $themeslug, $post, $sidebar, $content_grid; // call globals

/* Header call. */

	business_sidebar_init();
	get_header(); 
	
/* End header. */

?>

	
<div class="container">
	<div class="row">
	<!--Begin @business before content sidebar hook-->
		<?php business_before_content_sidebar(); ?>
	<!--End @business before content sidebar hook-->
	<div id="content" class="<?php echo $content_grid; ?>">
		<div class="content_padding">
		
			<!-- Begin @business before_404 hook content-->
      			<?php business_before_404(); ?>
      		<!-- Begin @business before_404 hook content-->
		
      		<!-- Begin @business 404 hook content-->
      			<?php business_404(); ?>
      		<!-- Begin @business 404 hook content-->
      		
      		<!-- Begin @business after_404 hook content-->
      			<?php business_after_404(); ?>
      		<!-- Begin @business after_404 hook content-->
      		
		</div><!--end content_padding-->
	</div><!--end content_left-->
	
	<!--Begin @business after content sidebar hook-->
		<?php business_after_content_sidebar(); ?>
	<!--End @business after content sidebar hook-->
	
	</div><!--end row-->
</div><!--end container-->

<?php get_footer(); ?>