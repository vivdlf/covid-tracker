/* 
Written by: Viviannie De La Fuente
Tested by: Viviannie De La Fuente
Debugged by: Viviannie De La Fuente 
*/
$(function() {// Note event handler
$("#close-this").click(function(e) {
    e.preventDefault();
    $("#popup").css("bottom", -350);
    $("#close-this").hide();
    $("#reminder").show();
  });
  $("#reminder").click(function(e) {
    e.preventDefault();
    $("#popup").css("bottom", 0);
    $("#close-this").show();
    $("#reminder").hide();
    ga('send', 'event', 'info', 'viewed');
  });

  // open up info section upon page load
  $("#reminder").click();
});