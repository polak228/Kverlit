import { Kverlit } from "/assets/js/functions.js";


$(function() {
  var response = Kverlit.ajax({
    call : "router", method : "returnPage",
    type : "tpl", url : "home"
  });
  response.done(function(response) {
    if( response.status === "error" ) {
      return $("body").empty().append("<h1>Страница не существует</h1>");
    } $("body").empty().append(response.success);
  });
});