$(document).ready(function() {
  $('div.repw').addClass('visible');
  $('div.repl').addClass('visible');
  
  $('#filter').keyup(function(event) {
    //if esc is pressed or nothing is entered  
    if (event.keyCode == 27 || $(this).val() == '') {  
      //if esc is pressed we want to clear the value of search box  
      $(this).val('');  
  
      //we want each row to be visible because if nothing  
      //is entered then all rows are matched.  
      $('div.repw').removeClass('visible').show().addClass('visible');  
      $('div.repl').removeClass('visible').show().addClass('visible');  
    } 
  
    //if there is text, lets filter  
    else {
      $('div.repl').hide().removeClass('visible');  
      filter($(this).val());
    }
  });
});

//filtro por nombre
function filter(query) {
  query = $.trim(query); //trim white space  
  //query = query.replace(/ /gi, '&'); //add OR for regex query  
  
  $('div.repw').each(function() {  
    if ($(this).find('strong').text().search(new RegExp(query, "i")) < 0) $(this).hide().removeClass('visible');
    else $(this).show().addClass('visible');  
  });  
}
