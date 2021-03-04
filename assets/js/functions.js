import { paths } from "./paths.js";


class Kverlit {

  static kverlitLogin(params) {
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

}


export { Kverlit };