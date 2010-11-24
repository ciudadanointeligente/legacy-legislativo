$(document).ready(function() {
  $('input:radio').change(function () {
    //$('th.col_var6').toggle();
    //$('td.col_var6').toggle();
    if ($('input:radio:checked').val() == 'Ingresados'){
      $('th.col_var6').fadeTo("slow", 1);
      $('td.col_var6').fadeTo("slow", 1);
      $('.col_var6 :input').attr('disabled', false);
    }
    else {
      $('th.col_var6').fadeTo("slow", 0.3);
      $('td.col_var6').fadeTo("slow", 0.3);
      $('.col_var6 :input').attr('disabled', true);
    }
    //$('input[name=var4] option:selected').attr('name') 
  });
  $('input[name=var4[]]').change(function(){
    disable();
  });
	$('#tb_datos').visualize({type: 'bar', height: '200px', width: '600px', parseDirection: 'x'}).appendTo('#barchart').trigger('visualizeRefresh');
	//$('#tb_datos').hide();
	disable();
});

function disable(){
  if ($('#var41:checked').val() == 'C.Diputados' && $('#var42:checked').val() == 'Senado'){
    $('th.col_var5').fadeTo("slow", 0.3);
    $('td.col_var5').fadeTo("slow", 0.3);
    $('.col_var5 :input').attr('disabled', true);
  }
  else {
    $('th.col_var5').fadeTo("slow", 1);
    $('td.col_var5').fadeTo("slow", 1);
    $('.col_var5 :input').attr('disabled', false);
  }
}
