$(document).ready(function(){

  var searching_register = false;

  $(document).on('click', '.pagination a', function(e){
    e.preventDefault();
    if (searching_register) {
      return false;
    }

    var button      = $(this);
    var wrapper     = $('#' + button.attr('data-wrapper'));
    var url         = button.attr('data-url');
    var active_page = parseInt(button.attr('data-page'), 10);
    var label       = button.attr('data-label');
    active_page++;
    url = url.replace('pagina/0', 'pagina/' + active_page);

    $.ajax({
			method: 'GET',
			url: url,
			dataType: 'html',
			beforeSend: function(){
				button.html('<i class="fa fa-spin fa-spinner"></i>');
        searching_register = true;
			},
			success: function(data){
				wrapper.find('tbody').append(data);
        if (!data.length) {
          button.hide();
        }
			},
			error: function(data){
				addFlashMessage('error', 'Ops, não foi possível buscar os registros');
			},
			complete: function(){
        button.attr('data-page', active_page);
        button.html(label);
        searching_register = false;
			}
		});
  });

});
