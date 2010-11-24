$(document).ready(function() {
  $('#debate_id_comision').parent().parent().hide();
  //$("label[for='debate_id_comision']").hide(); 

  $('#debate_comision').change(function(){
    $('#debate_id_comision').parent().parent().toggle();
    $('#debate_discusion_general').parent().parent().toggle();
  });
});


