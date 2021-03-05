import { paths } from "./paths.js";


class Kverlit {

  static ajax(params) {
    return $.ajax({
      url: paths.KverlitController, method: "post",
      dataType: "json", data: { params : params }
    });
  }

  static readCookie(name) {
    var name_cook = name + "=";
    var spl = document.cookie.split(";");
    for( var i = 0; i < spl.length; i++ ) {
      var c = spl[i];
      while( c.charAt(0) === " " ) {
        c = c.substring(1, c.length);
      } if( c.indexOf(name_cook) === 0 ) {
          return c.substring(name_cook.length, c.length);	
        }
    } return "";
  }

  static returnPage(url, contain) {
    var response = this.ajax({
      call : "router", method : "returnPage", url : url
    });
    response.done(function(response) {
      if( response.status === "error" ) {
        return $(contain).empty().append("<h1>Страница не существует</h1>");
      } $(contain).empty().append(response.success);
    });
  }

}


export { Kverlit };