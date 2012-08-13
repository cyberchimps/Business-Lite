<?php
/**
* Index actions used by Business lite
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
* Business post actions
*/

add_action( 'business_post', 'business_post_content');

/**
* Index content
*
* @since 1.0
*/
function business_post_content() { 

	global $options, $themeslug, $post, $sidebar, $content_grid; // call globals ?>
	
	<!--Begin @business sidebar init-->
		<?php business_sidebar_init(); ?>
	<!--End @business sidebar init-->
	<div class="container">
	<div class="row">
	<!--Begin @business before content sidebar hook-->
		<?php business_before_content_sidebar(); ?>
	<!--End @business before content sidebar hook-->

		<div id="content" class="<?php echo $content_grid; ?>">
		
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			<div class="post_container">
				<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
		
				<!--Begin @business index loop hook-->
					<?php business_loop(); ?>
				<!--End @business index loop hook-->
							
				</div><!--end post_class-->
			</div><!--end post container-->
			
			<?php if (is_attachment()) : ?>
			
			<div id="image_pagination">
				<div class="image_wrap">
					<div class="previous_image"> <?php previous_image_link( array( 100, 1000 ) ); ?></div>
					<div class="next_image"><?php next_image_link( array( 100, 100 )); ?></div>
				</div>
			</div>
			<?php endif; ?>
			
			<?php if (is_single() && $options->get($themeslug.'_post_pagination') == "1") : ?>
				<!--Begin @business post pagination hook-->
					<?php business_post_pagination(); ?>
				<!--End @business post pagination hook-->			
				<?php endif;?>
			
			<?php if (is_single()):?>
				<?php comments_template(); ?>
			<?php endif ?>
			
			<?php endwhile; ?>
		
			<?php else : ?>

				<h2>Not Found</h2>

			<?php endif; ?>
			
			<!--Begin @business pagination hook-->
			<?php business_custom_pagination(); ?>
			<!--End @business pagination loop hook-->
		
		</div><!--end row-->
		
	<!--Begin @business after content sidebar hook-->
		<?php business_after_content_sidebar(); ?>
	<!--End @business after content sidebar hook-->
	</div><!--end container-->

</div>
<?php }

/**
* End
*/

?>