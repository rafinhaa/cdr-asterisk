jQuery(document).ready(function(){
	$('.btn-status').on('click', function (){
		var field = $(this);
		var inputValue = field.attr('data-field');			
		$.ajax({
			type: 'get',
			headers: {'X-Requested-With': 'XMLHttpRequest'},
			contentType: 'application/x-www-form-urlencoded; charset=UTF-8',			
			url: baseUrl + '/users/status',
			data: {id:inputValue},
			dataType: 'json',
			success: function(result){
				if(result.success){
					toastr.success(result.success);
					if(field.text() == 'ativo'){							
						field.removeClass("badge-primary").addClass("badge-secondary");
						field.text("inativo");
					}else{
						field.removeClass("badge-secondary").addClass("badge-primary");							
						field.text("ativo");
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

	$('.btn-delete-modal').on('click', function (){
		var field = $(this);
		var inputValue = field.attr('data-field');
		$('.modal-footer .btn-primary').attr("data-field",inputValue);			
		var name = field.parents('tr').find('td:nth-child(3)').text();
		var lastname = field.parents('tr').find('td:nth-child(4)').text();
		$('.modal-body').text(`Deseja apagar o usuário ${name} ${lastname} ?`);
	});

	$('.modal-footer .btn-primary').on('click', function (){
		var field = $(this);
		var inputValue = field.attr('data-field');
		$.ajax({
			type: 'get',
			headers: {'X-Requested-With': 'XMLHttpRequest'},
			contentType: 'application/x-www-form-urlencoded; charset=UTF-8',			
			url: baseUrl + '/users/delete',
			data: {id:inputValue},
			dataType: 'json',
			success: function(result){
				if(result.success){
					toastr.success(result.success);
					$(".btn-delete-modal[data-field='"+inputValue+"']").closest("tr").remove();
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