$(function() {
    $(".main .jCarouselLite").jCarouselLite({
        btnNext: ".next",
        btnPrev: ".prev",
        visible: 1,
        auto: 3000
    });
});

$(document).ready(function() {
  $('#baul_btn').bubbletip($('#tip_baul'), {
    //positionAt: 'mouse',
    deltaDirection: 'right',
    offsetTop: 0,
    offsetLeft: -50
  });
  $('#parl_btn').bubbletip($('#tip_parl'), {
    //positionAt: 'mouse',
    deltaDirection: 'left',
    offsetTop: 0,
    offsetLeft: 50
  });
  $('#disc_btn').bubbletip($('#tip_disc'), {
    //positionAt: 'mouse',
    deltaDirection: 'left',
    offsetTop: 0,
    offsetLeft: 50
  });
});
