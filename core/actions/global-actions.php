<?php
/**
* Global actions used by Business lite
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
* Business global actions
*/

add_action( 'business_loop', 'business_loop_content' );
add_action( 'business_post_byline', 'business_post_byline_content' );
add_action( 'business_edit_link', 'business_edit_link_content' );
add_action( 'business_post_tags', 'business_post_tags_content' );
add_action( 'business_post_bar', 'business_post_bar_content' );
add_action( 'business_fb_like_plus_one', 'business_fb_like_plus_one_content' );

/**
* Check for post format type, apply filter based on post format name for easy modification.
*
* @since 3.0
*/
function business_loop_content($content) { 

	global $options, $themeslug, $post; //call globals
	
	if (is_single()) {
		 $post_formats = $options->get($themeslug.'_single_post_formats');
		 $featured_images = $options->get($themeslug.'_single_show_featured_images');
		 $excerpts = $options->get($themeslug.'_single_show_excerpts');
	}
	elseif (is_archive()) {
		 $post_formats = $options->get($themeslug.'_archive_post_formats');
		 $featured_images = $options->get($themeslug.'_archive_show_featured_images');
		 $excerpts = $options->get($themeslug.'_archive_show_excerpts');
	}
	else {
		 $post_formats = $options->get($themeslug.'_post_formats');
		 $featured_images = $options->get($themeslug.'_show_featured_images');
		 $excerpts = $options->get($themeslug.'_show_excerpts');
	}
	
	if (get_post_format() == '') {
		$format = "default";
	}
	else {
		$format = get_post_format();
	} ?>
	<?php ob_start(); ?>
			<?php
				if ( has_post_thumbnail() && $featured_images == '1' ) {
 		 			echo '<div class="featured-image">';
 		 			echo '<a href="' . get_permalink($post->ID) . '" >';
 		 				the_post_thumbnail();
  					echo '</a>';
  					echo '</div>';
				}
			?>	
			<!--Call @business Meta hook-->
			<div class="row">
			<div class="byline three columns"><?php business_post_byline(); ?></div>
				<div class="entry nine columns">
					<?php if ($post_formats != '0') : ?>
						<div class="postformats"><!--begin format icon-->
							<img src="<?php echo get_template_directory_uri(); ?>/images/formats/<?php echo $format ;?>.png" alt="formats" />
						</div><!--end format-icon-->
					<?php endif; ?>
					<h2 class="posts_title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
					<?php 
						if ($excerpts == '1' && !is_single() ) {
						the_excerpt();
						}
						else {
							the_content(__('Read more...', 'business'));
						}
					 ?>
				<!--Begin @business link pages hook-->
					<?php business_link_pages(); ?>
				<!--End @business link pages hook-->
			
				<!--Begin @business post edit link hook-->
					<?php business_edit_link(); ?>
				<!--End @business post edit link hook-->
				</div><!--end entry-->
			</div><!--end row-->
			<?php	
		
		$content = ob_get_clean();
		$content = apply_filters( 'business_post_formats_'.$format.'_content', $content );
	
		echo $content; 
}

/**
* Sets the post byline information (author, date, category). 
*
* @since 3.0
*/
function business_post_byline_content() {
	global $options, $themeslug; //call globals.  
	if (is_single()) {
		$hidden = $options->get($themeslug.'_single_hide_byline'); 
	}
	elseif (is_archive()) {
		$hidden = $options->get($themeslug.'_archive_hide_byline'); 
	}
	else {
		$hidden = $options->get($themeslug.'_hide_byline'); 
	}?>
	
	<div class="meta">
	<ul>
		<li class="metadate"><?php if (($hidden[$themeslug.'_hide_date']) != '0'):?><a href="<?php the_permalink() ?>"><?php echo get_the_date(); ?></a><?php endif;?></li>
		<li class="metaauthor"><?php if (($hidden[$themeslug.'_hide_author']) != '0'):?><?php the_author_posts_link(); ?><?php endif;?></li>
		<li class="metacomments"><?php if (($hidden[$themeslug.'_hide_comments']) != '0'):?><?php comments_popup_link( __('No Comments', 'business' ), __('1 Comment', 'business' ), __('% Comments' , 'business' )); //need a filer here ?><?php endif;?></li>
		<li class="metacat"><?php if (($hidden[$themeslug.'_hide_categories']) != '0'):?> <?php the_category(', ') ?><?php endif;?></li>
		<li class="metatags"><?php business_post_tags(); ?></li>
	</ul>
	</div> <?php
}

/**
* Sets up the WP edit link
*
* @since 3.0
*/
function business_edit_link_content() {
	edit_post_link('Edit', '<p>', '</p>');
}

/**
* Sets up the tag area
*
* @since 3.0
*/
function business_post_tags_content() {
	global $options, $themeslug; 
	if (is_single()) {
		$hidden = $options->get($themeslug.'_single_hide_byline'); 
	}
	elseif (is_archive()) {
		$hidden = $options->get($themeslug.'_archive_hide_byline'); 
	}
	else {
		$hidden = $options->get($themeslug.'_hide_byline'); 
	}?>

	<?php if (has_tag() AND ($hidden[$themeslug.'_hide_tags']) != '0'):?>
			<?php the_tags('', ', ', ''); ?>
	<?php endif;
}

/**
* End
*/

?>