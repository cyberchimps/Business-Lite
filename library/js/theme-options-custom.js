/**
 * Prints out the inline javascript needed for the colorpicker and choosing
 * the tabs in the panel.
 */

jQuery(document).ready(function($) {

  $("#bu_custom_logo").change(function() {
    var toShow = $("#section-bu_logo");
    if($(this).is(':checked')) {
      toShow.show();
    } else {
      toShow.hide();
    }
  }).change();	
  $("#section-bu_font").change(function() {
    if($(this).find(":selected").val() == 'custom') {
      $('#section-bu_custom_font').fadeIn();
    } else {
      $('#section-bu_custom_font').hide();
    }
  }).change();
  $("#section-bu_menu_font").change(function() {
    if($(this).find(":selected").val() == 'custom') {
      $('#section-bu_custom_menu_font').fadeIn();
    } else {
      $('#section-bu_custom_menu_font').hide();
    }
  }).change();
    $("#section-bu_front_product_type").change(function() {
    if($(this).find(":selected").val() == 'key1') {
      $('#section-bu_front_product_image').fadeIn();
    } else {
      $('#section-bu_front_product_image').hide();
    }
  }).change();
     $("#section-bu_front_product_type").change(function() {
    if($(this).find(":selected").val() == 'key2') {
      $('#section-bu_front_product_video').fadeIn();
    } else {
      $('#section-bu_front_product_video').hide();
    }
  }).change();
   $("#section-bu_blog_product_type").change(function() {
    if($(this).find(":selected").val() == 'key1') {
      $('#section-bu_blog_product_image').fadeIn();
    } else {
      $('#section-bu_blog_product_image').hide();
    }
  }).change();
     $("#section-bu_blog_product_type").change(function() {
    if($(this).find(":selected").val() == 'key2') {
      $('#section-bu_blog_product_video').fadeIn();
    } else {
      $('#section-bu_blog_product_video').hide();
    }
  }).change();

  $("#bu_show_excerpts").change(function() {
    var toShow = $("#section-bu_excerpt_link_text, #section-bu_excerpt_length");
    if($(this).is(':checked')) {
      toShow.show();
    } else {
      toShow.hide();
    }
  }).change();
  $("#bu_portfolio_title_toggle").change(function() {
    var toShow = $("#section-bu_portfolio_title");
    if($(this).is(':checked')) {
      toShow.show();
    } else {
      toShow.hide();
    }
  }).change();
    $("#bu_blog_product_link_toggle").change(function() {
    var toShow = $("#section-bu_blog_product_link_url, #section-bu_blog_product_link_text");
    if($(this).is(':checked')) {
      toShow.show();
    } else {
      toShow.hide();
    }
  }).change();
   $("#bu_front_product_link_toggle").change(function() {
    var toShow = $("#section-bu_front_product_link_url, #section-bu_front_product_link_text");
    if($(this).is(':checked')) {
      toShow.show();
    } else {
      toShow.hide();
    }
  }).change();

  $("#bu_show_featured_images").change(function() {
    var toShow = $("#section-bu_featured_image_align, #section-bu_featured_image_height, #section-bu_featured_image_width");
    if($(this).is(':checked')) {
      toShow.show();
    } else {
      toShow.hide();
    }
  }).change();
    $("#bu_disable_footer").change(function() {
    var toShow = $("#section-bu_footer_text, #section-bu_hide_link");
    if($(this).is(':checked')) {
      toShow.fadeIn();
    } else {
      toShow.fadeOut();
    }
  }).change();
      $("#bu_custom_background").change(function() {
    var toShow = $("#section-bu_background_upload, #section-bu_bg_image_position, #section-bu_bg_image_repeat, #section-bu_background_color, #section-bu_bg_image_attachment ");
    if($(this).is(':checked')) {
      toShow.show();
    } else {
      toShow.hide();
    }
   }).change();
      $("#bu_custom_menu_color_toggle").change(function() {
    var toShow = $("#section-bu_custom_menu_color, #section-bu_custom_dropdown_color, #section-bu_menulink_color, #section-bu_menu_hover_color ");
    if($(this).is(':checked')) {
      toShow.show();
    } else {
      toShow.hide();
    }
  }).change();
  $("#bu_slider_type").change(function(){
    var val = $(this).val(),
      post = $("#section-bu_slider_category"),
      custom = $("#section-bu_customslider_category");
    if(val == 'custom') {
      post.hide(); custom.show();
    } else {
      post.show(); custom.hide();
    }
  }).change();

  $.each(['twitter', 'facebook', 'gplus', 'flickr', 'linkedin', 'youtube', 'googlemaps', 'email', 'rsslink'], function(i, val) {
	  $("#section-bu_" + val).each(function(){
		  var $this = $(this), $next = $(this).next();
		  $this.find(".controls").css({float: 'left', clear: 'both'});
		  $next.find(".controls").css({float: 'right', width: 80});
		  $next.hide();
		  $this.find('.option').before($next.find(".option"));
		  $this.find("input[type='checkbox']").change(function() {
			  if($(this).is(":checked")) {
				  $(this).closest('.option').next().show();
			  } else {
				  $(this).closest('.option').next().hide();
			  }
		  }).change();
	  });
  });
});	

