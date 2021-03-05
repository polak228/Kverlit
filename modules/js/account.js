import { Kverlit } from "/assets/js/functions.js";


$(function() {
  var URL = window.location.search.replace("?", "");
  Kverlit.returnPage(URL, ".account_content");
  // url button
  $("body").on("click", "*[url]", function() {
    let URL = $(this).attr("url").replace("?", "");
    if( window.location.search.replace("?", "") !== URL ) {
      Kverlit.returnPage(URL, ".account_content");
      window.history.pushState(null, null, "/?" + URL);
    }
  });
  // history back
  $(window).on("popstate", function(event) {
    event.preventDefault();
    let URL = window.location.search.replace("?", "");
    Kverlit.returnPage(URL, ".account_content");
  });
});