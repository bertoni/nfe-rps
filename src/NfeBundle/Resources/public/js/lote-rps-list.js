$(document).ready(function(){
	
	$('.arquivo-lote-rps').click(function(){
		console.log('asdasd');
		var url = $(this).attr('data-url');
		var icon = $(this).find('i');
		$.ajax({
			method: 'GET',
			url: url,
			dataType: 'json',
			beforeSend: function(){
				icon.removeClass('fa-file-text-o');
				icon.addClass('fa-spinner');
				icon.addClass('fa-spin');
			},
			success: function(data){
				addFlashMessage('success', data.message);
				if (data.link.length) {
					setTimeout(function(){window.open(data.link,'_blank');}, 1000);
				}
			},
			error: function(data){
				addFlashMessage('error', data.responseJSON.message);
			},
			complete: function(){
				icon.addClass('fa-file-text-o');
				icon.removeClass('fa-spinner');
				icon.removeClass('fa-spin');
			}
		});
	});
	
});