<?php
$options = get_option('business') ;  
?>

<?php get_header(); ?>

<div id="content_wrap">
		
	<div id="content_left">
	
	<?php 
		$hideslider = $options['bu_hide_slider'];
		$share = $options['bu_hide_share'];
		$tags = $options['bu_hide_tags'];
		$excerpts = $options['bu_show_excerpts']
	?>
	
		<?php if ($hideslider != '1'):?>
			<?php get_template_part('slider', 'index' ); ?>
		<?php endif;?>
	
		<div class="content_padding">
		
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
				
				<!--Call the Loop-->
			<?php get_template_part('loop', 'index' ); ?>

		<?php endwhile; ?>

		<?php get_template_part('pagination', 'index' ); ?>

		<?php else : ?>

			<h2>Not Found</h2>

		<?php endif; ?>
		</div> <!--end content_padding-->
	</div> <!--end content_left-->

	<?php get_sidebar(); ?>
	
</div><!--end content_wrap-->
<div style="clear:both;"></div>

<?php get_footer(); ?>