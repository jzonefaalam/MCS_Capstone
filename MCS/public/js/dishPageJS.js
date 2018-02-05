$(document).ready(function(){
	$('.update').click(function(){
		// window.location.href='#editDishModal';
		var id = $(this).data('id');
		$.ajax
			({
			url: '/RetrieveDish',
			type : "get",
			data : {"id" : id},
			dataType: "json",
			success: function(response) {
					response.forEach(function(data){
						$('#editDishName').val(data.dishName);
						$('#editDishPrice').val(data.dishCost);
						$('#editDishDesc').val(data.dishDescription);
						$('#editDishType').val(data.dishTypeID);
					})
				}
			});
		return true;
	});
});