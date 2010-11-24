$(document).ready(function() {
  $('#mociones_materias').hide();

  $('#btn_estado a').click(function(){
    $('#mociones_materias').hide();
    $('#mociones_estados').show();
    $('#btn_estado').removeClass('mocion_act').addClass('mocion_act');
    $('#btn_materia').removeClass('mocion_act');
  });

  $('#btn_materia a').click(function(){
    $('#mociones_materias').show();
    $('#mociones_estados').hide();
    $('#btn_materia').removeClass('mocion_act').addClass('mocion_act');
    $('#btn_estado').removeClass('mocion_act');
  });
});

