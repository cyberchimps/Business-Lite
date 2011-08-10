<?php   

/* 
Portions of this code written by Blogatize http://blogatize.net
License: GNU General Public License v2.0
License URI: http://www.gnu.org/licenses/gpl-2.0.html  
*/


add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' ); 


$options = get_option('business');

/**
 * Init plugin options to white list our options
 */  
function theme_options_init() {
	
	register_setting( 'bu_options', 'business', 'theme_options_validate' );
	wp_register_script('bujquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"), false, '1.4.4');
  wp_register_script('bujqueryui', get_template_directory_uri(). '/library/js/jquery-ui.js');
  wp_register_script('bujquerycookie', get_template_directory_uri(). '/library/js/jquery-cookie.js');
  wp_register_script('bucookie', get_template_directory_uri(). '/library/js/cookie.js');
  wp_register_style('bucss', get_template_directory_uri(). '/library/options/theme-options.css');
  wp_register_script('bucolor', get_template_directory_uri(). '/library/js/jscolor/jscolor.js');
}


$themename = "Business lite";
$template_url = get_template_directory_uri();


/**
 * Load up the menu page
 */
 
function theme_options_add_page() {
global $themename, $shortname, $options;
  $page = add_theme_page($themename." Settings", "".$themename."", 'edit_theme_options', 'theme_options', 'theme_options_do_page');  

  add_action('admin_print_scripts-' . $page, 'bu_scripts');
  add_action('admin_print_styles-' . $page, 'bu_styles');  
 
}

/* Include options functions */

	require_once ( get_template_directory() . '/library/options/options-functions.php' );

/* End options functions */

$select_font = array(
'0' => array('value' =>'Maven+Pro','label' => __('Maven Pro(default)')),'1' => array('value' =>'Arial','label' => __('Arial')),'2' => array('value' =>'Courier New','label' => __('Courier New')),'3' => array('value' =>'Georgia','label' => __('Georgia')),'4' => array('value' =>'Lucida Grande','label' => __('Lucida Grande')),'5' => array('value' =>'Tahoma','label' => __('Tahoma')),'6' => array('value' =>'Times New Roman','label' => __('Times New Roman')),'7' => array('value' =>'Ubuntu','label' => __('Ubuntu')),

);

$select_featured_images = array(
'0' => array('value' => 'left','label' => __('Left (default)' )),'1' => array('value' => 'center','label' => __('Center')), '2' => array('value' => 'right','label' => __('Right')),

);

$shortname = "bu";


$optionlist = array (

array( "id" => $shortname,
	"type" => "open-tab"),

array( "type" => "open"),
array( "type" => "close"),

array( "type" => "close-tab"),

// General

array( "id" => $shortname."-tab1",
	"type" => "open-tab"),

array( "type" => "open"),
    
array( "name" => "Logo",  
    "desc" => "Use the image uploader or enter your own URL into the input field to use an image as your logo. To display the site title as text, leave blank.",  
    "id" => $shortname."_logo",  
    "type" => "upload",  
    "std" => ""),
        
array( "name" => "Hide the Social Icons",  
    "desc" => "Check this box to hide the social icons above the sidebar.",  
    "id" => $shortname."_hide_social",  
      "type" => "checkbox",  
    "std" => "false"),
    
array( "name" => "Hide the Search Box",  
    "desc" => "Check this box to hide the search box above the sidebar.",  
    "id" => $shortname."_hide_search",  
      "type" => "checkbox",  
    "std" => "false"),        
        
array( "name" => "Custom Favicon",  
    "desc" => "A favicon is a 16x16 pixel icon that represents your site; paste the URL to a .ico image that you want to use as the image",  
    "id" => $shortname."_favicon",  
    "type" => "upload2",  
    "std" => ""), 


array( "name" => "Google Analytics Code",  
    "desc" => "You can paste your Google Analytics or other tracking code in this box. This will be automatically be added to the footer.",  
    "id" => $shortname."_ga_code",  
    "type" => "textarea",  
    "std" => ""),  

array( "type" => "close"),

array( "type" => "close-tab"),

//Design

array( "id" => $shortname."-tab2",
	"type" => "open-tab"),
 
array( "type" => "open"),

array( "name" => "Choose a font:",  
    "desc" => "(Default is Maven Pro)",  
    "id" => $shortname."_font",  
    "type" => "select2",  
    "std" => ""),
    
array( "name" => "Link Color",  
    "desc" => "Use the color picker to select the site link color",  
    "id" => $shortname."_link_color",  
      "type" => "color2",  
    "std" => "false"),
    
array( "type" => "close"),

array( "type" => "close-tab"),


//Blog

array( "id" => $shortname."-tab3",
	"type" => "open-tab"),
 
array( "type" => "open"),


array( "name" => "Post Excerpts",  
    "desc" => "Use the following options to control excerpts.",  
    "id" => $shortname."_excerpts",  
      "type" => "excerpts",  
    "std" => "false"),

array( "name" => "Featured Images",  
    "desc" => "Use the following options to control featured image alignment and size.",  
    "id" => $shortname."_featured_images",  
      "type" => "featured",  
    "std" => "false"),
    
array( "name" => "Show Excerpts",  
    "desc" => "Check this box to show post excerpts instead of full-length content.",  
    "id" => $shortname."_show_excerpts",  
      "type" => "checkbox",  
    "std" => "false"),

array( "name" => "Hide Post Elements",  
    "desc" => "Use the following checkboxes to hide various post elements.",  
    "id" => $shortname."_hide_post_elements",  
    "type" => "post",  
    "std" => "false"),
    
array(  "name" => "Show Facebook Like Button",
        "desc" => "Check this box to show the Facebook Like Button on blog posts",
        "id" => $shortname."_show_fb_like",
        "type" => "checkbox",
        "std" => "false"),  
        
array(  "name" => "Show Google +1 button",
	"desc" => "Check this box to show the Google +1 Button on blog posts",
	"id" => $shortname."_show_gplus",
	"type" => "checkbox",
	"std" => "false"),   
        
array( "name" => "Home Description",  
    "desc" => "Enter the META description of your homepage here.",  
    "id" => $shortname."_home_description",  
    "type" => "textarea",  
    "std" => ""),
    
array( "name" => "Home Keywords",  
    "desc" => "Enter the META keywords of your homepage here (separated by commas).",  
    "id" => $shortname."_home_keywords",  
    "type" => "textarea",  
    "std" => ""),
    
array( "name" => "Optional Home Title",  
    "desc" => "Enter an alternative title of your homepage here (default is site tagline).",  
    "id" => "bu_home_title",  
    "type" => "text",  
    "std" => ""),
 

array( "type" => "close"),
array( "type" => "close-tab"),

// Social

array( "id" => $shortname."-tab4",
	"type" => "open-tab"),
 
array( "type" => "open"),

array( "name" => "Facebook URL",  
    "desc" => "Enter your Facebook page URL for the Facebook social icon.",  
    "id" => $shortname."_facebook",  
    "type" => "facebook",  
    "std" => "http://facebook.com"),

array( "name" => "Twitter URL",  
    "desc" => "Enter your Twitter URL for Twitter social icon.",  
    "id" => $shortname."_twitter",  
    "type" => "twitter",  
    "std" => "http://twitter.com"),
    
array( "name" => "Google + URL",  
    "desc" => "Enter your Google + URL for the Google + social icon.",  
    "id" => $shortname."_gplus",  
    "type" => "gplus",  
    "std" => "http://plus.google.com"),    
    
array( "name" => "LinkedIn URL",  
    "desc" => "Enter your LinkedIn URL for the LinkedIn social icon.",  
    "id" => $shortname."_linkedin",  
    "type" => "linkedin",  
    "std" => "http://linkedin.com"),  
    
array( "name" => "YouTube URL",  
    "desc" => "Enter your YouTube URL for the YouTube social icon.",  
    "id" => $shortname."_youtube",  
    "type" => "youtube",  
    "std" => "http://youtube.com"),  
    
array( "name" => "Google Maps URL",  
    "desc" => "Enter your Google Maps URL for the Google Maps social icon.",  
    "id" => $shortname."_googlemaps",  
    "type" => "googlemaps",  
    "std" => "http://google.com/maps"),  

array( "name" => "Email",  
    "desc" => "Enter your contact email address for email social icon.",  
    "id" => $shortname."_email",  
    "type" => "email",  
    "std" => "no@way.com"),
    
array( "name" => "Custom RSS Link",  
    "desc" => "Enter Feedburner URL, or leave blank for default RSS feed.",  
    "id" => $shortname."_rsslink",  
    "type" => "rss",  
    "std" => ""),   
 
array( "type" => "close"),

array( "type" => "close-tab"),

// Business Slider

array( "id" => $shortname."-tab5",
	"type" => "open-tab"),

array( "type" => "open"),

array( "name" => "Hide Business Slider",  
    "desc" => "Check this box to hide the Feature Slider on the homepage.",  
    "id" => $shortname."_hide_slider",  
    "type" => "checkbox",  
    "std" => "false"),
        
array( "name" => "Show posts from category:",  
    "desc" => "(Default is all - WARNING: do not enter a category that does not exist or slider will not display)",  
    "id" => $shortname."_slider_category",  
    "type" => "select6",  
    "std" => ""),
    
array( "name" => "Number of featured posts:",  
    "desc" => "(Default is 5)",  
    "id" => $shortname."_slider_posts_number",  
    "type" => "text",  
    "std" => ""),  

array( "name" => "Slider delay time (in milliseconds):",  
    "desc" => "(Default is 3500)",  
    "id" => $shortname."_slider_delay",  
    "type" => "text",  
    "std" => ""), 
    
array( "name" => "Hide the navigation:",  
    "desc" => "Check to disable the slider navigation",  
    "id" => $shortname."_slider_navigation",    
   	"type" => "checkbox",
        "std" => "false"),   
  

array( "type" => "close"),   

array( "type" => "close-tab"),


// Footer

array( "id" => $shortname."-tab6",
	"type" => "open-tab"),

array( "type" => "open"),
  

    
array( "name" => "Hide the Social Icons",  
    "desc" => "Check this box to hide the social icons in the footer.",  
    "id" => $shortname."_hide_footer_social",  
      "type" => "checkbox",  
    "std" => "false"),    
  
array( "name" => "Footer Copyright",  
    "desc" => "Enter Copyright text used on the right side of the footer. It can be HTML (default is your blog title)",  
    "id" => $shortname."_footer_text",  
    "type" => "textarea",  
    "std" => ""),
    
array( "type" => "close"),

array( "type" => "close-tab"),


);  

/**
 * Create the options page
 */
function theme_options_do_page() {
	global $themename, $shortname, $optionlist, $select_font, $select_featured_images;
  

	if ( ! isset( $_REQUEST['updated'] ) ) {
		$_REQUEST['updated'] = false; 
} 
  if( isset( $_REQUEST['reset'] )) { 
            global $wpdb;
            $query = "DELETE FROM $wpdb->options WHERE option_name LIKE 'business'";
            $wpdb->query($query);
            
            die;
     } 
   
?>

<div class="wrap">
  
<br />
<img src="<?php echo get_template_directory_uri() ;?>/images/options/businesslitelogo.png" />
<br /><br />
<a href="http://cyberchimps.com/ifeaturepro/" target="_blank"><img src="<?php echo get_template_directory_uri() ;?>/images/options/upgrade.png" /></a>
<br /><br />

		<?php if ( false !== $_REQUEST['updated'] ) { ?>
		<?php echo '<div id="message" class="updated fade" style="float:left;"><p><strong>'.$name.' settings saved</strong></p></div>'; ?>
    
    <?php } if( isset( $_REQUEST['reset'] )) { echo '<div id="message" class="updated fade"><p><strong>'.$name.' settings reset</strong></p></div>'; } ?>  
				


  <form method="post" action="options.php" enctype="multipart/form-data">
  
    <p class="submit" style="clear:left;float: right;">
				<input type="submit" class="button-primary" value="Save Settings" />   
	</p>
	
	<div class="menu">
	<ul>
		<li><a href="http://cyberchimps.com/support" target="_blank">Support</a></li>
		<li><a href="http://cyberchimps.com/businesslite/docs/" target="_blank">Documentation</a></li>
		<li><a href="http://cyberchimps.com/forum/" target="_blank">Forum</a></li>
		<li><a href="http://twitter.com/#!/cyberchimps" target="_blank">Twitter</a></li>
		<li><a href="http://www.facebook.com/CyberChimps" target="_blank">Facebook</a></li>
		<li><a href="http://cyberchimps.com/store/" target="_blank">CyberChimps Store</a></li>
		
	</ul>
	</div>

      
    <div id="tabs" style="clear:both;">   
    <ul class="tabNavigation">
        <li><a href="#bu-tab1"><span>General</span></a></li>
        <li><a href="#bu-tab2"><span>Design</span></a></li>
        <li><a href="#bu-tab3"><span>Blog</span></a></li>
        <li><a href="#bu-tab4"><span>Social</span></a></li>
        <li><a href="#bu-tab5"><span>Business Slider</span></a></li>        
        <li><a href="#bu-tab6"><span>Footer</span></a></li>
    
    </ul>
    
    <div class="tabContainer">
		
			<?php settings_fields( 'bu_options' ); ?>
			<?php $options = get_option( 'business' ); ?>

			<table class="form-table">   

      <?php foreach ($optionlist as $value) {  
switch ( $value['type'] ) {
 
case "open":
?>

<table width="100%" border="0" style="padding:10px;">

 
<?php break;
 
case "close":
?>


</table><br />
 
<?php break;


case "open-tab":
?>

<div id="<?php echo $value['id']; ?>">

 
<?php break;
 
case "close-tab":
?>


</div>
 
<?php break; 
 
case 'general_faq':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%">Read the <a href="http://cyberchimps.com/question/general-settings-tab/" target="_blank">General Options Tab FAQ</a></td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;

case 'design_faq':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%">Read the <a href="http://cyberchimps.com/question/design-settings-tab/" target="_blank">Design Options Tab FAQ</a></td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break;

case 'social_faq':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%">Read the <a href="http://cyberchimps.com/question/social-settings-tab/" target="_blank">Social Options Tab FAQ</a></td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break;

case 'blog_faq':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%">Read the <a href="http://cyberchimps.com/question/blog-settings-tab/" target="_blank">Blog Options Tab FAQ</a></td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break;

case 'slider_faq':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%">Read the <a href="http://cyberchimps.com/question/ifeature-slider-settings-tab/" target="_blank">Slider Options Tab FAQ</a></td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break;


case 'color2':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%">
    
<?php

	if (isset($options['bu_link_color']) == "") {
		$picker = '717171';
	}
			
	else {
		$picker = $options['bu_link_color']; 
	}
?>

<input type="text" class="color{required:false}" id="business[bu_link_color]" name="business[bu_link_color]"  value="<?php echo $picker ;?>" style="width: 300px;" maxlength="6">   

<br /><br />
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break; 


case 'select6':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'business['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';
								
								$terms2 = get_terms('category', 'hide_empty=0');

									$blogoptions = array();
									
									$blogoptions['all'] = "All";

										foreach($terms2 as $term) {

										$blogoptions[$term->slug] = $term->name;

									}
									

								foreach ( $blogoptions as $option ) {
									$label = $option['label'];
									if ( $selected == $option ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option ) . "'>$option</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option ) . "'>$option</option>";      
								}
								echo $p . $r;   
							?>    


</select>

</td>
</tr> 
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;


case 'excerpts':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%">
    <br />
    <input type="checkbox" id="business[bu_show_excerpts]" name="business[bu_show_excerpts]" value="1" <?php checked( '1', $options['bu_show_excerpts'] ); ?>> - Show Excerpts
<br /><br />

	<?php
		if (isset($options['bu_excerpt_link_text']) == "")
			$textlink = '(Read More...)';
			
		else
			$textlink = $options['bu_excerpt_link_text']; 
	?>
	
   <input type="text" id="business[bu_excerpt_link_text]" name="business[bu_excerpt_link_text]" value="<?php echo $textlink ;?>"> - Excerpt Link Text
<br /><br />

	<?php
		if (isset($options['bu_excerpt_length']) == "")
			$length = '55';
			
		else
			$length = $options['bu_excerpt_length']; 
	?>

     <input type="text" id="business[bu_excerpt_length]" name="business[bu_excerpt_length]" value="<?php echo $length ;?>" > - Excerpt Character Length
<br /><br />

</td>
  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break;


case 'post':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%">
    <br />
    <input type="checkbox" id="business[bu_hide_author]" name="business[bu_hide_author]" value="1" <?php checked( '1', $options['bu_hide_author'] ); ?>> - Author
<br /><br />

   <input type="checkbox" id="business[bu_hide_categories]" name="business[bu_hide_categories]" value="1" <?php checked( '1', $options['bu_hide_categories'] ); ?>> - Categories
<br /><br />

   <input type="checkbox" id="business[bu_hide_date]" name="business[bu_hide_date]" value="1" <?php checked( '1', $options['bu_hide_date'] ); ?>> - Date
<br /><br />

   <input type="checkbox" id="business[bu_hide_comments]" name="business[bu_hide_comments]" value="1" <?php checked( '1', $options['bu_hide_comments'] ); ?>> - Comments
<br /><br />

   <input type="checkbox" id="business[bu_hide_share]" name="business[bu_hide_share]" value="1" <?php checked( '1', $options['bu_hide_share'] ); ?>> - Sharing
<br /><br />

   <input type="checkbox" id="business[bu_hide_tags]" name="business[bu_hide_tags]" value="1" <?php checked( '1', $options['bu_hide_tags'] ); ?>> - Tags
<br /><br />

</td>
  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

<?php
break;

case 'featured':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'business['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_featured_images as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";      
								}
								echo $p . $r;   
							?>    

</select><br /></br>

Define a custom Featured Image size below (default is 100 by 100):

<br /><br />

<?php

	if (isset($options['bu_featured_image_height']) == "") {
			$featureheight = '100';
	}		
	
	else {
		$featureheight = $options['bu_featured_image_height']; 
	}
	
		if (isset($options['bu_featured_image_width']) == "") {
			$featurewidth = '100';
	}		
	
	else {
		$featurewidth = $options['bu_featured_image_width']; 
	}
	
?>

<input type="text" id="business[bu_featured_image_height]" name="business[bu_featured_image_height]"  value="<?php echo $featureheight ;?>" style="width: 300px;"> - Height

<br /><br />

<input type="text" id="business[bu_featured_image_width]" name="business[bu_featured_image_width]"  value="<?php echo $featurewidth ;?>" style="width: 300px;"> - Width

</td>
</tr> 
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;


case 'upload':
?>   


<tr>

<td width="15%" rowspan="2" valign="middle"><strong>Custom Logo</strong>


 
<tr>
<td width="85%">


    <?php settings_fields('bu_options'); ?>
    <?php do_settings_sections('bu'); 
    
   $file = $options['file'];
    
    if ($file != ''){
    
    echo "Logo preview:<br /><br /><img src='{$file['url']}'><br /><br />";}
    echo "<input type='text' name='bu_filename_text' size='72' value='{$file['url']}'/>";
    echo "<br />" ;
    echo "<br />" ;
    echo "<input type='file' name='bu_filename' size='30' />";?>

    
    <br />
    <small>Upload a logo image to use</small>


<?php
	$options = get_option('business');
	$value = isset($options['file']) ? $options['file'] : '';
?>

</td>
</tr>


        
        <tr>
<td><small></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

<?php break; 

case 'upload2':
?>   


<tr>

<td width="15%" rowspan="2" valign="middle"><strong>Custom Favicon</strong>


 
<tr>
<td width="85%">
<br />

    <?php settings_fields('bu_options'); ?>
    <?php do_settings_sections('bu'); 
    
    $file2 = $options['file2'];
    
    if ($file2 != ''){
    
    echo "Favicon preview:<br /><br /><img src='{$file2['url']}'><br /><br />";}
    echo "<input type='text' name='bu_favfilename_text' size='72' value='{$file2['url']}'/>";
    echo "<br />" ;
    echo "<br />" ;
    echo "<input type='file' name='bu_favfilename' size='30' />";?>

    
    <br />
    <small>Upload a favicon image to use</small>


<?php
	$options = get_option('business');
	$value = isset($options['file2']) ? $options['file2'] : '';
?>

</td>
</tr>


        
        <tr>
<td><small></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

<?php break; 


 
case 'textarea':
?>
 
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong></label> <br /><small><?php echo $value['desc']; ?></small> </td> 
    <td width="85%"><textarea id="<?php echo 'business['.$value['id'].']'; ?>" name="<?php echo 'business['.$value['id'].']'; ?>" style="width:400px; height:200px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php echo stripslashes( $options[$value['id']] ); ?></textarea></td>  
 
  
 </tr>
 <tr>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr>
<?php break; 


case 'text':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%"><input style="width:300px;" name="<?php echo 'business['.$value['id'].']'; ?>" id="<?php echo 'bu['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" /></td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break;

case 'facebook':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%"><input style="width:300px;" name="<?php echo 'business['.$value['id'].']'; ?>" id="<?php echo 'bu['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" />
    
    <br /><br />
    <input type="checkbox" id="business[bu_hide_facebook]" name="business[bu_hide_facebook]" value="1" <?php checked( '1', $options['bu_hide_facebook'] ); ?>> - Check this box to hide the Facebook icon. 
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break;


case 'twitter':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%"><input style="width:300px;" name="<?php echo 'business['.$value['id'].']'; ?>" id="<?php echo 'bu['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" />
    
    <br /><br />
    <input type="checkbox" id="business[bu_hide_twitter]" name="business[bu_hide_twitter]" value="1" <?php checked( '1', $options['bu_hide_twitter'] ); ?>> - Check this box to hide the Twitter icon. 
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break;

case 'gplus':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%"><input style="width:300px;" name="<?php echo 'business['.$value['id'].']'; ?>" id="<?php echo 'bu['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" />
    
    <br /><br />
    <input type="checkbox" id="business[bu_hide_gplus]" name="business[bu_hide_gplus]" value="1" <?php checked( '1', $options['bu_hide_gplus'] ); ?>> - Check this box to hide the Google + icon. 
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break;


case 'linkedin':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%"><input style="width:300px;" name="<?php echo 'business['.$value['id'].']'; ?>" id="<?php echo 'bu['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" />
    
    <br /><br />
    <input type="checkbox" id="business[bu_hide_linkedin]" name="business[bu_hide_linkedin]" value="1" <?php checked( '1', $options['bu_hide_linkedin'] ); ?>> - Check this box to hide the LinkedIn icon. 
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;


case 'youtube':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%"><input style="width:300px;" name="<?php echo 'business['.$value['id'].']'; ?>" id="<?php echo 'bu['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" />
    
    <br /><br />
    <input type="checkbox" id="business[bu_hide_youtube]" name="business[bu_hide_youtube]" value="1" <?php checked( '1', $options['bu_hide_youtube'] ); ?>> - Check this box to hide the YouTube icon. 
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;


case 'googlemaps':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%"><input style="width:300px;" name="<?php echo 'business['.$value['id'].']'; ?>" id="<?php echo 'bu['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" />
    
    <br /><br />
    <input type="checkbox" id="business[bu_hide_googlemaps]" name="business[bu_hide_googlemaps]" value="1" <?php checked( '1', $options['bu_hide_googlemaps'] ); ?>> - Check this box to hide the Google Maps icon. 
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;


case 'email':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%"><input style="width:300px;" name="<?php echo 'business['.$value['id'].']'; ?>" id="<?php echo 'bu['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" />
    
    <br /><br />
    <input type="checkbox" id="business[bu_hide_email]" name="business[bu_hide_email]" value="1" <?php checked( '1', $options['bu_hide_email'] ); ?>> - Check this box to hide the Email icon. 
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;

case 'rss':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%"><input style="width:300px;" name="<?php echo 'business['.$value['id'].']'; ?>" id="<?php echo 'bu['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" />
    
    <br /><br />
    <input type="checkbox" id="business[bu_hide_rss]" name="business[bu_hide_rss]" value="1" <?php checked( '1', $options['bu_hide_rss'] ); ?>> - Check this box to hide the RSS icon. 
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break;


case 'select2':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'business['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_font as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";      
								}
								echo $p . $r;   
							?>    

</select>

</td>
</tr> 
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;

 
case "checkbox":
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></td>
<td width="85%">
<input type="checkbox" name="<?php echo 'business['.$value['id'].']'; ?>" id="<?php echo 'business['.$value['id'].']'; ?>" value="1" <?php checked( '1', $options[$value['id']] ); ?>/>
</td>
</tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php break;
 
}
}
?>
 </div>  
      <div id="top"><a href='#TOP'><img src="<?php echo get_template_directory_uri() ;?>/images/options/top.png" /></a>
      </div>
      <div style="text-align: left;padding: 5px;"><a href="http://cyberchimps.com/" target="_blank"><img src="<?php echo get_template_directory_uri() ;?>/images/options/cyberchimpsmini.png" /></a></div>
    
    </div>    
