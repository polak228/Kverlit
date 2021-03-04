import { Kverlit } from "/assets/js/functions.js";


$(function() {
  $(".login_form_button").click(function(e) {
    e.preventDefault();
    var login = $(".login_form_login").val();
    var password = $(".login_form_password").val();
    var response = Kverlit.ajax({
      call : "engine", method : "login",
      login : login, password : password
    });
    response.done(function(response) {
      if( response.status === "error" ) {
        return $(".login_form_window").html("<h3 class='login_form_window_error'>Неверный логин, или пароль</h3>");
      } window.location.href = "/?home";
    });
  });
});