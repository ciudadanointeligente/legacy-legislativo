$(document).ready(function() {
  $('th.comuna').hide();
  $('td.comuna').hide();
  showCircDist($('input:radio:checked').val());
  $('table.parlamentarios tbody tr').addClass('visible');

  //show/hide partido/comuna según variables post desde buscador página inicial y aplicar filtros
  if ($('#partido_comuna').val() == 'Partido'){
    $('#comuna').hide();
    if ($('#partido').val() == '0') $('#partido').hide();
    else{
      if ($('#filter').val() == '') filter2p('table.parlamentarios tbody tr', $('#partido').val());
      else filter2_par('table.parlamentarios tbody tr', $('#filter').val(), 'td.nombre');
    }
  }
  else if ($('#partido_comuna').val() == 'Comuna'){
    $('#partido').hide();
    if ($('#comuna').val() == '0') $('#comuna').hide();
    else{
      if ($('#filter').val() == '') filter2('table.parlamentarios tbody tr', $('#comuna').val(), 'td.comuna');
      else filter2_com('table.parlamentarios tbody tr', $('#filter').val(), 'td.nombre');
    }
  }
  else {
    $('#partido').hide();
    $('#comuna').hide();
    if ($('#filter').val() == '') filter('table.parlamentarios tbody tr', $('input:radio:checked').val(), 'img.sd');
    else filter2('table.parlamentarios tbody tr', $('#filter').val(), 'td.nombre');
  }

  //user input
  $('#partido_comuna').change(function(){
    $('#filter').val('');
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
    //alert ($('input:radio:checked').val());
    filter('table.parlamentarios tbody tr', $(this).val(), 'img.sd');
    //reset fields
    $('#filter').val('');
    $('#partido_comuna').val('0');
    $('#partido').val('0');
    $('#partido').hide();
    $('#comuna').val('0');
    $('#comuna').hide();
    
    showCircDist(this.value);
  });

  $('#partido').change(function(){
    filter2p('table.parlamentarios tbody tr', $(this).val());
    $('#filter').val('');
  });

  $('#comuna').change(function(){
    filter2('table.parlamentarios tbody tr', $(this).val(), 'td.comuna');  
    $('#filter').val('');
  });

  $('#filter').keyup(function(event) {
    //if esc is pressed or nothing is entered  
    if (event.keyCode == 27 || $(this).val() == '') {  
      //if esc is pressed we want to clear the value of search box  
      $(this).val('');  
  
      //we want each row to be visible because if nothing  
      //is entered then all rows are matched.  
      $('table.parlamentarios tbody tr').removeClass('visible').show().addClass('visible');  
    } 
  
    //if there is text, lets filter  
    else {
      if (($('#partido_comuna').val() == "Partido") && ($('#partido').val() != "0")) filter2_par('table.parlamentarios tbody tr', $(this).val(), 'td.nombre');
      else if (($('#partido_comuna').val() == "Comuna") && ($('#comuna').val() != "0")) filter2_com('table.parlamentarios tbody tr', $(this).val(), 'td.nombre');
      else filter2('table.parlamentarios tbody tr', $(this).val(), 'td.nombre');
    }
  });
});


//filtro por 1 campo (diputado/senador)
function filter(selector, query, column) {
  query =   $.trim(query); //trim white space  
  query = query.replace(/ /gi, '|'); //add OR for regex query  

  $(selector).each(function() {
    ($(this).find(column).attr('alt').search(new RegExp(query, "i")) < 0) ? $(this).hide().removeClass('visible') : $(this).show().addClass('visible');  
  });  
}

//filtro por 2 campos (diputado/senador y (comuna o nombre))
function filter2(selector, query, column) {
  query = $.trim(query); //trim white space  
  query = query.replace(/ /gi, '|'); //add OR for regex query  
  
  $(selector).each(function() {  
    if (($(this).find(column).text().search(new RegExp(query, "i")) < 0) || ($(this).find('img.sd').attr('alt').search(new RegExp($('input:radio:checked').val(), "i")) < 0)) $(this).hide().removeClass('visible');
    else $(this).show().addClass('visible');  
  });  
}

//filtro por 2 campos (diputado/senador y partido)
function filter2p(selector, query, column) {
  query = $.trim(query); //trim white space  
  query = query.replace(/ /gi, '|'); //add OR for regex query  
  
  $(selector).each(function() {  
    if (($(this).find('img.sp').attr('alt').search(new RegExp(query, "i")) < 0) || ($(this).find('img.sd').attr('alt').search(new RegExp($('input:radio:checked').val(), "i")) < 0)) $(this).hide().removeClass('visible');
    else $(this).show().addClass('visible');  
  });  
}

//filtro por 3 campos (diputado/senador, partido y nombre)
function filter2_par(selector, query, column) {
  query =   $.trim(query); //trim white space  
  query = query.replace(/ /gi, '|'); //add OR for regex query  
  
  $(selector).each(function() {  
    if (($(this).find(column).text().search(new RegExp(query, "i")) < 0) || ($(this).find('img.sd').attr('alt').search(new RegExp($('input:radio:checked').val(), "i")) < 0) || ($(this).find('img.sp').attr('alt').search(new RegExp($('#partido').val(), "i")) < 0)) $(this).hide().removeClass('visible');
    else $(this).show().addClass('visible');  
  });
}

//filtro por 3 campos (diputado/senador, comuna y nombre)
function filter2_com(selector, query, column) {
  query =   $.trim(query); //trim white space  
  query = query.replace(/ /gi, '|'); //add OR for regex query  
  
  $(selector).each(function() {  
    if (($(this).find(column).text().search(new RegExp(query, "i")) < 0) || ($(this).find('img.sd').attr('alt').search(new RegExp($('input:radio:checked').val(), "i")) < 0) || ($(this).find('td.comuna').text().search(new RegExp($('#comuna').val(), "i")) < 0)) $(this).hide().removeClass('visible');
    else $(this).show().addClass('visible');  
  });
}

function showCircDist(val){
  //hide column dist/circ
  if (val == 'D'){
    $('th.dist').show();
    $('td.dist').show();
    $('th.circ').hide();
    $('td.circ').hide();
  }
  else {
    $('th.circ').show();
    $('td.circ').show();
    $('th.dist').hide();
    $('td.dist').hide();
  }
}

