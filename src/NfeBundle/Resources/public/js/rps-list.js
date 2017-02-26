$(document).ready(function(){
	
	$('#import-rps').click(function(){
		var iframe = $(this).attr('data-url');
		bootbox.dialog({
			title: 'Importação de Notas Fiscais',
		    message: '<iframe width="100%" height="100%" src="' + iframe + '" frameborder="0" scrolling="no"></iframe>'
		});
	});
	
});