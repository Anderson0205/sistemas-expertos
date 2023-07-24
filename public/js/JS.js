
$(document).ready(function() {
	var fieldsets = $("form#msform fieldset");
	var current_fs = 0; // current fieldset index
  
	$(".next").click(function() {
	  // Hide current fieldset
	  fieldsets.eq(current_fs).hide();
	  // Increment current_fs to show next fieldset
	  current_fs++;
	  // Show next fieldset
	  $("#progressbar li:after").eq($("fieldset").index(current_fs)).addClass("active");
	  fieldsets.eq(current_fs).show();
	});
  
	$(".previous").click(function() {
	  // Hide current fieldset
	  fieldsets.eq(current_fs).hide();
	  // Decrement current_fs to show previous fieldset
	  current_fs--;
	  // Show previous fieldset
	  $("#progressbar li:before").eq($("fieldset").index(current_fs)).addClass("active");
	  fieldsets.eq(current_fs).show();
	});
  });
