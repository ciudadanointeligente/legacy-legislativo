$(document).ready(function() {
  $('#tb_votacion').visualize({type: 'bar', height: '30px', width: '100px', parseDirection: 'x', appendTitle: false, colors: ['#A8D342','#FD8D2A']}).appendTo('#votacion_barchart').trigger('visualizeRefresh');
	//$('#tb_datos').hide();
});

