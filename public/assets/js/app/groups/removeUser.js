jQuery(document).ready(function(){

	$('.btn-delete-modal').on('click', function (){
		var field = $(this);
		var inputValue = field.attr('data-field');
		var inputGroupValue = field.attr('data-group');
		$('.modal-footer .btn-primary').attr("data-field",inputValue);			
		$('.modal-footer .btn-primary').attr("data-group",inputGroupValue);			
		var name = field.parents('tr').find('td:nth-child(3)').text();
		var lastname = field.parents('tr').find('td:nth-child(4)').text();
		$('.modal-body').text(`Deseja remover do grupo o usuário ${name} ${lastname} ?`);
	});

	$('.modal-footer .btn-primary').on('click', function (){
		var field = $(this);
		var inputValue = field.attr('data-field');
		var inputGroupValue = field.attr('data-group');
		$.ajax({
			type: 'get',
			headers: {'X-Requested-With': 'XMLHttpRequest'},
			contentType: 'application/x-www-form-urlencoded; charset=UTF-8',			
			url: baseUrl + '/config/groups/removeuser',
			data: {id:inputValue,group_ip:inputGroupValue},
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