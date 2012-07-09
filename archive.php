<?php 
/**
* Archive template used by Business lite
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

	global $options, $themeslug, $post, $content_grid; // call globals
	
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
	
	<?php if (have_posts()) : ?>
		
		<!--Begin @business before_archive hook-->
			<?php business_before_archive(); ?>
		<!--End @business before_archive hook-->
		
		<?php while (have_posts()) : the_post(); ?>
		
		<div class="post_container">
			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
		
			<!--Begin @business archive hook-->
				<?php business_loop(); ?>
			<!--End @business archive hook-->
			
			</div><!--end post_class-->	
		</div><!--end post container--> 
	
		 <?php endwhile; ?>
	 
	 <?php else : ?>

		<h2>Nothing found</h2>

	<?php endif; ?>

		<!--Begin @business pagination hook-->
			<?php business_pagination(); ?>
		<!--End @business pagination hook-->
		
		<!--Begin @business after_archive hook-->
			<?php business_after_archive(); ?>
		<!--End @business after_archive hook-->
	
		</div><!--end content_padding-->

	<!--Begin @business after content sidebar hook-->
		<?php business_after_content_sidebar(); ?>
	<!--End @business after content sidebar hook-->
	
		</div><!--end content-->
	</div><!--end row-->
		<?php if ($options->get($themeslug.'_archive_breadcrumbs') == "1") { business_breadcrumbs();}?>
</div><!--end container-->

<?php get_footer(); ?>