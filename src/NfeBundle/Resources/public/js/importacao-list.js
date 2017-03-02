$(document).ready(function(){
	
	$('a[data-log]').click(function(e){
		e.preventDefault();
		var log = $(this).attr('data-log').replace(/\n/g, '<br><br>');
		bootbox.dialog({
			title: 'Detalhes da Importacao',
		    message: log
		});
	});
	
});