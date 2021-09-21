jQuery(function(){

	var ajaxurl = trimariswp.ajaxurl;

	if(jQuery('#trimariswp-awards-list').length > 0){
		jQuery('#trimariswp-awards-list').DataTable();
	}

	// Add new OP Award
	jQuery('#frm-add-op-award').validate({
		submitHandler: function(form){
			var postdata = jQuery("#frm-add-op-award").serialize();
			postdata += "&action=admin_ajax_request&param=add_new_op_award";
			console.log(postdata);
			jQuery.post(ajaxurl, postdata, function(response){
				console.log(response);
			});			
		},
		error: function(xhr, textStatus, errorThrown) {
		  alert(textStatus + "|" + errorThrown);
		}
	});

	jQuery(document).on("click","#first-ajax-button",function(){
		var postdata = "action=admin_ajax_request&param=first_simple_ajax";
		jQuery.post(ajaxurl, postdata, function(response){
			console.log(response);
		});
	});

});