$(function(){
  //Visualizaciones Balance general 1990-2010
	$('#tb_balance').visualize({type: 'pie', pieMargin: 10, title: 'Proyectos presentados entre 1990-2010'}).appendTo('#piechart').trigger('visualizeRefresh');
	$('#tb_balance').visualize({type: 'bar', title: 'Proyectos presentados entre 1990-2010'}).appendTo('#barchart').trigger('visualizeRefresh');
});
