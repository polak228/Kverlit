<!DOCTYPE html>
<html lang="ru">
  <head>
<!----------------------------------------------------------------------------->
    <noscript><meta http-equiv="refresh" content="0; url=/templates/html/no-js.html" /></noscript>
<!----------------------------------------------------------------------------->
    <meta name="description" content="Kverlit - чат, для общения с близкими людьми." />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta name="theme-color" content="#fff" />
<!----------------------------------------------------------------------------->
    <script src="/lib/js/kverlit/kverlit.js"></script>
    <script src="/assets/js/icons_preload.js"></script>
<!----------------------------------------------------------------------------->
    <link rel="stylesheet" type="text/css" href="/assets/css/mobile/mobile_default.css" />
<!----------------------------------------------------------------------------->
    <link rel="icon" href="/assets/media/images/favicon.ico" type="image/x-icon" />
<!----------------------------------------------------------------------------->
  </head>
<?php if( empty($_GET) ): ?>
<title>Kverlit</title>
<body>
  <header class="index_header">
    <div class="index_header_logo"></div>
  </header>
  <h1 class="index_title">Добро пожаловать в чат - <span>Kverlit</span></h1>
  <div class="index_hr"></div>
  <button class="index_register_btn">Зарегистрироваться</button>
  <button class="index_auth_btn" onclick="window.location.href = '/?login';">Войти</button>
  <div class="index_footer">Kverlit version - 0.1</div>
</body>
<?php elseif( $_GET["login"] === "" ): ?>
<title>Вход | Kverlit</title>
<body class="login_body">
  <header class="login_header">
    <div class="login_header_logo"></div>
  </header>
  <form class="login_form">
    <div class="login_form_window">
      <h2>Войдите в аккаунт:</h2>
    </div>
    <input class="login_form_login" type="text" placeholder="Логин" />
    <input class="login_form_password" type="password" placeholder="Пароль" />
    <button class="login_form_button">Войти</button>
  </form>
  <script src="/modules/js/login.js" type="module" async></script>
</body>
<?php endif; ?>
</html>