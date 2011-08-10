<?php

/*
	Section: Meta
	Authors: Trent Lapinski, Tyler Cunningham 
	Description: Creates post meta content.
	Version: 1.0	
*/

$options = get_option('business') ;  

?>

<?php 
		$author = $options['bu_hide_author'];
		$category = $options['bu_hide_categories'];
		$date = $options['bu_hide_date'];
		$comments = $options['bu_hide_comments'];
	?>


<div class="meta">
<?php if ($author != '1'):?>Published by <?php the_author_posts_link(); ?> <?php endif;?> <?php if ($category != '1'):?>in <?php the_category(', ') ?> <?php endif;?><?php if ($date != '1'):?> on <a href="<?php the_permalink() ?>"><?php the_time('F jS, Y') ?></a><?php endif;?><?php if ($comments != '1'):?> | <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?><?php endif;?>
</div>
