$(function () {
	$('#basic-data-table').DataTable({
		"dom": '<"row justify-content-between top-information"lf>rt<"row justify-content-between bottom-information"ip><"clear">',
		"language": {
			"decimal":        "",
			"emptyTable":     "Sem dados disponíveis na tabela",
			"info":           "Mostrando _START_ de _END_ no  total de _TOTAL_",
			"infoEmpty":      "Mostrando 0 de 0 no total de 0 ",
			"infoFiltered":   "(filtrando o total de _MAX_)",
			"infoPostFix":    "",
			"thousands":      ",",
			"lengthMenu":     "Mostrando _MENU_ linhas por página",
			"loadingRecords": "Carregando...",
			"processing":     "Processando...",
			"search":         "Procurar:",
			"zeroRecords":    "nNnhum registro correspondente encontrado",
			"paginate": {
				"first":      "Primeiro",
				"last":       "Último",
				"next":       "Próximo",
				"previous":   "Anterior"
			},
			"aria": {
				"sortAscending":  ": ative para classificar a coluna em ordem crescente",
				"sortDescending": ": ative para classificar a coluna em ordem decrescente"
			}
        },
    });
});