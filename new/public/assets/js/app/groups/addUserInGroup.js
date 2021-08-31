jQuery(document).ready(function(){
	$('.btn-status').on('click', function (){
		var field = $(this);
		var inputValue = field.attr('data-field');			
		var inputGroupValue = field.attr('data-group');			
		$.ajax({
			type: 'get',
			headers: {'X-Requested-With': 'XMLHttpRequest'},
			contentType: 'application/x-www-form-urlencoded; charset=UTF-8',			
			url: baseUrl + '/config/groups/adduser',
			data: {id:inputValue,group_id:inputGroupValue},
			dataType: 'json',
			success: function(result){
				if(result.success){
					toastr.success(result.success);
					if(field.text() == 'no grupo'){							
						field.removeClass("badge-primary").addClass("badge-secondary");
						field.text("fora do grupo");
					}else{
						field.removeClass("badge-secondary").addClass("badge-primary");							
						field.text("no grupo");
					}
				}else if(result.error){
					toastr.error(result.error);
				}
			},
			error: function(result){
				toastr.error(result.error);
			}
		})
	});

});