</form>
    
<form method="post">
<p class="submit">
<input name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" />
&nbsp;&nbsp;&nbsp;<small>WARNING THIS RESTORES ALL DEFAULTS</small>
</p>
</form>
	</div>

	<?php
}



function theme_options_validate( $input ) {
	global  $select_font, $select_featured_images;

	// Assign checkbox value
  

    if ( ! isset( $input['bu_enable_twitter'] ) )
		$input['bu_enable_twitter'] = null;
	$input['bu_enable_twitter'] = ( $input['bu_enable_twitter'] == 1 ? 1 : 0 ); 

   
   if ( ! isset( $input['bu_hide_footer_social'] ) )
		$input['bu_hide_footer_social'] = null;
	$input['bu_hide_footer_social'] = ( $input['bu_hide_footer_social'] == 1 ? 1 : 0 ); 
   
   if ( ! isset( $input['bu_show_excerpts'] ) )
		$input['bu_show_excerpts'] = null;
	$input['bu_show_excerpts'] = ( $input['bu_show_excerpts'] == 1 ? 1 : 0 ); 
 
    if ( ! isset( $input['bu_hide_facebook'] ) )
		$input['bu_hide_facebook'] = null;
	$input['bu_hide_facebook'] = ( $input['bu_hide_facebook'] == 1 ? 1 : 0 ); 
	
	if ( ! isset( $input['bu_hide_twitter'] ) )
		$input['bu_hide_twitter'] = null;
	$input['bu_hide_twitter'] = ( $input['bu_hide_twitter'] == 1 ? 1 : 0 ); 
	
	if ( ! isset( $input['bu_hide_gplus'] ) )
		$input['bu_hide_gplus'] = null;
	$input['bu_hide_gplus'] = ( $input['bu_hide_gplus'] == 1 ? 1 : 0 ); 
	
	if ( ! isset( $input['bu_hide_linkedin'] ) )
		$input['bu_hide_linkedin'] = null;
	$input['bu_hide_linkedin'] = ( $input['bu_hide_linkedin'] == 1 ? 1 : 0 ); 
	
	if ( ! isset( $input['bu_hide_youtube'] ) )
		$input['bu_hide_youtube'] = null;
	$input['bu_hide_youtube'] = ( $input['bu_hide_youtube'] == 1 ? 1 : 0 ); 
	
	if ( ! isset( $input['bu_hide_googlemaps'] ) )
		$input['bu_hide_googlemaps'] = null;
	$input['bu_hide_googlemaps'] = ( $input['bu_hide_googlemaps'] == 1 ? 1 : 0 ); 
	
	if ( ! isset( $input['bu_hide_email'] ) )
		$input['bu_hide_email'] = null;
	$input['bu_hide_email'] = ( $input['bu_hide_email'] == 1 ? 1 : 0 ); 
	
	if ( ! isset( $input['bu_hide_rss'] ) )
		$input['bu_hide_rss'] = null;
	$input['bu_hide_rss'] = ( $input['bu_hide_rss'] == 1 ? 1 : 0 ); 

  if ( ! isset( $input['bu_hide_callout'] ) )
		$input['bu_hide_callout'] = null;
	$input['bu_hide_callout'] = ( $input['bu_hide_callout'] == 1 ? 1 : 0 ); 
	
	 if ( ! isset( $input['bu_hide_author'] ) )
		$input['bu_hide_author'] = null;
	$input['bu_hide_author'] = ( $input['bu_hide_author'] == 1 ? 1 : 0 ); 
	
	 if ( ! isset( $input['bu_hide_categories'] ) )
		$input['bu_hide_categories'] = null;
	$input['bu_hide_categories'] = ( $input['bu_hide_categories'] == 1 ? 1 : 0 ); 
	
	 if ( ! isset( $input['bu_hide_date'] ) )
		$input['bu_hide_date'] = null;
	$input['bu_hide_date'] = ( $input['bu_hide_date'] == 1 ? 1 : 0 ); 
	
	 if ( ! isset( $input['bu_hide_comments'] ) )
		$input['bu_hide_comments'] = null;
	$input['bu_hide_comments'] = ( $input['bu_hide_comments'] == 1 ? 1 : 0 ); 
	
	 if ( ! isset( $input['bu_hide_share'] ) )
		$input['bu_hide_share'] = null;
	$input['bu_hide_share'] = ( $input['bu_hide_share'] == 1 ? 1 : 0 ); 
	
	 if ( ! isset( $input['bu_hide_tags'] ) )
		$input['bu_hide_tags'] = null;
	$input['bu_hide_tags'] = ( $input['bu_hide_tags'] == 1 ? 1 : 0 ); 
		 
	if ( ! isset( $input['bu_hide_social'] ) )
		$input['bu_hide_social'] = null;
	$input['bu_hide_social'] = ( $input['bu_hide_social'] == 1 ? 1 : 0 ); 
	
	if ( ! isset( $input['bu_hide_search'] ) )
		$input['bu_hide_search'] = null;
	$input['bu_hide_search'] = ( $input['bu_hide_search'] == 1 ? 1 : 0 ); 
	
	  if ( ! isset( $input['bu_show_fb_like'] ) )
		$input['bu_show_fb_like'] = null;
	$input['bu_show_fb_like'] = ( $input['bu_show_fb_like'] == 1 ? 1 : 0 ); 
	
	 if ( ! isset( $input['bu_show_gplus'] ) )
		$input['bu_show_gplus'] = null;
	$input['bu_show_gplus'] = ( $input['bu_show_gplus'] == 1 ? 1 : 0 ); 
  
     if ( ! isset( $input['bu_hide_slider'] ) )
		$input['bu_hide_slider'] = null;
	$input['bu_hide_slider'] = ( $input['bu_hide_slider'] == 1 ? 1 : 0 ); 
  
  
    if ( ! isset( $input['bu_hide_boxes'] ) )
		$input['bu_hide_boxes'] = null;
	$input['bu_hide_boxes'] = ( $input['bu_hide_boxes'] == 1 ? 1 : 0 ); 
  
     if ( ! isset( $input['bu_hide_link'] ) )
		$input['bu_hide_link'] = null;
	$input['bu_hide_link'] = ( $input['bu_hide_link'] == 1 ? 1 : 0 ); 
	
	  if ( ! isset( $input['bu_slider_navigation'] ) )
		$input['bu_slider_navigation'] = null;
	$input['bu_slider_navigation'] = ( $input['bu_slider_navigation'] == 1 ? 1 : 0 ); 
  
  	// Strip HTML from certain options
  	
   $input['bu_logo'] = wp_filter_nohtml_kses( $input['bu_logo'] );
  
   $input['bu_facebook'] = wp_filter_nohtml_kses( $input['bu_facebook'] ); 
    
   $input['bu_twitter'] = wp_filter_nohtml_kses( $input['bu_twitter'] ); 
  
   $input['bu_linkedin'] = wp_filter_nohtml_kses( $input['bu_linkedin'] );   
  
   $input['bu_youtube'] = wp_filter_nohtml_kses( $input['bu_youtube'] );  
  
   $input['bu_rsslink'] = wp_filter_nohtml_kses( $input['bu_rsslink'] );  
  
   $input['bu_email'] = wp_filter_nohtml_kses( $input['bu_email'] );   
  

	$options = get_option('business');
  if ($_FILES['bu_filename']['name'] != '') {
       $overrides = array('test_form' => false); 
       $file = wp_handle_upload($_FILES['bu_filename'], $overrides);
       $input['file'] = $file;
   } elseif(isset($_POST['bu_filename_text']) && $_POST['bu_filename_text'] != '') {
	   $input['file'] = array('url' => $_POST['bu_filename_text']);
   } else {
	   $input['file'] = null;
   }

if ($_FILES['bu_favfilename']['name'] != '') {
       $overrides = array('test_form' => false); 
       $file2 = wp_handle_upload($_FILES['bu_favfilename'], $overrides);
       $input['file2'] = $file2;
   } elseif(isset($_POST['bu_favfilename_text']) && $_POST['bu_favfilename_text'] != '') {
	   $input['file2'] = array('url' => $_POST['bu_favfilename_text']);
   } else {
	   $input['file2'] = null;
   }
   

	
	
	return $input;    

}

?>
<?php
  
// Add scripts and stylesheet

  function bu_scripts() {
        wp_enqueue_script('bujquery');
        wp_enqueue_script('bujqueryui');
        wp_enqueue_script('bujquerycookie');
        wp_enqueue_script('bucookie');
        wp_enqueue_script('bucolor');
   }
    
 function bu_styles() {
       wp_enqueue_style('bucss');
   }

/* Redirect after activation */

if ( is_admin() && isset($_GET['activated'] ) && $pagenow ==	"themes.php" )
	wp_redirect( 'themes.php?page=theme_options' );
	
/* Redirect after resetting theme options */

if ( isset( $_REQUEST['reset'] ))
  wp_redirect( 'themes.php?page=theme_options' );
  

?>