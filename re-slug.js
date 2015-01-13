(function($) {
  $(function() {
  	$("#re-slug").live("click", function(e) {
  		e.preventDefault();
  		var the_new_slug = $("#title").val();
		$.post(
		ajaxurl,
		{
		action: "sample-permalink",
		post_id: $("#post_ID").val(),
		new_slug: the_new_slug,
		new_title: the_new_slug,
		samplepermalinknonce:$("#samplepermalinknonce").val()
		},
		function(val){
			$("#edit-slug-box").html(val);
			$("#post_name").val(the_new_slug);
			$("#view-post-btn").show();
			$("#re-slug").hide();
		});
   	});
   	$("#title").on("input", function() {
   		$('#re-slug').show();
   	});
  });
 })(jQuery);