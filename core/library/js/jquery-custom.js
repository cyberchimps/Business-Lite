jQuery(document).ready(function($) {
	function if_check_slider_value(value) {
		var slider_value = $('select#bu_slider_type').val();
	
		if ( slider_value == "posts" ) {
			$(".bu_row_custom").hide();
			$(".bu_row_posts").fadeIn();
		} else if ( slider_value == "custom" ){
			$(".bu_row_posts").hide();
			$(".bu_row_custom").fadeIn();
		}
	
		return false;
	}

	if_check_slider_value();

	$("select#bu_slider_type").change(function() {
		if_check_slider_value();
	});
});

jQuery(document).ready(function($) {
	function if_check_slider_value(value) {
		var slider_value = $("select[name=\'page_slider_type\']").val();

		if ( slider_value == "0" ) {
			$(".slider_blog_category").hide();
			$(".slider_category").fadeIn();
		} else if ( slider_value == "1" ){
			$(".slider_category").hide();
			$(".slider_blog_category").fadeIn();
		}

		return false;
	}

	if_check_slider_value();

	$("select[name=\'page_slider_type\']").change(function() {
		if_check_slider_value();
	});
});

jQuery(document).ready(function($) {
	function bu_check_product_value(value) {
		var product_value = $("select[name=\'product_type\']").val();

		if ( product_value == "0" ) {
			$(".product_video").hide();
			$(".product_image").fadeIn();
		} else if ( product_value == "1" ){
			$(".product_image").hide();
			$(".product_video").fadeIn();
		}

		return false;
	}

	bu_check_product_value();

	$("select[name=\'product_type\']").change(function() {
		bu_check_product_value();
	});
});