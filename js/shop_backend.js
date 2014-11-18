// MonstraHost Shop Admin

$(document).ready(function() {
	// switch to add tab upon clicking edit product button
	$('.btn-shop-edit').click(function(e) {
		//e.preventDefault();
				$('#shop-admin-tabs a:last').tab('show');
				alert('After');
				return confirm('Are you sure you want to do that?');


		//this.unbind(e).click();
	});
});