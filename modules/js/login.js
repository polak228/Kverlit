import { paths } from "/assets/js/paths.js";

function login(params) {
  $.ajax({
    url: paths.ПОСТАВИТЬКОНТРОЛЛЕР, method: "post",
    dataType: "json", data: { params : params },
    success: function(response) {
      if( response.status === "error" ) {
        $(".login_form_window").html("<h3 class='login_form_window_error'>Неверный логин, или пароль</h3>");
      } window.location.href = "/?home";
    }
  });
}

$(function() {
  $(".login_form_button").click(function(e) {
    e.preventDefault();
    login({ method : "login", login : login, password : password });
  });
});