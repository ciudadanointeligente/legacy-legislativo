$(document).ready(function() {
  $('#partido').hide();
  $('#comuna').hide();

  $('#partido_comuna').change(function(){
    if (this.value == 'Partido') {
      $('#partido').show();
      $('#comuna').hide();
    }
    else {
      $('#partido').hide();
      $('#comuna').show();
    }
  });

  $('input:radio').change(function () {
    $('#filter').val('');
    $('#partido_comuna').val('0');
    $('#partido').val('0');
    $('#partido').hide();
    $('#comuna').val('0');
    $('#comuna').hide();
  });
});


