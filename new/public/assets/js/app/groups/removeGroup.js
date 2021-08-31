jQuery(document).ready(function(){

	$('.btn-delete-modal').on('click', function (){
		var field = $(this);
		var inputValue = field.attr('data-field');
		$('.modal-footer .btn-primary').attr("data-field",inputValue);			
		var name = field.parents('tr').find('td:nth-child(3)').text();
		$('.modal-body').text(`Deseja apagar o grupo ${name}?`);
	});

	$('.modal-footer .btn-primary').on('click', function (){
		var field = $(this);
		var inputValue = field.attr('data-field');
		$.ajax({
			type: 'get',
			headers: {'X-Requested-With': 'XMLHttpRequest'},
			contentType: 'application/x-www-form-urlencoded; charset=UTF-8',			
			url: baseUrl + '/config/groups/delgroup',
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