jQuery(function($) {
	var initialize = function(id) {
		var el = $("#" + id);
		function update(base) {
			var hidden = base.find("input[type='hidden']");
			var val = [];
			base.find('.right_list .list_items span').each(function() {
				val.push($(this).data('key'));
			});
			hidden.val(val.join(",")).change();
			el.find('.right_list .action').show();
			el.find('.left_list .action').hide();
		}
		el.find(".left_list .list_items").delegate(".action", "click", function() {
			var item = $(this).closest('.list_item');
			$(this).closest('.section_order').children('.right_list').children('.list_items').append(item);
			update($(this).closest(".section_order"));
		});
		el.find(".right_list .list_items").delegate(".action", "click", function() {
			var item = $(this).closest('.list_item');
			$(this).val('Add');
			$(this).closest('.section_order').children('.left_list').children('.list_items').append(item);
			$(this).hide();
			update($(this).closest(".section_order"));
		});
		el.find(".right_list .list_items").sortable({
			update: function() {
				update($(this).closest(".section_order"));
			},
			connectWith: '#' + id + ' .left_list .list_items'
		});

		el.find(".left_list .list_items").sortable({
			connectWith: '#' + id + ' .right_list .list_items'
		});

		update(el);
	}

	$('.section_order').each(function() {
		initialize($(this).attr('id'));
	});

	$("input[name='business[bu_blog_section_order]']").change(function(){
		var show = $(this).val().split(",");
		var map = {
			business_page_slider: "subsection-featureslider",
			business_callout_section: "subsection-calloutoptions",
			business_portfolio_element: "subsection-portfoliooptions",
			business_twitterbar_section: "subsection-twtterbaroptions",
			business_index_carousel_section: "subsection-carouseloptions",
			business_product_element: "subsection-productoptions"
			// , business_box_section: ""
		};

		$.each(map, function(key, value) {
			$("#" + value).hide();
			$.each(show, function(i, show_key) {
				if(key == show_key)
					$("#" + value).show();
			});
		});
	}).trigger('change');
	
		$("input[name='business[bu_front_section_order]']").change(function(){
		var show = $(this).val().split(",");
		var map = {
			business_page_slider: "subsection-slider",
			business_callout_section: "subsection-callout"
			// , business_box_section: ""
		};

		$.each(map, function(key, value) {
			$("#" + value).hide();
			$.each(show, function(i, show_key) {
				if(key == show_key)
					$("#" + value).show();
			});
		});
	}).trigger('change');
	
	$("input[name='business[header_section_order]']").change(function(){
		var show = $(this).val().split(",");
		var map = {
			business_sitename_contact: "section-bu_header_contact",
			business_description_icons: "subsection-social"
			// , business_box_section: ""
		};

		$.each(map, function(key, value) {
			$("#" + value).hide();
			$.each(show, function(i, show_key) {
				if(key == show_key)
					$("#" + value).show();
			});
		});
	}).trigger('change');

});
