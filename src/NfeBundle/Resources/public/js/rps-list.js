$(document).ready(function(){
	
	$('#import-rps').click(function(){
		var iframe = $(this).attr('data-url');
		bootbox.dialog({
			title: 'Importação de Notas Fiscais',
		    message: '<iframe width="100%" height="100%" src="' + iframe + '" frameborder="0" scrolling="no"></iframe>'
		});
	});
	
	$('#novo-lote-rps').click(function(){
		var url = $(this).attr('data-url');
		var icon = $(this).find('i');
		$.ajax({
			method: 'POST',
			url: url,
			dataType: 'json',
			beforeSend: function(){
				icon.removeClass('fa-folder-open');
				icon.addClass('fa-spinner');
				icon.addClass('fa-spin');
			},
			success: function(data){
				addFlashMessage('success', data.message);
				setTimeout(function(){location.reload();},1000);
			},
			error: function(data){
				addFlashMessage('error', data.responseJSON.message);
			},
			complete: function(){
				icon.addClass('fa-folder-open');
				icon.removeClass('fa-spinner');
				icon.removeClass('fa-spin');
			}
		});
	});
	
});