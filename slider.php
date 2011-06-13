<?php 

/*
	Section: Slider
	Authors: Tyler Cunningham 
	Description: Creates Business lite slider.
	Version: 1.1.0	
	Portions of this code written by Ivan Lazarevic  (email : devet.sest@gmail.com) Copyright 2010    
*/

    	$tmp_query = $wp_query; 
		$options = get_option('business') ; 
		query_posts('category_name='.$options['bu_slider_category'].'&showposts=50');
		$root = get_template_directory_uri();
			
	    if (have_posts()) :
	    	$out = "<div id='coin-slider'>"; 
	    	$i = 0;
	    	
	    	if ($options['bu_slider_posts_number'] == '')
	    	$no = '5';
	    	
	    	else $no = $options['bu_slider_posts_number'];
	    	

	    	while (have_posts() && $i<$no) : 
	    	
	    		the_post(); 
	    		
	    	
	    		$permalink 			= get_permalink();
	   			$text 				= get_post_meta($post->ID, 'slider_text' , true);
	   			$image  			= get_post_meta($post->ID, 'slider_post_image' , true);
	   			$title				= get_the_title(); 
	   			   			
	    		
	    		
	    		if ($image != ''){ 
	    			$out .= "<a href='$permalink'>	
	    						<img src='$image' alt='BusinessLite' />
	    						<span>
	    							<strong>$title</strong><br />
	    							$text
	    						</span>
	    					</a>
	    			";
	       } 
	       		else {
	       		$out .= "<a href='$permalink'>	
	    						<img src='$root/images/businesslite.jpg' alt='BusinessLite' />
	    						<span>
	    							<strong>$title</strong><br />
	    							$text
	    						</span>
	    					</a>
	    			";
	       } 
	    	 	    	 
	      	$i++;
	      	endwhile;
	      	$out .= "</div>";
	    endif; 
	    
	    $wp_query = $tmp_query;
	    
	    $csEffect = 'random';
	    
	    $csSpw		= get_option('cs-spw') ? get_option('cs-spw') : 7;
	    $csSph		= get_option('cs-sph') ? get_option('cs-sph') : 5;	    
	    	    
	    if ($options['bu_slider_delay'] == '')
	    	$csDelay = '3500';
	    else $csDelay = $options['bu_slider_delay'];
	   	  	
	  if ($options['bu_slider_navigation'] == '1')
	    	$csNavigation = 'false';
	    else $csNavigation = 'true';
	    ?>
	
<?php	    
	     wp_reset_query();
    $out .= <<<OUT
<script type="text/javascript">
var $ = jQuery.noConflict();
	$("#coin-slider").coinslider({
		width  		: 640,
		height 		: 330,
		spw			: $csSpw,
		sph			: $csSph,
		delay		: $csDelay,
		navigation	: $csNavigation,
		effect		: '$csEffect'
	
	}); 

</script>

OUT;

echo $out;