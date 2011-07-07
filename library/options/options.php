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

$select_font = array(
'0' => array('value' =>'Maven+Pro','label' => __('Maven Pro(default)')),'1' => array('value' =>'Arial','label' => __('Arial')),'2' => array('value' =>'Courier New','label' => __('Courier New')),'3' => array('value' =>'Georgia','label' => __('Georgia')),'4' => array('value' =>'Lucida Grande','label' => __('Lucida Grande')),'5' => array('value' =>'Tahoma','label' => __('Tahoma')),'6' => array('value' =>'Times New Roman','label' => __('Times New Roman')),'7' => array('value' =>'Ubuntu','label' => __('Ubuntu')),

);

$select_slider_effect = array(
	'0' => array('value' => 'random', 'label' => __( 'Random')), '1' => array('value' => 'rain', 'label' => __('Rain')), '2' => array('value' => 'straight', 'label' =>__('Straight')), '3' => array('value' => 'swirl', 'label' => __('Swirl')),
  
);

$select_slider_type = array(
	'0' => array('value' => 'posts', 'label' => __('Post Categeory')), '1' => array('value' => 'custom', 'label' => __( 'Custom Slides')), 
);

$select_slider_placement = array(
	'0' => array('value' => 'feature', 'label' => __( 'Business Pro Homepage')), '1' => array('value' => 'blog', 'label' => __('Default (Post) Template')),
	
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

array( "name" => "Choose a font:",  
    "desc" => "(Default is Maven Pro)",  
    "id" => $shortname."_font",  
    "type" => "select2",  
    "std" => ""),
    
array( "name" => "Logo URL",  
    "desc" => "Enter the link to your logo image, or to use your site title text leave blank.",  
    "id" => $shortname."_logo",  
    "type" => "text",  
    "std" => ""), 
        
array( "name" => "Custom Favicon",  
    "desc" => "A favicon is a 16x16 pixel icon that represents your site; paste the URL to a .ico image that you want to use as the image",  
    "id" => $shortname."_favicon",  
    "type" => "text",  
    "std" => ""),   


array( "name" => "Google Analytics Code",  
    "desc" => "You can paste your Google Analytics or other tracking code in this box. This will be automatically be added to the footer.",  
    "id" => $shortname."_ga_code",  
    "type" => "textarea",  
    "std" => ""),  

array(  "name" => "Show Facebook Like Button",
        "desc" => "Check this box to show the Facebook Like Button on blog posts",
        "id" => $shortname."_show_fb_like",
        "type" => "checkbox",
        "std" => "false"),  
        
array( "type" => "close"),

array( "type" => "close-tab"),



// Social

array( "id" => $shortname."-tab2",
	"type" => "open-tab"),
 
array( "type" => "open"),

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

//Blog

array( "id" => $shortname."-tab3",
	"type" => "open-tab"),
 
array( "type" => "open"),


array( "name" => "Show Excerpts",  
    "desc" => "Check this box to show post excerpts instead of full-length content.",  
    "id" => $shortname."_show_excerpts",  
      "type" => "checkbox",  
    "std" => "false"),

array( "name" => "Hide the Author",  
    "desc" => "Check this box to hide the author link on posts.",  
    "id" => $shortname."_hide_author",  
      "type" => "checkbox",  
    "std" => "false"),
    
array( "name" => "Hide the Categories",  
    "desc" => "Check this box to hide the categories link on posts.",  
    "id" => $shortname."_hide_categories",  
      "type" => "checkbox",  
    "std" => "false"),
        
array( "name" => "Hide the Date",  
    "desc" => "Check this box to hide the date link on posts.",  
    "id" => $shortname."_hide_date",  
      "type" => "checkbox",  
    "std" => "false"),
    
array( "name" => "Hide the Comments",  
    "desc" => "Check this box to hide the comments link on posts.",  
    "id" => $shortname."_hide_comments",  
      "type" => "checkbox",  
    "std" => "false"),
    
array( "name" => "Hide the Share Icons",  
    "desc" => "Check this box to hide the share icons on posts.",  
    "id" => $shortname."_hide_share",  
      "type" => "checkbox",  
    "std" => "false"),
    
array( "name" => "Hide the Tags",  
    "desc" => "Check this box to hide the tags link on posts.",  
    "id" => $shortname."_hide_tags",  
      "type" => "checkbox",  
    "std" => "false"),

array( "type" => "close"),
array( "type" => "close-tab"),


//SEO

array( "id" => $shortname."-tab4",
	"type" => "open-tab"),
 
array( "type" => "open"),

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
    "type" => "text",  
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
	global $themename, $shortname, $optionlist, $select_font, $select_slider_effect, $select_slider_type, $select_slider_placement;
  

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
  

<?php if ( function_exists('screen_icon') ) screen_icon(); ?>

      
<h2><?php echo $themename; ?> Settings</h2><br />

<p>Want more features? Click below to upgrade to Business Pro, which includes the Business Pro homepage template, additional sections, fonts, custom Business slides, and much more.</p>
<a href="http://cyberchimps.com/businesspro"><img src="<?php echo get_template_directory_uri(); ?>/images/getbizpro.png?>" alt="Get Business Pro"></a> 
<p>Want to stick with Business lite, but want to support the developers? Please consider making a donation.</p>
<a href="http://cyberchimps.com/donate"><img src="<?php echo get_template_directory_uri(); ?>/images/paypal.gif?>" alt="Donate"></a> 



		<?php if ( false !== $_REQUEST['updated'] ) { ?>
		<?php echo '<div id="message" class="updated fade" style="float:left;"><p><strong>'.$themename.' settings saved</strong></p></div>'; ?>
    
    <?php } if( isset( $_REQUEST['reset'] )) { echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset</strong></p></div>'; } ?>  
				


  <form method="post" action="options.php" enctype="multipart/form-data">
  
    <p class="submit" style="clear:left;">
				<input type="submit" class="button-primary" value="Save Settings" />   
			</p>  
      
    <div id="tabs" style="clear:both;">   
    <ul class="tabNavigation">
        <li><a href="#bu-tab1"><span>General</span></a></li>
        <li><a href="#bu-tab2"><span>Social</span></a></li>
        <li><a href="#bu-tab3"><span>Blog</span></a></li>
        <li><a href="#bu-tab4"><span>SEO</span></a></li>
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
    </div>    

			<p class="submit">
				<input type="submit" class="button-primary" value="Save Settings" />   
			</p>
		</form>


    
    <form method="post">
<p class="submit">
<input name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" />
&nbsp;&nbsp;&nbsp;<small>WARNING, THIS RESTORES TO DEFAULT</small>
</p>
</form> 

<p>Need help? Follow the links below to visit our support forum and documentation pages:</p>
<a href="http://cyberchimps.com/businesslite/docs"><img src="<?php echo get_template_directory_uri();?>/images/docs.png?>" alt="Docs"></a> <a href="http://cyberchimps.com/forum"><img src="<?php echo get_template_directory_uri(); ?>/images/forum.png?>" alt="Forum"></a> 



	</div>
	<?php
}



function theme_options_validate( $input ) {
	global  $select_font, $select_slider_effect, $select_slider_type, $select_slider_placement;

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
  

	return $input;    

}

?>
<?php
  
/* Custom Menu */   
  
add_action( 'init', 'register_my_menu' );

function register_my_menu() {
	register_nav_menu( 'primary-menu', __( 'Primary Menu' ) );
}


// Add scripts and stylesheet

  function bu_scripts() {
        wp_enqueue_script('bujquery');
        wp_enqueue_script('bujqueryui');
        wp_enqueue_script('bujquerycookie');
        wp_enqueue_script('bucookie');
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